<?php //debug($commerciales); ?>
<h1><?php echo __('Gestions Commerciales'); ?></h1>


<p><?php echo$this->Html->link('Ajouter un Commerciale', array('action' => 'add', 'admin' => true), array('class' => 'btn btn-primary')); ?></p>
<div class="row">
    <div class="span10">
        <?php if (empty($commerciales)): ?>
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
                                <th><?php echo __("Email"); ?></th>
                                <th><?php echo __('Ajouté le'); ?></th>
                                <th><?php echo __('Nombre de Clients'); ?></th>
                                <th><?php echo __('Actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($commerciales as $user): ?>
                                <tr class="gradeX">
                                    <td><?php echo $user['Commerciale']['username']; ?></td>
                                    <td><?php echo $user['Commerciale']['email']; ?></td>
                                    <td><?php echo $user['Commerciale']['created']; ?></td>
                                    <td><?php echo $user['Commerciale']['user_count']; ?></td>
                                    <td>
                                        <a href="<?php echo $this->Html->url(array('controller' => 'commerciales', 'action' => 'viewClient', 'admin' => true, $user['Commerciale']['id'])); ?>" class="btn btn-info">Voir Clients&nbsp;<i class="glyphicon glyphicon-play"></i></a>
                                        <a href="<?php echo $this->Html->url(array('controller' => 'commerciales', 'action' => 'edit', 'admin' => true, $user['Commerciale']['id'])); ?>" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i></a>
                                        <a href="<?php echo $this->Html->url(array('controller' => 'commerciales', 'action' => 'delete', 'admin' => true, $user['Commerciale']['id'])); ?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th><?php echo __("Nom d'utilisateur"); ?></th>
                                <th><?php echo __("Email"); ?></th>
                                <th><?php echo __('Ajouté le'); ?></th>
                                <th><?php echo __('Nombre de Clients'); ?></th>
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
"aaSorting": [[ 4, "desc" ]]
});
});
<?php echo $this->Html->scriptEnd(); ?>