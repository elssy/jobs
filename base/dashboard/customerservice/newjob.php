<?php

session_start();
/**
* Get all user data into database and possibly send a text
*/
class User
{
	private $client, $receivingJob, $job, $description, $expected_output, $user, $modeOfPayment ;
		
	function __construct()
	{
		require_once '../core.php';

		if(isset($_REQUEST['client']) && isset($_REQUEST['receivingJob']) && isset($_REQUEST['job']) && isset($_REQUEST['description']) && isset($_REQUEST['expected_output']) && isset($_REQUEST['user']) && isset($_REQUEST['modeOfPayment']))
		{
			$this->client    	   =   $_REQUEST['client'];
			$this->receivingJob    =   $_REQUEST['receivingJob'];
			$this->job             =   $_REQUEST['job'];
			$this->description     =   $_REQUEST['description'];
			$this->expected_output =   $_REQUEST['expected_output'];
			$this->user 		   =   $_REQUEST['user'];
			$this->modeOfPayment   =   $_REQUEST['modeOfPayment'];

			# validations
			if(empty($this->client) || empty($this->receivingJob) || empty($this->job) || empty($this->description) || empty($this->expected_output) || empty($this->user) || empty($this->modeOfPayment))
			{
			  	exit("<h5 style='color:orange'>Please fill all required fields.</h5>");
			}

			
			# get date today
			$date     = date('d-M-Y H:i:s');

			$jobs = "";

			foreach ($this->receivingJob as $key => $value) {
				$jobs .=  $value.",";
			}

			$logged = $_SESSION['GuyJob2'];


			# insert into database
			$saveJob   =  "INSERT INTO `jobs`(`date`,`client`,`receivedJob`,`job`,`description`,`expected_output`, `user`,`bookedby`, `modeOfPayment`,`status`) 
												VALUES('$date','$this->client','$jobs','$this->job','$this->description', '$this->expected_output' , '$this->user' , '$logged', '$this->modeOfPayment','Assigned')";

			if(mysql_query($saveJob))
			{
					

				echo "<font color='green'><i class='fa fa-check-circle'></i> Job submitted Successful</font>";
							
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