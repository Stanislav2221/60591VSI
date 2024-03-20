<?php

$result = $conn->query("SELECT * FROM  tools ");

while ($row = $result->fetch()) {

    echo('Любой текст');
}
?>

