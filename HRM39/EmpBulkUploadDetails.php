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
                    $uniquesavename=time().uniqid(rand()).$img;

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
    
    
    function SaveExcelData($conn,$user_id,$Clientid,$data,$date)
    {
      
        // $resultExists = "DELETE FROM indsys1017employeemastertest";
        // $resultExists01 = $conn->query($resultExists);

        $countdata= count($data);
       // echo $countdata;
        $countdata= $countdata-1;
        for ($row = 1; $row <= $countdata; $row++) 
        {

          
            $val = "'" . implode("','", $data[$row]) . "'";
            
            $string_array = explode(",",$val);
            $Employeeid = str_replace("'","","$string_array[1]");;
            $Title = str_replace("'","","$string_array[2]");;
            $Firstname = str_replace("'","","$string_array[3]");;
            $Lastname = str_replace("'","","$string_array[4]");;
            $Type_Of_Posistion = str_replace("'","","$string_array[5]");; 
            $Category =  $Type_Of_Posistion;
            $Type_Of_Posistion = strtoupper($Type_Of_Posistion);
            $Title="$Title";
          // echo $Type_Of_Posistion;
           
            // if ($Type_Of_Posistion== 'CAT-1')
            // {
            //   $Category='Category 1';
            // }
            // if ($Type_Of_Posistion== 'CAT-2')
            // {
            //   $Category='Category 2';
              
            // }
            // if ($Type_Of_Posistion== 'CAT-3')
            // {
             
            //   $Category='Category 3';
            // }
            $Mother_tong = str_replace("'","","$string_array[6]");;
       
            $DOB2 = str_replace("'","","$string_array[7]");
         
           $DOBnew = str_replace('.', '-', $DOB2);

           $excel_date =  $DOB2; //here is that value 41621 or 41631
// $unix_date = ($excel_date - 25569) * 86400;
// $excel_date = 25569 + ($unix_date / 86400);
$unix_date = ($excel_date - 25569) * 86400;
$DOB= gmdate("Y-m-d", $unix_date);
           
           // $DOB= date('Y-m-d', $DOBnew);

          //  print_r("$Employeeid-DOB=$DOB<br/>");
            $Age = str_replace("'","","$string_array[8]");;
            $Bloodgroup = str_replace("'","","$string_array[9]");;
            $Religion = str_replace("'","","$string_array[10]");;
            $Nationality = str_replace("'","","$string_array[11]");;
            $Country = str_replace("'","","$string_array[12]");;
            $Department = str_replace("'","","$string_array[13]");;
            $Department = strtoupper($Department);
            $Designation = str_replace("'","","$string_array[14]");;
            $Designation = strtoupper($Designation);

            $Emaild = str_replace("'","","$string_array[15]");;
            $Marital_status = str_replace("'","","$string_array[16]");;
            $DOJ = str_replace("'","","$string_array[17]");;
           // echo "  $Employeeid -DOJ=$DOJ<br/>";
           $Date_Of_Joing1 = str_replace('.', '-', $DOJ);

           $unix_dateDOJ = ($DOJ - 25569) * 86400;
$Date_Of_Joing= gmdate("Y-m-d", $unix_dateDOJ);
           // $Date_Of_Joing= date('Y-m-d', strtotime($Date_Of_Joing1));
           
            $Gender = str_replace("'","","$string_array[18]");;
            $Contactno = str_replace("'","","$string_array[19]");;
            $Highestqualification = str_replace("'","","$string_array[20]");;
            $FatherGuardianSpouseName = str_replace("'","","$string_array[21]");;
            $EmployeeType = str_replace("'","","$string_array[22]");;
            $Allow_OT = str_replace("'","","$string_array[23]");;
            $Allow_LOP = str_replace("'","","$string_array[24]");;
      
            $Shift1 = str_replace("'","","$string_array[25]");;
            $Shift = $Shift1;
            if($Shift1 == 'D/N')
            {
              $Shift = 'ROUTINE';

            }
            elseif($Shift1 == 'D')
            {
              $Shift = 'GENERAL SHIFT';
            }

            $Employee_CL = str_replace("'","","$string_array[26]");;
            $Salary_mode = str_replace("'","","$string_array[27]");;
            $Week_Off = str_replace("'","","$string_array[28]");;
            $Basic = str_replace("'","","$string_array[29]");;
            $HR_Allowance = str_replace("'","","$string_array[30]");;
            $Other_Allowance = str_replace("'","","$string_array[31]");;
            $TA = str_replace("'","","$string_array[32]");;
            $Performance_allowance = str_replace("'","","$string_array[33]");;
            $Day_allowance = str_replace("'","","$string_array[34]");;
            $PF_Yesandno = str_replace("'","","$string_array[35]");;
            $PF_Fixed = str_replace("'","","$string_array[36]");;
          
            $PF = str_replace("'","","$string_array[37]");;

            $pfpercentage=(12/100);
            $esipercentage = (0.75/100);
            if ($PF_Yesandno == 'Yes')
            {
              
                if ($PF_Fixed == '0.12')
                {
                 
                  $PF_Fixed = 'No';
                  $PF =($Basic+$Other_Allowance)*$pfpercentage;
                  $PF=round($PF,0);
                }
            }
            else 
            {
              $PF_Fixed = 'No';
              $PF =0;
              
            }
          //  echo $PF;exit;
           // $PF = str_replace("'","","$string_array[37]");;
            $ESI_Yesandno = str_replace("'","","$string_array[38]");;
            $ESI = str_replace("'","","$string_array[39]");;

            
            $TDS = str_replace("'","","$string_array[40]");;
            $Professional_tax = str_replace("'","","$string_array[41]");;
            if(empty($Basic)){
              $Basic = 0;
            }
            if(empty($HR_Allowance)){
              $HR_Allowance = 0;
            } if(empty($TA)){
              $TA = 0;
            } if(empty($Performance_allowance)){
              $Performance_allowance = 0;
            } if(empty($Day_allowance)){
              $Day_allowance = 0;
            }
            //$Net_Salary = str_replace("'","","$string_array[42]");;
            $Gross_Salary= $Basic + $HR_Allowance + $TA+$Performance_allowance + $Day_allowance+$Other_Allowance;
        /// echo "basics-$Basic-hr-$HR_Allowance-TA-$TA-Perf-$Performance_allowance-day-$Day_allowance<br>";
           // $Gross_Salary = str_replace("'","","$string_array[43]");;
           if ($ESI_Yesandno == 'Yes')
            {
              $Esi = ($Gross_Salary*$esipercentage);
              $ESI = round($Esi,0);
            }
            else{
              $ESI=0;
            }

            $Net_Salary = ($Gross_Salary-$PF-$ESI);

            $EmpActive = str_replace("'","","$string_array[44]");;

            $LWF=0;
  if($Clientid==4)   
  {       
$LWF = $Gross_Salary*(0.2/100);

if($LWF>25)
{
  $LWF = 25;
}
  }

            if($EmpActive == 'Yes')
            {
              $EmpActive='Active';
            }
            $Expereienced = str_replace("'","","$string_array[45]");;
            $Fresher = str_replace("'","","$string_array[46]");;
            $ESIno = str_replace("'","","$string_array[47]");;
            $UANno = str_replace("'","","$string_array[48]");;
            $Aadharno = str_replace("'","","$string_array[49]");;
            $Panno = str_replace("'","","$string_array[50]");;
            $Vacinated = str_replace("'","","$string_array[51]");;
            $PFJoindate = str_replace("'","","$string_array[52]");;
            $ESIJoindate = str_replace("'","","$string_array[53]");;

            if(empty($PFJoindate))
            {
            
            }
            else{
              $PFJoindate = ($PFJoindate - 25569) * 86400;
              $Date_Of_Joing= gmdate("Y-m-d", $PFJoindate);
            }

            if(empty($ESIJoindate))
            {

            }
            else{
              $ESIJoindate = ($ESIJoindate - 25569) * 86400;
              $ESIJoindate= gmdate("Y-m-d", $ESIJoindate);
            }
   
                
        $Autogerenreateid =0;
        $CategoryAutogenerationno= 0;
        $Smsverified ='No';
        $Emailverified ='No';    
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
          
        TestEmp($conn,$Category,$Department,$Clientid);
        AddDepartment($conn,$Department,$Clientid,$date,$user_id);
        AddDesignation($conn,$Designation,$Clientid,$date,$user_id);
        AddQualification($conn,$Highestqualification,$Clientid,$date,$user_id);
        AddLanguages($conn,$Mother_tong,$Clientid,$date,$user_id);

          $SalaryType ='Normal'; 
          $CategorywiseEmpid =$_SESSION['Nextno'];
          $Empusername =$_SESSION['Nextno2'];
          $Emppassword ='BGP123';
          $Autogerenreateid = $_SESSION['AutogenerateNo'];
          $CategoryAutogenerationno = $_SESSION['CategoryAutogenerationNo'];
          $Previous_sainmarks_department ='';
          $EmailToken = $Employeeid;
          
        $sqlsave = "INSERT IGNORE INTO indsys1017employeemaster(Clientid,Employeeid,Candidateid,Title,Firstname,Lastname,Fullname,Type_Of_Posistion,
        Mother_tong,DOB,Age,Bloodgroup,Religion,Nationality,Country,Department,Designation,Emaild,
        Marital_status,Date_Of_Joing,Gender,Contactno,Highestqualification,FatherGuardianSpouseName,
        EmployeeType,Allow_OT,Allow_LOP,Shift,Employee_CL,Salary_mode,Week_Off,Basic,HR_Allowance,
        Other_Allowance,TA,Performance_allowance,Day_allowance,PF_Yesandno,PF_Fixed,PF,ESI_Yesandno,
        ESI,TDS,Professional_tax,Net_Salary,Gross_Salary,EmpActive,Expereienced,Fresher,
        ESIno,UANno,Aadharno,Panno,Vacinated,PFJoindate,ESIJoindate,SalaryType,Empimage,Smsverified,Emailverified,EmpAutogenerationno,
        CatAutogenerationno,Empusername,Emppassword,LWF)
        values('$Clientid','$CategorywiseEmpid','0','$Title','$Firstname','$Lastname','$Firstname $Lastname','$Category',
        '$Mother_tong','$DOB','$Age','$Bloodgroup','$Religion','$Nationality','$Country','$Department',
        '$Designation','$Emaild','$Marital_status','$Date_Of_Joing',
        '$Gender','$Contactno','$Highestqualification','$FatherGuardianSpouseName','$EmployeeType',
        '$Allow_OT','$Allow_LOP','$Shift','$Employee_CL','$Salary_mode','$Week_Off',
        '$Basic','$HR_Allowance','$Other_Allowance',
        '$TA','$Performance_allowance','$Day_allowance','$PF_Yesandno','$PF_Fixed','$PF','$ESI_Yesandno',
        '$ESI','$TDS','$Professional_tax','$Net_Salary','$Gross_Salary','$EmpActive','$Expereienced','$Fresher',
        '$ESIno','$UANno','$Aadharno','$Panno','$Vacinated','$PFJoindate',
        '$ESIJoindate','$SalaryType','$Empimage','$Smsverified','$Emailverified','$Autogerenreateid',
        '$CategoryAutogenerationno','$Empusername','$Emppassword','$LWF')";
        // echo  $sqlsave;
        $resultsave = mysqli_query($conn,$sqlsave);

        if($resultsave===TRUE)
        {
        // echo "$sqlsave <br/>";
        }
        else
        {
          echo  $sqlsave;
        }


        $UpdateNextno = "Update indsys1008mastermodule set Nextno = '$CategoryAutogenerationno' where ModuleID ='$Category' AND Clientid ='$Clientid'";
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
        $EmpID = "B$Un1$Un2$EmpIDaddzero";

      // echo  $EmpID;


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
        $_SESSION['Nextno2'] =$data01new;
        $_SESSION['Nextno'] =$EmpID;
        $_SESSION['CategoryAutogenerationNo'] =$Textno;
        $_SESSION['AutogenerateNo']=$data01new;
       // return $EmpID;

        }
        catch(Exception $e)
        {

        }


                  
        }
        function AddDepartment($conn,$Department,$Clientid,$date,$user_id)
            {
            try
            {
              $resultExists = "SELECT Department FROM indsys1003departmentmaster WHERE Department = '$Department' AND Clientid = '$Clientid' LIMIT 1";
              $resultExists01 = $conn->query($resultExists);
            
             
             if(mysqli_fetch_row($resultExists01))
              {
                
               
             
              }
            
              else
              {
                  
                $sqlsave = "INSERT IGNORE INTO indsys1003departmentmaster (Clientid,Department,Userid,Addormodifydatetime) VALUES ('".$Clientid."','".$Department."','".$user_id."','".$date."')";
                $resultsave = mysqli_query($conn,$sqlsave);
              
             
             }
            
            }
            catch(Exception $e)
            {

            }
            }



            function AddDesignation($conn,$Designation,$Clientid,$date,$user_id)
            {
            try
            {
              $resultExists = "SELECT Designation FROM indsys1004designationmaster WHERE Designation = '$Designation' LIMIT 1";
              $resultExists01 = $conn->query($resultExists);

 
              if(mysqli_fetch_row($resultExists01))
              {
    
                    
                    }

                 else
                {
      
                           $sqlsave = "INSERT IGNORE INTO indsys1004designationmaster (Clientid,Designation,Userid,Addormodifydatetime,Enableresthours) VALUES ('".$Clientid."','".$Designation."','".$user_id."','".$date."','No')";
                  $resultsave = mysqli_query($conn,$sqlsave);
                 
 
                        }

            
            }
            catch(Exception $e)
            {

            }
            }


            
            function AddQualification($conn,$Degree,$Clientid,$date,$user_id)
            {
            try
            {
              $resultExists = "SELECT Degree FROM indsys1014qualificationmaster WHERE Degree = '$Degree' AND Clientid = '$Clientid' LIMIT 1";
              $resultExists01 = $conn->query($resultExists);
            
             
             if(mysqli_fetch_row($resultExists01))
              {
                
                
             
              }
            
              else
              {
                  
                $sqlsave = "INSERT IGNORE INTO indsys1014qualificationmaster (Clientid,Degree,Userid,Addormodifydatetime) VALUES ('".$Clientid."','".$Degree."','".$user_id."','".$date."')";
                $resultsave = mysqli_query($conn,$sqlsave);
              
             
             }

            
            }
            catch(Exception $e)
            {

            }
            }


            function AddLanguages($conn,$Languages,$Clientid,$date,$user_id)
            {
            try
            {
              $resultExists = "SELECT Languages FROM indsys1015languagesmaster WHERE Languages = '$Languages' AND Clientid = '$Clientid' LIMIT 1";
              $resultExists01 = $conn->query($resultExists);
            
             
             if(mysqli_fetch_row($resultExists01))
              {
                
               
             
              }
            
              else
              {
                  
                $sqlsave = "INSERT IGNORE INTO indsys1015languagesmaster (Clientid,Languages,Userid,Addormodifydatetime) VALUES ('".$Clientid."','".$Languages."','".$user_id."','".$date."')";
                $resultsave = mysqli_query($conn,$sqlsave);
                
             
             }
            

            
            }
            catch(Exception $e)
            {

            }
            }

        ?>