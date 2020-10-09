<?php

namespace Image\Downloader;

use GuzzleHttp\Client;
use Image\Downloader\Exception\UrlImageDownLoadException;
use Image\Downloader\Validator\ImageValidator;
use Image\Downloader\Helper\FileManager;
use Image\Downloader\Interfaces\FileValidator;

class ImageDownload
{
    /*
     * @var Array for validator class
     */
    public $validator = ImageValidator::class;

    /*
     * @var File validator pattern
     */
    protected $validatorObject;

    /*
     * @var Guzzle Client
     */
    protected $guzzleClient;

    /*
     * @var FileManager
     */
    protected $fileManager;
    
    /*
     * Constructor class
     */
    public function __construct()
    {
        $this->validatorObject = new $this->validator();
        $this->fileManager = new FileManager();
        $this->guzzleClient = new Client();
    }

    /*
     * Method for download file by url
     * @param string $url
     * @param string $pathSave
     * @param string $fileName
     * @return boolean
     * @throws Exception
     */
    public function imageDownloadByUrl($url, $pathSave, $fileName)
    {
        $path = $this->fileManager->buildFilePath($pathSave, $fileName);
        $this->fileManager->openResource($path, 'wb');

        try {
            $request = $this->guzzleClient->get($url, ['save_to' => $this->fileManager->getResource()]);
            $contentType = $request->getHeader('Content-Type');

        } catch (\Exception $e) {
            return $e->getMessage();
        }

        $this->fileManager->closeResource();
        $isValid = $this->validate($contentType[0]);

        if (!$isValid) {
            $this->fileManager->deleteFile($path);
            throw new UrlImageDownLoadException('Wrong file type');
        }

        return true;
    }

    /*
     * Method for valid download file type
     * @param string $fileType
     * @return boolean
     * @throw UrlImageDownLoadException
     * @throws Exception
     */
    public function validate($fileType)
    {
        if ($this->validatorObject instanceof FileValidator) {
            return $this->validatorObject->validate($fileType);
        }

        throw new \Exception('Validator class should be instance of ' . FileValidator::class);
    }
}