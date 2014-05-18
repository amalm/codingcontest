<h2>Aufgabe verifizieren und hochladen</h2>
<?php
echo $this->Form->create('Solution', array('class' => 'form-horizontal', 'role' => 'form', 'type' => 'file'));
?>
<?php foreach ($inputsoutputs as $inputsoutput) { ?>
    <div class="row" style="margin-left:10px; ">
        <div class="form-group col-sm-7">
            <label for="inputName"><?php echo "Geben Sie folgenden Wert in Ihr Programm ein: " . $inputsoutput['Inputsoutput']['input']; ?></label>
            <?php
            echo $this->Form->input('output'.$inputsoutput['Inputsoutput']['id'], array('id' => 'inputName', 'type' => 'text', 'class' => 'form-control', 'placeholder' => 'Welchen Wert bekommen Sie?', 'label' => FALSE));
            ?>
        </div>
    </div>
<?php } ?>

<div class="row" style="margin-left:10px; ">
    <div class="form-group col-sm-7">
        <label for="inputFile">Laden Sie Ihre Dateien im ZIP Format hoch</label>
        <?php
        echo $this->Form->input('file', array('id' => 'inputFile', 'type' => 'file', 'class' => 'form-control', 'label' => FALSE));
        ?>
    </div>
</div>

<div class="row" style="margin-left:25px; ">
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Absenden</button>

        <?php
        echo $this->Form->end();
        ?>
    </div>
</div>