<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/db.class.php";
$id = $_GET['game'];
$ans = $_POST['answer'];

$userlogin = $_COOKIE['login'];
$result = DB::query("SELECT * FROM `game` WHERE id=$id");
$game = $result->fetch_assoc();

$res = DB::query("SELECT * FROM `users` WHERE `login`='$userlogin'");
$user = $res->fetch_assoc();
if ($id != 1) {
    $count = $user['gamescore'];
} else {
    $count = 0;
}

if ($game['rightansw'] == $ans) {
    $count = $count + 1;
    DB::query("UPDATE `users` SET `gamescore` = '$count' WHERE `users`.`login` = '$userlogin'");
    if ($count >= $user['highscore']) {
        DB::query("UPDATE `users` SET `highscore` = '$count' WHERE `users`.`login` = '$userlogin'");
    }
}
setcookie('gamescore', $user['gamescore'], time() - 3600, "/");
setcookie('highscore', $user['highscore'], time() - 3600, "/");
setcookie('gamescore', $user['gamescore'], time() + 3600, "/");
setcookie('highscore', $user['highscore'], time() + 3600, "/");
$id = $id + 1;
header('Location:/game.php?game=' . $id);
