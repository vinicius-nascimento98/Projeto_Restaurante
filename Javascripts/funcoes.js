function controleEstoque(operacao){
	//var dados = [];
	var elemento = $("tbody tr");
	var contErro = 0;
	var msgErro = "Os seguintes produtos possuem descarte maior que estoque atual: ";
	var url = "http://localhost/Projeto_Restaurante";	

	
	for(var pos = 0; pos < elemento.length; pos++){
		
		var alteraEstoque = $(elemento[pos]).find('.valorAlteraEstoque input[type="number"]').val();
		
		var estoqueAtual = $(elemento[pos]).find('.estoque').text();
		
		var novoEstoque = parseFloat(estoqueAtual) + parseInt(operacao) * parseFloat(alteraEstoque);
		
		var id_produto = $(elemento[pos]).find('.id_produto input').val();
		
		var prefixo =  $(elemento[pos]).find('.prefixo').val();
		
		var tabela =  $(elemento[pos]).find('.tabela input').val();	
		
		if(novoEstoque < 0){
			contErro++;
			msgErro += "\n - " + $(elemento[pos]).find('.nome_ingrediente').text();
			
		}
		else{
			
			$(elemento[pos]).find('.estoque').text(novoEstoque);
			$.post(url + "/Altera.php",
			{tabela: tabela, chave_tabela: id_produto, prefixo_chave: prefixo,estoque: novoEstoque })
			.done(function (data){
				
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

function editar(nome_coluna, id, tabela, prefixo, td){
	var elemento = $(td);
	
	var valor = $(elemento).text();
	$(elemento).off('click');
	
	$(elemento).empty();
	
	//console.log($(altera).text());
	$(elemento).append("<input class='edicao' type='text' onblur='salvarEdicao()' name='"+nome_coluna+"' value='"+valor+"'/>")
				.append("<input class='edicao' type='hidden' name='"+prefixo+'_'+tabela+"' value='"+id+"'/>")
				.append("<input class='edicao' type='hidden' name='tabela' value='"+tabela+"'/>");
}

function salvarEdicao(){
	var nome = $($(elemento)).find('.edicao').text();
	console.log(nome);
	$.post(url + "/Altera.php",
			//arrumar.
			{tabela: tabela, chave_tabela:id , prefixo_chave: prefixo })
	
}