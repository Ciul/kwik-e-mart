<?php
/**
 * This controller displays static content pages.
 *
 * @package       App.Controller
 */
class PagesController extends AppController {

	public $name = 'Pages';
/**
 * Set Model to use. 
 *
 * Set Model to use withing this Controller. Leave empty if none will be used.
 *
 * @access	public
 * @var		Array
 */
	public $uses = array();
/**
 * Establish actions that can be publicly accessed withouth previous authentication.
 *
 * @access	public
 * @var		Array
 */
	public $publicActions = array('home', 'display');
	
	
	
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
		return parent::isAuthorized($user);
	}
	
/**
 * Displays a view
 *
 * @param mixed What page to display
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
 *
 */
	public function home() {
		$title_for_layout	= 'Kwik-e-mart';
		
		$this->set(compact('title_for_layout'));
	}
 
}
