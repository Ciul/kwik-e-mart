<?php
# /app/View/Personas/add.ctp
	echo $this->Form->create('Persona', array('class' => 'simple-centered'));
?>
<fieldset>
	<legend>Creando Nueva Persona:</legend>
	<?php
		echo $this->Form->input('name', array(
			'div'			=> false,
			'label'			=> false,
			'placeholder'	=> 'Nombre de la Persona',
			'required'		=> true
		));
	
		echo $this->Form->input('email');
		echo $this->Form->input('password', array(
			'value'	=> ''
		));
		echo $this->Form->input('enabled');
		echo $this->Form->input('confirmed');
		echo $this->Form->input('is_admin');
	
		echo $this->Form->submit('Guardar', array(
			'div'	=> false,
			'class'	=> 'btn btn-primary'
		));
	?>
	<a class="btn btn-danger" href="<?php echo $this->Html->url(array('action' => 'index')); ?>"><span class="icon-trash"></span> Cancelar</a>
</fieldset>