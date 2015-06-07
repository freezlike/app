<?php $this->set('title_for_layout', __("Projets")); ?>
<div class="row">
    <div class="col-mod-12">

        <ul class="breadcrumb">
            <li><a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'home')); ?>"><?php echo __("Dashboard"); ?></a></li>
            <li><a href="<?php echo $this->Html->url(array('controller' => 'taches', 'action' => 'dashboard')); ?>"><?php echo __("Gestion Projet"); ?></a></li>
            <li class="active">Projets</li>
        </ul>

        <div class="form-group hiddn-minibar pull-right">
            <input type="text" class="form-control form-cascade-control nav-input-search" size="20" placeholder="Search through site" />

            <span class="input-icon fui-search"></span>
        </div>

        <h3 class="page-header"><i class="fa fa-folder-open"></i> Projets <i class="fa fa-info-circle animated bounceInDown show-info"></i> </h3>

        <blockquote class="page-information hidden">
            <p>
                <?php echo __("D'après ce dashboard , vous pouvez consulter et gérer les différentes <b>Tâches</b> d'un projets."); ?>
            </p>
        </blockquote>

    </div>
</div>
<div class="col-md-12 profile-tabs">

                  <ul id="myTab" class="nav nav-tabs">
                      <li class="active"><a href="#photos" data-toggle="tab">Projets <i class="fa fa-folder-open"></i></a></li>
                    <li><a href="#friends" data-toggle="tab">Statistiques <i class="fa fa-bar-chart-o"></i></a></li>
                    
                  </ul>

                  <div id="myTabContent" class="tab-content">

                    <div class="tab-pane fade  in active" id="photos">


<div class="row">
    <div class="col-md-12">
        <div class="panel panel-cascade">
            <div class="panel-heading">
                <h3 class="panel-title">
                    Projets
                    <span class="pull-right">

                        <a href="#" class="panel-minimize"><i class="fa fa-chevron-up"></i></a>
                        <a href="#" class="panel-close"><i class="fa fa-times"></i></a>
                    </span>
                </h3>
            </div>
            <div class="panel-body gallery">

                <div class="controls">
                    <ul class="list-inline pull-left" style="margin-left: 15px;">
<!--                        <li class="filter" data-filter=""><a class="btn btn-info" href="#" onclick ="javascript:allpro();" style="width: 70px;">Do</a></li>-->
<li class="filter" data-filter=""><a class="btn btn-info " href="#" onclick ="javascript:allpro();" ><?php echo __("Tous Les Projets  "); ?><i class="fa fa-clipboard"></i></a></li>
<li class="filter" data-filter=""><a class="btn btn-warning" href="#" onclick ="javascript:doingpro();"><?php echo __("En Cours "); ?><i class="fa fa-cloud-download"></i></a></li>
<li class="filter" data-filter=""><a class="btn btn-success" href="#" onclick ="javascript:donepro();" style="width: 90px;"><?php echo __("Achevés "); ?><i class="fa fa-check-circle"></i></a></li>

<!--                        <li class="filter" data-filter="mix"><a class="btn bg-purple text-white" href="#" onclick ="javascript:allpro();">Tous Les Projets</a></li>-->
                    </ul>

                </div>
                <div id="do"  style="clear: both;">
                    <!-- Gallery Items -->
                    <?php foreach ($pro as $p): ?>
                        <div class="price-box col-md-3 col-sm-12 col-xs-12 col-lg-3 ">
                            <ul class="list-group features">
                                <li class="list-group-item " style="text-align: center;"><strong><?php echo $p['Projet']['name']; ?></strong></li>

                                <li class="list-group-item select">
                                    <a class="btn btn-block bg-info text-white btn-lg " href="<?php echo $this->Html->url(array('controller' => 'taches', 'action' => 'tasks_nestable', $p['Projet']['id'])); ?>"><?php echo __("Tâches"); ?></a>
                                </li>
                                
                            </ul>

                        </div>
                    <?php endforeach; ?>    
                </div>


            </div> <!-- /panel-body -->
        </div><!-- Panel -->
    </div>
</div>
                        </div>
                    <div class="tab-pane fade" id="friends">
                        
               
    <div class="col-mod-12">
        <h3> Statistiques    </h3>
    </div>


<div class="row">
    <div class="col-md-12">
        <div class="panel panel-cascade">
            
            <div class="panel-body gallery">

                <div class="controls">
                    <ul class="list-inline pull-left" style="margin-left: 15px;">
<!--                        <li class="filter" data-filter=""><a class="btn btn-info" href="#" onclick ="javascript:allpro();" style="width: 70px;">Do</a></li>-->
<li class="filter" data-filter=""><a class="btn btn-primary " href="#" onclick ="javascript:allpro();" ><?php echo __("Tous Les Projets  "); ?><i class="fa fa-clipboard"></i></a></li>
<!--<li class="filter" data-filter=""><a class="btn btn-warning" href="#" onclick ="javascript:doingpro();"><?php //echo __("En Cours "); ?><i class="fa fa-cloud-download"></i></a></li>
<li class="filter" data-filter=""><a class="btn btn-success" href="#" onclick ="javascript:donepro();" style="width: 90px;"><?php //echo __("Achevés "); ?><i class="fa fa-check-circle"></i></a></li>-->

<!--                        <li class="filter" data-filter="mix"><a class="btn bg-purple text-white" href="#" onclick ="javascript:allpro();">Tous Les Projets</a></li>-->
                    </ul>

                </div>
                <div id="do"  style="clear: both;">
                    <!-- Gallery Items -->
                    <?php foreach ($pro as $p): ?>
                        <div class="price-box col-md-3 col-sm-12 col-xs-12 col-lg-3 ">
                            <ul class="list-group features">
                                <li class="list-group-item " style="text-align: center;"><strong><?php echo $p['Projet']['name']; ?></strong></li>

                                <li class="list-group-item select">
                                    <a class="btn btn-block btn btn-primary text-white btn-lg " href="<?php echo $this->Html->url(array('controller' => 'taches', 'action' => 'projet_etat', $p['Projet']['id'])); ?>"><?php echo __("Statistiques"); ?></a>
                                </li>
                            </ul>

                        </div>
                    <?php endforeach; ?>    
                </div>


            </div> <!-- /panel-body -->
        </div><!-- Panel -->
    </div>
</div>
                      
                    </div>
                    
                  </div>
                </div>

<?php echo $this->Html->script('xhr'); ?>