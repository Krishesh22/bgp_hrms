<?php

require 'vendor/autoload.php';
include '../config.php';
session_start();
      $Userid = $_SESSION["Userid"];
      $username = $_SESSION["Username"];
      $usermail=$_SESSION["Mailid"];
      $Clientid =$_SESSION["Clientid"];
 
      if (isset($_FILES['files']) && !empty($_FILES['files']))
       {
              $date = date("Y-m-d" );

                    $directory4 = "../$Clientid/";
                    $directory3 = "../$Clientid/EMPBULK/";
                      $directory = "../$Clientid/EMPBULK/$date/";

             if(!is_dir($directory4)){mkdir($directory4, 0777);}
            if(!is_dir($directory3)){mkdir($directory3, 0777);}
             if(!is_dir($directory)){mkdir($directory, 0777);}

              $no_files = count($_FILES["files"]['name']);
              for ($i = 0; $i < $no_files; $i++) 
                {
                        if ($_FILES["files"]["error"][$i] > 0) {
                                 echo "Error: " . $_FILES["files"]["error"][$i] . "<br>";
                          } 
                         else 
                         {
                          if (file_exists($directory . $_FILES["files"]["name"][$i])) 
                          {
                              echo 'File already exists : '.$directory . $_FILES["files"]["name"][$i];
                             
                            
                          }
                           else
                            {
              
              
                              $extension = pathinfo($_FILES["files"]["tmp_name"][$i], PATHINFO_EXTENSION);
                              $uniquesavename=time().uniqid(rand()).".$extension" ;
                              move_uploaded_file($_FILES["files"]["tmp_name"][$i], $directory . $uniquesavename);
                          
                            
                            
                        
                          }               
                     }
                }

            $file_type = \PhpOffice\PhpSpreadsheet\IOFactory::identify($file_name);
            $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($file_type);
            $reader->setReadDataOnly(TRUE); $reader->setReadEmptyCells(FALSE);
            $spreadsheet = $reader->load($file_name);
            //unlink($file_name);
            $data = $spreadsheet->getActiveSheet()->toArray();
       
           // SaveExcelData($conn,$Userid,$Clientid,$data);
            
        
               
                
          }
          function SaveExcelData($conn,$Userid,$Clientid,$data)
          {
            
            Echo "Test 3";
          
            $resultExists = "DELETE FROM indsys1017employeemastertest";
            $resultExists01 = $conn->query($resultExists);

            $countdata= count($data);
            $countdata= $countdata-1;
            for ($row = 2; $row <= $countdata; $row++) 
            {

              try{

                $val = "'" . implode("','", $data[$row]) . "'";
                //echo $val;
                 $sql = "INSERT INTO indsys1017employeemastertest(Employeeid,Title,Firstname,Lastname,Type_Of_Posistion,
                 Mother_tong,DOB,Age,Bloodgroup,Religion,Nationality,Country,Department,Designation,Emaild,
                 Marital_status,Date_Of_Joing,Gender,Contactno,Highestqualification,FatherGuardianSpouseName,
                 EmployeeType,Allow_OT,Allow_LOP,Shift,Employee_CL,Salary_mode,Week_Off,Basic,HR_Allowance,
                 Other_Allowance,TA,Performance_allowance,Day_allowance,PF_Yesandno,PF_Fixed,PF,ESI_Yesandno,
                 ESI,TDS,Professional_tax,Net_Salary,Gross_Salary,EmpActive,Expereienced,Fresher,
                 ESIno,UANno,Aadharno,Panno,Vacinated,PFJoindate,ESIJoindate)
                         VALUES ($val);";
                        
                       if($conn->query($sql) === TRUE) {
                         echo "Data $row inserted successfully"."<br>";
                         
 
                     }
                     else {
                         echo "Error: " . $sql . "<br>" . $conn->error;
                     }
              }
               catch(Exception $e)
               {

               }
                   
                   
                }
                SavebulkEmployee($conn,$Userid,$Clientid);
              }



            function SavebulkEmployee($conn,$Userid,$Clientid)
            {

                //echo 'Cursorin';
                $logemp = "SELECT * FROM indsys1017employeemastertest ";
  
                //echo $logemp;
              $logempall = mysqli_query($conn, $logemp);
              while($row = mysqli_fetch_array($logempall)) {
             
                $Employeeid =$row['Employeeid'];
                $Candidateid=0;
                $Title=$row['Title'];
                $Firstname=$row['Firstname'];            
                $Lastname=$row['Lastname'];
                $Fullname="$Firstname $Lastname";
                $Languages=$row['Languages'];
                $Mother_tong=$row['Mother_tong'];
                $DOB=$row['DOB'];
                $Age=$row['Age'];
                $Bloodgroup=$row['Bloodgroup'];
                $Religion=$row['Religion'];
                $Nationality=$row['Nationality'];
                $Country=$row['Country'];
                $Department=$row['Department'];
                $Emaild=$row['Emaild'];
                $Marital_status=$row['Marital_status'];
                $Date_Of_Joing=$row['Date_Of_Joing'];
                $Relocate='No';                
                $Addormodifydatetime=$date = date("Y-m-d H:i:s" );           
                $Gender=$row['Gender'];
                $Contactno=$row['Contactno'];
                $Allow_OT=$row['Allow_OT'];
                $Allow_LOP=$row['Allow_LOP'];
                $Shift=$row['Shift'];
                $Employee_CL=$row['Employee_CL'];
                $Salary_mode=$row['Salary_mode'];
                $Week_Off=$row['Week_Off'];
                $Employee_Rights=$row['Employee_Rights'];
                $Basic=$row['Basic'];
                $HR_Allowance=$row['HR_Allowance'];
                $Other_Allowance=$row['Other_Allowance'];
                $TA=$row['TA'];
                $Performance_allowance=$row['Performance_allowance'];
                $Day_allowance=$row['Day_allowance'];
                $PF_Yesandno=$row['PF_Yesandno'];
                $PF_Fixed=$row['PF_Fixed'];
                $PF=$row['PF'];
                $ESI_Yesandno=$row['ESI_Yesandno'];
                $ESI=$row['ESI'];
                $TDS=$row['TDS'];
                $Professional_tax=$row['Professional_tax'];
                $Net_Salary=$row['Net_Salary'];
                $Gross_Salary=$row['Gross_Salary'];
                $Empusername=$row['Empusername'];
                $Emppassword=$row['Emppassword'];
                $Designation=$row['Designation'];
                $EmpActive='Active';      
                $Type_Of_Posistion=$row['Type_Of_Posistion'];
                $Expereienced=$row['Expereienced'];
                $Fresher=$row['Fresher'];
                $ESIno=$row['ESIno'];
                $UANno=$row['UANno'];
                $Aadharno=$row['Aadharno'];
                $Panno=$row['Panno'];
                $Vacinated=$row['Vacinated'];
                $EmployeeType=$row['EmployeeType'];
                $PFJoindate=$row['PFJoindate'];
                $ESIJoindate=$row['ESIJoindate'];
                $Bonouspercentage=$row['Bonouspercentage'];
    $PFEmployeeCompany=$row['PFEmployeeCompany'];
    $ESIEmployeeCompany=$row['ESIEmployeeCompany'];
    $Highestqualification=$row['Highestqualification'];
    $FatherGuardianSpouseName=$row['FatherGuardianSpouseName'];
    $Smsverified='No';
    $Emailverified='No';
    
    
    $LWF=0;
             
              
                if($Gender =="Male")
        {
          $image = "MenAvatar.jpg";
        }
        else
        {
          $image = "WomenAvatar.jpg";
        }
     
        $directory2 = "../$Clientid/";    
        $directory3 = "../$Clientid/EMPimage/";
        $directory = "../$Clientid/EMPimage/$Employeeid/";
        if(!is_dir($directory2)){mkdir($directory2, 0777);}
        if(!is_dir($directory3)){mkdir($directory3, 0777);}
       
        if(!is_dir($directory)){mkdir($directory, 0777);}
          
     
        $uniquesavename=time().uniqid(rand());            
        $Logofilepath = $directory .$uniquesavename.'.jpg';
        $imageget = file_get_contents($image);
                 file_put_contents($Logofilepath,$imageget);
                  $Empimage=$Logofilepath;
                  TestEmp($conn,$Type_Of_Posistion,$Department,$Clientid);
                  $SalaryType ='Normal'; 
                                  // $CategorywiseEmpid =$_SESSION['Nextno'];
                  $Autogerenreateid = $_SESSION['AutogenerateNo'];
                  $CategoryAutogenerationno = $_SESSION['CategoryAutogenerationNo'];
                  $Previous_sainmarks_department ='';
                  $EmailToken = $Employeeid;
   
    $sqlsave = "INSERT  INTO indsys1017employeemastertst(Clientid,Employeeid,Title,Firstname,Lastname,Type_Of_Posistion,
    Mother_tong,DOB,Age,Bloodgroup,Religion,Nationality,Country,Department,Designation,Emaild,
    Marital_status,Date_Of_Joing,Gender,Contactno,Highestqualification,FatherGuardianSpouseName,
    EmployeeType,Allow_OT,Allow_LOP,Shift,Employee_CL,Salary_mode,Week_Off,Basic,HR_Allowance,
    Other_Allowance,TA,Performance_allowance,Day_allowance,PF_Yesandno,PF_Fixed,PF,ESI_Yesandno,
    ESI,TDS,Professional_tax,Net_Salary,Gross_Salary,EmpActive,Expereienced,Fresher,
    ESIno,UANno,Aadharno,Panno,Vacinated,PFJoindate,ESIJoindate,SalaryType)
    values('$Clientid','$Employeeid','$Title','$Firstname','$Lastname','$Type_Of_Posistion',
    '$Mother_tong','$DOB','$Age','$Bloodgroup','$Religion','$Nationality','$Country','$Department',
    '$Designation','$Emaild','$Marital_status','$Date_Of_Joing',
    '$Gender','$Contactno','$Highestqualification','$FatherGuardianSpouseName','$EmployeeType',
    '$Allow_OT','$Allow_LOP','$Shift','$Employee_CL','$Salary_mode','$Week_Off',
    '$Basic','$HR_Allowance','$Other_Allowance',
    '$TA','$Performance_allowance','$Day_allowance','$PF_Yesandno','$PF_Fixed','$PF','$ESI_Yesandno',
    '$ESI','$TDS','$Professional_tax','$Net_Salary','$Gross_Salary','$EmpActive','$Expereienced','$Fresher',
    '$ESIno','$UANno','$Aadharno','$Panno','$Vacinated','$PFJoindate',
    '$ESIJoindate','$SalaryType')";
// echo  $sqlsave;
 $resultsave = mysqli_query($conn,$sqlsave);


 $UpdateNextno = "Update indsys1008mastermodule set Nextno = '$CategoryAutogenerationno' where ModuleID ='$Type_Of_Posistion' AND Clientid ='$Clientid'";
 $resultUpdate = mysqli_query($conn,$UpdateNextno);

 $UpdateNextno2 = "Update indsys1008mastermodule set Nextno = '$Autogerenreateid' where ModuleID ='EMP' AND Clientid ='$Clientid' ";
 $resultUpdate = mysqli_query($conn,$UpdateNextno2);
}
           
}
     





