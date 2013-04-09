<?php
	$response = array(
		'products'	=> $products,
		'success'	=> !empty($products)
	);
	echo json_encode($response);
?>