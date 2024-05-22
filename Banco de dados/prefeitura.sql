-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22/05/2024 às 21:44
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `prefeitura`
--
CREATE DATABASE IF NOT EXISTS `prefeitura` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `prefeitura`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tblocais`
--

CREATE TABLE `tblocais` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `rua` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `fksecretarias` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tblocais`
--

INSERT INTO `tblocais` (`id`, `nome`, `descricao`, `rua`, `bairro`, `numero`, `fksecretarias`) VALUES
(52, 'Prefeitura', '686', 'R. João O Rezende', 'Centro', '686', 52),
(53, 'Junta do Serviço Militar', '', 'R. Leopoldo José de Souza', 'Centro', '1030', 52),
(54, 'Arquivo', '', 'R. Leopoldo José de Souza', 'Centro', '	1030', 52),
(55, 'Nota do Produtor', '1030', 'R. Leopoldo José de Souza', 'Centro', '1030', 53),
(56, 'Defesa Civil', '', 'Av. Brasil', 'Centro', 'N/A', 52),
(57, 'Obras', '', 'R. João O Rezende', 'Centro', '686', 52),
(58, 'Ginásio Esportes', '1', 'Av. Ayrton Senna', 'Centro', '1', 52),
(59, 'Casa da Cultura', '515', 'Rua Peabiru', 'Centro', '515', 52),
(60, 'Sec. Saúde', '', 'R. São Paulo', 'Centro', '271', 54),
(61, 'Hospital Municipal', '', 'Av. Guaíra', 'Centro', '2254', 54),
(62, 'Posto Central', '', 'Av. Paraná', 'Praça XV de Novembro', 'N/A', 54),
(63, 'Amai', '', 'Av. Palmas', 'Centro', '57', 54),
(64, 'Centro Odontológico', '', 'Av. Brasil', 'Centro', '2935', 54),
(65, 'Ambulatório', '', 'Av. Guaíra', 'Centro', '2254', 54),
(66, 'UBS Jardim Cruzeiro', '', 'Av. Goiás', 'Centro', '909', 54),
(67, 'Vigilância Sanitária', '', 'Av. Brasil', 'Centro', ' 2767', 54),
(68, 'Academia de Saúde', ' S/N', 'Av. Brasil', 'S/N', ' S/N', 54),
(69, 'Farmácia Municipal', '', 'Av. Brasil', 'Centro', '3822', 54),
(70, 'Câmara Municipal', '', 'Av. Brasil', 'Centro', '2580', 54),
(71, 'Assistência Social', '', 'Avenida Rio Branco', 'Centro', '36', 51),
(72, 'CRAS', '', 'Av. Elías Batista da Silva', 'Centro', '140', 51),
(73, 'Cadastro Único', '', 'Av. Elías Batista da Silva', 'Centro', '197', 51),
(74, 'Visão jovem - Centro de referência da juventude', '', 'Av. Lindolfo Monteiro', 'Centro', '935', 51),
(75, 'CREAS', '', 'Av. Aparício Teixeira D\'avila', 'Centro', '113', 51),
(76, 'Projeto Alternativo', '', 'N/A', 'N/A', 'N/A', 51),
(77, 'Karatê Pia', '', 'R. Sertanópolis', 'Centro', '249', 51),
(78, 'Educação', '', 'R. Peabiru', 'Centro', '515', 50),
(79, 'Agência de Fomento', '', 'Av. Brasil', 'Centro', '2250', 52);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbramais_ex`
--

CREATE TABLE `tbramais_ex` (
  `id` int(11) NOT NULL,
  `setor` varchar(255) NOT NULL,
  `numero` varchar(255) NOT NULL,
  `nome` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbramais_ex`
--

