<?php $this->set('title_for_layout', __("Fiche Employé")); ?>
<?php echo $this->Html->css('demo_table', array('inline' => false)); ?>
<div class="row">
    <div class="col-mod-12">
        <ul class="breadcrumb">
            <li><a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'home')); ?>"><?php echo __("Dashboard"); ?></a></li>
            <li><a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'index')); ?>"><?php echo __("Gestion Users"); ?></a></li>
            <li class="active"><?php echo __("Fiche Employé ") . ucfirst($this->request->data['User']['first_name']) . " " . ucfirst($this->request->data['User']['last_name']); ?></li>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo __("Fiche : ") . ucfirst($this->request->data['User']['first_name']) . " " . ucfirst($this->request->data['User']['last_name']); ?> </h3>
            </div>
            <div class="panel-body">
                <div class="panel panel-default">

                    <div class="panel-heading"> <h4><?php echo __("Employé"); ?> </h4></div>
                    <div class="panel-body">


                        <div class="col-md-4">
                            <blockquote class="text-info">
                                <p><?php echo __("Informations : "); ?></p>
                                <small><b><?php echo __("Nom"); ?></b> : <?php echo $this->request->data['User']['first_name']; ?></small>
                                <small><b><?php echo __("Prénom"); ?></b> : <?php echo $this->request->data['User']['last_name']; ?></small>
                                <small><b><?php echo __("Situation"); ?></b> : <?php echo $this->request->data['Situation']['name']; ?></small>
                                <small><b><?php echo __("Date de Naissance"); ?></b> : <?php echo $this->Time->format($this->request->data['User']['born_day'], '%d/%m/%Y'); ?></small>
                                <small><b><?php echo __("Date d'embauche"); ?></b> : <?php echo $this->Time->format($this->request->data['User']['hire_date'], '%d/%m/%Y'); ?></small>
                                <small><b><?php echo __("Email"); ?></b> : <?php echo $this->request->data['User']['email']; ?></small>
                                <small><b><?php echo __("Téléphone"); ?></b> : <?php echo $this->request->data['User']['telephone']; ?></small>
                                <small><b><?php echo __("Matricule"); ?></b> : <?php echo $this->request->data['User']['matricule']; ?></small>
                                <small><b><?php echo __("N° CIN"); ?></b> : <?php echo $this->request->data['User']['cin']; ?></small>
                                <small><b><?php echo __("N° CNSS"); ?></b> : <?php echo $this->request->data['User']['cnss']; ?></small>
                                <small><b><?php echo __("Permis"); ?></b>
                                    : <?php echo ($this->request->data['User']['permis'] == true) ? '<span class="label label-success">' . __("Avec Permis") . '</label>' : '<span class="label label-danger">' . __("Sans Permis") . '</label>'; ?></small>
                                <small> 


                                    <?php if ($this->request->data['User']['cv_url'] == null): ?>
                                    <p><b><?php echo __("CV"); ?></b> :
                                        <?php echo $this->Form->create(null, array('type' => 'file', 'url' => array('controller' => 'users', 'action' => 'cv', $this->request->data['User']['id']))); ?>
                                        <?php echo('<span class="label label-danger" >' . __("Pas de CV joint") . '</label>' . ' ' . '<span class="fa fa-paperclip">' . '</span>' . '</span>'); ?>
                                       </p>
                                        <?php echo $this->Form->input('cv', array('type' => 'file', 'label' => false)); ?>
                                        &nbsp;&nbsp;<?php echo $this->Form->submit(__("Envoyer"), array('div' => false, 'class' => 'btn btn-success btn-sm','style' => 'margin-top:5px;margin-left:-7px')) ?>

                                    </small>
                                    <?php echo $this->Form->end(); ?>
                                <?php else: ?>
                                    <small>
                                        <b><?php echo __("CV"); ?> : </b> <a href="<?php echo $this->Html->url('/files/' . $this->request->data['User']['cv_url']); ?>" class="label label-success" >Télécharger</a> 
                                    </small>
                                <?php endif; ?>

                            </blockquote>
                        </div>
                        <div class="col-md-8">
                            <blockquote class="text-info">
                                <a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'fichepaie', $this->request->data['User']['id'])); ?>" class="label label-info" style="margin-left:-6px"><?php echo __("Fiche de Paie : "); ?><i class="fa fa-file-text-o"></i></a>
<!--                                <p><?php //echo __("Fiche de Paie : "); ?> 

                                <a href="<?php //echo $this->Html->url(array('controller' => 'users', 'action' => 'fichepaie', $this->request->data['User']['id'])); ?>" class="fa fa-file-text-o fa-1x text-info"  ></a>
                                
                                </p>-->
                                <p><?php echo __("Rendement : "); ?>&nbsp; <i class="fa fa-bar-chart-o"></i></p>

                                <img src="http://preview.bootstrapguru.com/cascade/images/profile50x50.png" class="project-img pull-left" alt="">
                                <?php
                                $rend = 0;
                                foreach ($user['Projet'] as $k => $p):
                                    $r = $p['ProjetsUser']['rendement'];
                                    $rend = $rend + $r;
                                endforeach;
                                $total = $rend / $count;
                                //debug($total);
                                $class = '';
                                $color = new AppController();
                                $class = $color->returnColor($total);
                                $badge = '';
                                $colorBadge = new AppController();
                                $badge = $colorBadge->returnBgColor($total);
