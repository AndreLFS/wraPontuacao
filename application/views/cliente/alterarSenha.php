<section class="invoice">
	<div class="row">
		<div class="col-xs-12">
			<h2 class="page-header">
				<i class="fa fa-globe"></i>Alterar Senha
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
	<form action="<?php echo base_url('loja/senha');?>" name="form_add" method="post">
		<div class="row row invoice-info">
			<div class="col-sm-4 invoice-col">
				<div class="input-group">
					<span class="input-group-addon">Senha Atual</span>
					<input type="password" class="form-control" name="senhaAtual">
				</div>        
			</div>
			<div class="col-sm-4 invoice-col">
				<div class="input-group">
					<span class="input-group-addon">Nova senha</span>
					<input type="password" class="form-control" name="nova">
				</div>
			</div>
			<div class="col-sm-4 invoice-col">
				<div class="input-group">
					<span class="input-group-addon">Repetir nova senha</span>
					<input type="password" class="form-control" name="confirmar">
				</div>
			</div>
		</div>
		<div class="row no-print">
			<div>
				<button type="submit" class="btn btn-success pull-right" style="margin-left: 5px"><i class="fa fa-chevron-down" name="salvar">
				</i>Salvar
			</button>
			<button type="reset" class="btn btn-warning pull-right">
				<i class="fa fa-eraser"></i> Limpar Campos
			</button>
		</div>
	</div>
</form>
</section>