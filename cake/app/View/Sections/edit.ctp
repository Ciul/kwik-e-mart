<!-- app/View/Sections/edit.ctp -->
<div class="section form">
<?php echo $this->Form->create('Section'); ?>
    <fieldset>
        <legend><?php echo __('Edit Section'); ?></legend>
        <?php
			echo $this->Form->input('name');
			echo $this->Form->input('published');
		?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>