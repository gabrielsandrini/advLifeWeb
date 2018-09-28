-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 10-Set-2018 às 16:28
-- Versão do servidor: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adventureslife`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbavaliacaovalores`
--

DROP TABLE IF EXISTS `tbavaliacaovalores`;
CREATE TABLE IF NOT EXISTS `tbavaliacaovalores` (
  `idAvaliacao` int(11) NOT NULL,
  `idCriterio` smallint(6) NOT NULL,
  `nota` smallint(6) NOT NULL,
  `comentario` varchar(140) DEFAULT NULL,
  PRIMARY KEY (`idAvaliacao`,`idCriterio`),
  KEY `idCriterio` (`idCriterio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbavaliacaovalores`
--

INSERT INTO `tbavaliacaovalores` (`idAvaliacao`, `idCriterio`, `nota`, `comentario`) VALUES
(2, 1, 3, NULL),
(2, 2, 5, NULL),
(2, 4, 2, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbavaliacoesrealizadas`
--

DROP TABLE IF EXISTS `tbavaliacoesrealizadas`;
CREATE TABLE IF NOT EXISTS `tbavaliacoesrealizadas` (
  `idTrilha` int(11) NOT NULL,
  `nicknameUsuario` varchar(16) NOT NULL,
  `dataRealizacao` date NOT NULL,
  `idAvaliacao` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idAvaliacao`),
  KEY `idTrilha` (`idTrilha`),
  KEY `nicknameUsuario` (`nicknameUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbavaliacoesrealizadas`
--

INSERT INTO `tbavaliacoesrealizadas` (`idTrilha`, `nicknameUsuario`, `dataRealizacao`, `idAvaliacao`) VALUES
(2, 'asdf', '2018-06-29', 1),
(2, 'asdf', '2018-06-29', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcriteriodeavaliacao`
--

DROP TABLE IF EXISTS `tbcriteriodeavaliacao`;
CREATE TABLE IF NOT EXISTS `tbcriteriodeavaliacao` (
  `idCriterio` smallint(6) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(140) NOT NULL,
  PRIMARY KEY (`idCriterio`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbcriteriodeavaliacao`
--

INSERT INTO `tbcriteriodeavaliacao` (`idCriterio`, `descricao`) VALUES
(1, 'Dificuldade da trilha'),
(2, 'estado de preservacao da trilha'),
(3, 'sinalizacao da trilha'),
(4, 'seguranca da trilha');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbdescricaomata`
--

DROP TABLE IF EXISTS `tbdescricaomata`;
CREATE TABLE IF NOT EXISTS `tbdescricaomata` (
  `idMata` smallint(6) NOT NULL,
  `descricao` varchar(140) NOT NULL,
  PRIMARY KEY (`idMata`),
  UNIQUE KEY `idMata` (`idMata`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbdescricaomata`
--

INSERT INTO `tbdescricaomata` (`idMata`, `descricao`) VALUES
(1, 'Amazonia'),
(2, 'Caatinga'),
(3, 'Cerrado'),
(4, 'Mata Atlantica'),
(5, 'Pampa'),
(6, 'Pantanal');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbrota`
--

DROP TABLE IF EXISTS `tbrota`;
CREATE TABLE IF NOT EXISTS `tbrota` (
  `idTrilha` int(11) NOT NULL,
  `caminho` linestring DEFAULT NULL,
  PRIMARY KEY (`idTrilha`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbtipodelocomocao`
--

DROP TABLE IF EXISTS `tbtipodelocomocao`;
CREATE TABLE IF NOT EXISTS `tbtipodelocomocao` (
  `idLocomocao` smallint(6) NOT NULL,
  `descricao` varchar(140) NOT NULL,
  PRIMARY KEY (`idLocomocao`),
  UNIQUE KEY `idLocomocao` (`idLocomocao`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbtipodelocomocao`
--

INSERT INTO `tbtipodelocomocao` (`idLocomocao`, `descricao`) VALUES
(1, 'A pé'),
(2, 'Bicicleta'),
(3, 'Carro especial'),
(4, 'Moto de Trilha'),
(5, 'Jipe'),
(6, 'Carro de passeio'),
(7, 'Moto');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbtrilha`
--

DROP TABLE IF EXISTS `tbtrilha`;
CREATE TABLE IF NOT EXISTS `tbtrilha` (
  `idTrilha` int(11) NOT NULL AUTO_INCREMENT,
  `apelido` varchar(40) NOT NULL,
  `obstaculos` varchar(140) DEFAULT NULL,
  `distancia` double NOT NULL,
  `idmata` smallint(6) DEFAULT NULL,
  `dataGravacao` date NOT NULL,
  `nicknameUsuario` varchar(16) NOT NULL,
  `dificuldade` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`idTrilha`),
  UNIQUE KEY `idTrilha` (`idTrilha`),
  KEY `idmata` (`idmata`),
  KEY `nicknameUsuario` (`nicknameUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbtrilha`
--

INSERT INTO `tbtrilha` (`idTrilha`, `apelido`, `obstaculos`, `distancia`, `idmata`, `dataGravacao`, `nicknameUsuario`, `dificuldade`) VALUES
(2, 'Bica', 'Mesa de ping pong', 0, 6, '2018-06-17', 'admin', NULL),
(3, 'Bica', 'Mesa de ping pong', 0, 6, '2018-06-17', 'admin', NULL),
(4, 'Bica', 'Mesa de ping pong', 0, 6, '2018-06-17', 'admin', NULL),
(16, 'trilhão', 'Dragões, zumbis, radioatividade', 4.8, 2, '2018-06-18', 'Enzo', NULL),
(26, 'opa', 'aksm', 15, 2, '2018-06-18', 'admin', NULL),
(30, 'aoba', 'aoba', 12.8, 2, '2018-06-19', 'aoba', NULL),
(31, 'Sandrini', 'Mesa de ping pong', 20, 6, '2018-06-19', 'marcola', NULL),
(32, 'bica', 'código ruim', 15, 2, '2018-06-29', 'asdf', NULL),
(33, 'bica', 'código ruim', 15, 2, '2018-06-29', 'asdf', NULL),
(34, 'bica', 'código ruim', 15, 2, '2018-06-29', 'asdf', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbtrilhalocomocao`
--

DROP TABLE IF EXISTS `tbtrilhalocomocao`;
CREATE TABLE IF NOT EXISTS `tbtrilhalocomocao` (
  `idTrilha` int(11) NOT NULL,
  `idLocomocao` smallint(6) NOT NULL,
  PRIMARY KEY (`idTrilha`),
  KEY `idLocomocao` (`idLocomocao`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbusuario`
--

DROP TABLE IF EXISTS `tbusuario`;
CREATE TABLE IF NOT EXISTS `tbusuario` (
  `nicknameUsuario` varchar(16) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `nome` varchar(140) NOT NULL,
  `foto` varchar(30) DEFAULT NULL,
  `email` varchar(140) NOT NULL,
  PRIMARY KEY (`nicknameUsuario`),
  UNIQUE KEY `nicknameUsuario` (`nicknameUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbusuario`
--

INSERT INTO `tbusuario` (`nicknameUsuario`, `senha`, `nome`, `foto`, `email`) VALUES
('', 'd41d8cd98f00b204e9800998ecf8427e', '', NULL, ''),
('aaaaa', 'aaaa', 'Enzo', NULL, 'aaaaaaaa@gmail.com'),
('admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', NULL, 'admin'),
('aeiou', 'aeiou', 'Smith', NULL, 'aaaa@gmail.com'),
('aoba', 'aoba', 'aoba', NULL, 'aoba'),
('asd', '7815696ecbf1c96e6894b779456d330e', 'adminw', NULL, 'asd'),
('asdf', '912ec803b2ce49e4a541068d495ab570', 'asdg', NULL, 'asdf'),
('b', 'bb', 'b', NULL, 'bbb'),
('c', 'cc', 'c', NULL, 'ccc'),
('enzo', 'enzinho', 'enzinho', NULL, 'enzo.prospero'),
('marcola', '1234', 'Marcos', NULL, 'marcos@seila'),
('smith', 'a66e44736e753d4533746ced572ca821', 'smith', NULL, 'smith');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbusuariorealizatrilha`
--

DROP TABLE IF EXISTS `tbusuariorealizatrilha`;
CREATE TABLE IF NOT EXISTS `tbusuariorealizatrilha` (
  `nicknameUsuario` varchar(16) NOT NULL,
  `idTrilha` int(11) NOT NULL AUTO_INCREMENT,
  `dataRealizacao` date NOT NULL,
  PRIMARY KEY (`idTrilha`,`dataRealizacao`),
  KEY `nicknameUsuario` (`nicknameUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tbavaliacaovalores`
--
ALTER TABLE `tbavaliacaovalores`
  ADD CONSTRAINT `tbavaliacaovalores_ibfk_1` FOREIGN KEY (`idCriterio`) REFERENCES `tbcriteriodeavaliacao` (`idCriterio`),
  ADD CONSTRAINT `tbavaliacaovalores_ibfk_2` FOREIGN KEY (`idAvaliacao`) REFERENCES `tbavaliacoesrealizadas` (`idAvaliacao`);

--
-- Limitadores para a tabela `tbavaliacoesrealizadas`
--
ALTER TABLE `tbavaliacoesrealizadas`
  ADD CONSTRAINT `tbavaliacoesrealizadas_ibfk_1` FOREIGN KEY (`idTrilha`) REFERENCES `tbtrilha` (`idTrilha`),
  ADD CONSTRAINT `tbavaliacoesrealizadas_ibfk_2` FOREIGN KEY (`nicknameUsuario`) REFERENCES `tbusuario` (`nicknameUsuario`);

--
-- Limitadores para a tabela `tbrota`
--
ALTER TABLE `tbrota`
  ADD CONSTRAINT `tbrota_ibfk_1` FOREIGN KEY (`idTrilha`) REFERENCES `tbtrilha` (`idTrilha`);

--
-- Limitadores para a tabela `tbtrilha`
--
ALTER TABLE `tbtrilha`
  ADD CONSTRAINT `tbtrilha_ibfk_1` FOREIGN KEY (`idmata`) REFERENCES `tbdescricaomata` (`idMata`),
  ADD CONSTRAINT `tbtrilha_ibfk_2` FOREIGN KEY (`nicknameUsuario`) REFERENCES `tbusuario` (`nicknameUsuario`);

--
-- Limitadores para a tabela `tbtrilhalocomocao`
--
ALTER TABLE `tbtrilhalocomocao`
  ADD CONSTRAINT `tbtrilhalocomocao_ibfk_1` FOREIGN KEY (`idTrilha`) REFERENCES `tbtrilha` (`idTrilha`),
  ADD CONSTRAINT `tbtrilhalocomocao_ibfk_2` FOREIGN KEY (`idLocomocao`) REFERENCES `tbtipodelocomocao` (`idLocomocao`);

--
-- Limitadores para a tabela `tbusuariorealizatrilha`
--
ALTER TABLE `tbusuariorealizatrilha`
  ADD CONSTRAINT `tbusuariorealizatrilha_ibfk_1` FOREIGN KEY (`nicknameUsuario`) REFERENCES `tbusuario` (`nicknameUsuario`),
  ADD CONSTRAINT `tbusuariorealizatrilha_ibfk_2` FOREIGN KEY (`idTrilha`) REFERENCES `tbtrilha` (`idTrilha`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
