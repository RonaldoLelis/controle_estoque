-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 09-Dez-2018 às 22:09
-- Versão do servidor: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `estoque_desk`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(5) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `nome`, `descricao`) VALUES
(1, 'Acabamento', 'Materiais destinados ao acabamento'),
(2, 'Escritório...', 'Materiais destinados ao uso do Escritório'),
(3, 'Instalação', 'Materiais destinados à instalação externa'),
(9, 'excluir_1', 'excluir_1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `entrada`
--

CREATE TABLE `entrada` (
  `id_nf` int(5) NOT NULL,
  `produto` varchar(120) NOT NULL,
  `descricao_prod` varchar(150) NOT NULL,
  `quantidade` int(5) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `numero_nf` int(15) NOT NULL,
  `data_nf` date NOT NULL,
  `valor_nf` varchar(15) NOT NULL,
  `natureza_nf` varchar(50) NOT NULL,
  `fornecedor` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `entrada`
--

INSERT INTO `entrada` (`id_nf`, `produto`, `descricao_prod`, `quantidade`, `categoria`, `numero_nf`, `data_nf`, `valor_nf`, `natureza_nf`, `fornecedor`) VALUES
(1, 'Luva de pano', 'Luva para manusear adesivo', 6, 'instalação', 123, '2018-12-09', 'R$ 43,00', 'Venda', 'Empresa_Teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedores`
--

CREATE TABLE `fornecedores` (
  `id` int(11) NOT NULL,
  `nome_empresa` varchar(120) NOT NULL,
  `cnpj` int(15) NOT NULL,
  `apresentacao` text NOT NULL,
  `logradouro` varchar(150) NOT NULL,
  `numero` int(5) NOT NULL,
  `complemento` varchar(50) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `site` varchar(100) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `falar_com` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `fornecedores`
--

INSERT INTO `fornecedores` (`id`, `nome_empresa`, `cnpj`, `apresentacao`, `logradouro`, `numero`, `complemento`, `bairro`, `cidade`, `estado`, `site`, `facebook`, `telefone`, `falar_com`, `email`) VALUES
(1, 'Empresa_Teste', 123456789, 'Empresa situada em SJC desde 1990', 'Rua teste dos testes', 123, 'casa', 'Jardim testando', 'SJCampos', 'São Paulo', 'www.teste.com.br', 'facebook.com/Teste', '12 3333-4444', 'Sr. Teste', 'teste@teste.com'),
(2, 'teste_001', 1234567890, 'teste_001', 'teste_001', 0, 'teste_001', 'teste_001', 'teste_001', 'teste_001', 'teste_001.com.br', 'teste_001.com', '12 3344-4444', 'teste_001', 'teste_001@teste.com'),
(3, 'Teste_00123456', 123456, 'Teste_00123456 Teste_00123456 Teste_00123456', 'Teste_00123456', 321, 'Teste_00123456', 'Teste_00123456', 'Teste_00123456', 'Teste_00123456', 'Teste_00123456.com.br', 'Teste_00123456.com', '12 3333-3333', 'Teste_00123456', 'Teste_00123456@teste.com.br'),
(4, 'Outro_Teste', 123456, 'Outro_Teste', 'Rua Outro_Teste', 333, 'Outro_Teste', 'Jardim Outro_Teste', 'Outro_Teste', 'Outro_Teste', 'www.outroteste.com.br', '...', '11 3555-7777', 'Outro_Teste', 'Outro_Teste@teste.com.br');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(5) NOT NULL,
  `categoria_id` varchar(50) NOT NULL,
  `nome_prod` varchar(50) NOT NULL,
  `descricao_prod` varchar(150) NOT NULL,
  `qtde_prod` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `categoria_id`, `nome_prod`, `descricao_prod`, `qtde_prod`) VALUES
(6, 'Escritório...', 'régua', 'régua 30cm', 5),
(7, 'Acabamento', 'fita', 'fita adesiva 25mm', 100),
(8, 'Instalação', 'luva', 'luva de borracha', 3),
(9, 'Instalação', 'espátula', 'espátula de borracha', 5),
(10, 'Instalação', 'Parafuso 3/4', 'parafuso de fenda 3/4', 250),
(11, 'Acabamento', 'teste-2', 'teste-2', 2),
(12, 'Instalação', 'pincel', 'pincel 4mm', 2),
(13, 'Escritório...', 'Caneta azul', 'Caneta BIC azul', 15),
(14, 'Escritório...', 'Copo descartável', 'Copo descartável 200ml', 100),
(15, 'Escritório...', 'Post-It', 'anotações', 10),
(16, 'Instalação', '1234', '1234', 0),
(17, 'Acabamento', 'excluir_1', 'excluir_1', 2),
(18, 'excluir_1', 'teste_123456', 'efWEGWRGHRWHGREHY', 34);

-- --------------------------------------------------------

--
-- Estrutura da tabela `requisicoes`
--

CREATE TABLE `requisicoes` (
  `id` int(5) NOT NULL,
  `nome_prod` varchar(50) NOT NULL,
  `solicitante` varchar(50) NOT NULL,
  `qtde_solicitada` int(5) DEFAULT NULL,
  `qtde_prod` int(5) NOT NULL,
  `categoria_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `requisicoes`
--

INSERT INTO `requisicoes` (`id`, `nome_prod`, `solicitante`, `qtde_solicitada`, `qtde_prod`, `categoria_id`) VALUES
(1, 'espátula', 'Ronaldo', 2, 5, 'Instalação'),
(2, 'régua', 'eu', 0, 5, '0'),
(3, '3', 'Nilson', 7, 12, '4'),
(5, 'lápis', 'Lélis', 1, 3, 'escritório'),
(6, 'Parafuso 3/4', 'Nilson', 25, 250, 'Instalação'),
(7, 'fita', 'Tino', 1, 100, 'Acabamento'),
(8, 'régua', 'Erick', 1, 5, 'Escritório...'),
(9, 'luva', 'Paulo', 1, 3, 'Instalação'),
(10, 'fita', 'eu', 1, 100, 'Acabamento'),
(11, 'fita', 'eu', 0, 100, 'Acabamento'),
(12, 'Parafuso 3/4', 'Lélis', 2, 250, 'Instalação'),
(13, 'régua', 'eu', 1, 5, 'Escritório...'),
(14, 'fita', 'eu de novo', 2, 100, 'Acabamento'),
(15, 'fita', 'eu de novo', 2, 100, 'Acabamento'),
(16, 'fita', 'eu de novo', 2, 100, 'Acabamento'),
(17, 'luva', 'josé', 3, 3, 'Instalação'),
(18, 'espátula', 'carlos', 1, 5, 'Instalação'),
(19, 'Parafuso 3/4', 'bruno', 3, 250, 'Instalação'),
(20, 'luva', 'Vilma', 2, 3, 'Instalação'),
(21, 'luva', 'Vilma', 2, 3, 'Instalação'),
(22, 'fita', 'Lima', 2, 100, 'Acabamento'),
(23, 'espátula', 'Kauan', 3, 5, 'Instalação'),
(24, 'Caneta azul', 'Norma', 2, 15, 'Escritório...');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `entrada`
--
ALTER TABLE `entrada`
  ADD PRIMARY KEY (`id_nf`);

--
-- Indexes for table `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requisicoes`
--
ALTER TABLE `requisicoes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `entrada`
--
ALTER TABLE `entrada`
  MODIFY `id_nf` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `fornecedores`
--
ALTER TABLE `fornecedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `requisicoes`
--
ALTER TABLE `requisicoes`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
