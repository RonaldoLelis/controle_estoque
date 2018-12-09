$(document).ready(function () {
    $("select[name='nome_prod']").blur(function () {
        var $qtde_prod = $("input[name='qtde_prod']");
        var $categoria_id = $("input[name='categoria_id']");
        var nome_prod = $(this).val();
        
        $.getJSON('pesquisar.php', {nome_prod},
            function(retorno){
                $qtde_prod.val(retorno.qtde_prod);
                $categoria_id.val(retorno.categoria_id);
            }
        );        
    });
});