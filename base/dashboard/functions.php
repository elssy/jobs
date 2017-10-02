<?php


function getByData($table,$field,$value,$return){
	$cn = mysql_query("SELECT * FROM $table WHERE $field = '$value'");
		if(mysql_num_rows($cn) > 0)
		{
			$data = mysql_fetch_array($cn);
				return $data[$return];
		}else{
			return false;
		}
}


?>