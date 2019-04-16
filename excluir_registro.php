<?php

/* INCLUDE PARA REALIZAR A CONEXÃO COM O BANCO	*/	
	include('config/config.php');
	
	$id_registro = $_REQUEST['id'];
	
	/*
		echo "<br />";
			print_r($id_registro);	?>	<-- id_registro	<?php
		echo "<br />";	
	*/
?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
	
	<body>

		<?php
			$sql_del = "DELETE FROM `pessoa` WHERE id = '$id_registro' ";
			$del_registro = mysql_query($sql_del);	
			/*
				echo "<br />";
					print_r($sql_del);	?>	<-- sql_del 01	<?php
				echo "<br />";
			*/
			if(mysql_affected_rows()>0)
			{
				echo "Registro de pessoa Excluida com sucesso.";
				exit;	
			}
			else
			{
				echo "Erro - Exclusão de registro de pessoa nao realizado, verique os dados de entrada.";
				exit;
			}
		?>

		</div>	  
	</body>
</html>