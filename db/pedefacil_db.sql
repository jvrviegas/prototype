-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 02-Abr-2019 às 21:17
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pedefacil_db`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_pedidos`
--

CREATE TABLE `tbl_pedidos` (
  `id_pedido` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valor_unitario` double NOT NULL,
  `valor_total` double NOT NULL,
  `data` datetime NOT NULL,
  `status_pedido` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbl_pedidos`
--

INSERT INTO `tbl_pedidos` (`id_pedido`, `id_usuario`, `id_produto`, `quantidade`, `valor_unitario`, `valor_total`, `data`, `status_pedido`) VALUES
(1, 1, 1, 1, 24.99, 24.99, '2019-04-02 00:05:02', 'Em aberto'),
(1, 1, 2, 2, 24.99, 49.98, '2019-04-02 00:05:02', 'Em aberto'),
(1, 1, 39, 1, 7.99, 7.99, '2019-04-02 00:05:02', 'Em aberto'),
(1, 1, 22, 2, 34.99, 69.98, '2019-04-02 00:05:02', 'Em aberto'),
(1, 1, 15, 3, 24.99, 74.97, '2019-04-02 00:05:02', 'Em aberto'),
(1, 1, 8, 1, 24.99, 24.99, '2019-04-02 00:05:02', 'Em aberto'),
(1, 1, 1, 1, 24.99, 24.99, '2019-04-02 00:05:28', 'Em aberto'),
(1, 1, 40, 1, 4.99, 4.99, '2019-04-02 00:05:28', 'Em aberto'),
(2, 1, 1, 1, 24.99, 24.99, '2019-04-02 00:12:08', 'Em aberto'),
(2, 1, 40, 1, 4.99, 4.99, '2019-04-02 00:12:08', 'Em aberto'),
(3, 1, 1, 1, 24.99, 24.99, '2019-04-02 00:25:48', 'Em aberto'),
(3, 1, 40, 1, 4.99, 4.99, '2019-04-02 00:25:48', 'Em aberto'),
(4, 1, 1, 1, 24.99, 24.99, '2019-04-02 00:33:22', 'Em aberto'),
(4, 1, 40, 1, 4.99, 4.99, '2019-04-02 00:33:22', 'Em aberto'),
(5, 1, 1, 1, 24.99, 24.99, '2019-04-02 00:33:23', 'Em aberto'),
(5, 1, 40, 1, 4.99, 4.99, '2019-04-02 00:33:23', 'Em aberto'),
(5, 1, 1, 1, 24.99, 24.99, '2019-04-02 00:35:52', 'Em aberto'),
(5, 1, 40, 1, 4.99, 4.99, '2019-04-02 00:35:52', 'Em aberto');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_produtos`
--

CREATE TABLE `tbl_produtos` (
  `cod` int(11) NOT NULL,
  `categoria` varchar(255) CHARACTER SET latin1 NOT NULL,
  `produto` varchar(255) CHARACTER SET latin1 NOT NULL,
  `descricao` varchar(255) CHARACTER SET latin1 NOT NULL,
  `preco` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbl_produtos`
--

INSERT INTO `tbl_produtos` (`cod`, `categoria`, `produto`, `descricao`, `preco`) VALUES
(1, 'pizza_tradicional', 'Calabresa', 'Molho de tomate,  mussarela,  calabresa, cebola, azeitonas e orégano.', 24.99),
(2, 'pizza_tradicional', 'Mussarela', 'Molho de tomate , mussarela , tomate concasse e orégano .', 24.99),
(3, 'pizza_tradicional', 'Portuguesa', 'Molho de tomate , mussarela, presunto , ovos,cebola, pimentão, azeitonas e orégano.', 24.99),
(4, 'pizza_tradicional', 'Marguerita', 'Molho, mussarela, tomate concasse, manjericão e orégano.', 24.99),
(5, 'pizza_tradicional', 'Frango Cremoso', 'Molho de tomate, mussarela, frango cremoso desfiado, milho verde e orégano.', 24.99),
(6, 'pizza_tradicional', 'Frango Cremoso com Catupiry', 'Molho de tomate, mussarela, frango cremoso desfiado, catupiry, milho verde e orégano.', 24.99),
(7, 'pizza_tradicional', 'Frango Cremoso com Cheddar', 'Molho de tomate, mussarela, frango cremoso desfiado, cheddar, milho verde e orégano.', 24.99),
(8, 'pizza_tradicional', 'Frango Cremoso com Bacon', 'Molho de tomate, mussarela, frango cremoso desfiado, bacon, milho verde e orégano.', 24.99),
(9, 'pizza_tradicional', 'Napolitana', 'Molho de tomate, mussarela, presunto, alho crocante e orégano.', 24.99),
(10, 'pizza_tradicional', 'Hot Dog', 'Molho de tomate, mussarela, salsicha, ervilha, milho verde e batata palha.', 24.99),
(11, 'pizza_tradicional', 'Manda Pizza', 'Molho de tomate, mussarela, calabresa, bacon, tomate, cebola, batata palha e orégano.', 24.99),
(12, 'pizza_tradicional', 'Dois Queijos', 'Molho de tomate, mussarela, catupiry e orégano.', 24.99),
(13, 'pizza_tradicional', 'Baiana', 'Molho de tomate, mussarela , pimenta, calabresa, cebola e orégano.', 24.99),
(14, 'pizza_tradicional', 'Carne de Sol', 'Molho de tomate, mussarela, carne de sol desfiada acebolada e orégano.', 24.99),
(15, 'pizza_tradicional', 'Bacon', 'Molho de tomate, mussarela, bacon, cebola, azeitonas e orégano.', 24.99),
(16, 'pizza_premium', 'Quatro Queijos', 'Molho de Tomate, mussarela, provolone, catupiry, parmesão e orégano.', 34.99),
(17, 'pizza_premium', 'Cinco Queijos', 'Molho de tomate, mussarela, provolone, catupiry, parmesão, gorgonzola e orégano.', 34.99),
(18, 'pizza_premium', 'Lombo Defumado', 'Mussarela, lombinho defumado, queijo gouda, cebola, ovo de codorna e orégano.', 34.99),
(19, 'pizza_premium', 'Gorgonzola com Abacaxi', 'Molho de tomate, mussarela, gorgonzola, abacaxi e orégano.', 34.99),
(20, 'pizza_premium', 'Vegetariana', 'Molho de tomate, palmito, champignon, milho verde, ervilha, tomate e orégano.', 34.99),
(21, 'pizza_premium', 'Filé', 'Molho de tomate, mussarela, filé em cubos, cebola e orégano.', 34.99),
(22, 'pizza_premium', 'Filé com Bacon', 'Molho de tomate, mussarela, filé em cubos, bacon, cebola e orégano.', 34.99),
(23, 'pizza_premium', 'Pepperoni', 'Molho de tomate, mussarela, pepperoni, cebola e orégano.', 34.99),
(24, 'pizza_premium', 'Romana', 'Molho de tomate, mussarela, filé de anchova e orégano.', 34.99),
(25, 'pizza_premium', 'Palmito', 'Molho de tomate, mussarela, palmito e orégano.', 34.99),
(26, 'massa_tradicional', 'Espaguete à Bolonhesa', 'Espaguete, molho de tomate, carne moída, manjericão e parmesão.', 13.99),
(27, 'massa_tradicional', 'Espaguete de Calabresa', 'Espaguete, molho de tomate, calabresa, carne moída, manjericão e parmesão.', 13.99),
(28, 'massa_tradicional', 'Espaguete de Frango', 'Espaguete, molho de tomate, frango cremoso desfiado, manjericão e parmesão ralado.', 13.99),
(29, 'massa_tradicional', 'Espaguete Hot Dog', 'Espaguete, molho de tomate, salsicha, milho verde, ervilha, manjericão, parmesão e batata palha.', 13.99),
(30, 'massa_tradicional', 'Espaguete Manda Pizza', 'Espaguete, molho de tomate, carne moída, calabresa, bacon, manjericão e parmesão.', 13.99),
(31, 'massa_tradicional', 'Espaguete Baiana', 'Espaguete, molho de tomate, calabresa, pimenta calabresa, manjericão e parmesão.', 13.99),
(32, 'massa_premium', 'Espaguete Pomodoro', 'Espaguete, molho de tomate, champignon, manjericão e parmesão.', 19.99),
(33, 'massa_premium', 'Espaguete Quatro Queijos', 'Espaguete, molho branco, gorgonzola, requeijão cremoso, provolone, parmesão e manjericão.', 19.99),
(34, 'massa_premium', 'Espaguete de Filé', 'Espaguete, molho branco, filé em cubos, manjericão e parmesão.', 19.99),
(35, 'massa_premium', 'Espaguete de Carne de Sol', 'Espaguete, molho de tomate, carne de sol acebolada, manjericão e parmesão.', 19.99),
(36, 'massa_premium', 'Espaguete de Camarão', 'Espaguete, molho de frutos do mar, camarão fresco, manjericão e parmesão.', 19.99),
(37, 'bebidas', 'Refrigerante Lata', '', 3.99),
(38, 'bebidas', 'Refrigerante 1L', '', 5.99),
(39, 'bebidas', 'Refrigerante 2L', '', 7.99),
(40, 'bebidas', 'Sucos', '', 4.99),
(41, 'bebidas', 'Água sem gás', '', 2.5),
(42, 'bebidas', 'Água com gás', '', 2.99),
(43, 'bebidas', 'Cerveja Long Neck', '', 6.99),
(44, 'adicionais', 'Maionese adicional', '', 0.99),
(45, 'adicionais', 'Adicional de massas', 'Bacon, Calabresa, Catupiry, Cheddar, Batata Palha.', 2.99),
(46, 'adicionais', 'Adicional', 'Borda Recheada com Cheddar, Salsicha ou Catupiry.', 2.99);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `sobrenome` varchar(255) NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `usuario`, `senha`, `email`, `nome`, `sobrenome`, `data`) VALUES
(1, 'admin', 'pedefacil@admin', 'contato@pedefacil.app', '', '', '0000-00-00 00:00:00'),
(2, 'teste', 'teste', 'teste@teste.com', '', '', '2019-01-30 17:28:47'),
(3, 'marcus', '123456', 'marcusvvr@gmail.com', '', '', '2019-01-30 19:25:02'),
(4, 'teste1', 'teste1', 'marcusvvr@gmail.com', '', '', '2019-02-02 09:46:32'),
(5, 'admi', 'pedefacil@admin', 'teste@teste.com', '', '', '2019-02-02 10:22:50'),
(6, 'tedgrscf', 'gtdfhrdvgd', 'grdhred@grsfte.com', '', '', '2019-02-02 10:22:51'),
(7, 'teste2', 'teste', 'marcusvvr@gmail.com', '', '', '2019-02-08 14:43:37'),
(8, 'meiryanne', 'maria', 'meirymartinsp.rodrigues@gmail.com', '', '', '2019-02-22 17:28:15'),
(9, 'Maria', '1234', 'meirymartinsp.rodrigues@gmail.com', '', '', '2019-02-27 18:31:30'),
(10, 'teste5', 'teste5', 'teste@teste.com', '', '', '2019-03-09 09:27:04'),
(11, 'mey', 'mey', 'meirymartinsp.rodrigues@gmail.com', '', '', '2019-03-25 19:51:11'),
(12, 'joana', 'joana', 'admin@admin.com', '', '', '2019-03-29 10:33:22'),
(13, 'tahgarces', 'hiro14', 'taynaragarces@gmail.com', '', '', '2019-03-29 10:39:50'),
(14, 'anselopes', 'graciana', 'anselopes@hotmail.com', '', '', '2019-04-02 12:16:49');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_vendas`
--

CREATE TABLE `tbl_vendas` (
  `id_venda` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `cod_produto` int(25) NOT NULL,
  `preco` float NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
