<?php $this->set('title_for_layout', __("Ajout Tache")); ?>
<div class="row">
    <div class="col-mod-12">
        <ul class="breadcrumb">
            <li><a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'home')); ?>"><?php echo __("Dashboard"); ?></a></li>
            <li><a href="<?php echo $this->Html->url(array('controller' => 'taches', 'action' => 'index')); ?>"><?php echo __("Gestion Taches"); ?></a></li>
             <?php 
             // debug($this->request->data); die();
             if (!empty($this->request->data)): ?>
                <li class="active"><?php echo __("Editer Tache"); ?></li>
            <?php else: ?>
                <li class="active"><?php echo __("Ajouter Tache"); ?></li>
            <?php endif; ?>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-cascade">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <?php if (!empty($this->request->data)): ?>
                        <?php echo __("Editer Tache"); ?>
                    <?php else: ?>
                        <?php echo __("Ajouter Tache"); ?>
                    <?php endif; ?>
                    <span class="pull-right">
                        <a href="#" class="panel-minimize"><i class="fa fa-chevron-up"></i></a>
                        <a href="#" class="panel-close"><i class="fa fa-times"></i></a>
                    </span>
                </h3>
            </div>
            <div class="panel-body">
                <?php
                echo $this->Form->create('Tache', array(
                    'class' => 'form-horizontal cascde-forms',
                    'inputDefaults' => array(
                        'div' => false,
                        'label' => false,
                        'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
                )));
                ?>
                <?php if (!empty($this->request->data)): ?>
                    <?php echo $this->Form->input('id'); ?>
                <?php endif; ?>
                <div class="form-group">
                    <label class="col-md-3 control-label"><?php echo __("Projet"); ?></label>
                    <div class="col-md-9">
                        <?php echo $this->Form->input('projet_id', array('placeholder' => __("Projet"), 'class' => 'form-control form-cascade-control input-small')); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label"><?php echo __("Nom du Tache"); ?></label>
                    <div class="col-md-9">
                        <?php echo $this->Form->input('name', array('placeholder' => __("Nom du Tache"), 'class' => 'form-control form-cascade-control input-small')); ?>
                    </div>
                </div>
                 <div class="form-group">
                    <label class="col-md-3 control-label"><?php echo __("Etat"); ?></label>
                    <div class="col-md-9">
                        <?php echo $this->Form->input('etat', array('placeholder' => __("Etat"), 'class' => 'form-control form-cascade-control input-small')); ?>
                    </div>
                </div>
                 <div class="form-group">
                    <label class="col-md-3 control-label"><?php echo __("Déscription"); ?></label>
                    <div class="col-md-9">
                        <?php echo $this->Form->input('description', array('placeholder' => __("Déscription"), 'class' => 'form-control form-cascade-control input-small')); ?>
                    </div>
                </div>
                 <div class="form-group">
                    <label class="col-md-3 control-label"><?php echo __("Priorité"); ?></label>
                    <div class="col-md-9">
                        <?php echo $this->Form->input('priorite', array('placeholder' => __("Priorité"), 'class' => 'form-control form-cascade-control input-small')); ?>
                    </div>
                </div>
                 <div class="form-group">
                    <label class="col-md-3 control-label"><?php echo __("Date début réelle"); ?></label>
                    <div class="col-md-9">
                         <?php if (empty($this->request->data)): ?>
                              <input type="date" class="form-control form-cascade-control input-small" name="data[Tache][date_debut_r]" >
                         <?php else: ?>
                            <input type="date" value='<?php echo $this->request->data['Tache']['date_debut_r'] ?>'class="form-control form-cascade-control input-small" name="data[Tache][date_debut_r]" >
                           
                         <?php endif; ?>
                    </div>
                </div>
                 <div class="form-group">
                    <label class="col-md-3 control-label"><?php echo __("Date fin réelle"); ?></label>
                    <div class="col-md-9">
                         <?php if (empty($this->request->data)): ?>
                              <input type="date" class="form-control form-cascade-control input-small" name="data[Tache][date_fin_r]" >
                         <?php else: ?>
                            <input type="date" value='<?php echo $this->request->data['Tache']['date_fin_r'] ?>'class="form-control form-cascade-control input-small" name="data[Tache][date_fin_r]" >
                           
                         <?php endif; ?>
                    </div>
                </div>
                 <div class="form-group">
                    <label class="col-md-3 control-label"><?php echo __("Date debut estimé"); ?></label>
                    <div class="col-md-9">
                        <?php if (empty($this->request->data)): ?>
                              <input type="date" class="form-control form-cascade-control input-small" name="data[Tache][date_debut_e]" >
                         <?php else: ?>
                            <input type="date" value='<?php echo $this->request->data['Tache']['date_debut_e'] ?>'class="form-control form-cascade-control input-small" name="data[Tache][date_debut_e]" >
                           
                         <?php endif; ?>
                    </div>
                </div>
                 <div class="form-group">
                    <label class="col-md-3 control-label"><?php echo __("Date fin estimé"); ?></label>
                    <div class="col-md-9">
                         <?php if (empty($this->request->data)): ?>
                              <input type="date" class="form-control form-cascade-control input-small" name="data[Tache][date_fin_e]" >
                         <?php else: ?>
                            <input type="date" value='<?php echo $this->request->data['Tache']['date_fin_e'] ?>'class="form-control form-cascade-control input-small" name="data[Tache][date_fin_e]" >
                           
                         <?php endif; ?>
                    </div>
                </div>
                 <div class="form-group">
                    <label class="col-md-3 control-label"><?php echo __("Date d'ajout"); ?></label>
                    <div class="col-md-9">
                        <?php if (empty($this->request->data)): ?>
                              <input type="date" class="form-control form-cascade-control input-small" name="data[Tache][date_ajout]" >
                         <?php else: ?>
                            <input type="date" value='<?php echo $this->request->data['Tache']['date_ajout'] ?>'class="form-control form-cascade-control input-small" name="data[Tache][date_ajout]" >
                           
                         <?php endif; ?>
                    </div>
                </div>
                 
                <div class="form-group">

                    <div class="col-md-3 col-md-offset-3">
                        <?php if (!empty($this->request->data)): ?>
                            <?php echo $this->Form->submit(__("Modifier"), array('div' => false, 'class' => 'btn bg-primary text-white')) ?>
                        <?php else: ?>
                            <?php echo $this->Form->submit(__("Ajouter"), array('div' => false, 'class' => 'btn bg-primary text-white')) ?>
                            <button class="btn bg-info text-white" type="reset">Annuler</button>
                        <?php endif; ?>
                    </div>
                </div>
                 <?php $this->end(); ?>  
                
            </div>
        </div>

    </div>
</div>
         