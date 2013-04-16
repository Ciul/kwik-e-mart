<?php
# Stylesheets
	echo $this->Html->css(array(
		'stores/view.css'
	));

# Scripts
	echo $this->Html->script(array(
		# Raphaeljs
		'libs/raphael/raphael-min',
		# StoreView
		'stores/view'
	), array('inline' => false));
?>

<div class="jumbotron">
	<h1>Mapa</h1>
</div>

<div class="input-append well">
	<?php
		echo $this->Form->input('search', array(
			'type' 				=> 'search',
			'id'				=> 'search',
			'class'				=> 'span10',
			'x-webkit-speech'	=> 'x-webkit-speech',
			'label'				=> false,
			'div'				=> false,
			'placeholder'		=> 'Type product to search',
			'disabled'			=> true
		));
	?>

	<span class="add-on">
		<a id="search-button" href="#">BUSCAR</a>
	</span>
</div>
<div id="map_container"></div>