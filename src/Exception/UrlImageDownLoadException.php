<?php

namespace Image\Downloader\Exception;

class UrlImageDownLoadException extends \Exception
{
    /*
     * message about wrong file type
     * @return string
     */
    public function wrongTypeFile()
    {
        return 'This type of file is not allowed';
    }
}