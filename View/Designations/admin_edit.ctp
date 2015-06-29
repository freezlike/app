<?php $this->set('title_for_layout', __("Commerciales | Edit")); ?>
<h3><?php echo __('Edition Produit'); ?></h3>
<hr>
<div class="row">
    <div class="col-lg-12">
        <div class="well">
            <fieldset>
                <legend><h4><?php echo __('Informations'); ?></h4></legend>
                <?php
                echo $this->Form->create('Designation', array(
                    'inputDefaults' => array('label' => false, 'div' => false)
                ));
                ?>
                <?php if (!empty($this->request->data)): ?>
                    <?php echo $this->Form->input('id'); ?>
                <?php endif; ?>
                <div class="form-group">
                    <label class="control-label"><?php echo __('Nom'); ?></label>
                    <?php echo $this->Form->input('name', array('class' => 'form-control', 'placeholder' => 'Nom')); ?>

                </div>
                <div class="form-group">
                    <label class="control-label"><?php echo __('Prix'); ?></label>
                    <?php echo $this->Form->input('price', array('class' => 'form-control', 'placeholder' => 'Prix')); ?>
                </div>
                <div class="form-group">
                    <label class="control-label"><?php echo __('Description'); ?></label>
                    <?php echo $this->Form->input('description', array('class' => 'form-control', 'placeholder' => 'Description')); ?>
                </div>
                <div class="form-group">
                    <?php if (empty($this->request->data)): ?>
                        <?php echo $this->Form->submit(__('Ajouter'), array('div' => false, 'class' => 'btn btn-success form-control')); ?>
                    <?php else: ?>
                        <?php echo $this->Form->submit(__('Modifier'), array('div' => false, 'class' => 'btn btn-success form-control')); ?>
                    <?php endif; ?>
                </div>
            </fieldset>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>
</div>
<div class="pull-right">
    <button class="btn btn-primary" onclick="
            document.location.href = '<?php echo 'http://' . env('SERVER_NAME') . $this->Html->url(array('controller' => 'commerciales', 'action' => 'admin_index')) ?>';
            ">
                <?php echo __('Liste Commerciales'); ?>
    </button>
</div>