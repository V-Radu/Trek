<?php
  /* Start session */
  session_start();

  // Check is session variable SESS_MEMBER_ID is set
  if(!isset($_SESSION['SESS_MEMBER_ID']) || (trim($_SESSION['SESS_MEMBER_ID'])=='')){
    header('location: /trek/index.php');
    exit();
  }

 ?>
