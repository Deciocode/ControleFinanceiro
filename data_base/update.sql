-- CRUD (Create | Read | Update | Delete).
-- Update: Atualizar.

update tb_usuario
	set nome_usuario = 'Paula Mendes'
where id_usuario = 1;

update tb_usuario
	set nome_usuario = 'Paula Mendes',
		email_usuario = 'paula_mendes@outlook.com'
where id_usuario = 1;

update tb_categoria
	set nome_categoria = 'Financiamento'
where id_categoria = 3;

update tb_empresa
	set nome_empresa = 'Caixa Economica Federal',
		telefone_empresa = '4380008000',
        endereco_empresa = 'Rua Migué, N171'
where id_empresa = 2;