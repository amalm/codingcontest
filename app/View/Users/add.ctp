<h2> Benutzer hinzufügen</h2>
<?php
echo $this->Form->create('User', array('action'=>'add','class'=>'form-horizontal', 'role' => 'form'));
echo $this->Form->input('ID', array('type'=>'hidden'));
?>

  <div class="form-group">
	<label for="FirstName" class="col-sm-1 control-label">Vorname</label>
	<?php 
		echo $this->Form->input('First name', array('id'=>'FirstName', 'type'=>'text','class'=>'form-control', 'placeholder'=>'Vorname','label' => FALSE,'div' => array('class'=>'col-sm-5')));
	?>
</div>
  
 <div class="form-group">
	<label for="FamilyName" class="col-sm-1 control-label">Nachname</label>
	<?php 
		echo $this->Form->input('Family name', array('id'=>'FamilyName', 'type'=>'text','class'=>'form-control', 'placeholder'=>'Nachname','label' => FALSE,'div' => array('class'=>'col-sm-5')));
	?>
</div>

<div class="form-group">
	<label for="Mail" class="col-sm-1 control-label">Mail</label>
	<?php 
		echo $this->Form->input('Mail', array('id'=>'Mail', 'type'=>'text','class'=>'form-control', 'placeholder'=>'Mail','label' => FALSE,'div' => array('class'=>'col-sm-5')));
	?>
</div>
  
<div class="form-group">
	<label for="Password" class="col-sm-1 control-label">Passwort</label>
	<?php 
		echo $this->Form->input('Password', array('id'=>'Password', 'type'=>'text','class'=>'form-control', 'placeholder'=>'Passwort','label' => FALSE,'div' => array('class'=>'col-sm-5')));
	?>
</div>
  
<div class="form-group">
  <p> <button type="submit" class="btn btn-default">Submit</button> 
 <a href="../users/index" class="btn btn-default" role="button">Return</a></p>
</div>

<?php
echo $this->Form->end();
?>