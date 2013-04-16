<?php
# /app/View/Elements/navbar.ctp

$user = $this->Session->read('Auth.User');
// debug($user);
?>


<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="<?php echo $this->Html->url('/'); ?>" class="brand">Kwik-e-mart</a>
			<!-- Collapsable navbar items -->
			<div class="nav-collapse collapse">	
				<ul class="nav">
					<li><a href="#"></a></li>
					<!-----------------------------------
						If user is logged in
					------------------------------------->
					<?php if(!empty($user)): ?>
						<li>
							<a href="<?php echo $this->Html->url(array('controller' => 'stores', 'action' => 'view')); ?>">
								<b>Tienda</b>
							</a>
						</li>
					<?php endif; ?>
				</ul>
				<ul class="pull-right">
					<?php if(empty($user)): ?>
						<!-----------------------------------
							If user is not logged in
						------------------------------------->
						<li class="btn-group">
						  <button class="btn">
								<a href="<?php echo $this->Html->url(array('controller' => 'personas', 'action' => 'login')); ?>">
									<span class="icon-user"></span>
									Entrar
								</a>
							</button>
						  <button class="btn dropdown-toggle" data-toggle="dropdown">
							<span class="caret"></span>
						  </button>
						  <ul class="dropdown-menu">
							<li>
								<a href="<?php echo $this->Html->url(array('controller' => 'personas', 'action' => 'signup')); ?>">
									<span class="icon-chevron-right"></span> 
									<span class="icon-heart"></span>
									Registrarse
								</a>
							</li>
						  </ul>
						</li>
					<?php elseif(!empty($user)): ?>
						<!-----------------------------------
							If user is logged in
						------------------------------------->
						<li class="btn-group">
						  <button class="btn">
								<a href="<?php echo $this->Html->url(array('controller' => 'personas', 'action' => 'view', 'me')); ?>">
									<span class="icon-user"></span>
									Perfil
								</a>
							</button>
						  <button class="btn dropdown-toggle" data-toggle="dropdown">
							<span class="caret"></span>
						  </button>
						  <ul class="dropdown-menu">
							<li>
								<a href="<?php echo $this->Html->url(array('controller' => 'stores', 'action' => 'view')); ?>">
									<span class="icon-chevron-right"></span> 
									<span class="icon-shopping-cart"></span> 
									Tienda
								</a>
							</li>
							<li>
								<a href="<?php echo $this->Html->url(array('controller' => 'personas', 'action' => 'logout')); ?>">
									<span class="icon-chevron-right"></span> 
									<span class="icon-off"></span> 
									Salir
								</a>
							</li>
							<?php if($user['is_admin']): ?>
								<li class="divider"></li>
								<li class="nav-header"><span class="icon-wrench"></span> Administrador</li>
								<li>
									<a href="<?php echo $this->Html->url(array('controller' => 'personas', 'action' => 'index')); ?>">
										<span class="icon-chevron-right"></span> 
										<span class="icon-user"></span> Personas
									</a>
								</li>
								<li>
									<a href="<?php echo $this->Html->url(array('controller' => 'sections', 'action' => 'index')); ?>">
										<span class="icon-chevron-right"></span> 
										<span class="icon-th-large"></span> Secciones
									</a>
								</li>
								<li>
									<a href="<?php echo $this->Html->url(array('controller' => 'products', 'action' => 'index')); ?>">
										<span class="icon-chevron-right"></span> 
										<span class="icon-briefcase"></span> Productos
									</a>
								</li>
							<?php endif; ?>
						  </ul>
						</li>
					<?php endif; ?>
				</ul>
				<!--/ .pull.right -->
			</div>
			<!--/ .nav-collapse -->
		</div>
		<!--/ .container -->
	</div>
	<!--/ .nav-inner -->
</nav>
<!--/ .navbar -->