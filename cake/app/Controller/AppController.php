<?php

App::uses('Controller', 'Controller');

class AppController extends Controller {
	public $publicActions = array();
	public $components = array(
		'Session',
		'RequestHandler',
		'Auth'	=> array(
			'authenticate'	=> array(
				'Form'	=> array(
					'userModel'	=> 'Persona',
					'fields'	=> array(
						'username'	=> 'email',
						'password'	=> 'password'
					),
					'scope'		=> array(
						'Persona.enabled' => 1
					)
				)
			),
			'authError'	=> 'You have no authorization to access this page.',
			'loginAction'	=> array(
				'controller'	=> 'personas',
				'action'		=> 'login'
			),
			'loginRedirect'	=> array(
				'controller'	=> 'stores',
				'action'		=> 'view'
			),
			'logoutRedirect'	=> array(
				'controller'	=> 'pages',
				'action'		=> 'display',
				'home'
			),
			'authorize'	=> array(
				'Controller'	=> array(
					'userModel'	=> 'Persona'
				)
			)
		)
	);
	
	/**
	 * beforeFilter
	 */
	public function beforeFilter() {
		$this->Auth->allow($this->publicActions);
	}
	
	/**
	 * isAuthorized
	 */
	public function isAuthorized($user) {
		// Administrators has global access
		if (isset($user['is_admin']) && $user['is_admin'] == true)
			return true;
		
		return false;
	} 
	
}