INSERT INTO `tbramais_ex` (`id`, `setor`, `numero`, `nome`) VALUES
(40, 'Departamento de Notas', '3676-8170', 'Jurandir/Francismeire'),
(48, 'Assistência Social', '3676-3422', 'A definir'),
(49, 'Arquivos', '3676-5603', 'Marcio/Marcos'),
(50, 'Centro Odontológico', '3676-5073', 'A definir'),
(51, 'CRAS - Ação Social ', '3676-2349', 'A definir'),
(52, 'Agência do Trabalhador', '3676-4906', 'A definir'),
(53, 'CREAS - Assistência Social', '3676-4495', 'A definir'),
(54, 'Cultura', '3676-1756', 'A definir'),
(55, 'Educação', '3676-1636', 'A definir'),
(56, 'Hospital Municipal', '3676-1756/3676-4834', 'A definir'),
(57, 'Junta Militar / Identidade', '3676-2778', 'A definir'),
(59, 'Meio Ambiente', '3676-4753', 'Danilo Rezende/Marcela'),
(60, 'Obras/Garagem', '3676-2535', 'A definir'),
(61, 'Ouvidoria Municipal', '3676-5307', 'A definir'),
(62, 'Paço Municipal', '3676-8150', 'A definir'),
(63, 'Posto de Saúde - São Silvestre', '3589-1146', 'A definir'),
(64, 'Saúde (Bem Estar)', '3676-2466', 'A definir'),
(65, 'Vigilância Sanitária', '3676-2999', 'A definir'),
(66, 'Visão Jovem', '3676-3253', 'A definir'),
(67, 'Casa do Empreendedor 36', '3676-8162', 'A definir'),
(68, 'Tereza Arca', '9990-77785', 'Tereza Arca'),
(69, 'Clínica Centro de Atendimento CAM', '3676-8160', 'A definir'),
(70, 'Secretaria Cultura', '3676-1951', 'A definir'),
(71, 'Farmácia Municipal', '3676-1528', 'A definir'),
(72, 'Fórum Eleitoral', '3676-8550', 'A definir'),
(73, 'CRJ CENTRO DE REFERENCIA ', '3676-3253', 'A definir'),
(74, 'SUPER CRECHE', '3676-2532', 'A definir');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbramais_in`
--

CREATE TABLE `tbramais_in` (
  `id` int(11) NOT NULL,
  `numero` varchar(50) NOT NULL,
  `responsavel` varchar(255) DEFAULT NULL,
  `setor` varchar(255) NOT NULL,
  `fklocais` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbramais_in`
--

