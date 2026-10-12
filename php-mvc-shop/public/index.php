<?php

declare(strict_types=1);

session_start();

define('ROOT', dirname(__DIR__));

// Autoload classes trong namespace App\
spl_autoload_register(static function (string $class): void {
    $prefix = 'App\\';
    if (!str_starts_with($class, $prefix)) {
        return;
    }
    $file = ROOT . '/app/' . str_replace('\\', '/', substr($class, strlen($prefix))) . '.php';
    if (is_file($file)) {
        require $file;
    }
});

use App\Controllers\CartController;
use App\Controllers\OrderController;
use App\Controllers\ProductController;
use App\Core\Router;

$router = new Router();

// 🛒 Sản phẩm
$router->get('/', [ProductController::class, 'index']);
$router->get('/product/{id}', [ProductController::class, 'show']);

// 🛍️ Giỏ hàng
$router->get('/cart', [CartController::class, 'index']);
$router->post('/cart/add', [CartController::class, 'add']);
$router->post('/cart/update', [CartController::class, 'update']);
$router->post('/cart/remove', [CartController::class, 'remove']);

// 💳 Thanh toán
$router->get('/checkout', [OrderController::class, 'checkout']);
$router->post('/checkout', [OrderController::class, 'store']);

// 🚦 Dispatch request
$router->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
