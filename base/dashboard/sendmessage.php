<?php

session_start();
/**
* Get all user data into database and possibly send a text
*/
class User
{
	private $message;

	
	function __construct()
	{
		require_once 'core.php';

		if(isset($_REQUEST['message']))
		{	
			$this->message	=   $_REQUEST['message'];
			
			# validations
			if(empty($this->message))
			{
			  	exit("<h5 style='color:orange'>Please fill all required fields.</h5>");
			}

			
			# get date today
			$date     	   = date('d-M-Y H:i:s');
			$info          = mysql_query("SELECT * FROM `users` WHERE `username`='{$_SESSION['GuyJob3']}'");
			$fetchid       = mysql_fetch_array($info);

			


			# insert into database
			$saveMessage   =  "INSERT INTO `chats`(`username`,`message`,`time`) 
												VALUES('$fetchid','$this->messsage','$date')";

			if(mysql_query($saveMessage))
			{
					
				echo '<script type="text/javascript">location.reload(true);</script>';
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