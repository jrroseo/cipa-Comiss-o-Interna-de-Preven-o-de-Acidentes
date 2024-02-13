-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01/01/2024 às 01:53
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `candidato`
--
CREATE DATABASE `eleicaocipa`;
USE `eleicaocipa`;
-- --------------------------------------------------------

--
-- Estrutura para tabela `candidato`
--

CREATE TABLE `candidato` (
  `Ref_candidato` int(11) NOT NULL,
  `candidato` varchar(100) NOT NULL,
  `votos` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `candidato`
--

INSERT INTO `candidato` (`Ref_candidato`, `candidato`, `votos`) VALUES
(1, 'André', 123),
(2, 'Caleb', 55),
(3, 'Daniel', 21),
(4, 'Emanuel', 17),
(5, 'Felipe', 25),
(6, 'Gabriel', 34),
(7, 'João', 21),
(8, 'José', 32),
(9, 'Lucas', 21),
(10, 'Matheus', 40),
(11, 'Marcos', 46),
(12, 'Miguel', 40),
(13, 'Noah', 205),
(14, 'Pedro', 95),
(15, 'Tiago', 44),
(16, 'Rafael', 4);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `candidato`
--
ALTER TABLE `candidato`
  ADD PRIMARY KEY (`Ref_candidato`),
  ADD UNIQUE KEY `candidato` (`candidato`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `candidato`
--
ALTER TABLE `candidato`
  MODIFY `Ref_candidato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
