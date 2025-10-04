<?php
require_once __DIR__ . '/../model/UserModel.php';
class RegisterController
{
    private $userModel;

    public function __construct($pdo)
    {
        $this->userModel = new UserModel($pdo);
    }
    public function showForm()
    {
        $viewPath = __DIR__ . '/../view/register.php';
        if (file_exists($viewPath)) {
            include $viewPath;
        } else {
            http_response_code(404);
            echo "<h1>404 Page Not Found</h1>";
        }
    }
    public function store($data)
    {
        $password = $data['password'];
        $confirm_password = $data['confirm_password'];

        if ($password === $confirm_password) {
            // Save to DB
            try {
                $userId = $this->userModel->createUser($data);


                echo "User registered successfully!";
                // Session handling
                session_regenerate_id(true);
                // Log the user in immediately
                $_SESSION['user_id'] = $userId;
                $_SESSION['username'] = $data['username'];
                $_SESSION['role'] = 'buyer';
                $_SESSION['email'] = $data['email'];
                $_SESSION['phone'] = $data['phone'];
                $_SESSION['address'] = $data['address'];
                header("Location: index.php?route=home");
                exit();
            } catch (PDOException $e) {
                $_SESSION['error'] = "Registration failed: " . $e->getMessage();
                header("Location: index.php?route=register");
                exit();
            }
        } else {
            $_SESSION['error'] = "Passwords do not match!";
            header("Location: index.php?route=register");
            exit();
        }
    }
}
