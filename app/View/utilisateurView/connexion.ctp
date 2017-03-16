<?php 

	echo $this->Form->create('Utilisateur');
 ?>
    <fieldset>
        <legend>
            <?php echo __('Please enter your username and password'); ?>
        </legend>
        <?php 
	        echo $this->Form->input('identifiant');
	        echo $this->Form->input('motdepasse', array( 'type'=> 'password',
	        											));
    	?>
    </fieldset>
<?php 
	echo $this->Form->end('Login');
 ?>
