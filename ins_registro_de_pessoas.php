<?php

	/* INCLUDE PARA REALIZAR A CONEXÃO COM O BANCO DE DADOS	*/
	include('config/config.php');
	
?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Registro de Pessoas</title>
	</head>
	
	<body>
		
		<div id="geral">
			
			<div id="principal">
				
				<div id="topo"> </div>
				
				<div id="menu">
				
					<!--	INCLUDE MENU DO CRUD	-->
					
					<?php include('menu_global_crud.php'); ?>

				</div>
				
				<br />
				
				<div id="conteudo_painel">
					
					<!--	INICIO DA APLICAÇÃO FORM	-->
					
					<div class="centralizar_form">
						
						<div id="campos">	 
							
							<b>
								<p id="titulos" align="center">Inserção de Registro de Pessoas </p>
							</b>
							
							<br/>

							<div id="formulario">
								
								<form action="" name="form" method="post">
									<table border="0" cellpadding="5" cellspacing="10" >
										
										<tr>
											<td>Nome:</td>
											<td>
												<input type="text" name="nome" placeholder="Informe o Nome" size="60" />
											</td>
										</tr>
										
										<tr>
											<td>Telefone:</td>
											<td>
												<input type="tel" name="telefone" id="telefone" size="15" placeholder="(00) 0000-0000" maxlength="10"/>
											</td>
										</tr>
										
										<tr>
											<td>E-mail:</td>
											<td>
												<input type="email" placeholder="Digite o email" name="email" size="60" />
											</td>
										</tr>
										
										<tr>
											<td>Data Nascimento:</td>
											<td>
												<input type="date" placeholder="00/00/0000" name="data_nascimento" size="10" maxlength="10"/>
											</td>
										</tr>
										
									</table>

									<table border="0" cellspacing="10" cellpadding="10">
										<tr>
											<td>
												<input type="submit" name="botao" id="botao" value="Cadastrar Registro" />
												<input type="reset" name="botaoReset" id="botao" value="Limpar Campos Preenchidos" />
											</td>
										</tr>
									</table>
									
								</form>
								
							</div>
							
							<br />
							
						</div>
					</div>
					<!--	FINAL DA APLICAÇÃO FORM		-->	  
				</div>
			</div>
		</div>
	</body>
</html>

<?php
	// BOTÃO PARA GERAR O CADASTRAR REGISTRO DA PESSOA
	if(isset($_POST['botao']))
	{
		$nome = $_POST['nome'];
		$telefone = $_POST['telefone'];	
		$email = $_POST['email'];
		$data_nascimento = $_POST['data_nascimento'];	
		
		///////////////////////////// BUSCAR O ULTIMO REGISTRO DE ID NA TABELA, E GUARDA NA VARIAVEL ////////////////////////////////			
		$sql_pega_id= "SELECT id FROM pessoa ORDER BY id DESC LIMIT 1";
		$sql_query = mysql_query($sql_pega_id);
		$pega_id = mysql_fetch_array($sql_query);
		/*	
			echo "<br />";
				print_r($sql_pega_id);
			echo "<br />";
		*/	
		$valor_id = $pega_id['id'];	
		if($valor_id == 0){
			$valor_id = 1;
		}else{
			$valor_id = $valor_id + 1;
		}
		
		$sql_registro = "INSERT INTO pessoa (id, nome, telefone, email, data_nascimento) VALUES('$valor_id', '$nome', '$telefone', '$email', '$data_nascimento')";
		/*
			echo "<br />";
				print_r($sql_registro);
			echo "<br />";
		*/
		$insere_registro = mysql_query($sql_registro);// or die(mysql_error());	
		if(mysql_affected_rows()>0)
		{
			echo "Registro de pessoa inserido com sucesso.";
			exit;	
		}
		else
		{
			echo "Erro - registro de pessoa nao realizado, verique os dados de entrada.";
			exit;
		}
	}
?>