<?php

include_once './conexao.php';

$nome_prod = filter_input(INPUT_GET, 'nome_prod', FILTER_SANITIZE_STRING);
if(!empty($nome_prod)){
    
    $limit = 1;
    $result_pesquisa = "SELECT * FROM produtos WHERE nome_prod =:nome_prod LIMIT :limit";
    
    $resultado_prod = $con->prepare($result_pesquisa);
    $resultado_prod->bindParam(':nome_prod', $nome_prod, PDO::PARAM_STR);
    $resultado_prod->bindParam(':limit', $limit, PDO::PARAM_INT);
    $resultado_prod->execute();
    
    $array_valores = array();
    
    if($resultado_prod->rowCount() != 0){
        $row_prod = $resultado_prod->fetch(PDO::FETCH_ASSOC);
        $array_valores['qtde_prod'] = $row_prod['qtde_prod']; 
        $array_valores['categoria_id'] = $row_prod['categoria_id']; 
    }else{
        $array_valores['qtde_prod'] = 'Valor não encontrado';        
    }
    echo json_encode($array_valores);
}