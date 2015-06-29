<?php // debug($factures);       ?>
<div class="page-header">
    <h1><?php echo __('Mes Factures'); ?></h1>
    <button class="btn btn-primary" onclick="document.location.href='<?php echo $this->Html->url(array('controller'=>'factures','action'=>'add','com'=>true),true); ?>';">
        <?php echo __('Ajout une Facture'); ?>
    </button>
</div>
<div class="row">
    <div class="span10">
        <?php if (empty($factures)): ?>
            <p>
                <?php echo __('Vous n\'avez pas encore de client.'); ?>
            </p>
        <?php else: ?>
            <div class="panel-body">
                <div class="adv-table">
                    <table  class="display table table-bordered table-striped" id="UsersListe">
                        <thead>
                            <tr>
                                <th><?php echo __("Client"); ?></th>
                                <th><?php echo __("Code Facture"); ?></th>
                                <th><?php echo __('Ajouté le'); ?></th>
                                <th><?php echo __('Actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($factures as $user): ?>
                                <tr class="gradeX">
                                    <td><?php echo $user['User']['display_name']; ?></td>
                                    <td><?php echo $user['Facture']['code_facture']; ?></td>
                                    <td><?php echo $user['Facture']['created']; ?></td>
                                    <td>
                                        <i style="cursor: pointer" class="btn btn-info btn-sm glyphicon glyphicon-play" onclick="document.location.href='<?php echo $this->Html->url(array('controller'=>'factures','action'=>'view','com'=>true,$user['Facture']['id'])); ?>';"></i>&nbsp;
                                       <!-- <?php if ($user['Facture']['avoir'] == 1): ?>
                                            <label class="label label-info"><?php echo __('Facture en Avoir'); ?></label>
                                        <?php else: ?>
                                            <a class="label label-danger" href="<?php echo $this->Html->url(array('controller' => 'factures', 'action' => 'avoir', 'com' => true, $user['Facture']['id'])); ?>">
                                                <?php echo __('Réclamer un Avoir'); ?>
                                            </a>
                                        <?php endif; ?>-->
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th><?php echo __("Client"); ?></th>
                                <th><?php echo __("Code Facture"); ?></th>
                                <th><?php echo __('Rôle'); ?></th>
                                <th><?php echo __('Actions'); ?></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php echo $this->Html->script('jquery.dataTables', array('inline' => false)); ?>
<?php echo $this->Html->scriptStart(array('inline' => false, 'charset' => 'utf-8')); ?>
$(document).ready(function(){
$('#UsersListe').dataTable({
"aaSorting": [[ 2, "desc" ]]
});
});
<?php echo $this->Html->scriptEnd(); ?>