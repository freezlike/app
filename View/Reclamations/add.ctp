<?php // if (!empty($this->request->data)): ?>
    <?php //$projet = $this->request->data;
 //debug($projet);    
    //$projetUser = $projet['User'];    //debug($projet['Projet']['id']);?>
    <?php //endif; ?>
    <?php $this->set('title_for_layout', __("Ajout Réclamation")); ?>
<div class="row">
    <div class="col-mod-12">
        <ul class="breadcrumb">
            <li><a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'home')); ?>"><?php echo __("Dashboard"); ?></a></li>
            <li><a href="<?php echo $this->Html->url(array('controller' => 'reclamations', 'action' => 'index')); ?>"><?php echo __("Gestion Reclamations"); ?></a></li>
            <?php if (!empty($this->request->data)): ?>
                <li class="active"><?php echo __("Editer Réclamation"); ?></li>
            <?php else: ?>
                <li class="active"><?php echo __("Ajouter Réclamation"); ?></li>
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
                        <?php echo __("Editer Réclamation"); ?>
                    <?php else: ?>
                        <?php echo __("Ajouter Réclamation"); ?>
    <?php endif; ?>
                    <span class="pull-right">
                        <a href="#" class="panel-minimize"><i class="fa fa-chevron-up"></i></a>
                        <a href="#" class="panel-close"><i class="fa fa-times"></i></a>
                    </span>
                </h3>
            </div>
            <div class="panel-body">
                <?php
                echo $this->Form->create('Reclamation', array(
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
                    <label class="col-md-3 control-label"><?php echo __("Objet"); ?></label>
                    <div class="col-md-9" id="n_projet">
    <?php echo $this->Form->input('name', array('placeholder' => __("Objet"), 'class' => 'form-control form-cascade-control input-small')); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label"><?php echo __("Description"); ?></label>
                    <div class="col-md-9">
    <?php echo $this->Form->input('description', array('placeholder' => __("Description"), 'class' => 'form-control form-cascade-control input-small')); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label"><?php echo __('Date de réclamation'); ?></label>
                    <div class="col-md-9">
                        <?php if (empty($this->request->data)): ?>
                              <input type="date" class="form-control form-cascade-control input-small" name="data[Reclamation][date_reclamation]" >
                         <?php else: ?>
                            <input type="date" value='<?php echo $this->request->data['Reclamation']['date_reclamation'] ?>'class="form-control form-cascade-control input-small" name="data[Reclamation][date_reclamation]" >
                           
                         <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label"><?php echo __("Type de réclamation"); ?></label>
                    <div class="col-md-9">
                        <div class="form-group"><label style="margin-left: 15px;"><?php echo ("Logistique  ");?></label>&nbsp;&nbsp;<input type="checkbox" name="Logistique" ></div> 
                            
                        <div class="form-group"><label style="margin-left: 15px;"><?php echo ("Produit  ");?></label>&nbsp;&nbsp;<input type="checkbox" name="Produit" ></div> 
                        
    
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label"><?php echo __("Clients"); ?></label>
                    <div class="col-md-9">
    <?php echo $this->Form->input('contact_id', array('placeholder' => __("-- Choisir Clients --"), 'class' => 'form-control form-cascade-control input-small')); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label"><?php echo __("Résponsable"); ?></label>
                    <div class="col-md-9" id="users">
    <?php echo $this->Form->input('users', array('placeholder' => __("Choisir Résponsable"), 'class' => 'form-control form-cascade-control input-small')); ?>
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
    <?php $this->Form->end(); ?>  
                    </div>
                </div>



            
        </div>
    </div>



         