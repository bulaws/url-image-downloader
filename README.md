# Library for download image by URL.
This library uses [Guzzle](https://github.com/guzzle/guzzle.git) PHP.

![LICENSE](https://img.shields.io/badge/license-%20GPL%20v3-blue) ![unstable](https://img.shields.io/badge/unstable-dev--master-green)

### Installation
The best way to install using [composer](https://getcomposer.org/download).
Run command in your project:

```
composer require "bulaws/url-image-downloader": "dev-master"
```

Or add to require section composer.json:

```
"bulaws/url-image-downloader": "dev-master"
```
And run composer update.

### Get starting
Create componet object

```
$downloader = new Image\Download\ImageDownload();
```

For download you call method of ImageDownload class:

```
$downloader->imageDownloadByUrl($url, $pathSave, $fileName);
```
In accordance to method get image by url and will be save to your path with name.

### Example

```
$downloader = new Image\Download\ImageDownload();

$downloader->imageDownloadByUrl('https://24tv.ua/resources/photos/news/1200x675_DIR/201908/1195520.jpg?201908174431', 'image', 'field.jpg');
```
