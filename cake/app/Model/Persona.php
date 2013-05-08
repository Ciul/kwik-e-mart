<?php
# /app/Model/Persona.php

App::uses('Security', 'Utility'); // Imports Security Utility
App::uses('CakeEvent', 'Event'); // Imports CakeEvent class.

class Persona extends AppModel {
# Properties
	public $name = 'Persona';
	public $validate = array(
		'id'		=> array(
			'rule'	=> 'blank',
			'on'	=> 'create'
		),
		'email' => array(
			'notBlank'	=> array(
				'rule'		=> 'notEmpty',
				'required'	=> true,
				'message'	=> 'Este campo es obligatorio.'
			),
			'isUnique'	=> array(
				'rule'		=> 'isUnique',
				'message'	=> 'Este correo ya está registrado.'
			),
			'isEmail'	=> array(
				'rule'		=> 'email',
				'message'	=> 'Formato de correo inválido.'
			)
		),
		'password' => array(
			'isRequired' => array(
				'rule' 		=> array('notEmpty'),
				'required'	=> true,
				'message'	=> 'Este campo es obligatorio.',
				'on'		=> 'create'
			)
		)
    );
	
	/**************************************************
	 * ACTIONS
	 **************************************************/
	
/**
 * @Override
 * getEventManager
 */
	public function getEventManager() {
		parent::getEventManager(); // Attach native CakePHP Model events and also for setting up the EventManager.
		
		$afterRegisterEventKey			= 'Model.' . $this->alias . '.afterRegister';
		$afterRegisterEventListeners	= $this->_eventManager->listeners($afterRegisterEventKey);
		
		if (empty($afterRegisterEventListeners)) {
			App::uses('PersonaEventListener', 'Event');
			$this->_eventManager->attach(new PersonaEventListener(), $afterRegisterEventKey);
		}
		
		return $this->_eventManager;
	}
	
	/**
	 * beforeSave
	 */
	public function beforeSave($options = array()) {
		if (isset($this->data[$this->alias]['password'])) {
			$hash = Security::hash($this->data[$this->alias]['password'], null, true);
			$this->data[$this->alias]['password'] = $hash;
		}
		
		return true;
	}
	
	/**
	 * register
	 */
	public function register($data) {
		$data[$this->alias]['is_admin'] = 0; // Do not register as an admin.
		
		$this->create();
		$persona = $this->save($data);
		
		if (!empty($persona))
				$this->getEventManager()->dispatch(new CakeEvent('Model.Persona.afterRegister', $this, array('persona' => $persona)));
		
		return $persona;
	}
	
	/**
	 * edit
	 */
	public function edit($data) {
		$email = isset($data['Persona']['email']) ? $data['Persona']['email'] : null;
		$password = isset($data['Persona']['password']) ? $data['Persona']['password'] : null;
		
		if (empty($password))
			unset($data['Persona']['password']); // Do not modify password
		
		$persona = $this->save($data);
		
		return !empty($persona);
	}
	
	/**
	 * confirm
	 */
	public function confirm() {
		return $this->saveField('confirmed', 1);
	}
	
}
?>