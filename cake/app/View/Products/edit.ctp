<?php
# /app/View/Products/edit.ctp
	echo $this->Form->create('Product', array('class' => 'simple-centered'));
?>
<fieldset>
	<legend>Editando: <?php echo $this->data['Product']['name']; ?></legend>
	<?php
		echo $this->Form->input('name', array(
			'div'			=> false,
			'label'			=> false,
			'placeholder'	=> 'Nombre del Producto',
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