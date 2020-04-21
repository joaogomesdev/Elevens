-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21-Abr-2020 às 04:07
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
  `id_duvida` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `username` tinytext NOT NULL,
  `titulo` tinytext NOT NULL,
  `categoria` tinytext NOT NULL,
  `descricao` longtext NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `duvidas`
--

INSERT INTO `duvidas` (`id_duvida`, `id_user`, `username`, `titulo`, `categoria`, `descricao`, `create_at`, `update_at`) VALUES
(9, 12, 'bruno', 'Jantar', 'Horários', 'Apartir de que horas servem jantar?', '2020-04-20 22:57:01', '2020-04-20 22:57:01'),
(11, 15, 'Daniel', 'Sou gay?', 'Outro', 'será que sou gay?', '2020-04-20 23:02:44', '2020-04-20 23:02:44'),
(12, 14, 'Dara', 'Sangria', 'Menus', 'Tem sangria?', '2020-04-20 23:07:27', '2020-04-20 23:07:27'),
(21, 13, 'João Gomes', 'Dara', 'Horários', '1asdasd', '2020-04-21 02:01:22', '2020-04-21 02:01:22');

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
  `password` longtext NOT NULL,
  `user_status` varchar(10) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `user_status`) VALUES
(12, 'bruno', 'bruno@gmail.com', '$2y$10$b6wYNAi/JtwF6coEQcuQ7uj05eK.kdMXDuEBIthNBM8ACM/BtTdUK', 'user'),
(13, 'João Gomes', 'joaopfg.2002@gmail.com', '$2y$10$wh6Z1Db6iutkYcQa80BXQOX3q8.jzRDp7ZRYVEtxet13nXCamb.si', 'admin'),
(14, 'Dara', 'dara@gmail.com', '$2y$10$ocrdhbHLRSvPDq1/E4kJj.OP5L6J2MHACYGd6NpI5vfznW8CCzalK', 'user'),
(15, 'Daniel', 'daniel@gmail.com', '$2y$10$ZH822ffJXvFJlXIHUfPhM.7eMc3kA/utCWPZ/LbdLXgSsg.XGOflK', 'user');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `duvidas`
--
ALTER TABLE `duvidas`
  ADD PRIMARY KEY (`id_duvida`),
  ADD KEY `id_user` (`id_user`);

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
-- AUTO_INCREMENT de tabela `duvidas`
--
ALTER TABLE `duvidas`
  MODIFY `id_duvida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `pass_reset`
--
ALTER TABLE `pass_reset`
  MODIFY `passResetId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `duvidas`
--
ALTER TABLE `duvidas`
  ADD CONSTRAINT `duvidas_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
