-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 14-Set-2020 às 07:10
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
  `ro_votes` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='opções de cada enquete e quantos votos esta teve';

--
-- Extraindo dados da tabela `en_resp_options`
--

INSERT INTO `en_resp_options` (`ro_id`, `fk_sur_id`, `ro_value`, `ro_votes`) VALUES
(35, 12, 'Laranja', 21),
(36, 12, 'Abacaxi', 23),
(37, 12, 'Melancia', 28),
(38, 13, 'PHP', 115),
(39, 13, 'JAVASCRIPT', 107),
(40, 13, 'C#', 32),
(41, 13, 'C++', 21),
(42, 13, 'RUST', 3),
(43, 13, 'PYTHON', 16),
(44, 13, 'GO', 4),
(45, 13, 'FORTRAN', 5),
(57, 17, 'Vingadores ', 12),
(58, 17, 'Jhon wick 3', 27),
(59, 17, 'Matrix', 31),
(60, 17, 'Superman', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `en_survey`
--

CREATE TABLE `en_survey` (
  `sur_id` int(11) NOT NULL,
  `sur_name` varchar(100) NOT NULL,
  `fk_status_id` int(11) NOT NULL,
  `sur_start_d` datetime NOT NULL,
  `sur_end_D` datetime NOT NULL,
  `fk_usr_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='aramazena enquetes e seus registros';

--
-- Extraindo dados da tabela `en_survey`
--

INSERT INTO `en_survey` (`sur_id`, `sur_name`, `fk_status_id`, `sur_start_d`, `sur_end_D`, `fk_usr_id`) VALUES
(12, 'Qual o seu suco preferido ?', 2, '2020-09-13 00:00:00', '2020-09-26 00:00:00', 16),
(13, 'Qual a sua linguagem de programação favorita ?', 3, '2020-09-13 22:19:00', '2020-09-13 12:19:00', 16),
(17, 'Qual o melhor filme ?', 2, '2020-09-14 02:05:00', '2020-09-30 02:07:00', 21);

-- --------------------------------------------------------

--
-- Estrutura da tabela `en_survey_status`
--

CREATE TABLE `en_survey_status` (
  `ss_id` int(11) NOT NULL,
  `ss_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Estatus das enquetes';

--
-- Extraindo dados da tabela `en_survey_status`
--

INSERT INTO `en_survey_status` (`ss_id`, `ss_name`) VALUES
(2, 'ativo'),
(3, 'inativo');

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
-- Extraindo dados da tabela `en_user`
--

INSERT INTO `en_user` (`usr_id`, `usr_name`, `usr_email`, `usr_pass`) VALUES
(14, 'erick', 'erick@gmail.com', '$2y$10$Xtlh7L970Usfn9k.iphCa./7WyG20L6G39HwzPrG07wdJja5BrUv6'),
(16, 'ericklin', 'js07@gmail.com', '$2y$10$iHWVCAPz20nJRfyyJv7D/uQcbl35HogfwZq55RK4VpYEY7L.Bfuly'),
(17, 'Jonas', 'jonas@gmail.com', '$2y$10$WLg1hqb7GgkSffL.WBVleeOGbh5H1/igPmTl1p6LNbNydHpFTB0RS'),
(18, 'joão nunes ', 'joao@gmail.com', '$2y$10$8XsWC7ATrYwEHhCjgK7QCOpwXnqEA1eQGVNcfBROLdq2KvVCvCJIe'),
(19, 'Lucas', 'lucas@gmail.com', '$2y$10$nXwa5iox5Dse8./bUgiXQ.1QAn6UMNluRxcdvxq3MBAyMI7/s.baC'),
(21, 'manolo', 'manolo@gmail.com', '$2y$10$JZxveXQwe2I4WRKv1OmNRuwXy2o/LBP2Eui4tJr2EKB2ZJRiwt5f6');

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
  MODIFY `ro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de tabela `en_survey`
--
ALTER TABLE `en_survey`
  MODIFY `sur_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `en_survey_status`
--
ALTER TABLE `en_survey_status`
  MODIFY `ss_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `en_user`
--
ALTER TABLE `en_user`
  MODIFY `usr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
