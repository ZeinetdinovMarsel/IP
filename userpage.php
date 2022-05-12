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
        <li class="link"><a href="userenter.php">Вход/Регистрация</a></li>
        <?php else:?>
        <li class="link active"><a href="userpage.php"><?=$_COOKIE['user']?></a> <a href="/exit.php">Выход</a></div>
    <?php endif;?>
    </ul>
</nav>
<div class="username">Пользователь:<a href="userpage.php" class="username"><?=$_COOKIE['user']?></a> <a href="/exit.php">Выход</a></div>

<div class="cont1">
    
<div class="userImage">
    <?php
    $login=$_COOKIE['login'];
    $mysql= new mysqli('localhost','root','','register-bd');
    $result=$mysql->query("SELECT * FROM `users` WHERE `login`='$login'");
    $user=$result->fetch_assoc();
    $image=base64_encode($user['image']);
   
    ?>
    <img src="data:image/jpeg;base64, <?php echo $image?>" alt="">
</div>
<div class="userinfo">
    Имя: <?=$_COOKIE['user']?><br>
    Логин: <?=$_COOKIE['login']?><br>
    admin: 
    <?php if($_COOKIE['admin']==0):?>
        Нет
    <?php else:?>
        Да
        <br>
        <a href="adminpage.php">Перейти на панель админа</a>
    <?php endif;?>
</div>
</div>
</body>

</html>