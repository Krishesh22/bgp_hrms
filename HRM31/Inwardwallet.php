<?php 
// error_reporting(0);
include '../config.php';
include 'examples/tcpdf_include.php';
session_start();

  $user_id = $_SESSION["Userid"];
      $username = $_SESSION["Username"];
      $usermail=$_SESSION["Mailid"];
      $Clientid =$_SESSION["Clientid"];
      $Authorizedno =$_SESSION["Authorizedno"];
   
      $_SESSION["Tittle"] ="Candidate";
$Message ='';

date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );


$form_data = json_decode(file_get_contents("php://input"));
  $form_data= json_decode( json_encode($form_data), true);
 $MethodGet = $form_data['Method'];


 if($MethodGet == 'ModuleNext')
 {
    
  
 
 
 
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


        $GetTotalCash = "SELECT * FROM indsys1052inwardamountmaster where  Clientid ='$Clientid'  ";
 
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
function Test($conn,$Clientid,$Locationid )
{
    try
    {
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

     $_SESSION['CurrentdateTotalAmount'] = $CurrentdateTotalAmount;
     $_SESSION['CurrentdateVoucherAmount'] =$CurrentdateVoucherAmount;
     $_SESSION['CurrentdateBalanceAmount'] =$CurrentdateBalanceAmount;
     $_SESSION['InwardMasterno'] = $Textno;



    }
    catch(Exception $e)
    {

    }
}


  if($MethodGet == 'Save')
  {
  
  
  try
  {
      
      $InwardMasterno =$form_data['InwardMasterno'];
      $CurrentdateTotalAmount =$form_data['CurrentdateTotalAmount'];
      $CurrentdateVoucherAmount =$form_data['CurrentdateVoucherAmount'];
      $CurrentdateBalanceAmount =$form_data['CurrentdateBalanceAmount'];
      $Inwarddate =$form_data['Inwarddate'];
      $InwardNotes =$form_data['InwardNotes'];
      $Inwardamount =$form_data['Inwardamount'];
      $Inwardtype =$form_data['Inwardtype'];
      $Locationid =$form_data['Locationid'];
     
      if(empty($Locationid) )
      {
    
        $Message = "Location";
    
        $Display=array('Message' =>$Message);
     
        $str = json_encode($Display);
       echo trim($str, '"');
       return;
      }
      
      if(empty($Inwardamount) || $Inwardamount ==0)
      {
    
        $Message = "Inwardamount";
    
        $Display=array('Message' =>$Message);
     
        $str = json_encode($Display);
       echo trim($str, '"');
       return;
      }
    /*------------------*/
      if(empty($Inwardtype))
      {
    
    $Message = "Inwardtype";
    
        $Display=array('Message' =>$Message);
     
        $str = json_encode($Display);
       echo trim($str, '"');
       return;
      }

    
    Test($conn,$Clientid,$Locationid );

          
    $InwardMasterno =$_SESSION['InwardMasterno'];
    $CurrentdateTotalAmount =$_SESSION['CurrentdateTotalAmount'];
    $CurrentdateVoucherAmount =$_SESSION['CurrentdateVoucherAmount'];
    $CurrentdateBalanceAmount =$_SESSION['CurrentdateBalanceAmount'];
    

      if (mysqli_connect_errno()){
        $Message= "Failed to connect to MySQL: " . mysqli_connect_error(); exit;
      }
      $resultExists = "SELECT * FROM indsys1052inwardamountmasterdetail WHERE InwardMasterno = '$InwardMasterno' AND Clientid ='$Clientid' AND Locationid='$Locationid' LIMIT 1";
      $resultExists01 = $conn->query($resultExists);
    
     
     if(mysqli_fetch_row($resultExists01))
      {
        
        $Message ="Exists";
     
      }
    
      else
      {
        $CurrentdateTotalAmount = $CurrentdateTotalAmount+$Inwardamount;
        $CurrentdateBalanceAmount = $CurrentdateTotalAmount-$CurrentdateVoucherAmount;
        $sqlsave = "INSERT IGNORE INTO indsys1052inwardamountmasterdetail (Clientid,InwardMasterno,Userid,Addormodifydatetime,Inwarddate,Inwardtype,InwardNotes,Inwardamount,CurrentdateTotalAmount,CurrentdateBalanceAmount,CurrentdateVoucherAmount,Locationid)
  
        values('$Clientid','$InwardMasterno','$user_id','$date','$Inwarddate','$Inwardtype','$InwardNotes','$Inwardamount','$CurrentdateTotalAmount','$CurrentdateBalanceAmount','$CurrentdateVoucherAmount','$Locationid')";
    
        $resultsave = mysqli_query($conn,$sqlsave);
       
    
        $UpdateNextno = "Update indsys1008mastermodule set Nextno ='$InwardMasterno' where ModuleID ='INWARDCASH' AND Clientid ='$Clientid'";
        $resultUpdate = mysqli_query($conn,$UpdateNextno);
        $Message ="Data Saved";
    
        
     }
    
// $CurrentdateTotalAmount = $CurrentdateTotalAmount+$Inwardamount;
// $CurrentdateBalanceAmount = $CurrentdateTotalAmount-$CurrentdateVoucherAmount;



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
       $sqlsaveinmaster = "INSERT IGNORE INTO indsys1052inwardamountmaster (Clientid,Totalinwardamount,Totalvoucheramount,Balanceinwardamount,Userid,Addormodifydatetime,Openingbalanceasondate,Closingbalanceasondate,Lastupdatedate,Locationid)
 
       values('$Clientid','$CurrentdateTotalAmount','$CurrentdateVoucherAmount','$CurrentdateBalanceAmount','$user_id','$date','$date','$date','$date','$Locationid')";
   
       $resultsave = mysqli_query($conn,$sqlsaveinmaster);
      
   
      
       
    }

    $resultExistsINMAS = "SELECT * FROM indsys1053transactiondetail WHERE  Clientid ='$Clientid' AND Transactionno='$InwardMasterno' AND Transactiontype='Receipt' AND Locationid='$Locationid' LIMIT 1";
    $resultExists01INMAS = $conn->query($resultExistsINMAS);
  
   
   if(mysqli_fetch_row($resultExists01INMAS))
    {
      
       
     
   
    }
  
    else
    {
      $sqlsaveinmaster = "INSERT IGNORE INTO indsys1053transactiondetail (Clientid,Transactionno,Transactiontype,Transactiondate,Transactionnotes,Debit,Credit,Balance,Userid,Addormodifydatetime,Locationid)

      values('$Clientid','$InwardMasterno','Receipt','$Inwarddate','$InwardNotes',0,'$Inwardamount','$CurrentdateBalanceAmount','$user_id','$date','$Locationid')";
  
      $resultsave = mysqli_query($conn,$sqlsaveinmaster);
     
  
     
      
   }







    
     $_SESSION["InwardMasterno"] =$InwardMasterno;






    
    $Nextno["Nextno"] =$InwardMasterno;
     $Display=array('Nextno' => $Nextno["Nextno"],'Message' =>$Message,'CurrentdateTotalAmount' =>$Inwardamount);
    
      $str = json_encode($Display);
    echo trim($str, '"');
    }
    catch(Exception $e)
    {
    
    }
     
         
    }
