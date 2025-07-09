<?php


error_reporting(0);
include '../config.php';

include 'Attendancecalculation.php';

session_start();
  $user_id = $_SESSION["Userid"];
      $username = $_SESSION["Username"];
      $usermail=$_SESSION["Mailid"];
      $Clientid =$_SESSION["Clientid"];
   
      $_SESSION["Tittle"] ="Daily Attendance Detail";
$Message ='';

date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );


$form_data = json_decode(file_get_contents("php://input"));
  $form_data= json_decode( json_encode($form_data), true);
$MethodGet = $form_data['Method'];

if($MethodGet == 'BREAKNEXT')
{


try
{

    $Employeeid =$form_data['Employeeid'];
    $Attendencedate = $form_data['Attendencedate'];
   
   

    $Sno = 0;

        $resultExistsnew = "SELECT Nextno FROM vwemployeedailybreaknextno  WHERE Employeeid = '$Employeeid' AND Clientid = '$Clientid' and Attendencedate='$Attendencedate' LIMIT 1";
        $resultExists01new = $conn->query($resultExistsnew);

        if (mysqli_fetch_row($resultExists01new))
        {

            $GetChapter = "SELECT * FROM vwemployeedailybreaknextno WHERE Employeeid = '$Employeeid' AND Clientid = '$Clientid' and Attendencedate='$Attendencedate' ";
            $result_Chapter = $conn->query($GetChapter);
            if (mysqli_num_rows($result_Chapter) > 0)
            {
                while ($row = mysqli_fetch_array($result_Chapter))
                {
                    $Sno = $row['Nextno'];

                }
            }

        }
        else
        {
            $Sno = 1;
        }





 

 $Display=array('Sno' => $Sno);

  $str = json_encode($Display);
echo trim($str, '"');
}
catch(Exception $e)
{

}
 
     
}



if($MethodGet == 'FETCHDURATION')
{


try
{

    $BreakIntime =$form_data['BreakIntime'];
    $BreakOuttime = $form_data['BreakOuttime'];
   
   

    $Intimecheck =strtotime($BreakIntime);
    $OuttimeCheck = strtotime($BreakOuttime);

    $Durationhrs = $OuttimeCheck-$Intimecheck;
    $Takenbreakhours = substr(str_replace(':', '.', $Durationhrs), 0, 5);
    $Takenbreakhoursduration = gmdate("H:i:s", $Durationhrs);




 

 $Display=array('Takenbreakhours' => $Takenbreakhours,'Takenbreakhoursduration' =>$Takenbreakhoursduration);

  $str = json_encode($Display);
echo trim($str, '"');
}
catch(Exception $e)
{

}
 
     
}


