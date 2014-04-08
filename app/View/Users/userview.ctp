<h2> Persönlichen Daten </h2>
<div class="table-responsive">
 <table class="table table-hover">
    <tr><td>Vorname:</td><td><?php echo $user['User']['first_name']; ?></td></tr>
    <tr><td>Nachname:</td><td><?php echo $user['User']['family_name']; ?></td></tr>
    <tr><td>E-Mail:</td><td><?php echo $user['User']['mail']; ?></td></tr>
    <tr><td>Adresse:</td><td><?php echo $user['User']['address']; ?></td></tr>
    <tr><td>PLZ:</td><td><?php echo $user['User']['plz']; ?></td></tr>
  </table>
</div>

<form role="form">
<div class="form-group">
<?php echo $this->Html->link('<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span>Bearbeiten</button>',   array('action'=>'useredit', $user['User']['id']), array('escape'=>false)); ?>

 <a href="../" class="btn btn-default" role="button">Zurück</a></p>
</div>
</form>