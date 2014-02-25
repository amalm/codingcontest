<h2> Benutzerverwaltung </h2>

<table class="table table-hover">
<thead>
	<tr>
	<th> Benutzername </th>
    <th> Mail </th>
    <th> Registriert am </th>
    <th> Status </th>
    <th> Aktion </th>
	</tr>
</thead>
    
	<?php foreach($users as $user): ?>
    <tr>
		<td><?php echo $user['User']['First name']." ".$user['User']['Family name'];?></td>
        <td><?php echo $user['User']['Mail'];?></td>
        <td><?php echo $user['User']['Registered'];?></td>
        <td> <?php if($user['User']['Accepted'] == 1){echo '<span class="glyphicon glyphicon-ok" style="font-size:15px;"></span>';} else {echo '<span class="glyphicon glyphicon-remove" style="font-size:15px;"></span>';} ?></td>

		<td>
		<?php echo $this->HTML->link('<span class="glyphicon glyphicon-folder-open" style="font-size:20px;"></span>', array('action'=>'view', $user['User']['ID']), array('escape'=>false)); ?>
		<?php echo $this->HTML->link('<span class="glyphicon glyphicon-pencil" style="font-size:20px;"></span>', array('action'=>'edit', $user['User']['ID']), array('escape'=>false)); ?>
        	<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-eye-open" style="font-size:20px;"></span>', array('action'=>'delete', $user['User']['ID']), array('confirm'=>'Soll der Benutzer tatsächlich gelöscht werden?', "escape" => false)); ?></td>
	</tr>
	<?php endforeach?>
</table>
<p></p>
<p>
<?php echo $this->Html->link('<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span>Benutzer hinzufügen</button>',  array('action'=>'add'), array("escape"=>false)); ?>
</p>



