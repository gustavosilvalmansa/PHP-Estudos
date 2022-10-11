<?php

$file = fopen("log.txt","a+"); // w+(w = write, + = create)  | a+( a = alter)

fwrite($file, date("Y-m-d H:i:s") . "\r\n");

fclose($file);

echo "arquivo criado";


?>