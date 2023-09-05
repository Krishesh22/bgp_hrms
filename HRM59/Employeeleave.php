<?php
include '../config.php';
include '../HRM54/vendor/autoload.php';

session_start();
$user_id = $_SESSION["Userid"];
$username = $_SESSION["Username"];
$usermail=$_SESSION["Mailid"];
$Clientid =$_SESSION["Clientid"];
$date = date('Y-m-d H:i:s');


if (isset($_FILES['files']) && !empty($_FILES['files'])) {

    $directory2 = "../$Clientid/";
    $directory = "../$Clientid/EMPLEAVE/";
  
    
   
    if(!is_dir($directory2)){mkdir($directory2, 0777);}
    if(!is_dir($directory)){mkdir($directory, 0777);}
    
     
          $chk ="";
          //$files = null;
      
    
        $no_files = count($_FILES["files"]['name']);
        for ($i = 0; $i < $no_files; $i++) {
            if ($_FILES["files"]["error"][$i] > 0) {
                echo "Error: " . $_FILES["files"]["error"][$i] . "<br>";
            } else {
                if (file_exists($directory . $_FILES["files"]["name"][$i])) {
                    echo 'File already exists : '.$directory . $_FILES["files"]["name"][$i];
                } else {
                  $img = $_FILES["files"]["name"][$i];
                    $uniquesavename=time().$img;

                    move_uploaded_file($_FILES["files"]["tmp_name"][$i], $directory .  $uniquesavename);
                   
                    $file_name = $directory . $uniquesavename;
                   
                    $file_type = \PhpOffice\PhpSpreadsheet\IOFactory::identify($file_name);
                    $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($file_type);
                    $reader->setReadDataOnly(TRUE); $reader->setReadEmptyCells(FALSE);
                    $spreadsheet = $reader->load($file_name);
                    //unlink($file_name);
                    $data = $spreadsheet->getActiveSheet()->toArray();
       
                    SaveExcelData($conn,$user_id,$Clientid,$data,$date);
                  //  $Message ="Exists";
                    echo 'File successfully uploaded : ' .$directory. $_FILES["files"]["name"][$i] . ' ';
                }
            }
        }
    } else {
        echo 'Please choose at least one file';
    }
    
    
    function SaveExcelData($conn, $user_id, $Clientid, $data, $date)
{
    // $resultExists = "DELETE FROM indsys1017employeemastertest";
    // $resultExists01 = $conn->query($resultExists);
    $countdata = count($data);
    // echo $countdata;
    $countdata = $countdata;

    for ($row = 1;$row <= $countdata;$row++)
    {
        $val = "'" . implode("','", $data[$row]) . "'";

        $string_array = explode(",", $val);
        $Employeeid = str_replace("'", "", "$string_array[1]");
        $Name = str_replace("'", "", "$string_array[2]");
       
        $OCT10 = str_replace("'", "", "$string_array[3]");
        $NOV11 = str_replace("'", "", "$string_array[4]");
        $DEC22 = str_replace("'", "", "$string_array[5]");
        $JAN23 = str_replace("'", "", "$string_array[6]");
        $FEB23 = str_replace("'", "", "$string_array[7]");
        $MAR23 = str_replace("'", "", "$string_array[8]");
        $APR23 = str_replace("'", "", "$string_array[9]");
        $MAY23 = str_replace("'", "", "$string_array[10]");
  // if($Employeeid=='CAT03WOV000138')
  // {
      
        $Currentyear = date("Y");
        $Previousyear = $Currentyear - 1;
        $Payrollmonth = "June";
        $month_num = date("m", strtotime($Payrollmonth));
        $Payrollyear = $Currentyear;
      
       
if($month_num>10)
{
 
  $Currentyear = date("Y");
  $Currentyear = $Currentyear+1;
  $Previousyear = $Currentyear - 1;
  $Payrollyear = $Currentyear;
}
        $Fromdate = date("01-$month_num-$Payrollyear");
        $Todate = date("t-$month_num-$Payrollyear", strtotime($Fromdate));

        $monthof1stday = date("$Payrollyear-$month_num-01");
        $monthoflastday = date("$Payrollyear-$month_num-t", strtotime($Fromdate));
        $logemp = "SELECT * FROM indsys1017employeemaster WHERE Clientid='$Clientid' and EmpActive='Active' and Employeeid='$Employeeid'  ORDER BY Employeeid ASC";

        $logempall = mysqli_query($conn, $logemp);
        while ($rowEmployee = mysqli_fetch_array($logempall))
        {
            $Performanceallowance = 0;
            $Employeeid = $rowEmployee["Employeeid"];
            $date_of_joining = $rowEmployee["Date_Of_Joing"];
            $date = strtotime($date_of_joining);
            $Empjoinmonth = date("m", $date);
            $Empjoinyear = date("Y", $date);
            $Empjoinday = date("d", $date);
            ///////////////Fetching Transaction month ////////////////
            $logEmpLeave = "Select * from indsys1034transactionmonth where TransactionMonthno='$Empjoinmonth'";
            $logEmpexecute = mysqli_query($conn, $logEmpLeave);

            while ($rowEmptransaction = mysqli_fetch_assoc($logEmpexecute))
            {
                $Currentyearleave = $rowEmptransaction["Currentyear"];
                $Previousyearleave = $rowEmptransaction["Previousyear"];
                $Transactionmonthadded = $rowEmptransaction["Transactionmonthadded"];
            }
            $newjoinee = "No";

            $currentDate = date("Y-m-d");
            $joinDate = date("Y-m-d", strtotime($date_of_joining));

            $diffMonths = (date("Y", strtotime($Todate)) - date("Y", strtotime($joinDate))) * 12;
            $diffMonths += date("m", strtotime($Todate)) - date("m", strtotime($joinDate));
            $Calculatedmonths = $Transactionmonthadded;
            if ($diffMonths <= 9)
            {
                $newjoinee = "Yes";
                $date1 = new DateTime($date_of_joining);
                /////////For payroll check the given month///////////
                $date2 = new DateTime($monthoflastday);
                $dateofjoingdays = $date2->diff($date1)->format("%a");
                $dateofjoingdays = $dateofjoingdays + 1;
                $earlier = new DateTime($monthof1stday);
                $later = new DateTime($monthoflastday);
                $abs_diff = $later->diff($earlier)->format("%a");
                $abs_diff = $abs_diff + 1;
                if ($dateofjoingdays <= $abs_diff)
                {
                    if ($monthof1stday == $date_of_joining)
                    {
                        $Calculatedmonths = 12 - $Transactionmonthadded;
                    }
                    else
                    {
                        $trans = $Transactionmonthadded - 1;
                        $Calculatedmonths = 11 - $Transactionmonthadded;
                    }
                }
                else
                {
                    if ($Empjoinday == 01)
                    {
                        $Calculatedmonths = 12 - $Transactionmonthadded;
                    }
                    else
                    {
                        $Calculatedmonths = 11 - $Transactionmonthadded;
                    }
                }

                $TotalLeaves = 1.5 * $Calculatedmonths;
              
            }
            else
            {
                $TotalLeaves = 1.5 * 12;
              
               
            }

          
          
            SaveMonthLeave($conn, $Clientid, $Employeeid, 10, '2022', '1.5', $OCT10, $newjoinee,'2022-10-01');
            SaveMonthLeave($conn, $Clientid, $Employeeid, 11, '2022', '1.5', $NOV11, $newjoinee,'2022-11-01');
            SaveMonthLeave($conn, $Clientid, $Employeeid, 12, '2022', '1.5', $DEC22, $newjoinee,'2022-12-01');
            SaveMonthLeave($conn, $Clientid, $Employeeid, 01, '2023', '1.5', $JAN23, $newjoinee,'2023-01-01');
            SaveMonthLeave($conn, $Clientid, $Employeeid, 02, '2023', '1.5', $FEB23, $newjoinee,'2023-02-01');
            SaveMonthLeave($conn, $Clientid, $Employeeid, 03, '2023', '1.5', $MAR23, $newjoinee,'2023-03-01');
            SaveMonthLeave($conn, $Clientid, $Employeeid, 04, '2023', '1.5', $APR23, $newjoinee,'2023-04-01');
            SaveMonthLeave($conn, $Clientid, $Employeeid, 05, '2023', '1.5', $MAY23, $newjoinee,'2023-05-01');

            SaveLeaveMaster($conn, $Clientid, $Employeeid, $Currentyear, $Previousyear, $TotalLeaves);
        }
    }
}

