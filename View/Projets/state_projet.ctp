<div class="col-md-9 profile-tabs">

                  <ul id="myTab" class="nav nav-tabs">
                    <li class="active"><a href="#photos" data-toggle="tab">Users</a></li>
                    <li class=""><a href="#friends" data-toggle="tab">Statistique Projets</a></li>
                   
                    <li class="dropdown">
                      <a href="#" id="myTabDrop1" class="dropdown-toggle" data-toggle="dropdown">More <b class="caret"></b></a>
                      <ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1">
                        <li><a href="#dropdown3" tabindex="-1" data-toggle="tab">More here</a></li>
                        <li><a href="#dropdown4" tabindex="-1" data-toggle="tab">And Here too</a></li>
                      </ul>
                    </li>
                  </ul>

                  <div id="myTabContent" class="tab-content">

                    <div class="tab-pane fade active in" id="photos">
                        <h3 class="page-header"><i class="fa fa-bar-chart-o"></i> Statistiques des Projets  <i class="fa fa-info-circle animated bounceInDown show-info"></i> </h3>
                                <div id="chartdiv" style="width:100%;height:500px;font-size:11px;"></div>

                    </div>
                  
                    <div class="tab-pane fade" id="friends">
                        <div id="chartdiv1" style="width:100%; height:435px;font-size:11px;"></div>
                        <div class="container-fluid">
                          <div class="row text-center" style="overflow:hidden;">
                                        <div class="col-sm-3" style="float: none !important;display: inline-block;">
                                                <label class="text-left">Top Radius:</label>
                                                <input class="chart-input" data-property="topRadius" type="range" min="0" max="1.5" value="1" step="0.01"/>
                                        </div>

                                        <div class="col-sm-3" style="float: none !important;display: inline-block;">
                                                <label class="text-left">Angle:</label>
                                                <input class="chart-input" data-property="angle" type="range" min="0" max="89" value="30" step="1"/>	
                                        </div>

                                        <div class="col-sm-3" style="float: none !important;display: inline-block;">
                                                <label class="text-left">Depth:</label>
                                                <input class="chart-input" data-property="depth3D" type="range" min="1" max="120" value="40" step="1"/>
                                        </div>
                                </div>
                        </div>										
                    </div>
                    
                    <div class="tab-pane fade" id="dropdown3">
                      
                    </div>
                    <div class="tab-pane fade" id="dropdown4">
                      
                    </div>
                      </div>
                  </div>
                





<?php echo $this->Html->script("amchart/amcharts"); ?>
<?php echo $this->Html->script("amchart/serial"); ?>
<?php echo $this->Html->script("amchart/pie"); ?>
<?php echo $this->Html->script("amchart/themes/light"); ?>
<?php echo $this->Html->scriptStart(array('inline' => false)); ?>
AmCharts.makeChart("chartdiv", {
    "type": "pie",
	"theme": "none",
    "dataProvider": [
{
        "country": "Injaz",
        "litres": 201.9
    },
{
        "country": "FTCK",
        "litres": 101.9
    }, {
        "country": "S.W_BATNA",
        "litres": 101.1
    }, {
        "country": "Largest_ERP",
        "litres": 165.8
    }, {
        "country": "S.W_AIFE",
        "litres": 139.9
    }, {
        "country": "S.W_BSB-Group",
        "litres": 128.3
    }, {
        "country": "Portail_Web",
        "litres": 99
    }, {
        "country": "DCI",
        "litres": 60
    }, {
        "country": "S.W_HyperDATA",
        "litres": 60
    }, {
        "country": "Newsletter",
        "litres": 50
    }],
    "valueField": "litres",
    "titleField": "country",
	"exportConfig":{	
      menuItems: [{
      icon: '/lib/3/images/export.png',
      format: 'png'	  
      }]  
	}
});
var chart = AmCharts.makeChart("chartdiv1", {
    "theme": "none",
    "type": "serial",
	"startDuration": 2,
    "dataProvider": [{
        "country": "USA",
        "visits": 4025,
        "color": "#FF0F00"
    }, {
        "country": "China",
        "visits": 1882,
        "color": "#FF6600"
    }, {
        "country": "India",
        "visits": 984,
        "color": "#04D215"
    }],
    "graphs": [{
        "balloonText": "[[category]]: <b>[[value]]</b>",
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