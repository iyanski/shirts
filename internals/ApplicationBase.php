<?php
class ApplicationBase{

	protected $errors;

	public function is_a_restricted_area()
	{
		if	(!is_logged()) {
			log_me_out();
			must_log_in();
		}
	}
	
	public function validates_presence_of($field, $custom_error_code = '')
	{
		if	(is_array($this->property)){
			if	(($this->property[$field] != "") || ($this->property[$field] == 0))
				return true;
			else
				$this->errors[] = array(($custom_error_code) ? $custom_error_code : '1001', ucwords($field) . ' is missing!');
		}
	}
	
	public function trigger()
	{
		if($this->errors){
			ob_clean();
			echo "\r\nERRORS FOUND: <br/>\r\n";
			inspect($this->errors);
			exit;
		}
	}
}
?>