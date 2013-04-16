<?php
class PagesController extends AppController {
# Properties
	public $name = 'Pages';
	public $uses = array();
	public $publicActions = array('home', 'display');
	
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
		
		return parent::isAuthorized($user);
	}
	
/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 */
	public function display() {
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			$this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title_for_layout'));
		$this->render(implode('/', $path));
	}
	
/**
 * Displays the HomePage
 */
	public function home() {
		$title_for_layout	= 'Kwik-e-mart';
		
		$this->set(compact('title_for_layout'));
	}
 
}
