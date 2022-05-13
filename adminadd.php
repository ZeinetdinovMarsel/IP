<?php
$login=filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
$name=filter_var(trim($_POST['name']),FILTER_SANITIZE_STRING);
$password=filter_var(trim($_POST['password']),FILTER_SANITIZE_STRING);

if(mb_strlen($login)<5 || mb_strlen($login)>90){
    echo "Недопустимая длина логина";
    exit();
}
else if(mb_strlen($name)<3 || mb_strlen($name)>50){
   echo "Недопустимая длина имени";
   exit();
}
else if(mb_strlen($password)<2 || mb_strlen($password)>12){
   echo "Недопустимая длина пароля(от 2 до 12 символов)";
   exit();
}
else if(empty($_FILES['img_upload']['tmp_name'])){
  echo "Загрузите Аватарку";
  exit();
}
$image=addslashes(file_get_contents($_FILES['img_upload']['tmp_name']));

$password=md5($password."zxcghoul");

$mysql= new mysqli('localhost','root','','register-bd');

 if ($sql=$mysql->query("SELECT * FROM `users` WHERE `login`='$login'") and $sql->num_rows>0)
    { 
    echo "Пользователь с таким логином уже существет"; 
    $mysql->close();
    exit();
 } 
 $image=addslashes(file_get_contents($_FILES['img_upload']['tmp_name']));

 $password=md5($password."zxcghoul");

 $mysql->query("INSERT INTO `users`(`login`,`password`,`name`,`image`) VALUES('$login','$password','$name','$image')");
 $mysql->close();
 header('Location:/adminpage.php')
?>