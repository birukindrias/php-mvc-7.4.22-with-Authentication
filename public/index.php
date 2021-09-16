<?php

use App\controller\authController;
use App\controller\chatController;
use App\controller\postController;
use App\controller\SiteController;
use App\core\App;

// echo '<pre>';
include_once '../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();
$config = [
    'user' => \App\models\users::class,

    'db' => [
        'dsn' => $_ENV['DB_HOST'],
        'user' => $_ENV['DB_USER'],
        'pass' => $_ENV['DB_PASS'],
    ],
];
$App = new App(dirname(__DIR__), $config);

$App->router->get('/', [SiteController::class, 'home']);
$App->router->get('/profile', [SiteController::class, 'profile']);
$App->router->get('/auth', [SiteController::class, 'auth']);
$App->router->get('/register', [authController::class, 'register']);
$App->router->post('/register', [authController::class, 'register']);
$App->router->post('/login', [authController::class, 'login']);
$App->router->get('/login', [authController::class, 'login']);
$App->router->get('/logout', [authController::class, 'logout']);
$App->router->get('/posts', [postController::class, 'posts']);
$App->router->post('/', [postController::class, 'posts']);
$App->router->get('/chat', [chatController::class, 'chat']);
$App->router->post('/chat', [chatController::class, 'chat']);
$App->run();
