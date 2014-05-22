<h2>Lebenslauf hochladen</h2>
<?php 
	echo $this->Form->create('User', array('class'=>'form-horizontal', 'role' => 'form', 'type' => 'file'));
?>

<div class="row" style="margin-left:10px; ">  
<div class="form-group col-sm-5">
	<span class="btn btn-primary btn-file">
            Durchsuchen </span><input type="inputFile"> <?php
		//echo $this->Form->input('fileInput', array('id'=>'inputFile', 'type' => 'file','class'=>'form-control','label' => FALSE));
	?>
        
        
	
</div>
    </div>

<div class="row" style="margin-left:25px; ">
<div class="form-group">
    <button type="submit" class="btn btn-primary">Speichern</button>
</div>
</div>
<?php	
	echo $this->Form->end();
?>
