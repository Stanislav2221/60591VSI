<h1>Инструменты:</h1>
<?php

$result = $conn->query("SELECT model.id AS id, model.model AS cname,  model.picture_url, tools.name AS tname, firma.firm AS firm FROM model LEFT OUTER JOIN tools ON tools.id = model.idtools LEFT OUTER JOIN firma ON firma.id = model.idfirm");
while ($row = $result->fetch()) {

    echo'
        
        <div class="card border-dark mb-3" >
            <div class="card-body text-dark">
                <div class="row g-0">
                    <div class="col-md-1">  
                        <img src="'.$row['picture_url'].'" alt="Task picture" height="60px">
                    </div>
                    <div class="col-md-7">
                    <a class="nav-link" href="/index.php?page=t" >
                    <h4 class="card-title">' . $row['firm'] . '</h4>
                        <h5 class="card-title">' . $row['cname'] . '</h5>
                        <h6 class="card-title">' . $row['tname'] . '</h6>
                    </a>
                    </div>
                </div>
            </div>
            
        </div>
 
    ';

}
?>

