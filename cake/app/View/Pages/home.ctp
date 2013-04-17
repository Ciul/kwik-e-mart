<?php
# /app/View/Pages/home.ctp

# Stylesheets
	echo $this->Html->css(array(
		'pages/home.css'
	));

# Variables
	$user = $this->Session->read('Auth.User');
	$btn_link = empty($user) ? array('controller' => 'personas', 'action' => 'signup') : array('controller' => 'stores', 'action' => 'view');
?>

<!-- Jumbotron -->
<div class="jumbotron">
	<h1><span id="welcome">Bienvenido</span> a <br/>Kwik-e-mart</h1>
	<p class="lead">Tu tienda inteligente. Incluso más inteligente que tu mascota <span class="icon-heart"></span></p>
	<a class="btn btn-large btn-success" href="<?php echo $this->Html->url($btn_link); ?>">Empezar a ahorrar tiempo</a>
</div>

<hr/>

<div class="container-fluid">
	<div id="explanation" class="span12">
		<h2>¿Qu&eacute; es Kwik-e-mart?</h2>
		<p class="lead">Kwik-e-mart es una aplicaci&oacute;n web que te permite hacer tus compras de manera &aacute;gil y f&aacute;cil.</p>
		<p class="lead">Podr&aacute;s buscar los productos que deseas y Kwik-e-mart te indicar&aacute; d&oacute;nde encontrarlo dentro de la tienda.</p>
		<p class="lead">¿Acaso no es genial? Apuesto que tu mascota no puede hacer ese truco.</p>
	</div>
</div>

<div id="work-team" class="container-fluid">
	<div class="row-fluid title">
		<h1 class="span12">Nuestro Equipo de Trabajo</h1>
	</div>
	
	<hr/>
	<!-- Thumbnails -->
	<div class="row-fluid">
		<ul class="thumbnails">
			
			<!-- Luis Carlos Osorio -->
			<li class="span4">
				<a href="http://facebook.com/558897400" itemscope itemtype="http://data-vocabulary.org/Person" target="_blank">
					<div class="thumbnail">
						<img itemprop="photo" src="http://graph.facebook.com/558897400/picture?width=200&height=200" alt="Luis Carlos Osorio Jayk" title="Luis Carlos Osorio Jayk" class="img-circle"/>
						<h3 itemprop="name">Luis Carlos Osorio Jayk</h3>
					</div>
				</a>
			</li>
			<!-- Luis Fran Cardozo -->
			<li class="span4">
				<a href="http://facebook.com/577560958" itemscope itemtype="http://data-vocabulary.org/Person" target="_blank">
					<div class="thumbnail">
						<img itemprop="photo" src="http://graph.facebook.com/577560958/picture?width=200&height=200" alt="Luis Fran Cardozo" title="Luis Fran Cardozo" class="img-circle"/>
						<h3 itemprop="name">Luis Fran Cardozo</h3>
					</div>
				</a>
			</li>
			
			<!-- Ronald Romero -->
			<li class="span4">
				<a href="http://facebook.com/544812214" itemscope itemtype="http://data-vocabulary.org/Person" target="_blank">
					<div class="thumbnail">
						<img itemprop="photo" src="http://graph.facebook.com/544812214/picture?width=200&height=200" alt="Ronald Romero" title="Ronald Romero" class="img-circle"/>
						<h3 itemprop="name">Ronald Romero</h3>
					</div>
				</a>
			</li>
			
		</ul>
	</div>
	
	<!-- Thumbnails -->
	<div class="row-fluid">
		<ul class="thumbnails">
		
			<!-- Bladimir García -->
			<li class="span4 offset2">
				<a href="http://facebook.com/614657035" itemscope itemtype="http://data-vocabulary.org/Person" target="_blank">
					<div class="thumbnail">
						<img itemprop="photo" src="http://graph.facebook.com/614657035/picture?width=200&height=200" alt="Bladimir Garc&iacute;a" title="Bladimir Garc&iacute;a" class="img-circle"/>
						<h3 itemprop="name">Bladimir Garc&iacute;a</h3>
					</div>
				</a>
			</li>
			
			<!-- Freddy Celin Teran -->
			<li class="span4">
				<a href="http://facebook.com/644696383" itemscope itemtype="http://data-vocabulary.org/Person" target="_blank">
					<div class="thumbnail">
						<img itemprop="photo" src="http://graph.facebook.com/644696383/picture?width=200&height=200" alt="Freddy Celin Ter&aacute;n" title="Freddy Celin Ter&aacute;n" class="img-circle"/>
						<h3 itemprop="name">Freddy Celin Ter&aacute;n</h3>
					</div>
				</a>
			</li>
			
		</ul>
	</div>
</div>