<?php
# /app/Model/Persona.php

App::uses('Security', 'Utility');

class Persona extends AppModel {
# Properties
	public $name = 'Persona';
	public $validate = array(
		'email' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				'message' => 'An email is required'
			)
		),
		'password' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				'message' => 'A password is required'
			)
		)
    );
	
	/**************************************************
	 * ACTIONS
	 **************************************************/
	
	/**
	 * beforeSave
	 */
	public function beforeSave($options = array()) {
		if (isset($this->data['Persona']['password'])) {
			$hash = Security::hash($this->data['Persona']['password'], null, true);
			$this->data['Persona']['password'] = $hash;
		}
		
		return true;
	}
	
	/**
	 * register
	 */
	public function register($data) {
		$email = isset($data['Persona']['email']) ? $data['Persona']['email'] : null;
		$password = isset($data['Persona']['password']) ? $data['Persona']['password'] : null;
		
		if (!is_string($email) || !is_string($password))
			return array(null, false);
		
		if ($this->hasAny( array('email' => $email) )) {
			return array(true, false);
		}
		
		$this->create();
		$persona = $this->save($data);
		
		return array($persona, !empty($persona));
	}
	
	/**
	 * edit
	 */
	public function edit($data) {
		$email = isset($data['Persona']['email']) ? $data['Persona']['email'] : null;
		$password = isset($data['Persona']['password']) ? $data['Persona']['password'] : null;
		
		if (!is_string($email))
			return array(null, false);
		
		if (empty($password))
			unset($data['Persona']['password']); // Do not modify password
		
		$this->create();
		$persona = $this->save($data);
		
		return !empty($persona);
	}
	
}
?>