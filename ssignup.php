


<?php
include 'connect.php';
include 'header.php';
if(isset($_POST['submit'])){
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	if(!empty($fname)&&!empty($lname)&&!empty($email)&&!empty($password)){
		$checkquery="SELECT * FROM studentlogin WHERE email='$email'";
        $usercheck=mysqli_query($connect,$checkquery);
        $count=mysqli_num_rows($usercheck);

        if($count==0){
        	$insert="INSERT INTO studentlogin(lname,fname,email,password) VALUES('$lname','$fname','$email','$password')";
        	$query=mysqli_query($connect,$insert);
        	if($query){
        		echo "Successfully created,Please login to proceed";
        	}
        	else{
        		echo "Please try again";
        	}
        }
        else{
        	echo "username exists,Signup again"."<br>";
        	?>
        	<?php
        }
    }
    else{
        ?>
        <script>
            alert("Fields should not be empty");
        </script>
    	<?php
    }
}

?>

<!Doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="jquery.min.js"></script>
    <script src="bootstrap.min.js"></script>
</head>
    <body>
   <center><h3>Student signup to Proceed</h3></center>
        <div class="container">
        <div class="row">
            <div class="col-lg-3 col-lg-offset-8">
                <br />
                <form method="POST" action="ssignup.php">
                    <div class="form-group">
                        <label for="First Name">First Name</label>
                        <input type="text" class="form-control" placeholder="First Name" name="fname"/>
                    </div>
                    <div class="form-group">
                        <label for="Last Name">Last Name:</label>
                        <input type="text" class="form-control" placeholder="Last Name" name="lname"/>
                    </div>
                    <div class="form-group">
                        <label for="Email">Email:</label>
                        <input type="text" class="form-control" placeholder="Email" name="email"/>
                    </div>
                    <div class="form-group">
                        <label for="Password">Password</label>
                        <input type="password" class="form-control" placeholder="Password" name="password"/>
                    </div>
                    <input type="submit" class="btn btn-default" value="Signup" name="submit">
                </form>
            </div>
        </div>
    </div>
    </body>
</html>
