-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18-Abr-2020 às 02:23
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `elevens`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `duvidas`
--

CREATE TABLE `duvidas` (
  `userId` int(11) NOT NULL,
  `titulo` varchar(60) NOT NULL,
  `categoria` varchar(15) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `duvidas`
--

INSERT INTO `duvidas` (`userId`, `titulo`, `categoria`, `descricao`, `created_at`) VALUES
(1, 'Duvida joao', 'Horários', 'Fecha amanha?\r\n', '2020-04-18 00:44:21'),
(2, 'Duvida ANA', 'Eventos', 'asdsda', '2020-04-18 01:07:10'),
(10, 'Mmama', 'Atendimento', 'asdasdasd', '2020-04-18 01:20:16'),
(11, 'Duvida Lucas', 'Menus', 'asdasdasdas', '2020-04-18 01:01:06');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pass_reset`
--

CREATE TABLE `pass_reset` (
  `passResetId` int(11) NOT NULL,
  `passResetEmail` text NOT NULL,
  `passResetSelector` text NOT NULL,
  `passResetToken` longtext NOT NULL,
  `passResetExpires` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pass_reset`
--

INSERT INTO `pass_reset` (`passResetId`, `passResetEmail`, `passResetSelector`, `passResetToken`, `passResetExpires`) VALUES
(3, '', 'd205c4b5aa438140', '$2y$10$zNAhiH.Si9UDdf8aHgJJIuAy2/95U.JIraLfGdkHOsdNyOaEjntB6', '1587165022'),
(6, 'joaopfg.2002@gmail.com', '076b165b44f58016', '$2y$10$dquBxJlo8aLxrqBUQJfTT.Bw2hAeuk1crc1pZW2f30JADU/7EQ69C', '1587165201');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` tinytext NOT NULL,
  `email` tinytext NOT NULL,
  `password` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'João Gomes', 'joaopfg.2002@gmail.com', '$2y$10$lgtPEt4UYPX1L382oXU0U.Z4SaCKcnMoYhti.7x3jWdyoWWX3ja2O'),
(2, 'Ana Maria', 'ana@gmail.com', '$2y$10$M5WaZTKgC55j/EhkxAxt..hsb6d2Uvbsm.uguXeVLrxZt5gNHMWgG'),
(3, 'Mario Maia', 'mario@gmail.com', '$2y$10$OKH.LNHibWzX5JePuvoMt.hv2pmgqUz0O5.nCVNBgC4NYzEqJe0X6'),
(4, 'Dara', 'dara@gmail.com', '$2y$10$AQJA2XjTLnAHWc231yL1N.3cqd.L3TQeg/OW3Cy7iTX6fC3VE9vyq'),
(5, 'admin', 'admin@gmail.com', '$2y$10$5AD0Ppisd8bbL8F56pPMvOGphjqTTC6ROQm8F4aiMenJUwJ6akcaG'),
(6, 'Claudio', 'claudio@gmail.com', '$2y$10$qdgzZ5NmvO.dd702fxsq3eHNeBAjCIIALPseX8/bOd8Dseo.Cc2S2'),
(7, 'Rita', 'rita@gmail.com', '$2y$10$Czl3jKBBlzFSqnFfXk9Lb.E4Y.vtW1JdlQYwYkCY8XyYnJoYMswM2'),
(8, 'Eva', 'eva@gmail.com', '$2y$10$g/WIG0eUB/nQai0IsNvNAuBojtF4K9b2wyWKk0rqG4JuFN7nmEBbW'),
(9, 'Ivo', 'ivo@gmail.com', '$2y$10$mnNFaZxdIK64/6AR50Snee2UJqcnVoTMVOoTJlC0hIjdHwSSGePa.'),
(10, 'Luis', 'luis@gmail.com', '$2y$10$71A/cKik/4O8z9aQy365NOdMimcrAZCWOmZ12xrcmkWsuF/H8xQk6'),
(11, 'Lucas', 'lucas@gmail.com', '$2y$10$IxrevO9Dn0ZSqWG7dVq0G.GNllta7bSxSLSnsjXg4MJj8OeEQUj2y');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `duvidas`
--
ALTER TABLE `duvidas`
  ADD PRIMARY KEY (`userId`);

--
-- Índices para tabela `pass_reset`
--
ALTER TABLE `pass_reset`
  ADD PRIMARY KEY (`passResetId`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `pass_reset`
--
ALTER TABLE `pass_reset`
  MODIFY `passResetId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
