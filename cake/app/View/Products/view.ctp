<!-- Jumbotron -->
<div class="jumbotron">
	<h1><?php echo h($product['Product']['name']); ?></h1>
	
	<a class="btn btn" href="<?php echo $this->Html->url(array('action' => 'index')); ?>"><span class="icon-chevron-left"></span> Atr&aacute;s</a>
	<a class="btn btn-info" href="<?php echo $this->Html->url(array('action' => 'edit', $product['Product']['id'])); ?>"><span class="icon-pencil"></span> Editar</a>
	<a class="btn btn-danger" href="<?php echo $this->Html->url(array('action' => 'delete', $product['Product']['id'])); ?>"><span class="icon-trash"></span> Eliminar</a>
</div>