<h2>Input und Output definieren</h2>
<?php
echo $this->Form->create('Inputsoutput', array('class' => 'form-horizontal', 'role' => 'form'));
?>
<div class="row" style="margin-left:10px; ">
    <div class="form-group col-sm-5">
        <label for="inputName">Input</label>
        <?php
        echo $this->Form->input('input', array('id' => 'inputName', 'type' => 'text', 'class' => 'form-control', 'placeholder' => 'Input', 'label' => FALSE));
        ?>
    </div>
</div>

<div class="row" style="margin-left:10px; ">
    <div class="form-group col-sm-5">
        <label for="inputDesc">Output</label>
        <?php
        echo $this->Form->input('output', array('id' => 'inputDesc', 'type' => 'text', 'class' => 'form-control', 'placeholder' => 'Output', 'label' => FALSE));
        ?>
    </div>
</div>
<div class="row" style="margin-left:25px; ">
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Speichern</button>
        <?php echo $this->Html->link('<button type="button" class="btn btn-primary">Zurück</button>', array('action'=>'index', $inputsoutput['Inputsoutput']['id']), array('escape'=>false));
        echo $this->Form->end();
        ?>
    </div>
</div>