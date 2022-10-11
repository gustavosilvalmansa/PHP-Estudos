<?php

use function src\slimConfiguration;
use App\Controllers\ProductController;
use App\Controllers\LojaController;

$app = new \Slim\App(slimConfiguration());



/* Duas funções funcionam igual

$app->get('/', '\App\Controllers\ProductController:getProducts');
$app->get('/', ProductController::class . ':getProducts');  ProductController:class retorna string com namespace e classe

*/
$app->get('/loja' , LojaController::class . ':getLojas');
$app->post('/loja', LojaController::class . ':insertLoja');
$app->put('/loja', LojaController::class . ':updateLoja');
$app->delete('/loja', LojaController::class . ':deleteLoja');


$app->get('/produto' , ProductController::class . ':getProdutos');
$app->post('/produto', ProductController::class . ':insertProduto');
$app->put('/produto', ProductController::class . ':updateProduto');
$app->delete('/produto', ProductController::class . ':deleteProduto');

//


$app->run();


?>