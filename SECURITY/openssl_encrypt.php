<?php

define('SECRET_IV', pack('a16', 'senha'));
define('SECRET', pack('a16', 'senha'));

$data = [
	"empresa"=>"THS_INVIA"
];

$openssl = openssl_encrypt(
	json_encode($data),
	'AES-128-CBC', //algoritmo 
	SECRET,  //Key  1
	0,  //Retorno
	SECRET_IV //Key 2
);


$string  = openssl_decrypt($openssl, 'AES-128-CBC', SECRET, 0 , SECRET_IV);

echo "CHAVE DA API, THS: ".$openssl."<br>";

var_dump(json_decode($string,true));
?>