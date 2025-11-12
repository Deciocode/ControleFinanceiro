-- CRUD (Create | Read | Update | Delete).
-- Create: Cadastrar.

insert into tb_usuario
(nome_usuario, email_usuario, senha_usuario, data_cadastro)
values
('Ana Maria Silva', 'ana.maria@gmail.com', 'ana321', '2024-06-19');

insert into tb_usuario
(nome_usuario, email_usuario, senha_usuario, data_cadastro)
values
('Irineu', 'irineu@hotmail.com', 'neu321', '2024-01-30');

-- Categoria para Entrada de Dinheiro (Tipo Entrada).
insert into tb_categoria
(nome_categoria, id_usuario)
values
('Salário Fixo', 1);

-- Categoria para Saída de Dinheiro (Tipo Saída).
insert into tb_categoria
(nome_categoria, id_usuario)
values
('Faculdade', 1);

insert into tb_empresa
(nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
values
('TCS Tecnology', '43988992255', 'Rua Comercial N100', 1);

insert into tb_categoria
(nome_categoria, id_usuario)
values
('Mercado', 1);

insert into tb_categoria
(nome_categoria, id_usuario)
values
('Internet', 1);

insert into tb_categoria
(nome_categoria, id_usuario)
values
('Emprego', 1);

insert into tb_categoria
(nome_categoria, id_usuario)
values
('Internet', 2);

insert into tb_empresa
(nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
values
('Claro/NET', '4333300003', 'Rua COmercial, Nº100', 1);

insert into tb_empresa
(nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
values
('TI - Deve', '4333300003', 'Europa - Portugal', 1);

insert into tb_empresa
(nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
values
('Claro/NET', '4333300003', 'Rua COmercial, Nº100', 2);

insert into tb_conta
(banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
values
('Itau', 751, 98745486, 6320.00, 1);

insert into tb_conta
(banco_conta, agencia_conta, numero_conta, saldo_conta, id_usuario)
values
('Sicredi', 918, 68485, 4500.00, 2);

insert into tb_movimento
(tipo_movimento, data_movimento, valor_movimento, obs_movimento, id_categoria, id_empresa, id_conta, id_usuario)
values
(1, '2024-06-26', 1000.00, null, 1, 1, 1, 1);

insert into tb_usuario
(nome_usuario, email_usuario, senha_usuario, data_cadastro)
values
('Bruno', 'bruno@hotmail.com', 'bru321', '2024-06-26');

insert into tb_usuario
(nome_usuario, email_usuario, senha_usuario, data_cadastro)
values
('Camila', 'camila@hotmail.com', 'cam321', '2024-06-26');

insert into tb_categoria
(nome_categoria, id_usuario)
values
('Catchaça', 4);

insert into tb_empresa
(nome_empresa, telefone_empresa, endereco_empresa, id_usuario)
values
('Botiquim do Tião', '43988992255', 'Rua Comercial N100', 4);