//                                debug($badge);
//                                die();
                                ?>
                                
                                <small>
                                    <span class="badge bg-<?php echo $badge; ?> col-sm-offset-9" ><?php echo __('Total : ') ?> <?php echo $total; ?>%</span>
                                    <div class="progress progress-mini">

                                        <div class="progress-bar progress-bar-<?php echo $class; ?>" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $total; ?>%;">
                                            <span class="sr-only"><?php echo $total; ?>% Complete</span>
                                        </div>
                                    </div>
                                </small>
                                <div class="cb"></div>
                                <div class="col-sm-offset-2">
                                    <?php foreach ($user['Projet'] as $k => $p): ?>
                                        <?php if(isset($k) && $k <= 4): ?>
                                    <?php $class = ''; ?>
                                        <?php $color = new AppController(); ?>
                                        <?php $class = $color->returnColor($p['ProjetsUser']['rendement']); ?>
                                        <?php $badge = ''; ?>
                                        <?php $colorBadge = new AppController(); ?>
                                        <?php $badge = $colorBadge->returnBgColor($p['ProjetsUser']['rendement']); ?>
                                        <small>
                                               
                                            <span class="badge bg-<?php echo $badge; ?> col-sm-offset-10" ><?php echo $p['name'] ?> <?php echo $p['ProjetsUser']['rendement'] ?>%</span>
                                            <div class="progress progress-mini">

                                                <div class="progress-bar progress-bar-<?php echo $class; ?>" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $p['ProjetsUser']['rendement'] ?>%;">
                                                    <span class="sr-only"><?php echo $p['ProjetsUser']['rendement']; ?>% Complete</span>
                                                </div>
                                            </div>
                                           
                                        </small>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                              
                                </div>
                            </blockquote>
                        </div>

                        <div class="row col-md-12 suiteUser">

                            <div class="col-md-6">
                                <div class="info-box  bg-success  text-white" style="height: 66px;">
                                    <div class="info-icon bg-success-dark specUser">
                                        <i class="fa fa-briefcase fa-4x"></i>
                                    </div>
                                    <div class="info-details specUserContent " style="left: 192px;">
                                        <h4><?php echo __("Poste :"); ?>   </h4>

                                        <p> <span class="badge pull-left bg-white text-success" style="font-size: 14px"> <?php echo $user['Poste']['name'] ?></span> </p>
                                        <br/>
                                    </div>
                                    <div class="cb"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box  bg-warning  text-white">
                                    <div class="info-icon bg-warning-dark specUser">
                                        <i class="fa fa-folder-o fa-4x"></i>
                                    </div>
                                    <div class="info-details specUserContent">
                                        <div class="row" >
                                            <div class="col-md-12">
                                                <div class="panel panel-cascade" style="background:transparent">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title">
                                                            <span style="font-size:15px;color:#fff"> <?php echo __("Projets :"); ?></span>
                                                            <span class="pull-right"><a href="#" class="panel-minimize"><i id="projet" class="fa fa-chevron-up"></i></a></span>
                                                        </h3>
                                                    </div>
                                                    <div class="panel-body" id="projets" style="color:#fff;font-size: 12px">
                                                        <ul>
                                                            <?php foreach ($user['Projet'] as $k => $vProjet): ?>
                                                          
                                                                <?php if ($k < 3): ?>
                                                                    <li><b><?php echo $vProjet['name'] ?> </b>: <?php echo $vProjet['description'] ?></li>
                                                                <?php else : ?>
                                                                    <?php if ($k > 3): ?>
                                                                    <?php else : ?>
                                                                        <li>...</li>
                                                                    <?php endif; ?>
                                                                <?php endif; ?>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <span class=" badge pull-right bg-white text-warning moreDetails"><a class="text-warning" href="" id="moreModal"><b><?php echo __("Voir Plus"); ?></b></a></span>
                                    </div>
                                    <div class="cb"></div>
                                </div>
                            </div>
                        </div>


                        <div class="row col-md-12">

                            <div class="col-md-6">
                                <div class="info-box  bg-danger  text-white">
                                    <div class="info-icon bg-danger-dark specUser">
                                        <i class="fa fa-pencil-square-o fa-4x"></i>
                                    </div>
                                    <div class="info-details specUserContent">
                                        <div class="row" >
                                            <div class="col-md-12">
                                                <div class="panel panel-cascade" style="background:transparent">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title">
                                                            <span style="font-size:15px;color:#fff"> <?php echo __("Diplomes :"); ?></span>
                                                            <span class="pull-right"><a href="#" class="panel-minimize"><i id="diplome" class="fa fa-chevron-up"></i></a></span>
                                                        </h3>
                                                    </div>
                                                    <div class="panel-body panel-minimize" id="diplomes" style="color:#fff;font-size: 12px">
                                                        <ul>
                                                            <?php foreach ($user['Diplome'] as $vDiplome): ?>
                                                                <li><b><?php echo $vDiplome['name'] ?> </b>: <?php echo $vDiplome['source'] ?></li>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                    </div>
                                                </div>
                        <!--                                                        <span class="text-danger moreDetails" style="left:100px;" ><?php echo __("Diplome"); ?></span>-->

                                            </div>
                                        </div>
                                    </div>
                                    <div class="cb"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box  bg-info text  text-white">
                                    <div class="info-icon bg-info-dark specUser">
                                        <i class="fa fa-cogs fa-4x"></i>
                                    </div>
                                    <div class="info-details specUserContent">
                                        <div class="row" >
                                            <div class="col-md-12">
                                                <div class="panel panel-cascade" style="background:transparent">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title">
                                                            <span style="font-size:15px;color:#fff"> <?php echo __("Compétences :"); ?></span>
                                                            <span class="pull-right"><a href="#" class="panel-minimize"><i id="comp" class="fa fa-chevron-up"></i></a></span>
                                                        </h3>
                                                    </div>
                                                    <div class="panel-body" id="comps" style="color:#fff;font-size: 12px">
                                                        <ul>
                                                            <?php foreach ($user['Competence'] as $vCompetence): ?>
                                                                <li><b><?php echo $vCompetence['nom'] ?></b> </li>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                    </div>
                                                </div>
                        <!--                                                        <span class=" badge pull-right bg-info moreDetails" ><a class="text-info" href="<?php echo $this->Html->url(array('controller' => 'projets', 'action' => 'voirplus')); ?>"><b><?php echo __("Voir Plus"); ?></b></a></span>-->

                                            </div>
                                        </div>
                                    </div>
                                    <div class="cb"></div>
                                </div>
                            </div>
                        </div>

                        <div class="cb"></div><br>
                        <div class="panel-footer">
                            <div class="affectUser">
                                <button class="btn btn-info" onclick="javascript:redirectMore(this.value)" value="competences" style="margin-left:100px;"><?php echo __("Affecter Compétences"); ?></button>
                                <button class="btn btn-info" onclick="javascript:redirectMore(this.value)" value="diplomes"><?php echo __("Affecter Diplômes"); ?></button>
