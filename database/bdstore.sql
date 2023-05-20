-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20/05/2023 às 03:39
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
-- Banco de dados: `bdstore`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbstore`
--

CREATE TABLE `tbstore` (
  `idUser` int(100) NOT NULL,
  `clientStore` varchar(100) NOT NULL,
  `telStore` varchar(100) NOT NULL,
  `modStore` varchar(100) NOT NULL,
  `fabStore` varchar(100) NOT NULL,
  `seStore` varchar(100) NOT NULL,
  `desStore` varchar(100) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `tbstore`
--

INSERT INTO `tbstore` (`idUser`, `clientStore`, `telStore`, `modStore`, `fabStore`, `seStore`, `desStore`, `data`) VALUES
(1, 'Jonathan', '(88) 13348-9278', 'Lenovo Ieapad 3i', 'Lenovo', '15mL13i', 'Tecla G do teclado com defeito', '2023-05-20');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbusers`
--

CREATE TABLE `tbusers` (
  `idUser` int(100) NOT NULL,
  `nameUser` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `telUser` varchar(100) NOT NULL,
  `emailUser` varchar(100) NOT NULL,
  `passUser` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `tbusers`
--

INSERT INTO `tbusers` (`idUser`, `nameUser`, `username`, `telUser`, `emailUser`, `passUser`) VALUES
(1, 'Suporte', 'suporte', '(85) 97433-097', 'pereiradev2023@gmail.com', '123456'),
(2, 'usuário dois', 'user2', '(22) 22222-2222', 'dois@gmail.com', '222222');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tbstore`
--
ALTER TABLE `tbstore`
  ADD PRIMARY KEY (`idUser`);

--
-- Índices de tabela `tbusers`
--
ALTER TABLE `tbusers`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbstore`
--
ALTER TABLE `tbstore`
  MODIFY `idUser` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tbusers`
--
ALTER TABLE `tbusers`
  MODIFY `idUser` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
