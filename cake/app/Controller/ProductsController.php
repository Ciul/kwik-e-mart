<?php
# /app/Controller/ProductsController.php

class ProductsController extends AppController {
# Properties
	public $name = 'Products';
	
	/**************************************************
	 * ACTIONS
	 **************************************************/
	
	/**
	 * beforeFilter
	 */
	public function beforeFilter() {
		parent::beforeFilter(); // parent beforeFilter.
		
	}
	
	/**
	 * isAuthorized
	 */
	public function isAuthorized($user = null) {
		$action = $this->request->action;
		
		if (!empty($user)) {
			if ($action == 'search')
				return true;
		}
		
		return parent::isAuthorized($user);
	}
	
	/**
	 * index
	 */
	public function index() {
		$this->Product->recursive = 0;
		$products = $this->paginate();
		
		$this->set(compact('products'));
	}
	
	/**
	 * view
	 */
	public function view($id = null) {
		$this->Product->id = $id;
		if (!$this->Product->exists()) {
			throw new NotFoundException(__('Invalid product.'));
		}
		
		$product = $this->Product->read(null, $id);
		$this->set(compact('product'));
	}
	
	/**
	 * add
	 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Product->create();
			if ($this->Product->save($this->request->data)) {
				$this->Session->setFlash('Product created successfully.');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Product could not be saved. Please try again.'));
			}
		}
		
		$sections = $this->Product->Section->find('list');
		$this->set(compact('sections'));
	}
	
	/**
	 * edit
	 */
	public function edit($id = null) {
		$this->Product->id = $id;
		if (!$this->Product->exists()) {
			throw new NotFoundException(__('Invalid product.'));
		}
		
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Product->save($this->request->data)) {
				$this->Session->setFlash(__('The product has been saved.'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product could not been saved. Please try again.'));
			}
		} else {
			$this->request->data = $this->Product->read(null, $id);
		}
		
		$sections = $this->Product->Section->find('list');
		$this->set(compact('sections'));
	}
	
	/**
	 * delete
	 */
	public function delete($id = null) {
		$this->Product->id = $id;
		if (!$this->Product->exists()) {
			throw new NotFoundException(__('Invalid product.'));
		}
		
		if ($this->Product->delete()) {
			$this->Session->setFlash(__('Product deleted.'));
		} else {
			$this->Session->setFlash(__('Product could not be deleted. Please try again.'));
		}
		$this->redirect(array('action' => 'index'));
	}
	
	/**
	 * search
	 */
	public function search() {
		if ($this->request->is('ajax')) {
			$searched	= $this->request->data('search');
			$products	= $this->Product->findProduct($searched);
			$this->set('products', $products);
		} else {
			throw new NotFoundException();
		}
	}
	
}
?>