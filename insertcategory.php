<?php
session_start();
require "dbconnect.php";

if (strlen($_POST['name']) >= 3){
    try {
        $sql = 'INSERT INTO tools(name, url) VALUES(:name,:url)';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':name', $_POST['name']);
        $stmt->bindValue(':url', $_POST['filename']);
        $stmt->execute();
        $_SESSION['msg'] = "Категория иструмента успешно добавлена";
        // return generated id
        // $id = $pdo->lastInsertId('id');

    } catch (PDOexception $error) {
        $_SESSION['msg'] = "Ошибка добавления категории инструмента: " . $error->getMessage();
    }
}
else $_SESSION['msg'] = "Ошибка добавления категории иструмента: категория инструмента должна содержать не менее 3х символов";

// перенаправление на страницу категорий
//$_SESSION['msg'] = "Ошибка";
header('Location: http://60591vsi/index.php?page=c');
//exit( );