function SaveLeaveMaster($conn, $Clientid, $Employeeid, $Currentyear, $Previousyear, $TotalLeave)
{
    try
    {
      $TotalLeaveeligable=$TotalLeave;
      $BalanceLeave = 0;
      $Takenleave=0;
      $Fromdate="$Previousyear-10-01";
      $Todate="$Currentyear-09-01";
     
   

      $UpdateSum="SELECT SUM(TakenLeave) as TakenLeave FROM indsys1035employeetransactionmonthleave WHERE Employeeid= '$Employeeid' AND Transactionmonthdate >='$Fromdate' AND Transactionmonthdate<='$Todate' ";
        $Takenleaveexecute = mysqli_query($conn,$UpdateSum);
      while($rowOD = mysqli_fetch_array($Takenleaveexecute)){
        $Takenleave= $rowOD['TakenLeave'];
          
        // $Workeddays=roundup($Workeddays);
        // $Workeddays=round($Workeddays,0);
        
      }
      $BalanceLeave = $TotalLeaveeligable-  $Takenleave;
        $resultExists = "SELECT * FROM indsys1035employeetransactionyearleave WHERE Employeeid = '$Employeeid' AND Clientid ='$Clientid' AND Fromtransactionyear ='$Previousyear' AND Totransactionyear='$Currentyear' LIMIT 1";
        $resultExists01 = $conn->query($resultExists);

        if ($rowleavemas=mysqli_fetch_row($resultExists01))
        {
          $TotalLeaveeligable = $rowleavemas['TotalLeaveeligable'];
          $BalanceLeave = $TotalLeaveeligable-  $Takenleave;

            $Message = "Exists";
        }
        else
        {
            $SaveEmployee = "INSERT INTO indsys1035employeetransactionyearleave(Clientid,Employeeid,Fromtransactionyear,Totransactionyear,TotalLeaveeligable,TakenLeave,BalanceLeave)
    VALUES('$Clientid','$Employeeid','$Previousyear','$Currentyear','$TotalLeave','$Takenleave','$BalanceLeave')";
            $Saved = mysqli_query($conn, $SaveEmployee);
            if ($Saved === true)
            {
            }
            else
            {
                echo "$SaveEmployee<br>;";
            }
        }
    }
    catch(Exception $e)
    {
    }
}

