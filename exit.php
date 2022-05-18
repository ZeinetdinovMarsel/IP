<?php
 setcookie('user',$user['name'],time()-3600,"/");
 setcookie('login',$user['login'],time()-3600,"/");
 setcookie('admin',$user['admin'],time()-3600,"/");
 setcookie('image',$user['image'],time()-3600,"/");
 header('Location:/')
?>