<?php
# /app/View/Products/index.ctp

# Stylesheets
	echo $this->Html->css(array(
		'products/index.css'
	));

# Variables
	
?>
<div class="row-fluid">
	<div class="boxed">
		<aside class="span3 well">
			<!-- Left Sidebar -->
			<ul class="nav nav-list">
				<li class="nav-header active"><span class="icon-cog"></span> Administrar</li>
				<li class="divider"></li>
				<li><a href="<?php echo $this->Html->url(array('controller' => 'personas', 'action' => 'index')); ?>"><span class="icon-user"></span> Personas</a></li>
				<li><a href="<?php echo $this->Html->url(array('controller' => 'sections', 'action' => 'index')); ?>"><span class="icon-th-large"></span> Secciones</a></li>
				<li class="active"><a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'index')); ?>"><span class="icon-briefcase"></span> Productos</a></li>
			</ul>
		</aside>
	</div>
	<!--/ Left Sidebar -->
	
	<!-- List of Products -->
	<div class="span9">
		<div class="row-fluid">
			<div class="span10"><h2>Productos</h2></div>
			<div class="span2 add">
				<a class="btn btn-info" href="<?php echo $this->Html->url(array('action' => 'add')); ?>">
					<span class="icon-plus"></span> Crear nuevo
				</a>
			</div>
		</div>
		
		<div class="row-fluid">
			<div class="span12">
				<table class="table table-hover">
					<tbody>
						<tr>
							<td>Nombre</td>
							<td>Secci&oacute;n</td>
							<td>Acciones</td>
						</tr>
						<?php
							foreach($products AS $product):
								$row_class		= !$product['Product']['published'] ? 'error' : '';
								$view_link		= array('action' => 'view', $product['Product']['id']);
								$edit_link		= array('action' => 'edit', $product['Product']['id']);
								$delete_link	= array('action' => 'delete', $product['Product']['id']);
						?>
							<tr class="<?php echo $row_class; ?>">
								<td><?php echo $product['Product']['name']; ?></td>
								<td><?php echo $product['Section']['name']; ?></td>
								<td>
									<ul class="display-inline list-style-none">
										<li><a href="<?php echo $this->Html->url($view_link); ?>"><span class="icon-eye-open"></span> View</a></li>
										<li><a href="<?php echo $this->Html->url($edit_link); ?>"><span class="icon-pencil"></span> Edit</a></li>
										<li><a href="<?php echo $this->Html->url($delete_link); ?>"><span class="icon-trash"></span> Delete</a></li>
									</ul>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<!--/ Products -->
  </div>
</div>