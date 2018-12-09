<?php
	session_start();
	include ("conexao.php");	
	
	$consulta = $con->query("SELECT * FROM requisicoes");
	
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Estoque</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/simple-sidebar.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="personalizado.js"></script>
	<script language="Javascript">
		function edt_id(id)
		{
		  window.location.href='editar_categoria.php?edit_id='+id;
		}
		function confirma_excluir(id) {
			 var resposta = confirm("Deseja remover esse registro?");		 
			 if (resposta == true) {
				  window.location.href = "excluir_categoria.php?id="+id;
			 }
		}
	</script>
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
                    <a href="#">Saída</a>
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
					<?php
					if(isset($_SESSION['msg'])){
						echo $_SESSION['msg'];
						unset($_SESSION['msg']);
					}
					?>
					<div class="conteudointerno">
					<br><br>
					<div id="top" class="row">					
					<h3 class="col-md-4 control-label" for="termo">Solicitação de Material</h3>
					<button type="button" data-toggle="modal" data-target="#myModalcad" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>Nova Solicitação</button>
					</div> <!-- /#top -->
					<br>
						
						<!-- Inicio Modal -->
						<div class="modal fade" id="myModalcad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">				
								<h3 class="modal-title text-center" id="myModalLabel"><strong>Ficha de Requisições</strong></h3>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							</div>
							<div class="modal-body">
								<form method="POST" action="grava_requisicao_2.php" enctype="multipart/form-data">
									<div class="form-row">
										<div class="col-8">
											<div class="form-group">
												<label class="control-label requiredField" for="nome_prod">Material / Produto</label>			
												<select class="select form-control" id="nome_prod" name="nome_prod">
												<option value="">Selecione</option>			
												<?php
												$busca = $con->query("SELECT nome_prod FROM produtos");  
												while ($linha = $busca->fetch(PDO::FETCH_ASSOC)) { ?>
												<option value="<?php echo ($linha['nome_prod']);?>"><?php echo ($linha['nome_prod']);?></option>			
												<?php
												}	
												?>				
												</select>
											</div>
										</div>
										
										<div class="col">
											<div class="form-group">
											<label for="descricao">Solicitante</label>
											<input class="form-control" id="solicitante" name="solicitante" required type="text"/>
											</div>
										</div>
									</div>
										
									<div class="form-row">										
										<div class="col">
											<div class="form-group">
											<label for="descricao">Qtde Solicitada</label>
											<input class="form-control" id="qtde_solicitada" name="qtde_solicitada" required type="text"/>
											</div>
										</div>								
										
										<div class="col">
											<div class="form-group">
											<label for="qtde_prod">Qtde em Estoque</label>
											<input class="form-control" id="qtde_prod" name="qtde_prod" required type="text"/>
											</div>
										</div>
																	
										<div class="col">
											<div class="form-group">
											<label for="descricao">Categoria</label>
											<input class="form-control" id="categoria_id" name="categoria_id" required type="text"/>
											</div>
										</div>
									</div>
														
									<div class="modal-footer">
										<button type="submit" class="btn btn-success">Salvar Requisição</button>
									</div>
								</form>
							</div>
						</div>
						</div>
						</div>
						<!-- Fim Modal -->
						
						
						<div class="table-responsive col-md-12">
							<table class="table table-striped table-bordered table-hover">
							  <table class="table">
		  <thead>
			<tr>
			  <th scope="col">#</th>
			  <th scope="col">Solicitante</th>
			  <th scope="col">Material/Produto</th>
			  <th scope="col">Categoria</th>
			  <th scope="col">Qtde solicitada</th>
			  <th scope="col">Qtde em Estoque</th>
			  <th scope="col">Ações</th>
			</tr>
		  </thead>
		  <tbody>
		  
		  <?php 
			//while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
			//echo "ID: {$linha['id']} - Produto: {$linha['nome_prod']}<br />";

		  foreach($consulta AS $requisicao){ ?>
		  
			<tr>			  
				<td><?php echo $requisicao['id'];?></td>
				<td><?php echo $requisicao['solicitante'];?></td>
				<td><?php echo $requisicao['nome_prod'];?></td>
				<td><?php echo $requisicao['categoria_id'];?></td>
				<td><?php echo $requisicao['qtde_solicitada'];?></td>
				<td><?php echo $requisicao['qtde_prod'];?></td>				
				<td>
					<a href="javascript:edt_id('<?php echo $linha['id']; ?>')" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Editar</a>
					<button onClick="delete_id('<?php echo $linha['id']; ?>')" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</button>
				</td>
			</tr>
		  <?php }  ?>
		  
		  </tbody>
		</table>
							</table><br>
						</div>
						<br>
							<div class="rodape">
									<p>Controle de Estoque - São José dos Campos-SP  -  ₢lelisdesigner 2018</p>
							</div>
					</div><br>
				</div><br> 
			</div>
		</div><!-- /#container-fluid -->
	</div><!-- /#page-content-wrapper -->

</div><!-- /#wrapper -->

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
