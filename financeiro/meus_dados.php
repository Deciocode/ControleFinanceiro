<?php

    // ===== Requisição de Sessão Criada! =====
    require_once './DAO/UtilDAO.php';
    UtilDAO::VerificarLogado();
    // == Final da Requisição de Sessão Criada! ==

    require_once './DAO/UsuarioDAO.php';

    // Objeto Global.
    $objDAO = new UsuarioDAO();

    if(isset($_POST['btnSalvar'])){
        $nome = trim($_POST['nome']);
        $email = trim($_POST['email']);
        $senha = trim($_POST['senha']);

        $ret = $objDAO->GravarMeusDados($nome, $email, $senha);
    }

    $dados = $objDAO->CarregarMeusDados();

    // echo '<pre>';
    // var_dump($dados);
    // echo '</pre>';

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
                        <h2>Alterar Dados de Cadastro.</h2>
                        <h5>Aqui você ALTERAR seus dados de acesso cadastrados.</h5>
                        <?php include_once '_msg.php'; ?>
                    </div>
                </div>
                <hr/>
                <form action="meus_dados.php" method="POST">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Digite seu Nome:</label>
                            <input class="form-control" placeholder="Digite seu Nome aqui..." name="nome" id="nome" value="<?= $dados[0]['nome_usuario'] ?>"/>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Digite seu E-mail:</label>
                            <input type="email" class="form-control" placeholder="Digite seu Nome aqui..." name="email" id="email" value="<?= $dados[0]['email_usuario'] ?>"/>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Digite uma nova Senha:</label>
                            <div class="ajuste">
                                <input type="password" class="form-control tmh" placeholder="Digite uma nova Senha aqui..." name="senha" id="senha" value="<?= $dados[0]['senha_usuario'] ?>"/>
                                <img src="./assets/img/img_senha.png" id="olho" alt="Icone de Ver Senha!" title="Icone de Ver Senha!" class="iconSenha">
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <button class="btn btn-success" name="btnSalvar" onclick="return ValidarMeusDados()">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $( "#olho" ).mousedown(function() {
            $("#senha").attr("type", "text");
        });

        $( "#olho" ).mouseup(function() {
            $("#senha").attr("type", "password");
        });
    </script>
</body>
</html>