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

<div class="cont">
    
<?php if($_COOKIE['admin']==1):?>
    <div class="adminpanel">
    <form action="adminadd.php" method="post" enctype="multipart/form-data" class="admininput">
        Пользователь    
        <input type="text"  placeholder="Логин" class="textarea" name="login" id="login"/>
        <input type="text"  placeholder="Имя" class="textarea" name="name" id="name"/>
        <input type="password"  placeholder="Пароль" class="textarea" name="password" id="password"/>
            Аватарка
        <input type="file" class="file" name="img_upload" id="img_upload"/>
        <button class="addbutton" type="submit" id="add" name="add">Добавить пользователя</button>
    </form>
    <?php
     $link= new mysqli('localhost','root','','register-bd');
     if(isset($_GET['del'])){
        $log=$_GET['del'];
         $query="DELETE FROM `users` WHERE `login`='$log'";
         mysqli_query($link,$query);
     }
     $result=$link->query("SELECT * FROM `users`");
     for($data=[];$row=$result->fetch_assoc();){
        if($row['login']!="admin"){
            $data[]=$row;
        }
     };
     ?>
     
     <table>
     <div class="tabletext">
     Пользователи
    </div>
    <tr>
    <td>Логин</td>
    <td>Имя</td>
     <?php foreach ($data as $user){?>
        <tr>
            <td><?=$user['login']?></td>
            <td><?=$user['name']?></td>
            <td><a href="?del=<?=$user['login']?>">Удалить</a></td>
            <td><a href="update.php?id=<?=$user['login']?>">Изменить</a></td>
        </tr>
        <?php }?>
     </table>
    <?php else:?>
        Данный пользователь не является админом
    <?php endif;?>

</body>

</html>