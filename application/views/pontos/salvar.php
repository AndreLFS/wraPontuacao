<section class="invoice">
	<div class="row">
		<div class="col-xs-12">
			<h2 class="page-header">
				<i class="fa fa-globe"></i>Cadastrar Brinde
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
	<form action="<?php echo base_url('pontos/salvar');?>" name="form_add" method="post">
		<div class="row row invoice-info">
			<div class="col-sm-8 invoice-col">
				<b>Informar Pontuaçãp</b>
			</div>
		</div>
		<div class="row row invoice-info">
			<div class="col-sm-6 invoice-col">
				<div class="input-group">
					<span class="input-group-addon">Praça</span>
					<select class="form-control" onchange="escreverNaTela(this, document.getElementById('vendedora'), '<?php echo base_url() ?>')">
						<?php echo $praca ?>
					</select>
				</div>        
			</div>
			<div class="col-sm-6 invoice-col">
				<div class="input-group">
					<span class="input-group-addon">Cliente</span>
					<select disabled="" class="form-control" id="vendedora" name="cliente">
						<option> Selecione uma Praça</option>
					</select>
				</div>
			</div>
			
		</div>
		<div class="row invoice-info">
			<div class="col-sm-4 invoice-col">
				<div class="input-group">
					<span class="input-group-addon">Numero de Pontos</span>
					<input type="number" class="form-control" name="quantidade">
				</div>
			</div>
			<div class="col-sm-4 invoice-col">
				<div class="input-group">
					<span class="input-group-addon">Data</span>
					<input type="date" class="form-control" name="data">
				</div>
			</div>
			<div class="col-sm-4 invoice-col">
				<div class="input-group">
					<span class="input-group-addon">Descricao</span>
					<input type="text" class="form-control" name="descricao">
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