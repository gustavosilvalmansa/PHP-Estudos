<?php

namespace App\Dao\MySQL\GerenciadorDeLojas;
use App\Models\MySQL\GerenciadorDeLojas\LojaModel;

class LojaDao extends Conexao{
	
	public function __construct(){
		
		parent::__construct();
		
	}
	
	public function getAllLojas(): array{
		
		$lojas = $this->pdo
			->query('SELECT * FROM loja')
			->fetchAll(\PDO::FETCH_ASSOC);
		
		return $lojas;
	}
	
	public function insertLoja(LojaModel $loja):void{
		$stmt = $this->pdo->prepare('INSERT INTO loja VALUES(null, :nome, :telefone, :endereco);');
		$stmt->execute([
			"nome"=>$loja->getNome(),
			"telefone"=>$loja->getTelefone(),
			"endereco"=>$loja->getEndereco()
		]);
		
	}
		public function updateLoja(int $id, LojaModel $loja):void{
		$stmt = $this->pdo->prepare('UPDATE loja SET nome = :nome, telefone = :telefone, endereco = :endereco where id = :id');
		$stmt->execute([
			"id"=>$id,
			"nome"=>$loja->getNome(),
			"telefone"=>$loja->getTelefone(),
			"endereco"=>$loja->getEndereco()
		]);
		
	}
	
	public function deleteLoja(int $id):void{
		$stmt = $this->pdo->prepare('DELETE FROM loja where id=:id');
		$stmt->execute([
			"id"=>$id
		]);
	}
	
	
}

?>