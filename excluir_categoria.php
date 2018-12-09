<?php
	
	include 'conexao.php';

	$exclui = $_GET['id'];

	$sql = "DELETE FROM categoria WHERE id='$exclui'";

		if ($con->query($sql) === TRUE) {
			echo "Deletado com sucesso";
		} else {
			echo "Erro ao deletar: " . $con->error;
		}

		$con->close();
	
	header("Location: categorias.php");
	
?>