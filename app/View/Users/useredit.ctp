<h2> Persönliche Daten bearbeiten </h2>
<?php
echo $this->Form->create('User', array('class'=>'form-horizontal', 'novalidate' => true, 'role' => 'form'));
?>

  <div class="form-group">
	<label for="FirstName" class="col-sm-1 control-label">Vorname</label>
	<?php 
		echo $this->Form->input('first_name', array('id'=>'FirstName', 'type'=>'text','class'=>'form-control', 'placeholder'=>'Vorname','label' => FALSE,'div' => array('class'=>'col-sm-5')));
	?>
</div>
  
 <div class="form-group">
	<label for="FamilyName" class="col-sm-1 control-label">Nachname</label>
	<?php 
		echo $this->Form->input('family_name', array('id'=>'FamilyName', 'type'=>'text','class'=>'form-control', 'placeholder'=>'Nachname','label' => FALSE,'div' => array('class'=>'col-sm-5')));
	?>
</div>

<div class="form-group">
	<label for="Mail" class="col-sm-1 control-label">Mail</label>
	<?php 
		echo $this->Form->input('mail', array('id'=>'Mail', 'type'=>'text','class'=>'form-control', 'placeholder'=>'Mail','label' => FALSE,'div' => array('class'=>'col-sm-5')));
	?>
</div>
  
<div class="form-group">
	<label for="Password" class="col-sm-1 control-label">Neues Passwort</label>
	<?php 
		echo $this->Form->input('password', array('id'=>'Password', 'type'=>'text','class'=>'form-control', 'placeholder'=>'Passwort','label' => FALSE,'div' => array('class'=>'col-sm-5')));
	?>
</div>

<div class="form-group">
	<label for="Adresse" class="col-sm-1 control-label">Adresse</label>
	<?php 
		echo $this->Form->input('address', array('id'=>'address', 'type'=>'text','class'=>'form-control', 'placeholder'=>'Neues Passwort bestätigen','label' => FALSE,'div' => array('class'=>'col-sm-5')));
	?>
</div>

<div class="form-group">
	<label for="PLZ" class="col-sm-1 control-label">PLZ</label>
	<?php 
		echo $this->Form->input('plz', array('id'=>'plz', 'type'=>'text','class'=>'form-control', 'placeholder'=>'Neues Passwort bestätigen','label' => FALSE,'div' => array('class'=>'col-sm-5')));
	?>
</div>

<div class="form-group">
	<label for="birthday" class="col-sm-1 control-label" style="text-align: left;">Geburtstag</label>
	<div class="input-group date form_datetime col-md-5" data-date="<?php echo (date("Y-m-d")." ".date("H:i"));?>" data-date-format="yyyy-mm-dd HH:ii" data-link-field="inputEnd">
	<?php
		echo $this->Form->input('birthday', array('id'=>'birthday', 'label'=>FALSE,'class'=>'form-control', 'size'=>'16', 'type'=>'text'));
	?>
	<span class="input-group-addon"><span class="glyphicon glyphicon-remove" title="L&ouml;schen"></span></span>
        <span class="input-group-addon"><span class="glyphicon glyphicon-th" title="Kalender"></span></span>
	</div>
</div>

<div class="form-group">
  <p> <button type="submit" class="btn btn-primary">Speichern</button> 
 <a href="../" class="btn btn-primary" role="button">Zurück</a></p>
</div>
</form>

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
