<?php 

session_start();

if (!isset($_SESSION['Userid'])) {
	session_destroy();
echo "<div style='margin-top:25%'><p style='text-align:center;font-size:22px'>Invalid Token! <a href='$domain/Logout.php'>Click Here</a> to Login again!</p></div>";

exit;
}

// $current_time = time();

// if ($current_time > $_SESSION['hrm_session_expire']) {
// session_destroy();
// echo "<div style='margin-top:25%'><p style='text-align:center;font-size:22px'>Invalid Token! <a href='$domain/Logout.php'>Click Here</a> to Login again!</p></div>";
// exit;
// }


?>