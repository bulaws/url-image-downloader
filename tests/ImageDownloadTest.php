<?php

use \PHPUnit\Framework\TestCase;
use Image\Downloader\ImageDownload;
use \Image\Downloader\Validator\ImageValidator;
use \Image\Downloader\Exception\UrlImageDownLoadException;


class ImageDownloadTest extends TestCase
{
    /**
     * Method for test download file
     */
    public function testImageDownloadByUrlCaseOne()
    {
        $imageValidator = new ImageValidator();

        $downloader = new ImageDownload($imageValidator);
        \mkdir('tests/image', 0777, true);
        try {
            $downloader->imageDownloadByUrl('https://24tv.ua/resources/photos/news/1200x675_DIR/201908/1195520.jpg?201908174431', 'tests/image', 'field.jpg');
        } catch (UrlImageDownLoadException $e) {
            throw new $e;
        }
        $file = \file_exists('tests/image/field.jpg');
        $this->assertTrue($file);
        \unlink('tests/image/field.jpg');
        \rmdir('tests/image');
    }

    /**
     * Method for test download file is not validate type
     * @expectedException UrlImageDownLoadException
     * @throws Exception
     */
    public function testImageDownloadByUrlCaseTwo()
    {
        $imageValidator = new ImageValidator();
        $downloader = new ImageDownload($imageValidator);
        \mkdir('tests/image', 0777, true);
        $downloader->imageDownloadByUrl('https://www.php.net/manual/ru/function.file-exists.php', 'tests/image', 'field.php');
        $file = \file_exists('tests/image/field.php');
        $this->assertFalse($file);
        \rmdir('tests/image');
    }
}