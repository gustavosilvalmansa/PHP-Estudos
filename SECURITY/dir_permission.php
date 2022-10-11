<?php

$pasta = "arquivos";
$permissao = "0775";
if (!is_dir($pasta)) mkdir($pasta, $permissao);

/*
##Permissions:##
0 Nothing,
1 Execute, 
2 Save, 
3 Execute + Save, 
4 Read Only ,
5 Read + Execute,
6 Read +  Save,
7 Read + Save + Execute

775 [Owner, Groups, Guests]
*/

echo "Diretório criado com sucesso";

?>