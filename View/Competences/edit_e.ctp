<?php $this->set('title_for_layout', __("Affecter Compétence")); ?>
<div class="row">
    <div class="col-md-12">

        <ul class="breadcrumb">

            <li><a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'home')); ?>"><?php echo __("Dashboard"); ?></a></li>
            <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'index')); ?>"><?php echo __("Gestion Users"); ?></a></li>
            <li class="active"><?php echo __("Fiche Employé Compétence"); ?></li>
        </ul>
    </div>
</div>
<?php
    echo $this->Form->create('Competence', array(
        'inputDefaults' => array('div' => false, 'label' => false)
    ));
    ?>
<h3 class="page-header"> <b><?php echo __("Affecter Compétences"); ?></b> :  <?php echo ucfirst($user['User']['first_name']) . " " . ucfirst($user['User']['last_name']); ?> </h3>
<div class="panel-body">
    <label class="control-label"><?php echo __("Compétences"); ?></label>
    <?php echo $this->Form->input('competences', array('class' => 'col-md-offset-1 form-control', 'style' => 'width:33%;display: initial;')); ?>&nbsp;&nbsp;
    <i class="btn btn-info btn-sm fa fa-plus" id="addComp"></i>
    <div id="inputs" style="visibility: hidden;height: 0px;" ></div>
   
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-cascade">
            <div class="panel-heading">
                <h3 class="panel-title text-primary">
                    <?php echo __("Liste des Compétences"); ?>
                </h3>
            </div>
            <div class="panel-body panel-border">
                <div class="row">
                    <div class="col-md-12" id="resComp"></div><!-- /col-md-12 -->
                    <p align="center" id="submit"></p>
                </div>
            </div> <!-- /panel body -->	
        </div>
    </div>
</div>
 <?php echo $this->Form->end(); ?>
<?php echo $this->Html->scriptStart(array('inline' => false)); ?>
var i = 0;
function removeComp(p,input){
var nbrDiv = $("div #compAdd").length;
nbrDiv = parseInt(nbrDiv);
if( nbrDiv > 1){
    $("#" + input).remove();
    p.slideUp('slow', function(){ $(this).remove(); });
    
}else{
    $("#" + input).remove();
    p.slideUp('slow', function(){ $(this).remove(); });
    $('#submitComp').slideUp('slow', function(){ $(this).remove(); });
    i = 0;
}
}

$("#addComp").click(function(){
    if(i >= 0){
    $("#submit").html('<input type="submit" class="btn btn-success" value="Ajouter" id="submitComp">');
        i = 1;
    }
    var idComp = $("#CompetenceCompetences :selected").val();
    var nameComp = $("#CompetenceCompetences :selected").text();
    
    $('<div class="alert bg-success text-white" id="compAdd">' + nameComp + '<i class="btn btn-sm btn-danger pull-right fa fa-times"  data-value="compInput'+ idComp +'" onclick="var node = $(this).parent(); var compInput = $(this).attr(\'data-value\'); removeComp(node,compInput);"></i></div>').appendTo($("#resComp"));
    $('<input type="hidden" name="data[Competence][Comp'+nameComp + ']" value="'+ idComp + '" id="compInput '+ idComp +' ">').appendTo($("#inputs"));
});
<?php echo $this->Html->scriptEnd(); ?>


