<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/catalogs.css">
    <title>Document</title>
</head>
<body>
    <main>
        <?php
        echo'<a href="../views/game.php" id="back"><img src="../images/back.png"></a>';
        if(isset($heroes))
        foreach($heroes as $h){
            echo'<a href="view_hero.php?id='.$h['id_hero'].'">';
            echo'<figure data-id="'.$h['id_hero'].'">';
            echo'<h4>'.$h['name_hero'].'</h4>';
            echo'<figcaption>';
            echo'<img src="../images/heroes'.$h['picture'].'" alt=""';
            echo'</figcaption>';
            echo'</figure>';
            echo'</a>';
        }
        ?>
    </main>
</body>
</html>