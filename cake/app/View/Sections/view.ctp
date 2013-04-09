<h1><?php echo h($section['Section']['name']); ?></h1>

<p><small>Created: <?php echo $section['Section']['created']; ?></small></p>
<p><?php echo $this->Html->link('Edit', array('action' => 'edit', $section['Section']['id'])); ?></p>
<p><?php echo $this->Html->link('Delete', array('action' => 'delete', $section['Section']['id'])); ?></p>