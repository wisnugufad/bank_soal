<?php 

  include('./connection.php');

  if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = MYSQLI_QUERY($connect,$sql);
    $row = MYSQLI_FETCH_ARRAY($result);

    if (!$result || count($row) < 1) {
        header('location: ../index.php');
    }else{

        SESSION_START();
        $_SESSION["username"] = $row['username'];
        header('location: ../page/home.php');
    }    
  }

?>