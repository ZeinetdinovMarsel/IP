<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles/styles.css">
    
</head>

<body>
<div class="head">
     
    <div class="headText">
    Вход/Регистрация
    </div>
    <a href="userenter.php"><div class="user">
    </div>
    </a>
</div>

<div class="container">
    Регистрация
    <form action="check.php" method="post" enctype="multipart/form-data" class="inputblock">
        <input type="text"  placeholder="Логин" class="textarea" name="login" id="login"/>
        <input type="text"  placeholder="Имя" class="textarea" name="name" id="name"/>
        <input type="password"  placeholder="Пароль" class="textarea" name="password" id="password"/>
            Аватарка
        <input type="file" class="file" name="img_upload" id="img_upload"/>
        <button class="regbutton" type="submit">Зарегестрироваться</button>
    </form>
    Вход
    <form action="auth.php" method="post" class="inputblock">
        <input type="text"  placeholder="Логин" class="textarea" name="login" id="login"/>
        <input type="password"  placeholder="Пароль" class="textarea" name="password" id="password"/>
        <button class="regbutton" type="submit">Вход</button>
    </form>
    
</div>
</body>

</html>