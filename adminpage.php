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
        <li class="link active"><a href="userpage.php"><?=$_COOKIE['user']?></a> <a href="/exit.php">Выход</a></div>
    <?php endif;?>
    </ul>
    </div>
</nav>

<div class="cont">
    
<?php if($_COOKIE['admin']==1):?>
    <div class="adminpanel">
    <?php
        $link= new mysqli('localhost','root','','register-bd');
        $result=$link->query("SELECT * FROM `users`");
        for($data=[];$row=$result->fetch_assoc();){
           if($row['login']!="admin"){
               $data[]=$row;
           }
        }
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
     <div class="deleteform">  
     <?php
        if(isset($_GET['del'])){
            print("Вы точно хотите удалить пользователя ".$_GET['del']." ?");
        ?>
        
        <form action="delete.php?del=<?=$_GET['del']?>" method="post">
            <button type="submit" name="confirm_del" value="1" class="deletebut">ДА</button>
            <button type="submit" name="confirm_del" value="0" class="deletebut">НЕТ</button>
        </form>
    <?php
        }
        else if(!isset($_GET['delid'])){
            print("Вы ещё никого не трогали");
        }
        else if($_GET['delid']==1){
            print("Вы удалили пользователя");
        }
        else if($_GET['delid']==0){
            print("Вы пощадили пользователя");
        }
        
        ?>
        </div> 
    <?php else:?>
        Данный пользователь не является админом
    <?php endif;?>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="scripts/burger.js"></script>
</body>

</html>