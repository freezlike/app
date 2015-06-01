<div class="factures form">
    <div class="row">
        <legend><?php echo __('Ajouter Facture'); ?></legend>
        <div class="col-md-6">
            <?php
            echo $this->Form->create('Facture', array(
                'inputDefaults' => array(
                    'div' => array('class' => 'form-group'),
                    'class' => 'form-control'
                )
            ));
            ?>
            <fieldset>
                
                <div class="alignLeft">
                    <label for="EchDate">Date d'Échéance</label>
                    <input name="data[Facture][limit_date]" class="form-control" id="EchDate" type="date" style="width: 266px;">
                    <label for="EchDate">Date du Contrat</label>
                    <input name="data[Facture][date_contrat]" class="form-control" id="EchDate" type="date" style="width: 266px;">
                   
                        <?php
                    //echo $this->Form->input('limit_date', array('label' => 'Date d\'Échéance', 'type' => 'text','id'=>'EchDate'));
                    echo $this->Form->input('devise_id', array('label' => 'Devise','class'=>'form-control'));
                    ?>
                    <?php
                    echo $this->Form->input('user_id', array('label' => 'Client','class'=>'form-control'));
                    echo $this->Form->input('accompte', array('label' => 'Accompte', 'placeholder' => 'Accompte','class'=>'form-control'));
                    echo $this->Form->input('payment_id', array('label' => 'Type Paiement','class'=>'form-control'));
                    ?>
                    <div style="visibility: hidden;height: 0;" id="postList"></div>
                    <hr>
                    <?php echo $this->Form->submit(__('Ajouter'), array('class' => 'btn btn-primary form-control')); ?>
                    <?php echo $this->Form->end(); ?>
                </div>
            </fieldset>
        </div>


        <div class="col-md-6">
            <div class="thumbnail">
                <?php echo $this->Form->input('designation_id', array('label' => 'Designation','class'=>'form-control')); ?>
                <?php echo $this->Form->input('count', array('label' => 'Quantité', 'placeholder' => 'Quantité','class'=>'form-control')); ?>
                <button class="form-control btn btn-primary alignCenter" id="addItem"><i class="glyphicon glyphicon-plus"></i></button>
                <div class="cb"></div>
                <div id="listeAchat">
                    <ul class="nav">
                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>

<?php echo $this->Html->scriptStart(array('inline' => false)); ?>
var i = 1;
$("#addItem").on('click',function(e){
e.preventDefault();
if($("#count").val() === ""){
    alert("Veuillez choisir une designation avec la quantité, merci.");
}else{
    $("#postList").append('<input id="label'+$('#designation_id option:selected').val() +'" type="text" name="data[Designation]['+ $("#designation_id option:selected").val() +']" value="'+$("#count").val()+'" >');
    $("#listeAchat ul").append("<li><label class='label label-success'>"+ $("#designation_id option:selected").text() + "("+ $("#count").val() +")</label> <i style='cursor: pointer;' id='removeItem' class='glyphicon glyphicon-remove' data-value='label"+$("#designation_id option:selected").val() +"'></i></li>");
}
});
$(document).ready(function() {
    $(".nav").on('click','#removeItem',function() {
        $(this).parent('li').remove();
        //alert($(this).attr('data-value'));
        var id = $(this).attr('data-value');
        $("#" + id).remove();
        
    });
});
<?php echo $this->Html->scriptEnd(); ?>