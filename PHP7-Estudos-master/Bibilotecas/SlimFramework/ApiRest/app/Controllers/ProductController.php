<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Dao\MySQL\GerenciadorDeLojas\ProdutoDao;

final class ProductController{ // Ngm herda
	
	public function getProducts(Request $requeste, Response $response, array $args): Response
	{
		$response->getBody()->write("Hello world");
		
		$response = $response->withJson([
		"msg"=> "Hello World"
		]);
		
		return $response;
		
	}
	
	
}


?>