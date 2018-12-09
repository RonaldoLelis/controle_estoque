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
	<link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        
    </style>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>

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
                    <a href="index.php">Página Inicial</a>
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
                    <a href="#">Fornecedores</a>
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
					<?php
					if(isset($_SESSION['msg'])){
						echo $_SESSION['msg'];
						unset($_SESSION['msg']);
					}
					?>
					
				<div class="row">
					<br>
					<h2>Cadastrar Empresa</h2>
					<form method="POST" action="grava_fornecedor.php" enctype="multipart/form-data">
					
						<div class="panel-group" id="accordion">
						
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordion" href="#collapseDadosGerais">
											Dados Gerais
										</a>
									</h4>
								</div>
								
								<div id="collapseDadosGerais" class="panel-collapse collapse in">
									<div class="panel-body">
										<div class="row">
										  <div class="col-xs-8">
										  <div class="form-group">
											<label>Nome</label>
											<input type="text" class="form-control" id="nome_empresa" name="nome_empresa" placeholder="nome da empresa">
										  </div>
										  </div>
										  
										  <div class="col-xs-4">
										  <div class="form-group">
											<label>CNPJ</label>
											<input type="text" class="form-control" id="cnpj" name="cnpj" placeholder="CNPJ">
										  </div>
										  </div>
										</div>
										  
										  <div class="form-group">
											<label>Apresentacao</label>
											<textarea name="apresentacao" class="form-control" rows="3"></textarea>
										  </div>
										
									</div>
								</div>
							</div>
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordion" href="#collapseLocalizacao">
											Localização
										</a>
									</h4>
								</div>
								
								<div id="collapseLocalizacao" class="panel-collapse collapse in">
									<div class="panel-body">   
										  
										<div class="row">
										
											<div class="col-xs-10">
												<label>Logradouro</label>
												<input type="text" class="form-control" id="logradouro" name="logradouro" placeholder="nome da Rua \ Avenida">                                
											</div>
											
											<div class="col-xs-2">
												<label>Número</label>
												<input type="text" id="numero" name="numero" class="form-control">
											</div>
											
											<div class="col-xs-6">
												<label>Complemento</label>
												<input type="text" class="form-control" id="complemento" name="complemento">                               
											</div>
											
											<div class="col-xs-6">
												<label>Bairro</label>
												<input type="text" class="form-control" id="bairro" name="bairro">                               
											</div>
											
											<div class="col-xs-6">
												<label>Cidade</label>
												<input type="text" class="form-control" id="cidade" name="cidade">                               
											</div>
											
											<div class="col-xs-6">
												<label>Estado</label>
												<input type="text" class="form-control" id="estado" name="estado">                               
											</div>
											
										</div>
										
									</div>
								</div>
												
						  
							</div>
						
							<div class="panel panel-default">			
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordion" href="#collapseSocial">
											Contatos:
										</a>
									</h4>
								</div>
								<div id="collapseSocial" class="panel-collapse collapse in">
									<div class="panel-body">		
										<div class="row">
							
											<div class="col-xs-6">			
												<label>Site</label>
												<input type="text" class="form-control" id="site" name="site">		
											</div>
											
											<div class="col-xs-6">			
												<label>facebook</label>
												<input type="text" class="form-control" id="facebook" name="facebook">		
											</div>
										</div>
										
										<div class="row">
										
											<div class="col-xs-5">			
												<label>Telefone:</label>
												<input type="text" class="form-control" id="telefone" name="telefone">		
											</div>
											
											<div class="col-xs-2">			
												<label>Falar com:</label>
												<input type="text" class="form-control" id="falar_com" name="falar_com">		
											</div>
											
											<div class="col-xs-5">			
												<label>E-mail</label>
												<input type="email" class="form-control" id="email" name="email">		
											</div>							
										</div>	
									</div>
								</div>
							</div>
									
						<!-- panel-group -->               
						</div>
						
						<br/>
						<button type="submit" class="btn btn-success">Salvar</button>
						
					</form>
					
				</div>
				<div class="rodape">
						<p>Controle de Estoque - São José dos Campos-SP  -  ₢lelisdesigner 2018</p>
				</div>
								
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
