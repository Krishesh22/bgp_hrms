<?php
session_start();

error_reporting(E_ALL);

$error ="";
include 'config.php';


$LocationList="";
$LocationQry = "SELECT * FROM indsys1001clientmaster";
$result_LocationQry = $conn->query($LocationQry);
while($row = $result_LocationQry->fetch_assoc()) 
{
$LocationOrg = $row['Location'];
$ClientidOrg = $row['Clientid'];
$LocationList.="<option value='$ClientidOrg'>$LocationOrg</option>";
}

if(isset($_POST['submit'])){


$get_Clientid =mysqli_real_escape_string($conn, $_POST['Clientid']);

if($get_Clientid==0){
$error = "<p id='response' class='mt-2 alert alert-danger'>Select Location!</p>";}
else{


	if(isset($_POST['emailid']) && isset($_POST['password'])) {
	$server_time = $_SERVER['REQUEST_TIME'];
	$get_emailid =mysqli_real_escape_string($conn, $_POST['emailid']);
	$get_password = mysqli_real_escape_string($conn, $_POST['password']);
	$get_Clientid =mysqli_real_escape_string($conn, $_POST['Clientid']);



	$LoginQryAdmin = "SELECT * FROM indsys1000useradmin WHERE Emailid='$get_emailid' AND Clientid='$get_Clientid' LIMIT 1";
	$resultLoginQryAdmin = $conn->query($LoginQryAdmin);
	while($row = $resultLoginQryAdmin->fetch_assoc()) 
	{
		$Userid = $row['Userid'];
		$Clientid = $row['Clientid'];
		$Username = $row['Username'];
		$Emailid = $row['Emailid'];
		$Authorizedtype = $row['Authorizedtype'];
		$userinfo=$row['Userinfo'];
		$Chapterid = "";
		$MobileNum = $row['Contactno'];
		$password = $row['Userpassword'];
		$Authorizedno=$row['Authorizedno'];
	}
	}




		if($get_emailid==$Emailid && $get_password==$password)
		{

		$ClientQry = "SELECT * FROM indsys1001clientmaster WHERE Clientid='$Clientid' LIMIT 1";

		 $resultClientQry = $conn->query($ClientQry);
		while($row = $resultClientQry->fetch_assoc()) {
			$Clientname = $row['Clientname'];
			$ClientLocation = $row['Location'];
			$ClientPhoneno = $row['Phoneno'];
			$ClientEmailid = $row['Emailid'];
			$ClientAddressLine1 = $row['AddressLine1'];
			$ClientAddressLine2 = $row['AddressLine2'];
			$ClientAddressLine3 = $row['AddressLine3'];
			$ClientCountry = $row['Country'];
			$ClientCity = $row['City'];
			$ClientZipcode = $row['Zipcode'];
			$ClientWebsite = $row['Website'];
		}


		session_start();
		$server_time = $_SERVER['REQUEST_TIME'];
		$_SESSION["Userid"] = $Userid ;
		$_SESSION["Username"] =$Username;
		$_SESSION["Mailid"] =$Emailid;
		$_SESSION["Clientid"] =$Clientid;
		$_SESSION["Authorizedtype"] =$Authorizedtype;
		$_SESSION["Userinfo"] =$userinfo;
		$_SESSION["Memberactive"] ='Active';
		$_SESSION["Chaptername"] = "";
		$_SESSION["Authorizedno"] =$Authorizedno;
		$_SESSION['LAST_ACTIVITY'] = time();
		$_SESSION['hrm_session_start'] = time();

		$_SESSION["Clientname"] = $Clientname;
		$_SESSION["ClientLocation"] = $ClientLocation;
		$_SESSION["ClientPhoneno"] = $ClientPhoneno;
		$_SESSION["ClientEmailid"] = $ClientEmailid;
		$_SESSION["ClientAddressLine1"] = $ClientAddressLine1;
		$_SESSION["ClientAddressLine2"] = $ClientAddressLine2;
		$_SESSION["ClientAddressLine3"] = $ClientAddressLine3;
		$_SESSION["ClientCountry"] = $ClientCountry;
		$_SESSION["ClientCity"] = $ClientCity;
		$_SESSION["ClientZipcode"] = $ClientZipcode;
		$_SESSION["ClientWebsite"] = $ClientWebsite;


		// $_SESSION['hrm_session_expire'] = $_SESSION['hrm_session_start'] + (10); //In minutes : (30 * 60) |  In days : (n * 24 * 60 * 60 ) n = no of days 

		date_default_timezone_set('Asia/Kolkata');
		$date = date("Y-m-d H:i:s" );
		$sqlsave = "INSERT IGNORE INTO indsys1001userloginactivity (Clientid,Userinfo,Userid,Lastlogin,Username) 
		values('$Clientid','$userinfo','$Userid','$date','$Username')";
		$resultsave = mysqli_query($conn,$sqlsave);

		$error = "<p class='mt-2 alert alert-Success'>Success!</p>";

		header( "refresh:0;url=dashboard.php" );
		return;


		}

		else{
		$error = "<p class='mt-2 id='response'  alert alert-danger'>Incorrect Location or Username or Password.</p>";
		header( "refresh:1;url=EmailLogin.php" );
		}

}


	
	

		 
		  
	  }




