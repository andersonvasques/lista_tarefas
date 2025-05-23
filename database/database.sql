-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23/05/2025 às 03:15
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_to_do_list`
--
CREATE DATABASE IF NOT EXISTS `bd_to_do_list` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bd_to_do_list`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_list`
--

CREATE TABLE `tbl_list` (
  `key_tarefa` int(11) UNSIGNED NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `data_criacao` date NOT NULL,
  `fk_usuario` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbl_list`
--

INSERT INTO `tbl_list` (`key_tarefa`, `titulo`, `descricao`, `data_criacao`, `fk_usuario`) VALUES
(28, 'teste1', 'teste1 teste1 teste1 teste1 teste1 teste1 teste1', '2025-05-21', 12),
(29, 'teste', 'teste', '2025-05-21', 12),
(30, 'teste', 'teste', '2025-05-21', 12),
(31, 'teste', 'teste', '2025-05-21', 12),
(32, 'teste', 'teste', '2025-05-21', 12),
(33, 'teste', 'teste', '2025-05-21', 12),
(35, 'Ler', 'Ler o livro', '2025-05-22', 12),
(39, 'teste 2', 'teste 2 teste 2 teste 2 teste 2 teste 2 teste 2 teste 2 teste 2 teste 2 teste 2 teste 2 teste 2 teste 2 teste 2 teste 2 teste 2 teste 2 teste 2 teste 2 teste 2 teste 2 teste 2 teste 2 teste 2 teste 2 teste 2 teste 2 teste 2 teste 2 teste 2 teste 2 teste 2 teste 2 teste 2 teste 2 olá', '2025-05-22', 12);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_users`
--

CREATE TABLE `tbl_users` (
  `key_usuario` int(11) UNSIGNED NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `data_cadastro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbl_users`
--

INSERT INTO `tbl_users` (`key_usuario`, `usuario`, `senha`, `nome`, `data_cadastro`) VALUES
(12, 'Anderson Vasques', '$2y$10$.ii25gkDwQRkbqRKCkjxSORxdVT1813xxLtVFBYzfo/mTwfS1/53e', 'Anderson', '2025-05-20'),
(13, 'pedro', '$2y$10$zXEMYQU.45AP91A21mxWZOrW.cINWiHZ4peQ5aXwSMqleb32NPtoC', 'Pedro', '2025-05-21'),
(14, 'alice', '$2y$10$M8rJwAPb//N3p1/3Kpo9eun0blnyy93fdN0AJruH4gjwobQU9Z4cm', 'Alice', '2025-05-21');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tbl_list`
--
ALTER TABLE `tbl_list`
  ADD PRIMARY KEY (`key_tarefa`),
  ADD KEY `fk_key_usuario` (`fk_usuario`);

--
-- Índices de tabela `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`key_usuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbl_list`
--
ALTER TABLE `tbl_list`
  MODIFY `key_tarefa` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de tabela `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `key_usuario` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tbl_list`
--
ALTER TABLE `tbl_list`
  ADD CONSTRAINT `fk_key_usuario` FOREIGN KEY (`fk_usuario`) REFERENCES `tbl_users` (`key_usuario`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
