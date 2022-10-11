<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Dao\MySQL\GerenciadorDeLojas\ProdutoDao;

final class ProductController{ // Final class ngm herda
	
	public function getProdutos(Request $requeste, Response $response, array $args): Response{
		$response = $response->WithJson([
			'message'=>'Hello World'
		]);
		
		return $response;
		
	}
	
	public function insertProduto(Request $requeste, Response $response, array $args): Response{
	
		return $response;
		
	}
	
	public function updateProduto(Request $requeste, Response $response, array $args): Response{
		
		return $response;
	}
	
	public function deleteProduto(Request $requeste, Response $response, array $args): Response{
		
		return $response;		
		
	}
	
	
}


?>