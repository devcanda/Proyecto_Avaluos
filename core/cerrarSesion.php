<?php
session_start();
 if(!isset($_SESSION) || empty($_SESSION))
 {
	header ("Location: ../index.php");
 }
 else
 {
	  session_unset();
	  session_destroy();
	  header("location: ../index.php");
      
  }

  
  
?>