<?php
class PersonasController extends AppController {
# Properties
	public $name = 'Personas';
	
	/**************************************************
	 * ACTIONS
	 **************************************************/
	
	/**
	 * beforeFilter
	 */
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('signup', 'confirm');
		
	}
	
	/**
	 * login
	 */
	public function login() {
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				$persona = $this->Auth->user();
				$this->Session->setFlash(__('Welcome'));
				$this->redirect(array(
					'action' => 'view'
				));
			} else {
				$this->Session->setFlash(__('Invalid credentials'));
			}
		}
	}
	
	/**
	 * logout
	 */
	public function logout() {
		if ($this->Auth->loggedIn()) {
			$this->Session->setFlash(__('We are already missing you.'));
			$this->redirect($this->Auth->logout());
		} else {
			$this->Session->setFlash(__('You are not logged in.'));
			$this->redirect(array('action' => 'login'));
		}
	}
	
	/**
	 * signup
	 */
	public function signup() {
		if ($this->request->is('post')) {
			list($persona, $success) = $this->Persona->register($this->data);
			
			if ($success == true && !empty($persona)) {
				$this->Session->setFlash(__('The user has been saved. Please login with your account.'));
				$this->redirect(array('action' => 'login' ));
			} else if($success == false && !empty($persona)) {
				$this->Session->setFlash(__('The user is already registered. Please login.'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please try again.'));
			}
		}
	}
	
	/**
	 * view
	 */
	public function view($id = null) {
		$this->Persona->id = $id;
		// if (!$this->Persona->exists()) {
			// throw new NotFoundException(__('Invalid user'));
		// }
		// $this->set('persona', $this->Persona->read(null, $id));
    }
	
}
?>