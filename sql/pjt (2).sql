-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18/11/2023 às 20:44
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
-- Banco de dados: `pjt`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `collection`
--

CREATE TABLE `collection` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `author` varchar(200) DEFAULT NULL,
  `imageName` varchar(200) DEFAULT NULL,
  `curDate` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `collection`
--

INSERT INTO `collection` (`id`, `name`, `author`, `imageName`, `curDate`) VALUES
(4, 'dda', 'asd', '1e727550-f357-48e8-9369-ea48183510c9.jpeg', '2023-10-20 22:42:49'),
(10, 'Auto Retrato de Tarsila do Amaral', 'Tarsila Do Amaral', 'arte1.JPG', '2023-11-13 21:32:34'),
(11, 'Retrato de Denise', 'Portinari', 'arte2.JPG', '2023-11-13 21:33:38'),
(12, 'Indio Emo Bombado', 'Portinari', 'arte3.JPG', '2023-11-13 21:34:03'),
(13, 'ondas', 'Sonia Corda', 'arte4.JPG', '2023-11-13 21:34:33'),
(14, 'Ondinhas', 'Sonia Corda', 'arte5.JPG', '2023-11-13 21:35:16'),
(15, 'Recortes de uma mente genial', 'Nicolas', 'arte7.JPG', '2023-11-13 21:35:37'),
(16, 'Refugiados', 'Portinari', 'arte8.JPG', '2023-11-13 21:36:02');

-- --------------------------------------------------------

--
-- Estrutura para tabela `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `commentContent` varchar(500) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date_added` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--


--
-- Estrutura para tabela `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `desc` text NOT NULL,
  `date` datetime DEFAULT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `tickets_amnt` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `events`
--#mudou o *

INSERT INTO `events` (`id`, `name`, `desc`, `date`, `date_added`, `tickets_amnt`) VALUES
(7, 'monalisa exposition', 'a lot of our collection items and Monalisa!!', '2023-11-25 00:00:00', '2023-11-12 22:50:29', 40),
(8, 'Nicolas Mota', 'ASDASD', '2023-10-31 00:00:00', '2023-11-18 16:44:12', 300);

-- --------------------------------------------------------

--
-- Estrutura para tabela `password_recovery`
--

CREATE TABLE `password_recovery` (
  `email` varchar(250) NOT NULL,
  `token` varchar(250) NOT NULL,
  `expDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `password_recovery`
--

INSERT INTO `password_recovery` (`email`, `token`, `expDate`) VALUES
('nicjmota@gmail.com', 'cf6ddf7d0c9e80284a3d9ae4c136df69', '2023-10-15 16:03:25'),
('nicjmota@gmail.com', '6ec0e2a0f19ec3c354a16182b193475a', '2023-10-15 16:03:28'),
('nicjmota@gmail.com', '82efec437954d14029ef0f92566ec405', '2023-10-15 16:17:26'),
('nicjmota@gmail.com', '2f1589f9385d7d8ece2dfcf19a90298f', '2023-10-15 16:20:03'),
('nicjmota@gmail.com', 'b2ac6ea9deb7c3015cb7bad90ff4325e', '2023-10-17 00:14:33'),
('nicjmota5@gmail.com', '8143feabece2c0a733febd251edbaa14', '2023-10-17 00:18:12'),
('nicjmota4@gmail.com', 'f189aba9e9701beea0a40f996d65394c', '2023-10-17 00:39:13'),
('nicjmota2@gmail.com', '6b6055c15075b3a31aa6f4ac15be39f5', '2023-10-22 03:39:23');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) DEFAULT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tickets`
--

INSERT INTO `tickets` (`id`, `price`, `event_id`, `date_added`, `user_id`, `amount`) VALUES
(63, 0.00, 7, '2023-11-12 22:51:43', 27, 2),
(64, 0.00, 7, '2023-11-12 23:02:05', 23, 34),
(65, 0.00, 7, '2023-11-18 16:43:25', 23, 1),
(66, 0.00, 7, '2023-11-18 16:43:31', 23, 1),
(67, 0.00, 7, '2023-11-18 16:43:38', 23, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `admin` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `user`, `name`, `email`, `phone`, `pass`, `admin`) VALUES
(23, 'Nicolas', 'Brisas123', 'nicjmota@gmail.com', '19992185912', '$2y$10$aI7bdDbBVRBS9SP973BpBu5yD.CNpAzdMqEONaNL/SqzxhksQaAwO', b'0'),
(27, 'admin', 'admin', 'admin', 'admin', '$2y$10$OLO44VqRha2VLgmSn5zFLuD9h/QG7eEFhikGmmPGkyPcg9Qlj0NsC', b'1');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `collection`
--
ALTER TABLE `collection`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `collection`
--
ALTER TABLE `collection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `event_id` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`),
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`),
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

DELIMITER $$
--
-- Eventos
--
CREATE DEFINER=`root`@`localhost` EVENT `deletar_expirados_evento` ON SCHEDULE EVERY 1 DAY STARTS '2023-10-13 10:35:19' ON COMPLETION NOT PRESERVE ENABLE COMMENT 'Deleta linhas expiradas' DO BEGIN
    DELETE FROM password_recovery WHERE expDate < NOW();
  END$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
