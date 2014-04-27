<h2> Benutzer hinzufügen</h2>
<?php
echo $this->Form->create('User', array('action'=>'add','class'=>'form-horizontal', 'role' => 'form'));
echo $this->Form->input('id', array('type'=>'hidden'));
?>

  <div class="form-group">
	<label for="FirstName" class="col-sm-1 control-label" style="text-align: left;">Vorname</label>
	<?php 
		echo $this->Form->input('first_name', array('id'=>'FirstName', 'type'=>'text','class'=>'form-control', 'placeholder'=>'Vorname','label' => FALSE,'div' => array('class'=>'col-sm-5')));
	?>
</div>
  
 <div class="form-group">
	<label for="FamilyName" class="col-sm-1 control-label" style="text-align: left;">Nachname</label>
	<?php 
		echo $this->Form->input('family_name', array('id'=>'FamilyName', 'type'=>'text','class'=>'form-control', 'placeholder'=>'Nachname','label' => FALSE,'div' => array('class'=>'col-sm-5')));
	?>
</div>

<div class="form-group">
	<label for="Mail" class="col-sm-1 control-label" style="text-align: left;">E-Mail</label>
	<?php 
		echo $this->Form->input('mail', array('id'=>'Mail', 'type'=>'text','class'=>'form-control', 'placeholder'=>'Mail','label' => FALSE,'div' => array('class'=>'col-sm-5')));
	?>
</div>
  
<div class="form-group">
	<label for="Password" class="col-sm-1 control-label" style="text-align: left;">Passwort</label>
	<?php 
		echo $this->Form->input('password', array('id'=>'Password', 'type'=>'text','class'=>'form-control', 'placeholder'=>'Passwort','label' => FALSE,'div' => array('class'=>'col-sm-5')));
	?>
</div>
  
<div class="form-group">
    <p> <button type="submit" class="btn btn-primary">Speichern</button> 
    <a href="../users/index" class="btn btn-primary" role="button">Zur&uuml;ck</a></p>
</div>

<?php
echo $this->Form->end();
?>