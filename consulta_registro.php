﻿<?php
/* INCLUDE PARA REALIZAR A CONEXÃO COM O BANCO	*/
	include('config/config.php');
	
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
?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Consulta de Registro</title>	
	</head>
	
	<body>
		
		<div id="geral">
			
			<div id="principal">
				
				<div id="topo"></div>

				<br />
				
				<div id="conteudo_painel">
					
					<div id="campos">	
						
						<p id="titulos" align="center">Consultar Registro de Pessoa</p>
						
						<br />
							<hr width="98%"/>
						<br />
						
						<div class="centralizar_form">
							
							<div id="formulario">
								
								<form action="" name="form" method="post">
									
									<table width="100%" border="0" cellspacing="5" cellpadding="10">
										
										<tr>
											<td> Id Registro: 
												<select name="id_registro">
													<option value="">Selecione...</option>
													<?php
														$query = "SELECT id FROM `pessoa` ORDER BY id DESC";
														$resultado = mysql_query($query);
														while($linha=mysql_fetch_array($resultado))
														{
															echo "<option value='".$linha['id']."'>".$linha['id']."</option>";
														}
													?>
												</select>
											</td>
										</tr> 
										
										<tr>
											<td>Informe o nome da Pessoa:
												<input type="text" name="nome" size="60" placeholder="Digite o nome" onkeyup="this.value = this.value.toUpperCase();" />
											</td>
										</tr> 
										
										<tr>
											<td>
												<br/>
												<input type="submit" name="botao" id="botao" value="Consultar" />
											</td>
										</tr>
										
									</table>
								</form>
								
								<br />
								<br />
								
								<?php
									if(!empty($_POST['botao']))
									{
										$id_registro = $_POST['id_registro'];
										$nome = $_POST['nome'];
										
										$sql = "SELECT id, nome, telefone, email, data_nascimento FROM pessoa WHERE ";
										
										if (!empty($id_registro) AND (($nome) == ''))
										{
											$sql .= " id = '$id_registro'";
										}
										if(!empty($nome) AND (($id_registro) == ''))
										{
											$sql .= " nome = '$nome'";	
										}
										
										if (!empty($id_registro) and !empty($nome))
										{
											$sql .= "id = '$id_registro' AND nome = '$nome'";
										}

										/*
											echo "<br />";
												print_r($sql);
											echo "<br />";
										*/
										
										$busca = mysql_query($sql);
										if(mysql_num_rows($busca)==0)
										{
											echo "Nenhum registtro encontrado.";
											exit;
										}
										else
										{
										?>
										
										<table cellspacing="5" cellpadding="10" width="100%">
											<tr bgcolor="#006699" class="nome_tb_consulta">
												<td>ID</td>
												<td>NOME</td>
												<td>TELEFONE</td>
												<td>E-MAIL</td>
												<td>DATA DE NASCIMENTO</td>
												<td>DETALHES</td>
											</tr>
											
											<?php
												while($linha=mysql_fetch_array($busca))
												{
													$id_registro = $linha['id'];
													$nome = $linha['nome'];
													$telefone = $linha['telefone'];
													$email = $linha['email'];
													$data_nascimento = $linha['data_nascimento'];
													inverter($data_nascimento);		
												?>
												
												<tr>
													<td  class="resultada_consulta"><?php echo $id_registro; ?></td>
													<td  class="resultada_consulta"><?php echo $nome; ?></td>
													<td  class="resultada_consulta"><?php echo $telefone; ?></td>
													<td  class="resultada_consulta"><?php echo $email; ?></td>
													<td  class="resultada_consulta"><?php echo $data_nascimento; ?></td>
													<td class="resultada_consulta" align="center"><?php echo "<a href=alterar_registro.php?id=$id_registro><img src='img/icone_pesquisa.jpg' border='0'></a>"?></td>
												</tr>
												
												<?php
												} 
											?>
											
										</table>
										
										<?php	
										}
									}
								?>
								
							</div>
						</div>						
						
					</div>
				</div>
			</div>
		</div>
	</body>
</html>