function SaveMonthLeave($conn, $Clientid, $Employeeid, $Transactionmonthno, $Transactionyear, $CL, $BalanceCL, $newjoinee,$Transactiondate)
{
    try
    {

      if($BalanceCL=='')
      {
        $CL=0;
        $BalanceCL=0;
      }
       
    
        $Takenleave = $CL - $BalanceCL;
      
        $resultExists = "SELECT * FROM indsys1035employeetransactionmonthleave WHERE Employeeid = '$Employeeid' AND Clientid ='$Clientid' AND Transactionmonthno ='$Transactionmonthno' AND Transactionyear='$Transactionyear' LIMIT 1";
        $resultExists01 = $conn->query($resultExists);

        if (mysqli_fetch_row($resultExists01))
        {
            $Message = "Exists";
        }
        else
        {
            $SaveEmployee = "INSERT INTO indsys1035employeetransactionmonthleave(Clientid,Employeeid,Transactionmonthno,Transactionyear,TotalLeaveeligable,TakenLeave,BalanceLeave,Transactionmonthdate)
    VALUES('$Clientid','$Employeeid','$Transactionmonthno','$Transactionyear','$CL','$Takenleave','$BalanceCL','$Transactiondate')";
            $Saved = mysqli_query($conn, $SaveEmployee);
            if ($Saved === true)
            {
             // echo "$SaveEmployee<br>;";
            }
            else
            {
                echo "$SaveEmployee<br>;";
            }
        }
    }
    catch(Exception $e)
    {
    }
}


        ?>