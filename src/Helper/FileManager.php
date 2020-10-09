<?php

namespace Image\Downloader\Helper;

class FileManager
{
    /*
     * @var resource
     */
    protected $resource;

    /*
     * @return resource
     */
    public function getResource()
    {
        return $this->resource;
    }

    /*
     * Get resource
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
     * Close file
     * @return boolean
     */
    public function closeResource()
    {
        return fclose($this->resource);
    }

    /*
     * Build path to file
     * @param string $path
     * @param string $fileName
     * @return string
     */
    public function buildFilePath($path, $fileName)
    {
        return $path . DIRECTORY_SEPARATOR . $fileName;
    }

    /*
     * Delete file
     * @param string $pathWithName
     * @return boolean
     */
    public function deleteFile($pathWithName)
    {
        return unlink($pathWithName);
    }
}