<?php $this->set('title_for_layout', __("Commerciales | Add")); ?>
<h3><?php echo __('Ajouter un Commercial'); ?></h3>
<hr>
<div class="row">
    <div class="col-lg-12">
        <div class="well">
            <fieldset>
                <legend><h4><?php echo __('Informations'); ?></h4></legend>
                <?php
                echo $this->Form->create('Commerciale', array(
                    'inputDefaults' => array('label' => false, 'div' => false)
                ));
                ?>
                <div class="form-group">
                    <label class="control-label"><?php echo __(''); ?></label>
                    <?php echo $this->Form->input('username', array('class' => 'form-control', 'placeholder' => 'Nom d\'utilisateur')); ?>

                </div>
                <div class="form-group">
                    <label class="control-label"><?php echo __(''); ?></label>
                    <?php echo $this->Form->input('password', array('class' => 'form-control', 'placeholder' => 'Mot de passe')); ?>
                </div>
                <div class="form-group">
                    <label class="control-label"><?php echo __(''); ?></label>
                    <?php echo $this->Form->input('name', array('class' => 'form-control', 'placeholder' => 'Nom')); ?>
                </div>
                <div class="form-group">
                    <label class="control-label"><?php echo __(''); ?></label>
                    <?php echo $this->Form->input('last_name', array('class' => 'form-control', 'placeholder' => 'Prénom')); ?>
                </div>
                <div class="form-group">
                    <label class="control-label"><?php echo __(''); ?></label>
                    <?php echo $this->Form->input('email', array('class' => 'form-control', 'placeholder' => 'Email')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->submit(__('Ajouter'), array('div' => false, 'class' => 'btn btn-success form-control')); ?>
                </div>
            </fieldset>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>
</div>
<div class="pull-right">
    <button class="btn btn-primary" onclick="
            document.location.href = '<?php echo 'http://' . env('SERVER_NAME') . $this->Html->url(array('controller' => 'commerciales', 'action' => 'index')) ?>';
            ">
                <?php echo __('Liste Commerciales'); ?>
    </button>
</div>