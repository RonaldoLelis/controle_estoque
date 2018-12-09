<?php		
	
	session_start();
	try {

	// Variables definition
	$dsn = "mysql:dbname=estoque_desk;host=localhost;port=3306;charset=utf8;";
	$dbuser = "root";
	$dbpass = "";
	
	$nome_empresa = $_POST['nome_empresa'];
	$cnpj = $_POST['cnpj'];	
	$apresentacao = $_POST['apresentacao'];
	$logradouro = $_POST['logradouro'];
	$numero = $_POST['numero'];	
	$complemento = $_POST['complemento'];
	$bairro = $_POST['bairro'];
	$cidade = $_POST['cidade'];	
	$estado = $_POST['estado'];
	$site = $_POST['site'];
	$facebook = $_POST['facebook'];
	$telefone = $_POST['telefone'];	
	$falar_com = $_POST['falar_com'];
	$email = $_POST['email'];
	
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
	
	$sql = "INSERT INTO fornecedores(nome_empresa, cnpj, apresentacao, logradouro, numero, complemento, bairro, cidade, estado, site, facebook, telefone, falar_com, email) VALUES (:nome_empresa, :cnpj, :apresentacao, :logradouro, :numero, :complemento, :bairro, :cidade, :estado, :site, :facebook, :telefone, :falar_com, :email)";
	// prepara a query
	$sql = $pdo->prepare($sql);
	
	// bindValue dos campos (proteção dos dados)
	$sql->bindValue(":nome_empresa", $nome_empresa);
	$sql->bindValue(":cnpj", $cnpj);	
	$sql->bindValue(":apresentacao", $apresentacao);
	$sql->bindValue(":logradouro", $logradouro);
	$sql->bindValue(":numero", $numero);	
	$sql->bindValue(":complemento", $complemento);
	$sql->bindValue(":bairro", $bairro);
	$sql->bindValue(":cidade", $cidade);	
	$sql->bindValue(":estado", $estado);
	$sql->bindValue(":site", $site);
	$sql->bindValue(":facebook", $facebook);
	$sql->bindValue(":telefone", $telefone);	
	$sql->bindValue(":falar_com", $falar_com);
	$sql->bindValue(":email", $email);

	$sql->execute();
	
	/*if($sql->rowCount() == true):
   echo "<div>Cadastrado com sucesso</div>";
	endif;*/
	
	if($sql->rowCount() > 0){
	//echo "Registro inserido com sucesso!";
	$_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Fornecedor Cadastrado com Sucesso<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
		header("Location: fornecedores.php");
	} else {
	//echo "Ocorreu um erro ao inserir o registro!";
	$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro ao cadastrar fornecedor<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
		header("Location: fornecedores.php");
	}