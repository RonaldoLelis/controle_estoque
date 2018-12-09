<?php	
	
	session_start();
	try {

	// Variables definition
	$dsn = "mysql:dbname=estoque_desk;host=localhost;port=3306;charset=utf8;";
	$dbuser = "root";
	$dbpass = "";
	
	$nome = $_POST['nome'];
	$descricao = $_POST['descricao'];
	
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
	
	$sql = "INSERT INTO categoria (nome, descricao) VALUES (:nome, :descricao)";

	// prepara a query
	$sql = $pdo->prepare($sql);

	// bindValue dos campos (proteção dos dados)
	$sql->bindValue(":nome", $nome); 
	$sql->bindValue(":descricao", $descricao);

	$sql->execute();
	
	if($sql->rowCount() > 0){
	//echo "Registro inserido com sucesso!";
	$_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Categoria salva com Sucesso<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
		header("Location: categorias.php");
	} else {
	//echo "Ocorreu um erro ao inserir o registro!";
	$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro ao salvar categoria<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
		header("Location: categorias.php");
	}