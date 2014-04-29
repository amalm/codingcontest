<h2>Contest planen</h2>
<?php 
	echo $this->Form->create('Contest', array('class'=>'form-horizontal', 'role' => 'form'));
?>
<div class="form-group">
	<label for="inputName" class="col-sm-1 control-label" style="text-align: left;">Name</label>
        <?php 
		echo $this->Form->input('name', array('id'=>'inputName', 'type'=>'text','class'=>'form-control','placeholder'=>'Contestname','label' => FALSE,'div' => array('class'=>'col-sm-5')));
	?>
</div>

<div class="form-group">
	<label for="inputStart" class="col-sm-1 control-label" style="text-align: left;">Start</label>
	<div class="input-group date form_datetime col-md-5" data-date="<?php echo (date("Y-m-d")." ".date("H:i"));?>" data-date-format="yyyy-mm-dd HH:ii" data-link-field="inputStart">
	<?php
		echo $this->Form->input('start', array('id'=>'inputStart', 'label'=>FALSE,'class'=>'form-control', 'placeholder'=>'Start','size'=>'16', 'type'=>'text'));
	?>
	<span class="input-group-addon"><span class="glyphicon glyphicon-remove" title="L&ouml;schen"></span></span>
        <span class="input-group-addon"><span class="glyphicon glyphicon-th" title="Kalender"></span></span>
	</div>
	<input type="hidden" id="inputStart" value="" /><br/>
</div>

<div class="form-group">
	<label for="inputEnd" class="col-sm-1 control-label" style="text-align: left;">Ende</label>
	<div class="input-group date form_datetime col-md-5" data-date="<?php echo (date("Y-m-d")." ".date("H:i"));?>" data-date-format="yyyy-mm-dd HH:ii" data-link-field="inputEnd">
	<?php
		echo $this->Form->input('end', array('id'=>'inputEnd', 'label'=>FALSE,'class'=>'form-control', 'placeholder'=>'Ende', 'size'=>'16', 'type'=>'text'));
	?>
	<span class="input-group-addon"><span class="glyphicon glyphicon-remove" title="L&ouml;schen"></span></span>
        <span class="input-group-addon"><span class="glyphicon glyphicon-th" title="Kalender"></span></span>
	</div>
	<input type="hidden" id="inputEnd" value="" /><br/>
</div>

<div class="form-group">
	<label for="inputTask" class="col-sm-1 control-label" style="text-align: left;">Aufgabe</label>
	<?php 
		echo $this->Form->input('task_id', array('id'=>'inputTask', 'label'=>FALSE, 'class'=>'form-control', 'div' => array('class'=>'col-sm-5')));
	?>
</div>

<div class="form-group">
	<label for="inputVisible" class="col-sm-1 control-label" style="text-align: left;">Sichtbar</label>
        <?php   
		echo $this->Form->input('visible', array('id'=>'inputVisible', 'label'=>FALSE, 'class'=>'form-control', 'div' => array('class'=>'col-sm-1')));
	?>
</div>

<button type="submit" class="btn btn-primary">Contest speichern</button>
<a href="../contests/index" class="btn btn-primary" role="button">Zurück</a></p>
<?php	
	echo $this->Form->end();
?>

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