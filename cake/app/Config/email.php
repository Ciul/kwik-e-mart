<?php
class EmailConfig {

	public $personaconfirm = array(
		'transport'		=> 'Smtp',
		'port'			=> 'port-number',
		'host'			=> 'host-name',
		'username'		=> 'username',
		'password'		=> 'password',
		'from'			=> array('email' => 'alias'),
		'subject'		=> 'Correo de confirmación Kwik-e-mart',
		'template' 		=> 'personaconfirm',
		'layout' 		=> null,
		'emailFormat'	=> 'html',
		'log'			=> true,
	);

	
	
}
