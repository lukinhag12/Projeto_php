
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
				
				<br />
				
				<div id="conteudo_painel">
					
					<!--	INICIO DA APLICAÇÃO FORM	-->
					
					<div class="centralizar_form">
						
						<div id="campos">	 
							
							<p id="titulos" align="center">Inserção de Registro de Pessoas </p>
							
							<br />
							<hr width="98%"/>
							<br />
							
							<div id="formulario">
								
								<form action="" name="form" method="post">
									<table border="0" cellpadding="5" cellspacing="10" >
										
										<tr>
											<td>Nome:<span class="aviso">*</span></td>
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
												<input type="email" placeholder="Digite email" name="email" size="55" />
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