-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22-Abr-2020 às 02:31
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
(26, 24, 'Dara', 'Dara', 'Horários', 'ashdiuyhasioudhaisuhdiu', '2020-04-21 22:34:50', '2020-04-21 22:34:50');

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
(7, 'joaopfg.2002@gmail.com', 'e5d5f7d0b7e8032a', '$2y$10$v5ItVvD/3yMorOBo0GysNeeAJbHI.JLE3onqK.AyOokK4XbgFyaeS', '1587516780'),
(8, 'joaogomes.emails@gmail.com', '587e2df9fdc09dd9', '$2y$10$arb/7nJhle4eLRWFAyFeiuzII5tkG3RvbwXP./NIyX5uiaWYO1qWa', '1587516829');

-- --------------------------------------------------------

--
-- Estrutura da tabela `reservas`
--

CREATE TABLE `reservas` (
  `id_reserva` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `client_name` varchar(50) NOT NULL,
  `number_pessoas` int(11) NOT NULL,
  `date_reserva` date NOT NULL,
  `time_reserva` time NOT NULL,
  `categoria` tinytext NOT NULL,
  `client_email` varchar(255) NOT NULL,
  `client_phone` varchar(9) NOT NULL,
  `observacoes` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` text NOT NULL DEFAULT 'pendente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `reservas`
--

INSERT INTO `reservas` (`id_reserva`, `id_client`, `client_name`, `number_pessoas`, `date_reserva`, `time_reserva`, `categoria`, `client_email`, `client_phone`, `observacoes`, `created_at`, `updated_at`, `status`) VALUES
(1, 25, 'João Gomes', 0, '2200-02-15', '15:21:00', 'Outro', 'gustavo@gmail.com', '915248736', 'sou gay?', '2020-04-21 23:58:38', '2020-04-21 23:58:38', 'pendente'),
(2, 24, 'Dara ', 0, '2002-04-18', '15:04:00', 'Jogo', 'dara@gmail.com', '23131231', 'askuhdhjkabhsdjghasbdh', '2020-04-22 00:19:39', '2020-04-22 00:19:39', 'pendente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` tinytext NOT NULL,
  `age` int(11) NOT NULL,
  `email` tinytext NOT NULL,
  `password` longtext NOT NULL,
  `phone` int(9) DEFAULT NULL,
  `born_date` date DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_status` varchar(10) NOT NULL DEFAULT 'user',
  `acount_status` text NOT NULL DEFAULT 'ativo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `username`, `age`, `email`, `password`, `phone`, `born_date`, `updated_at`, `created_at`, `user_status`, `acount_status`) VALUES
(23, 'João Gomes', 0, 'joaopfg.2002@gmail.com', '$2y$10$9Jsnk3QR4UP8ZD3edtduHuSs.bFCBsyE3gfWInbf7F1YSlTIZQU1S', NULL, NULL, '2020-04-21 22:38:29', '2020-04-21 20:09:37', 'admin', 'ativo'),
(24, ' Dara', 18, 'dara@gmail.com', '$2y$10$A5.HjQxxWUE9OfPCTKSyV.8JkU67Es32xKdNsQe7tUdAgSY7D7LMm', 963258741, '2001-04-24', '2020-04-21 22:36:26', '2020-04-21 22:15:43', 'user', 'ativo'),
(25, ' Gustavo Rocha', 17, 'gustavo@gmail.com', '$2y$10$iiDEhNNwTm3rK43OrheU9eEkmRC.S7oJRXoFYvcuOlB5LBhVQoQJ6', 915478632, '0021-02-15', '2020-04-21 22:52:18', '2020-04-21 22:16:05', 'user', 'ativo');

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
-- Índices para tabela `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `id_client` (`id_client`);

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
  MODIFY `id_duvida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `pass_reset`
--
ALTER TABLE `pass_reset`
  MODIFY `passResetId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `duvidas`
--
ALTER TABLE `duvidas`
  ADD CONSTRAINT `duvidas_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `reservas_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
