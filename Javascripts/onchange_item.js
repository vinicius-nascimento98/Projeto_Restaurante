function habilita_div(selecao){

	$('selecao').val();
	$("#bebida").css("display","none");
	$("#vinho").css("display","none");
	$("#prato").css("display","none");
	$("#drink").css("display","none");
	
	$(selecao.val).css("display","block");
	
	console.log($(selecao).val());
	/*if(selecao == "bebida"){
		document.getElementById("bebida").style.display = "block";	
	}*/
	
}