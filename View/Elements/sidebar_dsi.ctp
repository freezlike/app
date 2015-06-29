<!-- .left-sidebar -->
<div class="left-sidebar noprint">
    <div class="sidebar-holder">
        <ul class="nav nav-list">
            <!-- sidebar to mini Sidebar toggle -->
            <li class="nav-toggle">
                <button class="btn btn-nav-toggle text-primary"><i class="fa fa-angle-double-left toggle-left"></i> </button>
            </li>
            <li><a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'home')); ?>" data-original-title="Dashboard"><i class="fa fa-home"></i><span class="hidden-minibar"> Dashboard </span></a></li>
            <li>
                <a class="dropdown" href="#" onclick="return false;" data-original-title="Pages"><i class="fa fa-folder"></i><span class="hidden-minibar">  <?php echo __("Gestion Projets"); ?></a>
                <ul>
                    <li><a href="<?php echo $this->Html->url(array('controller' => 'taches', 'action' => 'dashboard')); ?>" data-original-title="Dashboard "><i class="fa fa-home"></i><span class="hidden-minibar"> <?php echo __("Dashboard"); ?></span></a></li>
                    <li><a href="<?php echo $this->Html->url(array('controller' => 'projets', 'action' => 'edit')); ?>" data-original-title="Ajout Projet"><i class="fa fa-plus"></i><span class="hidden-minibar"> <?php echo __("Ajout Projet"); ?></span></a></li>
                    <li><a href="<?php echo $this->Html->url(array('controller' => 'projets', 'action' => 'index')); ?>" data-original-title="Suivi Projets"><i class="fa fa-list"></i><span class="hidden-minibar"> <?php echo __("Suivi des Projets"); ?></span></a></li>
                </ul>
            </li>
            <li>
                <a class="dropdown" href="<?php echo $this->Html->url(array('controller' => 'evenements', 'action' => 'dashboard')); ?>" data-original-title="Pages"><i class="fa fa-calendar"></i><span class="hidden-minibar">  <?php echo __("Evenements"); ?></a>

            </li>
        </ul>
    </div>
</div> <!-- /.left-sidebar -->