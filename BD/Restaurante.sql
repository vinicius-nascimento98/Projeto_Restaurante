-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 24-Abr-2018 às 09:51
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
CREATE DATABASE IF NOT EXISTS `restaurante` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `restaurante`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `atendente`
--

CREATE TABLE IF NOT EXISTS `atendente` (
  `id_Atendente` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `comissao` double NOT NULL,
  PRIMARY KEY (`id_Atendente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `bebida`
--

CREATE TABLE IF NOT EXISTS `bebida` (
  `cod_Bebida` int(11) NOT NULL,
  `estoque` int(11) NOT NULL,
  PRIMARY KEY (`cod_Bebida`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `drink`
--

CREATE TABLE IF NOT EXISTS `drink` (
  `cod_Drink` int(11) NOT NULL,
  PRIMARY KEY (`cod_Drink`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `drink_ingrediente`
--

CREATE TABLE IF NOT EXISTS `drink_ingrediente` (
  `cod_Ingrediente` int(11) NOT NULL,
  `cod_Drink` int(11) NOT NULL,
  PRIMARY KEY (`cod_Ingrediente`,`cod_Drink`),
  KEY `cod_Drink` (`cod_Drink`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ingrediente`
--

CREATE TABLE IF NOT EXISTS `ingrediente` (
  `id_Ingrediente` int(11) NOT NULL AUTO_INCREMENT,
  `nome_Ingrediente` varchar(30) NOT NULL,
  `custo` double NOT NULL,
  `estoque` double NOT NULL,
  PRIMARY KEY (`id_Ingrediente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `id_item` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) NOT NULL,
  `custo` double NOT NULL,
  `disponibilidade` char(2) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  PRIMARY KEY (`id_item`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `lista_espera`
--

CREATE TABLE IF NOT EXISTS `lista_espera` (
  `nome_Cliente` varchar(50) NOT NULL,
  `ordem` int(11) NOT NULL,
  `data_Espera` date NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `cod_Atendente` int(11) NOT NULL,
  PRIMARY KEY (`telefone`,`data_Espera`),
  KEY `cod_Atendente` (`cod_Atendente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mesa`
--

CREATE TABLE IF NOT EXISTS `mesa` (
  `id_Mesa` int(11) NOT NULL AUTO_INCREMENT,
  `status_Mesa` varchar(30) NOT NULL,
  PRIMARY KEY (`id_Mesa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamento`
--

CREATE TABLE IF NOT EXISTS `pagamento` (
  `data_Hora` datetime NOT NULL,
  `cod_Mesa` int(11) NOT NULL,
  `forma_Pagamento` varchar(15) NOT NULL,
  `operadora` varchar(15) DEFAULT NULL,
  `desconto` double DEFAULT NULL,
  PRIMARY KEY (`cod_Mesa`,`data_Hora`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE IF NOT EXISTS `pedido` (
  `data_Hora` datetime NOT NULL,
  `cod_Mesa` int(11) NOT NULL,
  `sequencia` int(11) DEFAULT NULL,
  PRIMARY KEY (`cod_Mesa`,`data_Hora`),
  KEY `sequencia` (`sequencia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido_atendente`
--

CREATE TABLE IF NOT EXISTS `pedido_atendente` (
  `data_Hora` datetime NOT NULL,
  `cod_Mesa` int(11) NOT NULL,
  `cod_Atendente` int(11) NOT NULL,
  PRIMARY KEY (`cod_Mesa`,`data_Hora`),
  KEY `cod_Atendente` (`cod_Atendente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `prato`
--

CREATE TABLE IF NOT EXISTS `prato` (
  `cod_Prato` int(11) NOT NULL,
  PRIMARY KEY (`cod_Prato`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `prato_ingrediente`
--

CREATE TABLE IF NOT EXISTS `prato_ingrediente` (
  `cod_Ingrediente` int(11) NOT NULL,
  `cod_Prato` int(11) NOT NULL,
  PRIMARY KEY (`cod_Ingrediente`,`cod_Prato`),
  KEY `cod_Prato` (`cod_Prato`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `reserva`
--

CREATE TABLE IF NOT EXISTS `reserva` (
  `nome_Cliente` varchar(50) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `data_Hora` datetime NOT NULL,
  `cod_Mesa` int(11) NOT NULL,
  `cod_Atendente` int(11) NOT NULL,
  PRIMARY KEY (`data_Hora`,`telefone`,`cod_Mesa`),
  KEY `cod_Mesa` (`cod_Mesa`),
  KEY `cod_Atendente` (`cod_Atendente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vinho`
--

CREATE TABLE IF NOT EXISTS `vinho` (
  `cod_Vinho` int(11) NOT NULL,
  `tipo_uva` varchar(100) NOT NULL,
  `safra` varchar(30) NOT NULL,
  `estoque` int(11) NOT NULL,
  PRIMARY KEY (`cod_Vinho`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `bebida`
--
ALTER TABLE `bebida`
  ADD CONSTRAINT `bebida_ibfk_1` FOREIGN KEY (`cod_Bebida`) REFERENCES `item` (`id_item`);

--
-- Limitadores para a tabela `drink`
--
ALTER TABLE `drink`
  ADD CONSTRAINT `drink_ibfk_1` FOREIGN KEY (`cod_Drink`) REFERENCES `item` (`id_item`);

--
-- Limitadores para a tabela `drink_ingrediente`
--
ALTER TABLE `drink_ingrediente`
  ADD CONSTRAINT `drink_ingrediente_ibfk_1` FOREIGN KEY (`cod_Ingrediente`) REFERENCES `ingrediente` (`id_Ingrediente`),
  ADD CONSTRAINT `drink_ingrediente_ibfk_2` FOREIGN KEY (`cod_Drink`) REFERENCES `drink` (`cod_Drink`);

--
-- Limitadores para a tabela `lista_espera`
--
ALTER TABLE `lista_espera`
  ADD CONSTRAINT `lista_espera_ibfk_1` FOREIGN KEY (`cod_Atendente`) REFERENCES `atendente` (`id_Atendente`);

--
-- Limitadores para a tabela `pagamento`
--
ALTER TABLE `pagamento`
  ADD CONSTRAINT `pagamento_ibfk_1` FOREIGN KEY (`cod_Mesa`) REFERENCES `pedido` (`cod_Mesa`);

--
-- Limitadores para a tabela `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`cod_Mesa`) REFERENCES `mesa` (`id_Mesa`),
  ADD CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`sequencia`) REFERENCES `item` (`id_item`);

--
-- Limitadores para a tabela `pedido_atendente`
--
ALTER TABLE `pedido_atendente`
  ADD CONSTRAINT `pedido_atendente_ibfk_1` FOREIGN KEY (`cod_Mesa`, `data_Hora`) REFERENCES `pedido` (`cod_Mesa`, `data_Hora`),
  ADD CONSTRAINT `pedido_atendente_ibfk_2` FOREIGN KEY (`cod_Atendente`) REFERENCES `atendente` (`id_Atendente`);

--
-- Limitadores para a tabela `prato`
--
ALTER TABLE `prato`
  ADD CONSTRAINT `prato_ibfk_1` FOREIGN KEY (`cod_Prato`) REFERENCES `item` (`id_item`);

--
-- Limitadores para a tabela `prato_ingrediente`
--
ALTER TABLE `prato_ingrediente`
  ADD CONSTRAINT `prato_ingrediente_ibfk_1` FOREIGN KEY (`cod_Ingrediente`) REFERENCES `ingrediente` (`id_Ingrediente`),
  ADD CONSTRAINT `prato_ingrediente_ibfk_2` FOREIGN KEY (`cod_Prato`) REFERENCES `prato` (`cod_Prato`);

--
-- Limitadores para a tabela `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`cod_Mesa`) REFERENCES `mesa` (`id_Mesa`),
  ADD CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`cod_Atendente`) REFERENCES `atendente` (`id_Atendente`);

--
-- Limitadores para a tabela `vinho`
--
ALTER TABLE `vinho`
  ADD CONSTRAINT `vinho_ibfk_1` FOREIGN KEY (`cod_Vinho`) REFERENCES `item` (`id_item`);
--
-- Base de Dados: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
