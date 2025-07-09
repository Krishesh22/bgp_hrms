<?php



require 'vendor/autoload.php';
include '../config.php';
session_start();

$date = date('Y-m-d H:i:s');


if (isset($_FILES['files']) && !empty($_FILES['files'])) {

 
    $directory = "HRM39/";
  
    
   
  
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
       
                    SaveExcelData($data);
                  //  $Message ="Exists";
                    echo 'File successfully uploaded : ' .$directory. $_FILES["files"]["name"][$i] . ' ';
                }
            }
        }
    } else {
        echo 'Please choose at least one file';
    }
    
    
    function SaveExcelData($data)
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
            $Employeeid = str_replace("'","","$string_array[2]");;
            $Employeename = str_replace("'","","$string_array[3]");;
        
          // echo $Type_Of_Posistion;
           
          

   

           
      
        $image = "Testcustomer/$Employeeid.jpg";

        $Processedfilename= $Employeename.'_'.$Employeeid;
       
        
        $directory = "ProcessFinal/";
      

        if(!is_dir($directory)){mkdir($directory, 0777);}


        $uniquesavename=time().uniqid(rand());            
        $Logofilepath = $directory .$Processedfilename.'.jpg';
        $imageget = file_get_contents($image);
        file_put_contents($Logofilepath,$imageget);
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