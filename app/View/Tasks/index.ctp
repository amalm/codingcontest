<h2>Bestehende Aufgaben:</h2>
<table class="table table-striped">
	<th>Aufgabename</th>
	<th>Beschreibung</th>
	<th>Dauer</th>
	<th>Anzahl der Levels</th>
	<?php foreach($tasks as $task){ ?>
	<tr>
		<td><?php echo $task['Task']['name'];?></td>
		<td><?php echo $task['Task']['description'];?></td>
		<td><?php echo $task['Task']['duration'];?></td>
		<td><?php echo count($task['Level']);?></td>
	</tr>
	<?php } ?>
</table>
<p>
<?php echo $this->Html->link('<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span>Aufgabe hinzufügen</button>',  array('action'=>'add'), array("escape"=>false)); ?>
</p>