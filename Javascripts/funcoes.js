function controleEstoque(operacao){
	var dados = [];
	var elemento = $("tr");
	
	for(var pos = 0; pos < elemento.length; pos++){

		//var texto = $(elemento[pos]).find('.valorAlteraEstoque input').val();
		
		var texto2 = $(elemento[pos]).find('.estoque input').val();
		
		//console.log(texto);
		console.log(texto2);
	}
	
	/*
	for(var pos = 0; pos < $elemento.length; pos++){
		input = $elemento[pos];
		
		//dados.push($elemento[pos].find('input').val());
		console.log(input.find("input [type='number']"));
	}*/
	console.log(dados);
}