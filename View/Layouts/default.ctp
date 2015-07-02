<?php echo $this->Html->docType('html5'); ?>
<html>
    <head>
        <?php echo $this->Html->charset('utf-8'); ?>
        <title><?php echo $this->fetch('title'); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Loading Bootstrap -->
        <?php echo $this->Html->css('bootstrap'); ?>
        <?php echo $this->Html->css('print'); ?>
        <?php echo $this->Html->css('simply-toast.min'); ?>

        <!-- Loading Stylesheets -->    
        <?php echo $this->Html->css('font-awesome'); ?>
        <?php echo $this->Html->css('style'); ?>
        <?php echo $this->Html->css('icheck/skins/all'); ?>
        <?php echo $this->Html->css('jquery-ui'); ?>
        <?php echo $this->Html->css('select2'); ?>

        <?php if ($this->params['controller'] !== 'users' && $this->params['action'] !== 'login'): ?>
            <link href="<?php echo $this->Html->url('/less/style.less', true); ?>" rel="stylesheet"  title="lessCss" id="lessCss">
        <?php endif; ?>
        <?php echo $this->Html->css('custom'); ?>
        <?php echo $this->fetch('css'); ?>
        <?php echo $this->Html->meta('icon', 'favicon.ico'); ?>
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
        <!--[if lt IE 9]>
        <?php echo $this->Html->script('html5shiv'); ?>
        <script src="js/html5shiv.js"></script>
        <![endif]-->
    </head>
    <body>
        <?php if ($this->params['controller'] === 'users' && $this->params['action'] === 'login'): ?>
            <section id="login" class="noprint">
                <?php echo $this->Session->flash(); ?>
                <?php echo $this->fetch('content'); ?>
            </section>
        <?php else: ?>
            <div class="site-holder" >
                <?php echo $this->element('navbar'); ?>
                <!-- .box-holder -->
                <div class="box-holder">
                    <?php echo $this->Session->flash(); ?>
                    <?php if ($this->Session->read('Auth.User.Group.name') === 'Admin'): ?>
                        <?php echo $this->element('sidebar'); ?>
                    <?php endif; ?>

                    <?php if ($this->Session->read('Auth.User.Group.name') === 'RH'): ?>
                        <?php echo $this->element('sidebar_rh'); ?>
                    <?php endif; ?>

                    <?php if ($this->Session->read('Auth.User.Group.name') === 'DSI'): ?>
                        <?php echo $this->element('sidebar_dsi'); ?>
                    <?php endif; ?>
                    <div class="content">
                        <?php echo $this->fetch('content'); ?>
                        <!--            
                        <div class="footer noprint">                            
                            © 2015 <a href="">largestinfo</a>
                        </div>
                        -->
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <!-- Load JS here for Faster site load =============================-->
        <?php echo $this->Html->script('jquery-1.11.2.min'); ?>
        <?php echo $this->Html->script('simply-toast.min'); ?>
        <?php echo $this->Html->script('jquery-ui-1.10.3.custom'); ?>

        <?php //echo $this->Html->script('jquery-migrate-1.2.1.min'); ?>
        <?php echo $this->fetch('script'); ?>
        <?php echo $this->Html->scriptStart(); ?>
        var root = document.location.host;
        function appUrl(url) {
        if (root === 'localhost' || root === '127.0.0.1') {
        return 'http://localhost/largestrh/';
        } else {
        return 'http://' + root + '/';
        }
        }
        <?php echo $this->Html->scriptEnd(); ?>
        <?php echo $this->Html->script('bootstrap.min'); ?>
        <?php //echo $this->Html->script('bootstrap-typeahead'); ?>
        <?php //echo $this->Html->script('bootstrap3-typeahead'); ?>
        <?php //echo $this->Html->script('typeahead.bundle'); ?>
        <?php echo $this->Html->script('select2.full', array('inline' => false)); ?>
        <?php // echo $this->Html->script('jquery-ui-1.10.3.custom'); ?>
        <?php if ($this->params['controller'] !== 'users' && $this->params['action'] !== 'login'): ?>

        <?php endif; ?>
        <?php echo $this->Html->script('jquery.placeholder'); ?>
        <?php echo $this->Html->script('less-1.5.0.min'); ?>
        <?php echo $this->Html->script('jquery.ui.touch-punch.min'); ?>
        <?php echo $this->Html->script('bootstrap-select'); ?>
        <?php echo $this->Html->script('bootstrap-switch'); ?>
        <?php echo $this->Html->script('jquery.tagsinput'); ?>
        <?php echo $this->Html->script('jquery.placeholder'); ?>

        <?php // echo $this->Html->script('application'); ?>
        <?php echo $this->Html->script('moment.min'); ?>
        <?php echo $this->Html->script('jquery.dataTables.min'); ?>
        <?php //echo $this->Html->script('jquery.sortable'); ?>
        <?php echo $this->Html->script('jquery.gritter'); ?>
        <?php echo $this->Html->script('jquery.nicescroll.min'); ?>
        <?php echo $this->Html->script('jquery.accordion'); ?>
        <?php echo $this->Html->script('skylo'); ?>
        <?php echo $this->Html->script('prettify.min'); ?>
        <?php echo $this->Html->script('jquery.noty'); ?>
        <?php echo $this->Html->script('bic_calendar'); ?>
        <?php echo $this->Html->script('scroll'); ?>
        <?php echo $this->Html->script('jquery.panelSnap'); ?>



        <?php echo $this->Html->script('jspdf.min'); ?>
        <?php echo $this->Html->script('from-html'); ?>
        <?php echo $this->Html->script('FileSaver.min'); ?>

        <!-- Core Jquery File  =============================-->
        <?php echo $this->Html->script('core'); ?>

        <?php if ($this->params['controller'] !== 'users' && $this->params['action'] !== 'login'): ?>
            <?php echo $this->Html->script('theme-options'); ?>
        <?php endif; ?>

        <?php echo $this->Html->script('bootstrap-progressbar'); ?>
        <?php echo $this->Html->script('bootstrap-progressbar-custom'); ?>
        <?php echo $this->Html->script('bootstrap-colorpicker'); ?>
        <?php echo $this->Html->script('bootstrap-colorpicker-custom'); ?>
        <?php echo $this->Html->script('charts/jquery.sparkline.min'); ?>


<!--        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->
        <?php //echo $this->Html->script('nestable/jquery.nestable'); ?>


    </body>
</html>