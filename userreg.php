<?php
    session_start();
?>
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
        <li class="link active"><a href="userenter.php">Вход/Регистрация</a></li>
        <?php else:?>
        <li class="link"><a href="userpage.php"><?=$_COOKIE['user']?></a> <a href="/exit.php">Выход</a></div>
    <?php endif;?>
    </ul>
    </div>
</nav>

<div class="container">
    Регистрация
    <form action="check.php" method="post" enctype="multipart/form-data" class="inputblock">
        <input type="text"  placeholder="Логин" class="textarea" name="login" id="login"/>
        <input type="text"  placeholder="Имя" class="textarea" name="name" id="name"/>
        <input type="password"  placeholder="Пароль" class="textarea" name="password" id="password"/>
            <input type="password"  placeholder="Повторный пароль" class="textarea" name="password1" id="password1"/>
            Аватарка
        <input type="file" class="file" name="img_upload" id="img_upload"/>
        <div class="errortxt"> <?php 
            if (!empty($_SESSION['error'])) {
                echo '<p>Ошибка регистрации: '.$_SESSION['error'].'</p>';
            }
            unset($_SESSION['error']);
            ?></div>
        <button class="regbutton" type="submit">Зарегестрироваться</button>
        
    </form>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="scripts/burger.js"></script>
</body>

</html>