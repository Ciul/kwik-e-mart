<?php
# /app/View/Personas/login.ctp

# Stylesheets
	echo $this->Html->css(array(
		'personas/login.css'
	));

# Variables
	

	echo $this->Form->create('Persona', array(
		'class'		=> 'form-login'
	));
?>
    <fieldset>
        <legend><?php echo __('Loguearse'); ?></legend>
        <?php
			echo $this->Form->input('email', array(
				'label'			=> false,
				'div'			=> false,
				'class'			=> 'input-block-level',
				'placeholder'	=> 'Email'
			));
		
			echo $this->Form->input('password', array(
				'label'			=> false,
				'div'			=> false,
				'class'			=> 'input-block-level',
				'placeholder'	=> 'Contraseña'
			));
			
			echo $this->Form->submit('Entrar', array(
				'class'	=> 'btn btn-primary btn-block btn-large',
				'div'	=> false
			));
    ?>
    </fieldset>
	
<?php echo $this->Form->end(); ?>