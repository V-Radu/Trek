
<?php
  session_start();
  //echo'<a href="/trek/index.html"><img src="/trek/images/logoSmall115.png" alt="treck logo"></a>';
  require_once('../database/config.php');
  //print_r($_POST);
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error)die($conn->connect_error);

  /*Error messages array */
  $errmsg_arr = array();
  $errflag = false;
  /* Check user name is alfa numberic before inserting into the data base */
  function clean($str, $connection) {
		return $connection->real_escape_string($str);
	}
  //Sanitize the POST values
	$fname = clean($_POST['fname'],$conn);
	$lname = clean($_POST['lname'],$conn);
	$login = clean($_POST['uname'],$conn);
  $email = clean($_POST['uemail'],$conn);
	$password = clean($_POST['upass'],$conn);
	$cpassword = clean($_POST['cupass'],$conn);
  $address = clean($_POST['uaddress'],$conn);

	//Input Validations
	if($fname == '') {
		$errmsg_arr[] = 'First name missing';
		$errflag = true;
	}
	if($lname == '') {
		$errmsg_arr[] = 'Last name missing';
		$errflag = true;
	}
	if($login == '') {
		$errmsg_arr[] = 'Login ID missing';
		$errflag = true;
	}
	if($password == '') {
		$errmsg_arr[] = 'Password missing';
		$errflag = true;
	}
	if($cpassword == '') {
		$errmsg_arr[] = 'Confirm password missing';
		$errflag = true;
	}
	if( strcmp($password, $cpassword) != 0 ) {
		$errmsg_arr[] = 'Passwords do not match';
		$errflag = true;
	}
  if($email == ''){
    $errmsg_arr[]= 'Email missing';
    $errflag = true;
  }
  if($address == ''){
    $errmsg_arr[]= 'Address missing';
    $errflag = true;
  }

  //If the input is invalid, redirect back to the registration form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("Location: /trek/index.php");
		exit();
	}

  //Insert new user registration data to the database
  $query = "INSERT INTO users(fname,lname,uname,email,upass,address) VALUES('$fname','$lname','$login','$email','".md5($_POST['upass'])."','$address')";
  $result = $conn->query($query);

  //UserID and user name are the primary key of shopping carts
  $query = "SELECT userID FROM users WHERE uname='$login';";
  $result = $conn->query($query);



  if(!$result)echo'"Insert failed: $query<br>" .$conn->error ."<br><br>"';
  $conn->close();
  header("Location: /trek/index.php");
  
?>
