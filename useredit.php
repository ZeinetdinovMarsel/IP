<?php
session_start();
 $login=filter_var(trim($_POST['login']),FILTER_SANITIZE_STRING);
 $name=filter_var(trim($_POST['name']),FILTER_SANITIZE_STRING);
 $password=filter_var(trim($_POST['password']),FILTER_SANITIZE_STRING);
 $log=$_GET['id'];
 if(mb_strlen($login)<5 || mb_strlen($login)>90){
  $_SESSION['error'] ="Недопустимая длина логина";
}
else if(mb_strlen($name)<3 || mb_strlen($name)>50){
  $_SESSION['error'] ="Недопустимая длина имени";
}
else if(mb_strlen($password)<2 || mb_strlen($password)>12){
  $_SESSION['error'] ="Недопустимая длина пароля(от 2 до 12 символов)";
}

 
 $password=md5($password."zxcghoul");

 $mysql= new mysqli('localhost','root','','register-bd');
 if ($sql=$mysql->query("SELECT * FROM `users` WHERE `login`='$login'") and $sql->num_rows>0 and $login!=$log)
 { 
    $_SESSION['error'] ="Пользователь с таким логином уже существет"; 
    $mysql->close();
 }
 if($_SESSION['error']!=""){
  header('Location:/updateuser.php?id='.$log);
  exit();
} 
 $mysql->query("UPDATE `users` SET `name` = '$name' WHERE `users`.`login` = '$log'");
 $mysql->query("UPDATE `users` SET `password` = '$password' WHERE `users`.`login` = '$log'");
 if(!empty($_FILES['img_upload']['tmp_name'])){
   $image=addslashes(file_get_contents($_FILES['img_upload']['tmp_name']));
   $mysql->query("UPDATE `users` SET `image` = '$image' WHERE `users`.`login` = '$log'");
 }
 $mysql->query("UPDATE `users` SET `login` = '$login' WHERE `users`.`login` = '$log'");
 
 $mysql->close();


 setcookie('user',$user['name'],time()-3600,"/");
 setcookie('login',$user['login'],time()-3600,"/");
 setcookie('admin',$user['admin'],time()-3600,"/");
 setcookie('admin',$user['admin'],time()-3600,"/");

 $mysql= new mysqli('localhost','root','','register-bd');
 $result=$mysql->query("SELECT * FROM `users` WHERE `login`='$login' AND `password`='$password' ");
 $user=$result->fetch_assoc();

 setcookie('user',$user['name'],time()+3600,"/");
 setcookie('login',$user['login'],time()+3600,"/");
 setcookie('admin',$user['admin'],time()+3600,"/");
 setcookie('image',$user['image'],time()+3600,"/");

 header('Location:/userpage.php');
?>