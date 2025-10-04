<?php
require_once __DIR__ . '/../model/UserModel.php';
class LoginController
{
    private $userModel;

    public function __construct($pdo)
    {
        $this->userModel = new UserModel($pdo);
    }
    public function showForm()
    {
        $viewPath = __DIR__ . '/../view/login.php';
        if (file_exists($viewPath)) {
            include $viewPath;
        } else {
            http_response_code(404);
            echo "<h1>404 Page Not Found</h1>";
        }
    }
    public function login($data)
    {
        $user = $this->userModel->authenticate($data);

        if ($user) {
            // Regenerate session ID (security)
            session_regenerate_id(true);

            // Save user info into session
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['phone'] = $user['phone'];
            $_SESSION['address'] = $user['address'];

            // Redirect to home page
            header("Location: index.php?route=home");
            exit();
        } else {
            // Invalid login
            $_SESSION['error'] = "Invalid username or password.";
            header("Location: index.php?route=login");
            exit();
        }
    }
}
