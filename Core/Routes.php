<?php
include "Router.php";
include "Controllers/Controller.php";
include "Controllers/LoginController.php";
include "Controllers/Account/User.php";

/*
mục đích include 'Modules/'.$path.'/Controllers/'.ucfirst($path).'.php'
$path là tên các folder ở trong modules
*/
$router = new Router();

$uriDefault = '/upfb';


// để lấy giá trị sau biến localhost '/project_php/app/'
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

// sau đó bỏ vào trong $routes để lấy được controller
$routes = [
    $uriDefault . '/' => 'Home::',
    $uriDefault . '/service' => 'Home::service',

    $uriDefault . '/user' => 'User::',

    $uriDefault . '/index' => 'Login::',
    $uriDefault . '/login' => 'Login::btnLogin',
    $uriDefault . '/register' => 'Login::register',

    $uriDefault . '/logout' => 'Login::btnLogout',
];


// đường dẫn truy cập vào các file có trong modules và lấy các file .php ở trong folder
$directory = dirname(__DIR__) . '\Modules\*/*.php';
$moduleFiles = glob($directory, GLOB_NOSORT | GLOB_BRACE);

$allRoutes = [];
foreach ($moduleFiles as $file) {

    //include Routes Modules\quanLyNhanVien/quanLyNhanVienRoutes.php
    include $file;
    // auto truy cập vào và lấy mảng ra và gộp lại
    // lệnh này lấy được quanLyHeThong và quanLyHopDong nối với Routes
    $routeVariable = basename($file, '.php');
    // Check if tồn tại và là 1 mảng thì kết hợp mảng đó lại
    if (isset($$routeVariable) && is_array($$routeVariable)) {
        $allRoutes = array_merge($allRoutes, $$routeVariable);
    }

}

$extendRoutes = $allRoutes;


/*dùng để gọp tất cả các mảng lại với nhau*/
$combinedRoutes = array_merge($routes,$extendRoutes);


if (array_key_exists($uri, $combinedRoutes)) {
    //lấy đường dẫn và so sánh với mảng và trả về controller
    $handler = $combinedRoutes[$uri];
    if ($uri === $uriDefault . '/') {  // Handle base route
        $handler = $routes[$uri];
    }

    if (!empty($handler)) {
        [$controllerClass, $method] = explode('::', $handler);

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $router->get($uri, $controllerClass . '::' . $method);
        } else {
            $router->post($uri, $controllerClass . '::' . $method);
        }
    } else {
        \Utils\Util::abort();
    }
} else {
    \Utils\Util::abort();
}