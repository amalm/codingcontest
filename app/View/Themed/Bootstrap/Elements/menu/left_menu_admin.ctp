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
            <a href="#" class="list-group-item">Benutzer CVs</a>
          </div>
<?php } else { ?>
      <div class="list-group">
        <a href="#" class="list-group-item">CV Hochladen</a>
        <?php echo $this->Html->link("Benutzereinstellungen", array('controller'=>'users', 'action'=>'useredit', $this->Session->read('Auth.User.id')), array('escape'=>false, 'class' => 'list-group-item'))?>
      </div>
<?php }} ?>
</div>