-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 25/05/2019 às 16:16
-- Versão do servidor: 10.1.38-MariaDB
-- Versão do PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `pedefacil_db`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_pedidos`
--

CREATE TABLE `tbl_pedidos` (
  `id_pedido` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `nome_produto` varchar(55) NOT NULL,
  `quantidade` float NOT NULL,
  `valor_unitario` float NOT NULL,
  `valor_total` float NOT NULL,
  `data` datetime NOT NULL,
  `status_pedido` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `tbl_pedidos`
--

INSERT INTO `tbl_pedidos` (`id_pedido`, `id_usuario`, `id_produto`, `nome_produto`, `quantidade`, `valor_unitario`, `valor_total`, `data`, `status_pedido`) VALUES
(1, 1, 1, 'Calabresa', 1, 24.99, 24.99, '2019-05-02 22:40:04', 'Encerrado'),
(1, 1, 1, 'Calabresa', 0.5, 24.99, 12.495, '2019-05-02 23:02:33', 'Encerrado'),
(1, 1, 16, 'Quatro Queijos', 0.5, 34.99, 17.495, '2019-05-02 23:02:33', 'Encerrado'),
(1, 1, 16, 'Quatro Queijos', 1, 34.99, 34.99, '2019-05-05 11:05:58', 'Encerrado'),
(1, 1, 16, 'Quatro Queijos', 0.5, 34.99, 17.495, '2019-05-05 11:05:58', 'Encerrado'),
(1, 1, 2, 'Mussarela', 0.5, 24.99, 12.495, '2019-05-05 11:05:58', 'Encerrado'),
(1, 2, 1, 'Calabresa', 2, 24.99, 49.98, '2019-05-06 19:53:33', 'Encerrado'),
(1, 5, 1, 'Calabresa', 0.5, 24.99, 12.495, '2019-05-07 19:42:22', 'Encerrado'),
(1, 5, 2, 'Mussarela', 0.5, 24.99, 12.495, '2019-05-07 19:42:22', 'Encerrado'),
(1, 5, 47, 'Coca-cola', 1, 3.99, 3.99, '2019-05-07 19:42:22', 'Encerrado'),
(1, 5, 63, 'Fanta Laranja', 1, 7.99, 7.99, '2019-05-07 19:42:22', 'Encerrado'),
(1, 5, 6, 'Frango Cremoso com Catupi', 3, 24.99, 74.97, '2019-05-07 19:45:13', 'Encerrado'),
(1, 5, 18, 'Pizza de Lombo defumado', 1, 34.99, 34.99, '2019-05-07 19:45:13', 'Encerrado'),
(1, 5, 32, 'Espaguete Pomodoro', 5, 19.99, 99.95, '2019-05-07 19:45:13', 'Encerrado'),
(1, 5, 47, 'Coca-cola', 1, 3.99, 3.99, '2019-05-07 19:45:13', 'Encerrado'),
(1, 5, 48, 'GuaranÃƒÂ¡ Jesus', 1, 3.99, 3.99, '2019-05-07 19:45:13', 'Encerrado'),
(1, 5, 49, 'Fanta Laranja', 1, 3.99, 3.99, '2019-05-07 19:45:13', 'Encerrado'),
(1, 5, 50, 'Pepsi', 4, 3.99, 15.96, '2019-05-07 19:45:13', 'Encerrado'),
(2, 1, 6, 'Frango Cremoso com Catupi', 1, 24.99, 24.99, '2019-05-07 23:14:54', 'Encerrado'),
(1, 14, 27, 'Espaguete de Calabresa', 1, 14.99, 14.99, '2019-05-08 21:09:44', 'Encerrado'),
(1, 14, 43, 'Cerveja Long Neck', 1, 6.99, 6.99, '2019-05-08 21:29:28', 'Encerrado'),
(1, 15, 58, 'GuaranÃƒÂ¡ AntÃƒÂ¡rctica', 1, 6.99, 6.99, '2019-05-08 21:52:46', 'Encerrado'),
(1, 16, 41, 'ÃƒÂgua sem gÃƒÂ¡s', 2, 2.49, 4.98, '2019-05-08 21:58:01', 'Encerrado'),
(1, 14, 43, 'Cerveja Long Neck', 1, 6.99, 6.99, '2019-05-08 22:01:13', 'Encerrado'),
(3, 1, 1, 'Calabresa', 1, 26.99, 26.99, '2019-05-10 10:22:22', 'Encerrado'),
(3, 1, 47, 'Coca-cola', 1, 4.99, 4.99, '2019-05-10 10:22:51', 'Encerrado'),
(3, 1, 3, 'Portuguesa', 1, 26.99, 26.99, '2019-05-10 10:23:17', 'Encerrado'),
(3, 1, 2, 'Mussarela', 1, 26.99, 26.99, '2019-05-10 10:23:17', 'Encerrado'),
(2, 16, 1, 'Calabresa', 1, 26.99, 26.99, '2019-05-10 10:52:23', 'Encerrado'),
(2, 16, 2, 'Mussarela', 1, 26.99, 26.99, '2019-05-10 10:52:24', 'Encerrado'),
(2, 16, 75, 'Heineken Long Neck', 4, 7.49, 29.96, '2019-05-10 10:52:57', 'Encerrado'),
(2, 16, 1, 'Calabresa', 1, 26.99, 26.99, '2019-05-10 10:56:13', 'Encerrado'),
(2, 16, 2, 'Mussarela', 1, 26.99, 26.99, '2019-05-10 10:56:13', 'Encerrado'),
(2, 16, 62, 'GuaranÃƒÂ¡ Jesus', 1, 9.99, 9.99, '2019-05-10 10:56:13', 'Encerrado'),
(2, 16, 1, 'Calabresa', 1, 26.99, 26.99, '2019-05-10 11:08:03', 'Encerrado'),
(2, 16, 2, 'Mussarela', 1, 26.99, 26.99, '2019-05-10 11:08:03', 'Encerrado'),
(2, 16, 43, 'Cerveja Long Neck', 2, 6.99, 13.98, '2019-05-10 11:08:03', 'Encerrado'),
(2, 16, 1, 'Calabresa', 0.5, 26.99, 13.495, '2019-05-10 11:08:34', 'Encerrado'),
(2, 16, 6, 'Frango Cremoso com Catupiry', 0.5, 26.99, 13.495, '2019-05-10 11:08:34', 'Encerrado'),
(2, 16, 43, 'Cerveja Long Neck', 1, 6.99, 6.99, '2019-05-10 11:09:50', 'Encerrado'),
(2, 16, 32, 'Espaguete Pomodoro', 1, 22.99, 22.99, '2019-05-10 11:10:40', 'Encerrado'),
(2, 16, 31, 'Espaguete Baiana', 2, 14.99, 29.98, '2019-05-10 11:10:40', 'Encerrado'),
(3, 16, 76, 'Refrigerante 2,5L', 1, 11.99, 11.99, '2019-05-10 11:11:40', 'Encerrado'),
(3, 16, 26, 'Espaguete ÃƒÂ  Bolonhesa', 1, 14.99, 14.99, '2019-05-10 11:11:41', 'Encerrado'),
(3, 16, 19, 'Pizza de Gorgonzola com Abacaxi', 1, 36.99, 36.99, '2019-05-10 11:13:14', 'Encerrado'),
(3, 16, 1, 'Calabresa', 1, 26.99, 26.99, '2019-05-10 11:14:12', 'Encerrado'),
(3, 16, 3, 'Portuguesa', 1, 26.99, 26.99, '2019-05-10 11:14:12', 'Encerrado'),
(3, 16, 2, 'Mussarela', 1, 26.99, 26.99, '2019-05-10 11:14:12', 'Encerrado'),
(3, 16, 4, 'Pizza Marguerita', 1, 26.99, 26.99, '2019-05-10 11:14:12', 'Encerrado'),
(3, 16, 5, 'Frango Cremoso', 1, 26.99, 26.99, '2019-05-10 11:14:12', 'Encerrado'),
(3, 16, 6, 'Frango Cremoso com Catupiry', 1, 26.99, 26.99, '2019-05-10 11:14:12', 'Encerrado'),
(3, 16, 7, 'Frango Cremoso com Cheddar', 1, 26.99, 26.99, '2019-05-10 11:14:12', 'Encerrado'),
(3, 16, 8, 'Frango Cremoso com Bacon', 1, 26.99, 26.99, '2019-05-10 11:14:12', 'Encerrado'),
(3, 16, 9, 'Napolitana', 1, 26.99, 26.99, '2019-05-10 11:14:12', 'Encerrado'),
(3, 16, 10, 'Hot Dog', 1, 26.99, 26.99, '2019-05-10 11:14:12', 'Encerrado'),
(3, 16, 43, 'Cerveja Long Neck', 4, 6.99, 27.96, '2019-05-10 11:14:12', 'Encerrado'),
(3, 16, 75, 'Heineken Long Neck', 11, 7.49, 82.39, '2019-05-10 11:14:12', 'Encerrado'),
(2, 5, 26, 'Espaguete ÃƒÂ  Bolonhesa', 1, 14.99, 14.99, '2019-05-10 11:34:36', 'Encerrado'),
(2, 5, 30, 'Espaguete Manda Pizza', 1, 14.99, 14.99, '2019-05-10 11:34:36', 'Encerrado'),
(2, 5, 43, 'Cerveja Long Neck', 1, 6.99, 6.99, '2019-05-10 11:34:36', 'Encerrado'),
(3, 16, 1, 'Calabresa', 1, 26.99, 26.99, '2019-05-11 16:53:48', 'Encerrado'),
(3, 16, 76, 'Refrigerante 2,5L', 3, 11.99, 35.97, '2019-05-11 17:53:19', 'Encerrado'),
(4, 16, 1, 'Calabresa', 1, 26.99, 26.99, '2019-05-11 18:22:25', 'Encerrado'),
(5, 16, 1, 'Calabresa', 1, 26.99, 26.99, '2019-05-11 18:24:01', 'Encerrado'),
(6, 16, 1, 'Calabresa', 1, 26.99, 26.99, '2019-05-11 18:25:24', 'Encerrado'),
(7, 16, 1, 'Calabresa', 1, 26.99, 26.99, '2019-05-11 18:35:10', 'Encerrado'),
(8, 16, 1, 'Calabresa', 1, 26.99, 26.99, '2019-05-11 18:38:36', 'Encerrado'),
(9, 16, 1, 'Calabresa', 1, 26.99, 26.99, '2019-05-11 18:45:36', 'Encerrado'),
(9, 16, 75, 'Heineken Long Neck', 1, 7.49, 7.49, '2019-05-11 18:46:42', 'Encerrado'),
(10, 16, 1, 'Calabresa', 1, 26.99, 26.99, '2019-05-11 18:54:17', 'Encerrado'),
(11, 16, 1, 'Calabresa', 1, 26.99, 26.99, '2019-05-11 18:57:32', 'Encerrado'),
(12, 16, 1, 'Calabresa', 1, 26.99, 26.99, '2019-05-11 19:00:13', 'Encerrado'),
(12, 16, 2, 'Mussarela', 1, 26.99, 26.99, '2019-05-11 19:00:30', 'Encerrado'),
(13, 16, 1, 'Calabresa', 1, 26.99, 26.99, '2019-05-13 15:24:06', 'Encerrado'),
(13, 16, 47, 'Coca-cola', 1, 4.99, 4.99, '2019-05-13 15:24:07', 'Encerrado'),
(13, 16, 76, 'Refrigerante 2,5L', 2, 11.99, 23.98, '2019-05-13 15:24:07', 'Encerrado'),
(13, 16, 75, 'Heineken Long Neck', 1, 7.49, 7.49, '2019-05-13 15:24:32', 'Encerrado'),
(14, 16, 1, 'Calabresa', 1, 26.99, 26.99, '2019-05-13 15:25:01', 'Encerrado'),
(15, 16, 1, 'Calabresa', 1, 26.99, 26.99, '2019-05-13 15:25:25', 'Encerrado'),
(16, 16, 1, 'Calabresa', 1, 26.99, 26.99, '2019-05-13 15:25:46', 'Encerrado'),
(17, 16, 1, 'Calabresa', 1, 26.99, 26.99, '2019-05-13 15:27:04', 'Encerrado'),
(18, 16, 1, 'Calabresa', 1, 26.99, 26.99, '2019-05-13 15:28:28', 'Encerrado'),
(19, 16, 1, 'Calabresa', 1, 26.99, 26.99, '2019-05-13 16:18:02', 'Encerrado'),
(19, 16, 2, 'Mussarela', 2, 26.99, 53.98, '2019-05-16 11:35:07', 'Encerrado'),
(19, 16, 1, 'Calabresa', 0.5, 26.99, 13.495, '2019-05-16 11:35:07', 'Encerrado'),
(19, 16, 16, 'Quatro Queijos', 0.5, 36.99, 18.495, '2019-05-16 11:35:07', 'Encerrado'),
(19, 16, 75, 'Heineken Long Neck', 2, 7.49, 14.98, '2019-05-16 11:35:07', 'Encerrado'),
(20, 16, 1, 'Calabresa', 1, 26.99, 26.99, '2019-05-20 11:08:15', 'Em aberto'),
(20, 16, 2, 'Mussarela', 1, 26.99, 26.99, '2019-05-20 11:08:16', 'Em aberto'),
(20, 16, 43, 'Cerveja Long Neck', 1, 6.99, 6.99, '2019-05-20 11:08:16', 'Em aberto');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_produtos`
--

