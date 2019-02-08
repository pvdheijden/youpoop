<?php
/**
 * Created by PhpStorm.
 * User: pim
 * Date: 2/8/19
 * Time: 12:19 AM
 */

use Google\Cloud\Storage\StorageClient;

function splash_image() {
    $storage = new StorageClient();

    $bucket = $storage->bucket('youpoop');
    $object = $bucket->object('splash-image.jpg');

    return $object->info()['mediaLink'];
}

