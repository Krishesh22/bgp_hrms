<<<<<<< HEAD
<?php 
include '../config.php';

if(isset($_POST['MobileOtp']))
{

		$get_MobileOtp = mysqli_real_escape_string($conn, $_POST['MobileOtp']);
		$get_Employeeid = mysqli_real_escape_string($conn, $_POST['Employeeid']);


		$OtpQry = "SELECT * FROM indsys1017employeemaster WHERE Employeeid='$get_Employeeid' LIMIT 1";
		$result_OtpQry = $conn->query($OtpQry);
		while($row = $result_OtpQry->fetch_assoc()) 
		{
		  $Smsotp = $row['SmsOTP'];
		}



		if($get_MobileOtp==$Smsotp){
			echo "1";


				$OtpStatusQry = "UPDATE `indsys1017employeemaster` SET `Smsverified` = 'Yes' WHERE `Employeeid` = '$get_Employeeid'";
				$result_OtpStatusQry = $conn->query($OtpStatusQry); 

		}
		else{
			echo "0";
		}


}


=======
<?php 
include '../config.php';

if(isset($_POST['MobileOtp']))
{

		$get_MobileOtp = mysqli_real_escape_string($conn, $_POST['MobileOtp']);
		$get_Employeeid = mysqli_real_escape_string($conn, $_POST['Employeeid']);


		$OtpQry = "SELECT * FROM indsys1017employeemaster WHERE Employeeid='$get_Employeeid' LIMIT 1";
		$result_OtpQry = $conn->query($OtpQry);
		while($row = $result_OtpQry->fetch_assoc()) 
		{
		  $Smsotp = $row['SmsOTP'];
		}



		if($get_MobileOtp==$Smsotp){
			echo "1";


				$OtpStatusQry = "UPDATE `indsys1017employeemaster` SET `Smsverified` = 'Yes' WHERE `Employeeid` = '$get_Employeeid'";
				$result_OtpStatusQry = $conn->query($OtpStatusQry); 

		}
		else{
			echo "0";
		}


}


>>>>>>> 75c2f84afc1535619ee176c455dfb79e21fb65b2
?>