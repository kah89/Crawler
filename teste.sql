-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Set-2022 às 20:49
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `teste`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `artigos`
--

CREATE TABLE `artigos` (
  `ID_ARTIGOS` int(11) UNSIGNED NOT NULL,
  `NOME` varchar(200) DEFAULT NULL,
  `LINK` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `artigos`
--

INSERT INTO `artigos` (`ID_ARTIGOS`, `NOME`, `LINK`) VALUES
(1, 'TESTE22222222222222', 'www.teste.com.br'),
(6, 'Google', 'www.google.com.br');

-- --------------------------------------------------------

--
-- Estrutura da tabela `autorizacoes`
--

CREATE TABLE `autorizacoes` (
  `USUARIO_ID` int(11) UNSIGNED NOT NULL,
  `CHAVE_AUTORIZACAO` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `autorizacoes`
--

INSERT INTO `autorizacoes` (`USUARIO_ID`, `CHAVE_AUTORIZACAO`) VALUES
(1, 'cadastrar_clientes'),
(1, 'excluir_clientes');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `USUARIO_ID` int(11) UNSIGNED NOT NULL,
  `LOGIN` varchar(30) NOT NULL,
  `SENHA` varchar(30) NOT NULL,
  `NOME_COMPLETO` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`USUARIO_ID`, `LOGIN`, `SENHA`, `NOME_COMPLETO`) VALUES
(1, 'Admin ', '1234', 'Admin T.'),
(2, 'karinaR', '1234', 'karina souza');

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `vw_autorizacoes`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `vw_autorizacoes` (
`CHAVE` varchar(22)
,`DESCRICAO` varchar(25)
);

-- --------------------------------------------------------

--
-- Estrutura para vista `vw_autorizacoes`
--
DROP TABLE IF EXISTS `vw_autorizacoes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_autorizacoes`  AS SELECT 'cadastrar_clientes' AS `CHAVE`, 'Cadastrar clientes' AS `DESCRICAO` union all select 'excluir_clientes' AS `CHAVE`,'Excluir clientes' AS `DESCRICAO` union all select 'cadastrar_fornecedores' AS `CHAVE`,'Cadastrar fornecedores' AS `DESCRICAO` union all select 'excluir_fornecedores' AS `CHAVE`,'Excluir fornecedores' AS `DESCRICAO` union all select 'cadastrar_produtos' AS `CHAVE`,'Cadastrar produtos' AS `DESCRICAO` union all select 'alterar_preco_produtos' AS `CHAVE`,'Alterar preço de produtos' AS `DESCRICAO`  ;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `artigos`
--
ALTER TABLE `artigos`
  ADD PRIMARY KEY (`ID_ARTIGOS`);

--
-- Índices para tabela `autorizacoes`
--
ALTER TABLE `autorizacoes`
  ADD PRIMARY KEY (`USUARIO_ID`,`CHAVE_AUTORIZACAO`) USING BTREE;

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`USUARIO_ID`),
  ADD UNIQUE KEY `IDX_USUARIOS_LOGIN` (`LOGIN`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `artigos`
--
ALTER TABLE `artigos`
  MODIFY `ID_ARTIGOS` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `USUARIO_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `autorizacoes`
--
ALTER TABLE `autorizacoes`
  ADD CONSTRAINT `FK_USUARIOS_AUTORIZACOES` FOREIGN KEY (`USUARIO_ID`) REFERENCES `usuarios` (`USUARIO_ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
