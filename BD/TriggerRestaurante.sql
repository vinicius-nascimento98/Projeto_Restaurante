DELIMITER //
CREATE DEFINER =  `root`@`localhost` TRIGGER `libera_mesa` AFTER INSERT ON  `pagamento` 
FOR EACH
ROW BEGIN 
SET @id_reserva = new.cod_reserva;

UPDATE reserva SET reserva_finalizada =1 WHERE id_reserva = @id_reserva ;

END
//