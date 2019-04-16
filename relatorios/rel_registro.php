<?php

/*		FUNÇÃO PARA INVERTER O FORMATO DA DATA DO BANCO DE DADOS	*/	
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
	
/*		FUNÇÃO PARA MUDAR O FORMATO DA DATA		*/	
	function mudardata(&$data1)
	{
		$data1 = str_replace("/","",$data1);
		
		$ano = substr($data1,4,4);
		$mes = substr($data1,2,2);
		$dia = substr($data1,0,2);
		
		$ano .="-";
		$mes .="-";
		
		$data1 .=$ano;
		$data1 .=$mes;
		$data1 .=$dia;
		
		$data1 = substr($data1,8,10);
	}
	
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
		<td COLSPAN="11" ROWSPAN="0" align="center">
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
			$sql_registro = "SELECT id, nome, telefone, email, data_nascimento FROM `pessoa` WHERE id = '$id_registro' ";
			$buscar_registro = mysql_query($sql_registro);
			
			/*
				echo "<br />";
				print_r($sql_registro);	?> <-- sql_registro	<?php
				echo "<br />";
			
				echo "<br />";
				print_r($buscar_registro);	?> <-- buscar_registro	<?php
				echo "<br />";
			*/
			
			if(mysql_num_rows($buscar_registro)>0)
			{
				while ($linha = mysql_fetch_array($buscar_registro))
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
			}
		?>
	</table>