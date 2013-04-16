<?php
# /app/View/Personas/signup.ctp

# Stylesheets
	echo $this->Html->css(array(
		'personas/signup.css'
	));

# Variables
	

	echo $this->Form->create('Persona', array(
		'class'		=> 'form-signup'
	));
?>
    <fieldset>
        <legend><?php echo __('Registrarse'); ?></legend>
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