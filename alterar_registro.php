<?php	
/* INCLUDE PARA REALIZAR A CONEXÃO COM O BANCO	*/
	include("config/config.php");
	
/*	FUNÇÃO PARA INVERTER O FORMATO DA DATA DO BANCO DE DADOS	*/		
	function inverter(&$data1)
	{
		$data1 = str_replace("-","",$data1);
		
		$dia = substr($data1,6,2);
		$mes = substr($data1,4,2);
		$ano = substr($data1,0,4);
		
		$data1 = NULL;
		$dia .= "/";
		$mes .= "/";
		
		$data1 .=$dia;
		$data1 .=$mes;	
		$data1 .=$ano;
	}
	
	$id_registro = $_GET['id'];	
	
	/*		SELECT PARA BUSCAR AS INFORMAÇÕES DO REGISTRO DA CONSULTA	*/
	$sql_registro = "SELECT id, nome, telefone, email, data_nascimento FROM pessoa WHERE id = '$id_registro'";
	$buscar_registro = mysql_query($sql_registro);
	/*
		echo "<br />";
			print_r($sql_registro);
		echo "<br />";
	*/
	if(mysql_num_rows($buscar_registro)==0)
	{
		echo "Nenhum registro encontrado";
		exit;
	}
	else
	{
		while($linha=mysql_fetch_array($buscar_registro))
		{
			$id_registro = $linha['id'];
			$nome = $linha['nome'];
			$telefone = $linha['telefone'];
			$email = $linha['email'];
			$data_nascimento = $linha['data_nascimento'];
			inverter($data_nascimento);	
		}
	}	
?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title> Detalhes de Registro</title>
	</head>
	
	<body>
		
		<div id="geral">
			
			<div id="principal">
				
				<div id="topo"></div>	
				
				<div id="menu">
					<!--	INCLUDE MENU DO CRUD	-->
					<?php include('menu_global_crud.php'); ?>
				</div>
				
				<br />
				
				<div id="conteudo_painel">
					
					<div id="campos">
					
						<b>
							<p id="titulos" align="center">Detalhes do Registro: ( <?php echo $id_registro;?> )</p>
						<b>
						
						<br/>
						
						<div id="formularioLongo">
							
							<form action="" name="form" method="post">
								
								<table border="0" cellpadding="5" cellspacing="10" width="90%">
									
									<tr>
										<td>
											Nome: <br/> 
											<input type="text" name="nome" size="60" value="<?php echo $nome; ?>" />
										</td>
									</tr>
									
									<tr>
										<td>
											Telefone:<br/> 
											<input type="text" name="telefone" id="telefone" size="10" placeholder="(00) 0000-0000" maxlength="10" value="<?php echo $telefone; ?>"/>
										</td>
									</tr>
									
									<tr>
										<td>E-mail: <br/>
											<input type="text" placeholder="Digite email" name="email" size="50" value="<?php echo $email; ?>" />
										</td>
									</tr>	
									
									<tr>
										<td>
											Data Nascimento: <br/>
											<input type="text" name="data_nascimento" id="data_nascimento" size="10" maxlength="10" value="<?php echo $data_nascimento; ?>" />
										</td>
									</tr>
									
								</table>
								
								<table border="0" cellpadding="5" cellspacing="10" width="100%">
									
									<tr>
										<td>
											<input type="submit" name="botao" value=" Alterar " id="botao"/>
											<input type="button" name="botaoX" id="botao" value="Voltar" onclick="history.go(-1)"/>
										</td>
									</tr>
									
								</table>
								
							</form>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</body>
</html>

<?php
	if(isset($_POST['botao']))
	{	
		/*	FUNÇÃO PARA MUDAR O FORMATO DA DATA	*/
		function mudardata(&$data1)
		{
			$data1 = str_replace("/","-",$data1);
			
			$ano = substr($data1,6,4);
			$mes = substr($data1,3,2);
			$dia = substr($data1,0,2);
			$data1 = NULL;
			
			$ano .= "-";
			$mes .= "-";
			
			$data1 .=$ano;
			$data1 .=$mes;
			$data1 .=$dia;
		}
		
		$nome = $_POST['nome'];
		$telefone = $_POST['telefone'];
		$email = $_POST['email'];
		$data_nascimento = $_POST['data_nascimento'];
		mudardata($data_nascimento);	
		
		$sql_upd = "UPDATE pessoa SET nome='$nome', telefone='$telefone', email='$email', data_nascimento='$data_nascimento' WHERE id = '$id_registro'";
		
		$atualizar_registro = mysql_query($sql_upd);
		/*
			echo "<br />";
			print_r($sql_upd);	?>	<-- sql_upd	<?php
			echo "<br />";
		*/
		if(mysql_affected_rows()>0)
		{
			echo "Alteração realizada com sucesso.";
			exit;
		}
		//INFORMA MENSAGEM DE ERRO CASO AS INFORMAÇÕES DO REGISTRO NÃO TENHA SIDO ATUALIZADO NA TABELA PESSOA;
		else
		{
			echo "Atenção alteração não realizada, verifique os dados de entrada.";
			exit;
		}
	}
?>											