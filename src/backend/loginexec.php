<?php

  // Start session
  session_start();
  // Database login details
  require_once('../database/config.php');

  //Array to store validation error messages
  $errmsg_arr = array();

  //Validation error flag
  $errflag = false;

  //Connect to mysql server
  $conn = new mysqli($hn, $un, $pw, $db);

  if($conn->connect_error)die($conn->connect_error);
  //Function to sanitize user inputs
  function clean($input, $connection){
    return $connection->real_escape_string($input);
  }

  // Clean the POST input
  $login = clean($_POST['username'], $conn);
  $password = clean($_POST['password'], $conn);

  //Input validation
  if($login==''){
    $errmsg_arr = "User name is missing";
    $errflag = true;
  }
  if($password==''){
    $errmsg_arr = "Password is missing";
    $errflag = true;
  }

  //If there are errors redirect to login page
  if($errflag){
    $_SESSION['ERRMSG_ARR']=$errmsg_arr;
    session_write_close();
    header('Location: /trek/index.php');
    exit();
  }

  //Create query to get the user details from the Database
  $hashpass = md5($password);
  $query = "SELECT * FROM users WHERE uname='$login' AND upass='$hashpass';";

  $result = $conn->query($query);
  if(!$result)die("Database access failed: ". $conn->error);

  //Check is the query successfuly returned the user details
  if($result->num_rows==1){
      //Login successful
      session_regenerate_id();
      $member = $result->fetch_array(MYSQLI_ASSOC);
      $_SESSION['SESS_MEMBER_ID'] = $member['userID'];
      $_SESSION['SESS_FNAME'] = $member['fname'];
      $_SESSION['SESS_LNAME'] = $member['lname'];
      $_SESSION['UNAME'] = $member['uname'];
      header('location: /trek/src/frontend/memberpage.php');
      exit();
  }else{
    //Login failed
    //header('location: /trek/index.php');

    header('location: /trek/index.php');
    
    exit();
  }
?>
