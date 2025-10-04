<?php
require_once __DIR__ . '/../model/UserModel.php';
require_once __DIR__ . '/../model/ProductModel.php';
require_once __DIR__ . '/../model/StoreModel.php';

class ProductController
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
    public function show($data)
    {
        $viewPath = __DIR__ . '/../view/product.php';
        if (file_exists($viewPath)) {
            $page = 'product';
            $cate = $data['cat'];
            include $viewPath;
        } else {
            http_response_code(404);
            echo "<h1>404 Page Not Found</h1>";
        }
    }
    public function show_elements($data)
    {
        $category = $data['category'] ?? 'all';
        $searchName   = $data['search'] ?? '';
        $page = isset($data['page']) ? (int)$data['page'] : 1;
        echo json_encode($this->productModel->get_elements($category, $searchName, $page));
    }
    public function show_product_details($id)
    {
        $product = $this->productModel->get_product_by_id($id);
        $viewPath = __DIR__ . '/../view/product-details.php';
        include $viewPath;
    }
}
