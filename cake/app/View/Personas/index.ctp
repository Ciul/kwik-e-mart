<!-- File: /app/View/Personas/index.ctp -->

<h1>Store Personas</h1>
<p><?php echo $this->Html->link("Add Persona", array('action' => 'signup')); ?></p>
<table>
    <tr>
        <th>Name</th>
		<th>Email</th>
		<th>Action</th>
    </tr>

<?php foreach ($personas as $persona): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($persona['Persona']['name'], array('action' => 'view', $persona['Persona']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($persona['Persona']['email'], array('action' => 'view', $persona['Persona']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link('View', array('action' => 'view', $persona['Persona']['id'])); ?>
			<?php echo $this->Html->link('Edit', array('action' => 'edit', $persona['Persona']['id'])); ?>
			<?php echo $this->Html->link('Delete', array('action' => 'delete', $persona['Persona']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>

</table>