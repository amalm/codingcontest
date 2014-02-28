<h2> Persönliche Daten bearbeiten </h2>
<?php
echo $this->Form->create('User', array('class'=>'form-horizontal', 'role' => 'form'));
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
		echo $this->Form->input('Password', array('id'=>'Password', 'type'=>'password','class'=>'form-control', 'placeholder'=>'Passwort','label' => FALSE,'div' => array('class'=>'col-sm-5')));
	?>
</div>


<div class="form-group">
  <p> <button type="submit" class="btn btn-default">Speichern</button> 
 <a href="../" class="btn btn-default" role="button">Zurück</a></p>
</div>
</form>

<?php
echo $this->Form->end();
?>

