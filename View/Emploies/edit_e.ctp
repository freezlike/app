<?php $this->set('title_for_layout', __("Affecter Postes")); ?>
<div class="row">
    <div class="col-md-12">

        <ul class="breadcrumb">

            <li><a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'home')); ?>"><?php echo __("Dashboard"); ?></a></li>
            <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'index')); ?>"><?php echo __("Gestion Users"); ?></a></li>
            <li class="active"><?php echo __("Fiche Employé Poste"); ?></li>
        </ul>
    </div>
</div>
<?php
    echo $this->Form->create('User', array(
        'inputDefaults' => array('div' => false, 'label' => false)
    ));
    ?>
<h3 class="page-header"> <b><?php echo __("Affecter Poste"); ?></b> :  <?php echo ucfirst($user['User']['first_name']) . " " . ucfirst($user['User']['last_name']); ?> </h3>
<div class="panel-body">
    <label class="control-label"><?php echo __("Poste"); ?></label>
    <?php echo $this->Form->input('poste_id', array('class' => 'col-md-offset-1 form-control', 'style' => 'width:33%;display: initial;')); ?>&nbsp;&nbsp;
  <?php echo $this->Form->submit(__("Ajouter"), array('div' => false, 'class' => 'btn bg-primary text-white')) ?>
</div>
