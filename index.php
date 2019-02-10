<?php
/**
 * Created by PhpStorm.
 * User: pim
 * Date: 2/7/19
 * Time: 4:27 PM
 */

require_once __DIR__ . '/vendor/autoload.php';

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require_once __DIR__ . '/inc/splash-image.php';

$container = new Slim\Container();
$container['settings']['displayErrorDetails'] = true;
$container['logger'] = function($c) {
    if (!getenv('GAE_APPLICATION')) {
        return new Apix\Log\Logger\ErrorLog();
    } else {
        return Google\Cloud\Logging\LoggingClient::psrBatchLogger('youpoop');
    }
};
$container['view'] = new \Slim\Views\PhpRenderer('./templates/');
$container['cache'] = function($c) {
    return new Slim\HttpCache\CacheProvider();
};

$app = new Slim\App($container);
$app->add(new Slim\HttpCache\Cache('public', 60, true));

$app->get('/', function (Request $request, Response $response, array $args) {
    $response = $this->view->render($response, 'index.html', [
       'image_url' => splash_image('./inc/splash-image.jpg')
    ]);

    return $response;
});

$app->run();
