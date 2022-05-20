<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/db.class.php";
session_start();
$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

$password = md5($password . "zxcghoul");

$result = DB::query("SELECT * FROM `users` WHERE `login`='$login' AND `password`='$password' ");

$user = $result->fetch_assoc();
if (count($user) == 0) {
  $_SESSION['error'] = "Пользователь не найден";
  header('Location:/userenter.php?login=' . $login);
  exit();
}
setcookie('user', $user['name'], time() + 3600, "/");
setcookie('login', $user['login'], time() + 3600, "/");
setcookie('admin', $user['admin'], time() + 3600, "/");
setcookie('image', $user['image'], time() + 3600, "/");

setcookie('gamescore', $user['gamescore'], time() + 3600, "/");
setcookie('highscore', $user['highscore'], time() + 3600, "/");

header('Location:/index.php');
