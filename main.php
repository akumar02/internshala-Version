<?php
session_start();
include 'connect.php';
include 'loginheader.php';
if(isset($_SESSION['user'])){
	$user=$_SESSION['user'];
	$select="SELECT * FROM studentlogin WHERE email='$user' ";
	$know=mysqli_query($connect,$select);
	$row=mysqli_fetch_array($know);
	?>
	<center><h4>Welcome&nbsp;&nbsp;&nbsp;&nbsp;<?php
	echo $row['email'];
	?>
	</h4></center>
	<?php
	include 'show.php';
}

?>

<?php
include 'footer.php';
?>