//////////////////////////////////
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

/////////////////////
if($MethodGet == 'GETINBEDETAILS')
 {
    $Fromdate =$form_data['Fromdate'];
    $Todate =$form_data['Todate']; 
    $Locationid =$form_data['Locationid']; 
    $Locationidarray = implode(',', $Locationid);
    $_SESSION['Fromdate']=$Fromdate;
    $_SESSION['Todate']=$Todate;
    $_SESSION['Locationidarray']=$Locationidarray;



    

    //$array  = explode("','", $test );
    
    $GetState = "SELECT * FROM vwcreditdebitdetails where Transactiondate>='$Fromdate' and Transactiondate<='$Todate' AND Clientid='$Clientid' AND Locationid in(". $Locationidarray.") ORDER BY Transactiondate";

    $result_Region = $conn->query($GetState);
  
    if(mysqli_num_rows($result_Region) > 0) { 
    while($row = mysqli_fetch_array($result_Region)) {  
      $data01[] = $row;
      } 
    }  
      
  
    $Fromdate2 = date('d-M-Y', strtotime($Fromdate)); 
    $Todate2 = date('d-M-Y', strtotime($Todate)); 
    CreatePDF($Fromdate, $Todate,$Locationidarray,$conn,$Clientid);
 
         $Display=array(
           'data01' =>$data01,   
           'Fromdate2' =>$Fromdate2,      
           'Todate2' =>$Todate2,
           'Alertvalue' =>$array
                 );
    
         $str = json_encode($Display);
        echo trim($str, '"');
        return;
  }
  /////////////////////////////////
  function CreatePDF($Fromdate, $Todate,$Locationidarray,$conn,$Clientid)
  {
    $output = '';  
    $GetState = "SELECT * FROM vwcreditdebitdetails where Transactiondate>='$Fromdate' and Transactiondate<='$Todate' AND Clientid='$Clientid' AND Locationid in(". $Locationidarray.") ORDER BY Transactiondate";

    $result_Region = $conn->query($GetState);
  
    if(mysqli_num_rows($result_Region) > 0) { 
    while($row = mysqli_fetch_array($result_Region)) {  
      $output .= '<tr>  
      <td>'.$row["Transactionno"].'</td>  
      <td>'.$row["Addormodifydatetime2"].'</td>  
      <td>'.$row["Transactiontype"].'</td>  
      <td>'.$row["Location"].'</td>  
      <td>'.$row["Transactionnotes"].'</td>  
      <td>'.$row["Debit"].'</td>  
      <td>'.$row["Credit"].'</td>  
      <td>'.$row["Balance"].'</td>  
 </tr>  
      ';  
}  
return $output;
    }

  }



  //////////////////////////////////////
  if($MethodGet=="Report")
  {
   
   
    $Fromdate =$form_data['Fromdate'];
    $Todate =$form_data['Todate']; 
    $Locationid =$form_data['Locationid']; 


    $Locationidarray = implode(',', $Locationid);
  
    $_SESSION['Fromdate']=$Fromdate;
    $_SESSION['Todate']=$Todate;
    $_SESSION['Locationidarray']=$Locationidarray;

     
 
  }


  /////////////////////////

  if($MethodGet == 'LOCATIONLIST')
  {
  
  
  try
  {
  
      
     
     
  
      $GetState = "SELECT * FROM indsys1031locationmaster Where Clientid='$Clientid' ORDER BY ID ";
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
  ///////////////////////////////
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
  ///////////////////////////
  if($MethodGet == 'GETINBEALLDETAILS')
 {
    $Fromdate =$form_data['Fromdate'];
    $Todate =$form_data['Todate']; 
 
    
    $GetState = "SELECT * FROM vwcreditdebitdetails where Transactiondate>='$Fromdate' and Transactiondate<='$Todate'   ORDER BY Transactiondate";
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
  /////////////////////////////////
  if($MethodGet == 'LOCATION')
  {
     $GetState = "SELECT * FROM indsys1031locationmaster where Clientid ='$Clientid'   ";
     $result_Region = $conn->query($GetState);
   
     if(mysqli_num_rows($result_Region) > 0) { 
     while($row = mysqli_fetch_array($result_Region)) {  
       $data01[] = $row;
       } 
     }        
     header('Content-Type: application/json');
     echo json_encode($data01);
   }


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
            $Receivertype = $row['Receivertype'];
            $Locationid = $row['Locationid'];
         
           
             
      } 
    }

    $LocationName =0;

    $GetLocation = "SELECT * FROM indsys1031locationmaster where Clientid ='$Clientid' and ID ='$Locationid'  ";
    $result_Chapter = $conn->query($GetLocation );
    if(mysqli_num_rows($result_Chapter) > 0) { 
        while($row = mysqli_fetch_array($result_Chapter)) {  
            $LocationName =$row['LocationName'];
           
         
           
             
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
      'DVoucherdate2' =>$DVoucherdate2,
      'Receivertype'=>$Receivertype,
      'LocationName' =>$LocationName

       
  );
   
  $str = json_encode($Display);
  echo trim($str, '"');
 }
 catch(Exception $e)
 {
 
 }
   
  }



  if($MethodGet == 'TRANSACTION')
  {
  
      try
      { 
    
  
        $Transactionno =$form_data['Transactionno'];
        $Transactiontype =$form_data['Transactiontype'];


        if($Transactiontype =="Payment")
        {
          $Transactionno = $Transactionno;



$Transactionno = substr($Transactionno, 0, strrpos($Transactionno, '-'));


        }
      
      $Display=array(
          
        'Transactionno'=>  $Transactionno,
        'Transactiontype'=> $Transactiontype,
     
  
         
    );
     
    $str = json_encode($Display);
    echo trim($str, '"');
   }
   catch(Exception $e)
   {
   
   }
     
    }




    if($MethodGet == 'FetchWalletMaster')
    {
    
        try
        { 
      
    
          $InwardMasterno =$form_data['InwardMasterno'];
          $_SESSION["DVNO"] = $DVoucherno;
        $GetChapter = "SELECT * FROM indsys1052inwardamountmasterdetail where Clientid ='$Clientid' and InwardMasterno = '$InwardMasterno'  ORDER BY InwardMasterno";
        $result_Chapter = $conn->query($GetChapter );
        if(mysqli_num_rows($result_Chapter) > 0) { 
            while($row = mysqli_fetch_array($result_Chapter)) {  
                $InwardNotes =$row['InwardNotes'];
                $Inwarddate =$row['Inwarddate'];
                $Inwardamount = $row['Inwardamount'];
           
    
                $Inwarddate2 = date('d-M-Y', strtotime($Inwarddate));
                $Inwardtype = $row['Inwardtype'];
                $Locationid = $row['Locationid'];
             
               
                 
          } 
        }
    
        $InwardLocation =0;
    
        $GetLocation = "SELECT * FROM indsys1031locationmaster where Clientid ='$Clientid' and ID ='$Locationid'  ";
        $result_Chapter = $conn->query($GetLocation );
        if(mysqli_num_rows($result_Chapter) > 0) { 
            while($row = mysqli_fetch_array($result_Chapter)) {  
                $InwardLocation =$row['LocationName'];
               
             
               
                 
          } 
        }
        $Display=array(
            
        
          'Inwardtype'=>  $Inwardtype,
          'Inwardamount'=> $Inwardamount,
          'Inwarddate2' =>$Inwarddate2,
          'InwardNotes'=>$InwardNotes,
          'InwardLocation' =>$InwardLocation
    
           
      );
       
      $str = json_encode($Display);
      echo trim($str, '"');
     }
     catch(Exception $e)
     {
     
     }
       
      }

 ?>