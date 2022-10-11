<?php

namespace App\Models\MySQL\GerenciadorDeLojas;


final class LojaModel{
	
	private $id;
	private $nome;
	private $telefone;
	private $endereco;
	
	//Getters
	public function getId():int{
		return $this->id;
	}
	public function getNome():string{
		return $this->nome;
	}
	public function getTelefone():string{
		return $this->telefone;
	}
	public function getEndereco():string{
		return $this->endereco;
	}
	
	
	//Setters
	public function setNome(string $nome): LojaModel{
		$this->nome=$nome;
		return $this;
	}
	public function setTelefone(string $telefone): LojaModel{
		$this->telefone=$telefone;
		return $this;

	}
	public function setEndereco(string $endereco): LojaModel{
		$this->endereco=$endereco;
		return $this;

	}
}



?>