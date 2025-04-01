<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/monster.css">
    <title>Document</title>
</head>
<body>
    <?php
    $back = $_SERVER['HTTP_REFERER'];
    ?>
    <main>
        <div class="overlay"></div>
        <div class="card-main">
            <?php
            if(isset($monster)){
                foreach($monster as $m){
                echo'<div class="picture">';
                    echo'<img src="../images//enemies/'.$m['monster_image'].'" alt="">';
                echo'</div>';
                echo'<div class="info">';
                    echo '<a href="'.$back.'" id="back"><img src="../images/back.png"></a>';
                    echo '<h2>'.$m['name'].'</h2>';
                    echo '<h3>Характеристики</h3>';
                    echo '<p> Сила '.$m['power'].'<br>';
                    echo 'Здоровье '.$m['health'].'</p>';
                    echo '<h4>Уязвимости</h4>';
                    echo '<p>'.$m['vulnerabilities'].'</p>'; 
                    echo '<h4>Краткая информация</h4>';
                    echo '<p>'.$m['description'].'</p><br>';   
                echo'</div>';
                }
            }
            ?>
        </div>
    </main>
</body>
</html>