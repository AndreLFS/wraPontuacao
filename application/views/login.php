<div class="container">
      <form class="form-signin" role="form" method="post" action="<?= base_url('login/entrar') ?>">
        <h2 class="form-signin-heading">Por favor, logue-se</h2>
        <input type="text" class="form-control" placeholder="Email address" required autofocus name="login">
        <input type="password" class="form-control" placeholder="Password" required name="senha">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Fazer login</button>
        <?php if (!empty($erro)): ?>
           <div class="alert alert-danger" role="alert" style="margin-top: 10px;"><?= $erro; ?></div>
        <?php endif; ?>
      </form>
  </div>    