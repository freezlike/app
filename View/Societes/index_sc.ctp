<?php $this->set('title_for_layout', __("Liste Societés")); ?>
<?php echo $this->Html->css('demo_table', array('inline' => false)); ?>
<div class="row">
    <div class="col-mod-12">
        <ul class="breadcrumb">
            <li><a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'home')); ?>"><?php echo __("Dashboard"); ?></a></li>
            <li><a href="#" onclick="return false;"><?php echo __("Gestion Societés"); ?></a></li>
        </ul>
    </div>
</div>
<div class="row margin">
    <div class="col-mod-12">
        <table  class="display table table-bordered table-striped" id="UsersListe">
            <thead>
                <tr>
                    <th><?php echo __("Raison Sociale"); ?></th>
                    <th><?php echo __('Activité'); ?></th>
                    <th><?php echo __('Téléphone'); ?></th>
                    <th><?php echo __('Fax'); ?></th>
                    <th><?php echo __('Email'); ?></th>
                    <th><?php echo __('Personne de contact'); ?></th>
                    <th><?php echo __('Actions'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php //debug($societes)?>
                <?php foreach ($societes as $societe): ?>
                    <tr class="gradeX">
                        <td><?php echo $societe['Societe']['raison_social']; ?></td>
                        <td><?php echo $societe['Societe']['activite']; ?></td>
                        <td><?php echo $societe['Societe']['telephone']; ?></td>
                        <td><?php echo $societe['Societe']['tel_fax']; ?></td>
                        <td><?php echo $societe['Societe']['mail']; ?></td>
                        <td data-id='<?php echo $societe['Contact']['id']; ?>' data-parent='<?php echo $societe['Societe']['id']; ?>'><?php echo $societe['Contact']['full_name']; ?><i class="btn bg-info fa fa-pencil pull-right" id="Personne"></i></td>
                                               
                        <td>
                           
                            <a class="btn bg-success btn-sm" href="<?php echo $this->Html->url(array('controller' => 'societes', 'action' => 'edit', 'id' => $societe['Societe']['id'])); ?>"><i class="fa fa-edit"></i></a>
                            
                            &nbsp;<a class="btn bg-danger btn-sm" data-bb="dialog" href="#"  id="<?php echo $societe['Societe']['id']; ?>"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th><?php echo __("Raison Sociale"); ?></th>
                    <th><?php echo __('Activité'); ?></th>
                    <th><?php echo __('Téléphone'); ?></th>
                    <th><?php echo __('Fax'); ?></th>
                    <th><?php echo __('Email'); ?></th>
                    <th><?php echo __('Personne de contact'); ?></th>
                    <th><?php echo __('Actions'); ?></th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<!-- modale -->
<div class="modal fade" id="myModal" style="top: -6%;">
    <div class="modal-dialog">
        <div class="modal-content" style="height: 575px; width: 750px;">
            <div class="modal-header bg-info">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title text-white"></h4>
            </div>
            <div class="modal-body">
                <div id="wrapper">

                    <div class="scrollbar" id="style-5">

                        <p id="content-b">
                        <div class="col-md-12">

                            <form id="InfroText" method="POST">
                                <input type="hidden" name="InfroText" value="1">
                                <?php
                                    echo $this->Form->create('Tache', array('inputDefaults' => array(
                                        'div' => false,
                                        'label' => false,
                                        'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
                                    )));
                                ?>
                                <?php if (!empty($this->request->data)): ?>
                                    <?php echo $this->Form->input('id'); ?>
                                <?php endif; ?>
    <!-- Exemple -->
                <div class="col-md-12 user-details well text-center col-md-12">
                    <img src="/largestrh/img/avatar.png" class="main-avatar">
                    <div class="user-main-info">
                        <h2 class="text-primary user-name" id="name_contact"></h2>
                        <div style="display:none" id="div_name"><input type="text" id="last_name">&nbsp;<input type="text" id="first_name">&nbsp;<i class="fa fa-check" id="valid_name"></i></div>
                      <h4 class="text-info user-designation"><?php //echo $societe['Societe']['name']; ?></h4>
                      <a href="#" class="btn btn-success"><i class="fa fa-envelope-o"></i> Email </a>
                      <a href="#" class="btn btn-info"><i class="fa fa-comment"></i> Chat </a>
                    </div>
                    
                    <ul class="list-group details-list">
                        
                     <li class="list-group-item fa fa-phone" id="tel" style="margin-top: 20px; margin-bottom: 5px;width: 500px;">
                         
                    </li>
                    <i class="fa fa-pencil" id="tel_modif"></i>
                    <div style="display:none" id="div_tel"><input type="text" id="tel_c">&nbsp;<i class="fa fa-check" id="valid_tel"></i></div>
                    <li class="list-group-item fa fa-envelope" id="email" name="email" style=" margin-bottom: 5px;width: 500px;">
                    </li>
                    <i class="fa fa-pencil" id="mail_modif"></i>
                    <div style="display:none" id="div_mail"><input type="text" id="mail_c">&nbsp;<i class="fa fa-check" id="valid_mail"></i></div>
                    
                    <li class="list-group-item fa fa-map-marker"  id="adresse" name="adresse" style=" margin-bottom: 5px;width: 500px;">
                    </li>
                    <i class="fa fa-pencil" id="adresse_modif"></i>
                    <div style="display:none" id="div_adresse"><input type="text" id="adresse_c">&nbsp;<i class="fa fa-check" id="valid_adresse"></i></div>
<!--                    <li class="list-group-item" id="pays" name="pays" style=" margin-bottom: 5px;width: 500px;">
                        <span class="badge bg-purple">50M</span>
                    </li>-->
                    <li class="list-group-item fa fa-calendar" id="date" name="born_d" style=" margin-bottom: 5px;width: 500px;">
                    </li>
                     <i class="fa fa-pencil" id="date_modif"></i>
                    <div style="display:none" id="div_date"><input type="date" id="date_c">&nbsp;<i class="fa fa-check" id="valid_date"></i></div>
                  </ul>
                </div>
    
    <!-- Fin Exemple -->
                                
                                
                                
                                
                                
<!--                                <table>
                                    <tbody>
                                        <tr>
                                            <td><?php //echo __("Téléphone  ");?><i class="fa fa-phone-square" style="font-size: 22px;"></i></td>
                                            <td><input type="text" id="tel" name="Telephone" class="btn btn-info btn-xs"></td>
                                            <td><?php //echo __("Telephone"); ?></td>
                                            <td><input type="text" name="Telephone"  id="tel" style="width:300px;margin-bottom: 9px;"></td>
                                            
                                        </tr>
                                        <tr>
                                            <td><?php //echo __("E_mail"); ?></td>
                                            <td><input type="text" name="email" id="email" style="width:300px;margin-bottom: 9px;"></td>
                                        </tr>
                                        <tr>
                                            <td><?php //echo __("Adresse"); ?></td>
                                            <td><input type="text" name="adresse" id="adresse" style="width:300px;margin-bottom: 9px;"></td>
                                           
                                        </tr>
                                        <tr><td> </td></tr>
                                        <tr>
                                            <td><?php //echo __("Pays"); ?></td>
                                            <td><input type="text" name="pays" id="pays" style="width:300px;margin-bottom: 9px;"></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><input type="submit" name="Valider" id="Valider_contact" value="Valider" class="btn bg-success text-white" data-dismiss="modal"></td>
                                        </tr>
                                    </tbody></table>-->
                            </form>
                        </div>
                        
                        </p>
                    </div>
                </div>
            </div>
            <div class="panel-footer" style="margin-top: 419px;">
                <button type="button" class="btn bg-info text-white center-block" data-dismiss="modal"><?php echo __("Fermer"); ?></button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<?php echo $this->Html->script('bootstrap-datatables', array('inline' => false)); ?>
<?php echo $this->Html->script('bootbox', array('inline' => false)); ?>
<?php echo $this->Html->scriptStart(array('inline' => false, 'charset' => 'utf-8')); ?>
<?php echo $this->Html->script('contact',array('inline'=>false)); ?>
var id = 0;
$(document).ready(function() {
    
    $("#Valider_contact").on('click', function (e){
        e.preventDefault();
        var id_contact = sessionStorage.getItem('idContact');
        var tel = $('#tel').text();
        var mail= $('#email').text();
        var adresse = $('#adresse').text();
        var pays = $('#pays').text();
        var born_d = $('#born_d').text();
        var data = [];
        data = {
            "Contact": {
                "id": id_contact,
                "telephone": tel,
                "e_mail": mail,
                "adresse": adresse,
                "pays": pays,
                "born_date": born_d
            }
        };
        console.log(data);
         var url = "<?php echo $this->Html->url(array('controller' => 'contacts', 'action' => 'modif_contact'), true); ?>/" +id_contact;
        // console.log(url);
        $.ajax({
            url: url,
            type: "PUT",
            data: data,
            success: function (result) {
                console.log('success');
            }
        });
    });
    $('#UsersListe').dataTable({
        "aaSorting": [[ 4, "desc" ]]
    });
});
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