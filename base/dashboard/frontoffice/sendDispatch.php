<?php

session_start();
/**
* Get all user data into database and possibly send a text
*/
class User
{
	private $client, $dispatchType, $item, $location;

	
	function __construct()
	{
		require_once '../core.php';

		if(isset($_REQUEST['client']) && isset($_REQUEST['dispatchType']) && isset($_REQUEST['item']) && isset($_REQUEST['location']))
		{
			$this->client       =   $_REQUEST['client'];
			$this->dispatchType =   $_REQUEST['dispatchType'];
			$this->item 		=   $_REQUEST['item'];
			$this->location     =   $_REQUEST['location'];

			# validations
			if(empty($this->client) || empty($this->dispatchType) || empty($this->item) || empty($this->location))
			{
			  	exit("<h5 style='color:orange'>Please fill all required fields.</h5>");
			}

			
			# get date today
			$date     = date('d-M-Y H:i:s');

			$username = $_SESSION['GuyJob1'];

			# insert into database
			$saveApplication   =  "INSERT INTO `dispatch`(`date`,`username`,`client`,`type`,`item`,`location`, `status`) 
												VALUES('$date','$username','$this->client','$this->dispatchType','$this->item','$this->location','Enroute')";

			if(mysql_query($saveApplication))
			{
					

				            if($saveApplication)
							{
								
								echo "<h5 style='color:green'><i class='fa fa-check-circle'>Your delivery has been sent.</h5>";
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