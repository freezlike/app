<?php $this->set('title_for_layout', __("Liste Employés")); ?>
<?php echo $this->Html->css('demo_table', array('inline' => false)); ?>
<div class="row">
    <div class="col-mod-12">
        <ul class="breadcrumb">
            <li><a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'home')); ?>"><?php echo __("Dashboard"); ?></a></li>
            <li><a href="#" onclick="return false;"><?php echo __("Gestion Users"); ?></a></li>
        </ul>
    </div>
</div>
<div class="row margin">
    <div class="col-mod-12">
        <table  class="display table table-bordered table-striped" id="UsersListe">
            <thead>
                <tr>
                    <th><?php echo __("Nom"); ?></th>
                    <th><?php echo __('Prénom'); ?></th>
                    <th><?php echo __('Groupe'); ?></th>
                    <th><?php echo __('Email'); ?></th>
                    <th><?php echo __('Téléphone'); ?></th>
                    <th><?php echo __('Poste'); ?></th>
                    <th><?php echo __('Actions'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr class="gradeX">
                        <td><?php echo $user['User']['first_name']; ?></td>
                        <td><?php echo $user['User']['last_name']; ?></td>
                        <td><?php echo $user['Group']['name']; ?></td>
                        <td><?php echo $user['User']['email']; ?></td>
                        <td><?php echo $user['User']['telephone']; ?></td>
                        <td><?php echo $user['Poste']['name']; ?></td>
                        <td>
                                
                            <a class="btn bg-info btn-sm" href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'more', 'id'=> $user['User']['id'])); ?>"><i class="fa fa-sitemap"></i></a>
                            <a class="btn bg-success btn-sm" href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'edit', 'id' => $user['User']['id'])); ?>"><i class="fa fa-edit"></i></a>
                            <a class="btn bg-warning btn-sm" style="width: 34px;" href="<?php echo $this->Html->url(array('controller' => 'payments', 'action' => 'virement', 'id' => $user['User']['id'])); ?>"><i class="fa fa-euro"></i></a>
                            &nbsp;<a class="btn bg-danger btn-sm" data-bb="dialog" href="#"  id="<?php echo $user['User']['id']; ?>"><i class="fa fa-times"></i></a>
                            <?php if($user['User']['group_id']=='2'): ?>
                                    <a class="btn bg-primary btn-sm" href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'liste_client', 'id'=> $user['User']['id'])); ?>"> Voir Clients <i class="fa fa-caret-right"></i></a>
                                <?php endif;?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th><?php echo __("Nom"); ?></th>
                    <th><?php echo __('Prénom'); ?></th>
                    <th><?php echo __('Groupe'); ?></th>
                    <th><?php echo __('Email'); ?></th>
                    <th><?php echo __('Téléphone'); ?></th>
                    <th><?php echo __('Poste'); ?></th>
                    <th><?php echo __('Actions'); ?></th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<?php echo $this->Html->script('bootstrap-datatables', array('inline' => false)); ?>
<?php echo $this->Html->script('bootbox', array('inline' => false)); ?>
<?php echo $this->Html->scriptStart(array('inline' => false, 'charset' => 'utf-8')); ?>
var id = 0;
$(document).ready(function() {
$('#UsersListe').dataTable( {
"aaSorting": [[ 4, "desc" ]]
} );
} );
var demos = {};
$(document).on("click", "a[data-bb]", function(e) {
    e.preventDefault();
    id = $(this).attr('id');
    
    var type = $(this).data("bb");
    if (typeof demos[type] === 'function') {
    demos[type]();
}
});
demos.dialog = function(event) {
      bootbox.dialog({
        message: "<?php echo __("Suppression D'utilisateur") ?>",
        title: "<?php echo __("Vous êtes sûr de supprimer") ?>",
        buttons: {
          success: {
            label: "Supprimer",
            className: "btn-success",
            callback: function() {
                document.location.href  = '<?php echo $this->Html->url(array('controller'=>'users','action'=>'delete'),true) ?>/' + id;
            }
          },
          danger: {
            label: "Annuler",
            className: "btn-default",
            callback: function() {
             // $(this).fadeOut();
            }
          }
        }
      });
    };
demos.confirm = function() {
bootbox.confirm("<?php echo __("Vous êtes sûr de supprimer") ?>?", function(result) {
            //Example.show("Confirm result: "+result);
        });
    };
<?php echo $this->Html->scriptEnd(); ?>