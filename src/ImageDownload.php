<?php

namespace Image\Downloader;

use Image\Downloader\Exception\UrlImageDownLoadException;
use Image\Downloader\Factory\GuzzeleClientFactory;
use Image\Downloader\Interfaces\FileValidator;

class ImageDownload
{

    /*
     * @var File validator pattern
     */
    protected object $validatorObject;

    /*
     * @var Guzzle Client
     */
    protected object $guzzleClient;

    /*
     * @var Guzzle Client
     */
    private $stream;
    
    /*
     * Constructor class
     */
    public function __construct(FileValidator $fileValidator)
    {
        $this->validatorObject = $fileValidator;
        $this->guzzleClient = GuzzeleClientFactory::create();
    }

    /*
     * Method for download file by url
     * @param string $url
     * @param string $pathSave
     * @param string $fileName
     * @return boolean
     * @throws Exception
     */
    public function imageDownloadByUrl(string $url, string $pathSave, string $fileName)
    {
        $path = $this->buildFilePath($pathSave, $fileName);
        $this->setFile($path, 'wb');

        try {
            $request = $this->guzzleClient->get($url, ['save_to' => $this->stream]);
            $contentType = $request->getHeader('Content-Type');
            $this->closeResource();

        } catch (\Exception $e) {
            $this->closeResource();
            $this->deleteFile($path);
            return $e->getMessage();
        }

        $isValid = $this->validate(\array_shift($contentType));

        if (!$isValid) {
            $this->deleteFile($path);
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
    public function validate(string $fileType)
    {
        if ($this->validatorObject instanceof FileValidator) {
            return $this->validatorObject->validate($fileType);
        }

        throw new \Exception('Validator class should be instance of ' . FileValidator::class);
    }

    /*
     * Open stream, set file
     * @param string $fileName
     * @param string $openMode
     * @throws \Exception
     */
    private function setFile(string $fileName, string $openMode)
    {
        $this->stream = \fopen($fileName, $openMode);
        if (!$this->stream) {
            throw new \Exception('Error with open file resource');
        }
    }

    /*
     * Close file
     * @return boolean
     */
    public function closeResource()
    {
        return \fclose($this->stream);
    }

    /*
     * Build path to file
     * @param string $path
     * @param string $fileName
     * @return string
     */
    private function buildFilePath(string $path, string $fileName)
    {
        return $path . DIRECTORY_SEPARATOR . $fileName;
    }

    /*
     * Delete file
     * @param string $pathWithName
     * @return boolean
     */
    private function deleteFile(string $pathWithName)
    {
        return \unlink($pathWithName);
    }
}