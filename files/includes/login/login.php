<?php
include_once '../session/session.php';
include_once '../database/db_connect.php';

 class Login extends Dbconnect{
    private $username;
    private $password;
    private $email;

	public function __construct($user_name, $password, $email){
		$this->username=$user_name;
		$this->password=$password;
		$this->email=$email;
	}

	public function Validate(){
			$query ="SELECT * FROM Online_voting.Admin WHERE Name=? OR email=?";
			$run_query=$this->connect()->prepare($query);
			$run_query->execute([$this->username,$this->email]);

			if ($run_query->rowCount()<1) {
				echo "<script>alert('Username or email not found')</script>";
				echo "<script>window.open('loginPage.php','_self')</script>";
			}else{

				if($row = $run_query->fetch(PDO::FETCH_ASSOC)){
					$dehash_Password=password_verify($this->password,$row['Password']);

					if($dehash_Password==false){
						echo "<script>alert('Username or Password Incorrect')</script>";
						echo "<script>window.open('loginPage.php','_self')</script>";
					}							
					elseif($dehash_Password==true){
							$_SESSION['username']=$row['Name'];
							$_SESSION['image']=$row['Image'];
							$_SESSION['title']=$row['Tittle'];

							 header("location: ../../Admin/".$row['Category']."/".$row['Region_type']."/".$row['Email']."/".strtolower($_SESSION['title']).".php?logged in Successfully");

							}

				}
			}

	}

	public function __destruct(){}
}

if (isset($_POST['login'])) {
	$Name=$_POST['username'];
	$Password=$_POST['User_password'];

	$newLogin=new Login($Name,$Password,$Name);
	$newLogin->Validate();

}
?>