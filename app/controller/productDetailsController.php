<?php
require_once __DIR__ . '/../model/UserModel.php';
require_once __DIR__ . '/../model/ProductModel.php';
require_once __DIR__ . '/../model/StoreModel.php';

class ProductDetailsController
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
    public function show_product_details($id)
    {
        $product = $this->productModel->get_product_by_id($id);
        $comments = $this->productModel->get_comments($id);
        $viewPath = __DIR__ . '/../view/product-details.php';
        include $viewPath;
    }
}
