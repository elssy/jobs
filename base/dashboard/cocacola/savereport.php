<?php

session_start();
/**
* Get all user data into database and possibly send a text
*/
class User
{
	private $country,$project,$brand,$flavour,$packtype,$remarks;
          

	
	function __construct()
	{
		require_once '../core.php';

		if(isset($_REQUEST['country']) && isset($_REQUEST['project']) && isset($_REQUEST['brand']) && isset($_REQUEST['flavour']) && isset($_REQUEST['packtype']) && isset($_REQUEST['remarks']))
		{
			$this->country    =   $_REQUEST['country'];
			$this->project    =   $_REQUEST['project'];
			$this->brand      =   $_REQUEST['brand'];
			$this->flavour    =   $_REQUEST['flavour'];
			$this->packtype   =   $_REQUEST['packtype'];
			$this->remarks    =   $_REQUEST['remarks'];

			# validations
			if(empty($this->country) || empty($this->project) || empty($this->brand) || empty($this->flavour) || empty($this->packtype) || empty($this->remarks))
			{
			  	exit("<h5 style='color:orange'>Please fill all required fields.</h5>");
			}

			
			# get date today
			$date     = date('d-M-Y H:i:s');

			$username = $_SESSION['GuyJob6'];

			# insert into database
			$saveReport   =  "INSERT INTO `cocacola`(`date`,`country`,`project`,`brand`,`flavour`, `packtype`, `remarks`, `report_by`) 
												VALUES('$date','$this->country','$this->project','$this->brand','$this->flavour','$this->packtype','$this->remarks','$username')";

			if(mysql_query($saveReport))
			{
					
				echo "<h5 style='color:green'><i class='fa fa-check-circle'>Your report has been saved.</h5>";
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