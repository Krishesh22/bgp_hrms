<?php 
include '../config.php';

if(isset($_POST['MobileOtp']))
{

		$get_MobileOtp = mysqli_real_escape_string($conn, $_POST['MobileOtp']);
		$get_Applicationid = mysqli_real_escape_string($conn, $_POST['Applicationid']);


		$OtpQry = "SELECT * FROM indsys1032jobappmaster WHERE Applicationid='$get_Applicationid' LIMIT 1";
		$result_OtpQry = $conn->query($OtpQry);
		while($row = $result_OtpQry->fetch_assoc()) 
		{
		  $Smsotp = $row['Smsotp'];
		}

		if($get_MobileOtp==$Smsotp){
			echo "1";


				$OtpStatusQry = "UPDATE `indsys1032jobappmaster` SET `Smsverified` = 'Yes' WHERE `Applicationid` = '$get_Applicationid'";
				$result_OtpStatusQry = $conn->query($OtpStatusQry); 

		}
		else{
			echo "0";
		}


}


?>