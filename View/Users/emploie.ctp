<label><?php echo __("Emploie"); ?></label>
<legend>Choisir Département : </legend>
<?php echo $this->Form->select('departement', $departements, array('onchange' => 'javascript:choix_poste(this.value);')); ?>
<div id="poste"></div>
<?php echo $this->Html->script('xhr', array('inline' => false)); ?>