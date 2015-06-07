<?php if (empty($this->request->data)): ?>
    <?php $this->set('title_for_layout', __("Ajouter Employé")); ?>
<?php else: ?>
    <?php $this->set('title_for_layout', __("Editer Employé")); ?>
<?php endif; ?>


<div class="row">
    <div class="col-mod-12">
        <ul class="breadcrumb">
            <li><a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'home')); ?>"><?php echo __("Dashboard"); ?></a></li>
            <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'index')); ?>"><?php echo __("Gestion Users"); ?></a></li>
            <?php if (!empty($this->request->data)): ?>
                <li class="active"><?php echo __("Editer Employé"); ?></li>
            <?php else: ?>
                <li class="active"><?php echo __("Ajouter Employé"); ?></li>
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
                        <?php echo __("Editer Employé :"); ?>
                    <?php else: ?>
                        <?php echo __("Ajouter Employé :"); ?>
                    <?php endif; ?>

                    <span class="pull-right">
                        <a href="#" class="panel-minimize"><i class="fa fa-chevron-up"></i></a>
                        <a href="#" class="panel-close"><i class="fa fa-times"></i></a>
                    </span>
                </h3>
                <div class="panel-body">

                    <?php
                    echo $this->Form->create('User', array(
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
                        <label class="col-md-3 control-label"><?php echo __("Nom d'Utilisateur"); ?></label>
                        <div class="col-md-9">
                            <?php echo $this->Form->input('username', array('placeholder' => __("Nom d'Utilisateur"), 'class' => 'form-control form-cascade-control input-small')); ?>
                        </div>
                    </div>

                    <?php if (empty($this->request->data)): ?>
                        <div class="form-group">
                            <label class="col-md-3 control-label"><?php echo __("Mot de passe"); ?></label>
                            <div class="col-md-9">
                                <?php echo $this->Form->input('password', array('placeholder' => __("Mot de passe"), 'class' => 'form-control form-cascade-control input-small')); ?>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="form-group">
                            <label class="col-md-3 control-label"><?php echo __("Changer Le mot de passe ?"); ?></label>
                            <div class="col-md-9">
                                <ul class="icheck-buttons">
                                    <input type="checkbox" name="change_pwd"  class="square-input" data-ajax="1" id="change_pwd" onclick="javascript:change_pwd(this.value);"/>
                                </ul>
                            </div>
                        </div>
                        <div class="form-group" id="pwd"></div>
                    <?php endif; ?>
                    <div class="form-group">
                        <label class="col-md-3 control-label"><?php echo __("Nom"); ?></label>
                        <div class="col-md-9">
                            <?php echo $this->Form->input('first_name', array('placeholder' => __("Nom"), 'class' => 'form-control form-cascade-control input-small')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"><?php echo __("Prénom"); ?></label>
                        <div class="col-md-9">
                            <?php echo $this->Form->input('last_name', array('placeholder' => __("Prénom"), 'class' => 'form-control form-cascade-control input-small')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"><?php echo __("Email"); ?></label>
                        <div class="col-md-9">
                            <?php echo $this->Form->input('email', array('placeholder' => __("Email"), 'class' => 'form-control form-cascade-control input-small')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"><?php echo __("Téléphone"); ?></label>
                        <div class="col-md-9">
                            <?php echo $this->Form->input('telephone', array('placeholder' => __("Téléphone"), 'class' => 'form-control form-cascade-control input-small')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"><?php echo __('Date de naissance'); ?></label>
                        <div class="col-md-9">
                            <?php if (empty($this->request->data)): ?>
                                <input type="date" class="form-control form-cascade-control input-small" name="data[User][born_day]" >
                            <?php else: ?>
                                <input type="date" value='<?php echo $this->request->data['User']['born_day'] ?>'class="form-control form-cascade-control input-small" name="data[User][born_day]" >

                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"><?php echo __('Date d\'embauche'); ?></label>
                        <div class="col-md-9">
                            <?php if (empty($this->request->data)): ?>
                                <input type="date" class="form-control form-cascade-control input-small" name="data[User][hire_date]" >
                            <?php else: ?>
                                <input type="date" value='<?php echo $this->request->data['User']['hire_date'] ?>'class="form-control form-cascade-control input-small" name="data[User][hire_date]" >

                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"><?php echo __("N° CIN"); ?></label>
                        <div class="col-md-9">
                            <?php echo $this->Form->input('cin', array('placeholder' => __("CIN"), 'class' => 'form-control form-cascade-control input-small')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"><?php echo __("Banque"); ?></label>
                        <div class="col-md-9">
                            <?php echo $this->Form->input('banque', array('placeholder' => __("Banque"), 'class' => 'form-control form-cascade-control input-small')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"><?php echo __("RIB"); ?></label>
                        <div class="col-md-9">
                            <?php echo $this->Form->input('rib', array('placeholder' => __("RIB"), 'class' => 'form-control form-cascade-control input-small')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"><?php echo __("Matricule"); ?></label>
                        <div class="col-md-9">
                            <?php echo $this->Form->input('matricule', array('placeholder' => __("Matricule"), 'class' => 'form-control form-cascade-control input-small')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"><?php echo __("N° CNSS"); ?></label>
                        <div class="col-md-9">
                            <?php echo $this->Form->input('cnss', array('placeholder' => __("CNSS"), 'class' => 'form-control form-cascade-control input-small')); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"><?php echo __("Permis"); ?></label>
                        <div class="col-md-9">
                            <ul class="icheck-buttons">
                                <?php echo $this->Form->input('permis', array('label' => false, 'div' => false, 'data-ajax' => '0', 'class' => 'square-input')); ?>
                            </ul>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"><?php echo __('Situation'); ?></label>
                        <div class="col-md-9">
                            <?php echo $this->Form->input('situation_id', array('class' => 'form-control form-cascade-control input-small')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"><?php echo __('Département'); ?></label>
                        <div class="col-md-9">
                            <?php echo $this->Form->input('departement_id', array('class' => 'form-control form-cascade-control input-small')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"><?php echo __('Groupe'); ?></label>
                        <div class="col-md-9">
                            <?php echo $this->Form->input('group_id', array('class' => 'form-control form-cascade-control input-small')); ?>
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
</div>

<?php echo $this->Html->script('clockface', array('inline' => false)); ?>
<?php echo $this->Html->script('chosen.jquery', array('inline' => false)); ?>
<?php echo $this->Html->script('icheck/icheck', array('inline' => false)); ?>
<?php echo $this->Html->script('xhr', array('inline' => false)); ?>