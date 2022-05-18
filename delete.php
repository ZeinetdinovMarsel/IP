<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/db.class.php";
$log = $_GET['del'];
if ($_POST['confirm_del'] == 1) {
        $query = "DELETE FROM `users` WHERE `login`='$log'";
        DB::query($query);
        header('Location:/adminpage.php?delid=1');
} else {
        header('Location:/adminpage.php?delid=0');
}
