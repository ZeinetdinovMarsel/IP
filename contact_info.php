<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <Link rel="stylesheet" href="styles/styles.css">
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
        <li class="link active"><a href="contact_info.php">Контактная Информация</a></li>
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
<div class="block">
<div class="blockinf">
    <div class="icons">
        <div class="gmail">
            <div class="infotext">
                marsel.zeinetdinov@gmail.com
            </div>
        </div>
        <div class="mail">
            <div class="infotext">
                marsel.zeinetdinov@mail.ru
            </div>
        </div>
        <div class="viber">
            <div class="infotext">
                +7-(953)-984-92-88
            </div>
        </div>
    </div>
<div class="soc">
    <div class="socic">

        <tr>
            <td>
                    <a href="https://vk.com/blackboy1337"><div class="vk">
                        </div>
                    </a>
                    <a href="https://www.instagram.com/_.ha4._.truka4._/"><div class="inst">
                        </div>
                    </a>
            </td>
            <td>
                    <a href="https://steamcommunity.com/profiles/76561198259404726"><div class="steam">
                        </div>
                    </a>
                    <a href="https://github.com/ZeinetdinovMarsel"><div class="git">
                        </div>
                    </a>
            </td>
        </tr>

</div>
</div>        
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="scripts/burger.js"></script>
</body>

</html>