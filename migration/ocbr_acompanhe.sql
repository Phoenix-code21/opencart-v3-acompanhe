-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 14-Mar-2022 às 12:38
-- Versão do servidor: 5.7.32-35-log
-- PHP Version: 5.6.40-0+deb8u12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `constantine`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `ocbr_acompanhe`
--

CREATE TABLE `ocbr_acompanhe` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(500) NOT NULL,
  `text` text NOT NULL,
  `url` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `ordem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `ocbr_acompanhe`
--

INSERT INTO `ocbr_acompanhe` (`id`, `title`, `subtitle`, `text`, `url`, `image`, `lang_id`, `ordem`) VALUES
(6, 'Materia 1 ', 'Adornos na pré história', '&lt;p&gt;Assim como toda hist&amp;oacute;ria que &amp;eacute; contada, &amp;eacute; dif&amp;iacute;cil achar um ponto de partida e origem das joias. Sabe-se que o homem pr&amp;eacute; hist&amp;oacute;rico j&amp;aacute; se adornava com prop&amp;oacute;sito de se proteger. A partir disso &amp;eacute; dif&amp;iacute;cil mapear sem uma&amp;nbsp;&lt;strong&gt;perspectiva hegem&amp;ocirc;nica&lt;/strong&gt;&amp;nbsp;os lugares onde as joias estiveram presentes.&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;Eacute; not&amp;aacute;vel que civiliza&amp;ccedil;&amp;otilde;es ind&amp;iacute;genas e tribos africanas j&amp;aacute; d&amp;atilde;o import&amp;acirc;ncia aos adornos corporais a milhares de anos. Antes mesmo de essas pe&amp;ccedil;as ganharem a conota&amp;ccedil;&amp;atilde;o de joias. Mas a partir de um momento onde a valoriza&amp;ccedil;&amp;atilde;o do ouro se intensifica, as joias ganham um outro sentido e passam a ser conhecidas por representarem&amp;nbsp;&lt;strong&gt;riquezas e status social&lt;/strong&gt;.&lt;/p&gt;\r\n\r\n&lt;p&gt;https://www.waufen.com.br/blog/historia-das-joias/&lt;/p&gt;\r\n', 'o-homem-e-o-uso-de-adornos-', 'image/acompanhe/080adb6e9e7d4f113ca9937ea42fff17.jpg', 2, 2),
(7, 'O uso de acessórios', 'Adornos corporais', '&lt;p&gt;Antes de contar a hist&amp;oacute;ria das joias, &amp;eacute; bom ressaltar que esses acess&amp;oacute;rios est&amp;atilde;o presentes na vida dos humanos desde os tempos mais remotos. Para produzir manualmente os&amp;nbsp;&lt;a href=&quot;https://www.waufen.com.br/&quot;&gt;acess&amp;oacute;rios&lt;/a&gt;, os humanos usavam recursos que eles dispunham no momento como pedras, madeira, p&amp;eacute;rolas, conchas, dentes de animais. A partir disso, adornos corporais eram feitos com diferentes prop&amp;oacute;sitos.&lt;/p&gt;\r\n\r\n&lt;p&gt;Ent&amp;atilde;o, as pe&amp;ccedil;as eram usadas com esses prop&amp;oacute;sitos pr&amp;aacute;ticos desde o princ&amp;iacute;pio da exist&amp;ecirc;ncia dos homens.&amp;nbsp;Hoje em dia, embora as joias sejam usadas principalmente como um adorno est&amp;eacute;tico, ainda podemos notar que o uso de adornos &amp;eacute; uma&lt;strong&gt;&amp;nbsp;heran&amp;ccedil;a transmitida de civiliza&amp;ccedil;&amp;atilde;o &amp;agrave; civiliza&amp;ccedil;&amp;atilde;o&lt;/strong&gt;. E ainda assim, est&amp;aacute; presente em diversas culturas, por isso demonstra que o desejo pelos adornos &amp;eacute; uma caracter&amp;iacute;stica humana.&lt;/p&gt;\r\n\r\n&lt;p&gt;https://www.waufen.com.br/blog/historia-das-joias/&lt;/p&gt;\r\n', 'o-uso-de-acessorios', 'image/acompanhe/07d429f85741dc4919bd93fc0ae07865.jpg', 2, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ocbr_acompanhe`
--
ALTER TABLE `ocbr_acompanhe`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ocbr_acompanhe`
--
ALTER TABLE `ocbr_acompanhe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
