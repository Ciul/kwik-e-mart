<!-- File: /app/View/Sections/index.ctp -->

<h1>Store Sections</h1>
<p><?php echo $this->Html->link("Add Section", array('action' => 'add')); ?></p>
<table>
    <tr>
        <th>Name</th>
		<th>Action</th>
    </tr>

<?php foreach ($sections as $section): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($section['Section']['name'], array('action' => 'view', $section['Section']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link('View', array('action' => 'view', $section['Section']['id'])); ?>
			<?php echo $this->Html->link('Edit', array('action' => 'edit', $section['Section']['id'])); ?>
			<?php echo $this->Html->link('Delete', array('action' => 'delete', $section['Section']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>

</table>