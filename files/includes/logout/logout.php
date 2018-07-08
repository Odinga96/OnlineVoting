<?php 
   include_once '../session/session.php';

   if (isset($_POST['logout'])) {
   	    session_destroy();
   	    session_unset();
   	    header("location: ../../../index.php");
   }
 ?>