<?php $this->set('title_for_layout', __("Ajout Poste")); ?>
<?php echo $this->Html->css('demo_table',array('inline'=>false)); ?>
<?php echo $this->Html->css('demo',array('inline'=>false)); ?>
<div class="row">
    <div class="col-mod-12">
        <ul class="breadcrumb">
            <li><a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'home')); ?>"><?php echo __("Dashboard"); ?></a></li>
            <li><a href="<?php echo $this->Html->url(array('controller' => 'postes', 'action' => 'edit')); ?>"><?php echo __("Gestion Postes"); ?></a></li>
             <?php if (!empty($this->request->data)): ?>
                <li class="active"><?php echo __("Editer Poste"); ?></li>
            <?php else: ?>
                <li class="active"><?php echo __("Ajouter Poste"); ?></li>
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
                        <?php echo __("Editer Poste"); ?>
                    <?php else: ?>
                        <?php echo __("Ajouter Poste"); ?>
                    <?php endif; ?>
                    <span class="pull-right">
                        <a href="#" class="panel-minimize"><i class="fa fa-chevron-up"></i></a>
                        <a href="#" class="panel-close"><i class="fa fa-times"></i></a>
                    </span>
                </h3>
            </div>
            <div class="panel-body">
                <?php
                echo $this->Form->create('Poste', array(
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
                    <label class="col-md-3 control-label"><?php echo __("Nom du Poste"); ?></label>
                    <div class="col-md-9">
                        <?php echo $this->Form->input('name', array('placeholder' => __("Nom du Poste"), 'class' => 'form-control form-cascade-control input-small')); ?>
                    </div>
                </div>
                 <div class="form-group">
                    <label class="col-md-3 control-label"><?php echo __("Salaire"); ?></label>
                    <div class="col-md-9">
                        <?php echo $this->Form->input('salaire', array('placeholder' => __("Salaire"), 'class' => 'form-control form-cascade-control input-small')); ?>
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
                        <?php if (!empty($this->request->data)): ?>
                            <?php echo $this->Form->submit(__("Modifier"), array('div' => false, 'class' => 'btn bg-primary text-white')) ?>
                        <?php else: ?>
                            <?php echo $this->Form->submit(__("Ajouter"), array('div' => false, 'class' => 'btn bg-primary text-white')) ?>
                            <button class="btn bg-info text-white" type="reset">Annuler</button>
                        <?php endif; ?>
                    </div>
                </div>
                 <?php $this->end(); ?>  
                
            </div>
        </div>

    </div>
</div>
<div class="row">
    <div class="col-md-12">
    <div class="panel panel-cascade">
        <div class="panel-heading">
            <h3 class="panel-title">
                <?php echo __("Liste Postes"); ?>

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
                                <th><?php echo __("Nom du Poste"); ?></th>
                                <th><?php echo __('Salaire'); ?></th>
                                <th><?php echo __('Département'); ?></th>
                                <th><?php echo __('Actions'); ?></th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($postes as $poste): ?>
                                <tr class="gradeX">
                                    <td><?php echo $poste['Poste']['name']; ?></td>
                                    <td><?php echo $poste['Poste']['salaire']; ?></td>
                                    <td><?php echo $poste['Departement']['name']; ?></td>

                                    <td>
                                        <a class="btn bg-success btn-sm" href="<?php echo $this->Html->url(array('controller' => 'postes', 'action' => 'edit', 'id' => $poste['Poste']['id'])); ?>"><i class="fa fa-edit"></i></a>
                                        &nbsp;<a class="btn bg-danger btn-sm" data-bb="dialog" href="#"  id="<?php echo $poste['Poste']['id']; ?>"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                        <th><?php echo __("Nom du Poste"); ?></th>
                        <th><?php echo __('Salaire'); ?></th>
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
</div>
<?php echo $this->Html->script('jquery.dataTables.min', array('inline' => false)); ?>
<?php echo $this->Html->script('bootstrap-datatables', array('inline' => false)); ?>
<?php echo $this->Html->script('bootbox', array('inline' => false)); ?>
<?php echo $this->Html->scriptStart(array('inline' => false, 'charset' => 'utf-8')); ?>
var id = 0;
$(document).ready(function() {
$('#UsersListe').dataTable( {
"aaSorting": [[ 4, "desc" ]],
"oLanguage": {
            "sSearch" : "Recherche",
            "lengthMenu": "Display _MENU_ records per page",
            "zZeroRecords": "Nothing foundqsdqs - sorry",
            "info": "Showing page _PAGE_ of _PAGES_",
            "bJQueryUI": true,
            "infoEmpty": "No records savailable",
            "infoFiltered": "(filtered from _MAX_ total records)",
        }
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
                document.location.href  = '<?php echo $this->Html->url(array('controller'=>'postes','action'=>'delete'),true) ?>/' + id;
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
    
setTimeout(function(){
$("#UsersListe_filter").children().children().addClass("form-control input-small");
},2000);
<?php echo $this->Html->scriptEnd(); ?>

         