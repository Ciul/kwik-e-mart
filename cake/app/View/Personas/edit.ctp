<!-- app/View/Personas/edit.ctp -->
<div class="personas form">
<?php echo $this->Form->create('Persona'); ?>
    <fieldset>
        <legend><?php echo __('Edit Persona'); ?></legend>
        <?php
			echo $this->Form->input('name');
			echo $this->Form->input('email');
			echo $this->Form->input('password', array(
				'value'	=> ''
			));
			echo $this->Form->input('enabled');
			echo $this->Form->input('confirmed');
			echo $this->Form->input('is_admin');
		?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>