<p>Hola <b><?php echo $name; ?></b>,</p>
<p>Est&aacute;s a punto a hacer parte de la manada.</p>
<p>Por confirma tu cuenta haciendo click en el siguiente enlace: </p>
<p>
	<a href="<?php echo Router::url(array('controller' => 'personas', 'action' => 'confirm', $id), true); ?>">Confirmar cuenta</a>
</p>
<p>Gracias ;)</p>
<hr />
<h2>Kwik-e-mart</h2>