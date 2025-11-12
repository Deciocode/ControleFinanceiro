<?php

    // Essa Classe receberá, a validação de sessão do usuário, na aula 25.
    // Mas para simularmos, a utilização do ambiente interno da aplicação, precisamos de um acesso simulado.

    class UtilDAO{
        // 1ª Function: Iniciar a Sessão do Usuário dando a permissão!
        private static function IniciarSessao(){
            if(!isset($_SESSION)){
                session_start();
            }
        }

        // 2ª Function: Essa function vai levantar e armazenar os dados de acesso do Usuário!
        public static function CriarSessao($cod, $nome){
            // Algoritmo que vai dar o início da Sessão!
            self::IniciarSessao();

            $_SESSION['cod'] = $cod;
            $_SESSION['nome'] = $nome;
        }

        // 3ª Function: Vamos receber o Nome do Usuário para ser utilizado na Aplicação!
        public static function NomeLogado(){
            self::IniciarSessao();

            return $_SESSION['nome'];
        }

        // 4ª Function: Vamos receber o ID do Usuário para acessar a Aplicação!
        public static function UsuarioLogado(){
            // return 1; // Esse return simula o acesso do usuário de ID 1.

            self::IniciarSessao();

            return $_SESSION['cod'];
        }

        // 5ª Function: Caso o Usuário saia da Aplicação, toda a Sessão é limpada (destruida)!
        public static function Deslogar(){
            self::IniciarSessao();

            unset($_SESSION['cod']);
            unset($_SESSION['nome']);

            header('location: index.php');
            exit;
        }

        // 6ª Function: Essa function monitora se, existe dados do Usuário em Sessão, caso não, redireciona para a tela de Login!
        public static function VerificarLogado(){
            self::IniciarSessao();

            if(!isset($_SESSION['cod']) || $_SESSION['cod'] == ''){
                header('location: index.php');
                exit;
            }
        }
    }