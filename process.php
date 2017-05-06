<?php
session_start();
include 'connect.php'; 
include 'loginheader.php';
if(isset($_SESSION['user'])){
	$user=$_SESSION['user']; 
    if(isset($_SESSION['id'])){
	$id=$_SESSION['id'];
	$item_sql="SELECT * FROM application WHERE id='$id'";
	$item_query=mysqli_query($connect,$item_sql);
	$row=mysqli_fetch_array($item_query);
	$title=$row['title'];
	$oname=$row['oname'];


	if(isset($_POST['submit'])){
		$why=$_POST['why'];
		$check_select="SELECT COUNT(id) FROM dashboard WHERE title='$title' AND user='$user'";
		//$check_select="SELECT * FROM dashboard WHERE title='$title' AND user='$user'";
		$check_query=mysqli_query($connect,$check_select);
		if($check_query==0){
			$insert="INSERT INTO dashboard(title,oname,user,why,applied_on) VALUES('$title','$oname','$user','$why',now())";
		    $query=mysqli_query($connect,$insert);
		    if($query){
			?>
			<script>
				alert("Congratulations");
			</script>
			<?php
			header("location:/intern/checkstatus.php");
		    }
		    else{
			?>
			<script>
				alert("Please try again");
			</script>
			<?php
			header("location:/intern/main.php");
		    
		    }
		}
		else{
			?>
			<script>alert("you have already applied for this internship");</script>
			<?php
		}
		

	}
}
else{
	header("location:main.php");
}
}
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
		<h2>Why you should be hired for an Internship?</h2>
			<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
			<textarea rows="15" cols="80" name="why"></textarea><br>
			<input type="submit" name="submit" value="submit">
			</form>
		</div>
	</div>
</div>
