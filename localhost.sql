-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 
-- Versão do Servidor: 5.5.25a
-- Versão do PHP: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `bd2014_imasters_phpoop`
--
CREATE DATABASE `bd2014_imasters_phpoop` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bd2014_imasters_phpoop`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `task`
--

CREATE TABLE IF NOT EXISTS `task` (
  `idTask` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `taskName` varchar(40) NOT NULL,
  `taskDescription` text NOT NULL,
  `taskStatus` tinyint(1) NOT NULL,
  `taskOpened` datetime NOT NULL,
  PRIMARY KEY (`idTask`),
  UNIQUE KEY `taskName` (`taskName`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `task`
--

INSERT INTO `task` (`idTask`, `taskName`, `taskDescription`, `taskStatus`, `taskOpened`) VALUES
(1, 'Tarefa 1', 'tarefa teste', 1, '2014-06-04 16:29:59'),
(2, 'Tarefa 2 ', 'outra tarefa', 1, '2014-06-04 16:33:03');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
