<?Php
include '../config.php';







session_start();

  $user_id = $_SESSION["Userid"];
      $username = $_SESSION["Username"];
      $usermail=$_SESSION["Mailid"];
      $Clientid =$_SESSION["Clientid"];
   
      $_SESSION["Tittle"] ="Candidate";
$Message ='';
$Candidateid=93;
$Employeeid ='CAT03ADM000002';

  try
  {
   
    $resultExists = "SELECT * FROM indsys1017candidatefinalfitment WHERE Candidateid = '$Candidateid' AND Clientid = '$Clientid' ";
    $resultExists01 = $conn->query($resultExists);
    while ($row = mysqli_fetch_array($resultExists01))
    {
     
      $Basic =$row['CurMotBasicDA'];
      $HR_Allowance =$row['CurMotHRA'];
      $TA =0;
      $Performance_allowance =0;
      $Day_allowance =0;
      $Other_Allowance =$row['CurMotTotalAllowance'];
      $ESiC = $row['CurMotESIC'];
      if($ESiC =="0.000")
      {
        $ESI_Yesandno ="No";
      }

      else
      {
        $ESI_Yesandno ="Yes";
      }
      $PF_Yesandno ="Yes";
 
    
      if(empty($Basic))
      {
        $Basic =0;
      }
   
      if(empty($HR_Allowance))
      {
        $HR_Allowance =0;
      }
      if(empty($TA))
      {
        $TA =0;
      }
      if(empty($Performance_allowance))
      {
        $Performance_allowance =0;
      }
      if(empty($Day_allowance))
      {
        $Day_allowance =0;
      }
      if(empty($Other_Allowance))
      {
        $Other_Allowance =0;
      }
  
   
  
 
  
      $Total= $Basic+$HR_Allowance+$TA+$Performance_allowance+$Day_allowance+$Other_Allowance;
  
     $pfpercentage=(12/100);
     $esipercentage = (0.75/100);
   
     if($PF_Yesandno =='Yes')
     {
      $PF =($Basic+$Other_Allowance)*$pfpercentage;
      $PF=round($PF,0);
     }
  else
  {
    $PF =0;
  }

  echo $PF;
  if($ESI_Yesandno =='Yes')
  {
  $Esi = ($Total*$esipercentage);
  $ESI=roundup($Esi);
  $ESI = round($ESI,0);
  }
  else
  {
    $ESI=0;
  }
      
  echo "Basic $Basic</br>";
  echo "HRA $HR_Allowance</br>";
  echo "TA $TA</br>";
  echo "Performance_allowance $Performance_allowance</br>";
  echo "Day_allowance $Day_allowance</br>";
  echo "PF $PF</br>";
  echo "ESI $ESI</br>";
  echo "Net_Salary $Net_Salary</br>";
  echo "Gross_Salary $Gross_Salary</br>";
  echo "Other_Allowance $Other_Allowance</br>";
  echo "PF_Yesandno $PF_Yesandno</br>";
  echo "ESI_Yesandno $ESI_Yesandno</br>";


  $Gross_Salary = $Total;
  $Net_Salary = ($Total-$PF-$ESI);
  $resultExists = "Update indsys1017employeemaster set 
  Basic ='$Basic',
  HR_Allowance ='$HR_Allowance',
  TA='$TA',
  Performance_allowance ='$Performance_allowance',
  Day_allowance ='$Day_allowance',
  PF ='$PF',
  ESI='$ESI',
  TDS ='0',
  Professional_tax ='0',
  Net_Salary ='$Net_Salary',
  Gross_Salary='$Gross_Salary',  
  Other_Allowance = '$Other_Allowance',
  PF_Yesandno='$PF_Yesandno',  
  ESI_Yesandno = '$ESI_Yesandno',

  Addormodifydatetime ='$date',
  Userid ='$user_id'

    
     WHERE Employeeid = '$Employeeid' ";
  $resultExists01 = $conn->query($resultExists);
  $Message ="Exists";

    }
  }
  catch(Exception $e)
  {

  }



  function roundup($float, $dec = 2){
    if ($dec == 0) {
        if ($float < 0) {
            return floor($float);
        } else {
            return ceil($float);
        }
    } else {
        $d = pow(10, $dec);
        if ($float < 0) {
            return floor($float * $d) / $d;
        } else {
            return ceil($float * $d) / $d;
        }
    }
  }
?>