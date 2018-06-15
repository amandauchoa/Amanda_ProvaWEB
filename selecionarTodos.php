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
		
		$sql = "SELECT * FROM animais";
		
		
		$resultado = mysqli_query($conexao, $sql);
		
		echo "<html>";
		echo "<head>";
		echo "<title>Selecionar Todos</title>";
		echo "<meta charset = 'UTF-8' />";
		echo "</head>";
		echo "<body>";
		echo "<table border = '1'>";
		echo "<tr>";
		echo "<th>Nome do animal </th>";
		echo "<th>Espécie </th>";
		echo "<th>CPF do dono </th>";
		echo "<th>Histórico </th>";
		echo "</tr>";
		
		
		while(($vetor = mysqli_fetch_array($resultado)) != NULL){
			echo "<tr>";
			echo "<td>" . $vetor["0"] . "</td>";
			echo "<td>" . $vetor["1"] . "</td>";
			echo "<td>" . $vetor["2"] . "</td>";			
			echo "<td>" . $vetor["3"] . "</td>";
			echo "</tr>";
		}
		
		echo "</table>";
		echo "</body>";
		echo "</html>";
	
	mysqli_close($conexao);

?>
