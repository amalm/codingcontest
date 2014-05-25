<?php if(isset($contests)){ ?>
<h2>Ergebnisse abrufen</h2>
<table class="table table-striped">
    <thead>
        <th>Contestname</th>
	<th>Start</th>
        <th>Teilgenommen</th>
    </thead>
	<?php foreach ($contests as $contest){ ?>
	<tr>
            <td><?php echo $this->Html->link($contest['Contest']['name'], array('controller'=>'contests', 'action'=>'results', $contest['Contest']['id'])); ?></td>
            <td><?php echo $contest['Contest']['start']; ?></td>
            <td><?php echo count($contest['Relation']); ?></td>
	</tr>
	<?php } ?>
</table>
<?php } else if(!empty($users)) { ?>
<h2>Bewerber die teilgenommen haben</h2>
<table class="table table-striped">
    <thead>
        <th>Name</th>
	<th>E-Mail</th>
    </thead>
	<?php foreach ($users as $user){ ?>
	<tr>
            <td><?php echo $this->Html->link($user['User']['first_name']." ".$user['User']['family_name'], array('controller'=>'contests', 'action'=>'results', $contestid, $user['User']['id'])); ?></td>
            <td><?php echo $user['User']['mail']; ?></td>
	</tr>
	<?php } ?>
</table>
    <?php echo $this->Html->link('<button type="button" class="btn btn-primary">Zurück</button>',  array('action'=>'results'), array("escape"=>false)); ?>
<?php } else if (!empty($solutions)) { ?>
<h2>Die abgegebenen Dateien</h2>
<table class="table table-striped">
    <thead>
        <th>Abgegeben</th>
	<th>Auswertung</th>
    </thead>
	<?php foreach ($solutions as $solution){ ?>
	<tr>
            <td><?php echo $this->Html->link($solution['file_name'], array('controller'=>'contests', 'action'=>'download', $solution['id'])); ?></td>
            <td><?php echo $solution['correct']; ?></td>
	</tr>
	<?php } ?>
</table>
<?php echo $this->Html->link('<button type="button" class="btn btn-primary">Zurück</button>',  array('action'=>'results', $contestid), array("escape"=>false)); ?>
<?php } ?>

