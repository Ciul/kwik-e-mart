<?php
# /app/Test/Case/Model/PersonaTest.php

App::uses('Persona', 'Model');
App::uses('Security', 'Utility');

class PersonaTest extends CakeTestCase {
# Properties
	public $fixtures = array('app.persona');
	
	/**************************************************
	 * ACTIONS
	 **************************************************/
	
	/**
	 * setUp
	 */
	public function setUp() {
		parent::setUp();
		$this->Persona = ClassRegistry::init('Persona');
	}
	
	/**
	 * testFindByName
	 */
	public function testFindByName() {
		$result = $this->Persona->find('first', array(
			'conditions' => array(
				'email' => 'luiscarlosjayk@gmail.com'
			)
		));
		
		$expected = 'Luis Carlos Osorio Jayk';
		
		debug($expected);
		debug($result['Persona']['name']);
		
		$this->assertTextEquals($expected, $result['Persona']['name']);
	}
	
	/**
	 * testAdd
	 */
	public function testAdd() {
		$now = date('Y-m-d H:i:s');
		$new_record = array(
			'Persona' => array(
				'created'	=> $now,
				'modified'	=> $now,
				'name'		=> 'John Doe',
				'email'		=> 'john@doe.com',
				'password'	=> '123456',
				'enabled'	=> 1,
				'confirmed'	=> 1,
				'is_admin'	=> 1
			)
		);
		
		$this->Persona->create();
		$result = $this->Persona->save($new_record);
		
		$expected = $new_record;
		$expected['Persona']['id']			= $result['Persona']['id']; // Insert the id of the new user just created.
		$expected['Persona']['password']	= Security::hash($new_record['Persona']['password'], null, true); // Encrypt plain password from $new_record.
		
		debug($expected);
		debug($result);
		
		$this->assertEquals($expected, $result);
	}
	
}
?>