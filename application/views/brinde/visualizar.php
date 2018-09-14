<div class="row">
	<div class="col-sm-5">
		<div class="mainphoto">
			<img src="<?php echo base_url('uploads/pequenas/'.$brinde->imagem); ?>" width="100%"/>
		</div>
	</div>
	<div class="col-sm-7">
		<h2><?php echo $brinde->titulo; ?></h2>
		<hr/>
		<p><?php echo $brinde->descricao; ?></p>
		<hr/>
		
		Pontos Necessarios: <span class="original_price"><?php echo $brinde->pontuacao; ?></span>
		
		<form action="<?php echo base_url('loja/carrinho/'.$brinde->idBrinde);?>" >
			<input class="addtocart_submit" type="submit" value="Fazer o Pedido" />
		</form>
	</div>
</div>