<?php

require_once ("vendor/autoload.php");

$app = new Slim\App();

$app->get('/', function(){
	echo json_encode(array(
	"data"=>date("Y-m-d"),
	"name"=>"Gustavo Almansa"));
});
$app->get('/hello/:name', function ($name){
	echo "Hello," . $name;
});
$app->run();

?>