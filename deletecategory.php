<?php
session_start();
require "dbconnect.php";
try {
    $result = $conn->query("SELECT * FROM tools WHERE tools.id=".$_GET['id']);
    $row = $result->fetch();
    if ($result->rowCount() == 0) throw new PDOException('Категория инструмента не найдена', 1111 );
    $sql = 'DELETE FROM tools WHERE id=:id';
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':id', $_GET['id']);
    $stmt->execute();
    $_SESSION['msg'] = "Категория инcтрумента успешно удалена";

    // return generated id
    // $id = $pdo->lastInsertId('id');
} catch (PDOexception $error) {
    header("http://60591vsi/index.php?page=c");
    $_SESSION['msg'] = "Категория инструмента не может быть удалена, так как связана с элементами других таблиц " ;

}
// перенаправление на главную страницу приложения
header('Location: http://60591vsi/index.php?page=c');
exit( );