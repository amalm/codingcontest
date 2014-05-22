<h2>Level definieren</h2>
<?php 
	echo $this->Form->create('Level', array('class'=>'form-horizontal', 'role' => 'form', 'type' => 'file'));
?>

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
	<label for="inputFile">Aufgabe</label>
	<?php
		echo $this->Form->input('fileInput', array('id'=>'inputFile', 'type' => 'file', 'type'=>'file','class'=>'form-control','label' => FALSE));
	?>
</div>
</div>
    
<div class="row" style="margin-left:25px; ">
<div class="form-group">
<button type="submit" class="btn btn-primary">Speichern</button>
 <?php echo $this->Html->link('<button type="button" class="btn btn-primary">Zurück</button>',  array('action'=>'index', $levelid), array("escape"=>false)); ?>
    
<?php	
	echo $this->Form->end();
?>
</div>
</div>