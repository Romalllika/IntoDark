<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/catalogs2.css">
    <title>Document</title>
</head>
<body>
    <main>
        <?php
        echo'<a href="../views/game.php" id="back"><img src="../images/back.png"></a>';
        foreach($monsters as $m){
            echo'<a href="view_monster.php?id='.$m['id_monster'].'">';
            echo'<figure data-id="'.$m['id_monster'].'">';
            echo'<h4>'.$m['name'].'</h4>';
            echo'<figcaption>';
            echo'<img src="../images/enemies/'.$m['monster_image'].'" alt="'.$m['monster_image'].'"';
            echo'</figcaption>';
            echo'</figure>';
            echo'</a>';
        }
        ?>
    </main>
    <!-- <script src="../lib/jquery-3.7.1.min.js"></script>
    <script src="../scripts/jq_m.js"></script> -->
</body>
</html>