<?php


// class User
// {
//   public function login($request)
//   {
    include('./connection.php');
    $sql = "SELECT * FROM user WHERE username='' AND password=''";
    $result = mysqli_query($connect,$sql);
//   }
// }
  
?>