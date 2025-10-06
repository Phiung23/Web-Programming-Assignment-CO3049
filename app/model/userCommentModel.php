<?php
class UserCommentModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Count all stores
    public function save_comments($product_id, $user_id, $comment, $rating = null)
    {
        $stmt = $this->pdo->prepare("INSERT INTO usercomment (user_id, product_id, comment, created_at, rating) VALUES (?, ?, ?, NOW(), ?)");
        $stmt->execute([$user_id, $product_id, $comment, $rating]);
    }

    // Retrieve the 8 latest new-arrival products
}
