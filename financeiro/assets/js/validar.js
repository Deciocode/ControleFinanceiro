var mensagem = "Preencher o campo obrigatório ";

// Validação: Tela de Login (index).
function ValidarLogin() {
    if ($("#email").val().trim() == '') {
        alert(mensagem + "E-MAIL!");
        $("#email").focus();
        return false;
    }

    if ($("#senha").val().trim() == '') {
        alert("Preencher o campo obrigatório SENHA!");
        $("#senha").focus();
        return false;
    }

    if ($("#senha").val().trim().length < 6 || $("#senha").val().trim().length > 8) {
        alert("A SENHA deve conter entre 6 e 8 caracteres!");
        $("#senha").focus();
        return false;
    }
}

// Validação: Tela de Cadastro.
function ValidarCadastro() {
    if ($("#nome").val().trim() == '') {
        alert("Preencher o campo obrigatório NOME!");
        $("#nome").focus();
        return false;
    }

    if ($("#email").val().trim() == '') {
        alert("Preencher o campo obrigatório E-MAIL!");
        $("#email").focus();
        return false;
    }

    if ($("#senha").val().trim() == '') {
        alert("Preencher o campo obrigatório SENHA!");
        $("#senha").focus();
        return false;
    }

    if ($("#repSenha").val().trim() == '') {
        alert("Preencher o campo obrigatório REPETIR SENHA!");
        $("#repSenha").focus();
        return false;
    }

    if ($("#senha").val().trim().length < 6 || $("#senha").val().trim().length > 8) {
        alert("A SENHA deve conter entre 6 e 8 caracteres!");
        $("#senha").focus();
        return false;
    }

    if ($("#senha").val().trim() != $("#repSenha").val().trim()) {
        alert("As SENHAS deverão ser iguais!");
        $("#repSenha").focus();
        return false;
    }
}

// Validação: Tela Meus Dados.
function ValidarMeusDados() {
    if ($("#nome").val().trim() == '') {
        alert("Preencher o campo obrigatório NOME!");
        $("#nome").focus();
        return false;
    }

    if ($("#email").val().trim() == '') {
        alert("Preencher o campo obrigatório E-MAIL!");
        $("#email").focus();
        return false;
    }
}

// Validação: Tela de Cadastrar e Alterar Categoria.
function ValidarCategoria() {
    if ($("#nomeCat").val().trim() == '') {
        alert("Preencher o campo obrigatório NOME DA CATEGORIA!");
        $("#nomeCat").focus();
        return false;
    }
}

// Validação: Tela de Cadastrar e Alterar Empresa.
function ValidarEmpresa() {
    if ($("#nomeEmp").val().trim() == '') {
        alert("Preencher o campo obrigatório NOME DA EMPRESA!");
        $("#nomeEmp").focus();
        return false;
    }

    if ($("#telefone").val().trim() == '') {
        alert("Preencher o campo obrigatório TELEFONE!");
        $("#telefone").focus();
        return false;
    }

    if ($("#endereco").val().trim() == '') {
        alert("Preencher o campo obrigatório ENDEREÇO!");
        $("#endereco").focus();
        return false;
    }
}

// Validação: Tela de Cadastrar e Alterar Conta Bancária.
function ValidarConta() {
    if ($("#banco").val().trim() == '') {
        alert("Preencher o campo obrigatório NOME DO BANCO!");
        $("#banco").focus();
        return false;
    }

    if ($("#agencia").val().trim() == '') {
        alert("Preencher o campo obrigatório AGÊNCIA BANCÁRIA!");
        $("#agencia").focus();
        return false;
    }

    if ($("#numero").val().trim() == '') {
        alert("Preencher o campo obrigatório NÚMERO DA CONTA!");
        $("#numero").focus();
        return false;
    }

    if ($("#valor").val().trim() == '') {
        alert("Preencher o campo obrigatório VALOR(R$)!");
        $("#valor").focus();
        return false;
    }
}

// Validação: Tela de Realizar Movimento.
function ValidarRealizarMovimento() {
    if ($("#tipo").val().trim() == '') {
        alert("Selecione um TIPO DE MOVIMENTO!");
        $("#tipo").focus();
        return false;
    }

    if ($("#data").val().trim() == '') {
        alert("Selecione uma DATA!");
        $("#data").focus();
        return false;
    }

    if ($("#money").val().trim() == '') {
        alert("Preencher o campo obrigatório VALOR (R$)!");
        $("#money").focus();
        return false;
    }

    if ($("#categoria").val().trim() == '') {
        alert("Selecione uma CATEGORIA FINANCEIRA!");
        $("#categoria").focus();
        return false;
    }

    if ($("#empresa").val().trim() == '') {
        alert("Selecione uma EMPRESA!");
        $("#empresa").focus();
        return false;
    }

    if ($("#conta").val().trim() == '') {
        alert("Selecione uma CONTA BANCÁRIA!");
        $("#conta").focus();
        return false;
    }
}

// Validação: Tela de Consultar Movimento.
function ValidarConsultarMovimento() {
    if ($("#tipoMov").val().trim() == '') {
        alert("Selecione um FILTRO do TIPO DE MOVIMENTO!");
        $("#tipoMov").focus();
        return false;
    }

    if ($("#dtInicio").val().trim() == '') {
        alert("Selecione uma DATA INICIAL!");
        $("#dtInicio").focus();
        return false;
    }

    if ($("#dtFinal").val().trim() == '') {
        alert("Selecione uma DATA FINAL!");
        $("#dtFinal").focus();
        return false;
    }
}