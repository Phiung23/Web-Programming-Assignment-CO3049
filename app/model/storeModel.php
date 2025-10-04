<?php
class StoreModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Count all stores
    public function countStores()
    {
        $stmt = $this->pdo->query("SELECT COUNT(*) FROM Store");
        return $stmt->fetchColumn(); // returns integer
    }

    // Retrieve the 8 latest new-arrival products
}
