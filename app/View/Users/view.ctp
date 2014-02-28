<h2> Userdetails </h2>
<div class="table-responsive">
 <table class="table table-hover">
    <tr><td>Vorname:</td><td><?php echo $user['User']['First name']; ?></td></tr>
    <tr><td>Nachname:</td><td><?php echo $user['User']['Family name']; ?></td></tr>
    <tr><td>E-Mail:</td><td><?php echo $user['User']['Mail']; ?></td></tr>
    <tr><td>Registriert am:</td><td><?php echo $user['User']['Registered']; ?></td></tr>
     <tr><td>Bestätigt:</td><td><?php if($user['User']['Accepted'] == 1){echo '<span class="glyphicon glyphicon-ok" style="font-size:15px;"></span>';} else {echo '<span class="glyphicon glyphicon-remove" style="font-size:15px;"></span>';} ?></td></tr>
 	<tr><td>Aktiviert:</td><td><?php if($user['User']['Active'] == 1){echo '<span class="glyphicon glyphicon-ok" style="font-size:15px;"></span>';} else {echo '<span class="glyphicon glyphicon-remove" style="font-size:15px;"></span>';} ?></td></tr>
  </table>
</div>

<form role="form">
<div class="form-group">
<?php echo $this->Html->link('<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span>Bearbeiten</button>',  array('action'=>'edit'), array("escape"=>false)); ?>



 <a href="../" class="btn btn-default" role="button">Return</a></p>
</div>
</form>