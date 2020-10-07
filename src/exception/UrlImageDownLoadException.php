<?php

namespace image\download\exception;

class UrlImageDownLoadException extends \Exception
{
    /*
     * message about invalid configure
     * @return string
     */
    public function invalidConfigure()
    {
        return 'Invalid configure';
    }

    /*
     * message about wrong file type
     * @return string
     */
    public function wrongTypeFile()
    {
        return 'This type of file is not allowed';
    }
}