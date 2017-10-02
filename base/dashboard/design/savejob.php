<?php

session_start();
/**
* Get all user data into database and possibly send a text
*/
class User
{
	private $id, $job, $options, $final_output, $delivery ;
		
	function __construct()
	{
		require_once '../core.php';

		if(isset($_REQUEST['id']) && isset($_REQUEST['job']) && isset($_REQUEST['options']) && isset($_REQUEST['final_output']) && isset($_REQUEST['delivery']))
		{
			$this->id        	   =   $_REQUEST['id'];
			$this->job        	   =   $_REQUEST['job'];
			$this->options    	   =   $_REQUEST['options'];
			$this->final_output    =   $_REQUEST['final_output'];
			$this->delivery        =   $_REQUEST['delivery'];
			

			# validations
			if(empty($this->options) || empty($this->delivery))
			{
			  	exit("<h5 style='color:orange'>Please fill all required fields.</h5>");
			}

			
			# get date today
			$date     = date('d-M-Y H:i:s');
			$logged = $_SESSION['GuyJob6'];


			# insert into database
			if ($this->options =='outsource') {

				mysql_query("INSERT INTO `outsource`(`date`,`job`, `done_by`) 
												VALUES('$date','$this->job','$logged')") ;

					
			} else{

				$saveJob = "UPDATE `jobs` SET `final_output`='$this->final_output', `delivery_option`='$this->delivery', `status`='Ongoing' WHERE `id`='$this->id'";

				if(mysql_query($saveJob))
							{
									

								echo "<font color='green'><i class='fa fa-check-circle'></i> Your job has been submitted.</font>";
											
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