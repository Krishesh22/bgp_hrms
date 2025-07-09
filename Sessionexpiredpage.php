<?php

  include 'config.php';
  session_destroy();
  echo "<div style='margin-top:25%'><p style='text-align:center;font-size:22px'>Your session has been expired! <a href='$domain/Logout.php'>Click Here</a> to Login again!</p></div>";
?>