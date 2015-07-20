<?php echo $this->Html->css('login', array('inline' => FALSE)); ?>
<div class="row animated fadeILeftBig">
    <div class="login-holder col-md-6 col-md-offset-3">
        <h2 class="page-header text-center text-primary"> Largestinfo ERP </h2>
        <?php
        echo $this->Form->create('User', array(
            'inputDefaults' => array('label' => false, 'div' => false)
        ))
        ?>
        <div class="form-group">
            <?php echo $this->Form->input('username', array('autofocus','placeholder' => __("Entrez votre Nom d'Utilisateur"), 'class' => 'form-control')); ?>
        </div>
        <div class="form-group">
            <?php echo $this->Form->input('password', array('placeholder' => __("Entrez votre Mot de passe"), 'class' => 'form-control')); ?>
        </div>
        <div class="form-footer">
            <?php echo $this->Form->submit(__("Se Connecter"), array('div' => false, 'class' => 'btn btn-info pull-right btn-submit')) ?>
        </div>

        <?php echo $this->Form->end(); ?>
    </div>
</div>