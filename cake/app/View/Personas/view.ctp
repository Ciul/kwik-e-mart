<h1><?php echo h($persona['Persona']['name']); ?></h1>

<p><small>Email: <?php echo $persona['Persona']['email']; ?></small></p>
<p><small>Created: <?php echo $persona['Persona']['created']; ?></small></p>
<p><?php echo $this->Html->link('Edit', array('action' => 'edit', $persona['Persona']['id'])); ?></p>
<p><?php echo $this->Html->link('Delete', array('action' => 'delete', $persona['Persona']['id'])); ?></p>