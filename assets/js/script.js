function escreverNaTela(praca, vendedora, base_url){
	var idPraca = praca.value;
	$.post(base_url+'ajax/vendedora/getVendedoraPraca', {
		idPraca : idPraca
	}, function(data){
		$('#vendedora').html(data);
		$('#vendedora').removeAttr('disabled');
	});
	
}