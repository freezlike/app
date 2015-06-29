<?php
echo $this->Html->css('demo_page',array('inline'=>false));
echo $this->Html->css('demo_table',array('inline'=>false));
?>
<div class="page-header">
    <h1><?php echo __('Mes Produits'); ?></h1>
    <button class="btn btn-primary" onclick="document.location.href = '<?php echo $this->Html->url(array('controller' => 'designations', 'action' => 'edit', 'admin' => true), true); ?>';">
        <?php echo __('Ajouter un Produit'); ?>
    </button>
</div>
<div class="row">
    <div class="span10">
        <?php if (empty($produits)): ?>
            <p>
                <?php echo __('Vous n\'avez pas encore de produit.'); ?>
            </p>
        <?php else: ?>
            <div class="panel-body">
                <div class="adv-table">
                    <table  class="display table table-bordered table-striped" id="UsersListe">
                        <thead>
                            <tr>
                                <th><?php echo __("Libellé"); ?></th>
                                <th><?php echo __("Prix"); ?></th>
                                <th><?php echo __('Actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($produits as $produit): ?>
                                <tr class="gradeX">
                                    <td><?php echo $produit['Designation']['name']; ?></td>
                                    <td><?php echo $produit['Designation']['price']; ?></td>
                                    <td>
                                        <a class="btn btn-success btn-sm" href="<?php echo $this->Html->url(array('controller' => 'designations', 'action' => 'edit', 'admin' => true, $produit['Designation']['id'])); ?>"><i class="glyphicon glyphicon-pencil"></i></a>
                                        <a class="btn btn-danger btn-sm" href="<?php echo $this->Html->url(array('controller' => 'designations', 'action' => 'delete', 'admin' => true, $produit['Designation']['id'])); ?>"><i class="glyphicon glyphicon-remove"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th><?php echo __("Libellé"); ?></th>
                                <th><?php echo __("Prix"); ?></th>
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
$(document).ready(function() {
$('#UsersListe').dataTable( {
"aaSorting": [[ 2, "desc" ]]
} );
} );
<?php echo $this->Html->scriptEnd(); ?>