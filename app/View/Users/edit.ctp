<h2> Benutzer bearbeiten </h2>
<?php
echo $this->Form->create('User', array('class'=>'form-horizontal', 'novalidate' => true, 'role' => 'form'));
?>

  <div class="form-group">
	<label for="FirstName" class="col-sm-1 control-label">Vorname</label>
	<?php 
		echo $this->Form->input('first_name', array('id'=>'FirstName', 'type'=>'text','class'=>'form-control', 'placeholder'=>'Vorname','label' => FALSE,'div' => array('class'=>'col-sm-5')));
	?>
</div>
  
 <div class="form-group">
	<label for="FamilyName" class="col-sm-1 control-label">Nachname</label>
	<?php 
		echo $this->Form->input('family_name', array('id'=>'FamilyName', 'type'=>'text','class'=>'form-control', 'placeholder'=>'Nachname','label' => FALSE,'div' => array('class'=>'col-sm-5')));
	?>
</div>

<div class="form-group">
	<label for="Mail" class="col-sm-1 control-label">Mail</label>
	<?php 
		echo $this->Form->input('mail', array('id'=>'Mail', 'type'=>'text','class'=>'form-control', 'placeholder'=>'Mail','label' => FALSE,'div' => array('class'=>'col-sm-5')));
	?>
</div>
  
<div class="form-group">
	<label for="Password" class="col-sm-1 control-label">Neues Passwort</label>
	<?php 
		echo $this->Form->input('password', array('id'=>'Password', 'type'=>'text','class'=>'form-control', 'placeholder'=>'Passwort','label' => FALSE,'div' => array('class'=>'col-sm-5')));
	?>
</div>

<div class="form-group">
	<label for="Active" class="col-sm-1 control-label">Aktiviert</label>
    <?php 
		echo $this->Form->input('active', array('id'=>'Active', 'type'=>'checkbox','class'=>'input-group-addon','label' => FALSE,'div' => array('class'=>'col-sm-6')));
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

