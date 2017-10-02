<?php

session_start();
require_once 'functions.php';
/**
* Get all user data into database and possibly send a text
*/
class User
{
	private $user, $grosspay, $commission, $sacco, $loan;

	
	function __construct()
	{
		require_once '../core.php';

		if(isset($_REQUEST['user']) && isset($_REQUEST['grosspay']) && isset($_REQUEST['commission']) && isset($_REQUEST['sacco']) 
		 && isset($_REQUEST['loan']))
		{ 
			$this->user            =   $_REQUEST['user'];
			$this->grosspay        =   $_REQUEST['grosspay'];
			$this->commission      =   $_REQUEST['commission'];
			$this->sacco           =   $_REQUEST['sacco'];
			$this->loan            =   $_REQUEST['loan'];


			# validations
			if(empty($this->user) || empty($this->grosspay)  || empty($this->sacco))
			{
			  	exit("<h5 style='color:orange'>Please fill all required fields.</h5>");
			}

			
			# get date today
			$date     = date('d-M-Y H:i:s');
			$username = $_SESSION['GuyJob3'];

			$query    = mysql_query("SELECT * FROM `advance` WHERE `username`='$this->user'");
			$info     = mysql_fetch_array($query);
			$advance  = $info['amount'];

			$nssf     = 1080;

			if (($this->grosspay) >= 100000) {

				$nhif = 1700;

			} else if (($this->grosspay >= 90000) && ($this->grosspay <= 90000)) {

				$nhif = 1600;

			} else if (($this->grosspay >= 80000) && ($this->grosspay <= 89999)) {

				$nhif = 1500;

			} else if (($this->grosspay >= 70000) && ($this->grosspay <=769999)) {

				$nhif = 1400;

			} else if (($this->grosspay >= 60000) && ($this->grosspay <= 69999)) {

				$nhif = 1300;

			} else if (($this->grosspay >= 50000) && ($this->grosspay <= 59999)) {

				$nhif = 1200;

			} else if (($this->grosspay >= 45000) && ($this->grosspay <= 49999)) {

				$nhif = 1100;

			} else if (($this->grosspay >= 40000) && ($this->grosspay <= 44999)) {

				$nhif = 1000;

			} else if (($this->grosspay >= 35000) && ($this->grosspay <= 39999)) {

				$nhif = 950;

			} else if (($this->grosspay >= 30000) && ($this->grosspay <= 34999)) {

				$nhif = 900;

			} else if (($this->grosspay >= 25000) && ($this->grosspay <= 29999)) {

				$nhif = 850;

			} else if (($this->grosspay >= 20000) && ($this->grosspay <= 24999)) {

				$nhif = 750;

			} else if (($this->grosspay >= 15000) && ($this->grosspay <= 19999)) {

				$nhif = 600;

			} else if (($this->grosspay >= 12000) && ($this->grosspay <= 14999)) {

				$nhif = 500;

			} else if (($this->grosspay >= 8000) && ($this->grosspay <= 11999)) {

				$nhif = 400;

			} else if (($this->grosspay >= 6000) && ($this->grosspay <= 7999))  {

				$nhif = 300;

			} else if (($this->grosspay >= 0) && ($this->grosspay <= 5999)) {

				$nhif = 150;

			} else {
				$nhif = 500;
			}

			$deduction   = $nssf + $nhif + $advance + $this->loan + $this->sacco;

			$income      = $this->grosspay + $this->commission;

			$netpay      = $income - $deduction;

			$paye        = calculatepayee($this->grosspay);


			# insert into database
			$savePayroll   =  "INSERT INTO `payroll`(`date`,`name`,`grosspay`,`commission`,`nhif`,`nssf`,`paye`,`sacco`,`advance`,`loan`,`netpay`,`status`) 
												VALUES('$date','$this->user','$this->grosspay','$this->commission','$nhif','$nssf','$paye','$this->sacco','$advance','$this->loan','$netpay','Pending')";

			if(mysql_query($savePayroll))
			{
				
				echo "<h5 style='color:green'><i class='fa fa-check-circle'>Payroll has been submitted.</h5>";
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