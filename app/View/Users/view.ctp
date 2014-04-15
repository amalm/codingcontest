<h2> Userdetails </h2>
<div class="table table-striped">
 <table class="table table-striped">
    <tr><td><strong>Vorname:</strong></td><td><?php echo $user['User']['first_name']; ?></td></tr>
    <tr><td><strong>Nachname:</strong></td><td><?php echo $user['User']['family_name']; ?></td></tr>
    <tr><td><strong>E-Mail:</strong></td><td><?php echo $user['User']['mail']; ?></td></tr>
    <tr><td><strong>Registriert am:</strong></td><td><?php echo $user['User']['registered']; ?></td></tr>
     <tr><td><strong>Bestätigt:</strong></td><td><?php if($user['User']['confirm'] == 1){echo '<span class="glyphicon glyphicon-ok" style="font-size:15px; color:#00CD00;"></span>';} else {echo '<span class="glyphicon glyphicon-remove" style="font-size:15px; color:#fe0802;"></span>';} ?></td></tr>
 	<tr><td><strong>Aktiviert:</strong></td><td><?php if($user['User']['active'] == 1){echo '<span class="glyphicon glyphicon-ok" style="font-size:15px; color:#00CD00;"></span>';} else {echo '<span class="glyphicon glyphicon-remove" style="font-size:15px; color:#fe0802;"></span>';} ?></td></tr>
  </table>
</div>

<form role="form">
<div class="form-group">
<?php echo $this->Html->link('<button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span> Bearbeiten</button>',  array('action'=>'edit', $user['User']['id']), array("escape"=>false)); ?>



 <a href="../" class="btn btn-primary" role="button">Zurück</a></p>
</div>
</form>