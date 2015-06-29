<?php $this->layout = false; ?>
<?php echo $this->Form->select('Projet.users',$users,array('empty'=>__(" --Affecter Employé--"),'label'=>false,'div'=>false, 'class' => 'form-control form-cascade-control input-small')); ?>
