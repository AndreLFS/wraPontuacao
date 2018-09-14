<section class="invoice">
	<?php if (!empty($msg)): ?>
		<div class="alert alert-success" role="alert" style="margin-top: 10px;">
			<?php echo $msg; ?>
		</div>
	<?php endif; ?>
	<?php if (!empty($erro)): ?>
		<div class="alert alert-danger" role="alert" style="margin-top: 10px;">
			<?php echo $erro; ?>
		</div>
	<?php endif; ?>
		<div class="row row invoice-info">
			<div class="col-sm-8 invoice-col">
				<b>Visualizar Informações Pessoais</b>
			</div>
		</div>
		<div class="row row invoice-info">
			<div class="col-sm-12 invoice-col">
				<div class="input-group">
					<span class="input-group-addon">Nome</span>
					<input type="text" disabled class="form-control" name="nome" value="<?php echo $cliente->nome;?>">
				</div>        
			</div>
		</div>
		<div class="row invoice-info">
			<div class="col-sm-4 invoice-col">
				<div class="input-group">
					<span class="input-group-addon">Cpf</span>
					<input type="text" disabled class="form-control" name="cpf" value="<?php echo $cliente->cpf;?>">
				</div>
			</div>
			<div class="col-sm-4 invoice-col">
				<div class="input-group">
					<span class="input-group-addon">Rua</span>
					<input type="text" disabled class="form-control" name="rua" value="<?php echo $cliente->rua; ?>">
				</div>
			</div>
			<div class="col-sm-4 invoice-col">
				<div class="input-group">
					<span class="input-group-addon">Numero</span>
					<input type="text" disabled class="form-control" name="numero" value="<?php echo $cliente->numero; ?>">
				</div>
			</div>
		</div>
		<div class="row invoice-info">
			<div class="col-sm-4 invoice-col">
				<div class="input-group">
					<span class="input-group-addon">Bairro</span>
					<input type="text" disabled class="form-control" name="bairro" value="<?php echo $cliente->bairro; ?>">
				</div>
			</div>
			<div class="col-sm-4 invoice-col">
				<div class="input-group">
					<span class="input-group-addon">cidade</span>
					<input type="text" disabled class="form-control" name="cidade" value="<?php echo $cliente->cidade; ?>">
				</div>
			</div>
			<div class="col-sm-4 invoice-col">
				<div class="input-group">
					<span class="input-group-addon">estado</span>
					<input type="text" disabled class="form-control" name="estado" value="<?php echo $cliente->estado; ?>">
				</div>
			</div>
		</div>
</section>