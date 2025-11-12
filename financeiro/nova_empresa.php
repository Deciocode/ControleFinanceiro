<?php

    // ===== Requisição de Sessão Criada! =====
    require_once './DAO/UtilDAO.php';
    UtilDAO::VerificarLogado();
    // == Final da Requisição de Sessão Criada! ==

    require_once './DAO/EmpresaDAO.php';

    if(isset($_POST['btnSalvar'])){
        $nomeEmp = trim($_POST['nomeEmp']);
        $telefone = trim($_POST['telefone']);
        $endereco = trim($_POST['endereco']);

        $objDAO = new EmpresaDAO();
        $ret = $objDAO->CadastrarEmpresa($nomeEmp, $telefone, $endereco);
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
                        <h2>Cadastrar Empresa.</h2>
                        <h5>Aqui você pode cadastrar todas as suas Empresas.</h5>
                        <?php include_once '_msg.php'; ?>
                    </div>
                </div>
                <hr/>
                <form action="nova_empresa.php" method="POST">
                    <div class="form-group">
                        <label>Digite o Nome da Empresa:</label>
                        <input class="form-control" placeholder="Digite o Nome da Empresa aqui..." name="nomeEmp" id="nomeEmp" value="<?= isset($nomeEmp) ? $nomeEmp : '' ?>"/>
                    </div>
                    <div class="form-group">
                        <label>Digite o Telefone (WhatsApp):</label>
                        <input class="form-control" placeholder="Digite o Telefone (WhatsApp) aqui..." name="telefone" id="telefone" value="<?= isset($telefone) ? $telefone : '' ?>"/>
                    </div>
                    <div class="form-group">
                        <label>Digite o Endereço:</label>
                        <input class="form-control" placeholder="Digite o Endereço aqui..." name="endereco" id="endereco" value="<?= isset($endereco) ? $endereco : '' ?>"/>
                    </div>
                    <button class="btn btn-success" name="btnSalvar" onclick="return ValidarEmpresa()">Salvar</button>
                </form>
            </div>
        </div>
    </div>

    <script src="assets/js/jquery-3.7.1.min.js"></script>
    <script src="assets/js/jquery.mask.min.js"></script>
    <script src="assets/js/jquery.mask.js"></script>
    <script>

        $('#telefone').mask('(00) 0 0000-0000');

    </script>
</body>
</html>