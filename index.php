<?php

require __DIR__."/vendor/autoload.php";

use Image\Downloader\ImageDownload;

$imageDownload = new ImageDownload();

$imageDownload->imageDownloadByUrl('https://stackoverflow.com/questions/38760592/how-to-get-response-body-in-guzzle', 'image', 'test.jpg');