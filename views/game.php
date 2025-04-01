<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Into Dark</title>
</head>
<body>
   
    <header>
    <?php
        session_start();
        echo'<div class="left"><a href="../hanglers/existAcc.php">Выйти</a></div>';
        echo'<div class="right"><a href="user_stats.php">'.$_SESSION['login'].'</a></div>';
    ?>
    </header>
    <main>
        <!-- <div class="left-column">
            <div class="icon"></div>
            <div class="icon"></div>
            <div class="icon"></div>
            <div class="icon"></div>
            <div class="icon"></div>
            <div class="icon"></div>
            <div class="icon"></div>
            <div class="icon"></div>
        </div> -->
        <div class="map">
            <div class="top-row">
                <a href="../hanglers/location_han.php?id=1" class="cell2"><img src="../images/locations/forest.png" alt=""></a>
                <a href="../hanglers/location_han.php?id=2" class="cell3"><img src="../images/locations/farm.png" alt=""></a>
                <a href="../hanglers/location_han.php?id=3" class="cell4"><img src="../images/locations/old_town.png" alt=""></a>
                <a href="../hanglers/location_han.php?id=4" class="cell1"><img src="../images/locations/trash.jpeg" alt=""></a>
            </div>
            <div class="center-row">
                <a href="../hanglers/location_han.php?id=5" class="cell4"><img src="../images/locations/tourist.png" alt=""></a>
                <a href="../hanglers/location_han.php?id=6" class="cell2"><img src="../images/locations/observatory.jpeg" alt=""></a>
                <a href="../hanglers/location_han.php?id=7" class="cell1"><img src="../images/locations/school.jpeg" alt=""></a>
                <a href="../hanglers/location_han.php?id=8" class="cell3"><img src="../images/locations/motel.jpeg" alt=""></a>
            </div>
            <div class="center-row">
                <a href="../hanglers/location_han.php?id=9" class="cell3"><img src="../images/locations/fuel.jpeg" alt=""></a>
                <a href="../hanglers/location_han.php?id=10" class="cell1"><img src="../images/locations/hospital.jpeg" alt=""></a>
                <a href="../hanglers/location_han.php?id=11" class="cell4"><img src="../images/locations/criminal.png" alt=""></a>
                <a href="../hanglers/location_han.php?id=12" class="cell2"><img src="../images/locations/facture.png" alt=""></a>
            </div>
            <div class="bottom-row">
                <a href="../hanglers/location_han.php?id=13" class="cell1"><img src="../images/locations/zavod.jpeg" alt=""></a>
                <a href="../hanglers/location_han.php?id=14" class="cell2"><img src="../images/locations/shop.jpeg" alt=""></a>
                <a href="../hanglers/location_han.php?id=15" class="cell3"><img src="../images/locations/live_town.jpeg" alt=""></a>
                <a href="../hanglers/location_han.php?id=16" class="cell4"><img src="../images/locations/cordon.png" alt=""></a>
            </div>
        </div>
        <div class="right-column">
            <div class="icon">
                <a href="shelter.php"><img src="../icons/shelter.png" alt=""></a>
            </div>
            <div class="icon">
                <a href="../hanglers/catalog_h.php"><img src="../icons/hero.png" alt=""></a>
            </div>
            <div class="icon">
                <a href="user_stats.php"><img src="../icons/statistic.png" alt=""></a>
            </div>
            <div class="icon">
                <img src="../icons/backpack.png" alt="">
            </div>
            <div class="icon">
                <a href="../hanglers/catalog_m.php"><img src="../icons/beastiary.png" alt=""></a>
            </div>
            <div class="icon">
                <a href="storytelling.php"><img src="../icons/storytelling.png" alt=""></a>
            </div>
            <div class="icon">
                <a href="rules.php"><img src="../icons/rules.png" alt=""></a>
            </div>
            <div class="icon">
                <a href="settings.php"><img src="../icons/settings.png" alt="settings"></a>
            </div>
        </div>
    </main>
    <!-- <script src="../scripts/game.js"></script> -->
</body>
</html>