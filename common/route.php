<?php

use Phroute\Phroute\RouteCollector;

$url = !isset($_GET['url']) ? "/" : $_GET['url'];

$router = new RouteCollector();

// filter check đăng nhập
$router->filter('auth', function () {
    if (!isset($_SESSION['auth']) || empty($_SESSION['auth'])) {
        header('location: ' . BASE_URL . 'login');
        die;
    }
});


// bắt đầu định nghĩa ra các đường dẫn
$router->get('/', function () {
    return "trang chủ";
});

$router->get('home-page', [App\Controllers\Home::class, 'home']);
$router->get('quan-li-san-pham', [App\Controllers\ProductController::class, 'index']);

$router->get('add_sp', [App\Controllers\ProductController::class, 'addProduct']);
$router->post('add_spPost', [App\Controllers\ProductController::class, 'addProductPost']);

$router->get('edit_sp/{id}', [App\Controllers\ProductController::class, 'editProduct']);
$router->get('edit_spPost', [App\Controllers\ProductController::class, 'editProductPost']);

$router->get('delete_sp/{id}', [App\Controllers\ProductController::class, 'deleteProduct']);


// $router->get('test', [App\Controllers\ProductController::class, 'index']);

// định nghĩa 1 route add-product và trỏ đến hàm trong product controllers
// khu vực cần quan tâm --end--
# NB. You can cache the return value from $router->getData() so you don't have to create the routes each request - massive speed gains
$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);

// Print out the value returned from the dispatched function
echo $response;
