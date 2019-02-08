<?php
/**
 * Created by PhpStorm.
 * User: pim
 * Date: 2/7/19
 * Time: 4:27 PM
 */

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/inc/splash-image.php';

$image_url = '/public/splash-image.jpg';
try {
    $image_url = splash_image();
} catch (Exception $e) {
    echo $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="nl">

<head title="YouPoop!">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <style>
        img {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>

<body>

    <img src="<?= $image_url?>" alt="splash-image.jpg" style="width:100%">

</body>

</html
