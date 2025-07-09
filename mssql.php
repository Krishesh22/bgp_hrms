<?php
global $msconn;
function connect_msdb() {
$serverName = "103.168.241.210"; //serverName\instanceName
$connectionInfo = array( "UID"=>"sa", "PWD"=>"$@!Nsql@2023", "Database"=>"etimetracklitenew", "ReturnDatesAsStrings"=>true,"TrustServerCertificate"=> "yes","Encrypt"=>"No");
//$msconn = sqlsrv_connect( $serverName, $connectionInfo);
$msconn = sqlsrv_connect( $serverName, $connectionInfo);
	if( $msconn ) {

		 return $msconn;
	}else{
		echo " NOT OKAY";
		 die( print_r( sqlsrv_errors(), true));
	}
}

function close_msdb($msconn) {
	if( $msconn ) {
		sqlsrv_close($msconn);
	}

}
$matstring = "";
$msconn = connect_msdb();
// $msresp = sqlsrv_query($msconn,"SELECT * FROM DeviceLogs_4_2022 where Userid=1056 and DeviceLogId='500' ORDER BY Userid ASC", array(), array( "Scrollable" => 'static' ));
// $msdlogcount = sqlsrv_num_rows($msresp);
// echo $msdlogcount."<br/><br/><br/>";
// while($msrow = sqlsrv_fetch_array($msresp,SQLSRV_FETCH_ASSOC)) {
// 	$matstring=implode("','",$msrow);
// 	/*$sql = "INSERT INTO devicelogs(DeviceLogId, DownloadDate, DeviceId, UserId, LogDate, Direction, AttDirection, C1, C2, C3, C4, C5, C6, C7, WorkCode, cdate) VALUES ('".$matstring."',NOW())";
// 	connect_mydb();
// 	$resp = mysqli_query($conn,$sql);
// 	close_mydb();*/


// 	print_r($msrow);
// 	if($msconn) {
// 	echo " Success.<br/>";
// 	} else {
// 	echo " Fail.<br/>";
// 	}
// }
close_msdb($msconn);
?> 