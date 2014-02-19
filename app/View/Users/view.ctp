<h2> Userdetails </h2>
<div class="table-responsive">
 <table class="table table-hover">
    <tr><td>Vorname:</td><td><?php echo $user['User']['First name']; ?></td></tr>
    <tr><td>Nachname:</td><td><?php echo $user['User']['Family name']; ?></td></tr>
    <tr><td>E-Mail:</td><td><?php echo $user['User']['Mail']; ?></td></tr>
    <tr><td>Registriert am:</td><td><?php echo $user['User']['Registered']; ?></td></tr>
     <tr><td>Aktiviert:</td><td><?php if($user['User']['Accepted'] == 1){echo '<span class="glyphicon glyphicon-ok" style="font-size:15px;"></span>';} else {echo '<span class="glyphicon glyphicon-remove" style="font-size:15px;"></span>';} ?></td></tr>
  </table>
</div>

<?php echo $this->HTML->link('Edit', array('action'=>'edit', $user['User']['ID'])); ?></td>
<p><?php echo $this->Form->postLink('Delete', array('action'=>'delete', $user['User']['ID']), array('confirm'=>'Soll der Benutzer tatsächlich gelöscht werden?')); ?></p>
<p><?php //echo $this->Html->link('Back', array('action'=>'index')); ?></p>

<form role="form">
<div class="form-group">
 <a href="../" class="btn btn-default" role="button">Return</a></p>
</div>
</form>