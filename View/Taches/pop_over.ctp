<div>
    <label class="label label-info fa fa-user" style="cursor: pointer; font-size: 150%; margin-top: 25px;" id="member" data-toggle="popover"><?php echo __(" Membres"); ?></label>

    <div class="popover fade bottom in"  id="divpop" style="top: 150px; left: 260px; display: none;">
        <div class="arrow">

        </div>
        <h3 class="popover-title" style="display: block;">
            <?php echo __("Ajout Membre"); ?>
        </h3>
        <div class="popover-content">
            <input type="text" data-provide="typeahead" class="form-control" id="searchMembre" autocomplete="off" placeholder="Chercher Membre" style='margin-bottom: 10px;'>
            <button class='btn btn-info' style="margin-bottom: 8px; margin-left: 20px;"  id="ajout_member" type="submit"><?php echo __("Ajouter"); ?></button>
            <button class='btn btn-danger' style='margin-bottom: 8px;' id="annuler_member" type='reset'><?php echo __("Annuler"); ?></button>
        </div>

    </div>
</div>


<div class="input-group">
    <span class="input-group-addon">
        <i class="fa fa-search"></i>
    </span>
    <?php //echo $this->Form->select('message', $message); ?>
    <select id="searchMembre">
        <?php foreach ($message as $value):?>
        <option>
            <?php echo($value);?>
        </option>
        <?php endforeach; ?>
    </select>
</div>
<?php echo $this->Html->script('select2.min',array('inline'=>false)); ?>
<?php $this->Html->css('select2',array('inline'=>false)); ?>
<?php echo $this->Html->scriptStart(array('inline' => false)); ?>
$(document).ready(function() {
    $("select").select2();
    $("#member").on('click', function(e) {
        e.preventDefault();
        $("#divpop").css('display', 'block');
    });
    $("#ajout_member").on('click', function() {
        $("#divpop").css('display', 'none');
    });
    $("#annuler_member").on('click', function(e) {
        e.preventDefault();
        $("#divpop").css('display', 'none');
        });
    });
<?php echo $this->Html->scriptEnd(); ?> 

