
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/playing.css">
    <title>Document</title>
</head>
<body>
    <header>
        <?php
        session_start();
        $_SESSION['id_cell_for_exp'] = $_GET['id'];
        foreach($hero_stats as $h){
            echo'<div class="stats">';
            echo '<div class="view_name">'.$h['name_hero'].'</div>';
            echo '<div class="health">'.$h['health'].'</div>';
            echo '</div>';
        }
        ?>
    </header>
    <main>
        <div id="loadingScreen" class="loading-screen">Загрузка...</div>
        <div id="game">
            <?php
            echo '<img src="../images'.$image.'" alt="" id="map">';
            ?>
            <?php
            $index = 1;
            foreach($hero_stats as $h){
                echo '<div id="hero"><img src="../images/heroes'.$h['alt_img'].'"></div>';
                if($index > 1){
                    break;
                }
            }
            for($i = 0; $i < 5; $i++){
                foreach($units as $unit){
                    echo '<div id="enemy">';
                    echo '<img src="../images/enemies'.$unit['alt_img'].'"></img>';
                    echo '</div>';
                }
                $index++;
            }
            // foreach($location_items as $li){
            //     echo '<div id="item">';
            //     echo '<img src="../'.$li['item_image'].'" alt="" name="'.$li['name'].'">';
            //     echo '</div>';
            // }
            ?>
            <div class="exitloc"></div>
            <div class="death">
                <h1>Вы погибли</h1>
                <div class="selection">
                    <a href="" style="color: lightgreen">Заново</a>
                    <a href="../views/game.php" style="color: black;">Выйти</a>
                </div>
            </div>
        </div>
        <div class="overlay"></div>
    </main>
</body>
    <!-- <script src="../lib/jquery-3.7.1.min.js"></script>
    <script src="../scripts/playing.js"></script> -->
    <script src="../scripts/fight.js"></script>
</html>