?>

<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Bootstrap CSS -->
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

    .login-logo{padding: 20px 55px 0px 55px;}
  	a.forgot-link{
  		color: #888888;
  	}
  	a.forgot-link:hover{
  		color: #EE2474;
  	}
  	.splash-container .card-header {
  padding: 2px;border: none;
}
.btn-blue{
	background-color: #EE2474;
	color: #ffffff !important;
}
.btn-blue:hover{
	background-color: #06B6EA;
}
.splash-container .card{
	box-shadow: rgba(0, 0, 0, 0.07) 0px 1px 2px, rgba(0, 0, 0, 0.07) 0px 2px 4px, rgba(0, 0, 0, 0.07) 0px 4px 8px, rgba(0, 0, 0, 0.07) 0px 8px 16px, rgba(0, 0, 0, 0.07) 0px 16px 32px, rgba(0, 0, 0, 0.07) 0px 32px 64px;
}
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
              <div class="card-header text-center"><div class="login-logo"><a href="index.php"><img src="assets/images/logo/Sainmarknewlogo.png" alt="HRM" style="width: auto;height: 150px;"/></a>
            </div>
           </div>
            <div class="card-body">
            <h5 class="splash-description text-green">LOGIN</h5>
                <form role="form" method="post">
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="emailid" name="emailid" type="email" placeholder="Email">
                    </div>

                    <div class='form-group'>
<select class='form-control' style="height: 44.5px;" id="Location" name='Clientid'>
	<option value="0">Select Location</option>
	<?php echo "$LocationList";?>
</select>
</div>

                    <div class="form-group">
                        <input class="form-control form-control-lg" id="password" type="password" name="password" placeholder="Password">
                    </div>

                    <button type="submit" name="submit" value="Login" class="btn btn-blue sign-in-btn btn-lg btn-block">Sign in</button>
                    <?php echo "$error";?>

                   <div class="text-right mt-2"> <a href="Forgotpassword.php" class="forgot-link" class="footer-link">Forgot Password</a></div>
                </form>
            </div>
            <div class="card-footer bg-white p-0  ">
                <!-- <div class="card-footer-item card-footer-item-bordered">
                    <a href="#" class="footer-link">Create An Account</a>
                </div> -->
                <!-- <div class="card-footer-item card-footer-item-bordered">
                    <a href="#" class="footer-link">Forgot Password</a>
                </div> -->
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
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>

    <script type="text/javascript">
    	$('#response').fadeIn('slow');
							$('#response').delay(1500).fadeOut('slow');	
    </script>
</body>
 
</html>