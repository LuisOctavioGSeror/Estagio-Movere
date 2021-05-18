-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18-Maio-2021 às 19:12
-- Versão do servidor: 10.4.19-MariaDB
-- versão do PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `movere_vendas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `ID` int(11) NOT NULL,
  `Nome_completo` varchar(255) NOT NULL,
  `CNPJ` varchar(255) NOT NULL,
  `Localizacao` varchar(255) NOT NULL,
  `Data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`ID`, `Nome_completo`, `CNPJ`, `Localizacao`, `Data`) VALUES
(1, 'bons pneus ltda', '12342143.12341234.123412342', 'avenida das torres, 167', '2021-05-15 17:55:10'),
(2, 'bons pneus do joao ltda', '12352353.12341234.123412342', 'avenida das torres, 168', '2021-05-15 18:01:15'),
(3, 'bons pneus do carlos ltda', '6797697.12341234.123412342', 'avenida das torres, 169', '2021-05-15 18:01:44'),
(4, 'peças do fernando ltda', '1234.1234.25.652356.546', 'carmindo de campos, 123', '2021-05-15 18:34:23'),
(5, 'marcelo pneus .ltda', '1234.643745.87686.969.65', 'algum lugar ,233', '2021-05-15 15:14:11'),
(6, 'lojinha do said', '1231.23424.536.356.123', 'outro lugar, 1234', '2021-05-15 18:24:44'),
(7, 'curupira', '123.12312.324.35.56.456', 'floresta', '2021-05-15 19:15:30'),
(8, 'boi tata', '234.23423.534.53', 'floresta', '2021-05-15 19:45:09');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tabela_usuarios`
--

CREATE TABLE `tabela_usuarios` (
  `ID` int(11) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tabela_usuarios`
--

INSERT INTO `tabela_usuarios` (`ID`, `usuario`, `senha`) VALUES
(3, 'admin', 'moverevendas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `ID` int(11) NOT NULL,
  `Nome_completo` varchar(255) NOT NULL,
  `CPF` varchar(255) NOT NULL,
  `Valor` int(11) NOT NULL,
  `Data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`ID`, `Nome_completo`, `CPF`, `Valor`, `Data`) VALUES
(1, 'tadaaaaaa', '028.264.433.44', 20, '2021-05-16 22:47:27'),
(2, 'Eduardo', '033.264.433.44', 50, '2021-05-16 22:47:58'),
(3, 'janaina', '027.264.433.90', 200, '2021-05-16 22:57:52'),
(4, 'rafael', '033.264.499.40', 500, '2021-05-17 01:26:24'),
(5, 'marcos', '028.264.333.44', 1000, '2021-05-17 01:37:31'),
(6, 'Gustavo', '333.333.431-86', 2000, '2021-05-17 03:27:07'),
(7, 'Gustavo reis', '444.264.431-86', 300, '2021-05-17 03:29:28'),
(8, 'carlos reis', '222.264.431-86', 230, '2021-05-17 03:30:28'),
(9, 'mateus', '111.264.441-86', 450, '2021-05-17 03:31:40'),
(10, 'joao', '777.264.431-86', 700, '2021-05-17 03:32:41'),
(11, 'luis', '028.264.431-86', 600, '2021-05-17 03:33:29'),
(12, 'boi tata', '028.264.999-99', 10000, '2021-05-17 03:33:59'),
(13, 'curupira', '028.345.777-86', 700, '2021-05-17 03:35:06'),
(14, 'jonas', '028.999.999-99', 10, '2021-05-17 03:36:05'),
(15, 'joana', '111.111.111.11', 320, '2021-05-17 03:37:46'),
(16, 'uma pessoa sem nome', '000.000.000.-00', 300, '2021-05-17 03:39:38'),
(17, 'uma pessoa sem nome', '000.000.000.-00', 400, '2021-05-17 03:40:21'),
(18, 'uma pessoa sem nome', '000.000.000.-00', 300, '2021-05-17 03:40:42'),
(19, 'lucas', '028.264.431-00', 700, '2021-05-17 03:41:04'),
(20, 'luis carlos', '000.000.031-86', 300, '2021-05-17 03:42:31'),
(21, 'luis', '028.264.431-86', 200, '2021-05-17 03:43:41'),
(22, 'luis', '028.264.431-86', 200, '2021-05-17 03:44:29'),
(23, 'luis', '028.264.431-86', 200, '2021-05-17 03:44:57'),
(24, 'luis', '028.264.431-86', 200, '2021-05-17 03:45:38'),
(25, 'luis', '028.264.431-86', 500, '2021-05-17 03:47:01'),
(26, 'luis', '028.264.431-86', 200, '2021-05-17 03:47:45'),
(27, 'luis pedro', '028.264.431-000', 600, '2021-05-17 03:48:54'),
(28, 'luis pedro', '028.264.431-89', 400, '2021-05-17 03:50:10'),
(29, 'luis', '028.264.431-86', 600, '2021-05-17 03:51:01'),
(30, 'luis', '028.264.431-86', 300, '2021-05-17 03:52:07'),
(31, 'rafael', '028.264.433.44', 200, '2021-05-17 03:52:43'),
(32, 'rafael', '027.264.433.44', 200, '2021-05-17 03:57:02'),
(33, 'rafael', '028.264.433.44', 20, '2021-05-17 03:57:56'),
(34, 'username', '028.264.433.44', 200, '2021-05-17 03:59:14'),
(35, 'tadaaaaaa', '027.264.433.44', 500, '2021-05-17 03:59:40'),
(36, 'joao', '028.264.431-90', 700, '2021-05-17 04:05:47');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `tabela_usuarios`
--
ALTER TABLE `tabela_usuarios`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `tabela_usuarios`
--
ALTER TABLE `tabela_usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
