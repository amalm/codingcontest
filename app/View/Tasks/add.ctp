<h2>Aufgabe definieren</h2>
<?php 
	echo $this->Form->create('Task', array('class'=>'form-horizontal', 'role' => 'form'));
?>
<div class="form-group">
	<label for="inputName" class="col-sm-2 control-label" style="text-align: left;">Name</label>
	<?php 
		echo $this->Form->input('name', array('id'=>'inputName', 'type'=>'text','class'=>'form-control','label' => FALSE,'div' => array('class'=>'col-sm-5')));
	?>
</div>

<div class="form-group">
	<label for="inputDesc" class="col-sm-2 control-label" style="text-align: left;">Beschreibung</label>
	<?php 
		echo $this->Form->input('description', array('id'=>'inputDesc', 'type'=>'text','class'=>'form-control','label' => FALSE,'div' => array('class'=>'col-sm-5')));
	?>
</div>

<div class="form-group">
	<label for="inputDuration" class="col-sm-2 control-label" style="text-align: left;">Dauer</label>
	<?php
		echo $this->Form->input('duration', array('id'=>'inputDuration', 'type'=>'text','class'=>'form-control','label' => FALSE,'div' => array('class'=>'col-sm-5')));
	?>
</div>

<button type="submit" class="btn btn-primary">Speichern</button>
<a href="../tasks/index" class="btn btn-primary" role="button">Zurück</a></p>

<?php	
	echo $this->Form->end();
?>