INSERT INTO `tbramais_in` (`id`, `numero`, `responsavel`, `setor`, `fklocais`) VALUES
(17, '300', 'A Definir', 'Assessoria Imprensa', 52),
(18, '200', 'A Definir', 'Telefonistas', 52),
(19, '202', 'A Definir', 'Cantina', 52),
(20, '203', 'A Definir', 'Chefia de Gabinete', 52),
(22, '204', 'A Definir', 'Contabilidade 1', 52),
(23, '205', 'A Definir', 'Contabilidade 2', 52),
(24, '206', 'A Definir', 'Controladoria', 52),
(25, '207', 'A Definir', 'Finanças', 52),
(26, '208', 'A Definir', 'Gabinete', 52),
(27, '209', 'A Definir', 'Compras', 52),
(28, '210', 'A Definir', 'Jurídico', 52),
(29, '211', 'A Definir', 'Licitações', 52),
(30, '212', 'A Definir', 'Patrimônio', 52),
(31, '213', 'A Definir', 'Planejamento 1', 52),
(32, '214', 'A Definir', 'Planejamento 2', 52),
(33, '215', 'A Definir', 'Sec. Desenvolvimento', 52),
(34, '216', 'A Definir', 'Previdência', 52),
(35, '217', 'A Definir', 'Recepção', 52),
(36, '218', 'A Definir', 'Rh', 52),
(37, '219', 'A Definir', 'Rh 2', 52),
(38, '220', 'A Definir', 'Sec Administração', 52),
(39, '221', 'A Definir', 'Sec Gabinete', 52),
(40, '222', 'A Definir', 'Ouvidora', 52),
(41, '223', 'A Definir', 'Tesouraria', 52),
(42, '224', 'A Definir', 'Tributação', 52),
(43, '225', 'A Definir', 'Tributação', 52),
(44, '226', 'Anselmo / Junior', 'Informática ', 52),
(45, '227', 'Anselmo / Junior', 'Informática', 52),
(46, '228', 'A Definir', 'Jurídico 2', 52),
(47, '229', ' joão', 'Contabilidade', 52),
(48, '240', 'A Definir', 'Atendimento', 52),
(49, '242', 'Marcos/Marcio', 'Arquivo', 54),
(50, '244', 'Jurandir/Francismeire', 'Atendimento', 55),
(51, '245', 'Jurandir/Francismeire', 'CADPRO', 55),
(52, '250', 'Andrade', 'Defesa Civil', 56),
(53, '255', 'A Definir', 'Recepção', 57),
(54, '260', 'A Definir', 'Casa da Cultura', 59),
(55, '265', 'A Definir', 'Ginásio', 58),
(56, '270', 'A Definir', 'Atendimento', 79),
(57, '271', 'A Definir', 'GSWave1', 79),
(58, '300', 'A Definir', 'Recepção', 60),
(59, '301', 'A Definir', 'Atenção Primária', 60),
(60, '302', 'A Definir', 'Agendamento', 60),
(61, '303', 'A Definir', 'Compras', 60),
(62, '304', 'A Definir', 'Serviço Social', 60),
(63, '305', 'A Definir', 'Transporte', 60),
(64, '310', 'A Definir', 'Recepção', 61),
(65, '311', 'A Definir', 'Cordenação', 61),
(66, '312', 'A Definir', 'Cons Médico', 61),
(67, '313', 'A Definir', 'Centro Cirurgico', 52),
(68, '314', 'A Definir', '3 Andar sem fio', 61),
(69, '315', 'A Definir', 'Enfermagem', 61),
(70, '316', 'A Definir', 'Raio x', 61),
(71, '317', 'A Definir', 'Farmácia', 61),
(72, '318', 'A Definir', 'Cozinha', 61),
(73, '325', 'A Definir', 'Recepção', 62),
(74, '326', 'A Definir', 'Coordenção', 62),
(75, '327', 'A Definir', 'Laboratório', 62),
(76, '328', 'A Definir', 'Vacina', 62),
(77, '329', 'A Definir', 'Recepção 2 S/F', 62),
(78, '335', 'A Definir', 'Recepção', 63),
(79, '336', 'A Definir', 'Triagem', 63),
(81, '340', 'A Definir', 'Recepção', 64),
(82, '341', 'A Definir', 'Coordenção', 64),
(83, '350', 'A Definir', 'Recepção', 66),
(84, '356', 'A Definir', 'Recepção 2', 66),
(85, '355', 'A Definir', 'Atendimento', 67),
(86, '356', 'A Definir', 'Coordenção', 67),
(87, '390', 'A Definir', 'Academia da Saúde', 68),
(88, '392', 'A Definir', 'Farmácia', 69),
(89, '400', 'A Definir', 'Recepção', 71),
(90, '401', 'A Definir', 'Equipe técnica', 71),
(91, '402', 'A Definir', 'Compras', 71),
(92, '403', 'Joao', '', 71),
(93, '404', 'Thais', '', 71),
(94, '405', 'Ana Paulo Nocko', '', 71),
(95, '406', 'Selma', '', 71),
(96, '410', 'A Definir', 'Recepção', 72),
(97, '411', 'Tayana', '', 72),
(98, '412', 'Viviane', '', 72),
(99, '413', 'Lilian', '', 72),
(100, '414', 'Valdenice', '', 72),
(101, '415', 'A Definir', 'CadUnico', 73),
(102, '416', 'Telma', '', 73),
(103, '417', 'Patricia', '', 73),
(104, '418', 'Grazielle', '', 73),
(105, '419', 'Mirian', '', 73),
(106, '420', 'A Definir', 'Recepção', 74),
(107, '421', 'Cristiane', '', 74),
(108, '422', 'Aline', '', 74),
(109, '425', 'A Definir', 'Recepção', 75),
(110, '426', 'A Definir', 'GSWave 1', 75),
(111, '427', 'A Definir', 'GSWave 2', 75),
(112, '428', 'A Definir', 'GSWave 3', 75),
(113, '429', 'A Definir', 'GSWave 4', 75),
(114, '440', 'Kaune', '', 72),
(115, '441', 'Nicole', '', 72),
(116, '442', 'Alessandra G.S', '', 73),
(117, '450', 'A Definir', 'Atendimento', 76),
(118, '455', 'A Definir', 'Atendimento', 76),
(119, '500', 'A Definir', 'Recepção', 78),
(120, '501', 'A Definir', 'Pedagogico 1', 78),
(121, '502', 'A Definir', 'Pedagogico 2', 78),
(122, '503', 'A Definir', 'Pedagogico 3', 78),
(123, '504', 'A Definir', 'Estrutura', 78),
(124, '505', 'A Definir', 'Transporte', 78),
(125, '506', 'A Definir', 'Nutricionista', 78),
(126, '507', 'A Definir', 'Compras', 78),
(127, '508', 'A Definir', 'Compras 2', 78),
(128, '510', 'A Definir', 'SERE', 78),
(129, '511', 'A Definir', 'Pedagogico 4', 78),
(130, '512', 'A Definir', 'Informática ', 78),
(131, '513', 'A Definir', 'Ed. Especial/Psico', 78),
(132, '514', 'A Definir', 'Secretaria', 78),
(133, '515', 'Jouglas Móvel', '', 78);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbsecretarias`
--

CREATE TABLE `tbsecretarias` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbsecretarias`
--

