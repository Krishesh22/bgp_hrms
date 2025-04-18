<?php
include '../config.php';
include '../session.php';
include '../HRM54/vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

session_start();
  $user_id = $_SESSION["Userid"];
      $username = $_SESSION["Username"];
      $usermail=$_SESSION["Mailid"];
      $Clientid =$_SESSION["Clientid"];
   
 
$Message ='';

date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );


$form_data = json_decode(file_get_contents("php://input"));
  $form_data= json_decode( json_encode($form_data), true);
 $MethodGet = $form_data['Method'];

 if($MethodGet == 'ALL')
{
 

   $GetState = "SELECT
   al.Assetlistid,
   al.Clientid,
   ac.Assetcategoryid,
   ac.Assetcategory,
   al.Assetshortcode,
   al.Assetcode,
   al.Assetname,
   al.Activestatus,
   ac.Activestatus AS Categoryactivestatus,
   IF(COUNT(eic.Assetlistid) > 0, 1, 0) AS AssignedCount,
   em.Employeeid,
   em.Fullname,
   em.Department,
   DATE_FORMAT(eic.Allocateddatetime,'%d-%m-%Y') AS Allocateddatetime2
FROM indsys1058assetlists al
LEFT JOIN indsys1034employeeitemchecklist eic ON al.Assetlistid = eic.Assetlistid AND al.Clientid = eic.Clientid AND eic.Status = 'Allocated'
LEFT JOIN indsys1017employeemaster em ON eic.Employeeid = em.Employeeid AND em.Clientid = al.Clientid
JOIN indsys1058assetcategory ac ON al.Assetcategoryid = ac.Assetcategoryid AND al.Clientid = ac.Clientid
WHERE al.Clientid = '$Clientid'  AND eic.Status = 'Allocated'
GROUP BY al.Assetlistid, al.Clientid, ac.Assetcategoryid, ac.Assetcategory, ac.Activestatus, em.Employeeid, em.Fullname,eic.Allocateddatetime,em.Department;";
    $result_Region = $conn->query($GetState);
   
    if(mysqli_num_rows($result_Region) > 0) { 
    while($row = mysqli_fetch_array($result_Region)) {  
      $data01[] = $row;
      } 
    }
    

    header('Content-Type: application/json');
    echo json_encode($data01);
 
 
 
}


if($MethodGet == 'DEPARTMENTLISTS')
{
 $Departmentname = $form_data['Department'];
  $Categoryarray = implode(',', $Departmentname); 
  $Categoryarray = "'$Categoryarray'"; // added single quote to start and end position
  $Category = str_replace(",","','","$Categoryarray");
   $GetState = "SELECT
   al.Assetlistid,
   al.Clientid,
   ac.Assetcategoryid,
   ac.Assetcategory,
   al.Assetshortcode,
   al.Assetcode,
   al.Assetname,
   al.Activestatus,
   ac.Activestatus AS Categoryactivestatus,
   IF(COUNT(eic.Assetlistid) > 0, 1, 0) AS AssignedCount,
   em.Employeeid,
   em.Fullname,
   em.Department,
   DATE_FORMAT(eic.Allocateddatetime,'%d-%m-%Y') AS Allocateddatetime2
FROM indsys1058assetlists al
LEFT JOIN indsys1034employeeitemchecklist eic ON al.Assetlistid = eic.Assetlistid AND al.Clientid = eic.Clientid AND eic.Status = 'Allocated'
LEFT JOIN indsys1017employeemaster em ON eic.Employeeid = em.Employeeid AND em.Clientid = al.Clientid
JOIN indsys1058assetcategory ac ON al.Assetcategoryid = ac.Assetcategoryid AND al.Clientid = ac.Clientid
WHERE al.Clientid = '$Clientid'  AND em.Department IN ($Category) AND eic.Status = 'Allocated'
GROUP BY al.Assetlistid, al.Clientid, ac.Assetcategoryid, ac.Assetcategory, ac.Activestatus, em.Employeeid, em.Fullname,eic.Allocateddatetime,em.Department;";
    $result_Region = $conn->query($GetState);
   
    if(mysqli_num_rows($result_Region) > 0) { 
    while($row = mysqli_fetch_array($result_Region)) {  
      $data01[] = $row;
      } 
    }
    
    $excel=new Spreadsheet();
    ExportDepartment($conn,$excel, $GetState);
    header('Content-Type: application/json');
    echo json_encode($data01);
 
  
 
}

