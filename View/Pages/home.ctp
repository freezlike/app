<div class="row">
    <div class="col-mod-12">

        <ul class="breadcrumb">
            <li><a href="<?php $this->Html->url(array('controller' => 'pages', 'action' => 'home')); ?>">Dashboard</a></li>
<!--                <li><a href="#">Accueil</a></li>-->
            <li class="active">Reporting</li>
        </ul>
        <h3 class="page-header"><i class="fa fa-bar-chart-o"></i> Statistiques des Projets  <i class="fa fa-info-circle animated bounceInDown show-info"></i> </h3>

        <div id="chartdiv" style="width:100%;height:500px;font-size:11px;"></div>
    </div>
</div>
   

<?php echo $this->Html->script("amchart/amcharts"); ?>
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
<?php echo $this->Html->scriptEnd(); ?>