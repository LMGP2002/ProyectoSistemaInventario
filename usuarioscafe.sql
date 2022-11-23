-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2022 at 06:14 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `usuarioscafe`
--

-- --------------------------------------------------------

--
-- Table structure for table `permiso`
--

CREATE TABLE `permiso` (
  `id` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `seccion` varchar(15) NOT NULL,
  `registrar` varchar(15) NOT NULL DEFAULT 'true',
  `interactuar` varchar(15) DEFAULT NULL,
  `visibilidad` varchar(15) DEFAULT 'true'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permiso`
--

INSERT INTO `permiso` (`id`, `id_rol`, `seccion`, `registrar`, `interactuar`, `visibilidad`) VALUES
(1, 1, 'Elemento', 'true', 'true', 'true'),
(2, 1, 'Ciudad', 'true', 'true', 'true'),
(3, 1, 'Entrada', 'true', 'false', 'true'),
(4, 1, 'Salida', 'true', 'true', 'true'),
(6, 2, 'Elemento', 'true', 'true', 'false'),
(7, 2, 'Ciudad', 'true', 'true', 'false'),
(8, 2, 'Entrada', 'true', 'true', 'false'),
(9, 2, 'Salida', 'true', 'true', 'false'),
(10, 1, 'Proveedor', 'true', 'false', 'true'),
(11, 2, 'Proveedor', 'true', 'true', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `rol`
--

CREATE TABLE `rol` (
  `id` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rol`
--

INSERT INTO `rol` (`id`, `nom`) VALUES
(1, 'Administrador'),
(2, 'Cajero'),
(3, 'Gerente');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nom_usuario` varchar(20) NOT NULL,
  `contrasena` varchar(32) DEFAULT NULL,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nom_usuario`, `contrasena`, `id_rol`) VALUES
(1, 'JairoP', '21232f297a57a5a743894a0e4a801fc3', 3),
(5, 'miguel', '29bfe372865737fe2bfcfd3618b1da7d', 1),
(6, 'luis', '502ff82f7f1f8218dd41201fe4353687', 2),
(13, 'laura', '680e89809965ec41e64dc7e447f175ab', 2),
(14, 'admin', '21232f297a57a5a743894a0e4a801fc3', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_roll` (`id_rol`);

--
-- Indexes for table `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `nom_usuario` (`nom_usuario`),
  ADD KEY `fk_id_rol` (`id_rol`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `permiso`
--
ALTER TABLE `permiso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `rol`
--
ALTER TABLE `rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `permiso`
--
ALTER TABLE `permiso`
  ADD CONSTRAINT `fk_id_roll` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id`);

--
-- Constraints for table `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_id_rol` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
