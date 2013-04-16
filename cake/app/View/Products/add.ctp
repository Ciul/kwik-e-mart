<?php
# /app/View/Products/add.ctp	
	echo $this->Form->create('Product', array('class' => 'simple-centered'));
?>
<fieldset>
	<legend>Crear Nuevo Producto:</legend>
	<?php
		echo $this->Form->input('name', array(
			'div'			=> false,
			'label'			=> false,
			'placeholder'	=> 'Nombre del Producto',
			'required'		=> true
		));
		
		echo $this->Form->input('section_id', array(
			'label'	=> 'Sección',
			'div'	=> false
		));
		
		echo $this->Form->input('published', array(
			'label'	=> 'Público'
		));
		
		echo $this->Form->submit('Guardar', array(
			'div'	=> false,
			'class'	=> 'btn btn-primary'
		));
	?>
	<a class="btn btn-danger" href="<?php echo $this->Html->url(array('action' => 'index')); ?>"><span class="icon-trash"></span> Cancelar</a>
</fieldset>