CREATE TABLE `tbl_produtos` (
  `cod` int(11) NOT NULL,
  `categoria` varchar(55) NOT NULL,
  `produto` varchar(55) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `preco` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `tbl_produtos`
--

INSERT INTO `tbl_produtos` (`cod`, `categoria`, `produto`, `descricao`, `preco`) VALUES
(1, 'pizza_tradicional', 'Calabresa', 'Molho de tomate, mussarela, calabresa, cebola, azeitona e orégano.', 26.99),
(2, 'pizza_tradicional', 'Mussarela', 'Molho de Tomate, mussarela, tomate concasse e orégano.', 26.99),
(3, 'pizza_tradicional', 'Portuguesa', 'Molho de Tomate, mussarela, presunto, ovos, cebola, pimentão, azeitonas e orégano.', 26.99),
(4, 'pizza_tradicional', 'Pizza Marguerita', 'Molho, mussarela, tomate concasse, manjericão e orégano.', 26.99),
(5, 'pizza_tradicional', 'Frango Cremoso', 'Molho de Tomate, mussarela, frango cremoso desfiado, milho verde e orégano.', 26.99),
(6, 'pizza_tradicional', 'Frango Cremoso com Catupiry', 'Molho, mussarela, frango cremoso desfiado, catupiry, milho verde e orégano.', 26.99),
(7, 'pizza_tradicional', 'Frango Cremoso com Cheddar', 'Molho, mussarela, frango cremoso desfiado, cheddar, milho verde e orégano.', 26.99),
(8, 'pizza_tradicional', 'Frango Cremoso com Bacon', 'Molho, mussarela, frango cremoso desfiado, bacon, cebola e orégano.', 26.99),
(9, 'pizza_tradicional', 'Napolitana', 'Molho de tomate, mussarela, presunto, alho crocante e orégano.', 26.99),
(10, 'pizza_tradicional', 'Hot Dog', 'Molho de tomate, mussarela, salsicha, ervilha, milho verde e batata palha.', 26.99),
(11, 'pizza_tradicional', 'Manda Pizza', 'Molho de tomate, mussarela, calabresa, bacon, tomate, cebola, batata palha e orégano.', 26.99),
(12, 'pizza_tradicional', 'Dois Queijos', 'Molho de tomate, mussarela, catupiry e orégano.', 26.99),
(13, 'pizza_tradicional', 'Baiana', 'Molho de tomate, calabresa, pimenta calabresa, cebola e orégano.', 26.99),
(14, 'pizza_tradicional', 'Carne de Sol', 'Molho de tomate, mussarela, carne de sol acebolada e orégano.', 29.99),
(15, 'pizza_tradicional', 'Bacon', 'Molho de tomate, mussarela, bacon, cebola, azeitonas e orégano.', 26.99),
(16, 'pizza_premium', 'Quatro Queijos', 'Molho de Tomate, mussarela, provolone, catupiry, parmesão e orégano.', 36.99),
(17, 'pizza_premium', 'Cinco Queijos', 'Molho de tomate, mussarela, provolone, catupiry, parmesão, gorgonzola e orégano.', 36.99),
(18, 'pizza_premium', 'Pizza de Lombo defumado', 'Mussarela, lombinho defumado, queijo gouda, cebola, ovo de codorna e orégano.', 36.99),
(19, 'pizza_premium', 'Pizza de Gorgonzola com Abacaxi', 'Molho de tomate, mussarela, gorgonzola, abacaxi e orégano.', 36.99),
(20, 'pizza_premium', 'Vegetariana', 'Molho de tomate, palmito, champignon, milho verde, ervilha, tomate e orégano.', 36.99),
(21, 'pizza_premium', 'Filé', 'Molho de tomate, mussarela, filé em cubos, cebola e orégano.', 36.99),
(22, 'pizza_premium', 'Filé com Bacon', 'Molho de tomate, mussarela, filé em cubos, bacon, cebola e orégano.', 36.99),
(23, 'pizza_premium', 'Pepperoni', 'Molho de tomate, mussarela, pepperoni, cebola e orégano.', 36.99),
(24, 'pizza_premium', 'Romana', 'Molho de tomate, mussarela, filé de anchova e orégano.', 36.99),
(25, 'pizza_premium', 'Palmito', 'Molho de tomate, mussarela, palmito e orégano.', 36.99),
(26, 'massa_tradicional', 'Espaguete à Bolonhesa', 'Espaguete, molho de tomate, carne moída, manjericão e parmesão.', 14.99),
(27, 'massa_tradicional', 'Espaguete de Calabresa', 'Espaguete, molho de tomate, calabresa, carne moída, manjericão e parmesão.', 14.99),
(28, 'massa_tradicional', 'Espaguete de Frango', 'Espaguete, molho de tomate, frango cremoso desfiado, manjericão e parmesão ralado.', 14.99),
(29, 'massa_tradicional', 'Espaguete Hot Dog', 'Espaguete, molho de tomate, salsicha, milho verde, ervilha, manjericão, parmesão e batata palha.', 14.99),
(30, 'massa_tradicional', 'Espaguete Manda Pizza', 'Espaguete, molho de tomate, carne moída, calabresa, bacon, manjericão e parmesão.', 14.99),
(31, 'massa_tradicional', 'Espaguete Baiana', 'Espaguete, molho de tomate, calabresa, pimenta calabresa, manjericão e parmesão.', 14.99),
(32, 'massa_premium', 'Espaguete Pomodoro', 'Espaguete, molho de tomate, champignon, manjericão e parmesão.', 22.99),
(33, 'massa_premium', 'Espaguete Quatro Queijos', 'Espaguete, molho branco, gorgonzola, requeijão cremoso, provolone, parmesão e manjericão.', 22.99),
(34, 'massa_premium', 'Espaguete de Filé', 'Espaguete, molho branco, filé em cubos, manjericão e parmesão.', 22.99),
(35, 'massa_premium', 'Espaguete de Carne de Sol', 'Espaguete, molho de tomate, carne de sol acebolada, manjericão e parmesão.', 22.99),
(36, 'massa_premium', 'Espaguete de Camarão', 'Espaguete, molho de frutos do mar, camarão fresco, manjericão e parmesão.', 27.99),
(37, 'bebidas', 'Refrigerante lata', '', 4.99),
(38, 'bebidas', 'Refrigerante 1L', '', 6.99),
(39, 'bebidas', 'Refrigerante 2L', '', 9.99),
(40, 'bebidas', 'Sucos', '', 4.99),
(41, 'bebidas', 'Água sem gás', '', 2.49),
(42, 'bebidas', 'Água com gás', '', 2.99),
(43, 'bebidas', 'Cerveja Long Neck', '', 6.99),
(44, 'adicionais', 'Maionese adicional', '', 0.99),
(45, 'adicionais', 'Adicional de Massas', 'Bacon, Calabresa, Catupiry, Cheddar, Batata Palha.', 2.99),
(46, 'adicionais', 'Adicional', 'Borda Recheada com Cheddar, Salsicha ou Catupiry.', 2.99),
(47, 'refrigerante_lata', 'Coca-cola', '', 4.99),
(48, 'refrigerante_lata', 'Guaraná Jesus', '', 4.99),
(49, 'refrigerante_lata', 'Fanta Laranja', '', 4.99),
(50, 'refrigerante_lata', 'Pepsi', '', 4.99),
(51, 'refrigerante_lata', 'Guaraná Antárctica', '', 4.99),
(52, 'refrigerante_lata', 'Fanta Uva', '', 4.99),
(53, 'refrigerante_lata', 'Sprite', '', 4.99),
(54, 'refrigerante_1l', 'Coca-cola', '', 6.99),
(55, 'refrigerante_1l', 'Guaraná Jesus', '', 6.99),
(56, 'refrigerante_1l', 'Fanta Laranja', '', 6.99),
(57, 'refrigerante_1l', 'Pepsi', '', 6.99),
(58, 'refrigerante_1l', 'Guaraná Antárctica', '', 6.99),
(59, 'refrigerante_1l', 'Fanta Uva', '', 6.99),
(60, 'refrigerante_1l', 'Sprite', '', 6.99),
(61, 'refrigerante_2l', 'Coca-cola', '', 9.99),
(62, 'refrigerante_2l', 'Guaraná Jesus', '', 9.99),
(63, 'refrigerante_2l', 'Fanta Laranja', '', 9.99),
(64, 'refrigerante_2l', 'Pepsi', '', 9.99),
(65, 'refrigerante_2l', 'Guaraná Antárctica', '', 9.99),
(66, 'refrigerante_2l', 'Fanta Uva', '', 9.99),
(67, 'refrigerante_2l', 'Sprite', '', 9.99),
(68, 'refrigerante_2,5l', 'Coca-cola', '', 11.99),
(69, 'refrigerante_2,5l', 'Guaraná Jesus', '', 11.99),
(70, 'refrigerante_2,5l', 'Fanta Laranja', '', 11.99),
(71, 'refrigerante_2,5l', 'Pepsi', '', 11.99),
(72, 'refrigerante_2,5l', 'Guaraná Antárctica', '', 11.99),
(73, 'refrigerante_2,5l', 'Fanta Uva', '', 11.99),
(74, 'refrigerante_2,5l', 'Sprite', '', 11.99),
(75, 'bebidas', 'Heineken Long Neck', '', 7.49),
(76, 'bebidas', 'Refrigerante 2,5L', '', 11.99);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_restaurantes`
--

CREATE TABLE `tbl_restaurantes` (
  `id_restaurante` int(255) NOT NULL,
  `nome_restaurante` varchar(255) NOT NULL,
  `cnpj` varchar(255) NOT NULL,
  `contato` varchar(55) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `tbl_restaurantes`
--

INSERT INTO `tbl_restaurantes` (`id_restaurante`, `nome_restaurante`, `cnpj`, `contato`, `link`) VALUES
(1, 'Manda Pizza', '28.020.270/0001-83', '(98) 88163735', 'cardapio.php');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id_usuario` int(255) NOT NULL,
  `usuario` varchar(25) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `email` varchar(25) NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `tbl_users`
--

INSERT INTO `tbl_users` (`id_usuario`, `usuario`, `senha`, `email`, `data`) VALUES
(1, 'admin', '538daaad8f4fc0a4d59f3c96da1d3c46287ceea8', 'contato@pedefacil.app', '2019-05-02 17:45:55'),
(2, 'pedefacil', '89f882b57a239acd779e09861fb3387f004a819b', 'contato@pedefacil.app', '2019-05-06 19:52:17'),
(3, 'TullioRocha', '451be3469758ee548f016ad287e264404688b8bb', 'tullioacr@gmail.com', '2019-05-07 17:58:44'),
(4, 'Geovana', 'f4a89891f4bcfe3c5e76c558b3dbc43c26dd1b52', 'geofreis@gmail.com', '2019-05-07 18:26:14'),
(5, 'lucas', '89f882b57a239acd779e09861fb3387f004a819b', 'lucasfrancodesa@gmail.com', '2019-05-07 19:41:39'),
(6, 'lucas2', '89f882b57a239acd779e09861fb3387f004a819b', 'lucaswyden@gmail.com', '2019-05-07 19:44:30'),
(7, 'ClaraLemos98', '68781de85fedfca95276694ff634248968d99611', 'anaclaralemos@gmail.com', '2019-05-07 20:19:18'),
(8, 'nanda_furtado', 'c50f35da26cdb4bc6d97556ba50320cc358a915a', 'fernanda.gcf.gcf@gmail.co', '2019-05-07 20:48:07'),
(9, 'pewpew', '102bf73ea38502f2d3a96d09a581b8fc9c82b304', 'pewpewjeripoca@gmail.com', '2019-05-07 21:07:37'),
(10, 'arthurgsf', '4797ba95245cd7362478acee00917c92b3379d04', 'arthur.gsf.gsf@gmail.com', '2019-05-07 21:19:34'),
(11, 'vinicius_gbs10', '43e7e4626def2e4708f1213a8b58a1084513d261', 'Vinicius_gbs@hotmail.com', '2019-05-07 21:33:50'),
(12, 'thiagodiniz', '31f200d2c0257e11c58f5246fa34b23bd4364d73', 'thiagodrdiniz@gmail.com', '2019-05-07 22:10:00'),
(13, 'leoomendess', '7de99cca9984b399673f214b588574ff3a761d96', 'leo.mendes@gmail.com', '2019-05-08 14:11:13'),
(14, 'CiroCamelo', '9cc4d85913a020428cae84f11134ee6fb6d9a176', 'cirocamelo@hotmail.com', '2019-05-08 21:08:22'),
(15, 'Gracyelle', '5af9b30dfa5b0989612ca4d38de8634b99ffaf7f', 'uema.cql@gmail.com', '2019-05-08 21:49:34'),
(16, 'joaovvr', '17f132623ab11454939637ce094c70e06e8d2d0a', 'jvrviegas@gmail.com', '2019-05-08 21:55:24'),
(17, 'tahgarces', 'c00ff98153d57a834b5523c3903d7bf218f5b6bc', 'taynaragarces@gmail.com', '2019-05-13 17:14:23'),
(18, 'taynara', '7d4f3ab0ff3ee4617c9e2d1dd9aebc7a08a473ac', 'taynaragarces@gmail.com', '2019-05-13 17:18:28'),
(19, 'jvvr', '17f132623ab11454939637ce094c70e06e8d2d0a', 'jvvrego_br@hotmail.com', '2019-05-14 21:51:09');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_vendas`
--

CREATE TABLE `tbl_vendas` (
  `id_pedido` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `num_mesa` int(11) NOT NULL,
  `valor_conta` float NOT NULL,
  `status_pedido` varchar(25) NOT NULL,
  `data_abertura` datetime NOT NULL,
  `data_encerramento` datetime NOT NULL,
  `controle_pedido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `tbl_vendas`
--

INSERT INTO `tbl_vendas` (`id_pedido`, `id_usuario`, `num_mesa`, `valor_conta`, `status_pedido`, `data_abertura`, `data_encerramento`, `controle_pedido`) VALUES
(1, 1, 0, 378.77, 'Encerrado', '2019-05-02 22:40:04', '2019-05-10 11:12:56', 1),
(1, 2, 0, 308.79, 'Encerrado', '2019-05-06 19:53:33', '2019-05-08 22:01:13', 2),
(1, 5, 0, 295.78, 'Encerrado', '2019-05-07 19:42:22', '2019-05-11 18:22:18', 3),
(2, 1, 0, 273.83, 'Encerrado', '2019-05-07 23:14:54', '2019-05-10 11:12:56', 4),
(1, 14, 0, 28.97, 'Encerrado', '2019-05-08 21:09:44', '2019-05-08 22:16:54', 5),
(1, 15, 0, 6.99, 'Encerrado', '2019-05-08 21:52:46', '2019-05-08 22:18:20', 6),
(1, 16, 0, 4.98, 'Encerrado', '2019-05-08 21:58:01', '2019-05-18 17:53:52', 7),
(3, 1, 0, 566.16, 'Encerrado', '2019-05-10 10:22:21', '2019-05-11 17:53:19', 8),
(2, 16, 0, 302.82, 'Encerrado', '2019-05-10 10:52:23', '2019-05-18 17:53:52', 9),
(3, 16, 0, 507.18, 'Encerrado', '2019-05-10 11:11:40', '2019-05-18 17:53:52', 10),
(2, 5, 0, 36.97, 'Encerrado', '2019-05-10 11:34:36', '2019-05-11 18:22:18', 11),
(4, 16, 0, 26.99, 'Encerrado', '2019-05-11 18:22:25', '2019-05-18 17:53:52', 12),
(5, 16, 0, 26.99, 'Encerrado', '2019-05-11 18:24:01', '2019-05-18 17:53:52', 13),
(6, 16, 0, 26.99, 'Encerrado', '2019-05-11 18:25:24', '2019-05-18 17:53:52', 14),
(7, 16, 0, 26.99, 'Encerrado', '2019-05-11 18:35:10', '2019-05-18 17:53:52', 15),
(8, 16, 0, 26.99, 'Encerrado', '2019-05-11 18:38:36', '2019-05-18 17:53:52', 16),
(9, 16, 1, 34.48, 'Encerrado', '2019-05-11 18:45:36', '2019-05-18 17:53:52', 17),
(10, 16, 1, 26.99, 'Encerrado', '2019-05-11 18:54:17', '2019-05-18 17:53:52', 18),
(11, 16, 0, 26.99, 'Encerrado', '2019-05-11 18:57:32', '2019-05-18 17:53:52', 19),
(12, 16, 0, 53.98, 'Encerrado', '2019-05-11 19:00:13', '2019-05-18 17:53:52', 20),
(13, 16, 1, 63.45, 'Encerrado', '2019-05-13 15:24:06', '2019-05-18 17:53:52', 21),
(14, 16, 1, 26.99, 'Encerrado', '2019-05-13 15:25:00', '2019-05-18 17:53:52', 22),
(15, 16, 1, 26.99, 'Encerrado', '2019-05-13 15:25:25', '2019-05-18 17:53:52', 23),
(16, 16, 1, 26.99, 'Encerrado', '2019-05-13 15:25:46', '2019-05-18 17:53:52', 24),
(17, 16, 2, 26.99, 'Encerrado', '2019-05-13 15:27:04', '2019-05-18 17:53:52', 25),
(18, 16, 2, 26.99, 'Encerrado', '2019-05-13 15:28:28', '2019-05-18 17:53:52', 26),
(19, 16, 1, 127.94, 'Encerrado', '2019-05-13 16:18:02', '2019-05-18 17:53:52', 27),
(20, 16, 1, 60.97, 'Em aberto', '2019-05-20 11:08:15', '2019-05-20 11:08:15', 28);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `tbl_produtos`
--
ALTER TABLE `tbl_produtos`
  ADD UNIQUE KEY `cod` (`cod`);

--
-- Índices de tabela `tbl_restaurantes`
--
ALTER TABLE `tbl_restaurantes`
  ADD UNIQUE KEY `id_restaurante` (`id_restaurante`);

--
-- Índices de tabela `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD UNIQUE KEY `id_usuario` (`id_usuario`);

--
-- Índices de tabela `tbl_vendas`
--
ALTER TABLE `tbl_vendas`
  ADD UNIQUE KEY `controle_pedido` (`controle_pedido`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `tbl_produtos`
--
ALTER TABLE `tbl_produtos`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT de tabela `tbl_restaurantes`
--
ALTER TABLE `tbl_restaurantes`
  MODIFY `id_restaurante` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id_usuario` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `tbl_vendas`
--
ALTER TABLE `tbl_vendas`
  MODIFY `controle_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
