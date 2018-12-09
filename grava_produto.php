<?php		
	
	session_start();
	try {

	// Variables definition
	$dsn = "mysql:dbname=estoque_desk;host=localhost;port=3306;charset=utf8;";
	$dbuser = "root";
	$dbpass = "";
	
	$categoria_id = $_POST['categoria_id'];
	$nome_prod = $_POST['nome_prod'];
	$descricao_prod = $_POST['descricao_prod'];	
	$qtde_prod = $_POST['qtde_prod'];
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
	$sql = "INSERT INTO produtos (categoria_id, nome_prod, descricao_prod, qtde_prod) VALUES (:categoria_id, :nome_prod, :descricao_prod, :qtde_prod)";
	
	// prepara a query
	$sql = $pdo->prepare($sql);
	// bindValue dos campos (proteção dos dados)
	$sql->bindValue(":categoria_id", $categoria_id);
	$sql->bindValue(":nome_prod", $nome_prod); 
	$sql->bindValue(":descricao_prod", $descricao_prod);
	$sql->bindValue(":qtde_prod", $qtde_prod);	

	$sql->execute();
	
	/*if($sql->rowCount() == true):
    echo "<div>Cadastrado com sucesso</div>";
	endif;*/
	
	if($sql->rowCount() > 0){
	//echo "Registro inserido com sucesso!";
	$_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Produto Cadastrado com Sucesso<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
		header("Location: produtos.php");
	} else {
	//echo "Ocorreu um erro ao inserir o registro!";
	$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro ao cadastrar o produto<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
		header("Location: produtos.php");
	}