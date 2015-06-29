
<?php //  if (!empty($this->request->data)):      ?>
<?php
//$Taches = $this->request->data; //debug($Taches); die();
//$projetUsers = $projuser['User'];
?>
<?php // endif;      ?>
<?php //debug($tache); die();     ?>
<div class="row">
    <?php //debug($projUsers['User']['first_name']); die();   ?>
    <div class="col-mod-12">
        <ul class="breadcrumb">
            <li><a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'home')); ?>"><?php echo __("Dashboard"); ?></a></li>
            <li><a href="<?php echo $this->Html->url(array('controller' => 'taches', 'action' => 'dashboard')); ?>"><?php echo __("Dashboard Projets"); ?></a></li>
            <li class="active"><?php echo __("Projet: ") . "<b  id='projectName'>".$proj['Projet']['name']."</b>"; //debug($user['User']['first_name']); die();          ?></li>
        </ul>
    </div>
</div>
<div class="col-mod-12">
    <div class="col-md-4">
        <h3 class="bg-info text-white btn-lg" style="width: 300px;"><?php echo __("Tâches Initiales"); ?>  <i class="pull right fa fa-plus"  id="infoTask1" style=" color: azure; cursor: pointer;"></i></h3>
        <div id="divform" style="display:none">
            <form id="formTache" action="#" >
                <input type="hidden" value="<?php echo $proj['Projet']['id']; ?>" id="projet_id" />
                <input id="tache"  type="text" placeholder=" Ajouter Tâche" class="dd" style="  width: 150px;   height: 34px;">
                <?php echo $this->Form->submit(__("Ajouter"), array('div' => false, 'id' => 'Ajout', 'class' => 'btn bg-info text-white ')) ?>
                <button class="btn bg-danger text-white" type="reset" id='annuler'>Annuler</button>
                <!--<input type="submit" name="Ajouter" value="Ajouter" style="width: 90px;height: 40px;" id='Ajout' class="bg-info text-white btn-lg">-->
            </form>
        </div>  
        <div class="dd" id="nestable" style="margin-bottom: 90px;" data-root='0'>
            <ol id="taskFirst" class="dd-list" >
                <?php foreach ($tchs as $k => $tch) : //debug($tch); die();  ?>
                    <li class="dd-item" style>
                        <div class="dd-handle"  data-id='<?php echo $tch['Tache']['id']; ?>' id="tache_id" data-state="<?php echo $tch['Tache']['etat']; ?>" style="width: 300px;"><div id="TaskName" style="float: left;"><?php echo $tch['Tache']['name']; ?></div>
                            <i class="btn bg-danger btn-xs fa fa-times pull-right" id="delete_task" data-id='<?php echo $tch['Tache']['id']; ?>'></i><i class="btn bg-success btn-xs fa fa-pencil pull-right" id="moreModal1"></i>
                        </div>
                    </li>
                <?php endforeach; ?> 
            </ol>
        </div>

    </div>
    <div class="col-md-4 ">
        <h3 class="bg-warning text-white btn-lg" style="width: 300px;"><?php echo __("Tâches En Cours"); ?> </h3>
        <div class="dd" id="nestable" data-root='1'>
            <ol class="dd-list">
                <?php foreach ($tchs1 as $k => $tch) : //debug($tch); die();  ?>
                    <li class="dd-item" style>
                        <div class="dd-handle" data-id='<?php echo $tch['Tache']['id']; ?>' data-state="<?php echo $tch['Tache']['etat']; ?>" style="width: 300px;"><div id="TaskName" style="float: left;"><?php echo $tch['Tache']['name']; ?></div>
                            <i class="btn bg-danger btn-xs fa fa-times pull-right" id="delete_task" data-id='<?php echo $tch['Tache']['id']; ?>'></i>
                            <i class="btn bg-success btn-xs fa fa-pencil pull-right" id="moreModal1"></i>
                        </div>
                        <div id="loading">

                        </div>
                    </li>
                <?php endforeach; ?> 
            </ol>
        </div>
    </div>
    <div class="col-md-4">
        <h3 class="bg-success text-white btn-lg" style="width: 300px;"><?php echo __("Tâches Achevées"); ?> </h3>
        <div class="dd isDone" id="nestable" data-root='2'>
            <ol class="dd-list">
                <?php foreach ($tchs2 as $k => $tch) : //debug($tch); die();  ?>
                    <li class="dd-item" style>
                        <div class="dd-handle" data-id='<?php echo $tch['Tache']['id']; ?>'  data-state="<?php echo $tch['Tache']['etat']; ?>" style="width: 300px;" class=""><div id="TaskName" style="float: left;"><?php echo $tch['Tache']['name']; ?></div>
                            <i class="btn bg-danger btn-xs fa fa-times pull-right" style="display: none;" id="delete_task" data-id='<?php echo $tch['Tache']['id']; ?>'></i>
                            <i class="btn bg-success btn-xs fa fa-pencil pull-right" style="display: none;" id="moreModal1"></i>
                        </div>
                    </li>
                <?php endforeach; ?> 
            </ol>
        </div>

    </div>
