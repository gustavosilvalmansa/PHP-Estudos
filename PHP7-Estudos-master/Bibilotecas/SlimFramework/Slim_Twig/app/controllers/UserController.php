<?php

namespace app\controllers;

use Slim\Http\Request;
use Slim\Http\Response;

class UserController{
	
	public function show(Request $request, Response $response, array $args){
		dd($args);
	}
	
}

?>