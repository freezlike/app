<?php $this->layout = false; ?>
<?php if (!empty($postes)): ?>
    <legend>Choisir Poste : </legend>
    <?php echo $this->Form->select('poste', $postes); ?>
<?php else: ?>
    <p><?php echo __("Veuillez Choisir un département valide, merci."); ?></p>
<?php endif; ?>
