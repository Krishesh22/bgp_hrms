<?php 
include '../config.php';
include '../mssql.php';
session_start();
  $user_id = $_SESSION["Userid"];
      $username = $_SESSION["Username"];
      $usermail=$_SESSION["Mailid"];
      $Clientid =$_SESSION["Clientid"];
   
      $_SESSION["Tittle"] ="Employee";
$Message ='';

date_default_timezone_set('Asia/Kolkata');
$date = date("Y-m-d H:i:s" );


$form_data = json_decode(file_get_contents("php://input"));
  $form_data= json_decode( json_encode($form_data), true);


$month = intval(date('m'));
$year = date('Y');

 $table_name = "devicelogs_".$month."_".$year."";
// //echo $table_name;exit;
$createsql = "CREATE TABLE IF NOT EXISTS ".$table_name." (
  id int(11) NOT NULL AUTO_INCREMENT,
  DeviceLogId varchar(500) DEFAULT NULL,
  DownloadDate datetime NOT NULL,
  DeviceId varchar(250) DEFAULT NULL,
  UserId varchar(250) NOT NULL,
  LogDate datetime NOT NULL,
  Direction varchar(500) NOT NULL,
  AttDirection varchar(500) DEFAULT NULL,
  C1 varchar(300) DEFAULT NULL,
  C2 varchar(300) DEFAULT NULL,
  C3 varchar(300) DEFAULT NULL,
  C4 varchar(300) DEFAULT NULL,
  C5 varchar(300) DEFAULT NULL,
  C6 varchar(300) DEFAULT NULL,
  C7 varchar(300) DEFAULT NULL,
  WorkCode varchar(300) DEFAULT '0',
  mlog varchar(5) DEFAULT '0',
  mlogstatus varchar(5) DEFAULT '0',
  UpdateFlag varchar(150) DEFAULT '0',
  cdate datetime NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4  ;";

$mydlogresp = mysqli_query($conn,$createsql) ;
$mylastdevrow = @mysqli_fetch_assoc($mydlogresp);
$mylastdevid = @$mylastdevrow['DeviceLogId'];
$msconn = connect_msdb();
$msresp = 'SELECT * FROM '.$table_name.'   ORDER BY DeviceLogId ASC' ;
//echo $msresp ;
$stmt = sqlsrv_query( $msconn, $msresp );
$msdlogcount = sqlsrv_num_rows($stmt);

while($msrow = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)) {
    
$DeviceLogId = $msrow['DeviceLogId'];
$DownloadDate = $msrow['DownloadDate'];
$DeviceId =$msrow['DeviceId'];
$UserId =$msrow['UserId'];
$LogDate =$msrow['LogDate'];
$Direction =$msrow['Direction'];
$AttDirection =$msrow['AttDirection'];
$UpdateFlag =$msrow['UpdateFlag'];
$C1 =$msrow['C1'];
$C2 =$msrow['C2'];
$C3 =$msrow['C3'];
$C4 = $msrow['C4'];
$C5 =$msrow['C5'];
$C6 =$msrow['C6'];
$C7 =$msrow['C7'];

$WorkCode =$msrow['WorkCode'];
// $mlogstatus =$msrow['mlogstatus'];
// $mlog =$msrow['mlog'];
// $cdate =$msrow['cdate'];
// echo $table_name;
// echo 'devicelogs_4_2022';
$sql = "INSERT IGNORE INTO ".$table_name." (id,DeviceLogId, DownloadDate, DeviceId, UserId,LogDate,Direction,AttDirection,UpdateFlag,C1,C2,C3,C4,C5,C6,C7,WorkCode,cdate)
     VALUES (NULL,'$DeviceLogId','$DownloadDate','$DeviceId','$UserId','$LogDate','$Direction','$AttDirection','$UpdateFlag','$C1','$C2','$C3','$C4','$C5','$C6','$C7','$WorkCode','$date')";



    $resp = mysqli_query($conn,$sql) ;
     
   
    if($resp) {
    //echo "Success=>".$msrow['DeviceLogId']."<br/>";
    } else {
    //echo "Fail=>  ".$msrow['DeviceLogId']."<br/>";
    }
}

?>