<?php
# /app/Test/Case/Model/ProductTest.php

App::uses('Product', 'Model');

class ProductTest extends CakeTestCase {
# Properties
	public $fixtures = array('app.product', 'app.section');
	
	/**************************************************
	 * ACTIONS
	 **************************************************/
	
	/**
	 * setUp
	 */
	public function setUp() {
		parent::setUp();
		$this->Product = ClassRegistry::init('Product');
	}
	
	/**
	 * testFindProduct
	 */
	public function testFindProduct() {
		$result = $this->Product->findProduct('manzana');
		
		$expected = array(
			'Product'	=> array(
				'name'	=> 'manzana'
			),
			'Section' => array(
				'name'	=> 'frutas'
			)
		);
		debug($expected);
		debug($result);
		$this->assertEquals($expected, $result);
	}
	
	/**
	 * testDelete
	 */
	public function testDelete() {
		$product_id = $this->Product->field('id', array(
			'name'	=> 'tomate'
		));
		
		$result = $this->Product->delete($product_id);
		
		debug($product_id);
		debug($result);
		
		$this->assertEquals(true, $result);
	}
	
}
?>