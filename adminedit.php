<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/db.class.php";
session_start();
$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
$log = $_GET['id'];



if (mb_strlen($login) < 5 || mb_strlen($login) > 90) {
  $_SESSION['error'] = "Недопустимая длина логина";
} else if (mb_strlen($name) < 3 || mb_strlen($name) > 50) {
  $_SESSION['error'] = "Недопустимая длина имени";
} else if (mb_strlen($password) < 2 || mb_strlen($password) > 12) {
  $_SESSION['error'] = "Недопустимая длина пароля(от 2 до 12 символов)";
}

$password = md5($password . "zxcghoul");

$query = "SELECT * FROM users WHERE login = '$login'";
$res = DB::query($query);

if (($item = DB::fetch_array($res)) == true && $login != $log) {
  if ($chooseUserLogin != $item['login']) {
    $_SESSION['error'] = "Данный логин уже занят";
  }
}
if ($_SESSION['error'] != "") {
  header('Location:/update.php?id=' . $log);
  exit();
}
DB::query("UPDATE `users` SET `name` = '$name' WHERE `users`.`login` = '$log'");
DB::query("UPDATE `users` SET `password` = '$password' WHERE `users`.`login` = '$log'");
if (!empty($_FILES['img_upload']['tmp_name'])) {
  $path = 'upload/avatars/' . time() . $_FILES['img_upload']['name'];
  move_uploaded_file($_FILES['img_upload']['tmp_name'], $path);
  DB::query("UPDATE `users` SET `image` = '$path' WHERE `users`.`login` = '$log'");
}
DB::query("UPDATE `users` SET `login` = '$login' WHERE `users`.`login` = '$log'");

header('Location:/adminpage.php?delid=2');
