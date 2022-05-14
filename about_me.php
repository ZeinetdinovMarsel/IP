<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <Link rel="stylesheet" href="styles/styles.css">
</head>

<body>
<nav class="navbar" id="msgText">
<div class="link-group-burger">
    <span></span>
</div>
<div class="link-group">
    <ul class="link-group">
        <li class="link"><a href="index.php">Главная</a></li>
        <li class="link active"><a href="about_me.php">Обо мне</a></li>
        <li class="link"><a href="contact_info.php">Контактная Информация</a></li>
        <li class="link"><a href="galerey.php">Галерея</a></li>
        <li class="link"><a href="mldm.php">Лабораторные Млидм</a></li>
        <?php
        if($_COOKIE['user']==''):?>
        <li class="link"><a href="userenter.php">Вход/Регистрация</a></li>
        <?php else:?>
        <li class="link"><a href="userpage.php"><?=$_COOKIE['user']?></a> <a href="/exit.php">Выход</a></div>
    <?php endif;?>
    </ul>
    </div>
</nav>

<section class="about-section">

    <div class="about-img-container">
        <p class="about-info"> <img src="img/Mypic.jpg" class="about-img"><br>Здравствуйте читатели, меня зовут Марсель. Я родился в городе Ульяновск, восемнадцать с половиной лет тому назад. Учусь на данный момент в Ульяновском государственном техническом университете на направлении «Информатика и вычислительная техника» в группе «Автоматизированные системы обработки информации и управления» факультета информационных систем и технологий. Пока что владею основами языка программирования Си, но сейчас я изучаю Java, JavaScript, Php, и немножечко C#.<br>О своих хобби, увлечениях я могу сказать, что, как и многие в наше время люблю поиграть в компьютерные игры, но, к сожалению, или к счастью времени не особо сейчас хватает чтобы поиграть в них. Из других увлечений я могу рассказать про создание своей музыки. Свои “шедевры” я пишу в программе FL studio 20, данная программа очень хорошо подходит для не особо сложных композиций, но если постараться и установить немалое количество плагинов, то можно добиться огромного успеха.</p>
            
</div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="scripts/burger.js"></script>
</body>
</html>