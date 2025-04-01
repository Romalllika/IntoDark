<?php
include '../hanglers/user_stats_hangler.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/stats.css">
</head>
<body>
    <main>
        <div class="card-main">
            <?php
            session_start();
            $back = $_SERVER['HTTP_REFERER'];
            if(isset($user)){
                foreach($user as $u){
                echo'<div class="picture">';
                    echo'<img src="../images/heroes'.$u['picture'].'" alt="">';
                echo'</div>';
                echo'<div class="info">';
                    echo '<a href="'.$back.'" id="back"><img src="../images/back.png"></a>';
                    echo '<h2>'.$u['username'].'</h2>';
                    echo '<h3>'.$u['level'].' уровень</h3>';
                    echo '<h4>Опыт: '.$_SESSION['user_exp'].'/100</h4>';
                    echo '<h4>Любимый герой: '.$u['name_hero'].'</h4>';
                echo'</div>';
                }
            }
            ?>
        </div>
    </main>
</body>
</html>