<?php
# /app/Test/Case/Model/SectionTest.php

App::uses('Section', 'Model');

class SectionTest extends CakeTestCase {
# Properties
	public $fixtures = array('app.section');
	
	/**************************************************
	 * ACTIONS
	 **************************************************/
	
	/**
	 * setUp
	 */
	public function setUp() {
		parent::setUp();
		$this->Section = ClassRegistry::init('Section');
	}
	
	/**
	 * testEdit
	 */
	public function testEdit() {
		$section_verduras = $this->Section->find('first', array(
			'conditions'	=> array(
				'name'	=> 'verduras'
			),
			'recursive'	=> -1
		));
		
		debug($section_verduras);
		
		$section_verduras['Section']['name'] = 'greenfood';
		$this->Section->save($section_verduras);
		
		$section_green_food = $this->Section->find('first', array(
			'conditions'	=> array(
				'name'	=> 'greenfood'
			),
			'recursive'	=> -1
		));
		debug($section_green_food);
		
		$expected = $section_verduras['Section']['id'];
		$result = $section_green_food['Section']['id'];
		
		$this->assertEquals($expected, $result);
	}
	
}
?>