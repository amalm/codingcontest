<h2> Persönliche Daten bearbeiten </h2>
<?php
echo $this->Form->create('User', array('class'=>'form-horizontal', 'novalidate' => true, 'role' => 'form'));
?>

<div class="row" style="margin-left:10px; ">
  <div class="form-group col-sm-5">
	<label for="FirstName">Vorname</label>
	<?php 
		echo $this->Form->input('first_name', array('id'=>'FirstName', 'type'=>'text','class'=>'form-control', 'placeholder'=>'Vorname','label' => FALSE));
	?>
</div>
</div>
  
<div class="row" style="margin-left:10px; ">
  <div class="form-group col-sm-5">
	<label for="FamilyName">Nachname</label>
	<?php 
		echo $this->Form->input('family_name', array('id'=>'FamilyName', 'type'=>'text','class'=>'form-control', 'placeholder'=>'Nachname','label' => FALSE));
	?>
</div>
</div>

<label for="birthday" style="padding-left:10px; ">Geburtsdatum</label>
	<div class="row" style="padding-left:10px; ">
	<div class="input-group date form_datetime col-md-5" data-date="<?php echo (date("Y-m-d"));?>" data-date-format="yyyy-mm-dd" data-placement="right" data-link-field="inputEnd">
		
	<?php
		echo $this->Form->input('birthday', array('id'=>'birthday', 'label'=>FALSE,'class'=>'form-control', 'placeholder'=>'Geburtsdatum', 'type'=>'text'));
	?>
	<span class="input-group-addon"><span class="glyphicon glyphicon-remove" title="L&ouml;schen"></span></span>
        <span class="input-group-addon"><span class="glyphicon glyphicon-th" title="Kalender"></span></span>
	</div>
	</div>

<br>

<div class="row" style="margin-left:10px; ">
  <div class="form-group col-sm-5">
	<label for="Mail">E-Mail</label>
	<?php 
		echo $this->Form->input('mail', array('id'=>'Mail', 'type'=>'text','class'=>'form-control', 'placeholder'=>'Mail','label' => FALSE));
	?>
</div>
</div>
  
<div class="row" style="margin-left:10px; ">
  <div class="form-group col-sm-5">
	<label for="Password">Neues Passwort</label>
	<?php 
		echo $this->Form->input('password', array('id'=>'Password', 'type'=>'text','class'=>'form-control', 'placeholder'=>'Passwort','label' => FALSE));
	?>
</div>
</div>

<div class="row" style="margin-left:10px; ">
  <div class="form-group col-sm-5">
	<label for="Adresse">Adresse</label>
	<?php 
		echo $this->Form->input('address', array('id'=>'address', 'type'=>'text','class'=>'form-control', 'placeholder'=>'Neues Passwort bestätigen','label' => FALSE));
	?>
</div>
</div>

<div class="row" style="margin-left:10px; ">
  <div class="form-group col-sm-5">
	<label for="PLZ">PLZ</label>
	<?php 
		echo $this->Form->input('plz', array('id'=>'plz', 'type'=>'text','class'=>'form-control', 'placeholder'=>'Neues Passwort bestätigen','label' => FALSE));
	?>
</div>
</div>

	
<div class="row" style="margin-left:25px; ">
<div class="form-group">
  <p> <button type="submit" class="btn btn-primary">Speichern</button> 
 <a href="../" class="btn btn-primary" role="button">Zurück</a></p>
</div>
    </div>
</form>

<?php
echo $this->Form->end();
?>

<script type="text/javascript">
    $('.form_datetime').datetimepicker({
    	format: "dd-mm-yyyy",
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
