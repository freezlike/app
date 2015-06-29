<?php $this->set('title_for_layout', __("Affecter Diplômes")); ?>
<div class="row">
    <div class="col-md-12">
        <ul class="breadcrumb">

            <li><a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'home')); ?>"><?php echo __("Dashboard"); ?></a></li>
            <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'index')); ?>"><?php echo __("Gestion Users"); ?></a></li>
            <li class="active"><?php echo __("Fiche Employé Diplômes"); ?></li>
        </ul>
    </div>
</div>
<?php
    echo $this->Form->create('Diplome', array(
        'inputDefaults' => array('div' => false, 'label' => false)
    ));
    ?>
<h3 class="page-header"> <b><?php echo __("Affecter Diplômes"); ?></b> :  <?php echo ucfirst($user['User']['first_name']) . " " . ucfirst($user['User']['last_name']); ?> </h3>
<div class="panel-body">
    <label class="control-label"><?php echo __("Ecole"); ?></label>
    <?php echo $this->Form->input('diplomes', array('class' => 'col-md-offset-1 form-control', 'style' => 'width:33%;display: initial;','onchange'=>'javascript:set_titre($("#DiplomeDiplomes :selected").text());')); ?>&nbsp;&nbsp;
    <div id="diplomeName" style="clear: both;margin-top: 12px;"></div>
    <i class="btn btn-info btn-sm fa fa-plus" id="addDip"></i>
    <div id="inputs" style="visibility: hidden;height: 0px;" ></div>
   
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-cascade">
            <div class="panel-heading">
                <h3 class="panel-title text-primary">
                    <?php echo __("Liste des Diplômes"); ?>
                </h3>
            </div>
            <div class="panel-body panel-border">
                <div class="row">
                    <div class="col-md-12" id="resDip"></div><!-- /col-md-12 -->
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
function removeDip(p,input){
var nbrDiv = $("div #DipAdd").length;
nbrDiv = parseInt(nbrDiv);
if( nbrDiv >1){
    $("#" + input).remove();
    p.slideUp('slow', function(){ $(this).remove(); });
    
}else{
    $("#" + input).remove();
    p.slideUp('slow', function(){ $(this).remove(); });
    $('#submitDip').slideUp('slow', function(){ $(this).remove(); });
    i = 0;
}
}

$("#addDip").click(function(){
    if(i >= 0){
    $("#submit").html('<input type="submit" class="btn btn-success" value="Ajouter" id="submitDip">');
        i = 1;
    }
    var idDip = $("#dip :selected").val();
    var nameDip = $("#DiplomeDiplomes :selected").text();
    var nameEcole = $("#dip :selected").text();
    
    
    $('<div class="alert bg-success text-white" id="DipAdd">' + nameEcole + ' ' +nameDip + '<i class="btn btn-sm btn-danger pull-right fa fa-times"  data-value="dipInput'+ idDip +'" onclick="var node = $(this).parent(); var dipInput = $(this).attr(\'data-value\'); removeDip(node,dipInput);"></i></div>').appendTo($("#resDip"));
    $('<input type="hidden" name="data[Diplome][Dip'+nameDip + ']" value="'+ idDip + '" id="dipInput '+ idDip +' ">').appendTo($("#inputs"));
});
<?php echo $this->Html->scriptEnd(); ?>


