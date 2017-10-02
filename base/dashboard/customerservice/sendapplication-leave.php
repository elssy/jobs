<?php

session_start();
require_once '../functions.php';
/**
* Get all user data into database and possibly send a text
*/
class User
{
	private $leaveType, $dates, $dates1,$substitute;

	
	function __construct()
	{
		require_once '../core.php';
		

		if(isset($_REQUEST['leaveType']) && isset($_REQUEST['dates']) && isset($_REQUEST['dates1']) && isset($_REQUEST['substitute']))
		{	
			$this->leaveType   	=   $_REQUEST['leaveType'];
			$this->dates     	=   $_REQUEST['dates'];
			$this->dates1    	=   $_REQUEST['dates1'];
			$this->substitute   =   $_REQUEST['substitute'];
			
			# validations
			if(empty($this->leaveType) || empty($this->dates) || empty($this->dates1)  ||  empty($this->substitute))
			{
			  	exit("<h5 style='color:orange'>Please fill all required fields.</h5>");
			}

			
			# get date today
			$date     	   = date('d-M-Y H:i:s');
			$username          = $_SESSION['GuyJob2'];

			$already_applied = getByData('users','username',$username,$this->leaveType);

			#finding days applied for
			$start_date  = strtotime($this->dates);
			$end_date    = strtotime($this->dates1);

			$applieddays = ceil(abs($end_date - $start_date) / 86400);
			$remainder = 0;
			$leave_days_update = $already_applied + $applieddays;

			#finding remaining time for leave applied for
			if ($this->leaveType == 'annual') {

				$remainder = 21 - ($applieddays + $already_applied);

			}else if ($this->leaveType == 'maternity') {

				$remainder = 90 - ($applieddays + $already_applied);

			} else if ($this->leaveType == 'partenity') {

				$remainder = 14 - ($applieddays + $already_applied);

			} else if ($this->leaveType == 'sickoff') {

				$remainder = 30 - ($applieddays + $already_applied);
			}

			if($remainder >= 0){
				# insert into database
				$saveApplication   =  "INSERT INTO `leave`(`date`,`username`,`start_date`,`end_date`,`appliedDays`, `remainder`, `substitute`, `type`, `status`) 
													VALUES('$date','$username','$this->dates','$this->dates1','$applieddays','$remainder','$this->substitute','$this->leaveType','pending')";
				# Update days
				mysql_query("UPDATE `users` SET $this->leaveType = '$leave_days_update' WHERE `username`='$username'");
			}else{
				echo "remain at work";
			}

			if(mysql_query($saveApplication))
			{	
				echo "<h5 style='color:green'><i class='fa fa-check-circle'>Your application has been sent.</h5>";
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