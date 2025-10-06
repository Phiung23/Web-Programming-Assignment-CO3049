<?php
// index.php (Front Controller)

// 1. Start session
require_once __DIR__ . '/config/database-connect.php'; // if you want DB always ready
require_once __DIR__ . '/config/session-bootstrap.php';

// 2. Get route from URL (default = home)
$route = $_GET['route'] ?? 'home';
// 3. Basic router
switch ($route) {
    case 'home':
        require_once __DIR__ . '/app/controller/homeController.php';
        $controller = new HomeController($pdo);
        $controller->show();
        break;
    case 'home_new_arrivals':
        header('Content-Type: application/json');
        require_once __DIR__ . '/app/controller/homeController.php';

        $controller = new HomeController($pdo);
        $controller->showNewArrivals();
        break;
    case 'home_best_sellers':
        header('Content-Type: application/json');
        require_once __DIR__ . '/app/controller/homeController.php';

        $controller = new HomeController($pdo);
        $controller->showBestSellers();
        break;
    case 'about':
        require_once __DIR__ . '/app/controller/aboutController.php';
        $controller = new AboutController($pdo);
        $controller->show();
        break;
    case 'product':
        require_once __DIR__ . '/app/controller/productController.php';
        $controller = new ProductController($pdo);
        $controller->show($_GET);
        break;
    case 'get_filtered_products':
        header('Content-Type: application/json');
        require_once __DIR__ . '/app/controller/productController.php';
        $controller = new ProductController($pdo);
        $controller->show_elements($_GET);
        break;
    case 'product_details':
        require_once __DIR__ . '/app/controller/productDetailsController.php';
        $controller = new ProductDetailsController($pdo);
        $controller->show_product_details($_GET['id']);
        break;
    case 'post_comments':
        require_once __DIR__ . '/config/auth-check.php';
        require_once __DIR__ . '/app/controller/productDetailsController.php';
        $controller = new ProductDetailsController($pdo);
        $controller->save_comments($_POST);
        header("Location: index.php?route=product_details&id=" . urlencode($_POST['product_id']));
        exit();
        break;
    case 'contact':
    case 'faq':

        require_once __DIR__ . '/app/controller/PageController.php';
        $controller = new PageController();
        $controller->show($route);
        break;

    case 'register':
        // Registration page
        require_once __DIR__ . '/app/controller/registerController.php';
        $controller = new RegisterController($pdo);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->store($_POST);
            header("Location: index.php?route=home");
            exit();
        } else {
            $controller->showForm();
        }
        break;

    case 'login':
        // Registration page
        require_once __DIR__ . '/app/controller/loginController.php';
        $controller = new LoginController($pdo);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->login($_POST);
            header("Location: index.php?route=home");
            exit();
        } else {
            $controller->showForm();
        }
        break;
    case 'logout':
        require_once __DIR__ . '/app/controller/logoutController.php';
        $controller = new LogoutController();
        $controller->logout();
        header("Location: index.php?route=home");
        exit();
        break;

    default:
        http_response_code(404);
        echo "<h1>404 - Page Not Found</h1>";
}
