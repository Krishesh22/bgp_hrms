<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();


$inputFileName = 'TE01.xlsx';

/**  Create a new Reader of the type defined in $inputFileType  **/

$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);
$spreadsheet = $spreadsheet->getActiveSheet();
$data_array =  $spreadsheet->toArray();
$totalrows = count($data_array);
$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
$spreadsheet = $reader->load("TE01.xlsx");
$worksheet = $spreadsheet->getActiveSheet();

echo '<table>' . PHP_EOL;
foreach ($worksheet->getRowIterator() as $row) {
    echo '<tr>' . PHP_EOL;
    $cellIterator = $row->getCellIterator();
    $cellIterator->setIterateOnlyExistingCells(FALSE); // This loops through all cells,
                                                       //    even if a cell value is not set.
                                                       // For 'TRUE', we loop through cells
                                                       //    only when their value is set.
                                                       // If this method is not called,
                                                       //    the default value is 'false'.
    foreach ($cellIterator as $cell) {
        echo '<td>' .
             $cell->getValue() .
             '</td>' . PHP_EOL;
    }
    echo '</tr>' . PHP_EOL;
}
echo '</table>' . PHP_EOL;


for( $j=2; $j<=$totalrows-3;$j++ )
{
    echo "Test";
    $Employeeid =$data_array[$j]["3"];
    echo $Employeeid;
 
    // $Title =$data_array[$j]["29"];
    // $Firstname =$data_array[$j]["29"];
    // $Lastname = $data_array[$j]["29"];
    // $Gender =$data_array[$j]["29"];
 
    // $Married =$data_array[$j]["29"];
    // $Mothertongue = $data_array[$j]["29"];
    // $Contactno =$data_array[$j]["29"];
    // $Category = $data_array[$j]["29"];
    // $Emailid = $data_array[$j]["29"];
    // $Dob =$data_array[$j]["29"];
    // $Age = $data_array[$j]["29"];
    // $Bloodgroup =$data_array[$j]["29"];
   
    // $Religion = $data_array[$j]["29"];
    // $Imagepath=$data_array[$j]["29"];

    // $Shift =$data_array[$j]["29"];
    // $AllowOT =$data_array[$j]["29"];
    // $AllowLOP =$data_array[$j]["29"];
    // $Salary_Mode = $data_array[$j]["29"];
    // $Weekoff = $data_array[$j]["29"];
    // $Employee_CL =$data_array[$j]["29"];
    // $Nationality = $data_array[$j]["29"];
    // $Languages = $data_array[$j]["29"];
    // $ESIno =$data_array[$j]["29"];
    // $UANno =$data_array[$j]["29"];
    // $Aadharno = $data_array[$j]["29"];
    // $Panno =$data_array[$j]["29"];
    // $PFJoiningdate = $data_array[$j]["29"];
    // $ESIJoiningdate = $data_array[$j]["29"];
    // $EmpDepartment =$data_array[$j]["29"];
    // $Highestqualification = $data_array[$j]["29"];
    // $EmpDesignation = $data_array[$j]["29"];
    // $Date_Of_Joing=$data_array[$j]["29"];
    
    
    // $FatherGuardianSpouseName = $data_array[$j]["29"];;
    // $LastAppresialDate = $data_array[$j]["29"];;
    // $LastAppresialDate2 =$data_array[$j]["29"];;
    // $BackgroundVerificationpath = $data_array[$j]["29"];;
    // $BackgroundVerification = $data_array[$j]["29"];;
    // $Fresher=$data_array[$j]["29"];;
    // $Expereience = $data_array[$j]["29"];;
   
    // $PF_Yesandno = $data_array[$j]["29"];;
    // $PF_Fixed = $data_array[$j]["29"];;
}






// print_r($data_array);
//echo count($data_array);

?>