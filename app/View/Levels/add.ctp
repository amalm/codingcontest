<h2>Level definieren</h2>
<?php 
	echo $this->Form->create('Level', array('class'=>'form-horizontal', 'role' => 'form', 'type' => 'file'));
?>

<div class="form-group">
	<label for="inputDesc" class="col-sm-2 control-label">Beschreibung</label>
	<?php 
		echo $this->Form->input('description', array('id'=>'inputDesc', 'type'=>'text','class'=>'form-control','label' => FALSE,'div' => array('class'=>'col-sm-5')));
	?>
</div>

<div class="form-group">
	<label for="inputFile" class="col-sm-2 control-label">Dauer</label>
	<?php
		echo $this->Form->input('file', array('id'=>'inputFile', 'type' => 'file', 'type'=>'file','class'=>'form-control','label' => FALSE,'div' => array('class'=>'col-sm-5')));
	?>
</div>

<button type="submit" class="btn btn-primary">
	Speichern
</button>

<?php	
	echo $this->Form->end();
?>

