<?php
# /app/Controller/SectionsController.php

class SectionsController extends AppController {
# Properties
	public $name = 'Sections';
	
	/**************************************************
	 * ACTIONS
	 **************************************************/
	
	/**
	 * beforeFilter
	 */
	public function beforeFilter() {
		parent::beforeFilter();
	}
	
	/**
	 * isAuthorized
	 */
	public function isAuthorized($user = null) {
		if (!empty($user) && $user['is_admin'])
			return true;
		
		return parent::isAuthorized($user);
	}
	
	/**
	 * index
	 */
	public function index() {
		$this->Section->recursive = 0;
		$sections = $this->paginate();
		
		$this->set(compact('sections'));
	}
	
	/**
	 * view
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
	 * add
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
	 * edit
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
	 * delete
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