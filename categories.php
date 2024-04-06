<h1>Каталог типов инструментов:</h1>
<?php
$result = $conn->query("SELECT tools.id AS id, tools.name AS tname, tools.url FROM tools");

while ($row = $result->fetch()) {

    echo'
        
        <div class="card border-dark mb-3" >
            <div class="card-body text-dark">
                <div class="row g-0">
                    <div class="col-md-1">  
                        <img src="'.$row['url'].'" alt="Task picture" height="60px">
                    </div>
                    <div class="col-md-7">
                    <a class="nav-link" href="/index.php?page=t" >
                    <h5 class="card-title">' . $row['tname'] . '</h5>
                    </a>
                    </div>
                    <div class="col-md-1">
                        <a href="deletecategory.php?id='.$row['id'].'" class="btn btn-danger">Удалить</a>
                    </div>
                </div>
            </div>
            
        </div>
 
    ';

}
?>
<div class="container">

    <h2>Создание типа инструмента</h2>
    <form method="post" action="insertcategory.php" enctype="multipart/form-data">
        <p><label>
                Тип инструмента: <input type="text" name="name">
            </label>
        <p><label>
                Изображение: <input type="file" name="filename">
            </label>
        <p><input type="submit" value="Создать">
    </form>
</div>

