<!-- .left-sidebar -->
<div class="left-sidebar noprint">
    <div class="sidebar-holder">
        <ul class="nav nav-list">
            <!-- sidebar to mini Sidebar toggle -->
            <li class="nav-toggle">
                <button class="btn btn-nav-toggle text-primary"><i class="fa fa-angle-double-left toggle-left"></i> </button>
            </li>


            <li><a href="<?php echo $this->Html->url(array('controller'=>'pages','action'=>'home')); ?>" data-original-title="Dashboard"><i class="fa fa-home"></i><span class="hidden-minibar"> Dashboard </span></a></li>
            <li>
                <a class="dropdown" href="#" onclick="return false;" data-original-title="Pages"><i class="fa fa-user"></i><span class="hidden-minibar">  <?php echo __("Gestion RH"); ?></a>
                <ul>
                    <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'edit')); ?>" data-original-title="Ajout Emplyé"><i class="fa fa-plus"></i><span class="hidden-minibar"> <?php echo __("Ajout Emplyé"); ?></span></a></li>
                    <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'index')); ?>" data-original-title="Suivi des Employés"><i class="fa fa-list"></i><span class="hidden-minibar"> <?php echo __("Suivi des Employés"); ?></span></a></li>
                </ul>
            </li>
             <li>
                <a class="dropdown" href="#" onclick="return false;" data-original-title="Pages"><i class="fa fa-briefcase"></i><span class="hidden-minibar">  <?php echo __("Gestion De carrière"); ?></a>
                <ul>
<!--                    <li><a href="<?php echo $this->Html->url(array('controller' => 'postes', 'action' => 'edit')); ?>" data-original-title="Ajout Poste"><i class="fa fa-plus"></i><span class="hidden-minibar"> <?php //echo __("Ajout Poste"); ?></span></a></li>-->
                    <li><a href="<?php echo $this->Html->url(array('controller' => 'postes', 'action' => 'edit')); ?>" data-original-title="Gestion Postes"><i class="fa fa-arrow-circle-o-right"></i><span class="hidden-minibar"> <?php echo __("Gestion des Postes"); ?></span></a></li>
                    <li><a href="<?php echo $this->Html->url(array('controller' => 'diplomes', 'action' => 'ajout_diplome')); ?>" data-original-title="Gestion Diplome"><i class="fa fa-arrow-circle-o-right"></i><span class="hidden-minibar"> <?php echo __("Gestion Diplomes"); ?></span></a></li>
                    <li><a href="<?php echo $this->Html->url(array('controller' => 'departements', 'action' => 'edit')); ?>" data-original-title="Gestion Departement"><i class="fa fa-arrow-circle-o-right"></i><span class="hidden-minibar"> <?php echo __("Gestion Departements"); ?></span></a></li>
                    <li><a href="<?php echo $this->Html->url(array('controller' => 'competences', 'action' => 'edit')); ?>" data-original-title="Gestion Compétences"><i class="fa fa-arrow-circle-o-right"></i><span class="hidden-minibar"> <?php echo __("Gestion Compétences"); ?></span></a></li>
                </ul>
            </li>
            <li>
                <a class="dropdown" href="#" onclick="return false;" data-original-title="Pages"><i class="fa fa-group"></i><span class="hidden-minibar">  <?php echo __("Gestion Contacts"); ?></a>
                <ul>
                    <li><a href="<?php echo $this->Html->url(array('controller' => 'societes', 'action' => 'edit')); ?>" data-original-title="Ajout Contact"><i class="fa fa-arrow-circle-right"></i><span class="hidden-minibar"> <?php echo __("Ajout Contact"); ?></span></a></li>
                    <li><a href="<?php echo $this->Html->url(array('controller' => 'societes', 'action' => 'index_sc')); ?>" data-original-title="Suivi Contacts"><i class="fa fa-list-alt"></i><span class="hidden-minibar"> <?php echo __("Suivi Contacts"); ?></span></a></li>
<!--                    <li><a href="<?php //echo $this->Html->url(array('controller' => 'reclamations', 'action' => 'add')); ?>" data-original-title="Réclamations"><i class="fa fa-arrow-circle-right"></i><span class="hidden-minibar"> <?php echo __("Réclamations"); ?></span></a></li>
                    <li><a href="<?php //echo $this->Html->url(array('controller' => 'reclamations', 'action' => 'index')); ?>" data-original-title="Réclamations"><i class="fa fa-list-alt"></i><span class="hidden-minibar"> <?php echo __("Suivi des Réclamations"); ?></span></a></li>
                -->
                </ul>
            </li>    
           
            
            <li>
                <a class="dropdown" href="<?php echo $this->Html->url(array('controller' => 'payments', 'action' => 'indexdep')); ?>" data-original-title="Pages"><i class="fa fa-euro"></i><span class="hidden-minibar">  <?php echo __("Paiement"); ?></a>
<!--                <ul>
                    <li><a href="<?php echo $this->Html->url(array('controller' => 'payments', 'action' => 'edit')); ?>" data-original-title="Paiement"><i class="fa fa-euro"></i><span class="hidden-minibar"> <?php echo __("Paiement"); ?></span></a></li>
                    
                </ul>-->
            </li>
            <li>
                <a class="dropdown" href="<?php echo $this->Html->url(array('controller' => 'evenements', 'action' => 'dashboard')); ?>" data-original-title="Pages"><i class="fa fa-calendar"></i><span class="hidden-minibar">  <?php echo __("Evenements"); ?></a>
                
            </li>
        </ul>
    </div>
</div> <!-- /.left-sidebar -->