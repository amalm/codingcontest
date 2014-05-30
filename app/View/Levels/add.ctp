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
        <label for="">Aufgabe</label><br>
        <div class="input-group">
            <span class="input-group-btn">
                <span class="btn btn-primary btn-file" style="position: relative; overflow: hidden;">
	Durchsuchen
                    <input type="file" name="[fileInput]" style="position: absolute; top: 0; right: 0; min-width: 100%; min-height: 100%; font-size: 999px; text-align: right; filter: alpha(opacity=0); opacity: 0; outline: none; background: white; cursor: inherit; display: block;" required="true"/>   
                </span>
            </span>
            <input class="form-control" style="width: 400px; background-color: white; border-bottom-left-radius: 0; border-top-left-radius: 0;">
        </div>
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