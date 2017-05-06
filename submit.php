<?php
session_start();
include 'connect.php';
include 'loginheader.php';
if(isset($_SESSION['emuser'])&&isset($_SESSION['oname'])){
	$user=$_SESSION['emuser'];
	$oname=$_SESSION['oname'];
	$select = "SELECT * FROM dashboard where oname='$oname'";
	$query=mysqli_query($connect,$select);
	?>

	<center><h3 style="color:blue;">Internship requested by Students</h3></center><hr>
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
        					<th>Title</th>
        					<th>UserDetails</th>
        					<th>Applied on</th>
        				</tr>
        			</thead>
        			<tbody>
        				<tr>
        					<td><?php echo $row['title'];?></td>
        					<td><?php echo $row['user'];?></td>
        					<td><?php echo $row['applied_on'];?></td>
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