<!--                                <button class="btn btn-info" onclick="javascript:redirectMore(this.value)" value="projets"><?php //echo __("Affecter Projets"); ?></button>-->
                                <button class="btn btn-info" onclick="javascript:redirectMore(this.value)" value="postes" style="width:145px;"><?php echo __("Affecter Poste"); ?></button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="cb"></div>
        </div>
    </div>
</div>



<div class="modal fade" id="myModal" style="top: -6%;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <div id="wrapper">

                    <div class="scrollbar" id="style-5">

                        <p id="content-b">

                        </p>

                    </div>
                </div>

            </div>
            <div class="panel-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo __("Fermer"); ?></button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php echo $this->Html->scriptStart(array('inline' => false)); ?>
$("#projets").attr('style', 'color: rgb(255, 255, 255); font-size: 12px; display: none;');
$("#projet").removeClass('fa-chevron-up').addClass('fa-chevron-down');
$("#diplomes").attr('style', 'color: rgb(255, 255, 255); font-size: 12px; display: none;');
$("#diplome").removeClass('fa-chevron-up').addClass('fa-chevron-down');
$("#comps").attr('style', 'color: rgb(255, 255, 255); font-size: 12px; display: none;');
$("#comp").removeClass('fa-chevron-up').addClass('fa-chevron-down');

$(document).ready(function () {
$("#moreModal").click(function (e) {
e.preventDefault();
var id = <?php echo $this->request->data['User']['id'] ?>;
var url = "<?php echo $this->Html->url(array('controller' => 'projets', 'action' => 'getlistProjet'), true) ?>/" + id + ".json";
$("#content-b").text("");
$(".modal-title").text("Liste Des projets");
$.getJSON(url, function (data) {
var items = [];
$.each(data, function (key, val) {
//console.log(key);
//console.log(val);
items.push("<li><b>" + val.name + "</b>: <ul><li> Description:  " + val.description + " </li><li> Tâches:  " + val.ProjetsUser.tache + " </li><li> Extras:  " + val.ProjetsUser.extras + " dt</li><li> Rendement:  " + val.ProjetsUser.rendement + " %</li></ul></li>");
});
$("<ul/>", {
"class": "my-new-list",
html: items.join("")
}).appendTo(".modal-body p");
});
$('#myModal').modal('show');
});
});

function redirectMore(p) {
var url = document.location.host;
//var url2 = document.location.href = 'http://' + url + '/' + p + '/edit_e/' + <?php echo $this->request->data['User']['id']; ?>;
document.location.href = '/largestrh/' + p + '/edit_e/' + <?php echo $this->request->data['User']['id']; ?>;
}
<?php echo $this->Html->scriptEnd(); ?>
<?php echo $this->Html->css('scrollbar'); ?>