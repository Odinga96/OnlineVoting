<?php
   include_once 'db_connect.php';
   class Eshtablish_Database extends Dbconnect{

   	  function __construct(){
   	  	$this->connect();
   	  }
   }
?>