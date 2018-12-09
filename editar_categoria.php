<?php
	session_start();
	include 'conexao.php';

	if(isset($_GET['edit_id']))
	{
		$consulta = $con->query("SELECT * FROM categoria WHERE id=".$_GET['edit_id']);
		//$sql_query="SELECT * FROM categoria WHERE id=".$_GET['edit_id'];
		//$result_set=mysqli_query($con,$sql_query);
		//$fetched_row=mysqli_fetch_array($result_set,MYSQLI_ASSOC);
	}
	if(isset($_POST['btn-update']))
	{
	 // variáveis para dados de entrada
		 
	   $nome = $_POST['nome'];
			  
	   $descricao = $_POST['descricao'];
			  
	  

	 // fazendo atualização no banco de dados
	  $consulta = "UPDATE categoria SET `nome`='$nome',`descricao`='$descricao' WHERE id=".$_GET['edit_id'];

	 // função de execução de consulta sql
	 if($consulta->rowCount() > 0){
	  ?>
	  <script type="text/javascript">
	  alert('Alteração feita com sucesso!');
	  window.location.href='categorias.php';
	  </script>
	  <?php
	 }
	 else
	 {
	  ?>
	  <script type="text/javascript">
	  alert('Alteração não realizada.');
	  </script>
	  <?php
	 }
	 // função de execução de consulta sql
	}
	if(isset($_POST['btn-cancel']))
	{
	 header("Location: categorias.php");
	}
	?>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Estoque DeskPrint</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/simple-sidebar.css" rel="stylesheet">
	</head>
	<body>
	<center>

	<div id="header">
	 <div id="content">
			<label>Deskprint - Comunicação Visual e Gráfica Rápida</label>
		</div>
	</div>

	<div id="body">
	 <div id="content">
		<?php
		$consulta->execute();
		$registro = $consulta->fetch(PDO::FETCH_ASSOC);
		?>
	 
		<form method="post" enctype="multipart/form-data">
		<table align="center">
		<tr>
		<td>
		<input type="text" value="<?php echo $registro['nome'] ?>" class="form-control" id="nome" name="nome">
	</td>
		</tr>
	  <tr>
		<td>
		<input style="width:350px;" type="text" value="<?php echo $registro['descricao'] ?>" class="form-control" id="descricao" name="descricao">
	</td>
		</tr>
		  <tr>
		<td>
		<button type="submit" name="btn-update"><strong>SALVAR</strong></button>
		<button type="submit" name="btn-cancel"><strong>Voltar</strong></button>
		</td>
		</tr>
		</table>
		</form> 
	</div>
	</div>

	</center>
</body>
</html>