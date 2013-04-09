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
			throw new NotFoundException(__('Invalid section.'));
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
				$this->Session->setFlash('Section created successfully.');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Section could not be saved. Please try again.'));
			}
		}
	}
	
	/**
	 * edit
	 */
	public function edit($id = null) {
		$this->Section->id = $id;
		if (!$this->Section->exists()) {
			throw new NotFoundException(__('Invalid section.'));
		}
		
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Section->save($this->request->data)) {
				$this->Session->setFlash(__('The section has been saved.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The section could not been saved. Please try again.'));
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
			throw new NotFoundException(__('Invalid section.'));
		}
		
		if ($this->Section->delete()) {
			$this->Session->setFlash(__('Section deleted.'));
		} else {
			$this->Session->setFlash(__('Section could not be deleted. Please try again.'));
		}
		$this->redirect(array('action' => 'index'));
	}
	
}
?>