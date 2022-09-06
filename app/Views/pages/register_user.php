<script src="static/js/jquery.js"></script>

<div id="lista_usuarios" class="w3-margin">

  <h4>Cadastro de usuários</h4>

  <?php if (isset($validation)) : ?>
    <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
  <?php endif; ?>
  <form id="form-inscricao" method="POST" action="../User/save">
    <div>
      <label>Nome</label>
      <input type="text" class="w3-input w3-block w3-border" name="NOME_COMPLETO">
    </div>

    <div>
      <label>Login</label>
      <input type="text" class="w3-input w3-block w3-border" name="LOGIN">
    </div>

    <div>
      <label>Senha</label>
      <input type="password" class="w3-input w3-block w3-border" name="SENHA">
    </div>



    <button class="btn btn-success btn-lg active" type="submit">Gravar</button>
    <button class="btn btn-danger btn-lg active" type="reset">Cancelar</button>
  </form>

</div>