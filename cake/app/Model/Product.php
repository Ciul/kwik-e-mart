<?php
# /app/Model/Product.php

/**
 * Product Model Class.
 *
 * Product Model Class. Defines variables and methods for handling Product data.
 * 
 * @name	Product
 * @package	App.Model
 */
class Product extends AppModel {
/**
 * @access	public
 * @var		string
 * @name	name
 */
	public $name = 'Product';

/**
 * Set belongsTo model relations dependencies with other models.
 *
 * @access	public
 * @var		array
 * @name	belongsTo
 */
	public $belongsTo = array('Section');
	
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
				'message'	=> 'Este producto ya existe.'
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
			$this->data[$this->alias]['name'] = strtolower($this->data[$this->alias]['name']); // Lowercase Product name
		}
		
		return true;
	}

/**
 * Searchs for a product given it's name.
 * 
 * Searchs for a product given it's name as parameter. Returns null if none is found.
 * 
 * @access	public
 * @param	String	searched	Product name searched.
 * @return	Array	products	Returns products found with name given by searched param or null if none is found.
 */
	public function findProduct($searched) {
		$this->Behaviors->load('Containable');
		
		$products = $this->find('first', array(
			'conditions'	=> array(
				'Product.name'	=> $searched
			),
			'fields'	=> array(
				'Product.name',
			),
			'contain'	=> array(
				'Section'	=> array(
					'fields'	=> array('name')
				)
			)
		));
		
		// Remove Sections id's. Leaving only relevant data.
		// foreach ($products AS &$product) {
			unset($products['Section']['id']);
		// }
		
		return $products;
	}
}	
?>