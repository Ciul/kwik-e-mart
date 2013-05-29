<?php
# /app/Model/Section.php

/**
 * Section Model Class.
 *
 * <p>Section Model Class. Defines variables and methods for handling Section data.</p>
 * 
 * @name	Section
 * @package	App.Model
 */
class Section extends AppModel {
/**
 * @access	public
 * @var		string
 * @name	name
 */
	public $name = 'Section';
	
/**
 * Set hasMany model relations dependencies with other models.
 *
 * @access	public
 * @var		array
 * @name	hasMany
 */
	public $hasMany = array('Product');

/**
 * Validate array.
 * 
 * <p>Validation is set upong this array for CakePHP Model validation being used.</p>
 *
 * @link	http://book.cakephp.org/2.0/en/models/data-validation.html
 * @access	public
 * @var		array
 * @name	validate
 */

	public $validate = array(
		'name'	=> array(
			'notEmpty'	=> array(
				'rule'		=> 'notEmpty',
				'required'	=> true,
				'message'	=> 'Este campo es obligatorio.'
			),
			'isUnique'	=> array(
				'rule'		=> 'isUnique',
				'message'	=> 'Esta sección ya existe.'
			),
			'onlyLowerCased'	=> array(
				'rule'		=> '/^[a-z]*$/',
				'message'	=> 'El nombre debe contener sólo letras sin signos ni espacios.'
			)
		)
	);

/**
 * Place any pre-save logic in this function.
 * 
 * <p>Place any pre-save logic in this function.<br/>
 * This function executes immediately after model data has been successfully validated, but just before the data is saved.<br/>
 * This function should also return true if you want the save operation to continue.</p>
 * 
 * @Override
 * @access	public
 * @return	Boolean continue	True if saving operation can continue, false to stop saving operation.
 */
	public function beforeSave($options = array()) {
		if (isset($this->data[$this->alias]['name'])) {
			$this->data[$this->alias]['name'] = strtolower($this->data[$this->alias]['name']); // Lowercase Section name
		}
		
		return true;
	} 

}	
?>