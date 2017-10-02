<?php


session_start();
/**
* Get all user data into database and possibly send a text
*/
class User
{
	private $id, $reason;

	
	function __construct()
	{
		require_once '../core.php';

		if(isset($_REQUEST['id']) && isset($_REQUEST['reason']))
		{
			$this->id          =   $_REQUEST['id'];
			$this->reason      =   $_REQUEST['reason'];

			# validations
			if(empty($this->id) || empty($this->reason))
			{
			  	exit("<h5 style='color:orange'>Please fill all required fields.</h5>");
			}

			
			# get date today
			$date     = date('d-M-Y H:i:s');

			$username = $_SESSION['GuyJob7'];

			# insert into database
			 $sql = mysql_query("UPDATE `jobs` SET `status`='Cancelled', `reason`='$this->reason', `date`='$date'  WHERE `id` ='$this->id'");

			if(mysql_query($sql))
			{
				
				echo "<h5 style='color:green'><i class='fa fa-check-circle'>Job cancelled</h5>";
							
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