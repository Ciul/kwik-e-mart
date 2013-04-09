<?php
	# App Routes
	$this->Html->scriptStart(array('inline' => true));
	echo 'window.app = ' . json_encode(array(
		'base'		=> $this->request->base,
		'fullbase'	=> $this->Html->url('/', true),
		'webroot'	=> $this->request->webroot,
		'here'		=> $this->request->here,
		'url'		=> $this->request->url,
		'img'		=> $this->request->webroot . 'img',
		'css'		=> $this->request->webroot . 'css',
		'js'		=> $this->request->webroot . 'js',
		'files'		=> $this->request->webroot . 'files'
	));
	echo $this->Html->scriptEnd();
?>