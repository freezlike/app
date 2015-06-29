<?php $this->layout = false; ?>
<div class="form-group">
    
    <div class="col-md-9">
   
        <div><?php echo $this->Form->input('nom', array('label' => 'Compétences:')); ?></div>
        <?php echo $this->Form->submit(__("Ajouter"), array('div' => false, 'class' => 'btn bg-primary text-white')) ?>
    </div>
</div>