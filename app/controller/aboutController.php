<?php
require_once __DIR__ . '/../model/UserModel.php';
require_once __DIR__ . '/../model/ProductModel.php';
require_once __DIR__ . '/../model/StoreModel.php';

class AboutController
{
    private $userModel;
    private $productModel;
    private $storeModel;

    public function __construct($pdo)
    {
        $this->userModel = new UserModel($pdo);
        $this->productModel = new ProductModel($pdo);
        $this->storeModel = new StoreModel($pdo);
    }
    public function show()
    {
        $viewPath = __DIR__ . '/../view/about.php';
        if (file_exists($viewPath)) {
            $numUsers = $this->userModel->countUsers();
            $numProducts = $this->productModel->countProducts();
            $numStores = $this->storeModel->countStores();
            $page = 'about';
            include $viewPath;
        } else {
            http_response_code(404);
            echo "<h1>404 Page Not Found</h1>";
        }
    }
}
