<?php
class UserModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Insert new user into DB
    public function createUser($data)
    {
        $email = $data['email'];
        $password = $data['password'];
        $confirm_password = $data['confirm_password'];
        $username = $data['username'];
        $address = $data['address'];
        $phone = $data['phone'];
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $now = date("Y-m-d H:i:s");

        $stmt = $this->pdo->prepare(
            "INSERT INTO User (username, email, password_hash, role, created_at, address, phone)
             VALUES (?, ?, ?, ?, ?, ?, ?)"
        );

        // Here role is fixed as 'buyer' (or 2 if ENUM/integer)
        $stmt->execute([$username, $email, $hash, 'buyer', $now, $address, $phone]);

        return $this->pdo->lastInsertId();
    }

    // Optional: check if email/username exists (for validation)
    public function existsByEmail($email)
    {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM User WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetchColumn() > 0;
    }

    public function existsByUsername($username)
    {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM User WHERE username = ?");
        $stmt->execute([$username]);
        return $stmt->fetchColumn() > 0;
    }
    public function authenticate($data)
    {
        $username = $data['username'];
        $password = $data['password'];
        $stmt = $this->pdo->prepare("SELECT * FROM User WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password_hash'])) {
            return $user;  // return full user row if valid
        }

        return false; //
    }
    public function countUsers()
    {
        $stmt = $this->pdo->query("SELECT COUNT(*) FROM User");
        return $stmt->fetchColumn(); // returns an integer
    }
}
