<?php
session_start();
require "dbconnect.php";

if (strlen($_POST['name']) >= 3){
    try {
        $sql = 'INSERT INTO model(model, colvo, picture_url) VALUES(:name,:colvo,:picture_url)';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':name', $_POST['name']);
        $stmt->bindValue(':colvo', $_POST['description']);
        $stmt->bindValue(':picture_url', $_POST['filename']);
        $stmt->execute();
        $_SESSION['msg'] = "Инструмент успешно добавлен";
        // return generated id
        // $id = $pdo->lastInsertId('id');

    } catch (PDOexception $error) {
        $_SESSION['msg'] = "Ошибка добавления инструмента: " . $error->getMessage();
    }
}
else $_SESSION['msg'] = "Ошибка добавления иструмента: модель инструмента должна содержать не менее 3х символов";

// перенаправление на страницу категорий
//$_SESSION['msg'] = "Ошибка";
header('Location: /');
//exit( );