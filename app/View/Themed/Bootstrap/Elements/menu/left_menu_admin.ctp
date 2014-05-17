<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
<?php if($this->Session->read('Auth.User')) { 
        if($this->Session->read('Auth.User.role')=='admin'){ ?>
          <div class="list-group">
            <a href="http://localhost/project/contests" class="list-group-item">Contestverwaltung</a>
            <a href="http://localhost/project/tasks" class="list-group-item">Aufgabenverwaltung</a>
            <a href="http://localhost/project/users" class="list-group-item">Benutzerverwaltung</a>
          </div>
          <div class="list-group">
            <a class="list-group-item">Statistik</a>
            <a href="#" class="list-group-item">Contestergebnisse</a>
            <a href="http://localhost/project/users/showCV" class="list-group-item">Benutzer CVs</a>
          </div>
<?php } else { ?>
    <?php if($attending){ ?>
    <div class="list-group">
        <div class="list-group-item">
            Sie nehmen am Contest "<?php echo $attending['0']['Contest']['name']; ?>" teil. Geben Sie Ihre Dateien vor <?php echo date("Y-m-d H:i:s", strtotime($attending['0']['Relation']['started']." + 2 hours")); ?> Uhr ab.
        </div>
            <?php echo $this->Html->link("Übersicht", array('controller'=>'contests', 'action'=>'show', $attending['0']['Contest']['id']), array('escape'=>false, 'class' => 'list-group-item')); ?>
    </div>
    <?php } ?>
      <div class="list-group">
        <?php echo $this->Html->link("Contests", array('controller'=>'contests', 'action'=>'index'), array('escape'=>false, 'class' => 'list-group-item')); ?>
        <?php echo $this->Html->link("Persönliche Daten", array('controller'=>'users', 'action'=>'userview', $this->Session->read('Auth.User.id')), array('escape'=>false, 'class' => 'list-group-item'))?>
      	<?php echo $this->Html->link("CV hochladen", array('controller'=>'users', 'action'=>'cvupload', $this->Session->read('Auth.User.id')), array('escape'=>false, 'class' => 'list-group-item'))?>
      </div>
<?php }} ?>
</div>