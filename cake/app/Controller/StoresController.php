<?php
# /app/Controller/StoresController.php

/**
 * Handles Store interaction.
 *
 * @package       App.Controller
 */
class StoresController extends AppController {
# Properties
	public $name = 'Stores';
	public $uses = false;
	
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
		
		// All registered users can access these actions.
		if (!empty($user)) {
			if ($action == 'view' || $action == 'getmap')
				return true;
		}
		
		return parent::isAuthorized($user);
	}
	
/**
 * Display map
 */
	public function view() {
		// Display map
	}
	
/**
 * Retrieves map json content.
 *
 * @param	int	id	Map version number.
 * @return	string	mapFile	Returns map json file content.
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