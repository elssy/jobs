<?php

session_start();
/**
* Get all user data into database and possibly send a text
*/
class User
{
	private $amount, $reason;

	
	function __construct()
	{
		require_once '../core.php';

		if(isset($_REQUEST['amount']) && isset($_REQUEST['reason']))
		{
			$this->amount          =   $_REQUEST['amount'];
			$this->reason          =   $_REQUEST['reason'];

			# validations
			if(empty($this->amount) || empty($this->reason))
			{
			  	exit("<h5 style='color:orange'>Please fill all required fields.</h5>");
			}

			
			# get date today
			$date     = date('d-M-Y H:i:s');

			$username = $_SESSION['GuyJob5'];

			# insert into database
			$saveApplication   =  "INSERT INTO `advance`(`date`,`username`,`amount`,`reason`,`status`) 
												VALUES('$date','$username','$this->amount','$this->reason','pending')";

			if(mysql_query($saveApplication))
			{
					

				            if($saveApplication)
							{
								
								echo "<h5 style='color:green'><i class='fa fa-check-circle'>Your application has been sent.</h5>";
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