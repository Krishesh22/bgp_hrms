<?php
$attandancedate = '2023-01-10';

$date = (new DateTime($attandancedate))->getTimestamp();
$new_date = date("Y-m-d H:i:s", strtotime('+36 hours', $date));
echo $new_date;

$dt=$new_date;
        $dt1 = strtotime($dt);
        $dt2 = date("l", $dt1);
        $dt3 = strtolower($dt2);
    if( ($dt3 == "sunday"))
		{
            $date = (new DateTime($new_date))->getTimestamp();
            $new_date = date("Y-m-d H:i:s", strtotime('+24 hours', $date ));
        } 
    else
		{
            
        }



        echo $new_date;

$Currentdate = date("Y-m-d H:i:s" );
if ($new_date > $Currentdate)
{
    echo "test1";
}
else
{
    echo "Current date grater than latest date";
}


?>