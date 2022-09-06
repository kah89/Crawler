<script src="static/js/jquery.js"></script>
<style>
nav {
    margin-bottom: 15px;
}

H2 {
    text-align: center;
    margin-top: 10px;
    margin-bottom: 10px;
}

.dropdown-toggle {
    margin-right: 0;
}

button {
    margin-top: 20px;
}
</style>
<div id="lista_usuarios" class="w3-margin">
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #9c1d1c;">
        <a class="navbar-brand" href="<?= \base_url('/article/listArticle') ?>"
            style="color: #ffffff; margin-left:10px; margin-right:80%">Devnology </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado"
            aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
            <ul class="navbar-nav my-2 my-lg-0">
                <li class="nav-item dropdown my-2 my-lg-0">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #ffffff;">
                        Usuário
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Editar</a>
                        <a href='./logout' class="dropdown-item">Sair</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <h2>Editar Link de Artigos</h2>

    <?php if (isset($validation)) : ?>
    <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
    <?php endif; ?>

    <form id="form-inscricao" class="form-signin" method="post">

        <div>
            <label>Nome</label>
            <input type="text" class="w3-input w3-block w3-border" name="NOME" value="<?php echo $data['NOME']?>">
        </div>

        <div>
            <label>Link</label>
            <input type="text" class="w3-input w3-block w3-border" name="LINK" value="<?php echo $data['LINK']?>">
        </div>


        <div>
            <button class="btn btn-success btn-lg active" type="submit">Gravar</button>
            <button class="btn btn-danger btn-lg active" type="reset">Cancelar</button>
            <a href="<?= \base_url('/Article/listArticle') ?>"><button class="btn btn-outline-info btn-lg"
                    type="button">voltar</button></a>
        </div>
    </form>

</div>