if($MethodGet == 'UpdateBreakhours')
{


try
{

    $BreakIntime =$form_data['BreakIntime'];
    $BreakOuttime = $form_data['BreakOuttime'];
    $Employeeid =$form_data['Employeeid'];
    $Attendencedate = $form_data['Attendencedate'];
    $Notes =$form_data['Notes'];
    $breaksno = $form_data['breaksno'];
    $Sno=$breaksno;
    $Takenbreakhours = $form_data['Takenbreakhours'];
$Takenbreakhoursduration = $form_data['Takenbreakhoursduration'];
    if($BreakIntime =="00:00:00")
    {
     
        $Message = "BreakIntime";

        $Display = array(
            'Message' => $Message
        );
  
        $str = json_encode($Display);
        echo trim($str, '"');
        return;
    }
   if($BreakOuttime =="00:00:00")
    {
     
        $Message = "BreakOuttime";

        $Display = array(
            'Message' => $Message
        );
  
        $str = json_encode($Display);
        echo trim($str, '"');
        return;
    }
   $Intimewithdate ="$Attendencedate  $BreakIntime";
   $Outtimewithdate ="$Attendencedate $BreakOuttime";





  $resultExists = "SELECT Employeeid FROM indsys1030empdailybreaktimedetail WHERE Employeeid = '$Employeeid' AND Clientid = '$Clientid' And Sno ='$Sno' and Attendencedate='$Attendencedate' LIMIT 1";
  $resultExists01 = $conn->query($resultExists);

  if (mysqli_fetch_row($resultExists01))
  {

      $resultExistsss = "Update indsys1030empdailybreaktimedetail set 
      BreakIntime ='$BreakIntime',
      BreakOuttime ='$BreakOuttime',
      Takenbreakhours ='$Takenbreakhours',
      Intimewithdate ='$Intimewithdate',
      Outtimewithdate='$Outtimewithdate',
      Takenbreakhoursduration='$Takenbreakhoursduration',

      Notes ='$Notes',
      AttandanceEdited='Yes',    


      Addormodifydatetime ='$date',
      Userid ='$user_id'
     
     
  WHERE Employeeid = '$Employeeid' AND Sno ='$Sno'

  AND Clientid ='$Clientid' and Attendencedate='$Attendencedate' ";
      $resultExists0New = $conn->query($resultExistsss);
      if($resultExists0New === TRUE) {
        $Message = "Exists";
      }
      else
      {
        $Message = "Error";
      }
    

  }

  else
  {
      $sqlsave = "INSERT IGNORE INTO indsys1030empdailybreaktimedetail (Clientid,Employeeid,Sno,
  Attendencedate,Userid,Addormodifydatetime,BreakIntime,BreakOuttime,Takenbreakhours,Notes,Intimewithdate,Outtimewithdate,Takenbreakhoursduration)
   VALUES ('$Clientid','$Employeeid','$Sno','$Attendencedate','$user_id','$date','$BreakIntime','$BreakOuttime','$Takenbreakhours','$Notes','$Intimewithdate','$Outtimewithdate','$Takenbreakhoursduration')";
      $resultsave = mysqli_query($conn, $sqlsave);

    
      if($resultsave === TRUE) {
        $Message = "DataSaved";
      }
      else
      {
        $Message = "Error";
      }
  }

  UpdateResthoursindailyattandancedetail($conn,$Clientid,$Employeeid,$Attendencedate,$user_id);

  

  $Display = array(
     
      'Message' => $Message
  );

  $str = json_encode($Display);
  echo trim($str, '"');




 

}
catch(Exception $e)
{

}
 
     
}

function UpdateResthoursindailyattandancedetail($conn,$Clientid,$Employeeid,$Attendancedate,$user_id)
{
   


    $RestNotes ="";
    $EmpbreakinNotes ="";
    $EmpbreakoutNotes ="";

    $i=0;
    $GetState = "SELECT * FROM indsys1030empdailybreaktimedetail where Clientid='$Clientid' and Attendencedate='$Attendancedate'  and Employeeid = '$Employeeid'";

  $result_Region = $conn->query($GetState);

  if(mysqli_num_rows($result_Region) > 0) { 
  while($row = mysqli_fetch_array($result_Region)) { 
   $i++;
    $BreakIntime = $row['BreakIntime'];
    $BreakOuttime = $row['BreakOuttime'];
    $Takenbreakhours = $row['Takenbreakhours'];
    $Notes = $row['Notes'];
    $Takenbreakhoursduration = $row['Takenbreakhoursduration'];
    $RestNotes .="In=$BreakIntime , Out=$BreakOuttime , Breakhrs=$Takenbreakhours ";
    $EmpbreakinNotes .="$BreakIntime <br/>";
    $EmpbreakoutNotes .="$BreakOuttime  <br/>";


       }




  
}

$resultExists = "Update indsys1030empdailyattendancedetail set 

BreakNotes='$RestNotes',
EmpbreakinNotes='$EmpbreakinNotes',
EmpbreakoutNotes='$EmpbreakoutNotes'
   WHERE  Employeeid='$Employeeid' and Attendencedate='$Attendancedate' AND Clientid='$Clientid'  ";
$resultExists01 = $conn->query($resultExists);
$Message ="Exists";


AttendanceeditDetail($conn,$Clientid,$Employeeid,$Attendancedate,$user_id);

}



