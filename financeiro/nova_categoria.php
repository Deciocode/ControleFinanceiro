<?php

    // ===== Requisição de Sessão Criada! =====
    require_once './DAO/UtilDAO.php';
    UtilDAO::VerificarLogado();
    // == Final da Requisição de Sessão Criada! ==

    require_once './DAO/CategoriaDAO.php';

    if(isset($_POST['btnSalvar'])){
        $nomeCat = trim($_POST['nomeCat']);

        $objDAO = new CategoriaDAO();
        $ret = $objDAO->CadastrarCategoria($nomeCat);
    }

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php include_once '_head.php'; ?>
<body>
    <div id="wrapper">
        <?php
            include_once '_topo.php';
            include_once '_menu.php';
        ?>
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Cadastrar Categoria Financeira.</h2>
                        <h5>Aqui você pode cadastrar todas as suas Categorias Financeiras.</h5>
                        <?php include_once '_msg.php' ?>
                    </div>
                </div>
                <hr/>
                <form action="nova_categoria.php" method="POST">
                    <div class="form-group">
                        <label>Digite o Nome da Categoria:</label>
                        <input class="form-control" placeholder="Digite o Nome da Categoria aqui..." name="nomeCat" id="nomeCat" value="<?= isset($nomeCat) ? $nomeCat : '' ?>"/>
                    </div>
                    <button class="btn btn-success" name="btnSalvar" onclick="return ValidarCategoria()">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>