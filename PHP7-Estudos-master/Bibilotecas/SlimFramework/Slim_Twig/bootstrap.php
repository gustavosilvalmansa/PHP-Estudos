<?php

require "vendor/autoload.php";

use Slim\App;

$config['displayErrorDetails'] = true;

$app = new App(['settings' => $config]);

?>