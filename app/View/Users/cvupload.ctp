<h2>CV hochladen</h2>
<?php 
	echo $this->Form->create('User', array('class'=>'form-horizontal', 'role' => 'form', 'type' => 'file'));
?>

<div class="form-group">
	<label for="inputFile" class="col-sm-2 control-label">Aufgabe</label>
	<?php
		echo $this->Form->input('fileInput', array('id'=>'inputFile', 'type' => 'file','class'=>'form-control','label' => FALSE,'div' => array('class'=>'col-sm-5')));
	?>
</div>

<button type="submit" class="btn btn-primary">Speichern</button>

<?php	
	echo $this->Form->end();
?>
