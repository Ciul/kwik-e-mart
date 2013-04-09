<!-- File: /app/View/Products/index.ctp -->

<h1>Store Products</h1>
<p><?php echo $this->Html->link("Add Product", array('action' => 'add')); ?></p>
<table>
    <tr>
        <th>Name</th>
		<th>Action</th>
		<th>Section</th>
    </tr>

<?php foreach ($products as $product): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($product['Product']['name'], array('action' => 'view', $product['Product']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link('View', array('action' => 'view', $product['Product']['id'])); ?>
			<?php echo $this->Html->link('Edit', array('action' => 'edit', $product['Product']['id'])); ?>
			<?php echo $this->Html->link('Delete', array('action' => 'delete', $product['Product']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($product['Section']['name'], array('controller' => 'sections', 'action' => 'view', $product['Section']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>

</table>