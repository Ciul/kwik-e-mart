<?php
# /app/Controller/StoresController.php

class StoresController extends AppController {
# Properties
	public $name = 'Stores';
	public $uses = false;
	
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
		
		// All registered users can access these actions.
		if (!empty($user)) {
			if ($action == 'view' || $action == 'getmap')
				return true;
		}
		
		return parent::isAuthorized($user);
	}
	
	/**
	 * view
	 */
	public function view() {
		// Display map
	}
	
	/**
	 * getMap
	 */
	public function getMap($id = null) {
		$file = array(
			'path'		=> 'files'.DS.'map'.DS.'map',
			'version'	=> is_numeric($id) ? '_'.$id : ''
		);
		$file['pathWithVersion'] = $file['path'] . $file['version'] . '.json';
		
		if (file_exists($file['pathWithVersion']) == false)
			throw new NotFoundException('Mapa Invalido.');
		
		$this->response->file($file['pathWithVersion']);
		return $this->response;
	}
	
}
?>