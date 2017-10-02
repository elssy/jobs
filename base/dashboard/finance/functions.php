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

function calculatepayee($amount){
	$totalpayee = 0;

	if($amount >=11180)
	{
		$payee = 1118;
		$amount = $amount - 11180;
		$totalpayee = $totalpayee + $payee;
	}
	if($amount >= 10534)
	{
		$payee  = 10534 * 0.15;
		$amount = $amount - 10534;
		$totalpayee = $totalpayee + $payee;
	}
	if($amount >= 10534)
	{
		$payee = 10534 * 0.2;
		$amount = $amount - 10534;
		$totalpayee = $totalpayee + $payee;
	}
	if($amount >= 10534)
	{
		$payee = 10534 * 0.25;
		$amount = $amount - 10534;
		$totalpayee = $totalpayee + $payee;
	}
	if($amount >= 121538)
	{
		$payee = 121538 * 0.3;
		$totalpayee = $totalpayee + $payee;
	}

	return $totalpayee;
}

?>