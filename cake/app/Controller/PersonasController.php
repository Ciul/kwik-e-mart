<?php
# /app/Controller/PersonasController.php

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
		parent::beforeFilter(); // parent beforeFilter.
		
		$this->Auth->allow('signup', 'logout');
	}
	
	/**
	 * isAuthorized
	 */
	public function isAuthorized($user = null) {
		return parent::isAuthorized($user);
	}
	
	/**
	 * login
	 */
	public function login() {
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				$persona = $this->Auth->user();
				$this->Session->setFlash(__('Welcome'));
				$this->redirect($this->Auth->redirectUrl());
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
	 * index
	 */
	public function index() {
		$this->Persona->recursive = 0;
		$personas = $this->paginate();
		
		$this->set(compact('personas'));
	}
	
	/**
	 * edit
	 */
	public function edit($id = null) {
		$this->Persona->id = $id;
		if (!$this->Persona->exists()) {
			throw new NotFoundException(__('Invalid persona.'));
		}
		
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Persona->save($this->request->data)) {
				$this->Session->setFlash(__('The persona has been saved.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The persona could not been saved. Please try again.'));
			}
		} else {
			$this->request->data = $this->Persona->read(null, $id);
		}
	}
	
	/**
	 * delete
	 */
	public function delete($id = null) {
		$this->Persona->id = $id;
		if (!$this->Persona->exists()) {
			throw new NotFoundException(__('Invalid persona.'));
		}
		
		if ($this->Persona->delete()) {
			$this->Session->setFlash(__('Persona deleted.'));
		} else {
			$this->Session->setFlash(__('Persona could not be deleted. Please try again.'));
		}
		$this->redirect(array('action' => 'index'));
	}
	
	/**
	 * view
	 */
	public function view($id = null) {
		$this->Persona->id = $id;
		if (!$this->Persona->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		
		$persona = $this->Persona->read(null, $id);
		$this->set(compact('persona'));
    }
	
}
?>