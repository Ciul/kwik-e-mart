<?php

App::uses('Controller', 'Controller');

class AppController extends Controller {
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
			// 'authError'	=> 'You have no authorization to access this page.',
			'loginAction'	=> array(
				'controller'	=> 'personas',
				'action'		=> 'login'
			),
			'loginRedirect'	=> array(
				'controller'	=> 'personas',
				'action'		=> 'view'
			),
			'logoutRedirect'	=> array(
				'controller'	=> 'pages',
				'action'		=> 'display',
				'home'
			)
		),
		'DebugKit.Toolbar'
	);
	
	public function beforeFilter() {
		// $this->Auth->allow();
	}
}
