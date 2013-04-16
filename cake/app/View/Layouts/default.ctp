<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title><?php echo $title_for_layout; ?></title>
	<?php
	# Meta tags	
		echo $this->Html->meta('icon'); // Favicon
		echo $this->Html->meta(array('name' =>'viewport', 'content' => 'width=device-width, initial-scale=1.0'));
		echo $this->fetch('meta');

	# Stylesheets
		# Twitter Bootstrap Framework
		echo $this->Html->css('bootstrap/bootstrap');
		echo $this->Html->css('bootstrap/bootstrap-responsive');
		
		# Default
		echo $this->Html->css('default');
		
		# Main CSS Block
		echo $this->fetch('css');
		
		# Javascript at Head
		echo $this->fetch('script-head');
	?>
</head>
<body>
	<!-- Header -->
	<header>
		<?php
			$this->startIfEmpty('navbar');
			echo $this->element('navbar');
			$this->end();
			
			echo $this->fetch('navbar');
		?>
		<?php echo $this->Session->flash(); // Flash messages ?>
	</header>
	<!--/ Header -->
	
	<!-- Container -->
	<div class="container">
		<?php echo $this->fetch('content'); ?>
		
		<hr/>
		<!-- Footer -->
		<footer>
			<div id="copy">
				<p>&copy; DreamMakers <?php echo date('Y'); ?></p>
			</div>
		</footer>
		<!--/ Footer -->
	</div>
	<!--/ Container -->
	<?php
		# Javascript at Bottom
		
			# Mootools
			echo $this->Html->script('mootools/mootools-core.js');
			
			# jQuery
			echo $this->Html->script('jquery/jquery.js');
			echo $this->Html->scriptBlock('$.noConflict();');
			
			# Twitter Bootstrap
			echo $this->Html->script('bootstrap/bootstrap.js');
			
			# Global Javascript Elements
			echo $this->element('global_scripts_vars');
			
			# Main Script Block
			echo $this->fetch('script');
	?>
	<?php // echo $this->element('sql_dump'); ?>
</body>
</html>
