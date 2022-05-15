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
        <li class="link"><a href="userenter.php">Вход/Регистрация</a></li>
        <?php else:?>
        <li class="link"><a href="game.php">Игра</a>
        <li class="link active"><a href="userpage.php"><?=$_COOKIE['user']?></a> <a href="/exit.php">Выход</a></div>
    <?php endif;?>
    </ul>
    </div>
</nav>
<?php
        $link= new mysqli('localhost','root','','register-bd');
        $log=$_GET['id'];
        $result=$link->query("SELECT * FROM `users` WHERE `login`='$log'");
        $data=$result->fetch_assoc();
        if($_COOKIE['admin']==1):
    ?>
<div class="cont">
    <div class="adminpanel">

    <form action="adminedit.php?id=<?print($data['login'])?>" method="post" enctype="multipart/form-data" class="admininput">
    Изменить пользователя с логином <?print($data['login'])?> 
        <input type="text" value="<?print($data['login'])?>"  placeholder="Новый логин" class="textarea" name="login" id="login"/>
        <input type="text" value="<?print($data['name'])?>" placeholder="Новое имя" class="textarea" name="name" id="name"/>
        <input type="password"  placeholder="Новый пароль" class="textarea" name="password" id="password"/>
            Новая аватарка
        <input type="file" class="file" name="img_upload" id="img_upload"/>
        <div class="errortxt"> <?php 
            if (!empty($_SESSION['error'])) {
                echo '<p>Ошибка ввода: '.$_SESSION['error'].'</p>';
            }
            unset($_SESSION['error']);
            ?></div>
        <button class="addbutton" type="submit" id="add" name="add">Изменить пользователя</button>
    </form>
    <?php else:?>
        Данный пользователь не является админом
    <?php endif;?>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="scripts/burger.js"></script>
</body>

</html>