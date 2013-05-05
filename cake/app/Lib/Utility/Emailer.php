<?php
# /app/Lib/Utility/Emailer.php

App::uses('CakeEmail', 'Network/Email'); // Import CakeEmail Class

class Emailer {
	
	public static function simple($to, $subject, $message, $config = 'default') {
		$email = new CakeEmail();
		$email->config($config);
		$email->emailFormat('html');
		$email->to($to);
		$email->subject($subject);
		return $email->send($message);
	}
	
	public static function personaConfirm($persona, $config = 'personaconfirm') {
		$email = new CakeEmail($config);
		$email->to($persona['email']);
		$email->viewVars(array(
			'id'	=> $persona['id'],
			'name'	=> $persona['name']
		));
		return $email->send();
	}
	
}
?>