<?php
require 'vendor/autoload.php';
include '../config.php';
session_start();
$Userid = $_SESSION["Userid"];
$username = $_SESSION["Username"];
$usermail=$_SESSION["Mailid"];
$Clientid =$_SESSION["Clientid"];
$Payrollmonth = $_POST['Payrollmonth'];
$Payrollyear = $_POST['Payrollyear'];

if (isset($_FILES['files']) && !empty($_FILES['files'])) {

    $directory4 = "../$Clientid/";
    $directory3 = "../$Clientid/EMPDEDUCTION/";
    $directory2 = "../$Clientid/EMPDEDUCTION/$Payrollyear/";
    $directory = "../$Clientid/EMPDEDUCTION/$Payrollyear/$Payrollmonth/";
    
    if(!is_dir($directory4)){mkdir($directory4, 0777);}
    if(!is_dir($directory3)){mkdir($directory3, 0777);}
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
                    $uniquesavename=time().uniqid(rand()).$img;

                    move_uploaded_file($_FILES["files"]["tmp_name"][$i], $directory .  $uniquesavename);
                   
                    $file_name = $directory . $uniquesavename;
                   
                    $file_type = \PhpOffice\PhpSpreadsheet\IOFactory::identify($file_name);
                    $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($file_type);
                    $reader->setReadDataOnly(TRUE); $reader->setReadEmptyCells(FALSE);
                    $spreadsheet = $reader->load($file_name);
                    //unlink($file_name);
                    $data = $spreadsheet->getActiveSheet()->toArray();
       
                    SaveExcelData($conn,$Userid,$Clientid,$data,$Payrollmonth,$Payrollyear);
                  //  $Message ="Exists";
                    echo 'File successfully uploaded : ' .$directory. $_FILES["files"]["name"][$i] . ' ';
                }
            }
        }
    } else {
        echo 'Please choose at least one file';
    }
    
    
    function SaveExcelData($conn,$Userid,$Clientid,$data,$Payrollmonth,$Payrollyear)
    {
      
      $date = date("Y-m-d H:i:s" );
    
      // $resultExists = "DELETE FROM indsys1027employeepayrolldeduction ";
      // $resultExists01 = $conn->query($resultExists);

      $countdata= count($data);
      $countdata= $countdata-1;
      for ($row = 1; $row <= $countdata; $row++) 
      {

        try{

          $val = "'" . implode("','", $data[$row]) . "'";

          $Employeeid = substr($val,0,strpos($val,","));; 
         
          $Employeeid = str_replace("'","","$Employeeid"); 	
          
          

         

      
           $GetDeduction = "SELECT * FROM indsys1027employeepayrolldeduction where SalMonth='$Payrollmonth' and Salyear='$Payrollyear'  and Employeeid='$Employeeid' AND Clientid='$Clientid' ORDER BY Employeeid ";
     
            $result_Deduction = $conn->query($GetDeduction);

 
           if(mysqli_num_rows($result_Deduction) > 0) { 
          while($rowDeduction = mysqli_fetch_array($result_Deduction))
           {  
  
   
             $Employeeid =$rowDeduction['Employeeid'];
             $Fullname = $rowDeduction['Fullname'];
              echo "$Employeeid - $Fullname AlreadyExists<br/>";
   
           }

  
  
  
             }

             else
             {
              $sql = "INSERT INTO indsys1027employeepayrolldeduction(Clientid,Salyear,SalMonth,Employeeid,Fullname,Department,Designation,Category,Salary_Advance,
              FoodDeduction,TDS,Editrequestapproval,Deleterequestapproval,Userid,Createby,Createdatetime,Addormodifydatetime,EditDeleterequest,Payrollstatus)
                      VALUES ('$Clientid','$Payrollyear','$Payrollmonth',$val,'Active','Active','$Userid','$Userid','$date','$date','None','Open');";
                    
                    if($conn->query($sql) === TRUE) {
                    
                   
                  }
                  else {
                   
                   echo "Data not be processed please check the file";
                  }
                }



       

          
   




        
        }
         catch(Exception $e)
         {

         }
             
             
          }

          Removeunwanteddata($conn,$Clientid,$Payrollyear,$Payrollmonth);
         
        }


        function Removeunwanteddata($conn,$Clientid,$Payrollyear,$Payrollmonth)
        {
          $resultExistsnew = "DELETE FROM indsys1027employeepayrolldeduction where  FoodDeduction='0' and TDS='0' and Clientid='$Clientid' and Salyear='$Payrollyear' and SalMonth='$Payrollmonth' and  Salary_Advance='0'  ";
          $resultExists01 = $conn->query($resultExistsnew);

        }

?>