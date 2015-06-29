<?php $this->set('title_for_layout', __("Ajout Compétence")); ?>
<div class="row">
    <div class="col-mod-12">
        <ul class="breadcrumb">
            <li><a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'home')); ?>"><?php echo __("Dashboard"); ?></a></li>
            <li><a href="<?php echo $this->Html->url(array('controller' => 'competences', 'action' => 'edit')); ?>"><?php echo __("Gestion Compétences"); ?></a></li>
             <?php if (!empty($this->request->data)): ?>
                <li class="active"><?php echo __("Editer Compétence"); ?></li>
            <?php else: ?>
                <li class="active"><?php echo __("Ajouter Compétence"); ?></li>
            <?php endif; ?>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-cascade">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <?php if (!empty($this->request->data)): ?>
                        <?php echo __("Editer Compétence"); ?>
                    <?php else: ?>
                        <?php echo __("Ajouter Compétence"); ?>
                    <?php endif; ?>
                    <span class="pull-right">
                        <a href="#" class="panel-minimize"><i class="fa fa-chevron-up"></i></a>
                        <a href="#" class="panel-close"><i class="fa fa-times"></i></a>
                    </span>
                </h3>
            </div>
            <div class="panel-body">
                <?php
                echo $this->Form->create('Competence', array(
                    'class' => 'form-horizontal cascde-forms',
                    'inputDefaults' => array(
                        'div' => false,
                        'label' => false,
                        'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
                )));
                ?>
                <?php if (!empty($this->request->data)): ?>
                    <?php echo $this->Form->input('id'); ?>
                <?php endif; ?>
                
                <div class="form-group">
                    <label class="col-md-3 control-label"><?php echo __("Competence"); ?></label>
                    <div class="col-md-9">
                        <?php echo $this->Form->input('nom', array('placeholder' => __("Competence"), 'class' => 'form-control form-cascade-control input-small')); ?>
                    </div>
                </div>
                 
                 <div class="form-group">
                    <label class="col-md-3 control-label"><?php echo __("Département"); ?></label>
                    <div class="col-md-9">
                        <?php echo $this->Form->input('departement_id', array('placeholder' => __("Département"), 'class' => 'form-control form-cascade-control input-small')); ?>
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
                 <?php $this->end(); ?>  
                
            </div>
        </div>

    </div>
</div>
<div class="col-md-12">
        <div class="panel panel-cascade">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <?php echo __("Liste Compétence"); ?>
                   
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
                    <th><?php echo __("Compétence"); ?></th>
                    <th><?php echo __('Département'); ?></th>
                    <th><?php echo __('Actions'); ?></th>
                   
                </tr>
            </thead>
            <tbody>
                <?php foreach ($competences as $competence): ?>
                    <tr class="gradeX">
                        <td><?php echo $competence['Competence']['nom']; ?></td>
                        <td><?php echo $competence['Departement']['name']; ?></td>
                      
                        <td>
                            <a class="btn bg-success btn-sm" href="<?php echo $this->Html->url(array('controller' => 'competences', 'action' => 'edit', 'id' => $competence['Competence']['id'])); ?>"><i class="fa fa-edit"></i></a>
                            &nbsp;<a class="btn bg-danger btn-sm" data-bb="dialog" href="#"  id="<?php echo $competence['Competence']['id']; ?>"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                    <th><?php echo __("Compétence"); ?></th>
                    <th><?php echo __('Département'); ?></th>
                    <th><?php echo __('Actions'); ?></th>
                   
                </tr>
            </tfoot>
        </table>
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
                document.location.href  = '<?php echo $this->Html->url(array('controller'=>'competences','action'=>'delete'),true) ?>/' + id;
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

         