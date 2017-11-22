<?php
require_once 'vendor/autoload.php';
use Intervention\Image\ImageManager;

$file = 'images/PHP-logo.png';
$result = 'images/result.png';
$watermark = 'images/watermark.png';
$manager = new ImageManager();
$image = $manager->make($file)->rotate(45);
$image->resize(200, null, function ($constraint) {
    $constraint->aspectRatio();
});
$watermark = $manager->make($watermark);
$watermark->resize(100, 100)->opacity(30);
$image->insert($watermark, 'center')->save($result);
echo "<img src=\"$result\" alt=\"result\">";
