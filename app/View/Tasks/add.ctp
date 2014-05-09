<h2>Aufgabe definieren</h2>
<?php 
	echo $this->Form->create('Task', array('class'=>'form-horizontal', 'role' => 'form'));
?>
<div class="row" style="margin-left:10px; ">  
<div class="form-group col-sm-5">
	<label for="inputName">Name</label>
	<?php 
		echo $this->Form->input('name', array('id'=>'inputName', 'type'=>'text','class'=>'form-control','placeholder'=>'Aufgabenname','label' => FALSE));
	?>
</div>
</div>

<div class="row" style="margin-left:10px; ">  
<div class="form-group col-sm-5">
	<label for="inputDesc">Beschreibung</label>
	<?php 
		echo $this->Form->input('description', array('id'=>'inputDesc', 'type'=>'text','class'=>'form-control', 'placeholder'=>'Beschreibung','label' => FALSE));
	?>
</div>
</div>

<div class="row" style="margin-left:10px; ">  
<div class="form-group col-sm-5">
	<label for="inputDuration">Dauer</label>
	<?php
		echo $this->Form->input('duration', array('id'=>'inputDuration', 'type'=>'text','class'=>'form-control', 'placeholder'=>'Dauer in Stunden','label' => FALSE));
	?>
</div>
</div>

<div class="row" style="margin-left:25px; ">
<div class="form-group">
<button type="submit" class="btn btn-primary">Speichern</button>
<a href="../tasks/index" class="btn btn-primary" role="button">Zurück</a></p>
</div>
</div>
<?php	
	echo $this->Form->end();
?>

