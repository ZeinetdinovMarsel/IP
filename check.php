<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/db.class.php";
session_start();
$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
$password1 = filter_var(trim($_POST['password1']), FILTER_SANITIZE_STRING);

if (mb_strlen($login) < 5 || mb_strlen($login) > 90) {
   $_SESSION['error'] = "Недопустимая длина логина";
} else if (mb_strlen($name) < 3 || mb_strlen($name) > 50) {
   $_SESSION['error'] = "Недопустимая длина имени";
} else if (mb_strlen($password) < 2 || mb_strlen($password) > 12) {
   $_SESSION['error'] = "Недопустимая длина пароля(от 2 до 12 символов)";
} else if ($password != $password1) {
   $_SESSION['error'] = "Пароли не совпадают";
} else if (empty($_FILES['img_upload']['tmp_name'])) {
   $_SESSION['error'] = "Загрузите Аватарку";
}

$query = "SELECT * FROM users WHERE login = '$login'";
$res = DB::query($query);

if (($item = DB::fetch_array($res)) == true) {
   if ($chooseUserLogin != $item['login']) {
      $_SESSION['error'] = "Данный логин уже занят";
   }
}
if ($_SESSION['error'] != "") {
   header('Location:/userreg.php?login=' . $login . '&name=' . $name);
   exit();
}
$path = 'upload/avatars/' . time() . $_FILES['img_upload']['name'];
move_uploaded_file($_FILES['img_upload']['tmp_name'], $path);

$password = md5($password . "zxcghoul");

DB::query("INSERT INTO `users`(`login`,`password`,`name`,`image`) VALUES('$login','$password','$name','$path')");
header('Location:/userenter.php');
