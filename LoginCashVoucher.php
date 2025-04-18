<?php
session_start();
error_reporting(E_ALL);

$error ="";
include 'config.php';




// $LocationList="";
// $LocationQry = "SELECT * FROM indsys1031locationmaster ORDER BY LocationName ASC";
// $result_LocationQry = $conn->query($LocationQry);
// while($row = $result_LocationQry->fetch_assoc()) 
// {
// $LocationNameOrg = $row['LocationName'];
// $LocationIdOrg = $row['ID'];
// $LocationList.="<option value='$LocationIdOrg'>$LocationNameOrg</option>";
// }


if(isset($_POST['submit'])){

if(isset($_POST['email']) && isset($_POST['password'])) {

	
	$get_email =mysqli_real_escape_string($conn, $_POST['email']);
	$get_password =mysqli_real_escape_string($conn, $_POST['password']);

	$LoginQryAdmin = "SELECT * FROM indsys1000useradmin WHERE Username='$get_email' LIMIT 1";
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
			$MobileOtp = $row['MobileOtp'];
			$MobileNum = $row['Contactno'];
			$Authorizedno=$row['Authorizedno'];
			$Userpassword=$row['Userpassword'];
			$Locationid=$row['Locationid'];

		}

}




	if($get_email==$Username && $get_password==$Userpassword)
	{

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

			date_default_timezone_set('Asia/Kolkata');
			$date = date("Y-m-d H:i:s" );
			$sqlsave = "INSERT IGNORE INTO indsys1001userloginactivity (Clientid,Userinfo,Userid,Lastlogin,Username) 
			values('$Clientid','$userinfo','$Userid','$date','$Username')";
			$resultsave = mysqli_query($conn,$sqlsave);

			 $error = "<p class='mt-2 alert alert-success'>Success!</p>";

			 header( "refresh:1;url=HRM30/AddVoucher.php" );

			
			

	}

	else
	{
		$error = "<p class='mt-2  alert alert-danger'>Password or Email is Incorrect .</p>";
		$r=rand();
		header( "refresh:2;url=LoginCashVoucher.php?r=$r" );

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
    </style>
</head>

<body>

    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center"><div class="login-logo"><a href="index.php"><img src="assets/icons/cash-voucher.png" alt="HRM" style="height: 128px;"/></a></div>
           </div>
            <div class="card-body">
            <h5 class="splash-description text-green">CASH VOUCHER LOGIN</h5>
             <form role='form' method='post' action="">
<div class='form-group'>
<input class='form-control form-control-lg' id='email' name='email' required="" placeholder='Enter User Name'>
</div>


<div class='form-group'>
<input class='form-control form-control-lg' id='password'  type='password' name='password' required="" placeholder='Enter Password'>
</div>


<button type='submit' id="submit" name='submit'  class='btn btn-green btn-lg btn-block'>Login</button>
<?php echo "$error"; ?>
<div id="response"></div>
<!-- <div class='text-right mt-2'> <a href='Forgotpassword.php' class='forgot-link' class='footer-link'>Forgot Password</a></div> -->
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

    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>




 <!-- Send SMS OTP -->
<script type="text/javascript">

	$("#email").keypress(function(event) {
	if (event.keyCode === 13) {
	 $("#submit").click();
	}
	});

	$("#password").keypress(function(event) {
	if (event.keyCode === 13) {
	 $("#submit").click();
	}
	});


            </script>

</body>
 
</html>