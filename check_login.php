<?php
session_start();
include 'config.php';
if(isset($_POST['submit'])){
	if(isset($_POST['username']) && isset($_POST['password'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
//	session_start();
	$server_time = $_SERVER['REQUEST_TIME'];
	
		$get_username =mysqli_real_escape_string($conn, $_POST['username']);
		$get_password = mysqli_real_escape_string($conn, $_POST['password']);
	
	
	
	
		$LoginQryAdmin = "SELECT * FROM indsys1000useradmin WHERE Username='$get_username'  LIMIT 1";
		$resultLoginQryAdmin = $conn->query($LoginQryAdmin);
		while($row = $resultLoginQryAdmin->fetch_assoc()) 
		{
		  $user_id = $row['Userid'];
		  $username = $row['Username'];
		  $password = $row['Userpassword'];
		  $Authorizedtype = $row['Authorizedtype'];
		  $Chapterid = "";
	
	
		$_SESSION["Userid"] = $row['Userid'];
		$_SESSION["Username"] = $row['Username'];
		  $_SESSION["Mailid"] = $row['Emailid'];
		  $_SESSION["Clientid"] =$row['Clientid'];
		  $_SESSION["Authorizedtype"] = $row['Authorizedtype'];
		$_SESSION["Userinfo"] =$row['Userinfo'];
		
		$_SESSION["Memberactive"] ='Active';
	
		
		  
		$_SESSION["Chaptername"] = "";
		 
	
 
 
 
	
	
	
	 if($get_username==$username && $get_password==$password)
	{
	$_SESSION['LAST_ACTIVITY'] = time();
	  $error = "<span class='error text-success'>Success!</span>";
	
	  $rand=substr(strtolower((rand())), 0, 8);
	  $login_hash=$rand;
	
	  setcookie("login_hash", $login_hash, time() + 1800);
	
	  date_default_timezone_set('Asia/Kolkata');
	  $date = date("Y-m-d H:i:s" );
	  $sqlsave = "INSERT IGNORE INTO indsys1001userloginactivity (Clientid,Userinfo,Userid,Addormodifydatetime,Username) VALUES ('".$_SESSION["Clientid"]."','".$_SESSION["Userinfo"]."','".$_SESSION["Userid"]."','".$date."','".$_SESSION["Username"]."')";
	  $resultsave = mysqli_query($conn,$sqlsave);
	  
	
	  header( "refresh:1;url=dashboard.php" );
	  return;
	
	}
	  
	else{
		$error = "<span class='error text-danger'>Incorrect username or password.</span>";
		header( "refresh:1;url=index.php" );
	  //$error = "$password | $get_password";
	}
		 
		  
	  }
	}
}

?>