<<<<<<< HEAD
<?php 
include '../config.php';

session_start();
  $user_id = $_SESSION["Userid"];
      $username = $_SESSION["Username"];
      $usermail=$_SESSION["Mailid"];
      $Clientid =$_SESSION["Clientid"];
   
      $_SESSION["Tittle"] ="Employee";
$Message ='';

date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );


$form_data = json_decode(file_get_contents("php://input"));
  $form_data= json_decode( json_encode($form_data), true);
$MethodGet = $form_data['Method'];


if($MethodGet == 'ModuleNext')
{
   
    $GetNextno = "SELECT * FROM indsys1008mastermodule where ModuleID ='DVNO'  ";

        $result_Nextno = $conn->query($GetNextno);
        if (mysqli_num_rows($result_Nextno) > 0)
        {
            while ($row = mysqli_fetch_array($result_Nextno))
            {
                $data = $row['Nextno'];
                $data01 = $data + 1;
            }
        }  
    header('Content-Type: application/json');
    echo json_encode($data01);
    return;
 }
 if($MethodGet == 'DVDETAILNO')
{


try
{

    $DVoucherno =$form_data['DVoucherno'];
     $Sno = 0;
        $resultExistsnew = "SELECT Nextno FROM vwdvvouchernextno WHERE DVoucherno = '$DVoucherno' AND Clientid = '$Clientid' LIMIT 1";
        $resultExists01new = $conn->query($resultExistsnew);
        if (mysqli_fetch_row($resultExists01new))
        {

            $GetChapter = "SELECT * FROM vwdvvouchernextno WHERE DVoucherno = '$DVoucherno' AND Clientid = '$Clientid'  ";
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


if($MethodGet == 'ChartOfAccountList')
{


try
{

    
   
   

    $GetState = "SELECT * FROM indsys1050chartofaccountdescription  ORDER BY Chartofaccount";
    $result_Region = $conn->query($GetState);
  
    if(mysqli_num_rows($result_Region) > 0) { 
    while($row = mysqli_fetch_array($result_Region)) {  
      $data01[] = $row;
      } 
    }        
 




 

 $Display=array('data01' => $data01);

  $str = json_encode($Display);
echo trim($str, '"');
}
catch(Exception $e)
{

}
 
     
}
////////////////
if($MethodGet == 'FetchDate')
{

    try
    { 
  

      $date = date("Y-m-d " );

      $date2=date('d-M-Y', strtotime($date));
   
 
    
    $Display=array(
      'date'=>  $date,
      'date2'=>  $date2,
     
   
     
      
     
  
  );
   
 $str = json_encode($Display);
 echo trim($str, '"');
}
catch(Exception $e)
{

}
   
 }
 ///////////////////////
 if($MethodGet == 'SelectDCList')
{


try
{

    $DVoucherno = $form_data['DVoucherno'];
   
   

    $GetState = "SELECT * FROM indsys1051vouchermasterdetail Where DVoucherno='$DVoucherno' AND Clientid ='$Clientid'  ";
    $result_Region = $conn->query($GetState);
  
    if(mysqli_num_rows($result_Region) > 0) { 
    while($row = mysqli_fetch_array($result_Region)) {  
      $data01[] = $row;
      } 
    }        
 




 

 $Display=array('data01' => $data01);

  $str = json_encode($Display);
echo trim($str, '"');
}
catch(Exception $e)
{

}
 
     
}
//////////////////////////////////
if($MethodGet == 'Save')
{


try
{
    
    $DVoucherno =$form_data['DVoucherno'];
    $DVoucherdate =$form_data['DVoucherdate'];
    $DVStatus =$form_data['DVStatus'];
    $Receivername =$form_data['Receivername'];
    $Chartofaccount =$form_data['Chartofaccount'];
    $DVdetailno =$form_data['DVdetailno'];
    $Particulars =$form_data['Particulars'];
    $DVAmount =$form_data['DVAmount'];
    $Employeeid =$form_data['Employeeid'];
    $ReceiverType =$form_data['ReceiverType'];
   $Locationid =$form_data['Locationid'];

    
    if(empty($Chartofaccount))
    {
  
      $Message = "Chartofaccount";
  
      $Display=array('Message' =>$Message);
   
      $str = json_encode($Display);
     echo trim($str, '"');
     return;
    }

        
    if(empty($Locationid))
    {
  
      $Message = "Locationid";
  
      $Display=array('Message' =>$Message);
   
      $str = json_encode($Display);
     echo trim($str, '"');
     return;
    }
  /*------------------*/
    if(empty($Receivername))
    {
  
  $Message = "Receivername";
  
      $Display=array('Message' =>$Message);
   
      $str = json_encode($Display);
     echo trim($str, '"');
     return;
    }
    if(empty($Particulars))
    {
  
  $Message = "Particulars";
  
      $Display=array('Message' =>$Message);
   
      $str = json_encode($Display);
     echo trim($str, '"');
     return;
    }
    if(empty($DVAmount))
    {
  
  $Message = "DVAmount";
  
      $Display=array('Message' =>$Message);
   
      $str = json_encode($Display);
     echo trim($str, '"');
     return;
    }
    if($DVAmount ==0)
    {
        $Message = "EnterDVAmount";
  
        $Display=array('Message' =>$Message);
     
        $str = json_encode($Display);
       echo trim($str, '"');
       return;
    }
    if(empty($DVoucherdate))
    {
  
  $Message = "DVoucherdate";
  
      $Display=array('Message' =>$Message);
   
      $str = json_encode($Display);
     echo trim($str, '"');
     return;
    }
   
  $_SESSION['DVNO'] = $DVoucherno;


  $CurrentdateTotalAmount =0;
   $CurrentdateVoucherAmount=0;
   $CurrentdateBalanceAmount =0;
 
 
   $GetTotalCash = "SELECT * FROM indsys1052inwardamountmaster where  Clientid ='$Clientid' AND Locationid='$Locationid'  ";
 
   $result_TotalCash = $conn->query($GetTotalCash);
   if (mysqli_num_rows($result_TotalCash) > 0)
   {
       while ($row = mysqli_fetch_array($result_TotalCash))
       {
          
           $CurrentdateTotalAmount =$row['Totalinwardamount'];
           $CurrentdateVoucherAmount=$row['Totalvoucheramount'];
           $CurrentdateBalanceAmount =$row['Balanceinwardamount'];
       }
   } 

  SaveMaster($conn,$DVoucherno,$Chartofaccount,$DVoucherdate, $Receivername,  $DVStatus,$Clientid,$user_id,$date,$Employeeid,$ReceiverType,$Locationid);
  $DVoucherno = $_SESSION['DVNO'];

    if (mysqli_connect_errno()){
      $Message= "Failed to connect to MySQL: " . mysqli_connect_error(); exit;
    }

    $CurrentdateVoucherAmount =  $CurrentdateVoucherAmount+$DVAmount;  
    $CurrentdateBalanceAmount = $CurrentdateTotalAmount-$CurrentdateVoucherAmount;
    $resultExists = "SELECT * FROM indsys1051vouchermasterdetail WHERE DVoucherno = '$DVoucherno' AND DVdetailno ='$DVdetailno' LIMIT 1";
    $resultExists01 = $conn->query($resultExists);
  $voucherattachmentpath=0;
   
   if(mysqli_fetch_row($resultExists01))
    {
      
        $resultExists = "Update indsys1051vouchermasterdetail set 
        Particulars ='$Particulars',
        DVAmount ='$DVAmount',
        CurrentInwardamount ='$CurrentdateTotalAmount',
        CurrentTotalvoucherAmount ='$CurrentdateVoucherAmount',
        CurrentBalanceAmount ='$CurrentdateBalanceAmount',
       
        Userid='$user_id',
        Addormodifydatetime ='$date'    
       
      
          
           WHERE DVoucherno = '$DVoucherno' AND DVdetailno ='$DVdetailno' ";
        $resultExists01 = $conn->query($resultExists);
        $Message ="Update";
   
    }
  
    else
    {
      $sqlsave = "INSERT IGNORE INTO indsys1051vouchermasterdetail (Clientid,DVoucherno,DVdetailno,Userid,Addormodifydatetime,DVoucherdate,Particulars,DVAmount,CurrentInwardamount,CurrentTotalvoucherAmount,CurrentBalanceAmount,voucherattachmentpath)

      values('$Clientid','$DVoucherno','$DVdetailno','$user_id','$date','$DVoucherdate','$Particulars','$DVAmount','$CurrentdateTotalAmount','$CurrentdateVoucherAmount','$CurrentdateBalanceAmount','$voucherattachmentpath')";
  
      $resultsave = mysqli_query($conn,$sqlsave);
      $Message ="MasterSave";
     
  
   }


   ////////////////////////////////////////////////////////////
   

   
   
   
        $resultExistsINMAS = "SELECT * FROM indsys1052inwardamountmaster WHERE  Clientid ='$Clientid' AND Locationid ='$Locationid' LIMIT 1";
        $resultExists01INMAS = $conn->query($resultExistsINMAS);
      
       
       if(mysqli_fetch_row($resultExists01INMAS))
        {
          
           $UpdateNextno = "Update indsys1052inwardamountmaster
           
           set 
           Totalinwardamount ='$CurrentdateTotalAmount',
           Totalvoucheramount ='$CurrentdateVoucherAmount',
           Balanceinwardamount ='$CurrentdateBalanceAmount',
           Closingbalanceasondate ='$date',
           Lastupdatedate ='$date'   
   
           where  Clientid ='$Clientid' AND Locationid='$Locationid'";
           $resultUpdate = mysqli_query($conn,$UpdateNextno);
         
       
        }
      
        else
        {
          $sqlsaveinmaster = "INSERT IGNORE INTO indsys1052inwardamountmaster (Clientid,Totalinwardamount,Totalvoucheramount,Balanceinwardamount,Userid,Addormodifydatetime,Openingbalanceasondate,Closingbalanceasondate,Lastupdatedate,Locationid)
    
          values('$Clientid','$CurrentdateTotalAmount','$CurrentdateVoucherAmount','$CurrentdateBalanceAmount','$user_id','$date','$date','$date','$date','$Locationid')";
      
          $resultsave = mysqli_query($conn,$sqlsaveinmaster);
         
      
         
          
       }

       $Transactionno = "$DVoucherno-$DVdetailno";
       $resultExistsINMAS = "SELECT * FROM indsys1053transactiondetail WHERE  Clientid ='$Clientid' AND Transactionno='$Transactionno' AND Transactiontype='Payment' AND Locationid='$Locationid' LIMIT 1";
       $resultExists01INMAS = $conn->query($resultExistsINMAS);
     
      
      if(mysqli_fetch_row($resultExists01INMAS))
       {
         
          
        
      
       }
     
       else
       {
         $sqlsaveinmaster = "INSERT IGNORE INTO indsys1053transactiondetail (Clientid,Transactionno,Transactiontype,Transactiondate,Transactionnotes,Debit,Credit,Balance,Userid,Addormodifydatetime,Locationid)
   
         values('$Clientid','$Transactionno','Payment','$DVoucherdate','$Particulars','$DVAmount',0,'$CurrentdateBalanceAmount','$user_id','$date','$Locationid')";
     
         $resultsave = mysqli_query($conn,$sqlsaveinmaster);
        
     
        
         
      }
   
   
   
  
  $Nextno["Nextno"] =$DVoucherno;
   $Display=array('Nextno' => $Nextno["Nextno"],'Message' =>$Message);
  
    $str = json_encode($Display);
  echo trim($str, '"');
  }
  catch(Exception $e)
  {
  
  }
   
       
  }
  ////////////////////////////////////////

  function SaveMaster($conn,$DVoucherno,$Chartofaccount,$DVoucherdate, $Receivername,  $DVStatus,$Clientid,$user_id,$date,$Employeeid,$ReceiverType,$Locationid)
  {
    Test($conn);
  
    $DVoucherno =$_SESSION['Nextno'];

    $resultExists = "SELECT * FROM indsys1051vouchermaster WHERE DVoucherno = '$DVoucherno' LIMIT 1";
    $resultExists01 = $conn->query($resultExists);
  
   
   if(mysqli_fetch_row($resultExists01))
    {
      
      $Message ="Exists";
   
    }
  
    else
    {
      $sqlsave = "INSERT IGNORE INTO indsys1051vouchermaster (Clientid,DVoucherno,Chartofaccount,Userid,Addormodifydatetime,DVoucherdate,Receivername,DVStatus,VoucherType,Receivertype,Employeeid,Locationid)

      values('$Clientid','$DVoucherno','$Chartofaccount','$user_id','$date','$DVoucherdate','$Receivername','$DVStatus','DEBIT','$ReceiverType','$Employeeid','$Locationid')";
  
      $resultsave = mysqli_query($conn,$sqlsave);
     
  
      $UpdateNextno = "Update indsys1008mastermodule set Nextno ='$DVoucherno' where ModuleID ='DVNO'";
      $resultUpdate = mysqli_query($conn,$UpdateNextno);
      $Message ="Data Saved";
  
       $_SESSION["DVNO"] = $DVoucherno;
   }
  




  }


  function Test($conn)
{
    try
    {

        $GetNextno = "SELECT * FROM indsys1008mastermodule where ModuleID ='DVNO'  ";

        $result_Nextno = $conn->query($GetNextno);
        if (mysqli_num_rows($result_Nextno) > 0)
        {
            while ($row = mysqli_fetch_array($result_Nextno))
            {
                $data['Nextno'] = $row['Nextno'];

                $data['Nextno'] = $data['Nextno'] + 1;
            }
        }

        $_SESSION['Nextno'] = $data['Nextno'];

    }
    catch(Exception $e)
    {

    }

}

///////////////////////
if($MethodGet == 'MasterDCList')
{


try
{

   
   
   

    $GetState = "SELECT * FROM vwdvouchermasterview Where DVStatus='Open' AND Clientid ='$Clientid'  ORDER BY DVoucherno";
    $result_Region = $conn->query($GetState);
  
    if(mysqli_num_rows($result_Region) > 0) { 
    while($row = mysqli_fetch_array($result_Region)) {  
      $data01[] = $row;
      } 
    }        
 




 

 $Display=array('data01' => $data01);

  $str = json_encode($Display);
echo trim($str, '"');
}
catch(Exception $e)
{

}
 
     
}
/////////////////////////////////////
if($MethodGet == 'MasterDCListVIEW')
{


try
{

   
   
   

    $GetState = "SELECT * FROM vwdvouchermasterview Where  Clientid ='$Clientid'  ORDER BY DVoucherno";
    $result_Region = $conn->query($GetState);
  
    if(mysqli_num_rows($result_Region) > 0) { 
    while($row = mysqli_fetch_array($result_Region)) {  
      $data01[] = $row;
      } 
    }        
 




 

 $Display=array('data01' => $data01);

  $str = json_encode($Display);
echo trim($str, '"');
}
catch(Exception $e)
{

}
 
     
}
///////////////////////////////
if($MethodGet == 'FetchMaster')
{

    try
    { 
  

      $DVoucherno =$form_data['DVoucherno'];
      $_SESSION["DVNO"] = $DVoucherno;
    $GetChapter = "SELECT * FROM indsys1051vouchermaster where Clientid ='$Clientid' and DVoucherno = '$DVoucherno'  ORDER BY DVoucherno";
    $result_Chapter = $conn->query($GetChapter );
    if(mysqli_num_rows($result_Chapter) > 0) { 
        while($row = mysqli_fetch_array($result_Chapter)) {  
            $Chartofaccount =$row['Chartofaccount'];
            $DVoucherdate =$row['DVoucherdate'];
            $Receivername = $row['Receivername'];
            $ReceiverImagePath =$row['ReceiverImagePath'];
            $DVNotes = $row['DVNotes'];
            $DVStatus=$row['DVStatus'];
            $Receiversignature =$row['Receiversignature'];
            $VoucherType = $row['VoucherType'];

            $DVoucherdate2 = date('d-M-Y', strtotime($DVoucherdate));
         
           
             
      } 
    }
    $Display=array(
        
        'Chartofaccount'=>  $Chartofaccount,
      'DVoucherdate'=> $DVoucherdate,
      'Receivername'=>  $Receivername,
      'ReceiverImagePath'=> $ReceiverImagePath,
      'DVNotes'=> $DVNotes,
      'DVStatus'=> $DVStatus,
      'Receiversignature'=>  $Receiversignature,
      'VoucherType'=> $VoucherType,
      'DVoucherdate2' =>$DVoucherdate2
       
  );
   
  $str = json_encode($Display);
  echo trim($str, '"');
 }
 catch(Exception $e)
 {
 
 }
   
  }
  /////////////////////////////////////
  if($MethodGet == 'Update')
{


try
{
    
    $DVoucherno =$form_data['DVoucherno'];
    $DVoucherdate =$form_data['DVoucherdate'];
    $DVStatus =$form_data['DVStatus'];
    $Receivername =$form_data['Receivername'];
    $Chartofaccount =$form_data['Chartofaccount'];
    $DVdetailno =$form_data['DVdetailno'];
    $Particulars =$form_data['Particulars'];
    $DVAmount =$form_data['DVAmount'];
    $Employeeid =$form_data['Employeeid'];
    $ReceiverType =$form_data['ReceiverType'];
    $Locationid =$form_data['Locationid'];
   

    
    if(empty($Chartofaccount))
    {
  
      $Message = "Chartofaccount";
  
      $Display=array('Message' =>$Message);
   
      $str = json_encode($Display);
     echo trim($str, '"');
     return;
    }
    if(empty($Locationid))
    {
  
      $Message = "Locationid";
  
      $Display=array('Message' =>$Message);
   
      $str = json_encode($Display);
     echo trim($str, '"');
     return;
    }
  /*------------------*/
    if(empty($Receivername))
    {
  
  $Message = "Receivername";
  
      $Display=array('Message' =>$Message);
   
      $str = json_encode($Display);
     echo trim($str, '"');
     return;
    }
    if(empty($Particulars))
    {
  
  $Message = "Particulars";
  
      $Display=array('Message' =>$Message);
   
      $str = json_encode($Display);
     echo trim($str, '"');
     return;
    }
    if(empty($DVAmount))
    {
  
  $Message = "DVAmount";
  
      $Display=array('Message' =>$Message);
   
      $str = json_encode($Display);
     echo trim($str, '"');
     return;
    }
    if($DVAmount ==0)
    {
        $Message = "EnterDVAmount";
  
        $Display=array('Message' =>$Message);
     
        $str = json_encode($Display);
       echo trim($str, '"');
       return;
    }
    if(empty($DVoucherdate))
    {
  
  $Message = "DVoucherdate";
  
      $Display=array('Message' =>$Message);
   
      $str = json_encode($Display);
     echo trim($str, '"');
     return;
    }
   
  $_SESSION['DVNO'] = $DVoucherno;


    if (mysqli_connect_errno()){
      $Message= "Failed to connect to MySQL: " . mysqli_connect_error(); exit;
    }



    $CurrentdateTotalAmount =0;
   $CurrentdateVoucherAmount=0;
   $CurrentdateBalanceAmount =0;
 
 
   $GetTotalCash = "SELECT * FROM indsys1052inwardamountmaster where  Clientid ='$Clientid' AND Locationid='$Locationid' ";
 
   $result_TotalCash = $conn->query($GetTotalCash);
   if (mysqli_num_rows($result_TotalCash) > 0)
   {
       while ($row = mysqli_fetch_array($result_TotalCash))
       {
          
           $CurrentdateTotalAmount =$row['Totalinwardamount'];
           $CurrentdateVoucherAmount=$row['Totalvoucheramount'];
           $CurrentdateBalanceAmount =$row['Balanceinwardamount'];
       }
   } 

    $resultExistsnew = "Update indsys1051vouchermaster set 
    DVoucherdate ='$DVoucherdate',
    DVStatus ='$DVStatus',
    Receivername ='$Receivername',
    Employeeid='$Employeeid',
    Chartofaccount ='$Chartofaccount',
    Locationid='$Locationid',
    Addormodifydatetime ='$date'   
  
      
       WHERE DVoucherno = '$DVoucherno'  ";
    $resultExists01 = $conn->query($resultExistsnew);
    $Message ="Update";

    $voucherattachmentpath=0;
    $CurrentdateVoucherAmount =  $CurrentdateVoucherAmount+$DVAmount;  
    $CurrentdateBalanceAmount = $CurrentdateTotalAmount-$CurrentdateVoucherAmount;

    $resultExists = "SELECT * FROM indsys1051vouchermasterdetail WHERE DVoucherno = '$DVoucherno' AND DVdetailno ='$DVdetailno' LIMIT 1";
    $resultExists01 = $conn->query($resultExists);
  
   
   if(mysqli_fetch_row($resultExists01))
    {
      
        $resultExists = "Update indsys1051vouchermasterdetail set 
        Particulars ='$Particulars',
        DVAmount ='$DVAmount',
        Userid='$user_id',
        Addormodifydatetime ='$date'
   
     
       
      
          
           WHERE DVoucherno = '$DVoucherno' AND DVdetailno ='$DVdetailno' ";
        $resultExists01 = $conn->query($resultExists);
        $Message ="Update";
   
    }
  
    else
    {
      $sqlsave = "INSERT IGNORE INTO indsys1051vouchermasterdetail (Clientid,DVoucherno,DVdetailno,Userid,Addormodifydatetime,DVoucherdate,Particulars,DVAmount)

      values('$Clientid','$DVoucherno','$DVdetailno','$user_id','$date','$DVoucherdate','$Particulars','$DVAmount')";
  
      $resultsave = mysqli_query($conn,$sqlsave);
      $Message ="Detail Save";
     
  
   }
  
  
   $resultExistsINMAS = "SELECT * FROM indsys1052inwardamountmaster WHERE  Clientid ='$Clientid' AND Locationid='$Locationid' LIMIT 1";
   $resultExists01INMAS = $conn->query($resultExistsINMAS);
 
  
  if(mysqli_fetch_row($resultExists01INMAS))
   {
     
      $UpdateNextno = "Update indsys1052inwardamountmaster
      
      set 
      Totalinwardamount ='$CurrentdateTotalAmount',
      Totalvoucheramount ='$CurrentdateVoucherAmount',
      Balanceinwardamount ='$CurrentdateBalanceAmount',
      Closingbalanceasondate ='$date',
      Lastupdatedate ='$date'   

      where  Clientid ='$Clientid' AND Locationid='$Locationid'";
      $resultUpdate = mysqli_query($conn,$UpdateNextno);
    
  
   }
 
   else
   {
     $sqlsaveinmaster = "INSERT IGNORE INTO indsys1052inwardamountmaster (Clientid,Totalinwardamount,Totalvoucheramount,Balanceinwardamount,Userid,Addormodifydatetime,Openingbalanceasondate,Closingbalanceasondate,Lastupdatedate,Locationid,voucherattachmentpath)

     values('$Clientid','$CurrentdateTotalAmount','$CurrentdateVoucherAmount','$CurrentdateBalanceAmount','$user_id','$date','$date','$date','$date','$Locationid','$voucherattachmentpath')";
 
     $resultsave = mysqli_query($conn,$sqlsaveinmaster);
    
 
    
     
  }

  $Transactionno = "$DVoucherno-$DVdetailno";
  $resultExistsINMAS = "SELECT * FROM indsys1053transactiondetail WHERE  Clientid ='$Clientid' AND Transactionno='$Transactionno' AND Transactiontype='Payment' AND Locationid='$Locationid' LIMIT 1";
  $resultExists01INMAS = $conn->query($resultExistsINMAS);

 
 if(mysqli_fetch_row($resultExists01INMAS))
  {
    
     
   
 
  }

  else
  {
    $sqlsaveinmaster = "INSERT IGNORE INTO indsys1053transactiondetail (Clientid,Transactionno,Transactiontype,Transactiondate,Transactionnotes,Debit,Credit,Balance,Userid,Addormodifydatetime,Locationid)

    values('$Clientid','$Transactionno','Payment','$DVoucherdate','$Particulars','$DVAmount',0,'$CurrentdateBalanceAmount','$user_id','$date','$Locationid')";

    $resultsave = mysqli_query($conn,$sqlsaveinmaster);
   

   
    
 }

  

   $Display=array('Message' =>$Message);
  
    $str = json_encode($Display);
  echo trim($str, '"');
  }
  catch(Exception $e)
  {
  
  }
   
       
  }
  ////////////////////////////////////////
  if($MethodGet == 'FetchDetail')
{

    try
    { 
  

      $DVoucherno =$form_data['DVoucherno'];
      $DVdetailno =$form_data['DVdetailno'];
     
    $GetChapter = "SELECT * FROM indsys1051vouchermasterdetail where Clientid ='$Clientid' and DVoucherno = '$DVoucherno' AND DVdetailno='$DVdetailno'  ORDER BY DVoucherno";
    $result_Chapter = $conn->query($GetChapter );
    if(mysqli_num_rows($result_Chapter) > 0) { 
        while($row = mysqli_fetch_array($result_Chapter)) {  
            $Particulars =$row['Particulars'];
            $DVAmount =$row['DVAmount'];
            $voucherattachmentpath =$row['voucherattachmentpath'];
          
           
             
      } 
    }
    $Display=array(
        
        'Particulars'=>  $Particulars,
      'DVAmount'=> $DVAmount,
      'voucherattachmentpath' =>$voucherattachmentpath
     
      
       
  );
   
  $str = json_encode($Display);
  echo trim($str, '"');
 }
 catch(Exception $e)
 {
 
 }
   
  }
  ///////////////////////////////
  if($MethodGet == 'FetchDelete')
{
  $DVoucherno =$form_data['DVoucherno'];
  $DVdetailno =$form_data['DVdetailno'];



  if (mysqli_connect_errno()){
    $Message= "Failed to connect to MySQL: " . mysqli_connect_error(); exit;
  }
  $resultExists = "DELETE FROM indsys1051vouchermasterdetail WHERE  DVoucherno = '$DVoucherno' and DVdetailno='$DVdetailno' ";
  //echo( $resultExists);
  $resultExists01 = $conn->query($resultExists);

    
    $Message ="Delete";
 
 

 





 $Display=array('Message' =>$Message);

  $str = json_encode($Display);
echo trim($str, '"');
    
 
     
}
/////////////////////////////////
if($MethodGet == 'CheckInwardAmount')
{
try
{
$DVAmount =$form_data['DVAmount'];
$Locationid =$form_data['Locationid'];
  $CurrentdateTotalAmount =0;
  $CurrentdateVoucherAmount=0;
  $CurrentdateBalanceAmount =0;


  $GetTotalCash = "SELECT * FROM indsys1052inwardamountmaster where  Clientid ='$Clientid'  AND Locationid='$Locationid' ";

  $result_TotalCash = $conn->query($GetTotalCash);
  if (mysqli_num_rows($result_TotalCash) > 0)
  {
      while ($row = mysqli_fetch_array($result_TotalCash))
      {
         
          $CurrentdateTotalAmount =$row['Totalinwardamount'];
          $CurrentdateVoucherAmount=$row['Totalvoucheramount'];
          $CurrentdateBalanceAmount =$row['Balanceinwardamount'];
      }
  } 

  if($DVAmount > $CurrentdateBalanceAmount)
  {
    $Message = "InwardAmtLess";
  
      $Display=array('Message' =>$Message);
   
      $str = json_encode($Display);
     echo trim($str, '"');
     return;
  }


}
catch(Exception $E)
{

}
}

if($MethodGet == 'GETINBEDETAILS')
 {
    $Fromdate =$form_data['Fromdate'];
    $Todate =$form_data['Todate']; 
    $Chartofaccount =$form_data['Chartofaccount']; 
   $Chartofaccountarray = implode(',', $Chartofaccount); 
   $Chartofaccountarray = "'$Chartofaccountarray'"; // added single quote to start and end position
$Chartofaccountarray = str_replace(",","','","$Chartofaccountarray");     // comma replaced to ','
    $GetState = "SELECT * FROM vwchartofaccountexpenses where DVoucherdate>='$Fromdate' and DVoucherdate<='$Todate' AND Chartofaccount in(". $Chartofaccountarray.") ORDER BY DVoucherno ";
    $result_Region = $conn->query($GetState);

  
    if(mysqli_num_rows($result_Region) > 0) { 
    while($row = mysqli_fetch_array($result_Region)) {  
      $data01[] = $row;
      } 
    }  
      
  
    $Fromdate2 = date('d-M-Y', strtotime($Fromdate)); 
    $Todate2 = date('d-M-Y', strtotime($Todate)); 
 
 
         $Display=array(
           'data01' =>$data01,   
           'Fromdate2' =>$Fromdate2,      
           'Todate2' =>$Todate2
                 );
    
         $str = json_encode($Display);
        echo trim($str, '"');
        return;
  }
  ///////////////////////////////
  if($MethodGet == 'GETEMPLIST')
 {
    
    
    $GetState = "SELECT * FROM indsys1017employeemaster where Clientid='$Clientid'  AND EmpActive='Active'  ";
    $result_Region = $conn->query($GetState);
  
    if(mysqli_num_rows($result_Region) > 0) { 
    while($row = mysqli_fetch_array($result_Region)) {  
      $data01[] = $row;
      } 
    }  
      
  
 
 
         $Display=array(
           'data01' =>$data01,   
          
                 );
    
         $str = json_encode($Display);
        echo trim($str, '"');
        return;
  }
  /////////////////////////////

  if($MethodGet == 'FetchEmp')
{

    try
    { 
  

      $Employeeid =$form_data['Employeeid'];
     
    $GetChapter = "SELECT * FROM indsys1017employeemaster where Clientid ='$Clientid' and Employeeid = '$Employeeid'  ORDER BY Employeeid";
    $result_Chapter = $conn->query($GetChapter );
    if(mysqli_num_rows($result_Chapter) > 0) { 
        while($row = mysqli_fetch_array($result_Chapter)) {  
            $Fullname =$row['Fullname'];
           
         
           
             
      } 
    }
    $Display=array(
        
        'Fullname'=>  $Fullname,
    
       
  );
   
  $str = json_encode($Display);
  echo trim($str, '"');
 }
 catch(Exception $e)
 {
 
 }
   
  }
  //////////////////////////
  if($MethodGet == 'LOCATIONLIST')
  {
  
  
  try
  {
  
      
     
     
  
      $GetState = "SELECT * FROM indsys1031locationmaster where Clientid='$Clientid'  ORDER BY ID ";
      $result_Region = $conn->query($GetState);
    
      if(mysqli_num_rows($result_Region) > 0) { 
      while($row = mysqli_fetch_array($result_Region)) {  
        $data01[] = $row;
        } 
      }        
   
  
  
      $Clientid =$_SESSION["Clientid"];
  
      $Authorizedno =$_SESSION["Authorizedno"];

      $GetNextno = "SELECT * FROM indsys1000useradmin where  Clientid ='$Clientid'  And Userid='$user_id' ";
 
      $result_Nextno = $conn->query($GetNextno);
      if (mysqli_num_rows($result_Nextno) > 0)
      {
          while ($row = mysqli_fetch_array($result_Nextno))
          {
              $Locationid = $row['Locationid'];
             
          }
      }  

  
   $Display=array('data01' => $data01,
  'Clientid' =>$Clientid,
  'Authorizedno' =>$Authorizedno,
  'Locationid' =>$Locationid
);
  
    $str = json_encode($Display);
  echo trim($str, '"');
  }
  catch(Exception $e)
  {
  
  }
   
       
  }
  ///////////////////////////////////
  if($MethodGet == 'ModuleNextClient')
  {
     
   
  $Locationid = $form_data['Locationid'];
  
  
      $GetNextno = "SELECT * FROM indsys1008mastermodule where ModuleID ='INWARDCASH' AND Clientid ='$Clientid'  ";
  
          $result_Nextno = $conn->query($GetNextno);
          if (mysqli_num_rows($result_Nextno) > 0)
          {
              while ($row = mysqli_fetch_array($result_Nextno))
              {
                  $data = $row['Nextno'];
                  $data01 = $data + 1;
              }
          }  
  
          $Textno = $data01;
         $Inwarddate = $date;
         $CurrentdateTotalAmount =0;
         $CurrentdateVoucherAmount=0;
         $CurrentdateBalanceAmount =0;
 
 
         $GetTotalCash = "SELECT * FROM indsys1052inwardamountmaster where  Clientid ='$Clientid' AND Locationid='$Locationid'  ";
  
         $result_TotalCash = $conn->query($GetTotalCash);
         if (mysqli_num_rows($result_TotalCash) > 0)
         {
             while ($row = mysqli_fetch_array($result_TotalCash))
             {
                
                 $CurrentdateTotalAmount =$row['Totalinwardamount'];
                 $CurrentdateVoucherAmount=$row['Totalvoucheramount'];
                 $CurrentdateBalanceAmount =$row['Balanceinwardamount'];
             }
         }  
 
       
  
  
         $date = date("Y-m-d " );
          
         $Inwarddate = $date;
  
  $Fromdate2 = date('d-M-Y', strtotime($Inwarddate));
          $Display=array(
            'InwardMasterno' =>$Textno,
            'CurrentdateTotalAmount' => $CurrentdateTotalAmount,
            'CurrentdateVoucherAmount'=>$CurrentdateVoucherAmount,
            'CurrentdateBalanceAmount' =>$CurrentdateBalanceAmount,
            'Inwarddate' =>$Inwarddate,
            'Fromdate2' =>$Fromdate2
                  );
     
          $str = json_encode($Display);
         echo trim($str, '"');
         return;
   }
   
=======
<?php 
include '../config.php';

session_start();
  $user_id = $_SESSION["Userid"];
      $username = $_SESSION["Username"];
      $usermail=$_SESSION["Mailid"];
      $Clientid =$_SESSION["Clientid"];
   
      $_SESSION["Tittle"] ="Employee";
$Message ='';

date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );


$form_data = json_decode(file_get_contents("php://input"));
  $form_data= json_decode( json_encode($form_data), true);
$MethodGet = $form_data['Method'];


if($MethodGet == 'ModuleNext')
{
   
    $GetNextno = "SELECT * FROM indsys1008mastermodule where ModuleID ='DVNO'  ";

        $result_Nextno = $conn->query($GetNextno);
        if (mysqli_num_rows($result_Nextno) > 0)
        {
            while ($row = mysqli_fetch_array($result_Nextno))
            {
                $data = $row['Nextno'];
                $data01 = $data + 1;
            }
        }  
    header('Content-Type: application/json');
    echo json_encode($data01);
    return;
 }
 if($MethodGet == 'DVDETAILNO')
{


try
{

    $DVoucherno =$form_data['DVoucherno'];
     $Sno = 0;
        $resultExistsnew = "SELECT Nextno FROM vwdvvouchernextno WHERE DVoucherno = '$DVoucherno' AND Clientid = '$Clientid' LIMIT 1";
        $resultExists01new = $conn->query($resultExistsnew);
        if (mysqli_fetch_row($resultExists01new))
        {

            $GetChapter = "SELECT * FROM vwdvvouchernextno WHERE DVoucherno = '$DVoucherno' AND Clientid = '$Clientid'  ";
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


if($MethodGet == 'ChartOfAccountList')
{


try
{

    
   
   

    $GetState = "SELECT * FROM indsys1050chartofaccountdescription  ORDER BY Chartofaccount";
    $result_Region = $conn->query($GetState);
  
    if(mysqli_num_rows($result_Region) > 0) { 
    while($row = mysqli_fetch_array($result_Region)) {  
      $data01[] = $row;
      } 
    }        
 




 

 $Display=array('data01' => $data01);

  $str = json_encode($Display);
echo trim($str, '"');
}
catch(Exception $e)
{

}
 
     
}
////////////////
if($MethodGet == 'FetchDate')
{

    try
    { 
  

      $date = date("Y-m-d " );

      $date2=date('d-M-Y', strtotime($date));
   
 
    
    $Display=array(
      'date'=>  $date,
      'date2'=>  $date2,
     
   
     
      
     
  
  );
   
 $str = json_encode($Display);
 echo trim($str, '"');
}
catch(Exception $e)
{

}
   
 }
 ///////////////////////
 if($MethodGet == 'SelectDCList')
{


try
{

    $DVoucherno = $form_data['DVoucherno'];
   
   

    $GetState = "SELECT * FROM indsys1051vouchermasterdetail Where DVoucherno='$DVoucherno' AND Clientid ='$Clientid'  ";
    $result_Region = $conn->query($GetState);
  
    if(mysqli_num_rows($result_Region) > 0) { 
    while($row = mysqli_fetch_array($result_Region)) {  
      $data01[] = $row;
      } 
    }        
 




 

 $Display=array('data01' => $data01);

  $str = json_encode($Display);
echo trim($str, '"');
}
catch(Exception $e)
{

}
 
     
}
//////////////////////////////////
if($MethodGet == 'Save')
{


try
{
    
    $DVoucherno =$form_data['DVoucherno'];
    $DVoucherdate =$form_data['DVoucherdate'];
    $DVStatus =$form_data['DVStatus'];
    $Receivername =$form_data['Receivername'];
    $Chartofaccount =$form_data['Chartofaccount'];
    $DVdetailno =$form_data['DVdetailno'];
    $Particulars =$form_data['Particulars'];
    $DVAmount =$form_data['DVAmount'];
    $Employeeid =$form_data['Employeeid'];
    $ReceiverType =$form_data['ReceiverType'];
   $Locationid =$form_data['Locationid'];

    
    if(empty($Chartofaccount))
    {
  
      $Message = "Chartofaccount";
  
      $Display=array('Message' =>$Message);
   
      $str = json_encode($Display);
     echo trim($str, '"');
     return;
    }

        
    if(empty($Locationid))
    {
  
      $Message = "Locationid";
  
      $Display=array('Message' =>$Message);
   
      $str = json_encode($Display);
     echo trim($str, '"');
     return;
    }
  /*------------------*/
    if(empty($Receivername))
    {
  
  $Message = "Receivername";
  
      $Display=array('Message' =>$Message);
   
      $str = json_encode($Display);
     echo trim($str, '"');
     return;
    }
    if(empty($Particulars))
    {
  
  $Message = "Particulars";
  
      $Display=array('Message' =>$Message);
   
      $str = json_encode($Display);
     echo trim($str, '"');
     return;
    }
    if(empty($DVAmount))
    {
  
  $Message = "DVAmount";
  
      $Display=array('Message' =>$Message);
   
      $str = json_encode($Display);
     echo trim($str, '"');
     return;
    }
    if($DVAmount ==0)
    {
        $Message = "EnterDVAmount";
  
        $Display=array('Message' =>$Message);
     
        $str = json_encode($Display);
       echo trim($str, '"');
       return;
    }
    if(empty($DVoucherdate))
    {
  
  $Message = "DVoucherdate";
  
      $Display=array('Message' =>$Message);
   
      $str = json_encode($Display);
     echo trim($str, '"');
     return;
    }
   
  $_SESSION['DVNO'] = $DVoucherno;


  $CurrentdateTotalAmount =0;
   $CurrentdateVoucherAmount=0;
   $CurrentdateBalanceAmount =0;
 
 
   $GetTotalCash = "SELECT * FROM indsys1052inwardamountmaster where  Clientid ='$Clientid' AND Locationid='$Locationid'  ";
 
   $result_TotalCash = $conn->query($GetTotalCash);
   if (mysqli_num_rows($result_TotalCash) > 0)
   {
       while ($row = mysqli_fetch_array($result_TotalCash))
       {
          
           $CurrentdateTotalAmount =$row['Totalinwardamount'];
           $CurrentdateVoucherAmount=$row['Totalvoucheramount'];
           $CurrentdateBalanceAmount =$row['Balanceinwardamount'];
       }
   } 

  SaveMaster($conn,$DVoucherno,$Chartofaccount,$DVoucherdate, $Receivername,  $DVStatus,$Clientid,$user_id,$date,$Employeeid,$ReceiverType,$Locationid);
  $DVoucherno = $_SESSION['DVNO'];

    if (mysqli_connect_errno()){
      $Message= "Failed to connect to MySQL: " . mysqli_connect_error(); exit;
    }

    $CurrentdateVoucherAmount =  $CurrentdateVoucherAmount+$DVAmount;  
    $CurrentdateBalanceAmount = $CurrentdateTotalAmount-$CurrentdateVoucherAmount;
    $resultExists = "SELECT * FROM indsys1051vouchermasterdetail WHERE DVoucherno = '$DVoucherno' AND DVdetailno ='$DVdetailno' LIMIT 1";
    $resultExists01 = $conn->query($resultExists);
  $voucherattachmentpath=0;
   
   if(mysqli_fetch_row($resultExists01))
    {
      
        $resultExists = "Update indsys1051vouchermasterdetail set 
        Particulars ='$Particulars',
        DVAmount ='$DVAmount',
        CurrentInwardamount ='$CurrentdateTotalAmount',
        CurrentTotalvoucherAmount ='$CurrentdateVoucherAmount',
        CurrentBalanceAmount ='$CurrentdateBalanceAmount',
       
        Userid='$user_id',
        Addormodifydatetime ='$date'    
       
      
          
           WHERE DVoucherno = '$DVoucherno' AND DVdetailno ='$DVdetailno' ";
        $resultExists01 = $conn->query($resultExists);
        $Message ="Update";
   
    }
  
    else
    {
      $sqlsave = "INSERT IGNORE INTO indsys1051vouchermasterdetail (Clientid,DVoucherno,DVdetailno,Userid,Addormodifydatetime,DVoucherdate,Particulars,DVAmount,CurrentInwardamount,CurrentTotalvoucherAmount,CurrentBalanceAmount,voucherattachmentpath)

      values('$Clientid','$DVoucherno','$DVdetailno','$user_id','$date','$DVoucherdate','$Particulars','$DVAmount','$CurrentdateTotalAmount','$CurrentdateVoucherAmount','$CurrentdateBalanceAmount','$voucherattachmentpath')";
  
      $resultsave = mysqli_query($conn,$sqlsave);
      $Message ="MasterSave";
     
  
   }


   ////////////////////////////////////////////////////////////
   

   
   
   
        $resultExistsINMAS = "SELECT * FROM indsys1052inwardamountmaster WHERE  Clientid ='$Clientid' AND Locationid ='$Locationid' LIMIT 1";
        $resultExists01INMAS = $conn->query($resultExistsINMAS);
      
       
       if(mysqli_fetch_row($resultExists01INMAS))
        {
          
           $UpdateNextno = "Update indsys1052inwardamountmaster
           
           set 
           Totalinwardamount ='$CurrentdateTotalAmount',
           Totalvoucheramount ='$CurrentdateVoucherAmount',
           Balanceinwardamount ='$CurrentdateBalanceAmount',
           Closingbalanceasondate ='$date',
           Lastupdatedate ='$date'   
   
           where  Clientid ='$Clientid' AND Locationid='$Locationid'";
           $resultUpdate = mysqli_query($conn,$UpdateNextno);
         
       
        }
      
        else
        {
          $sqlsaveinmaster = "INSERT IGNORE INTO indsys1052inwardamountmaster (Clientid,Totalinwardamount,Totalvoucheramount,Balanceinwardamount,Userid,Addormodifydatetime,Openingbalanceasondate,Closingbalanceasondate,Lastupdatedate,Locationid)
    
          values('$Clientid','$CurrentdateTotalAmount','$CurrentdateVoucherAmount','$CurrentdateBalanceAmount','$user_id','$date','$date','$date','$date','$Locationid')";
      
          $resultsave = mysqli_query($conn,$sqlsaveinmaster);
         
      
         
          
       }

       $Transactionno = "$DVoucherno-$DVdetailno";
       $resultExistsINMAS = "SELECT * FROM indsys1053transactiondetail WHERE  Clientid ='$Clientid' AND Transactionno='$Transactionno' AND Transactiontype='Payment' AND Locationid='$Locationid' LIMIT 1";
       $resultExists01INMAS = $conn->query($resultExistsINMAS);
     
      
      if(mysqli_fetch_row($resultExists01INMAS))
       {
         
          
        
      
       }
     
       else
       {
         $sqlsaveinmaster = "INSERT IGNORE INTO indsys1053transactiondetail (Clientid,Transactionno,Transactiontype,Transactiondate,Transactionnotes,Debit,Credit,Balance,Userid,Addormodifydatetime,Locationid)
   
         values('$Clientid','$Transactionno','Payment','$DVoucherdate','$Particulars','$DVAmount',0,'$CurrentdateBalanceAmount','$user_id','$date','$Locationid')";
     
         $resultsave = mysqli_query($conn,$sqlsaveinmaster);
        
     
        
         
      }
   
   
   
  
  $Nextno["Nextno"] =$DVoucherno;
   $Display=array('Nextno' => $Nextno["Nextno"],'Message' =>$Message);
  
    $str = json_encode($Display);
  echo trim($str, '"');
  }
  catch(Exception $e)
  {
  
  }
   
       
  }
  ////////////////////////////////////////

  function SaveMaster($conn,$DVoucherno,$Chartofaccount,$DVoucherdate, $Receivername,  $DVStatus,$Clientid,$user_id,$date,$Employeeid,$ReceiverType,$Locationid)
  {
    Test($conn);
  
    $DVoucherno =$_SESSION['Nextno'];

    $resultExists = "SELECT * FROM indsys1051vouchermaster WHERE DVoucherno = '$DVoucherno' LIMIT 1";
    $resultExists01 = $conn->query($resultExists);
  
   
   if(mysqli_fetch_row($resultExists01))
    {
      
      $Message ="Exists";
   
    }
  
    else
    {
      $sqlsave = "INSERT IGNORE INTO indsys1051vouchermaster (Clientid,DVoucherno,Chartofaccount,Userid,Addormodifydatetime,DVoucherdate,Receivername,DVStatus,VoucherType,Receivertype,Employeeid,Locationid)

      values('$Clientid','$DVoucherno','$Chartofaccount','$user_id','$date','$DVoucherdate','$Receivername','$DVStatus','DEBIT','$ReceiverType','$Employeeid','$Locationid')";
  
      $resultsave = mysqli_query($conn,$sqlsave);
     
  
      $UpdateNextno = "Update indsys1008mastermodule set Nextno ='$DVoucherno' where ModuleID ='DVNO'";
      $resultUpdate = mysqli_query($conn,$UpdateNextno);
      $Message ="Data Saved";
  
       $_SESSION["DVNO"] = $DVoucherno;
   }
  




  }


  function Test($conn)
{
    try
    {

        $GetNextno = "SELECT * FROM indsys1008mastermodule where ModuleID ='DVNO'  ";

        $result_Nextno = $conn->query($GetNextno);
        if (mysqli_num_rows($result_Nextno) > 0)
        {
            while ($row = mysqli_fetch_array($result_Nextno))
            {
                $data['Nextno'] = $row['Nextno'];

                $data['Nextno'] = $data['Nextno'] + 1;
            }
        }

        $_SESSION['Nextno'] = $data['Nextno'];

    }
    catch(Exception $e)
    {

    }

}

///////////////////////
if($MethodGet == 'MasterDCList')
{


try
{

   
   
   

    $GetState = "SELECT * FROM vwdvouchermasterview Where DVStatus='Open' AND Clientid ='$Clientid'  ORDER BY DVoucherno";
    $result_Region = $conn->query($GetState);
  
    if(mysqli_num_rows($result_Region) > 0) { 
    while($row = mysqli_fetch_array($result_Region)) {  
      $data01[] = $row;
      } 
    }        
 




 

 $Display=array('data01' => $data01);

  $str = json_encode($Display);
echo trim($str, '"');
}
catch(Exception $e)
{

}
 
     
}
/////////////////////////////////////
if($MethodGet == 'MasterDCListVIEW')
{


try
{

   
   
   

    $GetState = "SELECT * FROM vwdvouchermasterview Where  Clientid ='$Clientid'  ORDER BY DVoucherno";
    $result_Region = $conn->query($GetState);
  
    if(mysqli_num_rows($result_Region) > 0) { 
    while($row = mysqli_fetch_array($result_Region)) {  
      $data01[] = $row;
      } 
    }        
 




 

 $Display=array('data01' => $data01);

  $str = json_encode($Display);
echo trim($str, '"');
}
catch(Exception $e)
{

}
 
     
}
///////////////////////////////
if($MethodGet == 'FetchMaster')
{

    try
    { 
  

      $DVoucherno =$form_data['DVoucherno'];
      $_SESSION["DVNO"] = $DVoucherno;
    $GetChapter = "SELECT * FROM indsys1051vouchermaster where Clientid ='$Clientid' and DVoucherno = '$DVoucherno'  ORDER BY DVoucherno";
    $result_Chapter = $conn->query($GetChapter );
    if(mysqli_num_rows($result_Chapter) > 0) { 
        while($row = mysqli_fetch_array($result_Chapter)) {  
            $Chartofaccount =$row['Chartofaccount'];
            $DVoucherdate =$row['DVoucherdate'];
            $Receivername = $row['Receivername'];
            $ReceiverImagePath =$row['ReceiverImagePath'];
            $DVNotes = $row['DVNotes'];
            $DVStatus=$row['DVStatus'];
            $Receiversignature =$row['Receiversignature'];
            $VoucherType = $row['VoucherType'];

            $DVoucherdate2 = date('d-M-Y', strtotime($DVoucherdate));
         
           
             
      } 
    }
    $Display=array(
        
        'Chartofaccount'=>  $Chartofaccount,
      'DVoucherdate'=> $DVoucherdate,
      'Receivername'=>  $Receivername,
      'ReceiverImagePath'=> $ReceiverImagePath,
      'DVNotes'=> $DVNotes,
      'DVStatus'=> $DVStatus,
      'Receiversignature'=>  $Receiversignature,
      'VoucherType'=> $VoucherType,
      'DVoucherdate2' =>$DVoucherdate2
       
  );
   
  $str = json_encode($Display);
  echo trim($str, '"');
 }
 catch(Exception $e)
 {
 
 }
   
  }
  /////////////////////////////////////
  if($MethodGet == 'Update')
{


try
{
    
    $DVoucherno =$form_data['DVoucherno'];
    $DVoucherdate =$form_data['DVoucherdate'];
    $DVStatus =$form_data['DVStatus'];
    $Receivername =$form_data['Receivername'];
    $Chartofaccount =$form_data['Chartofaccount'];
    $DVdetailno =$form_data['DVdetailno'];
    $Particulars =$form_data['Particulars'];
    $DVAmount =$form_data['DVAmount'];
    $Employeeid =$form_data['Employeeid'];
    $ReceiverType =$form_data['ReceiverType'];
    $Locationid =$form_data['Locationid'];
   

    
    if(empty($Chartofaccount))
    {
  
      $Message = "Chartofaccount";
  
      $Display=array('Message' =>$Message);
   
      $str = json_encode($Display);
     echo trim($str, '"');
     return;
    }
    if(empty($Locationid))
    {
  
      $Message = "Locationid";
  
      $Display=array('Message' =>$Message);
   
      $str = json_encode($Display);
     echo trim($str, '"');
     return;
    }
  /*------------------*/
    if(empty($Receivername))
    {
  
  $Message = "Receivername";
  
      $Display=array('Message' =>$Message);
   
      $str = json_encode($Display);
     echo trim($str, '"');
     return;
    }
    if(empty($Particulars))
    {
  
  $Message = "Particulars";
  
      $Display=array('Message' =>$Message);
   
      $str = json_encode($Display);
     echo trim($str, '"');
     return;
    }
    if(empty($DVAmount))
    {
  
  $Message = "DVAmount";
  
      $Display=array('Message' =>$Message);
   
      $str = json_encode($Display);
     echo trim($str, '"');
     return;
    }
    if($DVAmount ==0)
    {
        $Message = "EnterDVAmount";
  
        $Display=array('Message' =>$Message);
     
        $str = json_encode($Display);
       echo trim($str, '"');
       return;
    }
    if(empty($DVoucherdate))
    {
  
  $Message = "DVoucherdate";
  
      $Display=array('Message' =>$Message);
   
      $str = json_encode($Display);
     echo trim($str, '"');
     return;
    }
   
  $_SESSION['DVNO'] = $DVoucherno;


    if (mysqli_connect_errno()){
      $Message= "Failed to connect to MySQL: " . mysqli_connect_error(); exit;
    }



    $CurrentdateTotalAmount =0;
   $CurrentdateVoucherAmount=0;
   $CurrentdateBalanceAmount =0;
 
 
   $GetTotalCash = "SELECT * FROM indsys1052inwardamountmaster where  Clientid ='$Clientid' AND Locationid='$Locationid' ";
 
   $result_TotalCash = $conn->query($GetTotalCash);
   if (mysqli_num_rows($result_TotalCash) > 0)
   {
       while ($row = mysqli_fetch_array($result_TotalCash))
       {
          
           $CurrentdateTotalAmount =$row['Totalinwardamount'];
           $CurrentdateVoucherAmount=$row['Totalvoucheramount'];
           $CurrentdateBalanceAmount =$row['Balanceinwardamount'];
       }
   } 

    $resultExistsnew = "Update indsys1051vouchermaster set 
    DVoucherdate ='$DVoucherdate',
    DVStatus ='$DVStatus',
    Receivername ='$Receivername',
    Employeeid='$Employeeid',
    Chartofaccount ='$Chartofaccount',
    Locationid='$Locationid',
    Addormodifydatetime ='$date'   
  
      
       WHERE DVoucherno = '$DVoucherno'  ";
    $resultExists01 = $conn->query($resultExistsnew);
    $Message ="Update";

    $voucherattachmentpath=0;
    $CurrentdateVoucherAmount =  $CurrentdateVoucherAmount+$DVAmount;  
    $CurrentdateBalanceAmount = $CurrentdateTotalAmount-$CurrentdateVoucherAmount;

    $resultExists = "SELECT * FROM indsys1051vouchermasterdetail WHERE DVoucherno = '$DVoucherno' AND DVdetailno ='$DVdetailno' LIMIT 1";
    $resultExists01 = $conn->query($resultExists);
  
   
   if(mysqli_fetch_row($resultExists01))
    {
      
        $resultExists = "Update indsys1051vouchermasterdetail set 
        Particulars ='$Particulars',
        DVAmount ='$DVAmount',
        Userid='$user_id',
        Addormodifydatetime ='$date'
   
     
       
      
          
           WHERE DVoucherno = '$DVoucherno' AND DVdetailno ='$DVdetailno' ";
        $resultExists01 = $conn->query($resultExists);
        $Message ="Update";
   
    }
  
    else
    {
      $sqlsave = "INSERT IGNORE INTO indsys1051vouchermasterdetail (Clientid,DVoucherno,DVdetailno,Userid,Addormodifydatetime,DVoucherdate,Particulars,DVAmount)

      values('$Clientid','$DVoucherno','$DVdetailno','$user_id','$date','$DVoucherdate','$Particulars','$DVAmount')";
  
      $resultsave = mysqli_query($conn,$sqlsave);
      $Message ="Detail Save";
     
  
   }
  
  
   $resultExistsINMAS = "SELECT * FROM indsys1052inwardamountmaster WHERE  Clientid ='$Clientid' AND Locationid='$Locationid' LIMIT 1";
   $resultExists01INMAS = $conn->query($resultExistsINMAS);
 
  
  if(mysqli_fetch_row($resultExists01INMAS))
   {
     
      $UpdateNextno = "Update indsys1052inwardamountmaster
      
      set 
      Totalinwardamount ='$CurrentdateTotalAmount',
      Totalvoucheramount ='$CurrentdateVoucherAmount',
      Balanceinwardamount ='$CurrentdateBalanceAmount',
      Closingbalanceasondate ='$date',
      Lastupdatedate ='$date'   

      where  Clientid ='$Clientid' AND Locationid='$Locationid'";
      $resultUpdate = mysqli_query($conn,$UpdateNextno);
    
  
   }
 
   else
   {
     $sqlsaveinmaster = "INSERT IGNORE INTO indsys1052inwardamountmaster (Clientid,Totalinwardamount,Totalvoucheramount,Balanceinwardamount,Userid,Addormodifydatetime,Openingbalanceasondate,Closingbalanceasondate,Lastupdatedate,Locationid,voucherattachmentpath)

     values('$Clientid','$CurrentdateTotalAmount','$CurrentdateVoucherAmount','$CurrentdateBalanceAmount','$user_id','$date','$date','$date','$date','$Locationid','$voucherattachmentpath')";
 
     $resultsave = mysqli_query($conn,$sqlsaveinmaster);
    
 
    
     
  }

  $Transactionno = "$DVoucherno-$DVdetailno";
  $resultExistsINMAS = "SELECT * FROM indsys1053transactiondetail WHERE  Clientid ='$Clientid' AND Transactionno='$Transactionno' AND Transactiontype='Payment' AND Locationid='$Locationid' LIMIT 1";
  $resultExists01INMAS = $conn->query($resultExistsINMAS);

 
 if(mysqli_fetch_row($resultExists01INMAS))
  {
    
     
   
 
  }

  else
  {
    $sqlsaveinmaster = "INSERT IGNORE INTO indsys1053transactiondetail (Clientid,Transactionno,Transactiontype,Transactiondate,Transactionnotes,Debit,Credit,Balance,Userid,Addormodifydatetime,Locationid)

    values('$Clientid','$Transactionno','Payment','$DVoucherdate','$Particulars','$DVAmount',0,'$CurrentdateBalanceAmount','$user_id','$date','$Locationid')";

    $resultsave = mysqli_query($conn,$sqlsaveinmaster);
   

   
    
 }

  

   $Display=array('Message' =>$Message);
  
    $str = json_encode($Display);
  echo trim($str, '"');
  }
  catch(Exception $e)
  {
  
  }
   
       
  }
  ////////////////////////////////////////
  if($MethodGet == 'FetchDetail')
{

    try
    { 
  

      $DVoucherno =$form_data['DVoucherno'];
      $DVdetailno =$form_data['DVdetailno'];
     
    $GetChapter = "SELECT * FROM indsys1051vouchermasterdetail where Clientid ='$Clientid' and DVoucherno = '$DVoucherno' AND DVdetailno='$DVdetailno'  ORDER BY DVoucherno";
    $result_Chapter = $conn->query($GetChapter );
    if(mysqli_num_rows($result_Chapter) > 0) { 
        while($row = mysqli_fetch_array($result_Chapter)) {  
            $Particulars =$row['Particulars'];
            $DVAmount =$row['DVAmount'];
            $voucherattachmentpath =$row['voucherattachmentpath'];
          
           
             
      } 
    }
    $Display=array(
        
        'Particulars'=>  $Particulars,
      'DVAmount'=> $DVAmount,
      'voucherattachmentpath' =>$voucherattachmentpath
     
      
       
  );
   
  $str = json_encode($Display);
  echo trim($str, '"');
 }
 catch(Exception $e)
 {
 
 }
   
  }
  ///////////////////////////////
  if($MethodGet == 'FetchDelete')
{
  $DVoucherno =$form_data['DVoucherno'];
  $DVdetailno =$form_data['DVdetailno'];



  if (mysqli_connect_errno()){
    $Message= "Failed to connect to MySQL: " . mysqli_connect_error(); exit;
  }
  $resultExists = "DELETE FROM indsys1051vouchermasterdetail WHERE  DVoucherno = '$DVoucherno' and DVdetailno='$DVdetailno' ";
  //echo( $resultExists);
  $resultExists01 = $conn->query($resultExists);

    
    $Message ="Delete";
 
 

 





 $Display=array('Message' =>$Message);

  $str = json_encode($Display);
echo trim($str, '"');
    
 
     
}
/////////////////////////////////
if($MethodGet == 'CheckInwardAmount')
{
try
{
$DVAmount =$form_data['DVAmount'];
$Locationid =$form_data['Locationid'];
  $CurrentdateTotalAmount =0;
  $CurrentdateVoucherAmount=0;
  $CurrentdateBalanceAmount =0;


  $GetTotalCash = "SELECT * FROM indsys1052inwardamountmaster where  Clientid ='$Clientid'  AND Locationid='$Locationid' ";

  $result_TotalCash = $conn->query($GetTotalCash);
  if (mysqli_num_rows($result_TotalCash) > 0)
  {
      while ($row = mysqli_fetch_array($result_TotalCash))
      {
         
          $CurrentdateTotalAmount =$row['Totalinwardamount'];
          $CurrentdateVoucherAmount=$row['Totalvoucheramount'];
          $CurrentdateBalanceAmount =$row['Balanceinwardamount'];
      }
  } 

  if($DVAmount > $CurrentdateBalanceAmount)
  {
    $Message = "InwardAmtLess";
  
      $Display=array('Message' =>$Message);
   
      $str = json_encode($Display);
     echo trim($str, '"');
     return;
  }


}
catch(Exception $E)
{

}
}

if($MethodGet == 'GETINBEDETAILS')
 {
    $Fromdate =$form_data['Fromdate'];
    $Todate =$form_data['Todate']; 
    $Chartofaccount =$form_data['Chartofaccount']; 
   $Chartofaccountarray = implode(',', $Chartofaccount); 
   $Chartofaccountarray = "'$Chartofaccountarray'"; // added single quote to start and end position
$Chartofaccountarray = str_replace(",","','","$Chartofaccountarray");     // comma replaced to ','
    $GetState = "SELECT * FROM vwchartofaccountexpenses where DVoucherdate>='$Fromdate' and DVoucherdate<='$Todate' AND Chartofaccount in(". $Chartofaccountarray.") ORDER BY DVoucherno ";
    $result_Region = $conn->query($GetState);

  
    if(mysqli_num_rows($result_Region) > 0) { 
    while($row = mysqli_fetch_array($result_Region)) {  
      $data01[] = $row;
      } 
    }  
      
  
    $Fromdate2 = date('d-M-Y', strtotime($Fromdate)); 
    $Todate2 = date('d-M-Y', strtotime($Todate)); 
 
 
         $Display=array(
           'data01' =>$data01,   
           'Fromdate2' =>$Fromdate2,      
           'Todate2' =>$Todate2
                 );
    
         $str = json_encode($Display);
        echo trim($str, '"');
        return;
  }
  ///////////////////////////////
  if($MethodGet == 'GETEMPLIST')
 {
    
    
    $GetState = "SELECT * FROM indsys1017employeemaster where Clientid='$Clientid'  AND EmpActive='Active'  ";
    $result_Region = $conn->query($GetState);
  
    if(mysqli_num_rows($result_Region) > 0) { 
    while($row = mysqli_fetch_array($result_Region)) {  
      $data01[] = $row;
      } 
    }  
      
  
 
 
         $Display=array(
           'data01' =>$data01,   
          
                 );
    
         $str = json_encode($Display);
        echo trim($str, '"');
        return;
  }
  /////////////////////////////

  if($MethodGet == 'FetchEmp')
{

    try
    { 
  

      $Employeeid =$form_data['Employeeid'];
     
    $GetChapter = "SELECT * FROM indsys1017employeemaster where Clientid ='$Clientid' and Employeeid = '$Employeeid'  ORDER BY Employeeid";
    $result_Chapter = $conn->query($GetChapter );
    if(mysqli_num_rows($result_Chapter) > 0) { 
        while($row = mysqli_fetch_array($result_Chapter)) {  
            $Fullname =$row['Fullname'];
           
         
           
             
      } 
    }
    $Display=array(
        
        'Fullname'=>  $Fullname,
    
       
  );
   
  $str = json_encode($Display);
  echo trim($str, '"');
 }
 catch(Exception $e)
 {
 
 }
   
  }
  //////////////////////////
  if($MethodGet == 'LOCATIONLIST')
  {
  
  
  try
  {
  
      
     
     
  
      $GetState = "SELECT * FROM indsys1031locationmaster where Clientid='$Clientid'  ORDER BY ID ";
      $result_Region = $conn->query($GetState);
    
      if(mysqli_num_rows($result_Region) > 0) { 
      while($row = mysqli_fetch_array($result_Region)) {  
        $data01[] = $row;
        } 
      }        
   
  
  
      $Clientid =$_SESSION["Clientid"];
  
      $Authorizedno =$_SESSION["Authorizedno"];

      $GetNextno = "SELECT * FROM indsys1000useradmin where  Clientid ='$Clientid'  And Userid='$user_id' ";
 
      $result_Nextno = $conn->query($GetNextno);
      if (mysqli_num_rows($result_Nextno) > 0)
      {
          while ($row = mysqli_fetch_array($result_Nextno))
          {
              $Locationid = $row['Locationid'];
             
          }
      }  

  
   $Display=array('data01' => $data01,
  'Clientid' =>$Clientid,
  'Authorizedno' =>$Authorizedno,
  'Locationid' =>$Locationid
);
  
    $str = json_encode($Display);
  echo trim($str, '"');
  }
  catch(Exception $e)
  {
  
  }
   
       
  }
  ///////////////////////////////////
  if($MethodGet == 'ModuleNextClient')
  {
     
   
  $Locationid = $form_data['Locationid'];
  
  
      $GetNextno = "SELECT * FROM indsys1008mastermodule where ModuleID ='INWARDCASH' AND Clientid ='$Clientid'  ";
  
          $result_Nextno = $conn->query($GetNextno);
          if (mysqli_num_rows($result_Nextno) > 0)
          {
              while ($row = mysqli_fetch_array($result_Nextno))
              {
                  $data = $row['Nextno'];
                  $data01 = $data + 1;
              }
          }  
  
          $Textno = $data01;
         $Inwarddate = $date;
         $CurrentdateTotalAmount =0;
         $CurrentdateVoucherAmount=0;
         $CurrentdateBalanceAmount =0;
 
 
         $GetTotalCash = "SELECT * FROM indsys1052inwardamountmaster where  Clientid ='$Clientid' AND Locationid='$Locationid'  ";
  
         $result_TotalCash = $conn->query($GetTotalCash);
         if (mysqli_num_rows($result_TotalCash) > 0)
         {
             while ($row = mysqli_fetch_array($result_TotalCash))
             {
                
                 $CurrentdateTotalAmount =$row['Totalinwardamount'];
                 $CurrentdateVoucherAmount=$row['Totalvoucheramount'];
                 $CurrentdateBalanceAmount =$row['Balanceinwardamount'];
             }
         }  
 
       
  
  
         $date = date("Y-m-d " );
          
         $Inwarddate = $date;
  
  $Fromdate2 = date('d-M-Y', strtotime($Inwarddate));
          $Display=array(
            'InwardMasterno' =>$Textno,
            'CurrentdateTotalAmount' => $CurrentdateTotalAmount,
            'CurrentdateVoucherAmount'=>$CurrentdateVoucherAmount,
            'CurrentdateBalanceAmount' =>$CurrentdateBalanceAmount,
            'Inwarddate' =>$Inwarddate,
            'Fromdate2' =>$Fromdate2
                  );
     
          $str = json_encode($Display);
         echo trim($str, '"');
         return;
   }
   
>>>>>>> 75c2f84afc1535619ee176c455dfb79e21fb65b2
?>