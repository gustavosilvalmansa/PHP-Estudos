<?php

class Usuario {
	private $idusuario;
	private $deslogin;
	private $dessenha;
	private $dtcadastro;

	//Getters
	public function getIdusuario(){
		return $this->idusuario;
	}
	public function getDeslogin(){
		return $this->deslogin;
	}
	public function getDessenha(){
		return $this->dessenha;
	}
	public function getDtcadastro(){
		return $this->dtcadastro;
	}
	//Setters
	public function setIdusuario($idusuario){
		$this->idusuario=$idusuario;
	}
	public function setDeslogin($deslogin){
		$this->deslogin=$deslogin;
	}
	public function setDessenha($dessenha){
		$this->dessenha=$dessenha;
	}
	public function setDtcadastro($dtcadastro){
		$this->dtcadastro=$dtcadastro;
	}
	//Metodos
	
	//SELECT BY ID
	public function loadById($id){
		$sql = new Sql();
		$results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", 
		array(
		":ID"=>$id
		));
		if(count($results) > 0) {
			$row = $results[0];
			$this->setData($results[0]);

			/*$this->setIdusuario($row['idusuario']);
			$this->setDeslogin($row['deslogin']);
			$this->setDessenha($row['dessenha']);
			$this->setDtcadastro(new DateTime($row['dtcadastro'])); */
			
		}
	}
	
	//SELECT ALL 
	public function getList(){
		
		$sql = new Sql();
		return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin;");
		
	}
	//USING LIKE TO SELECT STRINGS
	public function search($login){
		$sql = new Sql();
		return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin", array(
			':SEARCH'=>"%".$login."%"
		));
	}
	
	//SELECT USING LOGIN AND PASSWORD
	public function login($login,$password){
		$sql = new Sql();
		$results = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN AND dessenha = :PASSWORD", 
		array(
		":LOGIN"=>$login,
		":PASSWORD"=>$password,

		));
		if(count($results) > 0){
			$row = $results[0];
			
			$this->setData($results[0]);
			/*$this->setIdusuario($row['idusuario']);
			$this->setDeslogin($row['deslogin']);
			$this->setDessenha($row['dessenha']);
			$this->setDtcadastro(new DateTime($row['dtcadastro'])); */
			
		}else{
			
			throw new Exception("Login Error!");
		}
		
	} 
	// Atribui resultado da consulta
	public function setData($data){
		$this->setIdusuario($data['idusuario']);
		$this->setDeslogin($data['deslogin']);
		$this->setDessenha($data['dessenha']);
		$this->setDtcadastro(new DateTime($data['dtcadastro']));
		
		
	}
	//Inserir registro no banco
	public function insert(){
		$sql = new Sql();
		$results = $sql->select("CALL sp_usuarios_insert(:LOGIN, :PASSWORD)", array(
		':LOGIN'=>$this->getDeslogin(),
		':PASSWORD'=>$this->getDessenha()
		) );
		
		if(count($results) > 0){
			$this->setData($results[0]);
		}
		//$sql->query("INSERT INTO tb_usuarios");
	}
	
	//Atualizar registro
	public function update($login, $password){
		
		$this->setDeslogin($login);
		$this->setDessenha($password);
		$sql = new Sql();
		$sql->query("UPDATE  tb_usuarios SET deslogin = :LOGIN, dessenha = :PASSWORD WHERE idusuario=:ID", array(
			':LOGIN'=>$this->getDeslogin(),
			':PASSWORD'=>$this->getDessenha(),
			':ID'=>$this->getIdusuario()
		));
	}
	
	//Deletar Registro
	public function delete(){
		
		$sql = new Sql();
		
		$sql->query("DELETE FROM tb_usuarios WHERE idusuario = :ID", array(
			':ID'=>$this->getIdusuario()
		));
		$this->setIdusuario(0);
		$this->setDeslogin("");
		$this->setDessenha("");
		$this->setDtcadastro(new DateTime());
	}
	
	//MetodoS Mágicos
	public function __construct($login = "", $senha = ""){
		$this->setDeslogin($login);
		$this->setDessenha($senha);
	}
	public function __toString(){
		return json_encode(array(
		"idusuario"=>$this->getIdusuario(),
		"deslogin"=>$this->getDeslogin(),
		"dessenha"=>$this->getDessenha(),
		"dtcadastro"=>$this->getDtcadastro()->format("d/m/Y H:i:s")
		));
	}
	

}

?>