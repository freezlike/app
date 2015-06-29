<?php $this->set('title_for_layout', __("Liste Projets")); ?>
<?php echo $this->Html->css('demo_table', array('inline' => false)); ?>
<div class="row">
    <div class="col-mod-12">
        <ul class="breadcrumb">
            <li><a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'home')); ?>"><?php echo __("Dashboard"); ?></a></li>
            <li><a href="#" onclick="return false;"><?php echo __("Gestion Projets"); ?></a></li>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-mod-12">
        <table  class="display table table-bordered table-striped" id="UsersListe">
            <thead>
                <tr>
                    <th><?php echo __("Nom du Projet"); ?></th>
                    <th><?php echo __('Description'); ?></th>
                    <th><?php echo __('Département'); ?></th>
                    <th><?php echo __('Actions'); ?></th>
                   
                </tr>
            </thead>
            <tbody>
                <?php foreach ($projets as $projet): ?>
                    <tr class="gradeX">
                        <td><?php echo $projet['Projet']['name']; ?></td>
                        <td><?php echo $projet['Projet']['description']; ?></td>
                        <td><?php echo $projet['Departement']['name']; ?></td>
                      
                        <td>
                            <a class="btn bg-success btn-sm" href="<?php echo $this->Html->url(array('controller' => 'projets', 'action' => 'edit', 'id' => $projet['Projet']['id'])); ?>"><i class="fa fa-edit"></i></a>
                            &nbsp;<a class="btn bg-danger btn-sm" data-bb="dialog" href="#"  id="<?php echo $projet['Projet']['id']; ?>"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th><?php echo __("Nom du Projet"); ?></th>
                    <th><?php echo __('Description'); ?></th>
                    <th><?php echo __('Département'); ?></th>
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
        message: "<?php echo __("Suppression De Projet") ?>",
        title: "<?php echo __("Vous êtes sûr de supprimer") ?>",
        buttons: {
          success: {
            label: "Supprimer",
            className: "btn-success",
            callback: function() {
                document.location.href  = '<?php echo $this->Html->url(array('controller'=>'projets','action'=>'delete'),true) ?>/' + id;
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