<h2> Bestehende Aufgaben </h2>
<table class="table table-striped">
    <thead>
	<th>Aufgabename</th>
	<th>Beschreibung</th>
	<th style="text-align: center;">Dauer</th>
	<th style="text-align: center;">Anzahl der Levels</th>
	<th style="text-align: center;">Aktion</th>
    </thead>
	<?php foreach($tasks as $task){ ?>
	<tr>
		<td><?php echo $task['Task']['name'];?></td>
		<td><?php echo $task['Task']['description'];?></td>
		<td style="text-align: center;"><?php echo $task['Task']['duration'];?></td>
		<td style="text-align: center;"><?php echo count($task['Level']);?></td>
		<td style="text-align: center;">
			<?php echo $this->HTML->link('<span class="glyphicon glyphicon-pencil" style="font-size:20px;" title="Bearbeiten"></span>', array('action'=>'edit', $task['Task']['id']), array('escape'=>false)); ?>
                </td>
	</tr>
	<?php } ?>
</table>
<p>
<?php echo $this->Html->link('<button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Aufgabe hinzufügen </button>',  array('action'=>'add'), array("escape"=>false)); ?>
</p>