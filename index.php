<?php
/**
 * Created by PhpStorm.
 * User: pim
 * Date: 2/7/19
 * Time: 4:27 PM
 */

require_once __DIR__ . '/vendor/autoload.php';
use google\appengine\api\cloud_storage\CloudStorageTools;
use google\appengine\api\cloud_storage\CloudStorageException;

$image_url = '/public/splash-screen.jpg';

try {
    $image_file = 'gs://youpoop/splash-screen.jpg';
    $image_url = CloudStorageTools::getImageServingUrl($image_file /*, ['secure_url' => true]*/);
    //$this->view->render($response, 'index.html', [ 'image_url' => $image_url ]);
} catch (Exception $e) {
    echo $e->getMessage();
}

?>

<h1>YouPoop</h1>

<img src="<?= $image_url?>" alt="splash-screen.jpg">

