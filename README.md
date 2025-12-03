🚀 README: Estrutura DAO de Gestão Financeira (PHP/PDO)

Este conjunto de arquivos PHP implementa a Camada de Acesso a Dados (DAO) para um sistema de gestão financeira pessoal, seguindo o padrão CRUD (Create, Read, Update, Delete) e utilizando a biblioteca PDO (PHP Data Objects) para interação segura com o banco de dados MySQL.
🏛️ Estrutura do Projeto e Tecnologias

O projeto é baseado em Programação Orientada a Objetos (POO) e adota o padrão DAO para separar a lógica de negócios da lógica de persistência de dados.

    Linguagem: PHP

    Banco de Dados: MySQL (ou qualquer SGBD compatível com PDO)

    Conexão: PDO (para Prepared Statements e segurança contra SQL Injection).

    Padrão de Projeto: Singleton (para gerenciar a conexão única).

    Entidades: Categoria, Conta, Empresa, Movimento, Usuario.


🧬 *Classes Principais*

1. Conexao.php

Gerencia a conexão com o banco de dados.


Recurso,Descrição
Configurações,"Constantes HOST, USER, PASS, DB definem os parâmetros de acesso ao MySQL."
Padrão Singleton,Garante que apenas uma instância de conexão (private static $Connect) seja criada durante a execução do script.
Método Principal,"retornarConexao(): Retorna o objeto PDO para as classes DAO. Configura o PDO para usar exceções (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION)."

2. UtilDAO.php

Responsável pelo gerenciamento de sessão e validação de acesso do usuário.

Função,Descrição
IniciarSessao(),Inicia a sessão se ainda não estiver iniciada.
"CriarSessao($cod, $nome)",Armazena o ID e o nome do usuário na superglobal $_SESSION após o login.
NomeLogado() / UsuarioLogado(),Retorna o nome ou o ID do usuário atualmente logado.
Deslogar(),Destrói a sessão e redireciona para a tela de login (index.php).
VerificarLogado(),"Verifica se o usuário está logado, redirecionando para o login em caso negativo (Guardrail de segurança)."

💾 Camada de Acesso a Dados (DAO)

As classes a seguir herdam de Conexao e implementam as operações de banco de dados, utilizando UtilDAO::UsuarioLogado() 
para garantir que o usuário só acesse seus próprios dados (isolamento por id_usuario).

Método,SQL,Ação,Códigos de Retorno
CadastrarCategoria,INSERT,Insere nova categoria.,"1 (Sucesso), 0 (Campo vazio), -1 (Erro SQL)"
ConsultarCategoria,SELECT,Lista todas as categorias do usuário.,Retorna um array associativo.
AlterarCategoria,UPDATE,Modifica o nome da categoria.,"1 (Sucesso), 0 (Campo vazio), -1 (Erro SQL)"
ExcluirCategoria,DELETE,Remove uma categoria.,"1 (Sucesso), 0 (Campo vazio), -4 (Erro SQL, geralmente chave estrangeira)"

➡️➡️➡️➡️*ContaDAO.php*

Gerencia as contas bancárias (Banco, Agência, Número, Saldo).

Método,SQL,Ação,Códigos de Retorno
CadastrarConta,INSERT,Insere uma nova conta.,"1 (Sucesso), 0 (Campo vazio), -1 (Erro SQL)"
ConsultarConta,SELECT,Lista todas as contas do usuário.,Retorna um array associativo.
AlterarConta,UPDATE,Modifica os dados da conta.,"1 (Sucesso), 0 (Campo vazio), -1 (Erro SQL)"
ExcluirConta,DELETE,Remove uma conta.,"1 (Sucesso), 0 (Campo vazio), -4 (Erro SQL, chave estrangeira)"

🚀 README: Estrutura DAO de Gestão Financeira (PHP/PDO)

Este conjunto de arquivos PHP implementa a Camada de Acesso a Dados (DAO) para um sistema de gestão financeira pessoal, seguindo o padrão CRUD (Create, Read, Update, Delete) e utilizando a biblioteca PDO (PHP Data Objects) para interação segura com o banco de dados MySQL.
🏛️ Estrutura do Projeto e Tecnologias

