<?php
class ProductModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Count all products
    public function countProducts()
    {
        $stmt = $this->pdo->query("SELECT COUNT(*) FROM Product");
        return $stmt->fetchColumn(); // returns integer
    }
    public function getLatestNewArrivals($limit = 8)
    {
        $stmt = $this->pdo->prepare("
            SELECT p.*
            FROM Product p
            WHERE p.new_arrival = 1
            ORDER BY p.created_at DESC
            LIMIT ?
        ");
        $stmt->bindValue(1, (int)$limit, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getBestSellers($limit = 8)
    {
        $stmt = $this->pdo->prepare("
            SELECT p.*
            FROM Product p
            WHERE p.best_seller = 1
            ORDER BY p.created_at DESC
            LIMIT ?
        ");
        $stmt->bindValue(1, (int)$limit, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getHeroProduct($limit = 1)
    {
        $stmt = $this->pdo->prepare("
            SELECT p.*
            FROM Product p
            WHERE p.hero_banner = 1
            ORDER BY p.created_at DESC
            LIMIT ?
        ");
        $stmt->bindValue(1, (int)$limit, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function get_elements($category, $searchName, $page)
    {
        $perPage  = 9; // products per page
        $offset   = ($page - 1) * $perPage;

        $sql = "SELECT SQL_CALC_FOUND_ROWS *
            FROM Product WHERE 1=1";
        $params = [];

        if ($category !== 'all') {
            $sql .= " AND category_id = ?";
            $params[] = (int)$category;
        }
        if ($searchName !== '') {
            $sql .= " AND name LIKE ?";
            $params[] = "%$searchName%";
        }

        $sql .= " LIMIT $perPage OFFSET $offset";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // total rows for pagination
        $total = $this->pdo->query("SELECT FOUND_ROWS()")->fetchColumn();
        $totalPages = ceil($total / $perPage);

        return [
            'products' => $products,
            'totalPages' => $totalPages,
            'currentPage' => $page
        ];
    }
    public function get_product_by_id($id)
    {
        $sql = "SELECT * from Product WHERE product_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function get_comments($id)
    {
        $sql = "SELECT * from usercomment WHERE product_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
