<?php

use \PHPUnit\Framework\TestCase;
use \Image\Downloader\Validator\ImageValidator;

class ImageValidatorTest extends TestCase
{
    /**
     * Method for test
     */
    public function testValidate()
    {
        $imageValidator = new ImageValidator();
        $this->assertTrue($imageValidator->validate($this->ImageValidatorProvider()[0]));
        $this->assertFalse($imageValidator->validate($this->ImageValidatorProvider()[1]));
        $this->assertFalse($imageValidator->validate($this->ImageValidatorProvider()[2]));
    }

    public function ImageValidatorProvider()
    {
        return [
            'image/png',
            'error',
            'image/txt',
        ];
    }
}