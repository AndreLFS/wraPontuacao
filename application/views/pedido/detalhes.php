<br>
<div class="row">
	<div class="col-sm-6">
		<h2> Cliente: <?php echo $pedido->nome; ?> </h2>
		<hr/>
		<h2> Praca: <?php echo $pedido->pracaNome; ?> </h2>
		<hr/>
		<h2> Telefone: (89) 88999-8877<?php //echo $pedido->telefone; ?> </h2>
		<hr/>
		<h2> Status do Pedido: <?php echo $pedido->descricaoStatus; ?> </h2>
		<div class="row">
			<div class="col-sm-4">
				<?php if($pedido->status == 0):?>
					<form action="<?php echo base_url('pedido/confirmar/'.$pedido->idPedido);?>" >
						<input class="addtocart_submit" type="submit" value="Confirmar Pedido" />
					</form>
				<?php endif;?>
			</div>
		</div>
	</div>
	<div class="col-sm-6">
		<h2> Logradouro: <?php echo $pedido->rua; ?> </h2>
		<hr/>
		<h2> Numero: <?php echo $pedido->numero; ?> </h2>
		<hr/>
		<h2> Bairro: <?php echo $pedido->bairro; ?> </h2>
		<hr/>
		<h2> Cidade: <?php echo $pedido->cidade; ?> </h2>
		<hr/>
		<h2> Estado: <?php echo $pedido->estado; ?> </h2>
	</div>
</div>
<hr>
<div class="row">
	<div class="col-sm-3">
		<div class="mainphoto">
			<img src="<?php echo base_url('uploads/pequenas/'.$pedido->url); ?>" width="100%"/>
		</div>
	</div>
	<div class="col-sm-7">
		<h2><?php echo $pedido->titulo; ?></h2>
		<hr/>
		<p><?php echo $pedido->descricao; ?></p>
		<hr/>
		
		Golds Necessarios: <span class="original_price"><?php echo $pedido->pontuacao; ?></span>
	</div>
</div>