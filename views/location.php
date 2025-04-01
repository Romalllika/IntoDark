<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/location.css">
    <title>Document</title>
</head>
<body>
    <?php
    session_start();
    $_SESSION['loc_id'] = $_GET['id'];
    ?>
    <main>
        <div class="overlay"></div>
        <div class="location-cell">
            <?php
            $id = isset($_GET['id'])?$_GET['id']:'';
            if(isset($locations)){
                foreach($locations as $loc){
                    echo'<div class="left">';
                        echo'<h2>'.$loc['location_name'].'</h2>';
                        echo'<div class="image">';
                            echo'<img src="../images'.$loc['image'].'" alt="">';
                        echo'</div>';
                    echo'</div>';

                    echo'<div class="right">';
                        echo'<div class="loot">';
                            echo'<h2>Можно найти</h2>';
                            echo'<div class="items">';

                            foreach($location_items as $item){
                                echo '<div class="desc">'.$item['description'].'</div>';
                                echo'<img src="../'.$item['item_image'].'" alt="" id="">';
                            }

                            echo'</div>';
                            echo'<h2>Опыт: '.$loc['experience'].'</h2>';
                        echo'</div>';
                    echo'</div>';
                    echo'<div class="description">';
                        echo'<p>'.$loc['description'].'</p>';
                    echo'</div>';

                    echo'<div class="enter"><a href="../hanglers/play_hangler.php?id='.$id.'"><p>Вперед</p></a></div>';
                    echo'<div class="back"><a href="../views/game.php"><p>Вернуться</p></a></div> ';
                }
            }
            ?>
        </div>
    </main>
    <!-- <script src="../lib/jquery-3.7.1.min.js"></script> -->
    <script src="../scripts/location_min.js"></script>
</body>
</html>