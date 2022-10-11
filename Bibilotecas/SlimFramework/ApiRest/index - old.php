<?php

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;


require_once "vendor/autoload.php";

$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];
$configuration = new \Slim\Container($configuration);

$mid01 = function(Request $request, Response $response, callable $next){ // $next é o proximo passo do middleware1 
	
	$response->getBody()->write("Inside Middleware 01"); //Autenticação
	$response = $next($request,$response);  
	$response->getBody()->write("Inside Middleware 02"); 
	
	return $response;

};

$app = new \Slim\App($configuration);

$app->get('/', function($request, $response, $args){
	
	return $response->getBody()->write("Bem vindo ao slim");
	
});



$app->get('/produto[/{nome}]', function(Request $request,Response $response, array $args){
		
		$limit = $request->getQueryParams()['limit'] ?? 10;
		
		$nome = $args['nome'] ?? "default";
		
		return $response->getBody()->write("{$limit} Produtos do DB com o nome {$nome}");
});

$app->post("/produto", function(Request $request, Response $response, array $args): Response{
	$data = $request -> getParsedBody();
	
	
	$nome = $data['nome'] ?? '';
	
	$response->getBody()->write("Produto {$nome} (POST)");
	
	return $response;
})->add($mid01);
/*
$app->put("/produto", function(Request $request, Response $response, array $args){
	$data = $request -> getParsedBody();
	
	
	$nome = $data['nome'] ?? ''; 
	
	return $response->getBody()->write("Produto {$nome} (PUT)");
	
});

$app->delete("/produto", function(Request $request, Response $response, array $args){
	$data = $request -> getParsedBody();
	
	
	$nome = $data['nome'] ?? '';
	
	return $response->getBody()->write("Produto {$nome} (DELETE)");
	
});*/

$app->run();
?>