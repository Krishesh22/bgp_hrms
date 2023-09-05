<?php

require 'vendor/autoload.php';
include '../config.php';
session_start();
$user_id = $_SESSION["Userid"];
$username = $_SESSION["Username"];
$usermail = $_SESSION["Mailid"];
$Clientid = $_SESSION["Clientid"];
$date = date('Y-m-d H:i:s');

if (isset($_FILES['files']) && !empty($_FILES['files'])) {

    $directory2 = "../$Clientid/";
    $directory = "../$Clientid/EMPBULKSALARY/";

    if (!is_dir($directory2)) {
        mkdir($directory2, 0777);
    }
    if (!is_dir($directory)) {
        mkdir($directory, 0777);
    }

    $chk = "";
    //$files = null;
    

    $no_files = count($_FILES["files"]['name']);
    for ($i = 0;$i < $no_files;$i++) {
        if ($_FILES["files"]["error"][$i] > 0) {
            echo "Error: " . $_FILES["files"]["error"][$i] . "<br>";
        }
        else {
            if (file_exists($directory . $_FILES["files"]["name"][$i])) {
                echo 'File already exists : ' . $directory . $_FILES["files"]["name"][$i];
            }
            else {
                $img = $_FILES["files"]["name"][$i];
                $uniquesavename = time() . uniqid(rand()) . $img;

                move_uploaded_file($_FILES["files"]["tmp_name"][$i], $directory . $uniquesavename);

                $file_name = $directory . $uniquesavename;

                $file_type = \PhpOffice\PhpSpreadsheet\IOFactory::identify($file_name);
                $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($file_type);
                $reader->setReadDataOnly(true);
                $reader->setReadEmptyCells(false);
                $spreadsheet = $reader->load($file_name);
                //unlink($file_name);
                $data = $spreadsheet->getActiveSheet()
                    ->toArray();

                SaveExcelData($conn, $user_id, $Clientid, $data, $date);
                //  $Message ="Exists";
                echo 'File successfully uploaded : ' . $directory . $_FILES["files"]["name"][$i] . ' ';
            }
        }
    }
}
else {
    echo 'Please choose at least one file';
}

function SaveExcelData($conn, $user_id, $Clientid, $data, $date) {

    // $resultExists = "DELETE FROM indsys1017employeemastertest";
    // $resultExists01 = $conn->query($resultExists);
    $countdata = count($data);

    $countdata = $countdata - 1;
    
    for ($row = 1;$row <= $countdata;$row++) {

        $val = "'" . implode("','", $data[$row]) . "'";

        $string_array = explode(",", $val);
        $Employeeid = str_replace("'", "", "$string_array[1]");
       
        if ($Employeeid == '') {
            break;
        }

        $Basic = str_replace("'", "", "$string_array[6]");
        $HR_Allowance = str_replace("'", "", "$string_array[7]");
        $TA = str_replace("'", "", "$string_array[11]");
        $Performance_allowance = str_replace("'", "", "$string_array[9]");
        $Day_allowance = str_replace("'", "", "$string_array[10]");

        $Other_Allowance = str_replace("'", "", "$string_array[8]");
        $PF_Yesandno = str_replace("'", "", "$string_array[12]");
      //  $ESI_Yesandno = str_replace("'", "", "$string_array[14]");

        if (empty($Basic)) {
            $Basic = 0;
        }

        if (empty($HR_Allowance)) {
            $HR_Allowance = 0;
        }
        if (empty($TA)) {
            $TA = 0;
        }
        if (empty($Performance_allowance)) {
            $Performance_allowance = 0;
        }
        if (empty($Day_allowance)) {
            $Day_allowance = 0;
        }
        if (empty($Other_Allowance)) {
            $Other_Allowance = 0;
        }

        $PFnew = 0;
        $PF_Fixed = 'No';
        $GetChapter = "SELECT * FROM indsys1017employeemaster where Clientid ='$Clientid' and Employeeid = '$Employeeid'  ORDER BY Employeeid";
        $result_Chapter = $conn->query($GetChapter);       
        if ($result_Chapter->num_rows > 0) {
            $empres = $result_Chapter->fetch_object();
            $PFnew = $empres->PF;
            $PF_Fixed = $empres->PF_Fixed;
            $ESI_Yesandno =$empres->ESI_Yesandno;
            $Day_allowance =$empres->Day_allowance;
             $PF_Yesandno =$empres->PF_Yesandno;
        } 
       if(empty($PF_Fixed))
       {
        $PF_Fixed ='No';
       }
        $Total = $Basic + $HR_Allowance + $TA + $Performance_allowance + $Other_Allowance;
       

        $pfpercentage = (12 / 100);
        $esipercentage = (0.75 / 100);

        if ($PF_Yesandno == 'Yes' && $PF_Fixed == 'Yes') {
            $PF = $PFnew;
        }
        elseif ($PF_Yesandno == 'Yes' && $PF_Fixed == 'No') {
            $PF = ($Basic + $Other_Allowance) * $pfpercentage;
            $PF = round($PF, 0);
        }

        else {
            $PF = 0;
        }
       
        if (trim($ESI_Yesandno) =='Yes') {
           // $Totalsalperformance = $Total + $Performance_allowance;
            
            if ($Total < 21000)
             {
                $Esi = ($Total * $esipercentage);
                $ESI = roundup($Esi);
                $ESI = round($ESI, 0);
                //echo "$Employeeid-ProcessedIN- $ESI_Yesandno<br>";
            }
            else {
                $ESI_Yesandno ='No';
                 $ESI = 0;
                //echo "$Employeeid-Processed- $ESI_Yesandno<br>";
            }
        }


        else {
            $ESI = 0;
        }

        $Gross_Salary = $Total;
        $Net_Salary = ($Total - $PF - $ESI);

        $TDS = 0;
        $Professional_tax = 0;

        $resultExists = "Update indsys1017employeemaster set 
          Basic ='$Basic',HR_Allowance ='$HR_Allowance',TA='$TA',Performance_allowance ='$Performance_allowance',Day_allowance ='$Day_allowance',PF ='$PF',ESI='$ESI',TDS ='$TDS',Professional_tax ='$Professional_tax',Net_Salary ='$Net_Salary',Gross_Salary='$Gross_Salary',  Other_Allowance = '$Other_Allowance',PF_Yesandno='$PF_Yesandno',PF_Fixed='$PF_Fixed',  ESI_Yesandno = '$ESI_Yesandno' WHERE Employeeid = '$Employeeid' AND Clientid ='$Clientid'";
        
        $resultExists01 = $conn->query($resultExists);
       
        if ($resultExists01 === true) {
            echo "Success-$Employeeid<br/>";
        }
        else {
            echo "Failed-$Employeeid<br/>";
        }

    }   

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
