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
        <li class="link"><a href="index.php">Главная</a></li>
        <li class="link"><a href="about_me.php">Обо мне</a></li>
        <li class="link"><a href="contact_info.php">Контактная Информация</a></li>
        <li class="link"><a href="galerey.php">Галерея</a></li>
        <li class="link"><a href="mldm.php">Лабораторные Млидм</a></li>
        <?php
        if($_COOKIE['user']==''):?>
        <li class="link"><a href="userenter.php">Вход/Регистрация</a></li>
        <?php else:?>
        <li class="link active"><a href="game.php">Игра</a>
        <li class="link"><a href="userpage.php"><?=$_COOKIE['user']?></a> <a href="/exit.php">Выход</a></div>
    <?php endif;?>
    </ul>
    </div>
</nav>
<div class="allcont">

<div class="gamecont">
<div class="gameheadtext">
    Тест на дальтонизм
</div>
    <?php
    $link= new mysqli('localhost','root','','register-bd');
    if(isset($_GET['start'])){
        if($_COOKIE['login']!=NULL){
            $log=$_COOKIE['login'];
            $link->query("UPDATE `users` SET `gamescore` = '0' WHERE `users`.`login` = '$log'");
        }
        else{
            print("Пользователь не авторизован");
            exit();
        }
    }
    ?>
    <?php
    if(isset($_GET['game'])){
        $id=$_GET['game'];
        if($_GET['game']!=14){
        $result=$link->query("SELECT * FROM `game` WHERE id=$id");
        $game=$result->fetch_assoc();
    ?>
    <img src="gameimg/<?echo $_GET['game']?>.jpg" class="imgdaltest" alt="">
    <br>
    <div class="question">
    <?php
    print($game['idquestion']."<br>Если ничего не видите оставьте поле пустым<br>");
    ?>
    </div>
    <div class="numans">
    <?php
    if($_GET['game']==3){
        print("1) круг и треугольник  2) квадрат и круг  3) треугольник  4) круг");
    }
    elseif($_GET['game']==5){
        print("1) круг и треугольник  2) квадрат и круг  3) треугольник  4) круг");

    }
    elseif($_GET['game']==10){
        print("1) круг, квадрат и треугольник  2) квадрат и круг  3) треугольник и квадрат  4) круг, пятиугольник и квадрат");

    }
    elseif($_GET['game']==13){
        print("1) круг и квадрат  2) треугольник  3) треугольник и круг<br>4) Квадрат и треугольник");
    }
    ?>
    <form action="checkans.php?game=<?print($game['id'])?>" method="post" enctype="multipart/form-data">
    <input type="text" name="answer" id="answer">
    <button type="submit" class="startbutton">Ответить</button>
    </form>
    <?php
    }
    else{
        $log=$_COOKIE['login'];
        $end=$link->query("SELECT * FROM `users` WHERE `login`='$log'");
        $endmas=$end->fetch_assoc();
        ?>
        <div class="final">
        <?php
        print("Вы ответили на ".$endmas['gamescore']." из 13 вопросов<br>");
        if($endmas['gamescore']<7){
            print("У Вас большие проблемы с цветовостриятием. Советуем в ближайшее время посетить врача-офтальмолога");
        }
        else if($endmas['gamescore']>=7 and ($endmas['gamescore']<10)){
            print("У Вас есть проблемы с цветовостриятием. Советуем посетить врача-офтальмолога");
        }
        else if($endmas['gamescore']>=10 and ($endmas['gamescore']<13)){
            print("У Вас есть небольшие проблемы с цветовостриятием. Советуем выделить время на посещение к врачу-офтальмологу");
        }
        else if($endmas['gamescore']==13){
            print("У Вас есть нет проблем с цветовостриятием.");
        }
    ?>
    <br><br><a href="game.php" class="startbutton">Попробовать ещё раз</a>
    </div>
    <?php
    }
    }
    else{
    ?>
    <img class="imgdaltest" src="img/daltest.jpg"><br>
    <a href="?game=1&start=1"><button type="button" class="startbutton">Начать тест</button></a>

    <?php
    }
    ?>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="scripts/burger.js"></script>
</body>

</html>