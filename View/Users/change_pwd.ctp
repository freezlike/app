<?php $this->layout = false; ?>
<div class="form-group">
    <label class="col-md-3 control-label"><?php echo __("Mot de passe"); ?></label>
    <div class="col-md-9">
        <?php echo $this->Form->input('User.password', array('style'=>'margin-left: 8px;width: 97.6%;','label'=>false,'div'=>false,'placeholder' => __("Mot de passe"), 'class' => 'form-control form-cascade-control input-small')); ?>
    </div>
</div>