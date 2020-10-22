<?php

namespace Image\Downloader\Validator;

use Image\Downloader\Interfaces\FileValidator;

class ImageValidator implements FileValidator
{
    /*
     * @inheritdoc
     */
    public function validate($fileDescription)
    {
        $rule = $this->rule();
        if (\in_array($fileDescription, $rule['fileType'])) {
            return true;
        }
        return false;
    }

    /*
     * @inheritdoc
     */
    public function rule()
    {
        return [
                    'fileType' =>[
                                'image/png',
                                'image/jpeg',
                                'image/gif',
                            ]
                ];
    }
}