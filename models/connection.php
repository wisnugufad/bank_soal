<?php 

    $connect = mysqli_connect('localhost','root','','bank_soal');
    
    if (!$connect) {
      echo 'connection time out';
    } 
?>