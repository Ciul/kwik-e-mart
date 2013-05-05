<?php
# /app/Lib/Event/PersonaEventListener.php

App::uses('CakeEventListener', 'Event');

class PersonaEventListener implements CakeEventListener {
	
	
	public function implementedEvents() {
		return array(
			'Model.Persona.afterRegister'	=> 'newUser'
		);
	}
	
	public function newUser($event) {
		$data		= $event->data;
		$modelName	= $event->subject()->alias;
		
		$name	= $data['persona'][$modelName]['name'];
		$email	= $data['persona'][$modelName]['email'];
		
		
		App::uses('Emailer', 'Utility');
		$Emailer = new Emailer();
		
		CakeLog::write('personas', 'New Persona added: ' . $name . ' ' . $email);
		return $Emailer::personaConfirm($data['persona'][$modelName]);
	}
}	
?>