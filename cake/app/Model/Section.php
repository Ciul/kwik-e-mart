<?php
# /app/Model/Section.php
class Section extends AppModel {
# Properties
	public $name = 'Section';
	public $hasMany = array('Product');
	
	/**************************************************
	 * ACTIONS
	 **************************************************/
	
}	
?>