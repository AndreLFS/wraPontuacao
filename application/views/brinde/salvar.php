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
	<form action="<?php echo base_url('brinde/salvar');?>" name="form_add" method="post" enctype="multipart/form-data">
		<div class="row row invoice-info">
			<div class="col-sm-8 invoice-col">
				<b>Informações do Brinde</b>
			</div>
		</div>
		<div class="row row invoice-info">
			<div class="col-sm-4 invoice-col">
				<div class="input-group">
					<span class="input-group-addon">Titulo</span>
					<input type="text" class="form-control" name="titulo">
				</div>        
			</div>
			<div class="col-sm-4 invoice-col">
				<div class="input-group">
					<span class="input-group-addon">Pontuação Necessaria</span>
					<input type="text" class="form-control" name="pontuacao">
				</div>
			</div>
			<div class="col-sm-4 invoice-col">
				<div class="input-group">
					<span class="input-group-addon">Data Limite</span>
					<input type="date" class="form-control" name="dataLimite">
				</div>
			</div>
		</div>
		<div class="row invoice-info">
			<div class="col-sm-12 invoice-col">
				<div class="form-group">
                  <textarea style="resize: none" class="form-control" rows="5" placeholder="Descrição do brinde" name=" descricao"></textarea>
            </div>
			</div>
		</div>
		<div class="row invoice-info">
			<div class="col-sm-12 invoice-col">
				<div class="form-group">
			            <label for="add_foto">Fotos do anúncio:</label>
			            <input type="file" name="fotos"/><br />
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