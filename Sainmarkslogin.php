<?php
session_start();

error_reporting(E_ALL);

$error ="";
include 'config.php';



if(isset($_POST['submit'])){


if(isset($_POST['MobileNum']) && isset($_POST['MobileOtp'])) {

	
	$get_MobileNum =mysqli_real_escape_string($conn, $_POST['MobileNum']);
	$get_MobileOtp =mysqli_real_escape_string($conn, $_POST['MobileOtp']);

	$LoginQryAdmin = "SELECT * FROM indsys1000useradmin WHERE Contactno='$get_MobileNum' LIMIT 1";
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
		}

}

	if($get_MobileNum==$MobileNum && $get_MobileOtp==$MobileOtp)
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

	else
	{
		$error = "<p class='mt-2  alert alert-danger'>Incorrect OTP.</p>";
		$r=rand();
		header( "refresh:1;url=Login.php?r=$r" );

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
            <div class="card-header text-center"><div class="login-logo"><a href="index.php"><img src="Logo/Sainmarknewlogo.png" alt="HRM" style="width: 100%;"/></a></div>
           </div>
            <div class="card-body">
            <h5 class="splash-description text-green">LOGIN</h5>
             <form role='form' method='post' action="">
<div class='form-group'>
<input class='form-control form-control-lg' id='MobileNum' name='MobileNum' placeholder='Enter Mobile Number'>
</div>
<div class='form-group'>
<input class='form-control form-control-lg' id='MobileOtp' name='MobileOtp' placeholder='Enter Mobile OTP'>
</div>
<button type='button' id="BtnSendOTPSMS" class='btn btn-green btn-lg btn-block'>Login with OTP</button>
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
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>


 <!-- Send SMS OTP -->
<script type="text/javascript">




	$("#submit").hide();
	$("#MobileOtp").hide();

 $(document).on('click', '#BtnSendOTPSMS', function(event) {

 		var MobileNum = $('#MobileNum').val();

 		if(MobileNum==""){
			$('#response').empty();
			$("#response").append("<p class='mt-2 text-danger'>Enter Valid Mobile Number!</p>");
			$('#response').fadeIn('slow');
			$('#response').delay(1500).fadeOut('slow');
 		}
 		else{

                var MobileNum = $('#MobileNum').val();
               
                 $.ajax({
                     type: 'POST',
                     cache: false,
                     url: 'LoginSetSMSOtp.php',
                     data: {
                         MobileNum: MobileNum
                     },
                     success: function(html) {

                     	if(html==1){
							$('#response').empty();
                     		$("#response").append("<p class='mt-2 text-success'>OTP Sent Successfully!</p>");
							$("#MobileNum").attr("readonly", true);
							$("#MobileOtp").show();
							

							$("#BtnSendOTPSMS").hide();
							$("#submit").show();
							$('#response').fadeIn('slow');
							$('#response').delay(1500).fadeOut('slow');
                     	}
                     	else{

                     		$('#response').empty();
							$("#response").append("<p class='mt-2 text-danger'>User Not Exists! Invalid!</p>");
							$('#response').fadeIn('slow');
							$('#response').delay(1500).fadeOut('slow');	

                     		
                     	}

                     

                     }
                 });
                return false;


 		}
  });

            // $(document).on('click', '#BtnSendOTPSMS', function(event) {

            


            	

            // $(".invalidOtp").hide();


            //     var Employeeid = $('#Employeeid').val();
            //     var MobileNum = $('#Contactno').val();
               
            //      $.ajax({
            //          type: 'POST',
            //          cache: false,
            //          url: 'SMSOtp.php',
            //          data: {
            //             Employeeid: Employeeid,
            //              MobileNum: MobileNum
            //          },
            //          success: function(html) {
            //              alert("OTP Sent Successfully!");
            //              $('.OtpModal').trigger('click');
            //          }
            //      });
            //     return false;
            // });
            </script>

</body>
 
</html>