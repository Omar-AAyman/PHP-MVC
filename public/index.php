<?php


use app\core\App;
use Dotenv\Dotenv;
use app\Controllers\AuthController;
use app\Controllers\SiteController;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv=Dotenv::createUnsafeImmutable(dirname(__DIR__));
$dotenv->load();


$config= [
    'db'=>[
        'hostName' => $_ENV['DB_HOSTNAME'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
        'database' => $_ENV['DB_NAME'],
        'port' => $_ENV['DB_PORT'],
    ],
];

$app = new App(dirname(__DIR__) , $config);

$app->router->get('/', [SiteController::class , 'home']);
$app->router->get('/contact', 'contact');
$app->router->get('/add-product', 'add-product');
$app->router->get('/contact', [SiteController::class , 'contact']);
$app->router->post('/contact', [SiteController::class, 'handleContact']);


$app->router->post('/login', [AuthController::class, 'login']);
$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/register', [AuthController::class, 'register']);
$app->router->get('/register', [AuthController::class, 'register']);

$app->router->get('/products-list', [SiteController::class , 'productsList']);
$app->router->get('/add-product', [SiteController::class , 'addProduct']);
$app->router->post('/add-product', [SiteController::class , 'addProduct']);

$app->router->post('/mass-delete', [SiteController::class , 'deleteProduct']);
$app->router->get('/mass-delete', [SiteController::class , 'deleteProduct']);


$app->run();
   