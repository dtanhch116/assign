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
// category
$router->get('categoris', [App\Controllers\CateController::class, 'index']);
$router->get('add_Cate', [App\Controllers\CateController::class, 'addCate']);
$router->post('add_CatePost', [App\Controllers\CateController::class, 'addCatePost']);
$router->get('edit_Cate/{id}', [App\Controllers\CateController::class, 'editCate']);
$router->post('edit_CatePost/{id}', [App\Controllers\CateController::class, 'editCatePost']);
$router->get('delete_Cate/{id}', [App\Controllers\CateController::class, 'deleteCate']);
//end category
// product
$router->get('quan-li-san-pham', [App\Controllers\ProductController::class, 'index']);
$router->get('add_sp', [App\Controllers\ProductController::class, 'addProduct']);
$router->post('add_spPost', [App\Controllers\ProductController::class, 'addProductPost']);
$router->get('edit_sp/{id}', [App\Controllers\ProductController::class, 'editProduct']);
$router->post('edit_spPost/{id}', [App\Controllers\ProductController::class, 'editProductPost']);
$router->get('delete_sp/{id}', [App\Controllers\ProductController::class, 'deleteProduct']);
// end product
//customer
$router->get('customer', [App\Controllers\CustomerController::class, 'index']);
$router->get('add_customer', [App\Controllers\CustomerController::class, 'addCustomer']);
$router->post('add_customerPost', [App\Controllers\CustomerController::class, 'addCustomerPost']);
$router->get('edit_customer/{id}', [App\Controllers\CustomerController::class, 'editCustomer']);
$router->post('edit_customerPost/{id}', [App\Controllers\CustomerController::class, 'editCustomerPost']);
$router->get('delete_customer/{id}', [App\Controllers\CustomerController::class, 'deleteCustomer']);
// end custommer

//login
$router->get('login', [App\Controllers\AccountController::class, 'index']);
$router->post('loginPost', [App\Controllers\AccountController::class, 'loginPost']);
$router->get('logout', [App\Controllers\AccountController::class, 'logout']);
$router->get('register', [App\Controllers\AccountController::class, 'register']);
$router->post('registerPost', [App\Controllers\AccountController::class, 'registerPost']);
// $router->get('delete_customer/{id}', [App\Controllers\AccountController::class, 'deleteCustomer']);

// $router->get('test', [App\Controllers\ProductController::class, 'index']);

// định nghĩa 1 route add-product và trỏ đến hàm trong product controllers
// khu vực cần quan tâm --end--
# NB. You can cache the return value from $router->getData() so you don't have to create the routes each request - massive speed gains
$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);

// Print out the value returned from the dispatched function
echo $response;
