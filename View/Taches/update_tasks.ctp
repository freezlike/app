<?php $this->set('title_for_layout', __("Liste Tâches")); ?>
<?php echo $this->Html->css('demo_table', array('inline' => false)); ?>

<div  id="DragTask">

    <div class="panel panel-cascade pull-left" style="margin-left: 50px;margin-top: 20px; width: 230px;">
        <div class="panel-heading bg-info">
            <h3 class="panel-title  text-white">
                <?php echo __("Tâches Initiales"); ?>
            </h3></div>
        <div class="panel-body" id="tacheI">
            <ul class="sortable-list ui-sortable">
                <?php foreach ($tchs as $tch) : //debug($tch); die();?>
                    <li class="sortable-item" style="" data-state="<?php echo $tch['Tache']['etat']; ?>" ><?php echo $tch['Tache']['name']; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>


    <div class="panel panel-cascade pull-left" style=" margin-left: 120px;margin-top: 20px; width: 230px;">
        <div class="panel-heading bg-danger">
            <h3 class="panel-title  text-white">
                <?php echo __("Tâches En Cours"); ?>
            </h3></div>
        <div class="panel-body">
            <ul class="sortable-list ui-sortable">
                <?php foreach ($tchs1 as $tch) : //debug($tch); die();?>
                    <li class="sortable-item" style="" data-state="<?php echo $tch['Tache']['etat']; ?>"><?php echo $tch['Tache']['name']; ?></li>
                <?php endforeach; ?>     
            </ul>
        </div>
    </div>

    <div class="panel panel-cascade pull-right" style="margin-right: 90px;margin-top: 20px; width: 230px;">
        <div class="panel-heading bg-success">
            <h3 class="panel-title  text-white">
                <?php echo __("Tâches Achevées"); ?>
            </h3>
        </div>
        <div class="panel-body">
            <ul class="sortable-list ui-sortable">
                <?php foreach ($tchs2 as $tch) : //debug($tch); die();?>
                    <li class="sortable-item" data-state="<?php echo $tch['Tache']['etat']; ?>" style><?php echo $tch['Tache']['name']; ?></li>
                    <?php endforeach; ?> 
            </ul>
        </div>
    </div>
</div>

<?php //echo $this->Html->script('jquery.sortable',array('inline'=>false)); ?>
<?php echo $this->Html->scriptStart(array('inline'=>false)); ?>

$(document).ready(function () {

$('.sortable-list').sortable({
        start: function(e, ui) {
            console.log(e);
            console.log(ui);
            // puts the old positions into array before sorting
            var old_position = $(this).sortable('toArray');
        },
        update: function(event, ui) {
            // grabs the new positions now that we've finished sorting
            var new_position = $(this).sortable('toArray');
        },
        connectWith: '.sortable-list'
	});



});
<?php echo $this->Html->scriptEnd(); ?>
