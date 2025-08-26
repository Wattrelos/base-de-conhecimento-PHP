-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
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
-- Banco de dados: `base de conhecimento`
--
CREATE DATABASE IF NOT EXISTS `knowledge_base`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `category`
--

use `knowledge_base`;

CREATE TABLE `category` (
  `id` int(11) NOT NULL COMMENT 'Identificação',
  `parent_id` int(11) NOT NULL COMMENT 'Subcategoria',
  `category_name` varchar(50) DEFAULT NULL COMMENT 'Departamento'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

--
-- Despejando dados para a tabela `category`
--

INSERT INTO `category` (`id`, `parent_id`, `category_name`) VALUES
(2, 1, 'Elétricos'),
(3, 1, 'Hidráulica'),
(4, 1, 'Construção'),
(5, 1, 'Pisos e Revestimentos'),
(6, 1, 'Tintas'),
(7, 1, 'Iluminação'),
(8, 1, 'Esquadrias'),
(9, 1, 'Higiene e Limpeza'),
(10, 1, 'EPIs'),
(11, 1, 'Ferramentas manuais'),
(12, 1, 'Ferramentas Elétricas'),
(13, 1, 'Ferragens'),
(14, 1, 'Jardinagem'),
(15, 1, 'Banheiros'),
(16, 1, 'Área de lazer'),
(32, 4, 'Areia e brita'),
(33, 4, 'Argamassa'),
(34, 4, 'Forros'),
(35, 4, 'Impermeabilizantes'),
(36, 4, 'Madeira'),
(37, 4, 'Revestimento'),
(38, 4, 'Sacaria'),
(39, 4, 'Telhas'),
(40, 4, 'Tijolos e blocos'),
(41, 2, 'Cabos'),
(42, 2, 'Caixas'),
(43, 2, 'Disjuntores'),
(44, 2, 'Dutos'),
(45, 2, 'Fitas isolantes'),
(46, 2, 'Interruptores'),
(47, 2, 'Tomadas'),
(48, 3, 'Caixa d\'água'),
(49, 3, 'Calhas'),
(50, 3, 'Conexões'),
(51, 3, 'Sifão'),
(52, 3, 'Torneiras'),
(53, 3, 'Tubos'),
(54, 3, 'Válvula'),
(55, 3, 'Válvula de descarga'),
(56, 5, 'Azulejos'),
(57, 5, 'Granitos'),
(58, 5, 'Laminados'),
(59, 5, 'Mármores'),
(60, 5, 'Pisos'),
(61, 5, 'Porcelanatos'),
(62, 6, 'Bases'),
(63, 6, 'Esmaltes'),
(64, 6, 'Acrílicas'),
(65, 8, 'Portas de Alumínio'),
(66, 8, 'Portas de Madeira'),
(67, 8, 'Portas de Aço'),
(68, 8, 'Portas Corrediças'),
(69, 8, 'Portas de Madeira'),
(70, 8, 'Janelas de Madeira'),
(71, 8, 'Janelas de Alumínio'),
(72, 7, 'Arandelas'),
(73, 7, 'Lâmpadas'),
(74, 7, 'Luminárias'),
(75, 9, 'Baldes'),
(76, 9, 'Escovas'),
(77, 9, 'Materiais de Limpeza'),
(78, 9, 'Produtos de Higiene'),
(79, 9, 'Produtos de Limpeza'),
(80, 9, 'Sabão'),
(81, 11, 'Alicates'),
(82, 11, 'Chaves combinadas'),
(83, 11, 'Chaves estrela'),
(84, 11, 'Cortadores de tubo'),
(85, 11, 'Escadas'),
(86, 11, 'Kits de ferramentas'),
(87, 11, 'Martelos'),
(88, 12, 'Furadeira'),
(89, 12, 'Serra-mármore'),
(90, 12, 'Discos de Corte'),
(91, 13, 'Dobradiças'),
(92, 13, 'Fechaduras e travas'),
(93, 13, 'Pregos'),
(94, 13, 'Puxadores'),
(95, 10, 'Botas de segurança'),
(96, 10, 'Luvas'),
(97, 10, 'Máscaras de proteção'),
(98, 10, 'Óculos de proteção'),
(99, 10, 'Outros EPIs'),
(100, 14, 'Horta'),
(101, 14, 'Ferramentas de jardinagem'),
(102, 15, 'Vaso sanitários'),
(103, 15, 'Assento para vaso sanitário'),
(104, 15, 'Pias'),
(105, 15, 'Gabinetes'),
(106, 15, 'Acessórios'),
(107, 16, 'Churrasqueira'),
(108, 16, 'Piscinas'),
(109, 17, 'Brinquedos'),
(110, 18, 'Papelaria'),
(111, 92, 'cadeados'),
(112, 92, 'tetrachave'),
(113, 92, 'standard');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificação', AUTO_INCREMENT=114;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
