-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07-Nov-2023 às 18:26
-- Versão do servidor: 10.4.20-MariaDB
-- versão do PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdagendamedico`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbagendas`
--

CREATE TABLE `tbagendas` (
  `data` date NOT NULL,
  `numero_horario` int(11) NOT NULL,
  `cpf_usuario` varchar(15) DEFAULT NULL,
  `cpf_medico` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbagendas`
--

INSERT INTO `tbagendas` (`data`, `numero_horario`, `cpf_usuario`, `cpf_medico`) VALUES
('2023-09-13', 1, '123', '1'),
('2023-09-13', 2, '456', '2'),
('2023-10-22', 2, '900', '22222222222'),
('2023-10-24', 2, '900', '11111111111'),
('2023-10-28', 3, '500', '11111111111'),
('2023-10-28', 2, '900', '11111111111'),
('2023-11-02', 11, '500', '11111111111'),
('2023-11-02', 4, '900', '11111111111'),
('2023-10-31', 2, '900', '33333333333'),
('2023-11-09', 2, '39190451813', '33333333333');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbhorarios`
--

CREATE TABLE `tbhorarios` (
  `numero` int(11) NOT NULL,
  `descricao` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbhorarios`
--

INSERT INTO `tbhorarios` (`numero`, `descricao`) VALUES
(1, '9H - 9H30'),
(2, '9h30 - 10H'),
(3, '10H - 10H30'),
(4, '10H30 - 11H'),
(5, '11H - 11H30'),
(6, '13H - 13H30'),
(7, '13H30 - 14H'),
(8, '14H - 14H30'),
(9, '14H30 - 15H'),
(10, '15H - 15H30'),
(11, '15H30 - 16H');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbmedicos`
--

CREATE TABLE `tbmedicos` (
  `nome` varchar(255) NOT NULL,
  `especialidade` varchar(100) DEFAULT NULL,
  `crm` varchar(8) DEFAULT NULL,
  `contato` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `cpf` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbmedicos`
--

INSERT INTO `tbmedicos` (`nome`, `especialidade`, `crm`, `contato`, `email`, `endereco`, `cpf`) VALUES
('Leonardo Felipe', 'Oftamologista', '21120', '997805463', 'jehas17723@upshopt.com', 'Rua das flores 725', '53744352803'),
('Stefany Leticia', 'Cirurgiã Dentista', '23501', '40028922', 'stefani.teste@gmail.com', 'Rua Conceição dos ouros 420', '57245802840');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbusuarios`
--

CREATE TABLE `tbusuarios` (
  `cpf` varchar(15) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `contato` varchar(20) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `tipo` char(1) DEFAULT NULL,
  `ativo` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbusuarios`
--

INSERT INTO `tbusuarios` (`cpf`, `nome`, `contato`, `senha`, `tipo`, `ativo`) VALUES
('39190451813', 'Pedro henrique', '33654269', '$2y$10$WIkfh7U4FXUXeSiWd.IUPeu1nMii8aT0MbbKNu6dawugSQFPsBhDe', 'u', 's'),
('44853555862', 'Ariela Perez', '33941265', '$2y$10$jbsGykXdM3HHD21JEob3O.u7fYMcozeQmn/TkUk.4lXdO8q7XgHFi', 'a', 's'),
('53744352803', 'Leonardo Felipe', '997805463', '$2y$10$qF96BLIMPPcbi2qi7h/ABu03FId60CGTPM3ETzlrf1ZMVEWrHT55C', 'm', 's'),
('57245802840', 'Stefany Leticia', '998753030', '$2y$10$/yrOp7dutNnpUpRwUZacPOE2z7gZs.j4MwXmBsXmFZrV7G9o99tfS', 'm', 's');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbagendas`
--
ALTER TABLE `tbagendas`
  ADD PRIMARY KEY (`data`,`numero_horario`),
  ADD KEY `numero_horario` (`numero_horario`),
  ADD KEY `cpf_usuario` (`cpf_usuario`),
  ADD KEY `cpf_medico` (`cpf_medico`);

--
-- Índices para tabela `tbhorarios`
--
ALTER TABLE `tbhorarios`
  ADD PRIMARY KEY (`numero`);

--
-- Índices para tabela `tbmedicos`
--
ALTER TABLE `tbmedicos`
  ADD PRIMARY KEY (`cpf`),
  ADD UNIQUE KEY `crm` (`crm`);

--
-- Índices para tabela `tbusuarios`
--
ALTER TABLE `tbusuarios`
  ADD PRIMARY KEY (`cpf`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbhorarios`
--
ALTER TABLE `tbhorarios`
  MODIFY `numero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
