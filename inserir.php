<?php
	
	if(isset($_POST["nome"])){
	
	$usuario = "root";
	$senha =  "usbw";
	$conexao = mysqli_connect("localhost", $usuario, $senha);
	
	if($conexao){
		//echo "Conectou<br />";
	}
	else{
		
		echo "Não conectou";
		echo "Numero:" . mysqli_connect_errno() . "<br />";
		echo "Descricao:" . mysqli_connect_error() . "<br />";
		exit;
	}
	
		$nome = $_POST["nome"];
		$tipo = $_POST["tipo"];
		$cpf_dono = $_POST["cpf_dono"];
		$historico = $_POST["historico"];
		
		mysqli_select_db($conexao, "veterinaria");
		
		$sql = "INSERT INTO animais (nome, tipo, cpf_dono, historico) VALUES ('$nome', '$tipo', $cpf_dono, '$historico')";
		
		
		$query = mysqli_query($conexao, $sql); 
		
		if(!$query){
			echo "Numero: " . mysqli_errno($conexao) . "<br />";
			echo "Descrição: " . mysqli_error($conexao) . "<br />";
		}
		
		mysqli_close($conexao);

		header("location:home.php");

	}
	else{
?>

<html>
	<head>
	<title>Inserir Dados</title>
	<meta charset = "UTF-8" />
	</head>
	
	<body>
		<form action = "" method = "post">
		<fieldset>
			<legend>Inserir Dados</legend>
		
			<label>Nome do animal:</label>
			<input type = "text" name = "nome" /><br /><br />
			
			<label>Espécie:</label>
			<input type = "text" name = "tipo" /><br /><br />
			
			<label>CPF do dono:</label>
			<input type = "number" name = "cpf_dono" /><br /><br />
			
			<label>Histórico:</label>
			<input type = "text" name = "historico" /><br /><br />
			
			<input type = "submit" value = "Enviar" />
		</fieldset>
		</form>
	</body>
</html>

<?php
	}
?>