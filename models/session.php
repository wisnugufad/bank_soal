<?php 

    SESSION_START();
    if ($_SESSION["username"] === null) {
      session_unset();
      session_destroy();
      header('location: ../index.php');
    }

    if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
      // last request was more than 30 minutes ago
      session_unset();     // unset $_SESSION variable for the run-time 
      session_destroy();   // destroy session data in storage
      header('location: ../index.php');
    }
    
    $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp

?>