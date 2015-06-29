<?php $this->layout = false; ?>

    <label class="control-label"><?php //echo __("Tache"); ?></label>
    <?php //echo $this->Form->input('Tache.staches', array('div'=>false,'id'=>'tache','label'=>false,'class' => 'col-md-offset-1 form-control', 'style' => 'width:116%;display: initial;')); ?>&nbsp;&nbsp;
    <table>
    <tr>

    
        <div class="panel-body"> <label class="control-label"><?php echo __("Tâches"); ?></label></div><td>
        <div><?php echo $this->Form->input('Tache.staches', array('div'=>false,'id'=>'tache','label'=>false,'class' => 'col-md-offset-1 form-control', 'style' => 'width:140%;display: initial; margin-left: 29px;')); ?>&nbsp;&nbsp;</div>
    </td>
</tr>
</table>