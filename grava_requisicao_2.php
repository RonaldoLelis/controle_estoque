<?php
	session_start();
	try {

	// Variables definition
	$dsn = "mysql:dbname=estoque_desk;host=localhost;port=3306;charset=utf8;";
	$dbuser = "root";
	$dbpass = "";
	
	$nome_prod = $_POST['nome_prod'];
	$solicitante = $_POST['solicitante'];
	$qtde_solicitada = $_POST['qtde_solicitada'];	
	$qtde_prod = $_POST['qtde_prod'];
	$categoria_id = $_POST['categoria_id'];

	// PDO MySQL options
	$options = array (
	PDO::ATTR_CASE => PDO::CASE_LOWER, // lowercase
	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // pdo show exception
	PDO::ATTR_PERSISTENT => true, // persistent connection
	PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC // set fetch mode
	);

	// PDO object
	$pdo = new PDO($dsn, $dbuser, $dbpass, $options);
	} catch (PDOException $e){
	echo "(". $e->getCode() . ") " .$e->getMessage() . " at line: " . $e->getLine();
	}

	$sql = "INSERT INTO requisicoes (nome_prod, solicitante, qtde_solicitada, qtde_prod, categoria_id) VALUES (:nome_prod, :solicitante, :qtde_solicitada, :qtde_prod, :categoria_id)";

	// prepara a query
	$sql = $pdo->prepare($sql);

	// bindValue dos campos (proteção dos dados)
	$sql->bindValue(":nome_prod", $nome_prod); 
	$sql->bindValue(":solicitante", $solicitante);
	$sql->bindValue(":qtde_solicitada", $qtde_solicitada);
	$sql->bindValue(":qtde_prod", $qtde_prod);
	$sql->bindValue(":categoria_id", $categoria_id);

	$sql->execute();
	
	/*if($sql->rowCount() == true):
    echo "<div>Cadastrado com sucesso</div>";
	endif;*/
	
	if($sql->rowCount() > 0){
	//echo "Registro inserido com sucesso!";
	$_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Requisição feita com Sucesso<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
		header("Location: saida.php");
	} else {
	//echo "Ocorreu um erro ao inserir o registro!";
	$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro ao executar a Requisição<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
		header("Location: saida.php");
	}
	
	/*Verificar se salvou no banco de dados através "mysqli_insert_id" o qual verifica se existe o ID do último dado inserido
	if($sql->rowCount() > 0){
		$_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Requisição feita com Sucesso<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
		header("Location: saida.php");
	}else{
		$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro ao executar a Requisição<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
		header("Location: saida.php");
	}*/
	