<div class="page-header">
    <h3>Réclamer un avoir :</h3>
    <div class="pull-right">
        <a href="<?php echo $this->Html->url(array('controller' => 'factures', 'action' => 'index', 'admin' => true)); ?>" class="btn btn-primary btn-sm pull-right" style="margin-top: 4px;margin-right: 6px;"><i class="pull-right glyphicon glyphicon-arrow-left" style="margin-top: 2px;margin-left: 6px;"></i> <?php echo __('Retour Factures'); ?></a>
    </div>
    <div class="panel panel-warning">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo __('Code Facture : ') . $factures['Facture']['code_facture']; ?></h3>
        </div>
        <div class="panel-body">
            <div class="alert alert-info">
                Etes vous sûr de réclamer un avoir sur cette facture ?
            </div> 
            <div class="row">
                <div class="col-md-12">
                    <?php
                    echo $this->Form->create('Facture', array(
                        'inputDefaults' => array('label' => false, 'div' => false)
                    ));
                    ?>
                    <div class="label label-info" style="font-size: 18px;"><input type="radio" name="data[Facture][Rvalue]" step="any" value="oui">&nbsp;<?php echo __('Oui'); ?></div>
                    <div class="label label-success" style="font-size: 18px;"><input type="radio" name="data[Facture][Rvalue]" step="any" value="non" >&nbsp;<?php echo __('Non'); ?></div>
                    <div class="cb"></div>
                    <input class="btn btn-danger form-control" type="submit" value="Valider" >
                    <?php echo $this->Form->end(); ?>

                </div>
            </div>
        </div>
    </div>
</div>