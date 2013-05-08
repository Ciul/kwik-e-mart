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
		
		if (isset($this->params['requested'])) {
            return $products;
        }
		
		$this->set(compact('products'));
	}
	
	/**
	 * view
	 */
	public function view($id = null) {
		$this->Product->id = $id;
		if (!$this->Product->exists()) {
			throw new NotFoundException('Producto Invalido');
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
				$this->Session->setFlash('El producto fue añadido exitosamente.', 'alert', array('class' => 'alert-success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('El producto no pudo ser creado. Por favor intenta nuevamente.', 'alert', array('class' => 'alert-error'));
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
			throw new NotFoundException('Producto Invalido');
		}
		
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Product->save($this->request->data)) {
				$this->Session->setFlash('Los cambios fueron guardados con éxito :)', 'alert', array('class' => 'alert-success'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Los cambios no pudieron ser guardados. Intenta nuevamente.', 'alert', array('class' => 'alert-error'));
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
			throw new NotFoundException('Producto Invalido');
		}
		
		if ($this->Product->delete()) {
			$this->Session->setFlash('Producto eliminado con éxito', 'alert', array('class' => 'alert-success'));
		} else {
			$this->Session->setFlash('El producto no pudo ser eliminado. Por favor intenta nuevamente.', 'alert', array('class' => 'alert-error'));
		}
		$this->redirect(array('action' => 'index'));
	}
	
	/**
	 * search
	 */
	public function search($searched = null) {
		if ($this->request->is('ajax')) {
			$searched	= $this->request->data('search');
			$products	= $this->Product->findProduct($searched);
			$this->set('products', $products);
		} else if (isset($this->params['requested'])) {
			$products	= $this->Product->findProduct($searched);
			return $products;
		} else {
			throw new NotFoundException();
		}
	}
	
}
?>