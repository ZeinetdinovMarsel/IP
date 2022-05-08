<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/styles.css">
    
</head>

<body>
<div class="head">
     
    <div class="headText">
        Изменить пользователя с логином <?=$_GET['id'];?>
    </div>
        <div class="username">Пользователь:<a href="userpage.php" class="username"><?=$_COOKIE['user']?></a> <a href="/exit.php">Выход</a></div>
</div>

<div class="cont">

<?php if($_COOKIE['admin']==1):?>
    <div class="adminpanel">
    <form action="adminedit.php?id=<?=$_GET['id'];?>" method="post" enctype="multipart/form-data" class="admininput">
        Пользователь    
        <input type="text"  placeholder="Новый логин" class="textarea" name="login" id="login"/>
        <input type="text"  placeholder="Новое имя" class="textarea" name="name" id="name"/>
        <input type="password"  placeholder="Новый пароль" class="textarea" name="password" id="password"/>
            Новая аватарка
        <input type="file" class="file" name="img_upload" id="img_upload"/>
        <button class="addbutton" type="submit" id="add" name="add">Изменить пользователя</button>
    </form>
    <?php else:?>
        Данный пользователь не является админом
    <?php endif;?>

</body>

</html>