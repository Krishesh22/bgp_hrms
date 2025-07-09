<<<<<<< HEAD
<?php 
 include '../config.php';

	$getEmail = $_GET['e'];
	$getHash = $_GET['h'];
	$getApplication = $_GET['a'];

	if(isset($_GET['e'])&&isset($_GET['h'])){

		$emailQry = "SELECT Employeeid, Emaild FROM indsys1017employeemaster where Emaild ='$getEmail' and Employeeid ='$getApplication' LIMIT 1";
		$result_emailQry = $conn->query($emailQry);
		if (mysqli_num_rows($result_emailQry) > 0)
		{
		while ($row = mysqli_fetch_array($result_emailQry))
		{
		$Applicationid= $row['Employeeid'];
		$Emaild= $row['Emaild'];
		}
		}

		$VerifyHash=md5("$Applicationid$Emaild");

				echo "yes $Applicationid | $Emaild | $VerifyHash";

				if($VerifyHash===$getHash){

						$UpdateEmailVerify = "Update indsys1017employeemaster SET Emailverified ='Yes' where Employeeid ='$Applicationid' LIMIT 1";
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



=======
<?php 
 include '../config.php';

	$getEmail = $_GET['e'];
	$getHash = $_GET['h'];
	$getApplication = $_GET['a'];

	if(isset($_GET['e'])&&isset($_GET['h'])){

		$emailQry = "SELECT Employeeid, Emaild FROM indsys1017employeemaster where Emaild ='$getEmail' and Employeeid ='$getApplication' LIMIT 1";
		$result_emailQry = $conn->query($emailQry);
		if (mysqli_num_rows($result_emailQry) > 0)
		{
		while ($row = mysqli_fetch_array($result_emailQry))
		{
		$Applicationid= $row['Employeeid'];
		$Emaild= $row['Emaild'];
		}
		}

		$VerifyHash=md5("$Applicationid$Emaild");

				echo "yes $Applicationid | $Emaild | $VerifyHash";

				if($VerifyHash===$getHash){

						$UpdateEmailVerify = "Update indsys1017employeemaster SET Emailverified ='Yes' where Employeeid ='$Applicationid' LIMIT 1";
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



>>>>>>> 75c2f84afc1535619ee176c455dfb79e21fb65b2
?>