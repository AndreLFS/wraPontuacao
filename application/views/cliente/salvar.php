<section class="invoice">
	<div class="row">
		<div class="col-xs-12">
			<h2 class="page-header">
				<i class="fa fa-globe"></i>Cadastrar Cliente
			</h2>
		</div>
	</div>
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
	<form action="<?php echo base_url('cliente/salvar');?>" name="form_add" method="post">
		<div class="row row invoice-info">
			<div class="col-sm-8 invoice-col">
				<b>Informações Pessoais</b>
			</div>
		</div>
		<div class="row row invoice-info">
			<div class="col-sm-8 invoice-col">
				<div class="input-group">
					<span class="input-group-addon">Nome</span>
					<input type="text" class="form-control" name="nome">
				</div>        
			</div>
			<div class="col-sm-4 invoice-col">
				<div class="input-group">
					<span class="input-group-addon">Cpf</span>
					<input type="text" class="form-control" name="cpf">
				</div>
			</div>
		</div>
		<div class="row invoice-info">
			<div class="col-sm-4 invoice-col">
				<div class="input-group">
					<span class="input-group-addon">Praça</span>
					<select class="form-control" name = "praca">
						<?php echo $select_praca; ?>
					</select>
				</div>
			</div>
			<div class="col-sm-4 invoice-col">
				<div class="input-group">
					<span class="input-group-addon">Rua</span>
					<input type="text" class="form-control" name="rua">
				</div>
			</div>
			<div class="col-sm-4 invoice-col">
				<div class="input-group">
					<span class="input-group-addon">Numero</span>
					<input type="text" class="form-control" name="numero">
				</div>
			</div>
		</div>
		<div class="row invoice-info">
			<div class="col-sm-4 invoice-col">
				<div class="input-group">
					<span class="input-group-addon">Bairro</span>
					<input type="text" class="form-control" name="bairro">
				</div>
			</div>
			<div class="col-sm-4 invoice-col">
				<div class="input-group">
					<span class="input-group-addon">cidade</span>
					<input type="text" class="form-control" name="cidade">
				</div>
			</div>
			<div class="col-sm-4 invoice-col">
				<div class="input-group">
					<span class="input-group-addon">estado</span>
					<input type="text" class="form-control" name="estado">
				</div>
			</div>
		</div>
		<div class="row no-print">
			<div>
				<button type="submit" class="btn btn-success pull-right" style="margin-left: 5px"><i class="fa fa-chevron-down" name="salvar">
				</i>Cadastrar
			</button>
			<button type="reset" class="btn btn-warning pull-right">
				<i class="fa fa-eraser"></i> Limpar Campos
			</button>
		</div>
	</div>
</form>
</section>