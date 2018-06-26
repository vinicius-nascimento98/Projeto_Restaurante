DELIMITER //
CREATE DEFINER =  `root`@`localhost` TRIGGER `tg_libera_mesa` AFTER INSERT ON  `pagamento` 
FOR EACH
ROW BEGIN 
SET @id_reserva = new.cod_reserva;

UPDATE reserva SET reserva_finalizada =1 WHERE id_reserva = @id_reserva ;

END
//

DELIMITER //
CREATE DEFINER =  `root`@`localhost` TRIGGER `tg_vincula_atendente_mesa` AFTER INSERT ON  `pedido` 
FOR EACH
ROW BEGIN 

/*Insert do Pedido -> INSERT INTO `pedido`(`data_hora`, `cod_mesa`, `cod_reserva`, `sequencia`) VALUES ([value-1],[value-2],[value-3],[value-4])*/

INSERT INTO `pedido_atendente`(`data_hora`, `cod_mesa`, `cod_atendente`) VALUES (new.data_hora,new.cod_mesa`,ATENDENTE);

END
//