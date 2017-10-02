<?php

session_start();
/**
* Get all user data into database and possibly send a text
*/
class UserLogin
{
	private $username, $account_type, $password;

	
	function __construct()
	{
		require_once 'core.php';

		if(isset($_POST['username']) && isset($_POST['account_type']) && isset($_POST['password']))
		{
			$this->username         =   $_POST['username'];
			$this->account_type     =   $_POST['account_type'];
			$this->password         =   $_POST['password'];

			

			$encpass  = sha1($this->password);

			#verify username
			# The place you have written `$this->account_type`='$account_type' should be `account_type`='$this->account_type' or somethinf
			$verify_account = mysql_query("SELECT * FROM `users` WHERE `username`='$this->username' && `account_type`='$this->account_type' && `password`='$encpass'");

			if(mysql_num_rows($verify_account) == 1)
			{
				

				# you have to attach this to a variable
				$account_type_attach = strtolower($this->account_type);

				if($account_type_attach == "admin"){
					$_SESSION['GuyJob'] = $this->username;
        			header("location:admin");
            		//exit();
			      }
			      else if($account_type_attach == "frontoffice"){
			      	$_SESSION['GuyJob1'] = $this->username;
			  		header("location:frontoffice");
			        //exit();
			     }
			      else if($account_type_attach == "customerservice"){
			      	 $_SESSION['GuyJob2'] = $this->username;
			 		 header("location:customerservice");
			        //exit();
			     }
			      else if($account_type_attach == "finance"){
			      	$_SESSION['GuyJob3'] = $this->username;
			  		header("location:finance");
			        //exit();
			     }
			      

			     else if($account_type_attach == "dispatch"){
			      	 $_SESSION['GuyJob4'] = $this->username;
			 		 header("location:dispatch");
			        //exit();
			     }
			     else if($account_type_attach == "qualitycontrol"){
			      	 $_SESSION['GuyJob5'] = $this->username;
			 		 header("location:qualitycontrol");
			        //exit();
			     }
			      else if($account_type_attach == "design"){
			      	 $_SESSION['GuyJob6'] = $this->username;
			 		 header("location:design");
			        //exit();
			     }
			      else if($account_type_attach == "production"){
			      	 $_SESSION['GuyJob7'] = $this->username;
			 		 header("location:production");
			        //exit();
			     }
			      else if($account_type_attach == "sales"){
			      	 $_SESSION['GuyJob8'] = $this->username;
			 		 header("location:sales");
			        //exit();
			     }

			}else{
				header("location:index.php?getmsg=Email, Account Type or Password do not match any record!");
			}
		}
	}
}

# new order
$order = new UserLogin();

?>