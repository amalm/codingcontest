<h2> Bestehende Levels </h2>
<table class="table table-striped">
<thead>
	<tr>
	<th> Level </th>
        <th> Beschreibung </th>
        <th style="text-align: center;"> Inputs & Outputs </th>
        <th style="text-align: center;"> Aktion </th>
	</tr>
</thead>
	<?php foreach($levels as $level){ ?>
	<tr>
		<td><?php echo $level['Level']['level'];?></td>
		<td><?php echo $level['Level']['description'];?></td>
                <td style="text-align: center;"><?php echo count($level['Inputsoutput']); ?></td>
                <td style="text-align: center;">
                    <?php echo $this->HTML->link('<span class="glyphicon glyphicon-sort" style="font-size:20px" data-toggle="tooltip" data-placement="left" title="Input und Output definieren"></span>', array('controller'=>'inputsoutputs','action'=>'add', $level['Level']['id']), array('escape'=>false)); ?>
                    <?php echo $this->HTML->link('<span class="glyphicon glyphicon-search" style="font-size:20px" data-toggle="tooltip" data-placement="left" title="Bestehende In- und Outputs ansehen"></span>', array('controller'=>'inputsoutputs','action'=>'index', $level['Level']['id']), array('escape'=>false)); ?>
                </td>
	</tr>
	<?php } ?>
        
</thead>
</table>
<form role="form">
<div class="form-group">
    <?php echo $this->Html->link('<button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Level hinzufügen</button>',  array('action'=>'add', $levelid), array("escape"=>false)); ?>
    <a href="../" class="btn btn-primary" role="button">Zurück</a></p>
</div>
</form>