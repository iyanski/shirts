<?php

class Lex
{
	
	public $str;

	public function __construct($string)
	{
		if(isset($string)) $this->str = $string;
	}
	
	public function pluralize()
	{
		$str = $this->str;
		$len = strlen($str);
		$end = substr($str,$len-1,$len);
		
		switch($end)
		{
			case 'y':
				$root = substr($str, 0, $len-1);
				return $root . 'ies';
			break;
			
			default:
				$root = $str;
				return $root . 's';
			break;
		}
		//echo $str;
	}
}
?>