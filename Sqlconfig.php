<?php
// localhost
global $msconn;
 $serverName = "103.196.29.168"; //serverName\instanceName
$connectionInfo = array( "UID"=>"sa", "PWD"=>"molex6..", "Database"=>"etimetracklite1", "ReturnDatesAsStrings"=>true);
//$msconn = sqlsrv_connect( $serverName, $connectionInfo);
$msconn = sqlsrv_connect( $serverName, $connectionInfo);
	if( $msconn ) {
		 return $msconn;
	}else{
		 die( print_r( sqlsrv_errors(), true));
	}



// // Check connection
// if ($msconn->connect_error) {
//     die("Connection failed: " . $msconn->connect_error);
// }

?>