<?php

$localDB = 'localhost';
$userDB = 'root';
$senhaDB = '';
$db_aplicacao = 'projeto_php';
$conexao = mysql_connect($localDB,$userDB,$senhaDB) or die ('erro na conex�o');
mysql_select_db($db_aplicacao) or die ('erro na sele��o do DB');

?>