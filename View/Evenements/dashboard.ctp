<?php echo $this->Html->css('jquery-impromptu', array('inline' => false)); ?>
<?php echo $this->Html->css('../js/datetimepicker/jquery-ui-timepicker-addon', array('inline' => false)); ?>
<div class="row">
    <div class="col-mod-12">

        <ul class="breadcrumb">
            <li><a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'home')); ?>"><?php echo __("Dashboard"); ?></a></li>
            <li class="active">Calendrier</li>
        </ul>

        <div class="form-group hiddn-minibar pull-right">
            <?php
            echo $this->Form->create('Evenement', array(
                'url' => array('controller' => 'evenements', 'action' => 'search')
            ));
            ?>
            <input type="text" class="form-control form-cascade-control nav-input-search" name="data[Evenement][query]" size="20" placeholder="Rechercher..." />

            <span class="input-icon fui-search"></span>
            <?php echo $this->Form->end(); ?> 
        </div>

        <h3 class="page-header"><i class="fa fa-calendar"></i>  Calendrier <i class="fa fa-info-circle animated bounceInDown show-info"></i> </h3>

        <blockquote class="page-information hidden">
            <p>
                Calendar is the page where you can manage and save your events according to your dates.You can also create your own events according to the requirements you have. 
            </p>
        </blockquote>
    </div>
</div>

<!-- Full Calendar-->
<div class="row">
    <div class="col-md-12">
        <div id='calendar'></div>
    </div>
</div>
<!-- Load JS here for Faster site load =============================-->
<?php echo $this->Html->script('datetimepicker/jquery-ui-timepicker-addon', array('inline' => false)); ?>
<?php echo $this->Html->script('fullcalendar.min', array('inline' => false)); ?>
<?php echo $this->Html->script('fullcalendar-custom', array('inline' => false)); ?>
<?php echo $this->Html->script('jquery-impromptu', array('inline' => false)); ?>
<?php echo $this->Html->scriptStart(array('inline' => false)); ?>
sessionStorage.setItem('user_id',<?php echo $this->Session->read('Auth.User.id'); ?>)
sessionStorage.setItem('group_id',<?php echo $this->Session->read('Auth.User.group_id'); ?>)
<?php echo $this->Html->scriptEnd(); ?>