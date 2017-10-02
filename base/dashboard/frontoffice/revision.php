<?php

session_start();
/**
* Get all user data into database and possibly send a text
*/
class User
{
	private  $id, $job_title, $job_description, $amount;

	
	function __construct()
	{
		require_once '../core.php';

		if( isset($_REQUEST['id']) &&  isset($_REQUEST['job_title']) && isset($_REQUEST['job_description']) && isset($_REQUEST['amount']))
		{
			$this->id               =   $_REQUEST['id'];
			$this->job_title        =   $_REQUEST['job_title'];
			$this->job_description  =   $_REQUEST['job_description'];
			$this->amount		    =   $_REQUEST['amount'];

			
			# get date today
			$date     = date('d-M-Y H:i:s');
			$logged   = $_SESSION['GuyJob1'];

			# insert into database
			$update  = "UPDATE `quotation` SET `logged`='$logged',`project`='$this->job_title',`description`='$this->job_description', `amount` = '$this->amount' WHERE `id`='$this->id'";
			if(mysql_query($update))
			{
					

				            if($update)
							{
								
								echo "<h5 style='color:green'><i class='fa fa-check-circle'>Your quotation has been updated.</h5>";
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