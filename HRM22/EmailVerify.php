<?php 
 include '../config.php';

	$getEmail = $_GET['e'];
	$getHash = $_GET['h'];
	$getApplication = $_GET['a'];
	$getClientid = $_GET['c'];


	if(isset($_GET['e'])&&isset($_GET['h'])){

		$emailQry = "SELECT Applicationid, Emaild FROM indsys1032jobappmaster where Emaild ='$getEmail' and Applicationid ='$getApplication' AND Clientid = '$getClientid' LIMIT 1";
		$result_emailQry = $conn->query($emailQry);
		if (mysqli_num_rows($result_emailQry) > 0)
		{
		while ($row = mysqli_fetch_array($result_emailQry))
		{
		$Applicationid= $row['Applicationid'];
		$Emaild= $row['Emaild'];
		}
		}

		$VerifyHash=md5("$Applicationid$Emaild");

				//echo "yes $Applicationid | $Emaild | $VerifyHash";

				if($VerifyHash===$getHash){

						$UpdateEmailVerify = "Update indsys1032jobappmaster SET Emailverified ='Yes' where Applicationid ='$Applicationid' AND Clientid = '$getClientid' LIMIT 1";
						$resultUpdateEmailVerify = mysqli_query($conn,$UpdateEmailVerify);
						
						header("location:VerifySuccess.php"); 

				}
				else{
					echo "Something went wrong! Try Again Later..!";
				}

	}
	else{
		echo "Invalid Access Token! Click <a href=''>here</a> to go to home page.";
	}



?>