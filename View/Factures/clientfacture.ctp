<h1><?php echo __('Mes Factures'); ?></h1>
<?php //debug($factures); ?>
<div class="row">
    <div class="span10">
        <?php if (empty($factures)): ?>
            <p>
                <?php echo __('Vous n\'avez pas encore de client.'); ?>
            </p>
        <?php else: ?>
            <div class="panel-body">
                <div class="adv-table">
                    <table  class="display table table-bordered table-striped" id="FactureListe">
                        <thead>
                            <tr>
                                <th><?php echo __("Code Facture"); ?></th>
                                <th><?php echo __("Commerciale"); ?></th>
                                <th><?php echo __('Ajouté le'); ?></th>
                                <th><?php echo __("Date d'échéance"); ?></th>
                                <th><?php echo __('Actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($factures as $user): ?>
                                <tr class="gradeX">
                                    <td><?php echo $user['Facture']['code_facture']; ?></td>
                                    <td><?php echo $user['Commerciale']['name'].' '.$user['Commerciale']['last_name']; ?></td>
                                    <td><?php echo $user['Facture']['created']; ?></td>
                                    <td><?php echo $user['Facture']['limit_date']; ?></td>
                                    <td>
                                        <a href="<?php echo $this->Html->url(array('controller' => 'factures', 'action' => 'viewc', 'admin' => FALSE, $user['Facture']['id'])); ?>"><i class="glyphicon glyphicon-play"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th><?php echo __("Code Facture"); ?></th>
                                <th><?php echo __("Commerciale"); ?></th>
                                <th><?php echo __('Ajouté le'); ?></th>
                                <th><?php echo __("Date d'échéance"); ?></th>
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
	$('#FactureListe').dataTable({
		"aaSorting": [[ 1, "desc" ]]
	});
});
<?php echo $this->Html->scriptEnd(); ?>