<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/styles.css">
    
</head>

<body>
<nav class="navbar" id="msgText">
<div class="link-group-burger">
    <span></span>
</div>
<div class="link-group">
    <ul class="link-group">
        <li class="link"><a href="index.php">Главная</a></li>
        <li class="link"><a href="about_me.php">Обо мне</a></li>
        <li class="link"><a href="contact_info.php">Контактная Информация</a></li>
        <li class="link"><a href="galerey.php">Галерея</a></li>
        <li class="link"><a href="mldm.php">Лабораторные Млидм</a></li>
        <?php
        if($_COOKIE['user']==''):?>
        <li class="link"><a href="userenter.php">Вход/Регистрация</a></li>
        <?php else:?>
        <li class="link"><a href="game.php">Игра</a>
        <li class="link active"><a href="userpage.php"><?=$_COOKIE['user']?></a> <a href="/exit.php">Выход</a></div>
    <?php endif;?>
    </ul>
    </div>
</nav>
<div class="cont1">
    
<div class="userImage">
    <img src="<?php echo $_COOKIE['image']?>" alt="">
</div>
<div class="userinfo">
    Имя: <?=$_COOKIE['user']?><br>
    Логин: <?=$_COOKIE['login']?><br>
    Итог последней попытки: <?=$_COOKIE['gamescore']?> из 13 вопросов<br>
    Лучший счёт: <?=$_COOKIE['highscore']?> из 13 вопросов<br>
    admin: 
    <?php if($_COOKIE['admin']==0):?>
        Нет<br>
        <a href="updateuser.php?id=<?=$_COOKIE['login']?>">Изменить данные</a>
    <?php else:?>
        Да
        <br>
        <a href="adminpage.php">Перейти на панель админа</a>
    <?php endif;?>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="scripts/burger.js"></script>
</body>

</html>