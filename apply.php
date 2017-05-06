<?php
session_start();
if(!isset($_SESSION['user']) || empty($_SESSION['user'])) {
   header("location:/intern/ssignin.php");
}else{
	if(!isset($_GET['id'])){
		header("location:/intern/main.php");
	}else{
		$id=$_GET['id'];
		$_SESSION['id'] = $id;
		header("location:/intern/process.php");
		//echo $id;
	}
}

?>


