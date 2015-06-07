<?php $this->set('title_for_layout', __("Ajouter Diplome")); ?>
<div class="row">
    <div class="col-mod-12">
        <ul class="breadcrumb">
            <li><a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'home')); ?>"><?php echo __("Dashboard"); ?></a></li>
            <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'index')); ?>"><?php echo __("Gestion Users"); ?></a></li>
                 <li class="active"><?php echo __("Fiche Employé Diplome"); ?></li>
<!--                 <h3 class="page-header"> <b><?php echo __("Ajouter Dilpomes"); ?></b><?php //echo ucfirst($user['User']['first_name']) . " " . ucfirst($user['User']['last_name']); ?> </h3>-->
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-cascade">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <?php echo __("Ajouter Diplome"); ?>
                   
                    <span class="pull-right">
                        <a href="#" class="panel-minimize"><i class="fa fa-chevron-up"></i></a>
                        <a href="#" class="panel-close"><i class="fa fa-times"></i></a>
                    </span>
                </h3>
            </div>
            <div class="panel-body">
                <?php
                echo $this->Form->create('Diplome', array(
                    'class' => 'form-horizontal cascde-forms',
                    'inputDefaults' => array(
                        'div' => false,
                        'label' => false,
                        'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
                )));
                ?>
                
                <div class="form-group">
                    <label class="col-md-3 control-label"><?php echo __("Diplome"); ?></label>
                    <div class="col-md-9">
                        <?php echo $this->Form->input('name', array('placeholder' => __("Diplome"), 'class' => 'form-control form-cascade-control input-small')); ?>
                    </div>
                </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"><?php echo __("Source"); ?></label>
                        <div class="col-md-9">
                            <?php echo $this->Form->input('source', array('placeholder' => __("Source"), 'class' => 'form-control form-cascade-control input-small')); ?>
                        </div>
                    </div>
                
                <div class="form-group">
                    <div class="col-md-3 col-md-offset-3">
                        <?php if(!empty($this->request->data)): ?>
                        <?php echo $this->Form->submit(__("Modifier "), array('div' => false, 'class' => 'btn bg-primary text-white')) ?>
                        <?php else: ?>
                        <?php echo $this->Form->submit(__("Ajouter"), array('div' => false, 'class' => 'btn bg-primary text-white')) ?>
                        <?php endif; ?>
                        <?php if(!empty($this->request->data)): ?>
                        <?php else:?>
                         <button class="btn bg-info text-white" type="reset">Annuler</button>        
                         <?php endif;?>
                    </div>
                </div>

          <?php echo $this->Form->end();?>
            </div>
        </div>

    </div>
    
    <div class="col-md-12">
        <div class="panel panel-cascade">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <?php echo __("Liste Diplomes"); ?>
                   
                    <span class="pull-right">
                        <a href="#" class="panel-minimize"><i class="fa fa-chevron-up"></i></a>
                        <a href="#" class="panel-close"><i class="fa fa-times"></i></a>
                    </span>
                </h3>
            </div>
            <div class="panel-body">
                <div class="row margin">
    <div class="col-mod-12">
        <table  class="display table table-bordered table-striped" id="UsersListe">
            <thead>
                <tr>
                    <th><?php echo __("Diplome"); ?></th>
                    <th><?php echo __('Source'); ?></th>
                    <th><?php echo __('Actions'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($diplomes as $diplome):  ?>
                    
                <tr class="gradeX">
                        <td><?php echo $diplome['Diplome']['name']; ?></td>
                        <td><?php echo $diplome['Diplome']['source']; ?></td>
                                               
                        <td>
                           
                            <a class="btn bg-success btn-sm" href="<?php echo $this->Html->url(array('controller' => 'diplomes', 'action' => 'ajout_diplome', 'id' => $diplome['Diplome']['id'])); ?>"><i class="fa fa-edit"></i></a>
                            
                            &nbsp;<a class="btn bg-danger btn-sm" data-bb="dialog" href="#"  id="<?php echo $diplome['Diplome']['id']; ?>"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
              <th><?php echo __("Diplome"); ?></th>
                    <th><?php echo __('Source'); ?></th>
                    <th><?php echo __('Actions'); ?></th>
                </tr>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
            </div>
        </div>

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
    console.log(id);
    
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
                document.location.href  = '<?php echo $this->Html->url(array('controller'=>'diplomes','action'=>'delete'),true) ?>/' + id;
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
