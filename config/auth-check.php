<?php

$timeout = 1800; // 30 minutes

// Check login
if (!isset($_SESSION['user_id'])) {
    header("Location: /login.php");
    exit();
}

// Check idle timeout
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > $timeout)) {
    session_unset();
    session_destroy();
    header("Location: /login.php?msg=Session expired");
    exit();
}

// Update activity timestamp
$_SESSION['last_activity'] = time();
