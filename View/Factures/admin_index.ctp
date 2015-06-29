<?php $this->set('title_for_layout', __('Admin | Factures List')); ?>
<div class="page-header">
    <h2>Gestions Factures</h2>
</div>
<p><?php echo$this->Html->link('Ajouter une Facture', array('action' => 'add', 'admin' => true), array('class' => 'btn btn-primary')); ?></p>
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
                                <th><?php echo __("Commerciale"); ?></th>
                                <th><?php echo __('Ajouté le'); ?></th>
                                <th><?php echo __("Date d'échéance"); ?></th>
                                <th><?php echo __('Actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($factures as $user): ?>
                                <tr class="gradeX">
                                    <td><?php echo $user['User']['display_name']; ?></td>
                                    <td><?php echo $user['Facture']['code_facture']; ?></td>
                                    <td><?php echo $user['Commerciale']['name'] . ' ' . $user['Commerciale']['last_name']; ?></td>
                                    <td><?php echo $user['User']['created']; ?></td>
                                    <td><?php echo $user['Facture']['limit_date']; ?></td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="<?php echo $this->Html->url(array('controller' => 'factures', 'action' => 'view', 'admin' => true, $user['Facture']['id'])); ?>"><i class="glyphicon glyphicon-play"></i></a>
                                        <?php if ($user['Facture']['avoir'] == 1): ?>
                                            <label class="label label-info"><?php echo __('Facture en Avoir'); ?></label>
                                        <?php else: ?>
                                            <a class="label label-danger" href="<?php echo $this->Html->url(array('controller' => 'factures', 'action' => 'avoir', 'admin' => true, $user['Facture']['id'])); ?>">
                                                <?php echo __('Réclamer un Avoir'); ?>
                                            </a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th><?php echo __("Client"); ?></th>
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
$('#UsersListe').dataTable({
"aaSorting": [[ 3, "desc" ]]
});
});
<?php echo $this->Html->scriptEnd(); ?>