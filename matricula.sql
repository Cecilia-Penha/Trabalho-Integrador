-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22-Fev-2023 às 22:15
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `matricula`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `nome_resp` varchar(30) DEFAULT NULL,
  `matricula` int(11) NOT NULL,
  `cod_p_aluno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`nome_resp`, `matricula`, `cod_p_aluno`) VALUES
('Joao Pai', 5, 13),
('Pedro Pai', 6, 14),
('Maria Pai', 7, 15);

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos_mod`
--

CREATE TABLE `alunos_mod` (
  `cod_mat` int(11) NOT NULL,
  `c_aluno` int(11) NOT NULL,
  `c_mod` int(11) NOT NULL,
  `data_mat` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `alunos_mod`
--

INSERT INTO `alunos_mod` (`cod_mat`, `c_aluno`, `c_mod`, `data_mat`) VALUES
(10, 15, 16, '2023-02-18 10:47:06'),
(11, 15, 12, '2023-02-18 10:47:08'),
(12, 14, 18, '2023-02-18 10:48:27'),
(13, 14, 20, '2023-02-18 10:48:30'),
(14, 13, 20, '2023-02-18 10:48:53'),
(15, 13, 22, '2023-02-18 10:48:59'),
(17, 13, 23, '2023-02-20 17:20:07');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `cod_f` int(11) NOT NULL,
  `senha_f` varchar(20) NOT NULL,
  `cod_p_func` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`cod_f`, `senha_f`, `cod_p_func`) VALUES
(1, 'senha', 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `modalidade`
--

CREATE TABLE `modalidade` (
  `cod_m` int(11) NOT NULL,
  `nome_m` varchar(20) NOT NULL,
  `valor` float NOT NULL,
  `dia` varchar(20) NOT NULL,
  `horario` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `modalidade`
--

INSERT INTO `modalidade` (`cod_m`, `nome_m`, `valor`, `dia`, `horario`) VALUES
(10, 'Dança', 80, 'Terça-Feira', '17:00'),
(11, 'Dança', 80, 'Quinta-Feira', '17:00'),
(12, 'Teatro', 100, 'Sábado', '17:00'),
(13, 'Karate', 130, 'Sábado', '16:00'),
(14, 'Karate', 130, 'Terça-Feira', '19:00'),
(15, 'Karate', 130, 'Quinta-Feira', '19:00'),
(16, 'Capoeira', 130, 'Segunda-Feira', '18:00'),
(17, 'Capoeira', 130, 'Quarta-Feira', '18:00'),
(18, 'Capoeira', 130, 'Sábado', '14:00'),
(19, 'Aikido', 130, 'Sábado', '10:00'),
(20, 'Aikido', 130, 'Terça-Feira', '16:00'),
(21, 'Aikido', 130, 'Sexta-Feira', '20:00'),
(22, 'Circo', 80, 'Sexta-Feira', '19:00'),
(23, 'Teatro', 100, 'Segunda-Feira', '18:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamento`
--

CREATE TABLE `pagamento` (
  `cod_paga` int(11) NOT NULL,
  `data_p` datetime DEFAULT current_timestamp(),
  `forma_p` varchar(20) NOT NULL,
  `valor` float NOT NULL,
  `cod_aluno_paga` int(11) NOT NULL,
  `cod_mod_paga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pagamento`
--

INSERT INTO `pagamento` (`cod_paga`, `data_p`, `forma_p`, `valor`, `cod_aluno_paga`, `cod_mod_paga`) VALUES
(31, '2023-02-18 10:47:46', 'boleto', 130, 15, 16),
(32, '2023-02-18 10:48:37', 'pix', 130, 14, 20),
(33, '2023-02-18 10:49:05', 'cartao', 80, 13, 22),
(34, '2023-02-20 17:27:58', 'pix', 100, 13, 23);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `nome` varchar(30) NOT NULL,
  `endereço` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `data_nasc` date NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `cod_p` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`nome`, `endereço`, `email`, `data_nasc`, `telefone`, `senha`, `cod_p`) VALUES
('funcionario', 'rua', 'func@gmail', '1980-08-22', '909090', 'senha', 8),
('Joao', 'Rua Getúlio Vargas', 'joao@gmail.com', '2001-08-08', '4444444', 'senha', 13),
('Pedro', 'Rua Fernando Machado', 'pedro@gmail.com', '2001-05-05', '55555555', 'senha', 14),
('Maria', 'Rua Marechal Deodoro', 'maria@gmail.com', '2003-05-02', '45454545', 'senha', 15);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`matricula`),
  ADD KEY `cod_p_aluno` (`cod_p_aluno`);

--
-- Índices para tabela `alunos_mod`
--
ALTER TABLE `alunos_mod`
  ADD PRIMARY KEY (`cod_mat`),
  ADD KEY `c_aluno` (`c_aluno`),
  ADD KEY `c_mod` (`c_mod`);

--
-- Índices para tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`cod_f`),
  ADD KEY `cod_p_func` (`cod_p_func`);

--
-- Índices para tabela `modalidade`
--
ALTER TABLE `modalidade`
  ADD PRIMARY KEY (`cod_m`);

--
-- Índices para tabela `pagamento`
--
ALTER TABLE `pagamento`
  ADD PRIMARY KEY (`cod_paga`),
  ADD KEY `cod_aluno_paga` (`cod_aluno_paga`),
  ADD KEY `cod_mod_paga` (`cod_mod_paga`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cod_p`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `aluno`
--
ALTER TABLE `aluno`
  MODIFY `matricula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `alunos_mod`
--
ALTER TABLE `alunos_mod`
  MODIFY `cod_mat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `modalidade`
--
ALTER TABLE `modalidade`
  MODIFY `cod_m` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `pagamento`
--
ALTER TABLE `pagamento`
  MODIFY `cod_paga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `cod_p` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `aluno_ibfk_1` FOREIGN KEY (`cod_p_aluno`) REFERENCES `usuario` (`cod_p`);

--
-- Limitadores para a tabela `alunos_mod`
--
ALTER TABLE `alunos_mod`
  ADD CONSTRAINT `alunos_mod_ibfk_1` FOREIGN KEY (`c_aluno`) REFERENCES `aluno` (`cod_p_aluno`),
  ADD CONSTRAINT `alunos_mod_ibfk_2` FOREIGN KEY (`c_mod`) REFERENCES `modalidade` (`cod_m`);

--
-- Limitadores para a tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD CONSTRAINT `funcionario_ibfk_1` FOREIGN KEY (`cod_p_func`) REFERENCES `usuario` (`cod_p`);

--
-- Limitadores para a tabela `pagamento`
--
ALTER TABLE `pagamento`
  ADD CONSTRAINT `pagamento_ibfk_1` FOREIGN KEY (`cod_aluno_paga`) REFERENCES `aluno` (`cod_p_aluno`),
  ADD CONSTRAINT `pagamento_ibfk_2` FOREIGN KEY (`cod_mod_paga`) REFERENCES `modalidade` (`cod_m`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
