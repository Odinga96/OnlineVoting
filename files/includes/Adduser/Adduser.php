<?php  
   include_once '../session/session.php';
   include_once '../database/db_connect.php';
   include_once '../uploadfiles/fileupload.php';

   class Add_Admin extends Dbconnect{
   	 private $Name;
   	 private $Idno;
   	 private $Image;
   	 private $Category;
   	 private $Password;
   	 private $Tittle;
   	 private $Region_Type;
   	 private $Region;
   	 private $Description;
   	 private $Email;
   	 private $Phone_Number;
   	 private $Date_Of_Birth;

	   	public function __construct($name, $idno, $image, $category, $password, $tittle, $region_type, $region_name, $description, $email, $phone_number, $date_of_birth)
	   	{
	   		$this->Name=$name;  
	   		$this->Idno=$idno;  
	   		$this->Image=$image;
	   	    $this->Category=$category;  
	   		$this->Password=$password;
	   		$this->Tittle=$tittle;
	   		$this->Region_Type=$region_type;
	   		$this->Region=$region_name;
	   		$this->Description=$description;
	   		$this->Email=$email;
	   		$this->Phone_Number=$phone_number;
	   		$this->Date_Of_Birth=$date_of_birth;
     	}

	   	public function userExists(){
	   		//This function is used to check if user is already in the database
	   		$checkDb="SELECT * FROM Online_voting.Admin WHERE Idno=?";
	   		$run_query=$this->connect()->prepare($checkDb);
	   		$run_query->execute([$this->Idno]);
	   		$row=$run_query->rowCount();
	   		   if ($row>0)
	   		   	return true;
	   		    else
	   		    	return false;
	   	}

	   	public function  MakeNew_Record(){
	   		$insertion_query="INSERT INTO Online_voting.Admin (`Name`, `Idno`, `Password`, `Image`, `Category`, `Tittle`, `Description`, `Region_type`, `Region`, `Email`, `PhoneNumber`, `Dob`) VALUES ('".$this->Name."', '".$this->Idno."', '".$this->Password."', '".$this->Image."', '".$this->Category."', '".$this->Tittle."', '".$this->Description."', '".$this->Region_Type."', '".$this->Region."', '".$this->Email."', '".$this->Phone_Number."', '".$this->Date_Of_Birth."')";

	   		$run_query=$this->connect()->prepare($insertion_query);
	   		  if ($run_query->execute())
	   		  	echo "<script>alert('You sucessfylly added ".$this->Tittle."')</script>";
	   	}

   }

    if (isset($_POST['add'])) 
    {
       $name=$_POST['name'];
       $id=$_POST['id'];
       $image=$_FILES['image']['name'];
       $category=$_POST['categ'];
       $tittle=$_POST['tittle'];
       $reg_type=$_POST['reg_type'];
       $reg=$_POST['region'];
       $description=$_POST['describe'];
       $Mail=$_POST['email'];
       $phone_Number=$_POST['phone'];
       $date=$_POST['date'];

       //image data
       $temporary_location=$_FILES['image']['tmp_name'];
       $Password = password_hash($id,PASSWORD_DEFAULT);
       $directory="../../Admin/".$category."/".$reg_type."/".$Mail;

         $newEntry=new Add_Admin($name, $id, $image, $category, $Password, $tittle, $reg_type, $reg, $description, $Mail, $phone_Number, $date);
         $performUpload=new UploadFile($image,$temporary_location,$directory);

      
	    if (!$newEntry->userExists()){
	       if ($performUpload->upload() == true) 
	         $newEntry->MakeNew_Record();
	   }
	   else{
	   	echo "<script>alert('The user already exists')</script>";
	   	echo "<script>window.open('AdduserPage.php','_self')</script>";
	   }
   }
?>