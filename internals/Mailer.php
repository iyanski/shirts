<?php
class Mailer{
	
	protected $property;
	
	public function __construct()
	{
		$this->property['from']				= "";
		$this->property['reply']			= "";
		$this->property['text_header']		= "";
		$this->property['text_message']		= "";
		$this->property['html_header']		= "";
		$this->property['html_message']		= "";
		$this->property['message']			= "";
	}
	
	public function __set($key, $val)
	{
		$this->property[$key] = $val;	
	}
	public function __get($key)
	{
		return $this->property[$key];
	}
	
	public function send($subject, $to)
	{
		global $config;
		
		$mime_header= "--------" . md5(time() . "Clade Framework") . "--------\n";
		
		$headers	= "From: " . $this->property['from'] . "\n";
		$headers	.= "Reply-to: " . $config ['EMAIL_ADDRESS'] . "\n";
		$headers	.= "MIME-Version: 1.0\n";
		$headers 	.= "Content-Type: multipart/alternative; boundary=\"$mime_boundary\"\n";
		
		$message 	.= $this->property['text_message'] . "\n\n";
		/*
		$message	= $mime_header;
		$message	.= "Content-Type: text/plain; charset=UTF-8\n";
		$message 	.= "Content-Transfer-Encoding: 8bit\n\n";
		$message 	.= $this->property['text_message'] . "\n\n";
		
		$message	= $mime_header;
		$message 	.= "Content-Type: text/html; charset=UTF-8\n";
		$message 	.= "Content-Transfer-Encoding: 8bit\n\n";
		$message 	.= $this->property['html_message'] . "\n";
		*/
		$message	= $mime_header . "\n";
		
		$mail_sent = mail( $to, $subject, $message);
	}
	
	public function set_text_template()
	{
		
	}

	public function set_html_template()
	{
		
	}
}
?>