<?php
	$close = isset($close) ? $close : true;
	$class = isset($class) ? $class : '';
	$block = isset($block) ? $block : false;
?>
<div class="alert <?php echo $class; ?> <?php if ($block) echo 'alert-block'; ?>" >
	<?php if($close): ?><button type="button" class="close" data-dismiss="alert">&times;</button><?php endif; ?>
	<?php echo $message; ?>
</div>