function AttendanceeditDetail($conn,$Clientid,$Employeeid,$Attendancedate,$user_id)
{
  $GetChapter = "SELECT * FROM indsys1030empdailyattendancedetail where Clientid ='$Clientid' and Attendencedate = '$Attendancedate' And Employeeid='$Employeeid'  ORDER BY Employeeid";
     $result_Chapter = $conn->query($GetChapter );
     if(mysqli_num_rows($result_Chapter) > 0) { 
 
       
     while($row = mysqli_fetch_array($result_Chapter)) {  
      $AttenStatus =$row['AttenStatus'];
      $Intime =$row['Intime'];
      $Outtime =$row['Outtime'];
      $Permissionyesorno =$row['Permissionyesorno'];
  $OTIntime =$row['OTIntime'];
  $OTOuttime =$row['OTOuttime'];
  $Manualattendence = $row['Manualattendence'];
  $Regsisterattendence = $row['Regsisterattendence'];
  $ActualIntime =$row['ActualIntime']; ;
  $ActualOuttime =$row['ActualOuttime'];;
  $ActualOTIntime =$row['ActualOTIntime']; 
$ActualOTOuttime =$row['ActualOTOuttime'];

  
     
       
       } 
     }



     Calculateouttimefetch($conn,$Clientid,$Employeeid,$Attendancedate,$AttenStatus,$Intime,$Outtime,$Permissionyesorno,$Manualattendence,$Regsisterattendence,$OTIntime,$OTOuttime,$ActualIntime,$ActualOuttime,$user_id,$ActualOTIntime,$ActualOTOuttime);
 
}
if($MethodGet == 'DISPATTBREAK')
{
    $AttendanceDate =$form_data['AttendanceDate'];
    $Employeeid=$form_data['Employeeid'];
    $data01 =[];
   $GetState = "SELECT * FROM indsys1030empdailybreaktimedetail where Attendencedate='$AttendanceDate' AND Clientid='$Clientid' AND Employeeid='$Employeeid'   ORDER BY Employeeid";
    $result_Region = $conn->query($GetState);
  
    if(mysqli_num_rows($result_Region) > 0) { 
    while($row = mysqli_fetch_array($result_Region)) {  
      $data01[] = $row;
      } 
    }   
      
    header('Content-Type: application/json');
    echo json_encode($data01);
 }



 if($MethodGet == 'Fetchbreak')
 {
 
     try
     { 
   
 
       $Employeeid =$form_data['Employeeid'];
       $Attendencedate =$form_data['Attendencedate'];
       $breaksno=$form_data['breaksno'];
    
     $GetChapter = "SELECT * FROM indsys1030empdailybreaktimedetail where Clientid ='$Clientid' and Attendencedate = '$Attendencedate' And Employeeid='$Employeeid' and Sno='$breaksno' ORDER BY Employeeid";
     $result_Chapter = $conn->query($GetChapter );
     if(mysqli_num_rows($result_Chapter) > 0) { 
 
       
     while($row = mysqli_fetch_array($result_Chapter)) {  

     $BreakIntime = $row['BreakIntime'];
     $BreakOuttime = $row['BreakOuttime'];
     $Takenbreakhours = $row['Takenbreakhours'];
     $Notes = $row['Notes'];
     $Takenbreakhoursduration = $row['Takenbreakhoursduration'];

       
       } 
     }
 
     $Display=array(
      'BreakIntime'=>$BreakIntime,
      'BreakOuttime'=>$BreakOuttime,
      'Takenbreakhours'=>$Takenbreakhours,
       'Notes'=>  $Notes,
       'Takenbreakhoursduration' =>$Takenbreakhoursduration
     
    
    
   
   );
    
  $str = json_encode($Display);
  echo trim($str, '"');
 }
 catch(Exception $e)
 {
 
 } 
 
    
  }


  if($MethodGet == 'DELETEBREAK')
{
  $Employeeid =$form_data['Employeeid'];
  $Attendencedate =$form_data['Attendencedate'];
  $Sno =$form_data['breaksno'];



  if (mysqli_connect_errno()){
    $Message= "Failed to connect to MySQL: " . mysqli_connect_error(); exit;
  }
  $resultExists = "DELETE FROM indsys1030empdailybreaktimedetail WHERE Employeeid = '$Employeeid' and Sno='$Sno'  AND Clientid ='$Clientid' and Attendencedate='$Attendencedate' ";
  $resultExists01 = $conn->query($resultExists);
    if($resultExists01===TRUE)
    {
       $Message ="Delete";
    
    
    }
    else
    {
        $Message ="Not Delete";
    }
   
 
   

 
    UpdateResthoursindailyattandancedetail($conn,$Clientid,$Employeeid,$Attendencedate,$user_id);



 $Display=array('Message' =>$Message);

  $str = json_encode($Display);
echo trim($str, '"');
    

return;
     
}


