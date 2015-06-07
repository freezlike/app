<nav class="navbar noprint" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header" id="navbar">
        <a class="navbar-brand" href="<?php $this->Html->url(array('controller' => 'pages', 'action' => 'home')); ?>">
            <i class="fa fa-list btn-nav-toggle-responsive text-white"></i> 
            <span class="logo">Largest<strong>Info</strong> <i class="fa fa-user"></i>&nbsp;</span>
        </a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav user-menu navbar-right ">
            <li>
                <a href="#" class="user dropdown-toggle" data-toggle="dropdown">
                    <span class="username" data-date="<?php echo date('Y-m-d H:i:s') ?>" data-fullName="<?php echo $this->Session->read('Auth.User.full_name'); ?>" data-id="<?php echo $this->Session->read('Auth.User.id'); ?>">
                        <?php echo $this->Html->image('avatar.png', array('class' => 'user-avatar')); ?>
                        <?php echo ucfirst($this->Session->read('Auth.User.first_name')) . " " . ucfirst($this->Session->read('Auth.User.last_name')); ?>
                    </span>
                </a>
                <?php
                $id = $this->Session->read('Auth.User.id');
                //debug($url);
                ?>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'more','id' => $id)); ?>"><i class="fa fa-user"></i> My Profile</a></li>
                    <li><a href="#"><i class="fa fa-envelope"></i> Inbox <span class="badge bg-pink pull-right">4</span></a></li>
                    <li><a href="#"><i class="fa fa-cogs"></i> Settings</a></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'logout')) ?>" class="text-danger"><i class="fa fa-lock"></i> Logout</a></li>
                </ul>
            <li>
        </ul>
    </div><!-- /.navbar-collapse -->
</nav> <!-- /.navbar -->