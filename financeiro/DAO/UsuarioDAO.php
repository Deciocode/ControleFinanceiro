<?php

    require_once 'Conexao.php';
    require_once 'UtilDAO.php';

    class UsuarioDAO extends Conexao{
        public function ValidarLogin($email, $senha){
            if($email == '' || $senha == ''){
                return 0;
            }else if(strlen($senha) < 6 || strlen($senha) > 8){
                return -2;
            }else{
                // return 1;

                $conexao = parent::retornarConexao();

                $comando_sql = 'select id_usuario, nome_usuario from tb_usuario where email_usuario = ? and senha_usuario = ?';

                $sql = new PDOStatement();

                $sql = $conexao->prepare($comando_sql);

                $sql->bindValue(1, $email);
                $sql->bindValue(2, $senha);

                $sql->setFetchMode(PDO::FETCH_ASSOC);

                $sql->execute();

                // Vamos criar uma Variável que vai receber o Array feito pelo PDO.
                $user = $sql->fetchAll();

                if(count($user) == 0){
                    return -6;
                }else{
                    $cod = $user[0]['id_usuario'];
                    $nome = $user[0]['nome_usuario'];

                    UtilDAO::CriarSessao($cod, $nome);

                    header('location: tela_inicial.php');
                    exit;
                }
            }
        }

        public function ValidarCadastro($nome, $email, $senha, $repSenha){
            if($nome == '' || $email == '' || $senha == '' || $repSenha == ''){
                return 0;
            }else if(strlen($senha) < 6 || strlen($senha) > 8){
                return -2;
            }else if($senha != $repSenha){
                return -3;
            }else{
                // return 1;

                if($this->ValidarEmailDuplicadoCadastro($email) != 0){
                    return -5;
                }

                $conexao = parent::retornarConexao();

                $comando_sql = 'insert into tb_usuario(nome_usuario, email_usuario, senha_usuario, data_cadastro) values(?, ?, ?, ?);';

                $sql = new PDOStatement();

                $sql = $conexao->prepare($comando_sql);

                $sql->bindValue(1, $nome);
                $sql->bindValue(2, $email);
                $sql->bindValue(3, $senha);
                $sql->bindValue(4, date('Y-m-d'));

                try{
                    $sql->execute();
                    return 1;
                }catch(Exception $ex){
                    echo $ex->getMessage();
                    return -1;
                }
            }
        }

        public function CarregarMeusDados(){
            $conexao = parent::retornarConexao();

            $comando_sql = 'select nome_usuario, email_usuario, senha_usuario from tb_usuario where id_usuario = ?;';

            $sql = new PDOStatement();

            $sql = $conexao->prepare($comando_sql);

            $sql->bindValue(1, UtilDAO::UsuarioLogado());

            // Esse comando, realiza uma consulta no Banco de Dados através do PDO, e retorna o que foi encontado em forma de Array!
            $sql->setFetchMode(PDO::FETCH_ASSOC);

            $sql->execute();

            return $sql->fetchAll();
        }

        public function GravarMeusDados($nome, $email, $senha){
            if($nome == '' || $email == '' || $senha == ''){
                return 0;
            }else{
                // return 1;

                if($this->ValidarEmailDuplicadoAlterar($email) != 0){
                    return -5;
                }

                $conexao = parent::retornarConexao();

                $comando_sql = 'update tb_usuario set nome_usuario = ?, email_usuario = ?, senha_usuario = ? where id_usuario = ?;';

                $sql = new PDOStatement();

                $sql = $conexao->prepare($comando_sql);

                $sql->bindValue(1, $nome);
                $sql->bindValue(2, $email);
                $sql->bindValue(3, $senha);
                $sql->bindValue(4, UtilDAO::UsuarioLogado());

                try{
                    $sql->execute();
                    return 1;
                }catch(Exception $ex){
                    echo $ex->getMessage();
                    return -1;
                }
            }
        }

        // Essa function vai impedir que o Usuário faça um novo cadastro com um E-mail já existente no Banco de Dados!
        public function ValidarEmailDuplicadoCadastro($email){
            if($email == ''){
                return 0;
            }else{
                $conexao = parent::retornarConexao();

                $comando_sql = 'select count(email_usuario) as contar from tb_usuario where email_usuario = ?';

                $sql = new PDOStatement();

                $sql = $conexao->prepare($comando_sql);

                $sql->bindValue(1, $email);

                $sql->setFetchMode(PDO::FETCH_ASSOC);

                $sql->execute();

                $contar = $sql->fetchAll();

                return $contar[0]['contar'];
            }
        }

        // Essa function vai impedir que o Usuário faça uma atualização de cadastro com um E-mail já existente no Banco de Dados!
        public function ValidarEmailDuplicadoAlterar($email){
            if($email == ''){
                return 0;
            }else{
                $conexao = parent::retornarConexao();

                $comando_sql = 'select count(email_usuario) as contar from tb_usuario where email_usuario = ? and id_usuario != ?';

                $sql = new PDOStatement();

                $sql = $conexao->prepare($comando_sql);

                $sql->bindValue(1, $email);
                $sql->bindValue(2, UtilDAO::UsuarioLogado());

                $sql->setFetchMode(PDO::FETCH_ASSOC);

                $sql->execute();

                $contar = $sql->fetchAll();

                return $contar[0]['contar'];
            }
        }
    }