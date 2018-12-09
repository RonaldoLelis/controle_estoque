<?php
	session_start();
	include 'conexao.php';
	
	$consulta_prod = $con->query("SELECT * FROM produtos");

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
	<script language="Javascript">
		function edt_id(id)
		{
		  window.location.href='editar_produtos.php?edit_id='+id;
		}
		function confirma_excluir(id) {
			 var resposta = confirm("Deseja remover esse registro?");		 
			 if (resposta == true) {
				  window.location.href = "excluir_produtos.php?id="+id;
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
                    <a href="#">Produtos</a>
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
					<?php
					if(isset($_SESSION['msg'])){
						echo $_SESSION['msg'];
						unset($_SESSION['msg']);
					}
					?>
					<div class="conteudointerno">
					<br><br>
					<div id="top" class="row">					
					<h3 class="col-md-4 control-label" for="termo">Cadastro de Produtos</h3>
					<button type="button" data-toggle="modal" data-target="#myModalcad" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span>Novo Produto</button>
					</div> <!-- /#top -->
					<br>
						
						<!-- Inicio Modal -->
						<div class="modal fade" id="myModalcad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">				
								<h3 class="modal-title text-center" id="myModalLabel"><strong>Cadastrar Produtos</strong></h3>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							</div>
							<div class="modal-body">
								<form method="POST" action="grava_produto.php" enctype="multipart/form-data">
									<div class="form-row">
										<div class="col-3">
											<div class="form-group">
											<label for="nome_prod">Produto</label>
											<input class="form-control" id="nome_prod" name="nome_prod" required type="text"/>
											</div>
										</div>
										
										<div class="col-5">
											<div class="form-group">
											<label for="descricao_prod">Descrição</label>
											<input class="form-control" id="descricao_prod" name="descricao_prod" required type="text"/>
											</div>
										</div>
										
										<div class="col-2">
											<div class="form-group">
											<label for="qtde_prod">Quantidade</label>
											<input class="form-control" id="qtde_prod" name="qtde_prod" required type="text"/>
											</div>
										</div>
										<div class="col-2">
											<div class="form-group">
											<label class="control-label requiredField" for="categoria_id">Categoria</label>
											<select class="select form-control" id="categoria_id" name="categoria_id">
											<option value="">Selecione</option>			
											<?php
											$consulta = $con->query("SELECT * FROM categoria");
											foreach($consulta AS $row_result_categ){ ?>	
											<option value="<?php echo ($row_result_categ['nome']);?>"><?php echo ($row_result_categ['nome']);?></option>			
											<?php
											}	
											?>				
											</select>
											</div>
										</div>
									</div>
														
									<div class="modal-footer">
										<button type="submit" class="btn btn-success">Cadastrar</button>
									</div>
								</form>
							</div>
						</div>
						</div>
						</div>
						<!-- Fim Modal -->
						
						
						<div class="table-responsive col-md-12">
							<table class="table table-striped table-bordered table-hover">
							  <thead>
								<tr>
								  <th scope="col">#</th>
								  <th scope="col">Produto</th>
								  <th scope="col">Descrição</th>
								  <th scope="col">Categoria</th>
								  <th scope="col">Quantidade</th>
								  <th scope="col">Ações</th>
								</tr>
							  </thead>
							  <tbody>
							  
							  <?php
							  foreach($consulta_prod AS $linha){ ?>	  
								<tr>			  
									<td><?php echo $linha['id'];?></td>
									<td><?php echo $linha['nome_prod'];?></td>
									<td><?php echo $linha['descricao_prod'];?></td>
									<td><?php echo $linha['categoria_id'];?></td>
									<!--?php
									$result_categ = "SELECT * FROM categoria WHERE `nome` = " . $linha['categoria_id'];
									$resultado_categ = mysqli_query($con, $result_categ);
									foreach($resultado_categ AS $linha_categ){?>
									<td><!?php echo $linha['categoria_id'];?></td><!?php }  ?-->
									<td><?php echo $linha['qtde_prod'];?></td>
									<td>
										<a href="javascript:edt_id('<?php echo $linha['id']; ?>')" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Editar</a>
										<button onClick="confirma_excluir(<?php echo $linha['id']; ?>)"  class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</button>
									</td>
								</tr>
							  <?php }  ?>		  
							  </tbody>
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
