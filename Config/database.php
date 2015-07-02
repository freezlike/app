<?php
class DATABASE_CONFIG {

	public $default = array(
		'datasource' => 'Database/Mysql',
		'persistent' => true,
		'host' => 'localhost',
		'login' => 'root',
		'password' => '',
		'database' => 'rhbase1',
		'prefix' => '',
		'encoding' => 'utf8'
	);
        public $index = array(
        'datasource' => 'Elastic.ElasticSource',
        'index' => 'largestinfoERP',
        'port' => 9200
    );

}
