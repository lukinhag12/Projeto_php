<!--	INCLUDE LISTA DE REGISTRO DE PESSOAS INSERIDAS NO BANCO	-->

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
		
		$sql_registro = "SELECT id, nome, telefone, email, data_nascimento FROM `pessoa` ORDER BY id DESC LIMIT 30";
		$buscar_registro = mysql_query($sql_registro);
		/*
			echo "<br />";
				print_r($sql_registro);
			echo "<br />";
		*/
		if(mysql_num_rows($buscar_registro)>0)
		{
			while($linha=mysql_fetch_array($buscar_registro))
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
		}
	?>
</table>