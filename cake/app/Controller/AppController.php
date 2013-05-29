<?php

App::uses('Controller', 'Controller');

/**
 * This is the base app base controller all other shall extend.
 *
 * @package       App.Controller
 */
class AppController extends Controller {
/**
 * Public actions that do not need user authorization.
 * 
 * Public actions that don't require user authorization. This shall be overriden by children controllers.
 */
	public $publicActions = array();
/**
 * Base components for the whole app.
 */
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
						'Persona.enabled' 	=> 1,
						'Persona.confirmed'	=> 1
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
				'action'		=> 'home'
			),
			'authorize'	=> array(
				'Controller'	=> array(
					'userModel'	=> 'Persona'
				)
			)
		)
	);
	
/**
 * Callback method called before any controller action.
 *
 * @Override
 */
	public function beforeFilter() {
		$this->Auth->allow($this->publicActions);
	}
	
/**
 * Checks user authorization.
 *
 * @param	array $user Active user data
 * @param	CakeRequest $request
 * @return	boolean authorized	True if user is authorized, false otherwise.
 */
	public function isAuthorized($user) {
		// Administrators has global access
		if (isset($user['is_admin']) && $user['is_admin'] == true)
			return true;
		
		return false;
	} 
	
}
