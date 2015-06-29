<div class="page-header">
    <h1><?php echo __('Mes Clients'); ?></h1>
    <button class="btn btn-primary" onclick="document.location.href = '<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'add', 'com' => true), true); ?>';">
        <?php echo __('Ajouter un Client'); ?>
    </button>
</div>
<div class="row">
    <div class="span10">
        <?php if (empty($clients)): ?>
            <p>
                <?php echo __('Vous n\'avez pas encore de client.'); ?>
            </p>
        <?php else: ?>
            <div class="panel-body">
                <div class="adv-table">
                    <table  class="display table table-bordered table-striped" id="UsersListe">
                        <thead>
                            <tr>
                                <th><?php echo __("Nom d'utilisateur"); ?></th>
                                <th><?php echo __("Client"); ?></th>
                                <th><?php echo __('Ajouté le'); ?></th>
                                <th><?php echo __('Actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($clients as $user): ?>
                                <tr class="gradeX">
                                    <td><?php echo $user['User']['username']; ?></td>
                                    <td><?php echo $user['User']['display_name']; ?></td>
                                    <td><?php echo $user['User']['created']; ?></td>
                                    <td>
                                        <a class="btn btn-info" href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'report', 'com' => true, $user['User']['id'])); ?>">Report&nbsp;<i class="glyphicon glyphicon-pushpin"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th><?php echo __("Nom d'utilisateur"); ?></th>
                                <th><?php echo __('Client'); ?></th>
                                <th><?php echo __('Ajouté le'); ?></th>
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