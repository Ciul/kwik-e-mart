<?php
	$is_admin	= $persona['Persona']['is_admin'];
	$back_link	= $is_admin ? array('action' => 'index') : array('controller' => 'stores', 'action' => 'view');
?>

<!-- Jumbotron -->
<div class="jumbotron">
	<h1><?php echo h($persona['Persona']['name']); ?></h1>
	<p class="lead"><?php echo $persona['Persona']['email']; ?></p>
	
	<a class="btn btn" href="<?php echo $this->Html->url($back_link); ?>"><span class="icon-chevron-left"></span> Atr&aacute;s</a>
	<?php if ($is_admin): ?>
		<a class="btn btn-info" href="<?php echo $this->Html->url(array('action' => 'edit', $persona['Persona']['id'])); ?>"><span class="icon-pencil"></span> Editar</a>
		<a class="btn btn-danger" href="<?php echo $this->Html->url(array('action' => 'delete', $persona['Persona']['id'])); ?>"><span class="icon-trash"></span> Eliminar</a>
	<?php endif; ?>
</div>