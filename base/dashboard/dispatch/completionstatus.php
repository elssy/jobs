<?php
session_start();

require_once '../core.php';
	

    # get date today
 	$date     = date('d-M-Y H:i:s');

    $sql = mysql_query("UPDATE `dispatch` SET `status`='Completed', `date_completed`='$date'  WHERE `id` ='{$_GET['id']}'");

       if ($sql) {

       		$query1 = mysql_query("SELECT * FROM `jobs` WHERE `id` ='{$_GET['id']}'");
       		$rdata  = mysql_fetch_array($query1);
       		$client = $rdata['client'];

       		 $query   = mysql_query("SELECT * FROM `client` WHERE `name`='$client'");

								$data    = mysql_fetch_array($query);

								$email   = $data['email'];




								$to      = $email;
								$subject = 'Dots & Graphics Dispatch Team';
								$message = "Hi $client, Our delivery guy is on the way for delivery or pick up";
								$headers = 'From: elssymakena1@gmail.com' . "\r\n" .
								    'Reply-To: elssymakena1@gmail.com' . "\r\n" .
								    'X-Mailer: PHP/' . phpversion();

								mail($to, $subject, $message, $headers);

             header("Location:http://dotskenya.com/system/base/dashboard/dispatch/other.php");

        }

?>