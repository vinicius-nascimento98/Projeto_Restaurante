function habilita_div(selecao){

	$("#bebida").css("display","none");
	$("#vinho").css("display","none");
	$("#ingrediente").css("display","none");
	$("#qtd").css("display","none");
	
	if($(selecao).val()=="drink" || $(selecao).val()=="prato"){
		$("#ingrediente").css("display","block");
		$("#qtd").css("display","block");
	}
	else{
		$("#"+$(selecao).val()).css("display","block");
	}
	//console.log($(selecao).val());
	
}