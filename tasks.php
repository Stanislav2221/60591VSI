<div class="container">

    <h2>Добавление инструментов</h2>
    <form method="post" action="insertcategory.php" enctype="multipart/form-data">
        <p><label>
                Модель инструмента: <input type="text" name="name">
            </label>
        <p><label>
                Количество интсрументов: <input type="text" name="description">
            </label>
        <p><label>
            Категория: <select name="id_category">
                <?
                $result = $conn->query("SELECT name FROM tools");
                while ($row = $result->fetch()) {
                    echo '<option value='.$row['id'].'>'.$row['name'].'</option>';

                }
                ?>
            </select>
            </label>
        <p><label>
                Изображение: <input type="file" name="filename">
            </label>
        <p><input type="submit" value="Создать">
    </form>
</div>