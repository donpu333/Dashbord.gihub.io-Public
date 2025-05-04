<?php
require 'db_connect.php';

// Уничтожаем сессию
$_SESSION = array();

if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

session_destroy();

// Перенаправляем на страницу входа
header("Location: login.php");
exit();
?>
