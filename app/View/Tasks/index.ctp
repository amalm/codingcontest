<h2>Bestehende Aufgaben:</h2>
<table class="table table-striped">
	<th>Aufgabename</th>
	<th>Beschreibung</th>
	<th>Dauer</th>
	<th>Anzahl der Levels</th>
	<th>Aktion</th>
	<?php foreach($tasks as $task){ ?>
	<tr>
		<td><?php echo $task['Task']['name'];?></td>
		<td><?php echo $task['Task']['description'];?></td>
		<td><?php echo $task['Task']['duration'];?></td>
		<td><?php echo count($task['Level']);?></td>
		<td>
			<?php echo $this->HTML->link('<span class="glyphicon glyphicon-pencil" style="font-size:20px;"></span>', array('action'=>'edit', $task['Task']['id']), array('escape'=>false)); ?>
			<?php echo $this->HTML->link('<span class="glyphicon glyphicon-folder-open" style="font-size:20px;"></span>', array('controller' => 'levels', 'action'=>'index', $task['Task']['id']), array('escape'=>false)); ?>
		</td>
	</tr>
	<?php } ?>
</table>
<p>
<?php echo $this->Html->link('<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span>Aufgabe hinzufügen</button>',  array('action'=>'add'), array("escape"=>false)); ?>
</p>