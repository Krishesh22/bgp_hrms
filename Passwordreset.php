<?php 

include 'config.php';

$get_token =mysqli_real_escape_string($conn, $_GET['token']);
$get_emailid =mysqli_real_escape_string($conn, $_GET['email']);

$tokenCheckQry = "SELECT * FROM indsys1000useradmin WHERE Usertoken ='$get_token' LIMIT 1";
$result_tokenCheckQry = $conn->query($tokenCheckQry);
if(mysqli_num_rows($result_tokenCheckQry) > 0) 
{ 
while($row = mysqli_fetch_array($result_tokenCheckQry)) 
	{ 

			if(isset($_POST['submit'])){
			$get_password1 =mysqli_real_escape_string($conn, $_POST['password1']);
			$get_password2 = mysqli_real_escape_string($conn, $_POST['password2']);

			if($get_password1 == $get_password2){

			$passwordQry = "UPDATE indsys1000useradmin SET Userpassword ='$get_password1' WHERE Usertoken ='$get_token' LIMIT 1";
			$result_passwordQry = $conn->query($passwordQry);

			$rand_token = md5(rand().rand());
			$tokenQry = "UPDATE indsys1000useradmin SET Usertoken ='$rand_token' WHERE Usertoken ='$get_token' LIMIT 1";
			$result_tokenQry = $conn->query($tokenQry);

			echo "<script>alert('Password Changed Succesfully!');window.location = 'Login.php';</script>";		

			}
			else{
			echo "<script>alert('Password mismatch! Re-type it!');</script>";
			}

			}


	}
}
else{
echo "<script>alert('Token Expired!');window.location = 'Forgotpassword.php';</script>";	
}	


?>

<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Reset Password</title>
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link href="asset/indsyscustom.css" rel="stylesheet">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center"><div class="login-logo"><a href="index.php"><img src="Logo/Sainmarknewlogo.png" alt="HRM" style="width: 100%;"/></a></div>
           </div>
            <div class="card-body">
            <h5 class="splash-description text-green">Reset Password</h5>
                <form role="form" method="post">
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="password1" name="password1" type="text" placeholder="New Password">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="password2" name="password2" type="password2" placeholder="Confirm New Password">
                    </div>

                    <button type="submit" name="submit" value="Login" class="btn btn-green btn-lg btn-block">Update Password</button>
                    <?php echo "$error";?>

                </form>
            </div>
            <div class="card-footer bg-white p-0  ">
              
            </div>
        </div>
    </div>
  
  <style type="text/css">
  	.login-logo{padding: 20px 55px 0px 55px;}
  	a.forgot-link{
  		color: #888888;
  	}
  	a.forgot-link:hover{
  		color: #2C9A42;
  	}
  	.splash-container .card-header {
  padding: 2px;border: none;
}
  </style>
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
</body>
 
</html>