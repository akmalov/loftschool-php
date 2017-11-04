<?php
function validationImage($filesArray, &$extension)
{
    if (is_null($filesArray)) {
        $extension = '';
        return false;
    }
    $imagesExtensions = ['bmp', 'gif', 'jpg', 'png', 'svg'];
    $maxFileSize = 1;
    $tmp_name = $filesArray['tmp_name'];
    $extension = preg_replace('/.*\./', '', $filesArray['name']);
    $extension = strtolower($extension);
    if (!in_array($extension, $imagesExtensions)) {
        echo 'Неверное расширение файла';
        die;
    }
    $type = mime_content_type($tmp_name);
    if (substr($type, 0, 5) !== 'image') {
        echo 'Загруженный файл не является картинкой';
        die;
    }
    if (filesize($tmp_name) > $maxFileSize * 1024 ** 2) {
        echo 'Размер файла должен быть не более ' . $maxFileSize . 'МБ';
        die;
    }
    return true;
}