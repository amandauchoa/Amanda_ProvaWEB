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
		mysqli_select_db ($conexao, "veterinaria");

		if(isset($_POST["cpf_dono"])){
			$cpf_dono = $_POST["cpf_dono"];
		
			$sql3 = "SELECT nome, historico FROM animais WHERE cpf_dono = cpf_dono";
			$query = mysqli_query($conexao, $sql3);
			$resultado = mysqli_fetch_array($query);
			
			echo $resultado['nome'] . "<br>";
			echo $resultado['historico'] . "<br>";
		}
			echo "<html>";
			echo "<form>";
			echo "<fieldset>";
			echo "<legend>Selecionar por CPF</legend>";
			echo "<label>Digite seu CPF:</label>";
			echo "<input type = 'number' name = 'cpf_dono' /><br /><br />";
			echo "<input type = 'submit' value = 'Enviar' />";
			echo "<br /><br />";
			echo "<p>Nome do animal:";
			echo $resultado['nome'];
			echo "</p>";
			echo "<p>Historico do animal:";
			echo $resultado['historico'];
			echo "</p>";
			echo "</fieldset>";
			echo "</form>";
			echo "</html>";
			
			mysqli_close($conexao);
			header("location:home.php");
		//}

?>


