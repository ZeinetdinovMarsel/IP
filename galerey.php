<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <Link rel="stylesheet" href="styles/styles.css">
    <script type="text/javascript" src="scripts/galerey.js"></script>
</head>

<body>
    <div class="head">
        <div class="headText">
        Моя Галерея
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
    <div class="gallereymain">
        <div class="replaceimg" onclick="leftChangeImage()"><img src="img\suka.png"></div>
            <div id="mainImage"></div>
        <div class="replaceimg1" onclick="rightChangeImage()"><img src="img\suka.png"></div>
    </div>
</body>

</html>