function controleEstoque(operacao){
	var dados = [];
	var elemento = $("tr");
	var contErro = 0;
	var msgErro = "Os seguintes produtos possuem descarte maior que estoque atual: ";
	var url = "http://localhost/Projeto_Restaurante";	

	
	for(var pos = 1; pos < elemento.length; pos++){
		
		var alteraEstoque = $(elemento[pos]).find('.valorAlteraEstoque input[type="number"]').val();
		
		var estoqueAtual = $(elemento[pos]).find('.estoque').text();
		
		var novoEstoque = parseFloat(estoqueAtual) + operacao * parseFloat(alteraEstoque);
		
		var id_produto = $(elemento[pos]).find('.id_produto input').val();
		
		var tabela =  $(elemento[pos]).find('.tabela input').val();	
		
		if(novoEstoque < 0){
			contErro++;
			msgErro += "\n - " + $(elemento[pos]).find('.nome_ingrediente').text();
			
		}
		else{
			
			$(elemento[pos]).find('.estoque').text(novoEstoque);
			$.post(url + "/Altera.php",
			{tabela: tabela, chave_tabela: id_produto, estoque: novoEstoque})
			.done(function (data){
				console.log(data);
			}).fail(function(data){
				alert("ERRO!!");
			});
		}
		$(elemento[pos]).find('.valorAlteraEstoque input').val(0);
		
	}
	if(contErro > 0){
		alert(msgErro);
	}
}