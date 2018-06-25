CREATE view vw_bebida as 
SELECT id_item,disponibilidade,descricao,custo,estoque,tipo 
FROM item inner join bebida on
item.id_item = bebida.cod_bebida;

CREATE view vw_bebida_estoque as 
SELECT id_item as cod_bebida,descricao,estoque
FROM item inner join bebida on
item.id_item = bebida.cod_bebida;

CREATE view vw_vinho_estoque as 
SELECT id_item as cod_vinho,descricao,estoque,safra,tipo_uva
FROM item inner join vinho on
item.id_item = vinho.cod_vinho;

CREATE view vw_vinho as 
SELECT id_item,disponibilidade,descricao,custo,estoque,tipo 
FROM item inner join vinho on
item.id_item = vinho.cod_vinho;

CREATE view vw_listaEspera as 
SELECT id_lista_espera,nome_cliente,ordem,data_espera,telefone,nome
FROM lista_espera inner join atendente on
lista_espera.cod_atendente = atendente.id_atendente ORDER BY data_espera;


CREATE view vw_listar_drink as
SELECT descricao,group_concat(nome_ingrediente SEPARATOR ', ') as Lista_Ingredientes,
item.custo,disponibilidade,tipo from item inner join drink on item.id_item = drink.cod_drink
inner join drink_ingrediente on drink.cod_drink = drink_ingrediente.cod_drink inner join ingrediente on
ingrediente.id_ingrediente = drink_ingrediente.cod_ingrediente;


CREATE view  vw_listar_prato as
SELECT descricao,group_concat(nome_ingrediente SEPARATOR ', ') as Lista_Ingredientes,
item.custo,disponibilidade,tipo from item inner join prato on item.id_item = prato.cod_prato
inner join prato_ingrediente on prato.cod_prato = prato_ingrediente.cod_prato inner join ingrediente on
ingrediente.id_ingrediente = prato_ingrediente.cod_ingrediente;


CREATE VIEW `vw_max_mesa` AS select max(`mesa`.`id_mesa`) AS `id_mesa` from `mesa`;


CREATE VIEW  vw_mesaDisponivel as 
Select id_mesa from mesa where id_mesa not in(
	Select id_reserva 
	from reserva
	where RESERVA_FINALIZADA = 0 
);

CREATE VIEW vw_mesaReservada as 
	select id_reserva,cod_mesa, data_hora,mesa_iniciada from reserva where reserva_finalizada = 0;
	
CREATE VIEW vw_reserva AS
    SELECT 
		id_reserva,
        nome_cliente,
        telefone,
        data_hora,
        cod_mesa,
        atendente.nome,
        qtd_pessoas,
        reserva_finalizada
    FROM
        reserva
            INNER JOIN
        atendente ON reserva.cod_atendente = atendente.id_atendente ORDER BY data_hora;

CREATE VIEW vw_ordem AS SELECT ordem,data_espera
FROM  `lista_espera`;

CREATE VIEW vw_mesasIniciadas AS SELECT id_reserva, cod_mesa, data_hora, reserva_finalizada
FROM reserva
WHERE reserva_finalizada =0
AND mesa_iniciada =1;