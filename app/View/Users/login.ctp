<h2>Anmelden</h2>
<?php
echo $this->Form->create('User', array('class'=>'form-horizontal', 'role' => 'form'));
?>

<div class="form-group">
	<label for="Mail" class="col-sm-1 control-label">Mail</label>
	<?php 
		echo $this->Form->input('mail', array('id'=>'mail', 'type'=>'text','class'=>'form-control', 'placeholder'=>'Mail','label' => FALSE,'div' => array('class'=>'col-sm-5')));
	?>
</div>
  
<div class="form-group">
	<label for="Password" class="col-sm-1 control-label">Passwort</label>
	<?php 
		echo $this->Form->input('password', array('id'=>'password', 'type'=>'password','class'=>'form-control', 'placeholder'=>'Passwort','label' => FALSE,'div' => array('class'=>'col-sm-5')));
	?>
</div>

<div class="form-signin">
  <p> <button type="submit" class="btn btn-lg btn-primary btn-block">Anmelden</button> 
  </div>

<?php
echo $this->Form->end();
?>
