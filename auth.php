<?php
require __DIR__ . '/dbconnect.php'; // Подключаем файл с подключением к базе данных

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST['login'];
    $password = md5($_POST['password']);

    $query = "SELECT * FROM \"user\" WHERE login = :login AND md5password = :password";
    $stmt = $conn->prepare($query);
    $stmt->execute(['login' => $login, 'password' => $password]);

    $user = $stmt->fetch();

    if ($user) {
        $_SESSION['msg'] = "Пользователь аутентифицирован.";
    }
    else $msg =  "Неправильное имя пользователя!";
}
?>