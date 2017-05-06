<?php
session_start();
include 'connect.php';
if(isset($_SESSION['emuser'])){
	session_unset($_SESSION['user']);
	header("location:/intern/emsignin.php");
}
else{
	header("location:/intern/emsignin.php");
}
session_destroy();
?>