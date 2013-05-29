<?php
# /app/Controller/ProductsController.php

/**
 * Handles Products interaction.
 *
 * @package       App.Controller
 */
class ProductsController extends AppController {
/**
 * Name of this Controller
 *
 * @var	string
 */
	public $name = 'Products';
	
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
		$action = $this->request->action;
		
		if (!empty($user)) {
			if ($action == 'search')
				return true;
		}
		
		return parent::isAuthorized($user);
	}
	
/**
 * List all Products.
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
 * View a Product information.
 *
 * @param	string id	Id of the Product to view.
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
 * Add a new Product record.
 *
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
 * Edit a Product record given it's id.
 *
 * @param	string id	Product id to edit.
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
 * Delete a Product record given it's id.
 *
 * @param	string id	Product id to delete.
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
 * Search method for a Product given it's name.
 *
 * @param	string searched		Product name to search for.
 * @return	mixed	products	Return an array of products found or null if none.
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