function ExportDepartment($conn,$excel, $GetState)
{
  $gettime = time();

$gettime = "Asset_allocated_list.xls";



header('Content-Type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=$gettime");
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');



$active=$excel->getActiveSheet();
$active->setTitle("Assetlist");
$excel->getActiveSheet();


$excel->getActiveSheet()->mergeCells("A1:H1");
$excel->getActiveSheet()->mergeCells("A2:H2");
$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(18);
$excel->getActiveSheet()->getStyle('A2')->getFont()->setSize(13);
$excel->getActiveSheet()->getStyle('A2')->getFont()->setBold(true);
$excel->getActiveSheet()->getStyle('A3')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle('B3')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle('C3')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle('D3')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle('E3')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle('F3')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle('G3')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle('H3')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle('I3')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle('J3')->getFont()->setBold( true );
$excel->getActiveSheet()->getStyle('K3')->getFont()->setBold( true );




$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$excel->getActiveSheet()->getStyle('A2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);



$excel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('B')->setWidth(34);
$excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('D')->setWidth(34);
$excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
$excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);


$mergeCellStyle = $active->getStyle("A1:H1");
$mergeCellStyle->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
$mergeCellStyle->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('FFA0A0A0');


$active->setCellValue('A1',"BRITANNIA LABELS(INDIA) PVT LTD");
$active->setCellValue('A2',"Asset allocated detail list");
$active->setCellValue('A3','S.No');
$active->setCellValue('B3','ID');
$active->setCellValue('C3','NAME');
$active->setCellValue('D3','Department');
$active->setCellValue('E3','Assetname');
$active->setCellValue('F3','Assetcategory');
$active->setCellValue('G3','Allocated date');
$active->setCellValue('H3','Assetcode');



$currentContenRow=4;
$Sno = 0;
$result_Region = $conn->query($GetState);
  if(mysqli_num_rows($result_Region) > 0) { 
  while($row = mysqli_fetch_array($result_Region)) {  
   
   
    $Sno++;

     $active->setCellValue('A'.$currentContenRow,$Sno);
    $active->setCellValue('B'.$currentContenRow,$row['Employeeid']);
    $active->setCellValue('C'.$currentContenRow,$row['Fullname']);
    $active->setCellValue('D'.$currentContenRow,$row['Department']);
    $active->setCellValue('E'.$currentContenRow,$row['Assetname']);
    $active->setCellValue('F'.$currentContenRow,$row['Assetcategory']);
    $active->setCellValue('G'.$currentContenRow,$row['Allocateddatetime2']);
    $active->setCellValue('H'.$currentContenRow,$row['Assetshortcode']);
   
     
 
 
  $currentContenRow++;

  }
}


$writer = IOFactory::createWriter($excel, 'Xls');
$writer->save('php://output');
exit;
}

if($MethodGet == 'DEPARTMENTLISTS2')
{
 $Departmentname = $form_data['Department'];
  $Categoryarray = implode(',', $Departmentname); 
  $Categoryarray = "'$Categoryarray'"; // added single quote to start and end position
  $Category = str_replace(",","','","$Categoryarray");
   $GetState = "SELECT
   al.Assetlistid,
   al.Clientid,
   ac.Assetcategoryid,
   ac.Assetcategory,
   al.Assetshortcode,
   al.Assetcode,
   al.Assetname,
   al.Activestatus,
   ac.Activestatus AS Categoryactivestatus,
   IF(COUNT(eic.Assetlistid) > 0, 1, 0) AS AssignedCount,
   em.Employeeid,
   em.Fullname,
   em.Department,
   DATE_FORMAT(eic.Allocateddatetime,'%d-%m-%Y') AS Allocateddatetime2
FROM indsys1058assetlists al
LEFT JOIN indsys1034employeeitemchecklist eic ON al.Assetlistid = eic.Assetlistid AND al.Clientid = eic.Clientid AND eic.Status = 'Allocated'
LEFT JOIN indsys1017employeemaster em ON eic.Employeeid = em.Employeeid AND em.Clientid = al.Clientid
JOIN indsys1058assetcategory ac ON al.Assetcategoryid = ac.Assetcategoryid AND al.Clientid = ac.Clientid
WHERE al.Clientid = '$Clientid'  AND em.Department IN ($Category) AND eic.Status = 'Allocated'
GROUP BY al.Assetlistid, al.Clientid, ac.Assetcategoryid, ac.Assetcategory, ac.Activestatus, em.Employeeid, em.Fullname,eic.Allocateddatetime,em.Department;";
    $result_Region = $conn->query($GetState);
   
    if(mysqli_num_rows($result_Region) > 0) { 
    while($row = mysqli_fetch_array($result_Region)) {  
      $data01[] = $row;
      } 
    }
    
 
   
    header('Content-Type: application/json');
    echo json_encode($data01);
 
  
 
}
?>