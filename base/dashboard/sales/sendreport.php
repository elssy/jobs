<?php

session_start();
/**
* Get all user data into database and possibly send a text
*/
class User
{
	private $client, $description, $comments,$dates,$prospective;

	
	function __construct()
	{
		require_once '../core.php';

		if(isset($_REQUEST['client']) && isset($_REQUEST['description']) && isset($_REQUEST['comments']) && isset($_REQUEST['dates']) && isset($_REQUEST['prospective']))
		{	
			$this->client   		=   $_REQUEST['client'];
			$this->description     	=   $_REQUEST['description'];
			$this->comments    		=   $_REQUEST['comments'];
			$this->dates   			=   $_REQUEST['dates'];
			$this->prospective   	=   $_REQUEST['prospective'];
			
			# validations
			if(empty($this->client) || empty($this->description) || empty($this->comments)  ||  empty($this->dates) ||  empty($this->prospective))
			{
			  	exit("<h5 style='color:orange'>Please fill all required fields.</h5>");
			}

			
			# get date today
			$date     	   = date('d-M-Y H:i:s');
			$username      = $_SESSION['GuyJob8'];

			


			# insert into database
			$saveReport   =  "INSERT INTO `sales_report`(`date`,`logged`,`client`,`description_meeting`,`follow_up`, `comments`, `prospective`) 
												VALUES('$date','$username','$this->client','$this->description','$this->dates','$this->comments','$this->prospective')";

			if(mysql_query($saveReport))
			{
					
				echo "<h5 style='color:green'><i class='fa fa-check-circle'>Your report has been saved.</h5>";
			} 
			else {
				echo mysql_error();
			}
		}
	}
}

# new order
$order = new User();

?>