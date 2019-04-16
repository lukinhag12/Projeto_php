<?php

	$id_registro = $_REQUEST['id'];
	
	/*
		echo "<br />";
			print_r($id_registro);
		echo "<br />";
	*/
	
	///////////////////////////////////////// EXCEL ////////////////////////////////////
	
	// Definindo o tipo de arquivo (Ex: msexcel, msword, pdf ...) 
	header("Content-type: application/msexcel");   
	// Formato do arquivo (Ex: .xls, .doc, .pdf ...)
	header("Content-Disposition: attachment; filename=Excel_listagem.xls"); 
	
	///////////////////////////////////////// EXCEL ////////////////////////////////////
	?>
	
	<table CELLSPACING="0" CELLPADDING="0" BORDER="0">
		<td COLSPAN="5" ROWSPAN="0" align="center">
			LISTAGEM DE PESSOA INSERIDA
		</td> 
	</table>
	
	<table border='0' cellspacing='3' cellpadding='3' id='tabela'>
		<tr style ='color: #FFF'>
			<tr bgcolor="#006699" class="nome_tb_consulta" align="center" style="border:2px solid white;">
				<td style='color:#FFF; font-weight:bold; background-color:#005194; text-align:center;'>ID</td>
				<td style='color:#FFF; font-weight:bold; background-color:#005194; text-align:center;'>NOME</td>
				<td style='color:#FFF; font-weight:bold; background-color:#005194; text-align:center;'>TELEFONE</td>
				<td style='color:#FFF; font-weight:bold; background-color:#005194; text-align:center;'>E-MAIL</td>
				<td style='color:#FFF; font-weight:bold; background-color:#005194; text-align:center;'>DATA DE NASCIMENTO</td>
			</tr>
		</tr>
		
		<?php
			
			$query = "SELECT id, nome, telefone, email, data_nascimento FROM `pessoa` WHERE id = '$id_registro'";
			// VARIAVEL COM A CONEXÃO DO BANCO DE DADOS.
			$conn = mysql_connect('localhost', 'root', '') or die ('Verifique seus dados de conexão com o banco de dados. Detalhes: ' . mysql_error());
			// SELECIONANDO BANCO DE DADOS.
			mysql_select_db('projeto_php', $conn);

			$result = mysql_query($query, $conn);
			if($linha = mysql_fetch_array($result)) 
			{			
				$id_registro = $linha['id'];
				$nome = $linha['nome'];
				$telefone = $linha['telefone'];
				$email = $linha['email'];
				$data_nascimento = $linha['data_nascimento'];
				?>
				
				<tr>	
					<td class="resultada_consulta"><?php echo $id_registro; ?></td>
					<td class="resultada_consulta"><?php echo $nome; ?></td>
					<td class="resultada_consulta"><?php echo $telefone; ?></td>
					<td class="resultada_consulta"><?php echo $email; ?></td>
					<td class="resultada_consulta"><?php echo $data_nascimento; ?></td>
				</tr>
				
				<?php
			}
		?>
	</table>