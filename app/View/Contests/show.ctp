<h2> Liste der Aufgaben </h2>

<table class="table table-striped">
    <thead>
	<th>Level</th>
        <th>Aktion</th>
    </thead>
	<?php foreach ($levels as $level){ ?>
	<tr>
            <td><?php echo $this->Html->link($level['Level']['description'], array('controller'=>'levels', 'action'=>'download', $level['Level']['id']));  ?></td>
            <td><?php echo $this->Html->link("Abgabe", array('controller'=>'contests', 'action'=>'submit', $contest)); ?></td>
	</tr>
	<?php } ?>
</table>
