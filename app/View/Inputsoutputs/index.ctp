<h2>Bestehende In- und Outputs:</h2>
<table class="table table-striped">
	<th>Input</th>
	<th>Output</th>
        <th style="text-align: center;">Aktion</th>
	<?php foreach($inputsoutputs as $inputsoutput){ ?>
	<tr>
		<td><?php echo $inputsoutput['Inputsoutput']['input'];?></td>
		<td><?php echo $inputsoutput['Inputsoutput']['output'];?></td>
                <td style="text-align: center;">
                    <?php echo $this->HTML->link('<span class="glyphicon glyphicon-remove" style="font-size:20px" data-toggle="tooltip" data-placement="left" title="Eintrag löschen"></span>', array('controller'=>'inputsoutputs','action'=>'delete', $inputsoutput['Inputsoutput']['id']), array('confirm'=>'Soll der Eintrag wirklich gelöscht werden?', 'escape'=>false)); ?>
                </td>
	</tr>
	<?php } ?>
</table>
<p>
<?php echo $this->Html->link('<button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>In- und Output hinzufügen</button>',  array('action'=>'add', $inputsoutputs[0]['Inputsoutput']['level_id']), array("escape"=>false)); ?>
</p>