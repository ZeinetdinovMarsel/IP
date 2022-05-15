<?php
    $id=$_GET['game'];
    $ans=$_POST['answer'];
    $mysql= new mysqli('localhost','root','','register-bd');
    $userlogin=$_COOKIE['login'];
    $result=$mysql->query("SELECT * FROM `game` WHERE id=$id");
    $game=$result->fetch_assoc();

    $res=$mysql->query("SELECT * FROM `users` WHERE `login`='$userlogin'");
    $user=$res->fetch_assoc();
    if($id!=1){
        $count=$user['gamescore'];
    }
    else{
        $count=0;
    }
    
 if($game['rightansw']==$ans){
    $count=$count+1;
    $mysql->query("UPDATE `users` SET `gamescore` = '$count' WHERE `users`.`login` = '$userlogin'");
    if($count>=$user['highscore']){
        $mysql->query("UPDATE `users` SET `highscore` = '$count' WHERE `users`.`login` = '$userlogin'");
    }
 }
 $id=$id+1;
 header('Location:/game.php?game='.$id);
?>