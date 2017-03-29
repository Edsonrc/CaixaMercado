$(function(){
	//Pesquisar os cursos sem refresh na página
	$("#pesquisa").keyup(function(){
		
		var codigo = $(this).val();
		
		//Verificar se há algo digitado
		if(codigo != ''){
			var dados = {
				numero : codigo
			}		
			$.post('index.php?pg=views/js/busca', dados, function(retorna){
				//Mostra dentro da ul os resultado obtidos 
				$(".resultado").html(retorna);
			});
		}else{
			$(".resultado").html('');
		}		
	});
});