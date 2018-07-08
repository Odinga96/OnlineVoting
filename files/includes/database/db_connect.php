<?php
    class Dbconnect
    {
    	private $servername;
    	private $user_Name;
    	private $password;
    	private $database_Name;
    	private $charset;
    	
      protected function connect()
      {
      	$this->servername="127.0.0.1";
      	$this->user_Name="root";
      	$this->password="";
      	$this->database_Name="Online_voting";
      	$this->charset="utf8mb4";

      	   try {
      	   	$dsn="mysql:host=".$this->servername.";dbname=".$this->database_Name.";charset=".$this->charset;
      	   	$pdo=new PDO($dsn,$this->user_Name,$this->password);
      	   	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      	   	return $pdo;   

      	   } catch (Exception $e) {
      	   	 echo "Could not connect ".$e->getMessage();
      	   }
      }
    }  

?>