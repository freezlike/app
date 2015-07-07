<?php

function create_db_config($host, $login, $password, $dbname) {
    $file = "../Config/database.php";

    $string = '<?php' . "\r\n\r\n" . 'class DATABASE_CONFIG {

    public $default = array(
        "datasource" => "Database/Mysql",
        "persistent" => true,
        "host" => "' . $host . '",
        "login" => "' . $login . '",
        "password" => "' . $password . '",
        "database" => "' . $dbname . '",
        "prefix" => "",
        "encoding" => "utf8",
    );

}';



    $fp = fopen($file, "w");

    fwrite($fp, $string);

    fclose($fp);
}

function getUrl() {
    $host = $_SERVER['HTTP_HOST'];
    $currentUrl = $_SERVER['REQUEST_URI'];
    $currentUrl = explode('/', $currentUrl);
    if (count($currentUrl) === 5) {
        $url = $_SERVER['REQUEST_SCHEME'] . '://' . $host . str_replace('install.php', '', $_SERVER['REQUEST_URI']);
    }
    return $url;
}

$cssPath = getUrl() . 'css/';
$jsPath = getUrl() . 'js/';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Installation LargestERP
        </title>
        <link rel="stylesheet" href="<?php echo $cssPath . 'bootstrap.min.css'; ?>" type="text/css"/>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h4>Installation LargestERP</h4>
                    </div>
                    <form class="col-md-6 form-horizontal">
                        <legend>Configuration BDD</legend>
                        <div class="form-group">
                            <input class="form-control" id="hostname" placeholder="Hostname" />
                            <span></span>
                        </div>
                        <div class="form-group">
                        <input class="form-control" id="login" placeholder="User" />
                        </div>
                        <div class="form-group">
                        <input class="form-control" id="password" placeholder="password" />
                        </div>
                        <div class="form-group">
                        <input class="form-control" id="dbname" placeholder="DB_NAME" />
                        </div>
                        <input class="btn btn-success pull-right" type="submit" id="submitBdd" value="Suivant">
                    </form>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="<?php echo $jsPath . 'jquery-1.11.2.min.js'; ?>"></script>
        <script type="text/javascript" src="<?php echo $jsPath . 'bootstrap.min.js'; ?>"></script>
        <script>
            $(document).on('ready', function () {
               $("#submitBdd").on('click',function(e){
                   e.preventDefault();
                   
               }); 
            });
        </script>
    </body>
</html>