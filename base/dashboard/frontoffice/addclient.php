<?php

session_start();
/**
* Get all user data into database and possibly send a text
*/
class User
{
	private $name, $phone, $email, $address, $town;

	
	function __construct()
	{
		require_once '../core.php';

		if(isset($_REQUEST['name']) && isset($_REQUEST['phone']) && isset($_REQUEST['email']) && isset($_REQUEST['address']) && isset($_REQUEST['town']))
		{
			$this->name    =   $_REQUEST['name'];
			$this->phone   =   $_REQUEST['phone'];
			$this->email   =   $_REQUEST['email'];
			$this->address =   $_REQUEST['address'];
			$this->town    =   $_REQUEST['town'];

			# validations
			if(empty($this->name) || empty($this->phone) || empty($this->email) || empty($this->address) || empty($this->town))
			{
			  	exit("<h5 style='color:orange'>Please fill all required fields.</h5>");
			}

			
			# get date today
			$date     = date('d-M-Y H:i:s');
			$logged   = $_SESSION['GuyJob1'];

			# insert into database
			$saveClient   =  "INSERT INTO `client`(`logged`,`date`,`name`,`phone`,`email`,`address`,`location`) 
												VALUES('$logged','$date','$this->name','$this->phone','$this->email','$this->address', '$this->town')";

			if(mysql_query($saveClient))
			{
					

				            if($saveClient)
							{
								
								echo "<h5 style='color:green'><i class='fa fa-check-circle'>The client has been added.</h5>";
							}
			} 
			else {
				mysql_error();
			}
		}
	}
}

# new order
$order = new User();

?>