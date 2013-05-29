<?php
# /app/Controller/SectionsController.php

/**
 * Handles Sections interaction.
 *
 * @package       App.Controller
 */
class SectionsController extends AppController {
/**
 * Name of this Controller
 *
 * @var	string
 */
	public $name = 'Sections';
/**
 * Callback method called before any controller action.
 *
 * @Override
 */
	public function beforeFilter() {
		parent::beforeFilter();
	}
	
/**
 * Checks user authorization.
 *
 * @param	array $user Active user data
 * @param	CakeRequest $request
 * @return	boolean authorized	True if user is authorized, false otherwise.
 */
	public function isAuthorized($user = null) {
		if (!empty($user) && $user['is_admin'])
			return true;
		
		return parent::isAuthorized($user);
	}
	
/**
 * List all Sections.
 */
	public function index() {
		$this->Section->recursive = 0;
		$sections = $this->paginate();
		
		$this->set(compact('sections'));
	}
	
/**
 * View a Section information.
 *
 * @param	string id	Id of the Section to view.
 */
	public function view($id = null) {
		$this->Section->id = $id;
		if (!$this->Section->exists()) {
			throw new NotFoundException('Sección Invalida');
		}
		
		$section = $this->Section->read(null, $id);
		$this->set(compact('section'));
	}
	
/**
 * Add a new Section record.
 *
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Section->create();
			if ($this->Section->save($this->request->data)) {
				$this->Session->setFlash('La sección fue creada con éxito.', 'alert', array('class' => 'alert-succcess'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('La sección no pudo ser creada. Intenta nuevamente', 'alert', array('class' => 'alert-error'));
			}
		}
	}
	
/**
 * Edit a Section record given it's id.
 *
 * @param	string id	Section id to edit.
 */
	public function edit($id = null) {
		$this->Section->id = $id;
		if (!$this->Section->exists()) {
			throw new NotFoundException('Sección Invalida');
		}
		
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Section->save($this->request->data)) {
				$this->Session->setFlash('Los cambios fueron guardados con éxito', 'alert', array('class' => 'alert-success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Los cambios no pudieron ser guardados. Intenta nuevamente', 'alert', array('class' => 'alert-error'));
			}
		} else {
			$this->request->data = $this->Section->read(null, $id);
		}
	}
	
/**
 * Edit a Section record given it's id.
 *
 * @param	string id	Section id to edit.
 */
	public function delete($id = null) {
		$this->Section->id = $id;
		if (!$this->Section->exists()) {
			throw new NotFoundException('Sección Invalida');
		}
		
		if ($this->Section->delete()) {
			$this->Session->setFlash('Sección eliminada exitosamente.', 'alert', array('class' => 'alert-error'));
		} else {
			$this->Session->setFlash('La sección no pudo ser eliminada. Intenta nuevamente.', 'alert', array('class' => 'alert-error'));
		}
		$this->redirect(array('action' => 'index'));
	}
	
}
?>