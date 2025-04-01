<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/settings.css">
</head>
<body>
    <?php
    session_start();
    $back = $_SERVER['HTTP_REFERER'];
    echo '<a href="'.$back.'" id="back"><img src="../images/back.png"></a>';
    ?>
    <main>
        <div class="settings">
            <form action="../hanglers/settings_hangler.php">
                <h2>Изменить имя</h2><br>
                <input type="text" name="new_name"><input type="submit" value="Изменить" name="change_name"><br><br>
                <?php
                $err = isset($_GET['error'])? $_GET['error']:'';
                switch($err){
                    case'succes_change':
                        echo 'Успешно изменено<br>';
                        break;
                    case'error_change':
                        echo 'Это имя уже занято<br>';
                        break;
                }
                ?>
                <h2>Выйти из аккаунта</h2><br> 
                <input type="submit" value="Выйти" name="exitAcc"><br><br><br>

                <h2 style="color: red;">Удалить аккаунт</h2> <input type="submit" value="Удалить" name="deleteAcc"><br><br>

            </form><br><br><br>
            <h2>Жалобы и предложения </h2>
            <form action="../hanglers/settings_hangler.php">
                <textarea name="complaint" placeholder="Расскажите о вашем опыте игры"></textarea><br>
                <input type="submit" value="Отправить" name="reports"><br>
                <?php
                $err = isset($_GET['error'])?$_GET['error']:'';
                switch($err){
                    case'report_commit':
                        echo 'Спасибо за обратную связь!';
                }
                ?>
            </form>
        </div>
    </main>
</body>
</html>