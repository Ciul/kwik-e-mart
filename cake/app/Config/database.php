<?php
class DATABASE_CONFIG {

	public $default = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => 'database_host',
		'login' => 'database_user',
		'password' => 'database_password',
		'database' => 'database_name',
		'prefix' => 'database_prefix',
		'encoding' => 'utf8',
	);
	
	public $test = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => 'database_host',
		'login' => 'database_user',
		'password' => 'database_password',
		'database' => 'testing_database_name',
		'prefix' => 'database_prefix',
		'encoding' => 'utf8',
	);

}
?>
