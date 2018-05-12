-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 12-Maio-2018 às 01:27
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `restaurante`
--
CREATE DATABASE IF NOT EXISTS `restaurante` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `restaurante`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `atendente`
--

CREATE TABLE IF NOT EXISTS `atendente` (
  `id_atendente` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `comissao` double NOT NULL,
  PRIMARY KEY (`id_atendente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `atendente`
--

INSERT INTO `atendente` (`id_atendente`, `nome`, `comissao`) VALUES
(4, 'Vinicius Nascimento', 30),
(5, 'Davi Freitas', 30),
(6, 'Carlos Pereira', 30),
(7, 'Rogério Silva', 30);

-- --------------------------------------------------------

--
-- Estrutura da tabela `bebida`
--

CREATE TABLE IF NOT EXISTS `bebida` (
  `cod_bebida` int(11) NOT NULL,
  `estoque` int(11) NOT NULL,
  PRIMARY KEY (`cod_bebida`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `bebida`
--

INSERT INTO `bebida` (`cod_bebida`, `estoque`) VALUES
(2, 400);

-- --------------------------------------------------------

--
-- Estrutura da tabela `drink`
--

CREATE TABLE IF NOT EXISTS `drink` (
  `cod_drink` int(11) NOT NULL,
  PRIMARY KEY (`cod_drink`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `drink_ingrediente`
--

CREATE TABLE IF NOT EXISTS `drink_ingrediente` (
  `cod_ingrediente` int(11) NOT NULL,
  `cod_drink` int(11) NOT NULL,
  `quantidade` double NOT NULL,
  PRIMARY KEY (`cod_ingrediente`,`cod_drink`),
  KEY `cod_drink` (`cod_drink`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ingrediente`
--

CREATE TABLE IF NOT EXISTS `ingrediente` (
  `id_ingrediente` int(11) NOT NULL AUTO_INCREMENT,
  `nome_ingrediente` varchar(30) NOT NULL,
  `custo` double NOT NULL,
  `estoque` double NOT NULL,
  PRIMARY KEY (`id_ingrediente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `id_item` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) NOT NULL,
  `custo` double NOT NULL,
  `disponibilidade` char(1) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  PRIMARY KEY (`id_item`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `item`
--

INSERT INTO `item` (`id_item`, `descricao`, `custo`, `disponibilidade`, `tipo`) VALUES
(2, 'Fanta 600 ml', 6, 'S', 'Bebida');

-- --------------------------------------------------------

--
-- Stand-in structure for view `item_bebida`
--
CREATE TABLE IF NOT EXISTS `item_bebida` (
`id_item` int(11)
,`descricao` varchar(100)
,`disponibilidade` char(1)
,`estoque` int(11)
,`custo` double
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `item_vinho`
--
CREATE TABLE IF NOT EXISTS `item_vinho` (
`id_item` int(11)
,`descricao` varchar(100)
,`tipo_uva` varchar(100)
,`safra` varchar(30)
,`disponibilidade` char(1)
,`custo` double
);
-- --------------------------------------------------------

--
-- Estrutura da tabela `lista_espera`
--

CREATE TABLE IF NOT EXISTS `lista_espera` (
  `nome_cliente` varchar(50) NOT NULL,
  `ordem` int(11) NOT NULL,
  `data_espera` date NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `cod_atendente` int(11) NOT NULL,
  `id_lista_espera` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_lista_espera`),
  KEY `cod_atendente` (`cod_atendente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `lista_espera`
--

INSERT INTO `lista_espera` (`nome_cliente`, `ordem`, `data_espera`, `telefone`, `cod_atendente`, `id_lista_espera`) VALUES
('Valter Renner', 2, '2018-05-11', '(16) 99724-9904', 6, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `mesa`
--

CREATE TABLE IF NOT EXISTS `mesa` (
  `id_mesa` int(11) NOT NULL AUTO_INCREMENT,
  `status_mesa` enum('Disponível','Indisponível') DEFAULT 'Disponível',
  PRIMARY KEY (`id_mesa`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `mesa`
--

INSERT INTO `mesa` (`id_mesa`, `status_mesa`) VALUES
(1, NULL),
(2, 'Disponível'),
(3, ''),
(4, ''),
(5, ''),
(6, ''),
(7, ''),
(8, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamento`
--

CREATE TABLE IF NOT EXISTS `pagamento` (
  `data_hora` datetime NOT NULL,
  `cod_mesa` int(11) NOT NULL,
  `forma_pagamento` varchar(15) NOT NULL,
  `operadora` varchar(15) DEFAULT NULL,
  `desconto` double DEFAULT NULL,
  PRIMARY KEY (`cod_mesa`,`data_hora`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE IF NOT EXISTS `pedido` (
  `data_hora` datetime NOT NULL,
  `cod_mesa` int(11) NOT NULL,
  `sequencia` int(11) DEFAULT NULL,
  PRIMARY KEY (`cod_mesa`,`data_hora`),
  KEY `sequencia` (`sequencia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido_atendente`
--

CREATE TABLE IF NOT EXISTS `pedido_atendente` (
  `data_hora` datetime NOT NULL,
  `cod_mesa` int(11) NOT NULL,
  `cod_atendente` int(11) NOT NULL,
  PRIMARY KEY (`cod_mesa`,`data_hora`),
  KEY `cod_atendente` (`cod_atendente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `prato`
--

CREATE TABLE IF NOT EXISTS `prato` (
  `cod_prato` int(11) NOT NULL,
  PRIMARY KEY (`cod_prato`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `prato_ingrediente`
--

CREATE TABLE IF NOT EXISTS `prato_ingrediente` (
  `cod_ingrediente` int(11) NOT NULL,
  `cod_prato` int(11) NOT NULL,
  `quantidade` double NOT NULL,
  PRIMARY KEY (`cod_ingrediente`,`cod_prato`),
  KEY `cod_prato` (`cod_prato`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `reserva`
--

CREATE TABLE IF NOT EXISTS `reserva` (
  `nome_cliente` varchar(50) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `data_hora` datetime NOT NULL,
  `cod_mesa` int(11) NOT NULL,
  `cod_atendente` int(11) NOT NULL,
  `id_reserva` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_reserva`),
  KEY `cod_mesa` (`cod_mesa`),
  KEY `cod_atendente` (`cod_atendente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vinho`
--

CREATE TABLE IF NOT EXISTS `vinho` (
  `cod_vinho` int(11) NOT NULL,
  `tipo_uva` varchar(100) NOT NULL,
  `safra` varchar(30) NOT NULL,
  `estoque` int(11) NOT NULL,
  PRIMARY KEY (`cod_vinho`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_espera`
--
CREATE TABLE IF NOT EXISTS `vw_espera` (
`id_lista_espera` int(11)
,`nome_cliente` varchar(50)
,`ordem` int(11)
,`data_espera` date
,`telefone` varchar(20)
,`nome` varchar(50)
);
-- --------------------------------------------------------

--
-- Structure for view `item_bebida`
--
DROP TABLE IF EXISTS `item_bebida`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `item_bebida` AS select `item`.`id_item` AS `id_item`,`item`.`descricao` AS `descricao`,`item`.`disponibilidade` AS `disponibilidade`,`bebida`.`estoque` AS `estoque`,`item`.`custo` AS `custo` from (`bebida` join `item` on((`bebida`.`cod_bebida` = `item`.`id_item`)));

-- --------------------------------------------------------

--
-- Structure for view `item_vinho`
--
DROP TABLE IF EXISTS `item_vinho`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `item_vinho` AS select `item`.`id_item` AS `id_item`,`item`.`descricao` AS `descricao`,`vinho`.`tipo_uva` AS `tipo_uva`,`vinho`.`safra` AS `safra`,`item`.`disponibilidade` AS `disponibilidade`,`item`.`custo` AS `custo` from (`item` join `vinho`) where (`item`.`id_item` = `vinho`.`cod_vinho`);

-- --------------------------------------------------------

--
-- Structure for view `vw_espera`
--
DROP TABLE IF EXISTS `vw_espera`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_espera` AS select `lista_espera`.`id_lista_espera` AS `id_lista_espera`,`lista_espera`.`nome_cliente` AS `nome_cliente`,`lista_espera`.`ordem` AS `ordem`,`lista_espera`.`data_espera` AS `data_espera`,`lista_espera`.`telefone` AS `telefone`,`atendente`.`nome` AS `nome` from (`lista_espera` join `atendente` on((`lista_espera`.`cod_atendente` = `atendente`.`id_atendente`))) order by `lista_espera`.`ordem`;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `bebida`
--
ALTER TABLE `bebida`
  ADD CONSTRAINT `bebida_ibfk_1` FOREIGN KEY (`cod_bebida`) REFERENCES `item` (`id_item`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `drink`
--
ALTER TABLE `drink`
  ADD CONSTRAINT `drink_ibfk_1` FOREIGN KEY (`cod_drink`) REFERENCES `item` (`id_item`);

--
-- Limitadores para a tabela `drink_ingrediente`
--
ALTER TABLE `drink_ingrediente`
  ADD CONSTRAINT `drink_ingrediente_ibfk_1` FOREIGN KEY (`cod_ingrediente`) REFERENCES `ingrediente` (`id_ingrediente`),
  ADD CONSTRAINT `drink_ingrediente_ibfk_2` FOREIGN KEY (`cod_drink`) REFERENCES `drink` (`cod_drink`);

--
-- Limitadores para a tabela `lista_espera`
--
ALTER TABLE `lista_espera`
  ADD CONSTRAINT `lista_espera_ibfk_1` FOREIGN KEY (`cod_atendente`) REFERENCES `atendente` (`id_atendente`);

--
-- Limitadores para a tabela `pagamento`
--
ALTER TABLE `pagamento`
  ADD CONSTRAINT `pagamento_ibfk_1` FOREIGN KEY (`cod_mesa`) REFERENCES `pedido` (`cod_mesa`);

--
-- Limitadores para a tabela `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`cod_mesa`) REFERENCES `mesa` (`id_mesa`),
  ADD CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`sequencia`) REFERENCES `item` (`id_item`);

--
-- Limitadores para a tabela `pedido_atendente`
--
ALTER TABLE `pedido_atendente`
  ADD CONSTRAINT `pedido_atendente_ibfk_1` FOREIGN KEY (`cod_mesa`, `data_hora`) REFERENCES `pedido` (`cod_mesa`, `data_hora`),
  ADD CONSTRAINT `pedido_atendente_ibfk_2` FOREIGN KEY (`cod_atendente`) REFERENCES `atendente` (`id_atendente`);

--
-- Limitadores para a tabela `prato`
--
ALTER TABLE `prato`
  ADD CONSTRAINT `prato_ibfk_1` FOREIGN KEY (`cod_prato`) REFERENCES `item` (`id_item`);

--
-- Limitadores para a tabela `prato_ingrediente`
--
ALTER TABLE `prato_ingrediente`
  ADD CONSTRAINT `prato_ingrediente_ibfk_1` FOREIGN KEY (`cod_ingrediente`) REFERENCES `ingrediente` (`id_ingrediente`),
  ADD CONSTRAINT `prato_ingrediente_ibfk_2` FOREIGN KEY (`cod_prato`) REFERENCES `prato` (`cod_prato`);

--
-- Limitadores para a tabela `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`cod_mesa`) REFERENCES `mesa` (`id_mesa`),
  ADD CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`cod_atendente`) REFERENCES `atendente` (`id_atendente`);

--
-- Limitadores para a tabela `vinho`
--
ALTER TABLE `vinho`
  ADD CONSTRAINT `vinho_ibfk_1` FOREIGN KEY (`cod_vinho`) REFERENCES `item` (`id_item`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
