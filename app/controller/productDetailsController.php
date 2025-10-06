<?php
require_once __DIR__ . '/../model/UserModel.php';
require_once __DIR__ . '/../model/ProductModel.php';
require_once __DIR__ . '/../model/StoreModel.php';
require_once __DIR__ . '/../model/userCommentModel.php';


class ProductDetailsController
{
    private $userModel;
    private $productModel;
    private $storeModel;
    private $userCommentModel;


    public function __construct($pdo)
    {
        $this->userModel = new UserModel($pdo);
        $this->productModel = new ProductModel($pdo);
        $this->storeModel = new StoreModel($pdo);
        $this->userCommentModel = new UserCommentModel($pdo);
    }
    public function show_product_details($id)
    {
        $page = 'product';
        $product = $this->productModel->get_product_by_id($id);
        $comments = $this->productModel->get_comments($id);
        $viewPath = __DIR__ . '/../view/product-details.php';
        include $viewPath;
    }
    public function save_comments($data)
    {
        $product_id = $data['product_id'];
        $user_id = $_SESSION['user_id'];
        $comment = $data['comment'];
        $this->userCommentModel->save_comments($product_id, $user_id, $comment);
    }
}
