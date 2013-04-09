<!-- app/View/Sections/add.ctp -->
<div class="section form">
<?php echo $this->Form->create('Section'); ?>
    <fieldset>
        <legend><?php echo __('Add Section'); ?></legend>
        <?php
			echo $this->Form->input('name');
			echo $this->Form->input('published');
		?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>