<?php
	function validateCPF($strCPF)
	{
		if(strlen($strCPF)!= 11 || in_array($strCPF, array("00000000000", 
			"11111111111", "22222222222", "33333333333",
			"44444444444", "55555555555", "66666666666",
			"77777777777", "88888888888", "99999999999"))
		) return false;

		$sum = 0;

		for($i = 1; $i <= 9; $i++) $sum = $sum + intval(substr($strCPF, $i - 1, 1)) * (11 - $i);

		$remainder = ($sum * 10) % 11;

		if(($remainder == 10) || ($remainder == 11))  $remainder = 0;

		if($remainder != intval(substr($strCPF, 9, 1))) return false; // first validation digit

		$sum = 0;

		for($i = 1; $i <= 10; $i++) $sum = $sum + intval(substr($strCPF, $i - 1, 1)) * (12 - $i);

		$remainder = ($sum * 10) % 11;

		if(($remainder == 10) || ($remainder == 11))  $remainder = 0;

		if($remainder != intval(substr($strCPF, 10, 1))) return false; // second validation digit

		return true;			
	}
