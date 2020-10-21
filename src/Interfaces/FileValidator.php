<?php

namespace Image\Downloader\Interfaces;

interface FileValidator
{
    /*
     * Method for file type validation
     * @param string
     * @return boolean
     */

    public function validate($fileDescription);

    /*
     * Method returns rule for validate
     * @return array
     */
    public function rule();
}