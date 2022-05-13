<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
        <h1>Пятая лаба</h1>
        <form method="post" action="/scripts/mldm5labscripts.php">
        <textarea name="mass" placeholder="Введите матрицу смежности графа n*n"></textarea><br><br>
        <input type="submit" value="Подтвердить"><br>
        <p>Пример ввода:<br><br>
            0 4 1<br>
            0 0 7<br>
            0 0 0<br>
        </p>
        </form>
        <?php 
            if (isset($_SESSION['error_text']) && !empty($_SESSION['error_text'])) {
                echo '<p> Ошибка: '.$_SESSION['error_text'].'</p>';
            }
            unset($_SESSION['error_text']);
            if (isset($_SESSION['mas']) && !empty($_SESSION['mas'])) {
                echo '<p>'.$_SESSION['mas'].'</p>';
            }
            unset($_SESSION['mas']);
        ?> 
</body>
</html>