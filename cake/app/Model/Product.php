<?php
# /app/Model/Product.php
class Product extends AppModel {
# Properties
	public $name = 'Product';

# Relations
	public $belongsTo = array('Section');
	
# Validate
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
	
/**************************************************
 * ACTIONS
 **************************************************/

/**
 * beforeSave
 */
	public function beforeSave($options = array()) {
		if (isset($this->data[$this->alias]['name'])) {
			$this->data[$this->alias]['name'] = strtolower($this->data[$this->alias]['name']); // Lowercase Product name
		}
		
		return true;
	}

/**
 * findProduct
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