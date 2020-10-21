<?php

namespace Image\Downloader\Helper;

class FileManager
{
    /*
     * @var resource
     */
    protected $resource;

    /*
     * @return Method to get resource
     */
    public function getResource()
    {
        return $this->resource;
    }

    /*
     * Method to open resource
     * @param string $fileName
     * @param string $openMode
     * @throws \Exception
     */
    public function openResource($fileName, $openMode)
    {
        $this->resource = fopen($fileName, $openMode);
        if (!$this->resource) {
            throw new \Exception('Error with open file resource');
        }
    }

    /*
     * Method to close file
     * @return boolean
     */
    public function closeResource()
    {
        return fclose($this->resource);
    }

    /*
     * Method to build path of file
     * @param string $path
     * @param string $fileName
     * @return string
     */
    public function buildFilePath($path, $fileName)
    {
        return $path . DIRECTORY_SEPARATOR . $fileName;
    }

    /*
     * Method to delete file
     * @param string $pathWithName
     * @return boolean
     */
    public function deleteFile($pathWithName)
    {
        return unlink($pathWithName);
    }
}