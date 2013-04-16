<?php
# /app/View/Sections/add.ctp	
	echo $this->Form->create('Section', array('class' => 'simple-centered'));
?>
<fieldset>
	<legend>Crear Nueva Secci&oacute;n:</legend>
	<?php
		echo $this->Form->input('name', array(
			'div'			=> false,
			'label'			=> false,
			'placeholder'	=> 'Nombre de la Sección',
			'required'		=> true
		));
	?>
		
	<?php
		echo $this->Form->input('published', array(
			'label'	=> 'Público'
		));
	?>
	
	<?php
		echo $this->Form->submit('Guardar', array(
			'div'	=> false,
			'class'	=> 'btn btn-primary'
		));
	?>
	<a class="btn btn-danger" href="<?php echo $this->Html->url(array('action' => 'index')); ?>"><span class="icon-trash"></span> Cancelar</a>
</fieldset>