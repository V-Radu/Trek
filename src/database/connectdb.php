<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
</head>
<body>
<a href="/trek/index.html"><img src="/trek/images/logoSmall115.png" alt="treck logo"></a>
<?php // config.php
  $hn = 'localhost';
  $db = 'trek';
  $un = 'root';
  $pw = '';

  $con = new mysqli($hn, $un, $pw, $db);
  if ($con->connect_error)die($con->connect_error);
  echo "Connected ok";
  $query = "Select * from users";
  $result = $con->query($query);
  $row = $result->num_rows;
  for ($j=0; $j < $row; $j++)
    {
      $result->data_seek($j);
      echo 'Username: ' .$result->fetch_assoc()['userName'].'<br>';
      $result->data_seek($j);
      echo 'Password: ' .$result->fetch_assoc()['userpass'].'<br>';
      $result->data_seek($j);
      echo 'Email: ' .$result->fetch_assoc()['userEmail'].'<br><br>';

    }
  $result->close();
  $con->close();
?>
</body>
</html>