INSERT INTO `tbsecretarias` (`id`, `nome`) VALUES
(50, 'Secretaria de Educação'),
(51, 'Secretaria de Assistência Social'),
(52, 'Prefeitura e Serviços'),
(53, 'Secretaria de Agricultura'),
(54, 'Secretaria de Saúde');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbusuarios`
--

CREATE TABLE `tbusuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbusuarios`
--

INSERT INTO `tbusuarios` (`id`, `nome`, `senha`) VALUES
(26, 'admin@admin.com', '$2y$10$AcsFxBRDHWr/OtN3lHsDyOHC./Evmgq0bxmbSASvTC/uFZBZG.Nl2');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tblocais`
--
ALTER TABLE `tblocais`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fksecretarias` (`fksecretarias`);

--
-- Índices de tabela `tbramais_ex`
--
ALTER TABLE `tbramais_ex`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tbramais_in`
--
ALTER TABLE `tbramais_in`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fklocais` (`fklocais`);

--
-- Índices de tabela `tbsecretarias`
--
ALTER TABLE `tbsecretarias`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tbusuarios`
--
ALTER TABLE `tbusuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tblocais`
--
ALTER TABLE `tblocais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT de tabela `tbramais_ex`
--
ALTER TABLE `tbramais_ex`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT de tabela `tbramais_in`
--
ALTER TABLE `tbramais_in`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT de tabela `tbsecretarias`
--
ALTER TABLE `tbsecretarias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de tabela `tbusuarios`
--
ALTER TABLE `tbusuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tblocais`
--
ALTER TABLE `tblocais`
  ADD CONSTRAINT `fksecretarias` FOREIGN KEY (`fksecretarias`) REFERENCES `tbsecretarias` (`id`);

--
-- Restrições para tabelas `tbramais_in`
--
ALTER TABLE `tbramais_in`
  ADD CONSTRAINT `fklocais` FOREIGN KEY (`fklocais`) REFERENCES `tblocais` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
