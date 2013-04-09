<h1><?php echo h($product['Product']['name']); ?></h1>

<p><small>Section: <?php echo $product['Section']['name']; ?></small></p>
<p><small>Created: <?php echo $product['Product']['created']; ?></small></p>
<p><?php echo $this->Html->link('Edit', array('action' => 'edit', $product['Product']['id'])); ?></p>
<p><?php echo $this->Html->link('Delete', array('action' => 'delete', $product['Product']['id'])); ?></p>