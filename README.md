# Library for download image by URL.
This library uses [Guzzle](https://github.com/guzzle/guzzle.git) PHP.

![LICENSE](https://img.shields.io/badge/license-MIT-blue) ![unstable](https://img.shields.io/badge/unstable-dev--master-green)

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
Create validate object or you can create your own class validate implement FileValidator class:

```
$imageValidator = new ImageValidator();
```

Create componet object and insert to ImageDownload:

```
$downloader = new Image\Downloader\ImageDownload($imageValidator);
```

For download you call method of ImageDownload class:

```
$downloader->imageDownloadByUrl($url, $pathSave, $fileName);
```
In accordance to method get image by url and will be save to your path with name.

### Example

```
$imageValidator = new ImageValidator();
$downloader = new Image\Downloader\ImageDownload($imageValidator);

$downloader->imageDownloadByUrl('https://24tv.ua/resources/photos/news/1200x675_DIR/201908/1195520.jpg?201908174431', 'image', 'field.jpg');
```
