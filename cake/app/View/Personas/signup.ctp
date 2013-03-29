<!-- app/View/Personas/signup.ctp -->
<div class="personas form">
<?php echo $this->Form->create('Persona'); ?>
    <fieldset>
        <legend><?php echo __('Add Persona'); ?></legend>
        <?php echo $this->Form->input('email');
        echo $this->Form->input('password');
    ?>
    </fieldset>
	
<?php echo $this->Form->end(__('Submit')); ?>
</div>