<!DOCTYPE html>
<html>
<head></head>
<body>
<?php
session_start();
include 'connect.php';
include 'eloginheader.php';
if(isset($_SESSION['emuser'])){
	$user=$_SESSION['emuser'];
	$select="SELECT * FROM elogin WHERE email='$user' ";
	$know=mysqli_query($connect,$select);
	$row=mysqli_fetch_array($know);
	?>
	<center><h4>Welcome&nbsp;&nbsp;&nbsp;&nbsp;<?php
	echo $row['email'];
	?>
	</h4></center>
	<?php
	$oname=$row['oname'];
	$_SESSION['oname']=$oname;
	echo "<br>";
	?>
	<!-- this section of the page will contain the management section for the employee
	      regarding the internship -->

<center><h2 style="color:blue;">Post Internship</h2><h3>Please fill the details to post internship</h3></center>
<hr>
<center><h4 style="color:blue;"><a href="submit.php">Check Request Status</a><br></h4></center>
<hr>
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-lg-offset-2">
				<br />
				<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
					<div class="form-group">
						<label for="First Name">Title</label>
						<input type="text" class="form-control" placeholder="Title" name="title"/>
					</div>
					<div class="form-group">
						<label for="Last Name">Description</label>
						<input type="text" class="form-control" placeholder="description" name="description" />
					</div>
					<div class="form-group">
						<label for="Email">Stipend</label>
						<input type="text" class="form-control" placeholder="stipend" name="stipend"/>
					</div>
					<div class="form-group">
						<label for="apply">Apply By:</label>
						<input type="date" class="form-control" name="apply"/>
					</div>
					<input type="submit" class="btn btn-default" value="Post" name="submit">
				</form>
			</div>
		</div>
	</div>
<hr>	
	<?php

	if(isset($_POST['submit'])){
		$title=$_POST['title'];
		$description=$_POST['description'];
		$stipend=$_POST['stipend'];
		$apply=$_POST['apply'];

		if(!empty($title)&&!empty($description)&&!empty($stipend)&&!empty($apply)){
			$insert="INSERT INTO application(user,title,description,stipend,start,apply,oname) VALUES('$user','$title','$description','$stipend',now(),'$apply','$oname')";
			$query=mysqli_query($connect,$insert);
			if($query){
				?>
				<script>
					alert("Internship Posted sucessfully");
				</script>
				<?php
			}
			else{
				echo "please try again to post internship";
			}
		}

	}
	
	?>

<!-- to display the  Posted internship -->
<center><h3 style="color:blue;">You have Posted</h3></center>
	<div class="intern-display">
	<?php
	$display="SELECT * FROM application WHERE user='$user'";
	$dquery=mysqli_query($connect,$display);
	while($drow=mysqli_fetch_array($dquery)){
		?>
		<div class="container-fluid individual_internship">
		<div class="individual_internship_header" >
			<div class="table-cell">
				<h4><?php echo $drow['title'];?></a></h4>
				<h4><?php echo $row['oname'];?></a></h4>
			</div>
			<div class="table-cell">
				<div class="internship_logo">
					<?php echo $drow['description'];?>
				</div>
			</div>    
        </div>
        <div class="individual_internship_details">
        	<div class="table-responsive">
        		<table class="table">
        			<thead>
        				<tr>
        					<th>Stipend</th>
        					<th>Posted On</th>
        					<th>Apply By</th>
        				</tr>
        			</thead>
        			<tbody>
        				<tr>
        					<td><?echo $drow['stipend'];echo "/m"; ?></td>
        					<td><?php echo $drow['start'];?></td>
        					<td><?php echo $drow['apply'];$id=$row['id'];?></td>
        				</tr>
        			</tbody>
        		</table>
        	</div>
        </div>
        
    </div>
   <hr>
		<?php
	}
	?>
	</div>
	<?php

}

?>

<?php
include 'footer.php';
?>

</body>
</html>