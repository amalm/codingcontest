<h2>Wollen Sie an diesem Contest teilnehmen?</h2>
<p>
    <h4>Contestbeschreibung:</h4>
    Name: <?php echo $contest['Contest']['name']; ?><br>
    Datum: <?php echo $contest['Contest']['start']; ?><br>
    Durchführungszeit: <?php echo $contest['Task']['duration']."h"; ?><br>
    Aufgaben: <?php echo count($level) ?>
</p>
<br>
<p>
<?php echo $this->Html->link('<button type="button" class="btn btn-primary">Teilnehmen</button>',  array('action'=>'confirm', $contest['Contest']['id']), array('confirm'=>'Sind Sie sicher, dass Sie an diesem Contest teilnehmen wollen?', "escape" => false)); ?>
</p>