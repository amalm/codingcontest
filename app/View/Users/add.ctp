<h2> Benutzer hinzufügen</h2>
<?php
echo $this->Form->create('User', array('action'=>'add','class'=>'form-horizontal', 'role' => 'form'));
echo $this->Form->input('id', array('type'=>'hidden'));
?>

<div class="row" style="margin-left:10px; ">  
<div class="form-group col-sm-5">
	<label for="FirstName">Vorname</label>
	<?php 
		echo $this->Form->input('first_name', array('id'=>'FirstName', 'type'=>'text','class'=>'form-control', 'placeholder'=>'Vorname','label' => FALSE));
	?>
</div>
</div>
 
<div class="row" style="margin-left:10px; ">  
 <div class="form-group col-sm-5">
	<label for="FamilyName">Nachname</label>
	<?php 
		echo $this->Form->input('family_name', array('id'=>'FamilyName', 'type'=>'text','class'=>'form-control', 'placeholder'=>'Nachname','label' => FALSE));
	?>
</div>
</div>

<div class="row" style="margin-left:10px; ">  
 <div class="form-group col-sm-5">
	<label for="Mail">E-Mail</label>
	<?php 
		echo $this->Form->input('mail', array('id'=>'Mail', 'type'=>'text','class'=>'form-control', 'placeholder'=>'E-Mail','label' => FALSE));
	?>
</div>
</div>
  
<div class="row" style="margin-left:10px; ">  
 <div class="form-group col-sm-5">
	<label for="Password">Passwort</label>
	<?php 
		echo $this->Form->input('password', array('id'=>'Password', 'type'=>'text','class'=>'form-control', 'placeholder'=>'Passwort','label' => FALSE));
	?>
</div>
</div>
  
<div class="row" style="margin-left:25px; ">
<div class="form-group">
    <p> <button type="submit" class="btn btn-primary">Speichern</button> 
    <a href="../users/index" class="btn btn-primary" role="button">Zurück</a></p>
</div>
</div>

<?php
echo $this->Form->end();
?>