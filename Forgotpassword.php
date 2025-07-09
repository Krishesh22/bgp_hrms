<<<<<<< HEAD
<?php
$error ="";
include 'config.php';

require_once ('class.phpmailer.php');
include ("class.smtp.php");


$rand_token = md5(rand().rand());

if(isset($_POST['submit']))
	{

	if(isset($_POST['emailid'])) 
		{

		$get_emailid =mysqli_real_escape_string($conn, $_POST['emailid']);

				 $UserQry = "SELECT * FROM indsys1000useradmin WHERE Emailid ='$get_emailid' LIMIT 1";
				 $result_UserQry = $conn->query($UserQry);
				 if(mysqli_num_rows($result_UserQry) > 0) { 

				 	  while($row = mysqli_fetch_array($result_UserQry)) { 
				 	  	$to = $row['Emailid'];



				 		$tokenQry = "UPDATE indsys1000useradmin SET Usertoken ='$rand_token' WHERE Emailid ='$get_emailid' LIMIT 1";
				 		$result_tokenQry = $conn->query($tokenQry);
				 		echo "<script>alert('Password Reset Link Sent Succesfully! Check Your Email!');window.location = 'Login.php';</script>";
				 	  }
				 }
				 else{
				 	echo "<script>alert('Invalid Email Id!');window.location = 'Forgotpassword.php';</script>";
				 }

				$mail = new PHPMailer(false); // the true param means it will throw exceptions on errors, which we need to catch
				$mail->IsSMTP(); // telling the class to use SMTP
				$tstbody = "";

				try
				{
				$mail->Host = "smtp.gmail.com"; // SMTP server
				$mail->SMTPDebug = 0; // enables SMTP debug information (for testing)
				$mail->isSMTP();
				$mail->SMTPAuth = true; // enable SMTP authentication
				$mail->SMTPSecure = "tls"; // sets the prefix to the servier
				$mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
				$mail->Port = 587; // set the SMTP port for the GMAIL server
				$mail->Username = "indsystesting@gmail.com"; // GMAIL username
				$mail->Password = "mdpswobfoltlloza"; // GMAIL password

				$to = str_replace(";",",",$to);

				$SubjectMail = "Reset Your Sainmarks password!";
				$htmlContent="<!doctype html>
				<html>
				<head>
				<meta name='viewport' content='width=device-width, initial-scale=1.0'>
				<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
				<title>Forgot Template</title>
				<style>
				@media only screen and (max-width: 620px) {
				table.body h1 {
				font-size: 28px !important;
				margin-bottom: 10px !important;
				}

				table.body p,
				table.body ul,
				table.body ol,
				table.body td,
				table.body span,
				table.body a {
				font-size: 16px !important;
				}

				table.body .wrapper,
				table.body .article {
				padding: 10px !important;
				}

				table.body .content {
				padding: 0 !important;
				}

				table.body .container {
				padding: 0 !important;
				width: 100% !important;
				}

				table.body .main {
				border-left-width: 0 !important;
				border-radius: 0 !important;
				border-right-width: 0 !important;
				}

				table.body .btn table {
				width: 100% !important;
				}

				table.body .btn a {
				width: 100% !important;
				}

				table.body .img-responsive {
				height: auto !important;
				max-width: 100% !important;
				width: auto !important;
				}
				}
				@media all {
				.ExternalClass {
				width: 100%;
				}

				.ExternalClass,
				.ExternalClass p,
				.ExternalClass span,
				.ExternalClass font,
				.ExternalClass td,
				.ExternalClass div {
				line-height: 100%;
				}

				.apple-link a {
				color: inherit !important;
				font-family: inherit !important;
				font-size: inherit !important;
				font-weight: inherit !important;
				line-height: inherit !important;
				text-decoration: none !important;
				}

				.code{
				max-width: 600px;
				color: #888888;
				padding: 20px;
				border: 1px solid #888888;
				word-wrap: break-word;
				}
				#MessageViewBody a {
				color: inherit;
				text-decoration: none;
				font-size: inherit;
				font-family: inherit;
				font-weight: inherit;
				line-height: inherit;
				}

				.btn-primary table td:hover {
				background-color: #34495e !important;
				}

				.btn-primary a:hover {
				background-color: #34495e !important;
				border-color: #34495e !important;
				}
				}
				table.info, table.info td, table.info th {
				border: 1px solid #888888;
				padding:6px;
				}
				table.info {
				width: 100%;
				border-collapse: collapse;
				}

				.approve-btn{
				background-color: red; padding: 15px;text-decoration: none;color: #ffffff;background-color: #2D9A43; 
				}

				</style>
				</head>
				<body style='background-color: #f6f6f6; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;'>
				<span class='preheader' style='color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;'>This is preheader text. Some clients will show this text as a preview.</span>
				<table role='presentation' border='0' cellpadding='0' cellspacing='0' class='body' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f6f6f6; width: 100%;' width='100%' bgcolor='#f6f6f6'>
				<tr>
				<td>
				<td style='font-family: sans-serif; font-size: 14px; vertical-align: top;' valign='top'>&nbsp;</td>

				<td class='container' style='font-family: sans-serif; font-size: 14px; vertical-align: top; display: block; max-width: 620px; padding: 10px; width: 620px; margin: 0 auto;' width='620' valign='top'>
				<div class='content' style='box-sizing: border-box; display: block; margin: 0 auto; max-width: 620px; padding: 10px;'>

				<table role='presentation' class='main' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background: #ffffff; border-radius: 3px; width: 100%;' width='100%'>

				<tr>
				<td class='wrapper' style='font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;' valign='top'>
				<table role='presentation' border='0' cellpadding='0' cellspacing='0' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;' width='100%'>
				<tr> <td><center><img alt='Logo' height='80px' src='http://hrms-staging.indsys.holdings/Logo/Sainmarknewlogo.png'></center></td></tr>
				<tr>

				<td style='font-family: sans-serif; font-size: 14px; vertical-align: top;' valign='top'>
				<br/>
				<h1 style='text-align: center;color:#2D9A43'>Forgot your password?</h1>
				<h3 style='text-align: center;color:#000000'>Don't worry, we've got your back.</h3>
				<br/><br/>
				<center><a class='approve-btn' href='$domain/Passwordreset.php?token=$rand_token&email=$to'>Reset My Password</a></center>
				<br/><br/>
				<p>If the button link doesn't work, copy and paste the URL in your browser:</p>
				<div class='code'><code>
				$domain/Passwordreset.php?token=$rand_token&email=$to
				</code>
				</div>

				<p>If you received this message by mistake, ignore this email. </p>
				<p>The Sainmarks Team</p>
				<br/> 


				</td>
				</tr>
				</table>
				</td>
				</tr>

				</table>


				</div>
				</td>
				<td style='font-family: sans-serif; font-size: 14px; vertical-align: top;' valign='top'>&nbsp;</td>
				</tr>
				</table>
				</body>
				</html>";

				$email_array = explode(',',  $to);
				for ($i = 0;$i < count($email_array);$i++)
				{
				$mail->AddAddress($email_array[$i]);
				}
				$mail->SetFrom('indsystesting@gmail.com', 'INDSYS');
				$mail->AddReplyTo('indsystesting@gmail.com', 'INDSYS');
				$mail->Subject =  $SubjectMail ;
				// $mail->Body = $tstbody;
				$mail->MsgHTML($htmlContent);

				$mail->Send();

				if($mail){
					// $str = json_encode("E-Mail Sent Succesfully");
					// echo trim($str, '"');
				}
				

				}
				catch(phpmailerException $e)
				{

				}
				catch(Exception $e)
				{

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
    <title>Forgot Password</title>
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
            <h5 class="splash-description text-green">Forgot Password</h5>
                <form role="form" method="post">
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="emailid" name="emailid" type="email" placeholder="Email">
                    </div>

                    <button type="submit" name="submit" value="Login" class="btn btn-green btn-lg btn-block">Submit</button>
                    <?php echo "$error";?>
                   <div class="text-right mt-2"> <a href="Login.php" class="forgot-link" class="footer-link">Login</a></div>

                </form>
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
</body>
 
=======
<?php
$error ="";
include 'config.php';

require_once ('class.phpmailer.php');
include ("class.smtp.php");


$rand_token = md5(rand().rand());

if(isset($_POST['submit']))
	{

	if(isset($_POST['emailid'])) 
		{

		$get_emailid =mysqli_real_escape_string($conn, $_POST['emailid']);

				 $UserQry = "SELECT * FROM indsys1000useradmin WHERE Emailid ='$get_emailid' LIMIT 1";
				 $result_UserQry = $conn->query($UserQry);
				 if(mysqli_num_rows($result_UserQry) > 0) { 

				 	  while($row = mysqli_fetch_array($result_UserQry)) { 
				 	  	$to = $row['Emailid'];



				 		$tokenQry = "UPDATE indsys1000useradmin SET Usertoken ='$rand_token' WHERE Emailid ='$get_emailid' LIMIT 1";
				 		$result_tokenQry = $conn->query($tokenQry);
				 		echo "<script>alert('Password Reset Link Sent Succesfully! Check Your Email!');window.location = 'Login.php';</script>";
				 	  }
				 }
				 else{
				 	echo "<script>alert('Invalid Email Id!');window.location = 'Forgotpassword.php';</script>";
				 }

				$mail = new PHPMailer(false); // the true param means it will throw exceptions on errors, which we need to catch
				$mail->IsSMTP(); // telling the class to use SMTP
				$tstbody = "";

				try
				{
				$mail->Host = "smtp.gmail.com"; // SMTP server
				$mail->SMTPDebug = 0; // enables SMTP debug information (for testing)
				$mail->isSMTP();
				$mail->SMTPAuth = true; // enable SMTP authentication
				$mail->SMTPSecure = "tls"; // sets the prefix to the servier
				$mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
				$mail->Port = 587; // set the SMTP port for the GMAIL server
				$mail->Username = "indsystesting@gmail.com"; // GMAIL username
				$mail->Password = "mdpswobfoltlloza"; // GMAIL password

				$to = str_replace(";",",",$to);

				$SubjectMail = "Reset Your Sainmarks password!";
				$htmlContent="<!doctype html>
				<html>
				<head>
				<meta name='viewport' content='width=device-width, initial-scale=1.0'>
				<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
				<title>Forgot Template</title>
				<style>
				@media only screen and (max-width: 620px) {
				table.body h1 {
				font-size: 28px !important;
				margin-bottom: 10px !important;
				}

				table.body p,
				table.body ul,
				table.body ol,
				table.body td,
				table.body span,
				table.body a {
				font-size: 16px !important;
				}

				table.body .wrapper,
				table.body .article {
				padding: 10px !important;
				}

				table.body .content {
				padding: 0 !important;
				}

				table.body .container {
				padding: 0 !important;
				width: 100% !important;
				}

				table.body .main {
				border-left-width: 0 !important;
				border-radius: 0 !important;
				border-right-width: 0 !important;
				}

				table.body .btn table {
				width: 100% !important;
				}

				table.body .btn a {
				width: 100% !important;
				}

				table.body .img-responsive {
				height: auto !important;
				max-width: 100% !important;
				width: auto !important;
				}
				}
				@media all {
				.ExternalClass {
				width: 100%;
				}

				.ExternalClass,
				.ExternalClass p,
				.ExternalClass span,
				.ExternalClass font,
				.ExternalClass td,
				.ExternalClass div {
				line-height: 100%;
				}

				.apple-link a {
				color: inherit !important;
				font-family: inherit !important;
				font-size: inherit !important;
				font-weight: inherit !important;
				line-height: inherit !important;
				text-decoration: none !important;
				}

				.code{
				max-width: 600px;
				color: #888888;
				padding: 20px;
				border: 1px solid #888888;
				word-wrap: break-word;
				}
				#MessageViewBody a {
				color: inherit;
				text-decoration: none;
				font-size: inherit;
				font-family: inherit;
				font-weight: inherit;
				line-height: inherit;
				}

				.btn-primary table td:hover {
				background-color: #34495e !important;
				}

				.btn-primary a:hover {
				background-color: #34495e !important;
				border-color: #34495e !important;
				}
				}
				table.info, table.info td, table.info th {
				border: 1px solid #888888;
				padding:6px;
				}
				table.info {
				width: 100%;
				border-collapse: collapse;
				}

				.approve-btn{
				background-color: red; padding: 15px;text-decoration: none;color: #ffffff;background-color: #2D9A43; 
				}

				</style>
				</head>
				<body style='background-color: #f6f6f6; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;'>
				<span class='preheader' style='color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;'>This is preheader text. Some clients will show this text as a preview.</span>
				<table role='presentation' border='0' cellpadding='0' cellspacing='0' class='body' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f6f6f6; width: 100%;' width='100%' bgcolor='#f6f6f6'>
				<tr>
				<td>
				<td style='font-family: sans-serif; font-size: 14px; vertical-align: top;' valign='top'>&nbsp;</td>

				<td class='container' style='font-family: sans-serif; font-size: 14px; vertical-align: top; display: block; max-width: 620px; padding: 10px; width: 620px; margin: 0 auto;' width='620' valign='top'>
				<div class='content' style='box-sizing: border-box; display: block; margin: 0 auto; max-width: 620px; padding: 10px;'>

				<table role='presentation' class='main' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background: #ffffff; border-radius: 3px; width: 100%;' width='100%'>

				<tr>
				<td class='wrapper' style='font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;' valign='top'>
				<table role='presentation' border='0' cellpadding='0' cellspacing='0' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;' width='100%'>
				<tr> <td><center><img alt='Logo' height='80px' src='http://hrms-staging.indsys.holdings/Logo/Sainmarknewlogo.png'></center></td></tr>
				<tr>

				<td style='font-family: sans-serif; font-size: 14px; vertical-align: top;' valign='top'>
				<br/>
				<h1 style='text-align: center;color:#2D9A43'>Forgot your password?</h1>
				<h3 style='text-align: center;color:#000000'>Don't worry, we've got your back.</h3>
				<br/><br/>
				<center><a class='approve-btn' href='$domain/Passwordreset.php?token=$rand_token&email=$to'>Reset My Password</a></center>
				<br/><br/>
				<p>If the button link doesn't work, copy and paste the URL in your browser:</p>
				<div class='code'><code>
				$domain/Passwordreset.php?token=$rand_token&email=$to
				</code>
				</div>

				<p>If you received this message by mistake, ignore this email. </p>
				<p>The Sainmarks Team</p>
				<br/> 


				</td>
				</tr>
				</table>
				</td>
				</tr>

				</table>


				</div>
				</td>
				<td style='font-family: sans-serif; font-size: 14px; vertical-align: top;' valign='top'>&nbsp;</td>
				</tr>
				</table>
				</body>
				</html>";

				$email_array = explode(',',  $to);
				for ($i = 0;$i < count($email_array);$i++)
				{
				$mail->AddAddress($email_array[$i]);
				}
				$mail->SetFrom('indsystesting@gmail.com', 'INDSYS');
				$mail->AddReplyTo('indsystesting@gmail.com', 'INDSYS');
				$mail->Subject =  $SubjectMail ;
				// $mail->Body = $tstbody;
				$mail->MsgHTML($htmlContent);

				$mail->Send();

				if($mail){
					// $str = json_encode("E-Mail Sent Succesfully");
					// echo trim($str, '"');
				}
				

				}
				catch(phpmailerException $e)
				{

				}
				catch(Exception $e)
				{

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
    <title>Forgot Password</title>
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
            <h5 class="splash-description text-green">Forgot Password</h5>
                <form role="form" method="post">
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="emailid" name="emailid" type="email" placeholder="Email">
                    </div>

                    <button type="submit" name="submit" value="Login" class="btn btn-green btn-lg btn-block">Submit</button>
                    <?php echo "$error";?>
                   <div class="text-right mt-2"> <a href="Login.php" class="forgot-link" class="footer-link">Login</a></div>

                </form>
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
</body>
 
>>>>>>> 75c2f84afc1535619ee176c455dfb79e21fb65b2
</html>