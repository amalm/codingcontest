<h2>Contest planen</h2>
<?php 
	echo $this->Form->create('Contest', array('class'=>'form-horizontal', 'role' => 'form'));
?>
<div class="row" style="margin-left:10px; ">  
<div class="form-group col-sm-5">
	<label for="inputName">Name</label>
        <?php 
		echo $this->Form->input('name', array('id'=>'inputName', 'type'=>'text','class'=>'form-control','placeholder'=>'Contestname','label' => FALSE));
	?>
</div>
</div>

	<label for="inputStart" style="padding-left:10px; ">Start</label>
        <div class="row" style="padding-left:10px; ">
        <div class="input-group date form_datetime col-md-5" data-date="<?php echo (date("Y-m-d")." ".date("H:i"));?>" data-date-format="yyyy-mm-dd HH:ii" data-link-field="inputStart">
	<?php
		echo $this->Form->input('start', array('id'=>'inputStart', 'label'=>FALSE,'class'=>'form-control', 'placeholder'=>'Start','size'=>'16', 'type'=>'text'));
	?>
            <span class="input-group-addon"><span class="glyphicon glyphicon-remove" title="L&ouml;schen"></span></span>
        <span class="input-group-addon"  style="border-bottom-right-radius: 4px; border-top-right-radius: 4px;"><span class="glyphicon glyphicon-th" title="Kalender"></span></span>
	<input type="hidden" id="inputStart" value="" /><br/>
        </div>
        </div>
        <br>
        

	<label for="inputEnd" style="padding-left:10px; ">Ende</label>
        <div class="row" style="padding-left:10px; ">
	<div class="input-group date form_datetime col-md-5" data-date="<?php echo (date("Y-m-d")." ".date("H:i"));?>" data-date-format="yyyy-mm-dd HH:ii" data-link-field="inputEnd">
	<?php
		echo $this->Form->input('end', array('id'=>'inputEnd', 'label'=>FALSE,'class'=>'form-control', 'placeholder'=>'Ende', 'size'=>'16', 'type'=>'text'));
	?>
	<span class="input-group-addon"><span class="glyphicon glyphicon-remove" title="L&ouml;schen"></span></span>
        <span class="input-group-addon"><span class="glyphicon glyphicon-th" title="Kalender"></span></span>
	</div>
            </div>
	<input type="hidden" id="inputEnd" value="" /><br/>


<div class="row" style="margin-left:10px; ">  
<div class="form-group col-sm-5">
	<label for="inputTask">Aufgabe</label>
	<?php 
		echo $this->Form->input('task_id', array('id'=>'inputTask', 'label'=>FALSE, 'class'=>'form-control'));
	?>
</div>
</div>

<div class="row" style="margin-left:10px; ">  
<div class="form-group col-sm-5">
	<label for="inputVisible">Sichtbar</label>
        <?php   
		echo $this->Form->input('visible', array('id'=>'inputVisible', 'type'=>'checkbox','class'=>'input-group-addon','label' => FALSE));
	?>
</div>
</div>

<div class="row" style="margin-left:25px; ">
<div class="form-group">
<button type="submit" class="btn btn-primary">Contest speichern</button>
<a href="../contests/index" class="btn btn-primary" role="button">Zurück</a></p>
<?php	
	echo $this->Form->end();
?>
</div>
</div>
<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        language:  'de',
        weekStart: 1,
        todayBtn:  0,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            forceParse: 0,
        showMeridian: 0
    });
</script>