function Emailunique($conn,$Emailid)
 {
     $Message = "No";

     if (mysqli_connect_errno()){
       $Message= "Failed to connect to MySQL: " . mysqli_connect_error(); exit;
     }
     $resultExists = "SELECT * FROM indsys1017employeemaster WHERE Emaild = '$Emailid' LIMIT 1";
     $resultExists01 = $conn->query($resultExists);
   
    
    if(mysqli_fetch_row($resultExists01))
     {
       
       $Message ="MailYes";
    
     }
   
     else
     {
       $Message ='No';
    }
    return $Message;
 }
   
 
 
 
 
 function TestEmp($conn,$Category,$Department,$Clientid)
   {
       try
       {
   
        
         $EmpDepartment = $Department;
         $Un1 = "";
       $un2 ="";
         if($Category =="Category 1")
         {
           $Un1 = "CAT01";
       
         }
         if($Category =="Category 2")
         {
           $Un1 = "CAT02";
       
         }
         if($Category =="Category 3")
         {
           $Un1 = "CAT03";
       
         }
       
       
       
         $Un2=substr($EmpDepartment, 0,3);
       
         $data01="";
       
           $GetNextno = "SELECT * FROM indsys1008mastermodule where ModuleID ='$Category' AND Clientid ='$Clientid'  ";
       
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
              
               $EmpIDaddzero = sprintf('%06d', $data01);
               $EmpID = "$Un1$Un2$EmpIDaddzero";
       
   
   
   
               $GetNextnoemp = "SELECT * FROM indsys1008mastermodule where ModuleID ='EMP' AND Clientid ='$Clientid' ";
   
               $result_Nextnosss = $conn->query($GetNextnoemp);
               if (mysqli_num_rows($result_Nextnosss) > 0)
               {
                   while ($row = mysqli_fetch_array($result_Nextnosss))
                   {
                       $data = $row['Nextno'];
                       $data01new = $data + 1;
                   }
               } 
   
           $_SESSION['Nextno'] =$EmpID;
           $_SESSION['CategoryAutogenerationNo'] =$Textno;
           $_SESSION['AutogenerateNo']=$data01new;
   
      }
       catch(Exception $e)
       {
   
       } 
   
   }
  


            
    
?>