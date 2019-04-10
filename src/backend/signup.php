<!DOCTYPE html>
<html lang="en" dir="lir">
<head>
</head>
<body>
  <a href="/trek/index.html"><img src="/trek/images/logoSmall115.png" alt="treck logo"></a>
  <h2>Access
  <?php
    require_once"../database/config.php";
    print_r($_POST);
    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error)die($conn->connect_error);
    /* Check user name is alfa numberic before inserting into the data base */
    $cleanUname = " ";
    if(ctype_alnum($_POST['newusername'])){
      $cleanUname = $_POST['newusername'];
    }else{
      echo "Username not alfa numberic";
    }


    $query = "insert into users(userName,userpass,userEmail) values('$cleanUname','$_POST[newuserpass]','$_POST[newuseremail]')";
    $result = $conn->query($query);

    if(!$result)echo"Insert failed: $query<br>" .$conn->error ."<br><br>";
    $conn->close();

  ?><h2>
    <a href="/trek/index.html"><button>BACK</button></a>
</body>
</html>
