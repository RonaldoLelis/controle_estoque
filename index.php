<?php
	session_start();
	include 'conexao.php';
	
	$result = $con->query("SELECT * FROM estoque_desk");

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Estoque</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">	

</head>

<body>

<div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
					<div class="logo">
                    <a href="#">
                        <img src="images/logo.png"/>
                    </a>
					</div>
                <li class="sidebar-brand">			
                </li>
                <li>
                    <a href="#">Página Inicial</a>
                </li>
                <li>
                    <a href="produtos.php">Produtos</a>
                </li>                
                <li>
                    <a href="entrada.php">Entrada</a>
                </li>                
                <li>
                    <a href="saida.php">Saída</a>
                </li>
				<li>
                    <a href="categorias.php">Categorias</a>
                </li>
				<li>
                    <a href="fornecedores.php">Fornecedores</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

<!-- Page Content -->
<div id="page-content-wrapper">
	<div class="container-fluid">
				   
		<div class="topo2">
			<div class="banner">
				<div class="bannerinterior">
					<div class="banneresquerda">							
						<div class="frase1">
						<input type="button" onclick="mudarNome()" value="Abrir Menu" href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">
						&nbsp Controle de Estoque D'Lélis
						</div>
					</div>
					<div class="bannerdireita">
						<img src="images/caixas.png" width= "200px" height= "145px"/> 
					</div>
				</div>
			</div>
			
			<div class="conteudo">
					<div class="conteudointerno">
						<br>
						<div class="fotos">
							<div class="foto1">
								<img src="images/produtos_bd.jpg" width= "180px" height= "180px" Style="border-radius: 10px;"/><br><br>
								<h5 style="text-align: center;"><strong>Produtos Cadastrados</strong></h5>						
								<h1 size="7" style="text-align: center;"><strong>17</strong></h1>
							</div>
							
							<div class="foto2">
								<img src="images/categoria.png" width= "180px" height= "180px" Style="border-radius: 10px;"/><br><br>
								<h5 style="text-align: center;"><strong>Categorias Cadastradas</strong></h5>
								<h1 style="text-align: center;"><strong>5</strong></h1>
							</div>
							
							<div class="foto3">
								<img src="images/requisicao.png" width= "180px" height= "180px" Style="border-radius: 10px;"/><br><br>
								<h5 style="text-align: center;"><strong>Requisições</strong></h5>
								<h1 style="text-align: center;"><strong>32</strong></h1>
							</div>						
							
							<div class="foto4">
								<div class="fundo">								
								<img src="images/fornecedor.png" width= "180px" height= "180px" Style="border-radius: 10px;"/><br>
								</div><br>
								<h5 style="text-align: center;"><strong>Fornecedores</strong></h5>
								<h1 style="text-align: center;"><strong>7</strong></h1>
							</div>
						</div><br>
					</div>	
				<div class="rodape">
						<p>Controle de Estoque - São José dos Campos-SP  -  ₢lelisdesigner 2018</p>
				</div>
						
			</div><br>
						
		</div><br>   
				
	</div>			
</div>
<!-- /#page-content-wrapper -->

</div>
    <!-- /#wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
	<script>
	function mudarNome()
	{
	 if(document.getElementById("menu-toggle").value == "Fechar Menu")
	 {
	  document.getElementById("menu-toggle").value = "Abrir Menu";
	 } 
	 else
	 {
	  document.getElementById("menu-toggle").value = "Fechar Menu";
	 }
	}
	</script>
	

</body>

</html>
