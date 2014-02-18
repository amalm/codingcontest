<h2>Anstehende Contests:</h2>
<table class="table table-striped">
	<th>Contestname</th>
	<th>Anfang: Datum und Uhrzeit</th>
	<th>Offen bis</th>
	<th>Durchf&uuml;hrungszeit</th>
	<?php foreach ($contests as $contest){ ?>
	<tr>
		<td><?php echo $contest['Contest']['name'] ?></td>
		<td><?php echo $contest['Contest']['start'] ?></td>
		<td><?php echo $contest['Contest']['end'] ?></td>
		<td><?php echo $contest['Task']['duration']."h" ?></td>
	</tr>
	<?php } ?>
</table>
<p>
<?php echo $this->Html->link('<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span>Contest hinzufügen</button>',  array('action'=>'add'), array("escape"=>false)); ?>
</p>
