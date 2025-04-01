<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/forms.css">
</head>
<body>
    <div class="overlay"></div>
    <?php
        session_start();
        if(isset($_SESSION['login'])){
            header('location: views/game.php');
        }
    ?>
    <main>
        <form action="hanglers/reg_han.php" method="POST">
            Логин <input type="text" name="unicLog"><br><br>
            Пароль <input type="password" name="wordCode"><br><br>
            <p>ВНИМАНИЕ! Если у вас нет аккаунта, перейдите, пожалуйста, по кнопке "Регистрация"</p>
            <input type="submit" value="Войти" name="enterNext" id="enter"><br><br>
            <input type="submit" value="Регистрация" name="registration" id="reg"><br><br>
            <div class="errs">
            <?php
            $err = isset($_GET['error'])?$_GET['error']:'';
            switch($err){
                case 'incorrectLenght':
                    echo '<h2>Ваш логин не может быть короче 5 символов, а пароль короче 10</h2>';
                    break;
                case 'incorrectUser':
                    echo'<h2>Неверный логин или пароль</h2>';
                    break;
            }
            ?>
            </div>
        </form>
    </main>
        
</body>
</html>