<?php
/**
 * Pages Routing
 */
	Router::connect('/', array('controller' => 'pages', 'action' => 'home'));
	
/**
 * Personas Routing
 */
	Router::connect('/login', array('controller' => 'personas', 'action' => 'login'));
	Router::connect('/logout', array('controller' => 'personas', 'action' => 'logout'));
	Router::connect('/signup', array('controller' => 'personas', 'action' => 'signup'));
	Router::connect('/kwikers', array('controller' => 'personas', 'action' => 'index'));
	Router::connect('/kwikers/view/*', array('controller' => 'personas', 'action' => 'view'));
	Router::connect('/kwikers/add', array('controller' => 'personas', 'action' => 'add'));
	Router::connect('/kwikers/edit/*', array('controller' => 'personas', 'action' => 'edit'));
	Router::connect('/kwikers/delete/*', array('controller' => 'personas', 'action' => 'delete'));

/**
 * Sections Routing
 */
	Router::connect('/se', array('controller' => 'sections', 'action' => 'index'));
	Router::connect('/se/view/*', array('controller' => 'sections', 'action' => 'view'));
	Router::connect('/se/add/*', array('controller' => 'sections', 'action' => 'add'));
	Router::connect('/se/edit/*', array('controller' => 'sections', 'action' => 'edit'));
	Router::connect('/se/delete/*', array('controller' => 'sections', 'action' => 'delete'));
/**
 * Products Routing
 */
	Router::connect('/prod', array('controller' => 'products', 'action' => 'index'));
	Router::connect('/prod/view/*', array('controller' => 'products', 'action' => 'view'));
	Router::connect('/prod/add/*', array('controller' => 'products', 'action' => 'add'));
	Router::connect('/prod/edit/*', array('controller' => 'products', 'action' => 'edit'));
	Router::connect('/prod/delete/*', array('controller' => 'products', 'action' => 'delete'));
	Router::connect('/prod/search', array('controller' => 'products', 'action' => 'search'));
	
/**
 * Stores Routing
 */
	Router::connect('/store/map', array('controller' => 'stores', 'action' => 'getmap'));
	Router::connect('/store/**', array('controller' => 'stores', 'action' => 'view'));

/**
 * Parsing Routing
 */ 
	Router::parseExtensions('json'); // Enable json extension url's
	
/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	// CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	// require CAKE . 'Config' . DS . 'routes.php';

/**
 * Enable Router to Handle Multiple Extensions
 */