<?php
# /app/Model/Product.php
class Product extends AppModel {
# Properties
	public $name = 'Product';
	public $belongsTo = array('Section');
	
	/**************************************************
	 * ACTIONS
	 **************************************************/
	
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