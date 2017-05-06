<?php
session_start();
include 'connect.php';
include 'loginheader.php'; 
if(isset($_SESSION['user'])){
	$user=$_SESSION['user']; 
	if(isset($_SESSION['id'])){
		$id=$_SESSION['id'];
		$select="SELECT * FROM dashboard WHERE user='$user'";
		$query=mysqli_query($connect,$select);
		?>
		<center><h3 style="color:blue;">Your Application Dashboard</h3></center><hr>
		<div class="intern-display">
	<?php
	while($row=mysqli_fetch_array($query)){
		?>

		<div class="container-fluid individual_internship">
        <div class="individual_internship_details">
        	<div class="table-responsive">
        		<table class="table">
        			<thead>
        				<tr>
        					<th>Number</th>
        					<th>Title</th>
        				</tr>
        			</thead>
        			<tbody>
        				<tr>
        					<td><?php echo $row['id'];?></td>
        					<td><?php echo $row['title'];?></td>
        					<td></td>
        				</tr>
        			</tbody>
        		</table>
        	</div>
        </div>
        
    </div>
   <hr>
	<?php
	}	
	}
	else{
		header("location:/intern/process.php");
	}
}
else{
	header("location:/intern/main.php");
}
?>

<?php
include 'footer.php';
?>