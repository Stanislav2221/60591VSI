<h1>Инструменты:</h1>
<?php

$result = $conn->query("SELECT model.id AS id, model.model AS cname, model.colvo AS cdesc,  model.picture_url, tools.name AS tname FROM model LEFT OUTER JOIN tools ON tools.id = model.idtools");
while ($row = $result->fetch()) {

    echo'
        
        <div class="card border-dark mb-3" >
            <div class="card-header">Количество инструментов: ' . $row['C'] . '</div>
            <div class="card-body text-dark">
                <div class="row g-0">
                    <div class="col-md-1">  
                        <img src="'.$row['picture_url'].'" alt="Task picture" height="60px">
                    </div>
                    <div class="col-md-7">
                    <a class="nav-link" href="/index.php?page=t" >
                        <h5 class="card-title">' . $row['cname'] . '</h5>
                        <h6 class="card-title">' . $row['tname'] . '</h6>
                        <p class="card-text">' . $row['cdesc'] . '</p>
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

