<?php
# /app/Model/Section.php
class Section extends AppModel {
# Properties
	public $name = 'Section';
	
# Relations
	public $hasMany = array('Product');

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
				'message'	=> 'Esta sección ya existe.'
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
			$this->data[$this->alias]['name'] = strtolower($this->data[$this->alias]['name']); // Lowercase Section name
		}
		
		return true;
	} 

}	
?>