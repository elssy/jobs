<?php

session_start();
/**
* Get all user data into database and possibly send a text
*/
class User
{
	private $client, $job_title, $job_description, $amount;

	
	function __construct()
	{
		require_once '../core.php';

		if(isset($_REQUEST['client']) && isset($_REQUEST['job_title']) && isset($_REQUEST['job_description']) && isset($_REQUEST['amount']))
		{
			$this->client           =   $_REQUEST['client'];
			$this->job_title        =   $_REQUEST['job_title'];
			$this->job_description  =   $_REQUEST['job_description'];
			$this->amount		    =   $_REQUEST['amount'];

			# validations
			if(empty($this->client) || empty($this->job_title) || empty($this->job_description) || empty($this->amount))
			{
			  	exit("<h5 style='color:orange'>Please fill all required fields.</h5>");
			}

			
			# get date today
			$date     = date('d-M-Y H:i:s');
			$username = $_SESSION['GuyJob1'];

			

			# insert into database
			$saveQuotation   =  "INSERT INTO `quotation`(`logged`,`date`,`client`,`project`,`description`,`amount`) 
												VALUES('$username','$date','$this->client','$this->job_title','$this->job_description','$this->amount')";

			if(mysql_query($saveQuotation))
			{
					

				            if($saveQuotation)
							{
								
								echo "<h5 style='color:green'><i class='fa fa-check-circle'>Your quotation has been generated.</h5>";
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