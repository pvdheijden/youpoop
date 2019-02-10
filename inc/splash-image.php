<?php
/**
 * Created by PhpStorm.
 * User: pim
 * Date: 2/8/19
 * Time: 12:19 AM
 */

use Google\Cloud\Storage\StorageClient;

function splash_image(string $default) {
    global $app;
    $logger = $app->getContainer()->logger;

    $image_url = $default;
    try {
        $storage = new StorageClient();

        $bucket = $storage->bucket('youpoop');
        $object = $bucket->object('splash-image.jpg');

        $image_url = $object->info()['mediaLink'];
    } catch (Exception $e) {
        $logger->error($e->getMessage());
    }

    return $image_url;
}