<?php $this->set('title_for_layout', __("Affecter Projets")); ?>
<div class="row">
    <div class="col-md-12">

        <ul class="breadcrumb">

            <li><a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'home')); ?>"><?php echo __("Dashboard"); ?></a></li>
            <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'index')); ?>"><?php echo __("Gestion Users"); ?></a></li>
            <li class="active"><?php echo __("Fiche Employé Projet"); ?></li>
        </ul>
    </div>
</div>
<?php
    echo $this->Form->create('Projet', array(
        'inputDefaults' => array('div' => false, 'label' => false)
    ));
    ?>
<h3 class="page-header"> <b><?php echo __("Affecter Projets"); ?></b> :  <?php echo ucfirst($user['User']['first_name']) . " " . ucfirst($user['User']['last_name']); ?> </h3>
<table>
<tr> 
    <td> <div class="panel-body"> <label class="control-label "><?php echo __("Projets"); ?></label></div></td>
    <td> <div class="panel-body" > <?php echo $this->Form->input('projets', array('class' => 'col-md-offset-1 form-control', 'style' => 'width:160%;display: initial;','onchange'=>'javascript:set_tache($("#ProjetProjets :selected").text());'));?>
        <?php //echo $this->Form->input('projets', array('class' => 'col-md-offset-1 form-control', 'style' => 'width:160%;display: initial;')); ?>&nbsp;&nbsp;</div></td>
    
</tr>
<tr id="tacheName">

    <td>
        <div class="panel-body"> <label class="control-label"><?php echo __("Tâches"); ?></label></div></td>
    <td>
        <div class="panel-body"> <div  style="clear: both; margin-left: 15px; ">
                
                <select class="form-control" style="width:173%;">
                    <option>-- Choisir Tâche --</option>
                </select>
            </div>
            <?php //echo $this->Form->input('ProjetUser.tache', array('class' => 'col-md-offset-1 form-control', 'style' => 'width:160%;display: initial;')); ?></div>
    </td>
</tr>
<tr>

    <td>
        <div class="panel-body"><label class="control-label"><?php echo __("Extras"); ?></label></div></td><td>
        <div class="panel-body"><?php echo $this->Form->input('ProjetUser.extras', array('class' => 'col-md-offset-1 form-control', 'style' => 'width:160%;display: initial;')); ?></div>
    </td>

</tr>
<tr>

    <td><div class="panel-body"> <label class="control-label"><?php echo __("Rendement"); ?></label> </div> </td>
    <td><div class="panel-body"><?php echo $this->Form->input('ProjetUser.rendement', array('class' => 'col-md-offset-1 form-control', 'style' => 'width:160%;display: initial;')); ?>&nbsp;&nbsp;</div></td>
</tr><tr>
    <td></td>
    <td><div class="panel-body"><i class="btn btn-info btn-sm fa fa-plus col-md-offset-1" id="addPro" style='width:20% '></i></div></td>
     <div id="inputs" style="visibility: hidden;height: 0px;" ></div>
    

</tr>
    </table>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-cascade">
            <div class="panel-heading">
                <h3 class="panel-title text-primary">
                    <?php echo __("Liste des Projets"); ?>
                </h3>
            </div>
            <div class="panel-body panel-border">
                <div class="row">
                    <div class="col-md-12" id="resPro"></div><!-- /col-md-12 -->
                    <p align="center" id="submit"></p>
                </div>
            </div> <!-- /panel body -->	
        </div>
    </div>
</div>
 <?php echo $this->Form->end(); ?>
<?php echo $this->Html->script('xhr'); ?>
<?php echo $this->Html->scriptStart(array('inline' => false)); ?>
var i = 0;
function removePro(p,input){
var nbrDiv = $("div #proAdd").length;
nbrDiv = parseInt(nbrDiv);
if( nbrDiv > 1){
    $("#" + input).remove();
    p.slideUp('slow', function(){ $(this).remove(); });
    
}else{
    $("#" + input).remove();
    p.slideUp('slow', function(){ $(this).remove(); });
    $('#submitPro').slideUp('slow', function(){ $(this).remove(); });
    i = 0;
}
}
var j = 0;
$("#addPro").click(function(){
    if(i >= 0){
    $("#submit").html('<input type="submit" class="btn btn-success" value="Ajouter" id="submitPro">');
        i = 1;
    }
    var idPro = $("#ProjetProjets :selected").val();
    var namePro = $("#ProjetProjets :selected").text();
    var nameTache = $("#ProjetUserTache").val();
    var nameExtra = $("#ProjetUserExtras").val();
    var nameRend = $("#ProjetUserRendement").val();
    
    $('<div class="alert bg-success text-white" id="proAdd">' + namePro + ' : Tâches: ' + nameTache + ', Extras: ' + nameExtra + ' dt, Rendement: ' + nameRend + ' %'+ '<i class="btn btn-sm btn-danger pull-right fa fa-times"  data-value="proInput'+ idPro +'" onclick="var node = $(this).parent(); var proInput = $(this).attr(\'data-value\'); removePro(node,proInput);"></i></div>').appendTo($("#resPro"));
    $('<input type="hidden" name="data[Projet][Pro'+namePro + ']" value="'+ idPro + '" id="proInput '+ idPro +' ">').appendTo($("#inputs"));
    $('<input type="hidden" name="data[ProjetUser]['+ j +'][Tache]" value="'+ nameTache + ' ">').appendTo($("#inputs"));
    $('<input type="hidden" name="data[ProjetUser]['+ j +'][Extras]" value="'+ nameExtra + '" >').appendTo($("#inputs"));
    $('<input type="hidden" name="data[ProjetUser]['+ j +'][Rendement]" value="'+ nameRend + '" >').appendTo($("#inputs"));
    j = j+1;
});







<?php echo $this->Html->scriptEnd(); ?>


