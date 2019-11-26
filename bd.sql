-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 27-Jun-2018 às 22:33
-- Versão do servidor: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `espancaballsclub`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `contas`
--

CREATE TABLE `contas` (
  `nome` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `morada` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `contas`
--

INSERT INTO `contas` (`nome`, `password`, `email`, `morada`) VALUES
('123', '123', '123@123', 'Rua Sofia de Melo Breyner');

-- --------------------------------------------------------

--
-- Estrutura da tabela `loja`
--

CREATE TABLE `loja` (
  `ID` int(10) NOT NULL,
  `product_code` varchar(60) NOT NULL,
  `produto` varchar(20) NOT NULL,
  `preco` varchar(20) NOT NULL,
  `stock` varchar(20) NOT NULL,
  `imagem` varchar(200) DEFAULT 'img/compras/sem-imagem.jpg',
  `tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `loja`
--

INSERT INTO `loja` (`ID`, `product_code`, `produto`, `preco`, `stock`, `imagem`, `tipo`) VALUES
(1, 'WilsonUltra100l', 'Wilson Ultra 100l', '130', '100', 'img/loja/raquetes/wilson-ultra-100l.jpg', 'Raquetes'),
(2, 'WilsonFedererTour', 'Wilson Federer Tour', '200', '10', 'img/loja/raquetes/wilson-federer-tour.jpg', 'Raquetes'),
(3, 'WilsonBlade101l', 'Wilson Blade 101l', '100', '0', 'img/loja/raquetes/wilson-blade-101l.jpg', 'Raquetes'),
(5, 'ChapeuArLivre', 'Chapeu ao ar livre', '10', '100', 'img/loja/chapeus/chapeu.jpg', 'Chapeus'),
(6, 'fAdidas', 'Fita Adidas', '18.95', '46', 'img/loja/chapeus/faixa-adidas.jpg', 'Chapeus'),
(9, 'Chapeu-Lacoste', 'Bon&#233; Lacoste', '50', '3', 'img/loja/chapeus/lacoste-logo-sport-polyester-cap.jpg', 'Chapeus'),
(10, 'braceleteStarvie', 'Bracelete Starvie', '10', '15', 'img/loja/outros/star-vie-wristbands-2-pack.jpg', 'Outros'),
(11, 'luxilonadrenaline', 'Luxilon Adrenaline', '83.99', '18', 'img/loja/outros/luxilon-adrenaline-200-m.jpg', 'Outros'),
(12, 'luxilonsavage', 'Luxilon Savage', '79.99', '11', 'img/loja/outros/luxilon-savage-200-m.jpg', 'Outros'),
(13, 'fatotreinolacoste', 'Fato Treino Lacoste', '129.99', '15', 'img/loja/roupa/lacoste-tracksuit.jpg', 'Roupa'),
(14, 'asicsgel', 'Asics Gel Resolution', '299.99', '1', 'img/loja/calcado/gel-resolution-7.jpg', 'Calcado'),
(15, 'nbmc806', 'New Balance mc806', '85.99', '21', 'img/loja/calcado/new-balance-mc806.jpg', 'Calcado'),
(16, 'malawilsontourV', 'Mala Wilson Tour V', '355.99', '10', 'img/loja/malas/wilson-tour-v-backpack.jpg', 'Malas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contas`
--
ALTER TABLE `contas`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `loja`
--
ALTER TABLE `loja`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `loja`
--
ALTER TABLE `loja`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
