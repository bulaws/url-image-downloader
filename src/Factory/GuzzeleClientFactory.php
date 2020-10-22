<?php

namespace Image\Downloader\Factory;

use GuzzleHttp\Client;

class GuzzeleClientFactory
{
    public static function create()
    {
        return new Client();
    }
}