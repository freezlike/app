<?php if (!empty($this->request->data)): ?>
    <?php $projet = $this->request->data;
 //debug($projet);    
    $projetUser = $projet['User'];    //debug($projet['Projet']['id']);?>
    <?php endif; ?>
    <?php $this->set('title_for_layout', __("Ajout Projet")); ?>
<div class="row">
    <div class="col-mod-12">
        <ul class="breadcrumb">
            <li><a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'home')); ?>"><?php echo __("Dashboard"); ?></a></li>
            <li><a href="<?php echo $this->Html->url(array('controller' => 'projets', 'action' => 'index')); ?>"><?php echo __("Gestion Projets"); ?></a></li>
            <?php if (!empty($this->request->data)): ?>
                <li class="active"><?php echo __("Editer Projet"); ?></li>
            <?php else: ?>
                <li class="active"><?php echo __("Ajouter Projet"); ?></li>
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
                        <?php echo __("Editer Projet"); ?>
                    <?php else: ?>
                        <?php echo __("Ajouter Projet"); ?>
    <?php endif; ?>
                    <span class="pull-right">
                        <a href="#" class="panel-minimize"><i class="fa fa-chevron-up"></i></a>
                        <a href="#" class="panel-close"><i class="fa fa-times"></i></a>
                    </span>
                </h3>
            </div>
            <div class="panel-body">
                <?php
                echo $this->Form->create('Projet', array(
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
                    <label class="col-md-3 control-label"><?php echo __("Nom du Projet"); ?></label>
                    <div class="col-md-9" id="n_projet">
    <?php echo $this->Form->input('name', array('placeholder' => __("Nom du Projet"), 'class' => 'form-control form-cascade-control input-small')); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label"><?php echo __("Description"); ?></label>
                    <div class="col-md-9">
    <?php echo $this->Form->input('description', array('placeholder' => __("Description"), 'class' => 'form-control form-cascade-control input-small')); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label"><?php echo __("Département"); ?></label>
                    <div class="col-md-9">
    <?php echo $this->Form->input('departement_id', array('placeholder' => __("-- Choisir département --"), 'class' => 'form-control form-cascade-control input-small')); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label"><?php echo __("Affecter Membres"); ?></label>
                    
                        <?php if (empty($projet['User'])): ?>
                    <div class="col-md-8" id="users">
    <?php echo $this->Form->input('users', array('placeholder' => __("Affecter Membres"), 'class' => 'form-control form-cascade-control input-small')); ?>
                        </div>
                        <div class="col-md-1">
                            <i class="btn btn-info glyphicon glyphicon-plus" id="addUser"></i>
                        </div>
                    <?php else: ?>
                    <div class="col-md-8" id="users">
    <?php echo $this->Form->input('users', array('placeholder' => __("Affecter Membres"), 'class' => 'form-control form-cascade-control input-small')); ?>
                    </div>
                    <div class="col-md-1">
                        <i class="btn btn-info glyphicon glyphicon-plus" id="addUser"></i>
                    </div>
                </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-9" id="remove">
    <?php foreach ($projetUser as $pu): //debug($pu);?>
                            <span style="display: inline-block;"><label class="btn btn-info btn-xs"  data-id="<?php echo $pu['id'] ?>" style="margin-left: 8px;  margin-top: 15px;" id="delete_Member"><?php echo $pu['full_name']; ?>&nbsp;<i class="btn btn-info btn-xs fa fa-times" data-id="<?php echo $pu['id'] ?>" data-project="<?php echo $projet['Projet']['id']; ?>" id="delMember"></i></label></span>
    <?php endforeach; ?>
                        </div>
                        <div id="loading">
                                <?php //echo $this->Html->image('loading.gif', array('class'=>'loding_img','style'=>'position: absolute;right: 1026px; margin-top: 44px;')); ?>
                                
                        </div>
                    </div>
    <?php endif; ?>

                <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-9" id="listeUsers"></div>
                </div>
                <div id="inputs" style="height: 0px"></div>

                <div class="form-group">

                    <div class="col-md-3 col-md-offset-3">
                        <?php if (!empty($this->request->data)): ?>
                            <?php echo $this->Form->submit(__("Modifier"), array('div' => false, 'class' => 'btn bg-primary text-white')) ?>
                        <?php else: ?>
                            <?php echo $this->Form->submit(__("Ajouter"), array('div' => false, 'class' => 'btn bg-primary text-white')) ?>
                            <button class="btn bg-info text-white" type="reset">Annuler</button>
                        <?php endif; ?>
    <?php $this->Form->end(); ?>  
                    </div>
                </div>



            </div>
        </div>
    </div>


<?php echo $this->Html->script('xhr'); ?>
<?php echo $this->Html->scriptStart(array('inline' => false)); ?>
$(document).on('ready',function(){
    var i = 0;
    $("#addUser").on('click',function(e){
        e.preventDefault();
        $("#listeUsers").append('<label class="label label-success" data-id="' + $('#ProjetUsers :selected').val() + '">' + $("#ProjetUsers :selected").text() + '&nbsp;<i class="btn btn-success btn-xs fa fa-times" id="delMember_p"></i></label>&nbsp;');
        $("#inputs").append('<input type="hidden" name="data[ProjetsUser]['+i+'][user_id]" value="' + $('#ProjetUsers :selected').val() + '">');
        i = i+1;

        
    });
    $('label').on('click','#delMember',function(){
    var delMem = $(this);
           // $("#remove span").each(function(){
                //$('#remove span i').on('click',function(e){
                   //alert('ll');
                  
                    // e.preventDefault();
                    var MemberID = $(this).data('id');
                    var ProjectID = $(this).data('project');
                    var url = "<?php echo $this->Html->url(array('controller' => 'projets', 'action' => 'delete_pu'), true) ?>/"+MemberID+ "/"+ProjectID;
                       $.ajax({
                          url : url,
                          type : 'GET',            
                          beforeSend : function(){
                              $("#loading").html('<?php echo $this->Html->image('loader.gif', array('class'=>'loding_img','style'=>'position: absolute;right: 1000px; margin-top: 48px;')); ?>');
                          },
                          success : function(response){
                              if(response){
                               $("#loading").html("");
                               delMem.parent().remove();
                               $( "#users" ).load( "http://localhost/largestrh/projets/reset_users/"+ $("#ProjetDepartementId :selected").val(), +"/" + ProjectID, function() {});
                               
                                  //alert('lol');

                              }
                          }
                       });
                       
                });
    //});
    $("#ProjetDepartementId").on('change',function(){
         var url ='';
         if($("#ProjetId").val()){
            url = "http://localhost/largestrh/projets/dep_users/"+ $("#ProjetDepartementId :selected").val() + "/"+ $("#ProjetId").val();
         }else{
            url = "http://localhost/largestrh/projets/dep_users/"+ $("#ProjetDepartementId :selected").val();
         }
         $( "#users" ).load( url, function() {});
    });
   
    
    $("div #listeUsers").on('click','#delMember_p',function(e){
        $(this).parent().remove();
    });
    
    
});
<?php echo $this->Html->scriptEnd(); ?>
         