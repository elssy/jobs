<?php

session_start();
/**
* Get all user data into database and possibly send a text
*/
class User
{
	private $id, $name, $expected_date, $lpo, $lpoAmount, $file;

	
	function __construct()
	{
		require_once '../core.php';

		if(isset($_REQUEST['name']) && isset($_REQUEST['expected_date']) && isset($_REQUEST['lpo']) && isset($_REQUEST['lpoAmount']) && isset($_REQUEST['file']))
		{
			$this->name          =   $_REQUEST['name'];
			$this->expected_date =   $_REQUEST['expected_date'];
			$this->lpo           =   $_REQUEST['lpo'];
			$this->lpoAmount     =   $_REQUEST['lpoAmount'];
			$this->file          =   $_REQUEST['file'];
			$this->id            =   $_REQUEST['id'];

			# validations
			if(empty($this->name) || empty($this->expected_date) || empty($this->lpo) || empty($this->lpoAmount) || empty($this->file))
			{
			  	exit("<h5 style='color:orange'>Please fill all required fields.</h5>");
			}

			$fileName = $_FILES['userfile'][$this->file];
			$tmpName  = $_FILES['userfile']['tmp_name'];
			$fileSize = $_FILES['userfile']['size'];
			$fileType = $_FILES['userfile']['type'];

			$fp      = fopen($tmpName, 'r');
			$content = fread($fp, filesize($tmpName));
			$content = addslashes($content);
			fclose($fp);

			if(!get_magic_quotes_gpc())
			{
			    $fileName = addslashes($fileName);
			}

			
			# get date today
			$date     = date('d-M-Y H:i:s');


			# insert into database
			$saveOutsource   =  "UPDATE `outsource` SET `date` ='$date', `outsource_to`='$this->name', `expectedDate`= '$this->expected_date', `lpono`='$this->lpo', `lpoAmount`='$this->lpoAmount',`file_name`='$fileName',`pic`='$content', `status`='Ongoing' WHERE `id`='$this->id'";



			if(mysql_query($saveOutsource))
			{
				
				echo "<h5 style='color:green'><i class='fa fa-check-circle'>The job has been outsourced.</h5>";

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