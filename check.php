<?php
session_start();
$login=filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
$name=filter_var(trim($_POST['name']),FILTER_SANITIZE_STRING);
$password=filter_var(trim($_POST['password']),FILTER_SANITIZE_STRING);
$password1=filter_var(trim($_POST['password1']),FILTER_SANITIZE_STRING);

if(mb_strlen($login)<5 || mb_strlen($login)>90){
   $_SESSION['error'] ="Недопустимая длина логина";
}
else if(mb_strlen($name)<3 || mb_strlen($name)>50){
   $_SESSION['error'] ="Недопустимая длина имени";
}
else if(mb_strlen($password)<2 || mb_strlen($password)>12){
   $_SESSION['error'] ="Недопустимая длина пароля(от 2 до 12 символов)";
}
else if($password!=$password1){
   $_SESSION['error'] ="Пароли не совпадают";
}
else if(empty($_FILES['img_upload']['tmp_name'])){
   $_SESSION['error'] ="Загрузите Аватарку";
}

$mysql= new mysqli('localhost','root','','register-bd');

 if ($sql=$mysql->query("SELECT * FROM `users` WHERE `login`='$login'") and $sql->num_rows>0)
    { 
   $_SESSION['error'] ="Пользователь с таким логином уже существет"; 
 }
 if($_SESSION['error']!=""){
   header('Location:/userreg.php');
   exit();
} 
 $image=addslashes(file_get_contents($_FILES['img_upload']['tmp_name']));

 $password=md5($password."zxcghoul");

 $mysql->query("INSERT INTO `users`(`login`,`password`,`name`,`image`) VALUES('$login','$password','$name','$image')");
 $mysql->close();
 header('Location:/userenter.php');
?>