<?php
  //session_start();
  //echo'<a href="/trek/index.html"><img src="/trek/images/logoSmall115.png" alt="treck logo"></a>';
  require_once('config.php');
  //print_r($_POST);
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error)die($conn->connect_error);

  $username = $_GET["usr"];
  $query = "SELECT count(*) as usersCnt FROM users WHERE uname='".$username."' ";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_array($result);
  $count = $row['usersCnt'];
  // if user name in Database
  if ($count > 0){
    echo(1);
  }else{
    echo(0);
  }

?>