if($MethodGet == 'FETCHINDURATION')
{


try
{

    $BreakIntime =$form_data['BreakIntime'];
    $BreakOuttime = $form_data['BreakOuttime'];
    $Attendancedate =$form_data['Attendancedate'];
    $Employeeid = $form_data['Employeeid'];
   
   

 
    $Intimewithdate ="$Attendancedate  $BreakIntime";



    $GetChapter = "SELECT * FROM indsys1030empdailyattendancedetail where Clientid ='$Clientid' and Attendencedate = '$Attendancedate' And Employeeid='$Employeeid'  ORDER BY Employeeid";
    $result_Chapter = $conn->query($GetChapter );
    if(mysqli_num_rows($result_Chapter) > 0) { 

      
    while($row = mysqli_fetch_array($result_Chapter)) {  
   
      $Intime =$row['Intime'];
      $Outtime = $row['Outtime'];
 
    
      
      } 
    }


    $MasterIntime ="$Attendancedate  $Intime";

    if($Intimewithdate<$MasterIntime)
    {
      $Message = "BreakIntimeExists";

      $Display = array(
          'Message' => $Message
      );

      $str = json_encode($Display);
      echo trim($str, '"');
      return;


    }

    $Message = "No";
    $GetNextno = "SELECT * FROM indsys1030empdailybreaktimedetail  where  Employeeid = '$Employeeid'  AND Clientid ='$Clientid' and '$Intimewithdate' between Intimewithdate and Outtimewithdate  LIMIT 1 ";
 
    $result_Nextno = $conn->query($GetNextno);
    if (mysqli_num_rows($result_Nextno) > 0)
    {
        while ($row = mysqli_fetch_array($result_Nextno))
        {
            $Message = "BreakIntimeExists";

            $Display = array(
                'Message' => $Message
            );
      
            $str = json_encode($Display);
            echo trim($str, '"');
            return;
    
            
        }
    }
    // $GetNextno=$Attendancedate;
    // $Message=$GetNextno;
    $Intimecheck =strtotime($BreakIntime);
    $OuttimeCheck = strtotime($BreakOuttime);
    $Durationhrs = $OuttimeCheck-$Intimecheck;
   // $Takenbreakhours = $Durationhrs;
    $Takenbreakhoursduration = gmdate("H:i:s", $Durationhrs);
    $Takenbreakhours = substr(str_replace(':', '.', $Takenbreakhoursduration), 0, 5);




 

 $Display=array('Takenbreakhours' => $Takenbreakhours,'Takenbreakhoursduration' =>$Takenbreakhoursduration,'Message'=>$Message);

  $str = json_encode($Display);
echo trim($str, '"');
}
catch(Exception $e)
{

}
 
     
}
if($MethodGet == 'FETCHOUTDURATION')
{


try
{

    $BreakIntime =$form_data['BreakIntime'];
    $BreakOuttime = $form_data['BreakOuttime'];
    $Attendancedate =$form_data['Attendancedate'];
    $Employeeid = $form_data['Employeeid'];
   
   

 
    $Outtimewithdate ="$Attendancedate  $BreakOuttime";







    $Message = "No";
    $GetNextno = "SELECT * FROM indsys1030empdailybreaktimedetail  where  Employeeid = '$Employeeid'  AND Clientid ='$Clientid' and '$Outtimewithdate' between Intimewithdate and Outtimewithdate  LIMIT 1 ";
 
    $result_Nextno = $conn->query($GetNextno);
    if (mysqli_num_rows($result_Nextno) > 0)
    {
        while ($row = mysqli_fetch_array($result_Nextno))
        {
            $Message = "BreakOuttimeExists";

            $Display = array(
                'Message' => $Message
            );
      
            $str = json_encode($Display);
            echo trim($str, '"');
            return;
    
            
        }
    }
    // $GetNextno=$Attendancedate;
    // $Message=$GetNextno;
    $Intimecheck =strtotime($BreakIntime);
    $OuttimeCheck = strtotime($BreakOuttime);
    $Durationhrs = $OuttimeCheck-$Intimecheck;

    $Takenbreakhoursduration = gmdate("H:i:s", $Durationhrs);

    $Takenbreakhours = substr(str_replace(':', '.', $Takenbreakhoursduration), 0, 5);


 

 $Display=array('Takenbreakhours' => $Takenbreakhours,'Takenbreakhoursduration' =>$Takenbreakhoursduration,'Message'=>$Message);

  $str = json_encode($Display);
echo trim($str, '"');
}
catch(Exception $e)
{

}
 
     
}

function sum_time() {
  $i = 0;
  foreach (func_get_args() as $time) {
      sscanf($time, '%d:%d', $hour, $min);
      $i += $hour * 60 + $min;
  }
  if ($h = floor($i / 60)) {
      $i %= 60;
  }
  return sprintf('%02d.%02d', $h, $i);
}

?>