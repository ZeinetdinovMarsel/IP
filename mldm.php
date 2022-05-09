<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <Link rel="stylesheet" href="styles/styles.css">
</head>

<body>
<div>
    <div class="head">
        <div class="headText">
            Мои лабораторные работы МЛИДМ
        </div>
        <?php
        if($_COOKIE['user']==''):
    ?>
    <a href="userenter.php"><div class="user">
        Вход/Регистрация
    </div>
    </a>
    <?php else:?>
        <div class="username">Пользователь:<a href="userpage.php" class="username"><?=$_COOKIE['user']?></a> <a href="/exit.php">Выход</a></div>
    <?php endif;?>
    </div>
<a href="mldmlab1.php"><div class=buttontext><br>Первая лабораторная работа</div></a><br>
<a href="mldmlab2.php"><div class=buttontext><br>Вторая лабораторная работа</div></a>
</div>
</body>

</html>