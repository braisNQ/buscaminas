-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Brais Carrión Ansias
--
-- Xerado en: 11 de Mar de 2015
-- Versión do servidor: 5.6.20
-- Versión do PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `buscaminas`
--
CREATE DATABASE IF NOT EXISTS `buscaminas` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `buscaminas`;

-- --------------------------------------------------------

--
-- Estrutura da táboa `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
`ID` int(11) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `nivel` tinyint(4) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `mail` (`mail`);

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Estrutura da táboa `partida`
--

DROP TABLE IF EXISTS `partida`;
CREATE TABLE IF NOT EXISTS `partida` (
`ID` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `dimension` int(11) NOT NULL,
  `tempo` int(11) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

--
-- Indexes for table `partida`
--
ALTER TABLE `partida`
 ADD PRIMARY KEY (`ID`), ADD KEY `fk_id_usuario` (`id_usuario`);

--
-- Restricións para a táboa `partida`
--
ALTER TABLE `partida`
ADD CONSTRAINT `partida_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`ID`) ON DELETE CASCADE;

--
-- AUTO_INCREMENT for table `partida`
--
ALTER TABLE `partida`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

-- --------------------------------------------------------

--
-- Crear usuario admin
--

INSERT INTO `usuario` (`ID`, `mail`, `nome`, `pass`, `nivel`) VALUES
(1, 'admin@buscaminas.es', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
