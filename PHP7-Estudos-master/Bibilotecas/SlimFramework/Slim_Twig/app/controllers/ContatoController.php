<?php

namespace app\controllers;

class ContatoController extends Controller{
	
	public function index(){
		$this->view('contato', [
			'nome' => 'Gustavo',
			'title' => 'Contato'
		]);
	}

}

?>