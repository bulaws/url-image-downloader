<?php

namespace Image\Downloader\interfaces;

interface FileValidator
{
    /*
     *  method for validate type
     *  of file
     * @param string
     * @return boolean
     */

    public function validate($fileDescription);

    /*
     * method return rule for validate
     * @return array
     */
    public function rule();
}