<?php
require_once __DIR__ . '/../model/ProductModel.php';

class HomeController
{
    private $productModel;

    public function __construct($pdo)
    {
        $this->productModel = new ProductModel($pdo);
    }
    public function show()
    {
        $viewPath = __DIR__ . '/../view/home.php';
        if (file_exists($viewPath)) {

            $latestProduct = $this->productModel->getLatestNewArrivals();
            $heroRows = $this->productModel->getHeroProduct(1); // returns array of rows
            $heroProduct = $heroRows[0] ?? null;
            $page = 'home';
            include $viewPath;
        } else {
            http_response_code(404);
            echo "<h1>404 Page Not Found</h1>";
        }
    }
    public function showNewArrivalS()
    {
        echo json_encode($this->productModel->getLatestNewArrivals(8));
    }
    public function showBestSellers()
    {
        echo json_encode($this->productModel->getBestSellers(8));
    }
}
