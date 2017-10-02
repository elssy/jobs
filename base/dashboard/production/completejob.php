<?php
session_start();

require_once '../core.php';
	

    # get date today
 	$date     = date('d-M-Y H:i:s');

    $sql = mysql_query("UPDATE `jobs` SET `status`='Completed', `date_completed`='$date'  WHERE `id` ='{$_GET['id']}'");

       if ($sql) {

             header("Location:http://dotskenya.com/system/base/dashboard/design/index.php");

        }

?>