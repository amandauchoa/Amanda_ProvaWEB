<?php
	$usuario = "root";
	$senha =  "usbw";
	$conexao = mysqli_connect("localhost", $usuario, $senha);
	if($conexao){
		//echo "Conectou <br />";
	}else{
		echo "Não Conectou";
		echo "Numero:" . mysqli_connect_errno . "<br />";
		echo "Descrição:" . mysqli_connect_error . "<br />";
		exit;
	}
	mysqli_select_db($conexao, "veterinaria");
	
	$sql = "SELECT * FROM animais";
	
	$query = mysqli_query($conexao, $sql);
	
	$linhas = mysqli_num_rows($query);
	
	if(isset($_POST["nome"])){
		$nome = $_POST["nome"];
		$tipo = $_POST["tipo"];
		$cpf_dono = $_POST["cpf_dono"];
		$historico = $_POST["historico"];

		$sql2 = "UPDATE animais SET nome = '$nome', tipo = '$tipo', historico = '$historico' where cpf_dono = $cpf_dono";
		$query2 = mysqli_query($conexao, $sql2);
	
		mysqli_close($conexao);
		header("location:home.php");
	}
?>

<html>
	<head>
	<title>Atualizar</title>
	<meta charset = "UTF-8" />
	</head>
	
	<body>
		<form action = "" method = "post">
		<fieldset>
			<legend>Atualizar Dados</legend>
		<label>Qual animal deseja atualizar?</label>
		<select name = "nome">
		<?php
			for($i=0; $i<$linhas; $i++){
				$vetor = mysqli_fetch_array($query);
		?>
			<option  name = "nome" value = "<?=$vetor[0];?>">
			<?php echo "$vetor[0]";?>
			</option>
			<?php
			}
			?>
		</select>
		
		<br /><br />
		
		<label>Nome do animal:</label>
		<input type = "text" name = "nome" /><br /><br />
		
		<label>Espécie:</label>
		<input type = "text" name = "tipo" /><br /><br />
			
		<label>Histórico:</label>
		<input type = "text" name = "historico" /><br /><br />
			
		<input type = "submit" value = "Atualizar" />
		</fieldset>
		</form>
	</body>		
</html>