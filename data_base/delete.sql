-- CRUD (Create | Read | Update | Delete).
-- Delete: Excluir.

-- Exclui toda a tabela setada no comando!
drop table tb_exemplo;

-- Exclui toda a Base de Dados e suas Tabelas!
drop database db_exemplo;

delete from tb_usuario where id_usuario = 1;

delete from tb_categoria where id_categoria = 1;

delete from tb_movimento where id_movimento in (1, 2, 3, 4);