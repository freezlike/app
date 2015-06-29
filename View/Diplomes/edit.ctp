<?php $this->set('title_for_layout', __("Affecter Diplome")); ?>
<div class="row">
    <div class="col-mod-12">
        <ul class="breadcrumb">
            <li><a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'home')); ?>"><?php echo __("Dashboard"); ?></a></li>
            <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'index')); ?>"><?php echo __("Gestion Users"); ?></a></li>
            <li class="active"><?php echo __("Fiche Employé Diplome"); ?></li>
        </ul>
    </div>
</div>
<h3 class="page-header"> <b><?php echo __("Affecter Dilpmoes"); ?></b> :  <?php echo ucfirst($user['User']['first_name']) . " " . ucfirst($user['User']['last_name']); ?> </h3>
<?php echo $this->Form->create('Diplome',array(
    'inputDefaults'=>array('div'=>false)
)); ?>

    <?php echo $this->Form->input('diplomes'); ?>&nbsp;&nbsp;
       
<button class="btn btn-info btn-sm"><i class="fa fa-plus" ></i></button>
<?php echo $this->Form->end();?>
