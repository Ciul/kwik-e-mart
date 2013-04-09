<!-- app/View/Products/edit.ctp -->
<div class="products form">
<?php echo $this->Form->create('Product'); ?>
    <fieldset>
        <legend><?php echo __('Edit Product'); ?></legend>
        <?php
			echo $this->Form->input('name');
			echo $this->Form->input('published');
			echo $this->Form->input('section_id');
		?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>