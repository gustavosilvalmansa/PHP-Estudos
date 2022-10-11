<?php

require_once("config.php");

/* RAW SELECT QUERY

$sql = new Sql();
$usuarios = $sql->select("SELECT * FROM tb_usuarios");
echo json_encode($usuarios);

*/ 

/* SEARCH USING SELECT 

$select = new Usuario();
$select->loadById(3);
echo $select;

*/



/*Search using LIKE

$list = Usuario::search("JOSE"); 
echo json_encode($list);

*/

/*Search using LOGIN and PASSWORD
$usuario = new Usuario();
$usuario->login("JOSE","15733");
echo $usuario;*/


/*INSERT USING PROCEDURE 
$insert = new Usuario("login","senha");
$insert->insert();
echo $insert;*/

/*UPDATE USER BY ID
$update = new Usuario();
$update->loadByID(8);
$update->update("professor","linguiça");
echo $update;
*/

$delete = new Usuario();
$delete->loadByID(7);
$delete->delete();
echo $delete;


?>