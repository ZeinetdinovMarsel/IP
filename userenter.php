<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/styles.css">
    
</head>

<body>
<nav class="navbar" id="msgText">
    <ul class="link-group">
        <li class="link"><a href="index.php">Главная</a></li>
        <li class="link"><a href="about_me.php">Обо мне</a></li>
        <li class="link"><a href="contact_info.php">Контактная Информация</a></li>
        <li class="link"><a href="galerey.php">Галерея</a></li>
        <li class="link"><a href="mldm.php">Лабораторные Млидм</a></li>
        <?php
        if($_COOKIE['user']==''):?>
        <li class="link active"><a href="userenter.php">Вход/Регистрация</a></li>
        <?php else:?>
        <li class="link"><a href="userpage.php"><?=$_COOKIE['user']?></a> <a href="/exit.php">Выход</a></div>
    <?php endif;?>
    </ul>
</nav>

<div class="container">
    Вход
    <form action="auth.php" method="post" class="inputblock">
        <input type="text"  placeholder="Логин" class="textarea" name="login" id="login"/>
        <input type="password"  placeholder="Пароль" class="textarea" name="password" id="password"/>
        <button class="regbutton" type="submit">Войти</button>
    </form>
    <div class="quest">
    Ещё не Зарегестрирован?<br>
    <a href="userreg.php">Зарегестрироваться</a>
    </div>
</div>
</body>

</html>