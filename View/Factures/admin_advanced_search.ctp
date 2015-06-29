<?php $this->set('title_for_layout', __('Recherche Avancée')); ?>
<?php if (empty($key)): ?>
    <legend><?php echo __('Recherche Avancée'); ?></legend>
    Recherche par :<div class="cb"></div>
    <input type="radio" name="choix" id="form-name" /> Nom Client <input type="radio" name="choix" id="form-date" /> Date <input type="radio" name="choix" id="form-datename" /> Nom Client et Date
    <div class="cb"></div>
    <div id="form-sname">
        <?php echo $this->Form->create('Facture', array('inputDefaults' => array('label' => false, 'div' => false), 'class' => 'form-inline')); ?>
        <fieldset>

            <!--   id="form-name"     <a href="#" id="ok">Affiche</a>-->
            <?php echo $this->Form->input('name', array('placeholder' => 'Nom Client')); ?>
            <?php echo $this->Form->submit('Rechercher', array('class' => 'btn btn-info', 'div' => false)); ?>
        </fieldset>
        <?php echo $this->Form->end(); ?>
    </div>
    <div id="form-sdate">
        <?php echo $this->Form->create('Facture', array('inputDefaults' => array('label' => false, 'div' => false), 'class' => 'form-inline')); ?>
        <fieldset>

            <!--   id="form-name"     <a href="#" id="ok">Affiche</a>-->
            <?php echo $this->Form->input('date', array('placeholder' => 'Date de Facturation')); ?>
            <?php echo $this->Form->submit('Rechercher', array('class' => 'btn btn-info', 'div' => false)); ?>
        </fieldset>
        <?php echo $this->Form->end(); ?>
    </div>
    <div id="form-sdatename">
        <?php echo $this->Form->create('Facture', array('inputDefaults' => array('label' => false, 'div' => false), 'class' => 'form-inline')); ?>
        <fieldset>

            <!--   id="form-name"     <a href="#" id="ok">Affiche</a>-->
            <?php echo $this->Form->input('name', array('placeholder' => 'Nom Client')); ?>
            <?php echo $this->Form->input('date', array('placeholder' => 'Date de Facturation')); ?>
            <?php echo $this->Form->submit('Rechercher', array('class' => 'btn btn-info', 'div' => false)); ?>
        </fieldset>
        <?php echo $this->Form->end(); ?>
    </div>
<?php else: ?>
    <?php debug($key); ?>
<?php endif; ?>
<?php echo $this->Html->script('jquery'); ?>
<?php echo $this->Html->scriptStart(); ?>
$(document).ready(function(){
$("#form-sdate").hide();
$("#form-sname").hide();
$("#form-sdatename").hide();
    $(document).ready(function(){
        $('#form-name').click(function(){
            $("#form-sname").toggle(500);
            $("#form-sdatename").hide();
            $("#form-sdate").hide();
            
        });
        $('#form-date').click(function(){
            $("#form-sname").hide();
            $("#form-sdatename").hide();
            $("#form-sdate").toggle(500);   
        });
        $('#form-datename').click(function(){
           $("#form-sname").hide();
            $("#form-sdatename").toggle(500);
            $("#form-sdate").hide();
        });        
    });    
});
<?php echo $this->Html->scriptEnd(); ?>