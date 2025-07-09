<?php
require 'vendor/autoload.php';
include '../config.php';
session_start();
$user_id = $_SESSION["Userid"];
$username = $_SESSION["Username"];
$usermail=$_SESSION["Mailid"];
$Clientid =$_SESSION["Clientid"];
$date = date('Y-m-d H:i:s');


if (isset($_FILES['files']) && !empty($_FILES['files'])) {

    $directory2 = "../$Clientid/";
    $directory = "../$Clientid/EMPBULKUPLOAD/";
  
    
   
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
                    $getExcelfiledirectory = $file_name;
                   
                    $file_type = \PhpOffice\PhpSpreadsheet\IOFactory::identify($file_name);
                    $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($file_type);

                    $reader->setReadDataOnly(TRUE); 
                    $reader->setReadEmptyCells(FALSE);
                    $spreadsheet = $reader->load($file_name);

                    //unlink($file_name);

                    $data = $spreadsheet->getActiveSheet()->toArray();
       
                 $res=SaveExcelData($conn,$user_id,$Clientid,$data,$date);
                    
            
              echo $res;
              //    $data = [
              //     "value1" => $res,
              //     "value2" => $getExcelfiledirectory
                 
              //   ];
            

              // $str = json_encode($data);
              // echo trim($str, '"');
            //   // Convert the data to JSON format
            //   // $jsonData = json_encode($data);
              
            //   // Send the JSON data as the response
            // //  echo $jsonData;
            //   return;
                    //echo 'File successfully uploaded : ' .$directory. $_FILES["files"]["name"][$i] . ' ';
                
                }
            }
        }
    } else {
        echo 'Please choose at least one file';
    }
    
    
    function SaveExcelData($conn,$user_id,$Clientid,$data,$date)
    {
      
        // $resultExists = "DELETE FROM indsys1017employeemastertest";
        // $resultExists01 = $conn->query($resultExists);

        $countdata= count($data);
       // echo $countdata;
        $countdata= $countdata-1;
         $Message ="Data has been inserted";
        for ($row =3; $row <= $countdata; $row++) 
        {

          
            $val = "'" . implode("','", $data[$row]) . "'";
            $SickleaveEligibilityYesorNo ='Yes';
            $string_array = explode(",",$val);
            $Employeeid = str_replace("'","","$string_array[0]");
            $Fullname = str_replace("'","","$string_array[1]");
            $Department = str_replace("'","","$string_array[2]");
            $Designation = str_replace("'","","$string_array[3]");
            $Category = str_replace("'","","$string_array[4]");
            $Attendanceyear = str_replace("'","","$string_array[5]");;
            $EligibilitySL = str_replace("'","","$string_array[6]");;
            $UsedSL = str_replace("'","","$string_array[7]");;
            $BalanceSL = str_replace("'","","$string_array[8]");;
            $EligibilityCL = str_replace("'","","$string_array[9]");
            $UsedCL = str_replace("'","","$string_array[10]");;
            $BalanceCL = str_replace("'","","$string_array[11]");
            $GetState = "SELECT * FROM indsys1017employeemaster where  EmpActive='Active' AND Clientid='$Clientid' AND Employeeid='$Employeeid'   ORDER BY Employeeid";
       // echo $GetState;
        $result_Region = $conn->query($GetState);

        if(mysqli_num_rows($result_Region) > 0) { 
        while($rowsfetch = mysqli_fetch_array($result_Region)) {  
          $ESI_Yesandno=$rowsfetch['ESI_Yesandno'];


        }
      }

      $CurrentYear = date("Y");
      if(empty($Attendanceyear))
      {
          $Attendanceyear =$CurrentYear;
      }
        
      if($ESI_Yesandno=='Yes')
        {
          $BalanceSL=0;
          $EligibilitySL =0;
          $UsedSL =0;
          $SickleaveEligibilityYesorNo ='No';
        }       

      if($Attendanceyear >$CurrentYear)
      {
       // echo "Leave Year Greater than Current Year";
        return "Greater";
      }


        $GetSummaryexists = "SELECT * FROM indsys1030empyearleavetakensummary where  Employeeid='$Employeeid' AND Clientid='$Clientid' AND AttendenceYear='$Attendanceyear'   ORDER BY Employeeid";

        $result_Regionnwwwww = $conn->query($GetSummaryexists);
      
        if(mysqli_num_rows($result_Regionnwwwww) > 0) { 
        while($rowsfetchnewwwwwwww = mysqli_fetch_array($result_Regionnwwwww)) {  
        
        $Message ="Data Exists";
       
        return $Message;

   
        }
      }
      else
      {
        
         $sqlsave = "INSERT IGNORE INTO indsys1030empyearleavetakensummary(Clientid,Employeeid,AttendenceYear,Fullname,Userid,Addormodifydatetime,CausalleaveEligibility,UsedCasualleave,
         BalanceCausalLeave,SickleaveEligibility,UsedSickLeave,BalanceSickLeave,SickleaveEligibilityYesorNo,TotalPresentdays)
          values('$Clientid','$Employeeid','$Attendanceyear','$Fullname','$user_id','$date','$EligibilityCL',
        '$UsedCL','$BalanceCL','$EligibilitySL','$UsedSL',' $BalanceSL','$SickleaveEligibilityYesorNo','0')";  
       // echo  $sqlsave;
      }       
     
    
     
        $resultsave = mysqli_query($conn,$sqlsave);

        if($resultsave===TRUE)
        {
        // echo "$sqlsave <br/>";
        }
        else
        {
          
         // echo  $sqlsave;
        }


       
        }

        

      return $Message;


        }

      
        ?>