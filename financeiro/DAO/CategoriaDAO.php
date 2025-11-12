<?php

    require_once 'Conexao.php';
    require_once 'UtilDAO.php';

    class CategoriaDAO extends Conexao{
        public function CadastrarCategoria($nomeCat){
            if($nomeCat == ''){
                return 0;
            }else{
                // return 1;

                // 1º Passo: Vamos criar uma Variável para receber o resultado executado pela Classe Conexao.
                $conexao = parent::retornarConexao();

                // 2º Passo: Vamos construir o Script SQL que sera injetado e executado via PDO.
                $comando_sql = 'insert into tb_categoria(nome_categoria, id_usuario) values(?, ?);';

                // 3º Passo: Vamos criar um Objeto com todos os recursos do PDO e listar todos os processos da Classe atual!
                $sql = new PDOStatement();

                // 4º Passo: Vamos preparar a execução do Script SQL através da Classe Conexao.
                $sql = $conexao->prepare($comando_sql);

                // 5º Passo: Vamos validar e identificar os dados que chegou na Classe para ser executados no Banco de Dados!
                $sql->bindValue(1, $nomeCat);
                $sql->bindValue(2, UtilDAO::UsuarioLogado());

                // 6º Passo: Execução de todo o código, enviando o resultado para o Usuário, confirmando sucesso ou falha!
                try{
                    $sql->execute();
                    return 1;
                }catch(Exception $ex){
                    echo $ex->getMessage();
                    return -1;
                }
            }
        }

        public function ConsultarCategoria(){
            $conexao = parent::retornarConexao();

            $comando_sql = 'select id_categoria, nome_categoria from tb_categoria where id_usuario = ? order by nome_categoria ASC;';

            $sql = new PDOStatement();

            $sql = $conexao->prepare($comando_sql);

            $sql->bindValue(1, UtilDAO::UsuarioLogado());

            $sql->setFetchMode(PDO::FETCH_ASSOC);

            $sql->execute();

            return $sql->fetchAll();
        }

        // Identifica as informações vinculadas ao ID trafegado via GET (URL) entre a tela de consultar para alterar ou excluir Categoria!
        public function DetalharCategoria($idCategoria){
            if($idCategoria == ''){
                return 0;
            }else{
                $conexao = parent::retornarConexao();

                $comando_sql = 'select id_categoria, nome_categoria from tb_categoria where id_categoria = ? and id_usuario = ?';

                $sql = new PDOStatement();

                $sql = $conexao->prepare($comando_sql);

                $sql->bindValue(1, $idCategoria);
                $sql->bindValue(2, UtilDAO::UsuarioLogado());

                $sql->setFetchMode(PDO::FETCH_ASSOC);

                $sql->execute();

                return $sql->fetchAll();
            }
        }

        public function AlterarCategoria($nomeCat, $idCategoria){
            if($nomeCat == '' || $idCategoria == ''){
                return 0;
            }else{
                // return 1;

                $conexao = parent::retornarConexao();

                $comando_sql = 'update tb_categoria set nome_categoria = ? where id_categoria = ? and id_usuario = ?';

                $sql = new PDOStatement();

                $sql = $conexao->prepare($comando_sql);

                $sql->bindValue(1, $nomeCat);
                $sql->bindValue(2, $idCategoria);
                $sql->bindValue(3, UtilDAO::UsuarioLogado());

                try{
                    $sql->execute();
                    return 1;
                }catch(Exception $ex){
                    echo $ex->getMessage();
                    return -1;
                }
            }
        }

        public function ExcluirCategoria($idCategoria){
            if($idCategoria == ''){
                return 0;
            }else{
                $conexao = parent::retornarConexao();

                $comando_sql = 'delete from tb_categoria where id_categoria = ? and id_usuario = ?';

                $sql = new PDOStatement();

                $sql = $conexao->prepare($comando_sql);

                $sql->bindValue(1, $idCategoria);
                $sql->bindValue(2, UtilDAO::UsuarioLogado());

                try{
                    $sql->execute();
                    return 1;
                }catch(Exception $ex){
                    echo $ex->getMessage();
                    return -4;
                }
            }
        }
    }