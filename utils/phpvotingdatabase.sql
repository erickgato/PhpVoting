-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 11-Set-2020 às 03:50
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `phpvotingdatabase`
--
CREATE DATABASE IF NOT EXISTS `phpvotingdatabase` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `phpvotingdatabase`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `en_resp_options`
--

CREATE TABLE `en_resp_options` (
  `ro_id` int(11) NOT NULL,
  `fk_sur_id` int(11) NOT NULL,
  `ro_value` varchar(50) NOT NULL,
  `ro_votes` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='opções de cada enquete e quantos votos esta teve';

-- --------------------------------------------------------

--
-- Estrutura da tabela `en_survey`
--

CREATE TABLE `en_survey` (
  `sur_id` int(11) NOT NULL,
  `sur_name` varchar(100) NOT NULL,
  `fk_status_id` int(11) NOT NULL,
  `sur_start_d` date NOT NULL,
  `sur_end_D` date NOT NULL,
  `fk_usr_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='aramazena enquetes e seus registros';

-- --------------------------------------------------------

--
-- Estrutura da tabela `en_survey_status`
--

CREATE TABLE `en_survey_status` (
  `ss_id` int(11) NOT NULL,
  `ss_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Estatus das enquetes';

-- --------------------------------------------------------

--
-- Estrutura da tabela `en_user`
--

CREATE TABLE `en_user` (
  `usr_id` int(11) NOT NULL,
  `usr_name` varchar(300) NOT NULL,
  `usr_email` varchar(500) NOT NULL,
  `usr_pass` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Tabela para relacionar usuários com suas enquetes';

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `en_resp_options`
--
ALTER TABLE `en_resp_options`
  ADD PRIMARY KEY (`ro_id`),
  ADD KEY `fk_ro_survey` (`fk_sur_id`);

--
-- Índices para tabela `en_survey`
--
ALTER TABLE `en_survey`
  ADD PRIMARY KEY (`sur_id`),
  ADD KEY `fk_survey_status` (`fk_status_id`),
  ADD KEY `fk_suervey_user` (`fk_usr_id`);

--
-- Índices para tabela `en_survey_status`
--
ALTER TABLE `en_survey_status`
  ADD PRIMARY KEY (`ss_id`);

--
-- Índices para tabela `en_user`
--
ALTER TABLE `en_user`
  ADD PRIMARY KEY (`usr_id`,`usr_email`),
  ADD UNIQUE KEY `unique_usr_name` (`usr_name`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `en_resp_options`
--
ALTER TABLE `en_resp_options`
  MODIFY `ro_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `en_survey`
--
ALTER TABLE `en_survey`
  MODIFY `sur_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `en_survey_status`
--
ALTER TABLE `en_survey_status`
  MODIFY `ss_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `en_user`
--
ALTER TABLE `en_user`
  MODIFY `usr_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `en_resp_options`
--
ALTER TABLE `en_resp_options`
  ADD CONSTRAINT `fk_ro_survey` FOREIGN KEY (`fk_sur_id`) REFERENCES `en_survey` (`sur_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `en_survey`
--
ALTER TABLE `en_survey`
  ADD CONSTRAINT `fk_suervey_user` FOREIGN KEY (`fk_usr_id`) REFERENCES `en_user` (`usr_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_survey_status` FOREIGN KEY (`fk_status_id`) REFERENCES `en_survey_status` (`ss_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
