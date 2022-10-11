<?php

namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Dao\MySQL\GerenciadorDeLojas\LojaDao;
use App\Models\MySQL\GerenciadorDeLojas\LojaModel;

final class LojaController{ // Ngm herda
	
	public function getLojas(Request $request, Response $response, array $args): Response{
		
		$lojaDao = new LojaDao();
		$lojas = $lojaDao->getAllLojas();
		
		$response = $response->withJson($lojas); // Converte retorno para Json 
		
		
		return $response;
	}
	
	public function insertLoja(Request $request, Response $response, array $args): Response{
		
		$data = $request->getParsedBody();
		
		$lojaDao = new LojaDao();
		$loja = new LojaModel();
		$loja->setNome($data['nome'])->setEndereco($data['endereco'])->setTelefone($data['telefone']);   // Metodo encadeado, funciona pois o objeto retorna ele mesmo {$this}
		$lojaDao->insertLoja($loja);
		
		$response = $response->withJson([
			"MESSAGE"=>"Loja Inserida"
		]);
		
		return $response;
	
	}
	
	public function updateLoja(Request $request, Response $response, array $args): Response{
		
		$data = $request->getParsedBody();
		
		$lojaDao = new LojaDao();
		$loja = new LojaModel;
		$loja->setNome($data['nome'])->setEndereco($data['endereco'])->setTelefone($data['telefone']);   
		$lojaDao->updateLoja($data['id'], $loja);
		
		$response = $response->withJson([
			"MESSAGE"=>"Cadastro de loja"
		]);
		
		return $response;
		
	}
	
	public function deleteLoja(Request $request, Response $response, array $args): Response{
		$data = $request->getParsedBody();

		
		$lojaDao = new LojaDao();
		$lojaDao->deleteLoja($data['id']);
		
		
		$response = $response->withJson([
			"message"=>"Loja Excluida com sucesso"
		]);
		
		return $response;
		
	}
	
	
}


?>