<h2>Bitte Anmelden</h2>
<?php
echo $this->Form->create('User', array('class'=>'form-horizontal', 'role' => 'form'));
?>

<div class="form-group">
	<label for="Mail" class="col-sm-1 control-label">Mail</label>
	<?php 
		echo $this->Form->input('mail', array('id'=>'Mail', 'type'=>'text','class'=>'form-control', 'placeholder'=>'Mail','label' => FALSE,'div' => array('class'=>'col-sm-5')));
	?>
</div>
  
<div class="form-group">
	<label for="Password" class="col-sm-1 control-label">Passwort</label>
	<?php 
		echo $this->Form->input('password', array('id'=>'Password', 'type'=>'password','class'=>'form-control', 'placeholder'=>'Passwort','label' => FALSE,'div' => array('class'=>'col-sm-5')));
	?>
</div>

<div class="form-group">
  <p> <button type="submit" class="btn btn-default">Login</button> 
  </div>

<?php
echo $this->Form->end();
?>
