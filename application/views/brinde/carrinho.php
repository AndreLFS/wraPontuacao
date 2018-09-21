<h1>Carrinho de Compras</h1>

<table border="0" width="100%">
	<tr>
		<th width="100">Imagem</th>
		<th>Nome</th>
		<th width="120">Pontos</th>
	</tr>
	<tr>
		<td><img src="<?php echo base_url('uploads/pequenas/'.$brinde->imagem); ?>" width="80%"/></td>
		<td><?php echo $brinde->titulo; ?></td>
		<td><?php echo $brinde->pontuacao; ?></td>
	</tr>

	<form action="<?php echo base_url('loja/pedido/'.$brinde->idBrinde);?>" >
			<input class="addtocart_submit" type="submit" value="Fazer o Pedido" />
		</form>
</table>