</div>
<div class="modal fade" id="myModal" style="top: -6%;">
    <div class="modal-dialog">
        <div class="modal-content" style="height: 600px; width: 750px;overflow-x: scroll;">
            <div class="modal-header bg-info" id="contentTitle">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title text-white" id="title"></h4>
            </div>
            <div class="modal-body" style="">
                <div id="wrapper">
                    <div class="scrollbar" id="style-5">
                        <div class="col-md-12" id="contentModal">
                            <div class="col-md-7">
                                <form id="InfroText" method="POST"> 
                                    <input type="hidden" name="InfroText" value="1">
                                    <?php if (!empty($this->request->data)): ?>
                                        <?php echo $this->Form->input('id', array('type' => 'hidden')); ?>
                                    <?php endif; ?>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td><?php echo __("Description "); ?></td>
                                                <td><input type="text" name="Description" placeholder="Déscription" id="Description" style="width:350px; margin-bottom: 10px;" value='<?php //echo $Taches['description']; //debug($this->request->data); die()       ?>'></td>
    <!--                                            <td> <?php //echo $this->Form->input('description', array('placeholder' => __("Déscription"), 'style'=>'width:300px' ));       ?></td>-->
                                            </tr>
                                            <tr>
                                                <td><?php echo __("Due Date"); ?></td>
                                                <td><input type="date" name="d_Date" id="d_Date" style="width:350px; margin-bottom: 10px;"></td>

                                            </tr>

                                            <tr>
                                                <td><?php echo __("Membre"); ?></td>
                                                <td id="listeMembre"style="margin-bottom: 10px;">

                                                </td>
                                            </tr>
                                            <tr><td> </td></tr>

                                            <tr>
                                                <td></td>
                                                <td>    

                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td><input type="submit" name="Valider" id="Valider" value="Valider" style="margin-top: 10px;"class="btn bg-success text-white" data-dismiss="modal"></td>
                                            </tr>
                                        </tbody></table>


                                </form>
                            </div>
                            <div class="col-md-5">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td><label class="btn btn-success fa fa-user btn-xs " style="cursor: pointer; font-size: 122%; margin-left: 101px;" id="member"><?php echo __(" Affecter Membres"); ?></label></td>
                                        </tr>


<!--                                        <tr><td><input type="text" name="Attach" id="attach" style="width:273px"></td></tr>-->
                                    </tbody>
                                </table>
                            </div>
                            <div style="overflow-x: scroll;width: 100%;height: 100%;">
                                <h4>Commentaires :</h4>
                                <ul class="chats" style="margin-top: 15px;"></ul>
                                <h4>Attachements :</h4>
                                <ul class="Attach" style="margin-top: 15px;"></ul>
                                <div class="chat-form">
                                    <div class="input-cont" style="margin-bottom: 2px;">
                                        <input class="form-control" id="bodyComm" type="text"  placeholder="Type a message here...">
                                    </div>
                                    <div class="btn-cont" style="margin-bottom: 10px;">
                                        <span class="arrow">
                                        </span>
                                        <a href="#" class="btn blue">
                                            <i class="fa fa-check icon-white" id="ValideCommentaire"></i>
                                        </a>
                                    </div>
                                    <form method="post" enctype="multipart/form-data" id="MyUploadForm">
                                        <div class="input-cont">
                                                                                <!--<input class="form-control pull-right" id="bodyAttach" type="file" placeholder="Attachement...">-->
                                            <input class="form-control pull-right" name="data[Attachement][FileInput]" id="FileInput" type="file" />
                                        </div>

                                        <div id="output"></div>
                                        <div class="btn-cont">
                                            <span class="arrow">
                                            </span>
                                            <i class="fa fa-paperclip icon-white btn blue" id="attachement" style="font-size: 18px;"> </i>

                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel-footer" style="  position: fixed;  top: 87%;  width: 124.5%;">
            <button type="button" id="closeModal" class="btn bg-info text-white center-block" data-dismiss="modal"><?php echo __("Fermer"); ?></button>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div>
<!-- Assign Member -->
<?php echo $this->Html->script('bootstrap-tour', array('inline' => false)); ?>

<?php echo $this->Html->scriptStart(array('inline' => false)); ?>
$(document).ready(function() {
//sessionStorage.setItem('listeMembre',);
// Instance the tour
$("#member").on('click', function() {
var tour = new Tour({
name: "tour",
container: "body",
keyboard: true,
storage: false,
debug: false,
backdrop: false,
redirect: true,
orphan: false,
duration: false,
basePath: "",
template: "<div class='popover tour'><div class='arrow'></div><h3 class='popover-title'></h3><div class='popover-content'></div><div class='popover-navigation'></div></div>",
});

tour.addSteps([{
element: "#member", // string (jQuery selector) - html element next to which the step popover should be shown
title: '<a class="btn btn-success btn-xs"><?php echo __("Ajout Membre"); ?></a> <i class="btn btn-danger btn-xs fa fa-times pull-right" id="closeMember"  data-role="end"></i> ', // string - title of the popover
content: $.trim('<div class="input-group"><select id="searchMembre" style =" height: 28px; width: 166px;" ><option>Choisir les Membres</option><?php foreach ($message as $k => $value): ?><option value="<?php echo $k; ?>"><?php echo $value; ?></option><?php endforeach; ?></select></div>'), // string - content of the popover
placement: 'bottom',
backdrop: true,
}]);
tour.init();
tour.start();
});
});
<?php echo $this->Html->scriptEnd(); ?>  
<?php echo $this->Html->script('select2.min', array('inline' => false)); ?>
<?php $this->Html->css('select2', array('inline' => false)); ?>
<?php $this->Html->css('metronic', array('inline' => false)); ?>
<?php $this->Html->css('reset_m', array('inline' => false)); ?>
<?php $this->Html->css('chats_m', array('inline' => false)); ?>
<?php echo $this->Html->script('tasks', array('inline' => false)); ?>
<?php echo $this->Html->script('jquery.form', array('inline' => false)); ?>
<?php echo $this->Html->script('upload', array('inline' => false)); ?>