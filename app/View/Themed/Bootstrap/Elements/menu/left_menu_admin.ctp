<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
<?php if($this->Session->read('Auth.User')) { 
        if($this->Session->read('Auth.User.role')=='admin'){ ?>
    <div class="list-group">
              <a href="http://localhost/project/contests" class="list-group-item" style="color:#428bca;">Contestverwaltung</a>
            <a href="http://localhost/project/tasks" class="list-group-item" style="color:#428bca;">Aufgabenverwaltung</a>
            <a href="http://localhost/project/users" class="list-group-item" style="color:#428bca;">Benutzerverwaltung</a>
    </div>
          <div class="list-group">
            <a class="list-group-item" style="color:#428bca;">Statistik</a>
            <a href="#" class="list-group-item" style="color:#428bca;">Contestergebnisse</a>
            <a href="#" class="list-group-item" style="color:#428bca;">Benutzer CVs</a>
          </div>
<?php } else { ?>
    <?php if($attending){ ?>
    <div class="list-group">
        <div class="list-group-item">
            Sie nehmen am Contest "<?php echo $attending['0']['Contest']['name']; ?>" teil. Geben Sie Ihre Dateien vor <?php echo date("Y-m-d H:i:s", strtotime($attending['0']['Relation']['started']." + 2 hours")); ?> Uhr ab.
        </div>
        <div class="list-group-item">
            Abgabe
        </div>
    </div>
    <?php } ?>
      <div class="list-group">
        <a href="#" class="list-group-item">CV Hochladen</a>
        <?php echo $this->Html->link("Benutzereinstellungen", array('controller'=>'users', 'action'=>'useredit', $this->Session->read('Auth.User.id')), array('escape'=>false, 'class' => 'list-group-item'))?>
      </div>
<?php }} ?>
</div>