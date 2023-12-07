-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 07, 2023 at 01:30 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistema_recaudos`
--

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE `clientes` (
  `Cedula` varchar(15) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Apellidos` varchar(45) NOT NULL,
  `Direccion` varchar(40) NOT NULL,
  `Ciudad` varchar(20) NOT NULL,
  `Telefono` varchar(15) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `Contacto` varchar(30) NOT NULL,
  `TelefonoC` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`Cedula`, `Nombre`, `Apellidos`, `Direccion`, `Ciudad`, `Telefono`, `Email`, `Contacto`, `TelefonoC`) VALUES
('10000', 'Camilo', 'Beltran', 'Santa isabel', 'Dosquebradas', '3435666', 'g44y45u5u@gmail.com', '000000', '0000'),
('1045678', 'Susana', 'Villada', 'CDITI', 'Dosquebradas', '3023455', 'ny@gmail.com', '000000', '0000'),
('1059695065', 'Yesid', 'Molina Becerra ', 'Vereda comuneros', 'Dosquebradas', '3006843053', 'nyamoli213@gmail.com', '000000', '1233445'),
('1089379134', 'Laura Ximena ', 'Ortiz', 'Maraya', 'Pereira', '0000', 'laura@gmail.com', '00000', '0000'),
('12313', 'Mouse Game', 'Ortiz', 'qdwww', 'Dosquebradas', '3006843053', 'ymolina560@misena.edu.co', '000000', '0000');

-- --------------------------------------------------------

--
-- Table structure for table `pagos`
--

CREATE TABLE `pagos` (
  `Num_Pago` varchar(10) NOT NULL,
  `Fecha_Pago` date NOT NULL,
  `Valor_Pago` decimal(10,0) NOT NULL,
  `Nfactura_Vta` varchar(10) NOT NULL,
  `Cedula_Cli` varchar(15) NOT NULL,
  `Fecha_Prox_Pago` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pagos`
--

INSERT INTO `pagos` (`Num_Pago`, `Fecha_Pago`, `Valor_Pago`, `Nfactura_Vta`, `Cedula_Cli`, `Fecha_Prox_Pago`) VALUES
('1', '2023-11-30', 20000, '1', '1059695065', '2023-12-09'),
('12', '2023-12-06', 10, '2', '1059695065', '2023-12-28'),
('2', '2023-11-30', 30, '10', '1089379134', '2023-12-07'),
('3', '2023-11-30', 40000, '10', '1089379134', '2023-12-08'),
('5', '2023-11-30', 30, '10', '1089379134', '2023-12-08'),
('6', '2023-11-30', 45000, '12', '12313', '2023-12-09'),
('7', '2023-11-30', 50, '123', '1059695065', '2023-12-09'),
('8', '2023-11-30', 45000, '8', '1059695065', '2023-12-08');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `Codigo_Usu` varchar(5) NOT NULL,
  `Nombre_Usu` varchar(30) NOT NULL,
  `Nivel_Usu` varchar(1) NOT NULL,
  `Clave_Usu` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vendedores`
--

CREATE TABLE `vendedores` (
  `Cedula_Vend` varchar(15) NOT NULL,
  `Nombre_Vend` varchar(30) NOT NULL,
  `Telef_Vend` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ventas`
--

CREATE TABLE `ventas` (
  `Nfactura_Vta` varchar(10) NOT NULL,
  `Fecha_Vta` date NOT NULL,
  `Valor_Vta` decimal(10,0) NOT NULL,
  `Detalle_Vta` varchar(40) NOT NULL,
  `Cedula_Cli` varchar(15) NOT NULL,
  `Cedula_Vend` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ventas`
--

INSERT INTO `ventas` (`Nfactura_Vta`, `Fecha_Vta`, `Valor_Vta`, `Detalle_Vta`, `Cedula_Cli`, `Cedula_Vend`) VALUES
('1', '2023-11-29', 12, 'Venta de computadores', '1059695065', NULL),
('10', '2023-11-30', 40000, 'Venta de articulos', '1089379134', NULL),
('12', '2023-11-30', 50000, 'Se le vendió 2 kilos de carne de cerdo', '12313', NULL),
('123', '2023-01-01', 100, 'Venta de prueba', '1059695065', NULL),
('2', '2023-11-29', 12, 'cargadores', '1059695065', NULL),
('4', '2023-11-28', 112, 'balones', '12313', NULL),
('5', '2023-11-29', 12133, 'cargadores nuevos', '1059695065', NULL),
('6', '2023-11-29', 12345, 'cargadores nuevos', '1059695065', NULL),
('7', '2023-11-29', 12345, 'cargadores nuevos y viejos', '1059695065', NULL),
('8', '2023-11-30', 50000, 'Balones', '1059695065', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`Cedula`);

--
-- Indexes for table `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`Num_Pago`),
  ADD KEY `Cedula_Cli` (`Cedula_Cli`),
  ADD KEY `fk_pagos_ventas` (`Nfactura_Vta`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Codigo_Usu`);

--
-- Indexes for table `vendedores`
--
ALTER TABLE `vendedores`
  ADD PRIMARY KEY (`Cedula_Vend`);

--
-- Indexes for table `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`Nfactura_Vta`),
  ADD KEY `Cedula_Cli` (`Cedula_Cli`),
  ADD KEY `Cedula_Vend` (`Cedula_Vend`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `fk_pagos_ventas` FOREIGN KEY (`Nfactura_Vta`) REFERENCES `ventas` (`Nfactura_Vta`),
  ADD CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`Cedula_Cli`) REFERENCES `clientes` (`Cedula`);

--
-- Constraints for table `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`Cedula_Cli`) REFERENCES `clientes` (`Cedula`),
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`Cedula_Vend`) REFERENCES `vendedores` (`Cedula_Vend`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
