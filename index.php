<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <Link rel="stylesheet" href="styles/styles.css">
</head>

<body>

<nav class="navbar" id="msgText">
<div class="link-group-burger">
    <span></span>
</div>
<div class="link-group">
    <ul class="link-group">
        <li class="link active"><a href="index.php">Главная</a></li>
        <li class="link"><a href="about_me.php">Обо мне</a></li>
        <li class="link"><a href="contact_info.php">Контактная Информация</a></li>
        <li class="link"><a href="galerey.php">Галерея</a></li>
        <li class="link"><a href="mldm.php">Лабораторные Млидм</a></li>
        <?php
        if($_COOKIE['user']==''):?>
        <li class="link"><a href="userenter.php">Вход/Регистрация</a></li>
        <?php else:?>
        <li class="link"><a href="game.php">Игра</a>
        <li class="link"><a href="userpage.php"><?=$_COOKIE['user']?></a> <a href="/exit.php">Выход</a></div>
    <?php endif;?>
    </ul>
    </div>
</nav>

<section class="home-section active">
    <div><h1 class="hero-heading">Добро<br>пожаловать<br>на мой сайт</h1></div>
    <div id="home-img"></div>
</section>
<script type="text/javascript" src="scripts/indexscripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="scripts/burger.js"></script>
</body>

</html>