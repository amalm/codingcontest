<?php
echo $this->Form->create('User', array('class'=>'form-horizontal', 'role' => 'form'));
?>


	
<form class="form-signin" role="form">
	
<h2 class="form-signin-heading">Anmelden</h2>

	<label for="Mail" class="col-sm-1 control-label">Mail</label>
	<?php 
		echo $this->Form->input('mail', array('id'=>'Mail', 'type'=>'email', 'required', 'autofocus','class'=>'form-control', 'placeholder'=>'Mail','label' => FALSE,'div' => array('class'=>'col-sm-3')));
	?>

	<label for="Password" class="col-sm-1 control-label">Passwort</label>
	<?php 
		echo $this->Form->input('password', array('id'=>'Password', 'type'=>'password', 'required','class'=>'form-control', 'placeholder'=>'Passwort','label' => FALSE,'div' => array('class'=>'col-sm-3')));
	?>

<div class="form-group">
  <p> <button type="submit" class="btn btn-default">Login</button> 
  </div>
  
</form>

<?php
echo $this->Form->end();
?>
