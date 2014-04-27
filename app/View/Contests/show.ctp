<h2> Liste der Aufgaben </h2>

<table class="table table-striped">
    <thead>
	<th>Level</th>
        <th>Aktion</th>
    </thead>
	<?php foreach ($levels as $level){ ?>
	<tr>
            <td><?php echo $level['Level']['description'];  ?></td>
            <td><?php echo $this->Html->link("Abgabe", array('controller'=>'contests', 'action'=>'participate', $contest['Contest']['id'])) ?></td>
	</tr>
	<?php } ?>
</table>
