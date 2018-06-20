-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 19-Maio-2018 às 01:34
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `atendente`
--

INSERT INTO `atendente` (`id_atendente`, `nome`, `comissao`) VALUES
(4, 'Vinicius Nascimento', 30),
(5, 'Davi Freitas', 30);

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
  `unid` set('l','ml','kg','g','un','cx','gl') NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mesa`
--

CREATE TABLE IF NOT EXISTS `mesa` (
  `id_mesa` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_mesa`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Extraindo dados da tabela `mesa`
--

INSERT INTO `mesa` (`id_mesa`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamento`
--

CREATE TABLE IF NOT EXISTS `pagamento` (
  `data_hora` datetime NOT NULL,
  `cod_mesa` int(11) NOT NULL,
  `cod_reserva` int(11) NOT NULL,
  `forma_pagamento` varchar(15) NOT NULL,
  `operadora` varchar(15) DEFAULT NULL,
  `desconto` double DEFAULT NULL,
  `total` double NOT NULL,
  PRIMARY KEY (`cod_mesa`,`data_hora`),
  KEY `cod_reserva` (`cod_reserva`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE IF NOT EXISTS `pedido` (
  `data_hora` datetime NOT NULL,
  `cod_mesa` int(11) NOT NULL,
  `cod_reserva` int(11) NOT NULL,
  `sequencia` int(11) DEFAULT NULL,
  PRIMARY KEY (`cod_mesa`,`data_hora`),
  KEY `sequencia` (`sequencia`),
  KEY `cod_reserva` (`cod_reserva`)
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
  `qtd_pessoas` int(11) NOT NULL,
  `id_reserva` int(11) NOT NULL AUTO_INCREMENT,
  `reserva_finalizada` tinyint(1) DEFAULT NULL,
  `mesa_iniciada` tinyint(1) DEFAULT null,
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
-- Estrutura da tabela `vw_bebida`
--

CREATE TABLE IF NOT EXISTS `vw_bebida` (
  `id_item` int(11) DEFAULT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `disponibilidade` char(1) DEFAULT NULL,
  `custo` double DEFAULT NULL,
  `estoque` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vw_bebida_estoque`
--

CREATE TABLE IF NOT EXISTS `vw_bebida_estoque` (
  `id_item` int(11) DEFAULT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `estoque` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vw_espera`
--

CREATE TABLE IF NOT EXISTS `vw_espera` (
  `id_lista_espera` int(11) DEFAULT NULL,
  `nome_cliente` varchar(50) DEFAULT NULL,
  `ordem` int(11) DEFAULT NULL,
  `data_espera` date DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vw_listar_drink`
--

CREATE TABLE IF NOT EXISTS `vw_listar_drink` (
  `descricao` varchar(100) DEFAULT NULL,
  `Lista_Ingredientes` text,
  `custo` double DEFAULT NULL,
  `disponibilidade` varchar(1) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_max_mesa`
--
CREATE TABLE IF NOT EXISTS `vw_max_mesa` (
`id_mesa` int(11)
);
-- --------------------------------------------------------

--
-- Structure for view `vw_max_mesa`
--
DROP TABLE IF EXISTS `vw_max_mesa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_max_mesa` AS select max(`mesa`.`id_mesa`) AS `id_mesa` from `mesa`;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
