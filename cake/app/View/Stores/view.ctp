<?php
# Scripts
	echo $this->Html->script(array(
		# Raphaeljs
		'libs/raphael/raphael-min',
		# StoreView
		'stores/view'
	), array('inline' => false));
?>
<h2>Store</h2>
<?php
	echo $this->Form->input('search', array(
		'type' 				=> 'text',
		'x-webkit-speech'	=> 'x-webkit-speech',
		'label'				=> false,
		'div'				=> false,
		'placeholder'		=> 'Type product to search',
		'disabled'			=> true
	));
	echo $this->Form->input('search', array(
		'type'	=> 'button',
		'id'	=> 'search-button',
		'div'	=> false,
		'label'	=> false
	));
?>
<div id="map_container"></div>