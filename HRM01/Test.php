<?php 

include('../config.php');


session_start();
  $user_id = $_SESSION["Userid"];
      $username = $_SESSION["Username"];
      $usermail=$_SESSION["Mailid"];
      $Clientid =$_SESSION["Clientid"];
      $_SESSION["AdditionAddress"]='Home.php';
      $_SESSION["ModificationAddress"]='Home.php';
      $_SESSION["ViewAddress"]='Home.php';
      $_SESSION["ReturnAddress"]='Home.php';
      $_SESSION["Tittle"] ="Member Type";
$Memberid = $_SESSION["Memberid"] ;
$Message ='';

$date = date('d/M/Y ');

  



$GetEventMaster = "SELECT * FROM indsys1007member where Paidstatus='To Pay' and Memberid='CM/00155/S/COI' and Memberactive='Active' ";
$result_EventMaster = $con->query($GetEventMaster);



 

while ($row = $result_EventMaster->fetch_assoc())
{

    // Get this value from the db (true or false)
 
    $Membermemo = $row['Membermemo'];
    $Memberid = $row['Memberid'];

    
  
  
       if ($Membermemo != null)
       {

        $test = md5($Memberid);
        $Membpath ="/MA06/";
        $directory = "Membermemo/$test/";
        $Logopathnew = str_replace("../", "",  $Membermemo);

        $Membermemo = dirname(__DIR__)."$Logopathnew";

        
        $uniquesavename=time().uniqid(rand()).'.pdf';
        $Logofilepath = $directory .$uniquesavename;
        rename("$Membermemo","$Logofilepath");
                $resultExists = "Update indsys1007member set Membermemo ='$Logofilepath',Addormodifydatetime ='$date',Userid ='$user_id' WHERE Memberid = '$Memberid' ";
                $resultExists01 = $con->query($resultExists);
                echo "Update Successfully";
       }

   
       
       
   
 
}

?>
