-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Abr-2020 às 20:40
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
(28, 27, 'Daniel', 'Venezuelanos', 'Eventos', 'adsdagsudgahjksgdh', '2020-04-23 00:36:06', '2020-04-23 00:36:06'),
(30, 29, 'bruno', 'Venezuelanos', 'Atendimento', '12312qsiou ayiudsghaiusdiua', '2020-04-23 00:43:28', '2020-04-23 00:43:28'),
(31, 28, 'João Gomes', 'Duvida joao', 'Atendimento', 'asddaghibdikuasbhdjkl', '2020-04-23 00:44:10', '2020-04-23 00:44:10');

-- --------------------------------------------------------

--
-- Estrutura da tabela `galeria`
--

CREATE TABLE `galeria` (
  `idFoto` int(11) NOT NULL,
  `tituloFoto` longtext NOT NULL,
  `categoriaFoto` longtext NOT NULL,
  `descFoto` longtext NOT NULL,
  `imgFullNameFoto` longtext NOT NULL,
  `orderFoto` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `galeria`
--

INSERT INTO `galeria` (`idFoto`, `tituloFoto`, `categoriaFoto`, `descFoto`, `imgFullNameFoto`, `orderFoto`) VALUES
(1, 'InteriorNaoFumadores', 'Espaço', 'Espaço de não fumadores, excelente para se recolher do mau tempo com a familia', 'interior.5ea9b5cddc0102.72922943.jpg', '1'),
(2, 'Entrada', 'Espaço', 'Entrada do nosso espaço, reconhecivel por todos de espinho', 'exterior-fachada.5ea9b6571bf4f4.00686286.jpg', '2'),
(3, 'Espaço Somersby', 'Espaço', 'Espaço  Somersby otimo para relaxar', 'exterior-bebida.5ea9ba760182f4.77706960.png', '3'),
(4, 'teste', 'teste', 'teste', 'teste.5ea9baa84b3544.97242563.png', '4');

-- --------------------------------------------------------

--
-- Estrutura da tabela `profileimg`
--

CREATE TABLE `profileimg` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(4, 27, 'Daniel Oliveira', 0, '2020-02-15', '15:02:00', 'Outro', 'daniel@gmail.com', '214748364', 'bla bla bla', '2020-04-23 00:39:32', '2020-04-29 14:45:33', 'cancelada'),
(5, 28, 'João Gomes', 0, '5220-02-15', '20:02:00', 'Jogo', 'admin@gmail.com', '214748364', 'asmdoajsondsjmndklsa', '2020-04-29 00:17:46', '2020-04-29 14:49:02', 'cancelada'),
(6, 28, 'João Gomes', 0, '2020-04-22', '15:40:00', 'Lanche', 'dara@gmail.com', '23131231', 'asdjabs jdahsbd', '2020-04-29 01:07:54', '2020-04-29 14:48:52', 'aprovada'),
(7, 30, 'Dara', 0, '2020-05-13', '15:00:00', 'Lanche', 'dara@gmail.com', '789546123', 'Vai ser top', '2020-04-29 01:51:00', '2020-04-29 14:41:21', 'aprovada'),
(8, 28, 'João Gomes', 0, '2020-05-22', '10:57:00', 'Outro', 'joaopfg.2002@gmail.com', '214748364', 'dsiahbdhabsdabshid', '2020-04-29 14:54:35', '2020-04-29 14:54:35', 'pendente'),
(9, 30, 'Dara Maria', 0, '2020-05-21', '10:00:00', 'Lanche', 'dara@gmail.com', '123213123', 'adszfdasdfasdfasdas', '2020-04-29 14:55:11', '2020-04-29 14:55:11', 'pendente'),
(10, 30, 'Dara Maria aaaaa', 10, '2020-05-15', '15:00:00', 'Lanche', 'dara@gmail.com', '214748364', 'adfsdsadsas', '2020-04-29 14:57:58', '2020-04-29 14:57:58', 'pendente');

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
(27, ' Daniel', 18, 'daniel@gmail.com', '202cb962ac59075b964b07152d234b70', 914578236, '2001-10-31', '2020-04-27 15:55:04', '2020-04-23 00:29:45', 'user', 'desativado'),
(28, 'João Gomes', 0, 'joaopfg.2002@gmail.com', '3dfcab79ed21fd89c9eb25e9864a6155', NULL, NULL, '2020-04-23 12:23:30', '2020-04-23 00:40:22', 'admin', 'ativo'),
(29, 'bruno', 0, 'bruno@gmail.com', '202cb962ac59075b964b07152d234b70', NULL, NULL, '2020-04-27 15:54:57', '2020-04-23 00:43:13', 'user', 'ativo'),
(30, 'Dara', 0, 'dara@gmail.com', '202cb962ac59075b964b07152d234b70', NULL, NULL, '2020-04-29 01:50:11', '2020-04-23 02:58:39', 'user', 'ativo'),
(31, 'João Fernandes', 0, 'joaogomes.emails@gmail.com', '202cb962ac59075b964b07152d234b70', NULL, NULL, '2020-04-27 14:59:06', '2020-04-23 02:59:47', 'user', 'ativo');

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
-- Índices para tabela `galeria`
--
ALTER TABLE `galeria`
  ADD PRIMARY KEY (`idFoto`);

--
-- Índices para tabela `profileimg`
--
ALTER TABLE `profileimg`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id_duvida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `galeria`
--
ALTER TABLE `galeria`
  MODIFY `idFoto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `profileimg`
--
ALTER TABLE `profileimg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

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
