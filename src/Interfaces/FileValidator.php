<?php

namespace Image\Downloader\Interfaces;

interface FileValidator
{
    /*
     *  method for validate type
     *  of file
     * @param string
     * @return boolean
     */

    public function validate(string $fileDescription);

    /*
     * method return rule for validate
     * @return array
     */
    public function rule();
}