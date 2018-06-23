	function controleEstoque(operacao){
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

function editar(nome_coluna, id, tabela, prefixo, td, linha){
	
	
	var elemento = $(td);
	console.log(elemento);
	
	var valor = $(elemento).text();
	$(elemento).prop('onclick', null).off('click');
	
	vetUnidade = ["kg", "l", "ml", "g", "un", "cx", "gl"];
	console.log(td);
	if(vetUnidade.indexOf(valor) != -1){
		entrada = "<select name='unid' onchange=\"salvarEdicao('"+nome_coluna+"', '"+id+"','"+tabela+"','"+prefixo+"' ,"+linha+" , this.value)\"><option value='l'>L</option><option value='ml'>Ml</option><option value='kg'>Kg</option><option value='g'>G</option><option value='un'>Un</option><option value='cx'>Cx</option><option value='gl'>Gl</option></select>";
	}
	else if(isNaN(valor)){
		entrada = "<input class='edicao' type='text' onblur=\"salvarEdicao('"+nome_coluna+"', '"+id+"','"+tabela+"','"+prefixo+"' ,"+linha+" , this.value)\" name='"+nome_coluna+"' value='"+valor+"'/>";
	}else{
		entrada = "<input class='edicao' type='number' onblur=\"salvarEdicao('"+nome_coluna+"', '"+id+"','"+tabela+"','"+prefixo+"' ,"+linha+" , this.value)\" name='"+nome_coluna+"' value='"+valor+"'/>";
	}
	
	
	$(elemento).empty();
	
	//console.log($(altera).text());
	$(elemento).append(entrada)
				.append("<input class='edicao' type='hidden' name='"+prefixo+'_'+tabela+"' value='"+id+"'/>")
				.append("<input class='edicao' type='hidden' name='tabela' value='"+tabela+"'/>");
}

function salvarEdicao(nome_coluna, id, tabela, prefixo, linha, valor){
	var url = "http://localhost/Projeto_Restaurante";
	var elemento = $("tbody tr");
	var td = $(elemento[linha]).find('.'+nome_coluna);
	
	console.log(td);
	$(td).empty();
	var objeto = {"tabela": tabela, "chave_tabela":id , "prefixo_chave": prefixo};
	objeto[nome_coluna] = valor;
	$.post(url + "/Altera.php",objeto).done(function (data){
				
			}).fail(function(data){
				alert("ERRO!!");
			});
	/*		
		//Desabilitando input
		$(elemento).empty();
	
	//console.log($(altera).text());*/	
	$(td).append(valor);
	//$(td).prop('onclick', true).on('click');
		
}

