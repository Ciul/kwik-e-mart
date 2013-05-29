<?php
# /app/Controller/PersonasController.php

/**
 * Handles Personas interaction.
 *
 * @package       App.Controller
 */
class PersonasController extends AppController {
/**
 * Name of this Controller
 */
	public $name			= 'Personas';
/**
 * Public actions that do not need user authorization.
 */	
	public $publicActions	= array('signup', 'logout', 'confirm');
	
/**
 * Callback method called before any controller action.
 *
 * @Override
 */
	public function beforeFilter() {
		parent::beforeFilter(); // parent beforeFilter.
	}
	
/**
 * Checks user authorization.
 *
 * @param	array $user Active user data
 * @param	CakeRequest $request
 * @return	boolean authorized	True if user is authorized, false otherwise.
 */

	public function isAuthorized($user = null) {
		if ($this->action == 'view')
			if ($this->request->params['pass'][0] == 'me')
				return true;
		
		return parent::isAuthorized($user);
	}
	
/**
 * Provides user login logic.
 */
	public function login() {
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				$persona = $this->Auth->user();
				$this->Session->setFlash(__('Bienvenido'), 'alert', array('class' => 'alert-info', 'block' => true));
				
				$redirectTo = $this->Auth->redirectUrl();
				if ($persona['is_admin'])
					$redirectTo = array('controller' => 'personas', 'action' => 'index');
				else
					$redirectTo = array('controller' => 'stores', 'action' => 'view');
				
				$this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__('Datos inválidos.'), 'alert', array('class' => 'alert-error'));
			}
		}
	}
	
/**
 * Provides user logout logic.
 */
	public function logout() {
		if ($this->Auth->loggedIn()) {
			$this->Session->setFlash('<h2>'.__('Te estamos extrañando.').'</h2>', 'alert', array('class' => 'alert-info', 'block' => true));
			$this->redirect($this->Auth->logout());
		} else {
			$this->Session->setFlash(__('No fue posible desloguearte. Tal vez es mejor que no te vayas aún. ¿No crees?'), 'alert', array('class' => 'alert-error'));
			$this->redirect(array('action' => 'login'));
		}
	}
	
/**
 * Add a new Persona record.
 *
 */
	public function add() {
		if ($this->request->is('post')) {
			list($persona, $success) = $this->Persona->register($this->data);
			
			if ($success == true && !empty($persona)) {
				$this->Session->setFlash('El usuario fue creado exitosamente :]', 'alert', array('class' => 'alert-info'));
				$this->redirect(array('action' => 'index' ));
			} else if($success == false && !empty($persona)) {
				$this->Session->setFlash('Ese usuario ya existe.', 'alert', array('class' => 'alert-error'));
			} else {
				$this->Session->setFlash('El usuario no pudo ser creado. Por favor no desistas.', 'alert', array('class' => 'alert-error'));
			}
		}
	}
	
	/**
	 * signup
	 */
	public function signup() {
		if ($this->request->is('post')) {
			$persona = $this->Persona->register($this->data);
			
			if (!empty($persona)) {
				$this->Session->setFlash('Ya sólo te falta confirmar tu cuenta. Revisa tu cuenta de correo ;)', 'alert', array('class' => 'alert-success', 'block' => true));
				$this->redirect(array('action' => 'login' ));
			} else {
				$this->Session->setFlash('El usuario no pudo ser creado. Por favor intenta de nuevo.', 'alert', array('class' => 'alert-error'));
			}
		}
	}
	
/**
 * List all Persona records.
 */
	public function index() {
		$this->Persona->recursive = 0;
		$personas = $this->paginate();
		
		$this->set(compact('personas'));
	}
	
/**
 * Edit a Persona record given it's id.
 *
 * @param	string id	Persona id to edit.
 */
	public function edit($id = null) {
		$this->Persona->id = $id;
		if (!$this->Persona->exists()) {
			throw new NotFoundException(__('Persona Invalida.'));
		}
		
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Persona->edit($this->request->data)) {
				$this->Session->setFlash('Los cambios fueron guardados exitosamente.', 'alert', array('class' => 'alert-success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Los cambios no fueron guardados. Por favor no desistas.', 'alert', array('alert-error'));
			}
		} else {
			$this->request->data = $this->Persona->read(null, $id);
		}
	}
	
/**
 * Delete a Persona record given it's id.
 *
 * @param	string id	Persona id to delete.
 */
	public function delete($id = null) {
		$this->Persona->id = $id;
		if (!$this->Persona->exists()) {
			throw new NotFoundException(__('Persona Invalida.'));
		}
		
		if ($this->Persona->delete()) {
			$this->Session->setFlash('La persona fue eliminada. Bye bye', 'alert', array('class' => 'alert-info'));
		} else {
			$this->Session->setFlash('La persona no pudo ser eliminada. Tal vez no deberías irte. ¿No crees?', 'alert', array('class' => 'alert-error'));
		}
		$this->redirect(array('action' => 'index'));
	}
	
/**
 * View a Persona information.
 *
 * @param	string id	Id of the Persona to view.
 */
	public function view($id = null) {
		if ($id == 'me') { // Special case for loggedin user to see his/her profile
			$user_id = $this->Auth->user('id');
			if (!empty($user_id))
				$id = $user_id;
		}
		
		$this->Persona->id = $id;
		if (!$this->Persona->exists()) {
			throw new NotFoundException(__('Persona Invalida'));
		}
		
		$persona = $this->Persona->read(null, $id);
		$this->set(compact('persona'));
    }
	
/**
 * Provides user confirmation logic.
 */
	public function confirm($id = null) {
		$this->Persona->id = $id;
		if (!$this->Persona->exists()) {
			throw new NotFoundException(__('Persona Invalida.'));
		}
		
		if ($this->Persona->confirm()) {
			$this->Session->setFlash('Ay Caramba! Ahora sí que podrás hacer compras de manera inteligente.', 'alert', array('class' => 'alert-info'));
			$this->redirect(array('action' => 'login'));
		} else {
			$this->Session->setFlash('Oops. Algo pasó. Por favor intenta de nuevo o comunícate con el administrador.', 'alert', array('class' => 'alert-error'));
			$this->redirect('/');
		}
	}
}
?>