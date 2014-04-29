<h2>Input und Output definieren</h2>
<?php 
	echo $this->Form->create('Inputsoutput', array('class'=>'form-horizontal', 'role' => 'form'));
?>
<div class="form-group">
	<label for="inputName" class="col-sm-2 control-label" style="text-align: left;">Input</label>
	<?php 
		echo $this->Form->input('input', array('id'=>'inputName', 'type'=>'text','class'=>'form-control','placeholder'=>'Input','label' => FALSE,'div' => array('class'=>'col-sm-5')));
	?>
</div>

<div class="form-group">
	<label for="inputDesc" class="col-sm-2 control-label" style="text-align: left;">Output</label>
	<?php 
		echo $this->Form->input('output', array('id'=>'inputDesc', 'type'=>'text','class'=>'form-control', 'placeholder'=>'Output','label' => FALSE,'div' => array('class'=>'col-sm-5')));
	?>
</div>

<button type="submit" class="btn btn-primary">Speichern</button>

<?php	
    echo $this->Form->end();
?>

