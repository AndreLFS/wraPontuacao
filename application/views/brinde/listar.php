<section class="invoice">
  <div class="row">
    <div class="col-xs-12">
      <h2 class="page-header">
        <i class="fa fa-globe"></i>Brindes Cadastrados
      </h2>
    </div>     
    <div class="box-tools">
      <div class="input-group input-group-sm" style="width: 150px;">
        <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
        <div class="input-group-btn">
          <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
        </div>
      </div>
    </div>
  </div>
  <div class="box-body table-responsive no-padding">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>Titulo</th>
          <th>Pontuação</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php echo $brindeTable;?>
      </tbody>
    </table>
  </div>
</section>