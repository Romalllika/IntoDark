<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/forms.css">
    <title>Document</title>
</head>
<body>
    <div class="overlay"></div>
    <?php
    session_start();
    if(isset($_SESSION['login'])){
        header('location: ../views/game.php');
    }
    ?>
    <main>
        <form action="../hanglers/hangler.php" method="POST">
            Логин <input type="text" name="username"> <br><br>
            Почта <input type="text" name="email"><br><br>
            Пароль <input type="password" name="pass1"><br><br>
            Повторите пароль <input type="password" name="pass2"><br><br>
            <input type="submit" value="Зарегистрироваться" id="reg">
            <?php
            $err = isset($_GET['error'])?$_GET['error']:'';
            switch ($err){
                case 'incorrectValues':
                    echo'<h2>Логин должен иметь длинну не менее 5 символов, <br>  пароль не менее 10 символов</h2>';
                    break;
                case'incorrectLenght':
                    echo'<h2>Логин должен иметь длинну не менее 5 символов, <br>  пароль не менее 10 символов</h2>';
                    break;
                case'incorrectPass':
                    echo'<h2>Пароли не совпадают</h2>';
                    break;
                case'incorrectEmail':
                    echo'<h2>Неверный формат почты</h2>';
                    break;
                case'incorrectUser':
                    echo'<h2>Такой пользователь уже существует</h2>';
                    break;
                case'super':
                    echo'<h2>Вы зарегистрированы!</h2><br>';
                    echo'<h2><a href="game.php">Продолжить</a></h2>';
                    break;
            }
            ?>
        </form>
    </main>
        
</body>
</html>