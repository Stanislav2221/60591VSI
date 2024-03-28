<?php
session_start();
require "dbconnect.php";
try {
    $result = $conn->query("SELECT * FROM model WHERE model.id=".$_GET['id']);
    $row = $result->fetch();
    if ($result->rowCount() == 0) throw new PDOException('Инструмент не найден', 1111 );
    $sql = 'DELETE FROM model WHERE id=:id';
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':id', $_GET['id']);
    $stmt->execute();
    $_SESSION['msg'] = "Интсрумент успешно удален";

    // return generated id
    // $id = $pdo->lastInsertId('id');
} catch (PDOexception $error) {
    header("http://60591vsi/index.php?page=c");
    $_SESSION['msg'] = "Ошибка удаления инструмента: " . $error->getMessage();

}
// перенаправление на главную страницу приложения
header('Location: http://60591vsi/index.php?page=c');
exit( );