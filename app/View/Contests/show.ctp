<h2> Liste der Aufgaben </h2>

<table class="table table-striped">
    <thead>
        <th>Level</th>
	<th>Name</th>
        <th>Aktion</th>
    </thead>
	<?php foreach ($levels as $level){ ?>
	<tr>
            <td><?php echo $level['Level']['level']; ?></td>
            <td><?php echo $this->Html->link($level['Level']['description'], array('controller'=>'levels', 'action'=>'download', $level['Level']['id']));  ?></td>
            <td><?php echo $this->Html->link("Abgabe", array('controller'=>'contests', 'action'=>'submit', $level['Level']['id'])); ?></td>
	</tr>
	<?php } ?>
</table>
