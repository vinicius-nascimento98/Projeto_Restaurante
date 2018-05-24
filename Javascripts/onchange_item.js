function habilita_div(selecao){

	$('selecao').value
	document.getElementById("bebida").style.display="none";
	document.getElementById("vinho").style.display="none";
	document.getElementById("prato").style.display="none";
	document.getElementById("drink").style.display="none";
	
	document.getElementById(selecao.value).style.display="block";
	
}