O projeto é baseado em Programação Orientada a Objetos (POO) e adota o padrão DAO para separar a lógica de negócios da lógica de persistência de dados.

    Linguagem: PHP

    Banco de Dados: MySQL (ou qualquer SGBD compatível com PDO)

    Conexão: PDO (para Prepared Statements e segurança contra SQL Injection).

    Padrão de Projeto: Singleton (para gerenciar a conexão única).

    Entidades: Categoria, Conta, Empresa, Movimento, Usuario.

🧬 Classes Principais
1. Conexao.php

Gerencia a conexão com o banco de dados.
Recurso	Descrição
Configurações	Constantes HOST, USER, PASS, DB definem os parâmetros de acesso ao MySQL.
Padrão Singleton	Garante que apenas uma instância de conexão (private static $Connect) seja criada durante a execução do script.
Método Principal	retornarConexao(): Retorna o objeto PDO para as classes DAO. Configura o PDO para usar exceções (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION).
2. UtilDAO.php

Responsável pelo gerenciamento de sessão e validação de acesso do usuário.
Função	Descrição
IniciarSessao()	Inicia a sessão se ainda não estiver iniciada.
CriarSessao($cod, $nome)	Armazena o ID e o nome do usuário na superglobal $_SESSION após o login.
NomeLogado() / UsuarioLogado()	Retorna o nome ou o ID do usuário atualmente logado.
Deslogar()	Destrói a sessão e redireciona para a tela de login (index.php).
VerificarLogado()	Verifica se o usuário está logado, redirecionando para o login em caso negativo (Guardrail de segurança).
💾 Camada de Acesso a Dados (DAO)

As classes a seguir herdam de Conexao e implementam as operações de banco de dados, utilizando UtilDAO::UsuarioLogado() para garantir que o usuário só acesse seus próprios dados (isolamento por id_usuario).
3. CategoriaDAO.php

Gerencia as categorias de lançamentos.
Método	SQL	Ação	Códigos de Retorno
CadastrarCategoria	INSERT	Insere nova categoria.	1 (Sucesso), 0 (Campo vazio), -1 (Erro SQL)
ConsultarCategoria	SELECT	Lista todas as categorias do usuário.	Retorna um array associativo.
AlterarCategoria	UPDATE	Modifica o nome da categoria.	1 (Sucesso), 0 (Campo vazio), -1 (Erro SQL)
ExcluirCategoria	DELETE	Remove uma categoria.	1 (Sucesso), 0 (Campo vazio), -4 (Erro SQL, geralmente chave estrangeira)
4. ContaDAO.php

Gerencia as contas bancárias (Banco, Agência, Número, Saldo).
Método	SQL	Ação	Códigos de Retorno
CadastrarConta	INSERT	Insere uma nova conta.	1 (Sucesso), 0 (Campo vazio), -1 (Erro SQL)
ConsultarConta	SELECT	Lista todas as contas do usuário.	Retorna um array associativo.
AlterarConta	UPDATE	Modifica os dados da conta.	1 (Sucesso), 0 (Campo vazio), -1 (Erro SQL)
ExcluirConta	DELETE	Remove uma conta.	1 (Sucesso), 0 (Campo vazio), -4 (Erro SQL, chave estrangeira)
5. EmpresaDAO.php

Gerencia as empresas (ou terceiros) envolvidos nas transações.

Método,SQL,Ação,Códigos de Retorno
CadastrarEmpresa,Não implementado,"Método existe, mas a lógica INSERT está faltando.",
ConsultarEmpresa,SELECT,Lista todas as empresas do usuário.,Retorna um array associativo.
AlterarEmpresa,UPDATE,Modifica os dados da empresa.,"1 (Sucesso), 0 (Campo vazio), -1 (Erro SQL)"
ExcluirEmpresa,DELETE,Remove uma empresa.,"1 (Sucesso), 0 (Campo vazio), -4 (Erro SQL, chave estrangeira)"

