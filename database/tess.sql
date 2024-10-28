-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28/10/2024 às 03:39
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
-- Banco de dados: `tess`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `conteudo`
--

CREATE TABLE `conteudo` (
  `id` int(11) NOT NULL,
  `id_nivel` int(11) NOT NULL,
  `semana` int(11) NOT NULL,
  `dia` int(11) NOT NULL,
  `titulo` varchar(500) NOT NULL,
  `descricao` varchar(10000) NOT NULL,
  `concluido` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `nivel`
--

CREATE TABLE `nivel` (
  `id` int(11) NOT NULL,
  `nivel` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `nivel`
--

INSERT INTO `nivel` (`id`, `nivel`) VALUES
(19, 'A1'),
(20, 'A2'),
(21, 'B1'),
(22, 'B2'),
(23, 'C1'),
(24, 'C2');

-- --------------------------------------------------------

--
-- Estrutura para tabela `perguntas`
--

CREATE TABLE `perguntas` (
  `id` int(11) NOT NULL,
  `pergunta` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `perguntas`
--

INSERT INTO `perguntas` (`id`, `pergunta`) VALUES
(19, 'Can I park here?'),
(20, 'What colour will you paint the children\'s bedroom?'),
(21, 'I can\'t understand this email.'),
(22, 'I\'d like two tickets for tomorrow night.'),
(23, 'Shall we go to the gym now?'),
(24, 'His eyes were ...... bad that he couldn\'t read the number plate of the car in front.'),
(25, 'The company needs to decide ...... and for all what its position is on this point.'),
(26, 'Don\'t put your cup on the ...... of the table – someone will knock it off.'),
(27, 'I\'m sorry - I didn\'t ...... to disturb you.'),
(28, 'The singer ended the concert ...... her most popular song.'),
(29, 'Would you mind ...... these plates a wipe before putting them in the cupboard?'),
(30, 'I was looking forward ...... at the new restaurant, but it was closed.'),
(31, '...... tired Melissa is when she gets home from work, she always makes time to say goodnight to the children.'),
(32, 'It was only ten days ago ...... she started her new job.'),
(33, 'The shop didn\'t have the shoes I wanted, but they\'ve ...... a pair specially for me.'),
(34, 'Have you got time to discuss your work now or are you ...... to leave?'),
(35, 'She came to live here ...... a month ago.'),
(36, 'Once the plane is in the air, you can ...... your seat belts if you wish.'),
(37, 'I left my last job because I had no ...... to travel.'),
(38, 'It wasn\'t a bad crash and ...... damage was done to my car.'),
(39, 'I\'d rather you ...... to her why we can\'t go.'),
(40, 'Before making a decision, the leader considered all ...... of the argument.'),
(41, 'This new printer is recommended as being ...... reliable.'),
(42, 'When I realised I had dropped my gloves, I decided to ...... my steps.'),
(43, 'Anne\'s house is somewhere in the ...... of the railway station.');

-- --------------------------------------------------------

--
-- Estrutura para tabela `quiz`
--

CREATE TABLE `quiz` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `resposta_correta` int(11) NOT NULL,
  `completado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `quiz`
--

INSERT INTO `quiz` (`id`, `id_usuario`, `resposta_correta`, `completado`) VALUES
(1, 29, 14, 1),
(18, 31, 10, 1),
(19, 32, 10, 1),
(20, 32, 10, 1),
(21, 33, 8, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `respostas`
--

CREATE TABLE `respostas` (
  `id` int(11) NOT NULL,
  `id_pergunta` int(11) NOT NULL,
  `resposta` varchar(250) NOT NULL,
  `correta` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `respostas`
--

INSERT INTO `respostas` (`id`, `id_pergunta`, `resposta`, `correta`) VALUES
(19, 19, 'Sorry, I did that.', 0),
(20, 19, 'It\'s the same place.', 0),
(21, 19, 'Only for half an hour.', 1),
(22, 20, 'I hope it was right.', 0),
(23, 20, 'We can\'t decide.', 1),
(24, 20, 'It wasn\'t very difficult.', 0),
(25, 21, 'Would you like some help?', 1),
(26, 21, 'Don\'t you know?', 0),
(27, 21, 'I suppose you can.', 0),
(28, 22, 'How much did you pay?', 0),
(29, 22, 'Afternoon and evening.', 0),
(30, 22, 'I\'ll just check for you.', 1),
(31, 23, 'I\'m too tired.', 1),
(32, 23, 'It\'s very good.', 0),
(33, 23, 'Not at all.', 0),
(34, 24, 'so', 1),
(35, 24, 'such', 0),
(36, 24, 'too', 0),
(37, 25, 'once', 1),
(38, 25, 'here', 0),
(39, 25, 'first', 0),
(40, 26, 'edge', 1),
(41, 26, 'outside', 0),
(42, 26, 'boundary', 0),
(43, 27, 'mean', 1),
(44, 27, 'hope', 0),
(45, 27, 'think', 0),
(46, 28, 'with', 1),
(47, 28, 'by', 0),
(48, 28, 'in', 0),
(49, 29, 'giving', 1),
(50, 29, 'making', 0),
(51, 29, 'getting', 0),
(52, 30, 'to eating', 1),
(53, 30, 'to eat', 0),
(54, 30, 'to have eaten', 0),
(55, 31, 'No matter how.', 1),
(56, 31, 'Whatever', 0),
(57, 31, 'However much', 0),
(58, 32, 'that', 1),
(59, 32, 'then', 0),
(60, 32, 'since', 0),
(61, 33, 'ordered', 1),
(62, 33, 'booked', 0),
(63, 33, 'asked', 0),
(64, 34, 'about', 1),
(65, 34, 'thinking', 0),
(66, 34, 'round', 0),
(67, 35, 'almost', 1),
(68, 35, 'quite', 0),
(69, 35, 'beyond', 0),
(70, 36, 'unfasten', 1),
(71, 36, 'undress', 0),
(72, 36, 'unlock', 0),
(73, 37, 'opportunity', 1),
(74, 37, 'place', 0),
(75, 37, 'possibility', 0),
(76, 38, 'little', 1),
(77, 38, 'small', 0),
(78, 38, 'light', 0),
(79, 39, 'explained', 1),
(80, 39, 'would explain', 0),
(81, 39, 'will explain', 0),
(82, 40, 'sides', 1),
(83, 40, 'features', 0),
(84, 40, 'perspectives', 0),
(85, 41, 'highly', 1),
(86, 41, 'greatly', 0),
(87, 41, 'strongly', 0),
(88, 42, 'retrace', 1),
(89, 42, 'regress', 0),
(90, 42, 'resume', 0),
(91, 43, 'vicinity', 1),
(92, 43, 'region', 0),
(93, 43, 'quarter', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `login` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `admin`, `login`) VALUES
(29, 'vini', 'a@a', '$2y$10$4bL3mCcMw4lCkrZgOPC17uchRfoLlPJ.i.R37nj8K7AP/Upp7PyaG', 0, 1),
(30, 'lidia', 'b@b', '$2y$10$cu2zTiqja3AesnuAotDQV.Tue2ufWzxrZO6CKBwSTly8lbXl2/G8.', 1, 0),
(31, 'lucas', 'c@c', '$2y$10$9PbIKriY1HnRt.OWFe.BE.oH1lOri/u7HzuPMGjkfQTZkMMJIOsVO', 0, 1),
(32, 'teste', 'd@d', '$2y$10$ycpotx9sCQWFPPx8GWur6.OU.93eKNNhU82OUSbEJmrt.r6sfOh4.', 0, 1),
(33, 'Lucas', 'lucas@email.com', '$2y$10$kLmqKXke5v8mPJ4cdPsGAeDXjTitEoCFRT.z3mDzkax7QpLL1SV0C', 0, 1),
(34, 'Lucas', 'lucas.c@aluno.ifsp.edu.br', '123456', 0, 0),
(35, 'Igor', 'lucaszeno_@hotmail.com', '$2y$10$d9Vf9IgHwjpnia0zm4Cc5urra7XNimMVCyVzOYwioYestOGA85RLq', 0, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario_nivel`
--

CREATE TABLE `usuario_nivel` (
  `id_nivel` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario_nivel`
--

INSERT INTO `usuario_nivel` (`id_nivel`, `id_usuario`) VALUES
(22, 29),
(21, 31),
(21, 32),
(20, 33);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `conteudo`
--
ALTER TABLE `conteudo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_nivel` (`id_nivel`);

--
-- Índices de tabela `nivel`
--
ALTER TABLE `nivel`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `perguntas`
--
ALTER TABLE `perguntas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_quiz_usuario` (`id_usuario`);

--
-- Índices de tabela `respostas`
--
ALTER TABLE `respostas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pergunta` (`id_pergunta`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuario_nivel`
--
ALTER TABLE `usuario_nivel`
  ADD KEY `fk_id_usuario` (`id_usuario`),
  ADD KEY `fk_id_nivel` (`id_nivel`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `conteudo`
--
ALTER TABLE `conteudo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `nivel`
--
ALTER TABLE `nivel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `perguntas`
--
ALTER TABLE `perguntas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de tabela `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `respostas`
--
ALTER TABLE `respostas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `conteudo`
--
ALTER TABLE `conteudo`
  ADD CONSTRAINT `conteudo_ibfk_1` FOREIGN KEY (`id_nivel`) REFERENCES `nivel` (`id`);

--
-- Restrições para tabelas `quiz`
--
ALTER TABLE `quiz`
  ADD CONSTRAINT `fk_quiz_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Restrições para tabelas `respostas`
--
ALTER TABLE `respostas`
  ADD CONSTRAINT `fk_pergunta` FOREIGN KEY (`id_pergunta`) REFERENCES `perguntas` (`id`),
  ADD CONSTRAINT `id_pergunta` FOREIGN KEY (`id_pergunta`) REFERENCES `perguntas` (`id`);

--
-- Restrições para tabelas `usuario_nivel`
--
ALTER TABLE `usuario_nivel`
  ADD CONSTRAINT `fk_id_nivel` FOREIGN KEY (`id_nivel`) REFERENCES `nivel` (`id`),
  ADD CONSTRAINT `fk_id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
