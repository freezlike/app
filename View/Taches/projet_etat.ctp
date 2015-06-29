   <ul class="breadcrumb">
            <li><a href="<?php echo $this->Html->url(array('controller' => 'pages', 'action' => 'home')); ?>"><?php echo __("Dashboard"); ?></a></li>
            <li><a href="<?php echo $this->Html->url(array('controller' => 'taches', 'action' => 'dashboard')); ?>"><?php echo __("Gestion Projet"); ?></a></li>
            <li class="active">Statistiques</li>
        </ul>
<h3 class="page-header"><i class="fa fa-bar-chart-o"></i> Statistiques Projets/Etats: <?php echo $projet['Projet']['name'];?></h3>
<div id="chartdiv1" class="chartByProject" ></div>
<div id="chartdiv2" style="width:30%; height:335px;font-size:11px;"></div>
<div class="container-fluid">
                          <div class="row text-center" style="overflow:hidden;">
                                        
                                </div>
                        </div>	
<?php echo $this->Html->script("amchart/amcharts"); ?>
<?php echo $this->Html->script("amchart/serial"); ?>
<?php echo $this->Html->script("amchart/pie"); ?>
<?php //echo $this->Html->script("amchart/themes/light"); ?>
<?php echo $this->Html->scriptStart(array('inline' => false)); ?>

var chart = AmCharts.makeChart("chartdiv1", {
    "theme": "none",
    "type": "serial",
	"startDuration": 2,
    "dataProvider": [{
        "country": "Tâches Initiales",
        "visits": <?php echo round(($tache1 / $tache_projet)*100); ?>,
        "color": "#FF0F00"
    }, {
        "country": "Tâches En Cours",
        "visits": <?php echo round(($tache2 / $tache_projet)*100); ?>,
        "color": "#FF6600"
    },{
        "country": "Tâches Achevées",
        "visits": <?php echo round(($tache3 / $tache_projet)*100); ?> ,
        "color": "#04D215"
    }],
    "valueAxes": [{
        "position": "left",
        "axisAlpha":0,
        "gridAlpha":0         
    }],
    "graphs": [{
        "balloonText": "[[category]]: <b>[[value]] %</b>",
        "colorField": "color",
        "fillAlphas": 0.85,
        "lineAlpha": 0.1,
        "type": "column",
        "topRadius":1,
        "valueField": "visits"
    }],
    "depth3D": 40,
	"angle": 30,
    "chartCursor": {
        "categoryBalloonEnabled": false,
        "cursorAlpha": 0,
        "zoomable": false
    },    
    "categoryField": "country",
    "categoryAxis": {
        "gridPosition": "start",
        "axisAlpha":0,
        "gridAlpha":0
        
    },
	"exportConfig":{
		"menuTop":"20px",
        "menuRight":"20px",
        "menuItems": [{
        "icon": '/lib/3/images/export.png',
        "format": 'png'	  
        }]  
    }
},0);


jQuery('.chart-input').off().on('input change',function() {
	var property	= jQuery(this).data('property');
	var target		= chart;
	chart.startDuration = 0;

	if ( property == 'topRadius') {
		target = chart.graphs[0];
	}

	target[property] = this.value;
	chart.validateNow();
});
<?php echo $this->Html->scriptEnd(); ?>