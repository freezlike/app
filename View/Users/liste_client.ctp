<?php //debug($clients);  ?>
<?php $this->set('title_for_layout', __('Liste Clients')); ?>
<div class="page-header">
    <h2><?php echo __('Clients Commerciale : '). $com['User']['full_name']; ?></h2>
</div>
<p>
    <?php echo$this->Html->link('Ajouter un User', array('action' => 'edit', 'admin' => true), array('class' => 'btn btn-primary')); ?>
</p>
<div class="row">
    <div class="span10">
        <?php if (empty($clients)): ?>
            <p>
                <?php echo __('Vous n\'avez pas encore de client.'); ?>
            </p>
        <?php else: ?>
            <?php //debug($users); ?>
            <div class="panel-body">
                <div class="adv-table">
                    <table class="display table table-bordered table-striped" id="UsersListe">
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
                                    <td><?php echo $user['User']['full_name']; ?></td>
                                    <td><?php echo $user['User']['created']; ?></td>
                                    <td>
                                        <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'edit', 'admin' => false, $user['User']['id'])); ?>"><i class="glyphicon glyphicon-pencil"></i></a>
                                        <?php //if ($user['Role']['name'] !== 'admin'): ?>
                                            <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'delete', 'admin' => false, $user['User']['id'])); ?>"><i class="glyphicon glyphicon-remove"></i></a>
                                            <?php //endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th><?php echo __("Nom d'utilisateur"); ?></th>
                                <th><?php echo __("Client"); ?></th>
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