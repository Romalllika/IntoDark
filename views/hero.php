<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/hero.css">
    <title>Document</title>
</head>
<body>
    <main>
        <?php
        session_start();
        ?>
        <div class="overlay"></div>
        <div class="card-main">
            <!-- <div class="picture">
                <img src="" alt="">
            </div>
            <div class="info">
                <h3>Имя героя</h3>
                <h4>Характеристики</h4>
                <p>txt</p>
                <h4>Уязвимости</h4>
                <p>txt</p>
            </div> -->
            <?php
            $back = $_SERVER['HTTP_REFERER'];
            if(isset($hero))
            foreach($hero as $h){
                echo'<div class="picture">';
                    echo'<img src="../images/heroes'.$h['picture'].'" alt="">';
                echo'</div>';
                echo'<div class="info">';
                    echo '<a href="'.$back.'" id="back"><img src="../images/back.png"></a>';
                    echo'<h2>'.$h['name_hero'].'</h2>';
                    echo'<h3>Характеристики</h3>';
                    echo'<p>Сила: '.$h['power'].'<br>';
                    echo'Здоровье: '.$h['health'].'<br>';
                    echo'Броня: '.$h['armor'].'<br>';;
                    echo'Ловкость: '.$h['dexterity'].'<br>';;
                    echo'Оружие: '.$h['weapon_name'].'<br>';;
                    echo'Уровень: '.$h['level_hero'].'<br>';;
                    echo'Выжил в боях: '.$h['battles'].'<br></p>';
                    echo'<a href="../hanglers/game_hangler.php?select='.$h['id_hero'].'">Выбрать</a>';
                echo'</div>';
            }
            ?>
        </div>
    </main>

</body>
</html>