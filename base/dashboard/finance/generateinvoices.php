<?php

session_start();
/**
* Get all user data into database and possibly send a text
*/
class User
{
	private $client, $lpo,$terms,$dates,$job_title,$quantity, $price, $amount;

	
	function __construct()
	{
		require_once '../core.php';

		if(isset($_REQUEST['client']) && isset($_REQUEST['lpo']) && isset($_REQUEST['terms']) && isset($_REQUEST['dates'])  
			&& isset($_REQUEST['job_title']) && isset($_REQUEST['quantity']) && isset($_REQUEST['price']))
		{
			$this->client           =   $_REQUEST['client'];
			$this->lpo              =   $_REQUEST['lpo'];
			$this->terms            =   $_REQUEST['terms'];
			$this->dates            =   $_REQUEST['dates'];
			$this->job_title        =   $_REQUEST['job_title'];
			$this->quantity         =   $_REQUEST['quantity'];
			$this->price		    =   $_REQUEST['price'];

			# validations
			if(empty($this->client) || empty($this->lpo) || empty($this->terms) || empty($this->dates)|| empty($this->job_title) || empty($this->quantity) || empty($this->price))
			{
			  	exit("<h5 style='color:orange'>Please fill all required fields.</h5>");
			}

			
			# get date today
			$date     = date('d-M-Y H:i:s');
			$username = $_SESSION['GuyJob3'];

			$subtotal = $this->price * $this->quantity;
			$tax      = $subtotal * 16/100;
			$total    = $subtotal + $tax;
			

			# insert into database
			$saveInvoice   =  "INSERT INTO `invoice`(`logged`,`date`,`due_date`,`name`,`lpono`,`terms`,`job`,`quantity`,`price`, `subtotal`,`tax`,`total_amount`) 
												VALUES('$username',$date','$this->dates','$this->client','$this->lpo','$this->terms','$this->job_title','$this->quantity','$this->price','$subtotal', '$tax','$total')";

			if(mysql_query($saveInvoice))
			{
					

				            if($saveInvoice)
							{
								
								echo "<h5 style='color:green'><i class='fa fa-check-circle'>Your invoice has been generated.</h5>";
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