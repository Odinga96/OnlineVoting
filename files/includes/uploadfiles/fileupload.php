<?php

class UploadFile{
   private $name_Of_File;
   private $location;
   private $dir;
	function __construct($File_Name,$temporary_location,$directory)
	{
		$this->name_Of_File=$File_Name;
		$this->location=$temporary_location;
		$this->dir=$directory;

        //create a directory if it does not exist
		if (!is_dir($this->dir))
			mkdir($this->dir);
	}

	function upload(){
		   
	   	    $target_file=$this->dir."/".basename($this->name_Of_File);
	   		$fileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	   		$check_condition;
             
	   		 	if (file_exists($target_file)){
	   		 		echo "<script>alert('file already exists  please choose a new file')</script>";
	   		 		echo "<script>window.open('../Adduser/AdduserPage.php','_self')</script>";
	   		 		$check_condition=false;
	   		 	}
	   		 	 else if($fileType != "jpeg" && $fileType != "jpg"){

	   		 	 	echo "<script>alert('only photos of type jpg or jpeg are allowed not ".$fileType."')</script>";
	   		 	 	echo "<script>window.open('../Adduser/AdduserPage.php','_self')</script>";
	   		 	 	$check_condition=false;

	   		 	 }
	   		 	 else if(move_uploaded_file($this->location, $target_file))
	   		 	   $check_condition=true;

	   		 	  else{
	   		 	  	echo "<script>alert('Error occured ".$fileType."')</script>";
	   		 	  	echo "<script>window.open('../Adduser/AdduserPage.php','_self')</script>";
	   		 	 	$check_condition=false;
	   		 	}

	   		 	return $check_condition;	
	   		 }
} 
?>