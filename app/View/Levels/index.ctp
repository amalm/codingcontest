<h2>Bestehende Levels:</h2>
<table class="table table-striped">
	<th>Level</th>
	<th>Beschreibung</th>
	<th>Pfad</th>
	<?php foreach($levels as $level){ ?>
	<tr>
		<td><?php echo $level['Level']['level'];?></td>
		<td><?php echo $level['Level']['description'];?></td>
		<td><?php echo $level['Level']['path'];?></td>
	</tr>
	<?php } ?>
</table>
<p>
<?php echo $this->Html->link('<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span>Level hinzufügen</button>',  array('action'=>'add'), array("escape"=>false)); ?>
</p>