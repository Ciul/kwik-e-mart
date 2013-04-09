<!-- app/View/Products/add.ctp -->
<div class="products form">
<?php echo $this->Form->create('Product'); ?>
    <fieldset>
        <legend><?php echo __('Add Product'); ?></legend>
        <?php
			echo $this->Form->input('name');
			echo $this->Form->input('published');
			echo $this->Form->input('section_id');
		?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>