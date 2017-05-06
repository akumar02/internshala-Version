<?php
session_start();
include 'connect.php';
if(isset($_SESSION['user'])){
	session_unset($_SESSION['user']);
	header("location:/intern/ssignin.php");
}
else{
	header("location:/intern/ssignin.php");
}
session_destroy();
?>