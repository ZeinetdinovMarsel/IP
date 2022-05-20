<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <Link rel="stylesheet" href="styles/styles.css">
    <script type="text/javascript" src="scripts/galerey.js"></script>
</head>

<body>
    <div>
        <nav class="navbar" id="msgText">
            <div class="link-group-burger">
                <span></span>
            </div>
            <div class="link-group">
                <ul class="link-group">
                    <li class="link"><a href="index.php">Главная</a></li>
                    <li class="link"><a href="about_me.php">Обо мне</a></li>
                    <li class="link"><a href="contact_info.php">Контактная Информация</a></li>
                    <li class="link active"><a href="galerey.php">Галерея</a></li>
                    <li class="link"><a href="mldm.php">Лабораторные Млидм</a></li>
                    <?php
                    if ($_COOKIE['user'] == '') : ?>
                        <li class="link"><a href="userenter.php">Вход/Регистрация</a></li>
                    <?php else : ?>
                        <li class="link"><a href="game.php">Игра</a>
                        <li class="link"><a href="userpage.php"><?= $_COOKIE['user'] ?></a> <a href="/exit.php">Выход</a>
            </div>
        <?php endif; ?>
        </ul>
    </div>
    </nav>
    <div class="gallereymain">
        <div class="row">
            <div class="replaceimg" onclick="leftChangeImage()"><img src="img\strela.png"></div>
            <div id="mainImage"></div>
            <div class="replaceimg1" onclick="rightChangeImage()"><img src="img\strela.png"></div>
        </div>
        <div class="imgl">
            <div class="listimg" onclick="idChangeImage(1)"><img src="img\1.jpg"></div>
            <div class="listimg" onclick="idChangeImage(2)"><img src="img\2.jpg"></div>
            <div class="listimg" onclick="idChangeImage(3)"><img src="img\3.jpg"></div>
        </div>
    </div>


    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="scripts/burger.js"></script>
</body>

</html>