<?php

session_start();
/**
* Get all user data into database and possibly send a text
*/
class User
{
          
	private $id, $client, $receivingJob, $job, $description, $expected_output, $final_output, $delivery, $options, $payment;
		
	function __construct()
	{
		require_once '../core.php';

		if(isset($_REQUEST['id']) && isset($_REQUEST['client']) && isset($_REQUEST['receivingJob']) && isset($_REQUEST['job']) && isset($_REQUEST['description']) && isset($_REQUEST['expected_output']) && isset($_REQUEST['final_output']) && isset($_REQUEST['delivery']) && isset($_REQUEST['options']) && isset($_REQUEST['payment']))
		{
			$this->id        	   =   $_REQUEST['id'];
			$this->client    	   =   $_REQUEST['client'];
			$this->receivingJob    =   $_REQUEST['receivingJob'];
			$this->job             =   $_REQUEST['job'];
			$this->description     =   $_REQUEST['description'];
			$this->expected_output =   $_REQUEST['expected_output'];
			$this->final_output    =   $_REQUEST['final_output'];
			$this->delivery        =   $_REQUEST['delivery'];
			$this->options         =   $_REQUEST['options'];
			$this->payment         =   $_REQUEST['payment'];

			# validations
			if(empty($this->client) || empty($this->receivingJob) || empty($this->job) || empty($this->description) || empty($this->expected_output) || empty($this->payment))
			{
			  	exit("<h5 style='color:orange'>Please fill all required fields.</h5>");
			}

			
			# get date today
			$date     = date('d-M-Y H:i:s');

			$jobs = "";

			foreach ($this->receivingJob as $key => $value) {
				$jobs .=  $value.",";
			}

			$logged = $_SESSION['GuyJob6'];

			if ($this->options =="Outsource") {

				mysql_query("INSERT INTO `outsource`(`date`,`job`, `done_by`) 
												VALUES('$date','$this->job','$logged')") ;

			} else if($this->options =="Outsource" || "Insource") {


					# insert into database
					$saveJob   =  "INSERT INTO `jobs`(`date`,`client`,`receivedJob`,`job`,`description`,`expected_output`, `final_output`,``bookedby,`delivery_option`, `modeOfPayment`,`status`) 
														VALUES('$date','$this->client','$jobs','$this->job','$this->description', '$this->expected_output' , '$this->final_output' , '$logged', '$this->delivery','$this->payment','Ongoing')";

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
}

# new order
$order = new User();

?>