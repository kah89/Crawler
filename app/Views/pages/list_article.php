<style>
table {
    border-collapse: collapse;
    width: 100%;
}

th,
td {
    text-align: left;
    padding: 8px;
    border-bottom: 1px solid #ddd;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

.fas {
    margin-left: 8px;
}

nav {
    margin-bottom: 15px;
}

H2 {
    text-align: center;
    margin-top: 10px;
    margin-bottom: 10px;
}
</style>
<script>
function confirma() {
    if (!confirm("Deseja Excluir?")) {
        return false;
    }
    return true;
}


$(function() {
    $("#myTable input").keyup(function() {
        var index = $(this).parent().index();
        var nth = "#myTable td:nth-child(" + (index + 1).toString() + ")";
        var valor = $(this).val().toUpperCase();
        $("#myTable tbody tr").show();
        $(nth).each(function() {
            if ($(this).text().toUpperCase().indexOf(valor) < 0) {
                $(this).parent().hide();
            }
        });
    });

    $("#myTable input").blur(function() {
        $(this).val("");
    });
});
</script>
<script src="static/js/jquery.js"></script>

<div id="lista_usuarios" class="w3-margin">

    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #9c1d1c;">
        <a class="navbar-brand" href="<?= \base_url('/article/listArticle') ?>" style="color: #ffffff; margin-left:10px; margin-right:100px">Devnology </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado"
            aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('Article/saveArticle'); ?>"
                        style="color: #ffffff;">Cadastrar Link</a>
                </li>

            </ul>
            <form class="form-inline my-2 my-lg-0 mr-auto">
                <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit"
                    style="color: #ffffff;">Pesquisar</button>
            </form>
            <ul class="navbar-nav ">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #ffffff;">
                        Usuário
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <!-- <a class="dropdown-item" href="./editar_usuarios/">Editar</a> -->
                        
                        <a class="dropdown-item" href="../User/edit/">Editar</a>
                        
                        <a href='../User/logout' class="dropdown-item">Sair</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <table id="myTable">
        <h2>Artigos de Tecnologia</h2>
        <thead>
            <tr>
                <th>Nome</td>
                <th>Link</td>
                <th>Opções</td>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($data) && is_array($data)):?>
            <?php foreach ($data as $artigo): ?>
            <tr>
                <td><?php echo $artigo['NOME'] ?></td>
                <td><?php echo $artigo['LINK'] ?></td>
                <td><a href='./deleteArticle/<?php echo $artigo['ID_ARTIGOS'] ?>' onclick="return confirma()"><i
                            class="fas fa-trash" style="color: red"></i></a>

                    <a href='./editArticle/<?php echo $artigo['ID_ARTIGOS'] ?>'><i class="fas fa-edit"
                            style="color: blue"></i></a>
                </td>
            </tr>
            <?php endforeach ?>
            <?php endif ?>
        </tbody>
    </table>

</div>