<h2>Wollen Sie an diesem Contest teilnehmen?</h2>
    <h4>Contestbeschreibung:</h4>
    <div class="table table-striped">
 <table class="table table-striped">
    <tr><td>Name: </td><td><?php echo $contest['Contest']['name']; ?></td></tr>
    <tr><td>Datum: </td><td><?php echo $contest['Contest']['start']; ?></td></tr>
    <tr><td>Durchführungszeit: </td><td><?php echo $contest['Task']['duration']."h"; ?></td></tr>
   <tr><td> Aufgaben: </td><td><?php echo count($level) ?></td></tr>
    </table>
</div>
<p>
<?php echo $this->Html->link('<button type="button" class="btn btn-primary">Teilnehmen</button>',  array('action'=>'confirm', $contest['Contest']['id']), array('confirm'=>'Sind Sie sicher, dass Sie an diesem Contest teilnehmen wollen?', "escape" => false)); ?>
</p>