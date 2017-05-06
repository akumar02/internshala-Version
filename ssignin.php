
<?php
session_start();
include 'connect.php';
include 'header.php';
if(isset($_POST['submit'])){
	$email=$_POST['email'];
	$password=$_POST['password'];
	if(!empty($email)&&!empty($password)){
		$query="SELECT * FROM studentlogin WHERE email='$email' AND password='$password'";
		$query1=mysqli_query($connect,$query);
		$row=mysqli_fetch_array($query1);
		if($row['email'] == $email){
			$_SESSION['user']=$row['email'];
			header("location:/intern/main.php");  
                 /* session is used to store the variable which can be used throughout the website */
             }
        else{
            ?>
            <script>
                alert("incorrect username");
            </script>
             <a href="ssignin.php"></a>
            <?php
             }
         }
         else{
         	header("location:/intern/ssignin.php");
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
 <center><h3>Students sign in to proceed</h3></center>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-lg-offset-4">
                <br />
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
                    <div class="form-group">
                        <label for="Email:">Email:</label>
                        <input type="text" class="form-control" placeholder="email" name="email"/>
                    </div>
                    <div class="form-group">
                        <label for="Last Name">Password:</label>
                        <input type="text" class="form-control" placeholder="password" name="password" />
                    </div>
                    <input type="submit" class="btn btn-default" value="login" name="submit">
                </form>
            </div>
        </div>
    </div>
</body>
</html>



