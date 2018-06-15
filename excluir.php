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
	
		$sql2 = "DELETE FROM animais where nome = '$nome'";
		$query = mysqli_query($conexao, $sql2);
	
		mysqli_close($conexao);
		header("location:home.php");
	}
?>
<html>
	<head>
	<title>Excluir</title>
	<meta charset = "UTF-8" />
	</head>

	<body>
	<form action = "" method = "post">
		<fieldset>
			<legend>Excluir Animal</legend>
		<label>Qual animal deseja excluir?</label>
		<select name = "nome">
			<?php
				for($i=0; $i<$linhas; $i++){
				$vetor = mysqli_fetch_array($query);
			?>
			<option name = "nome" value = "<?=$vetor[0];?>">
				<?=$vetor[0];?>
			</option>
				
			<?php
				}
			?>
		</select>
		
		<br /><br />
		
		<input type = "submit" value = "Excluir" />
		</fieldset>
	</form>
	</body>
</html>