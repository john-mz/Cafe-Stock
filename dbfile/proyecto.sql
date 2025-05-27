-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2025 at 06:42 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyecto`
--

-- --------------------------------------------------------

--
-- Table structure for table `caja`
--

CREATE TABLE `caja` (
  `id_caja` int(11) NOT NULL,
  `dinero_ing` varchar(150) NOT NULL,
  `dinero_ret` varchar(150) NOT NULL,
  `fo_pedidos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `descripcion` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre`, `descripcion`) VALUES
(1, 'reposteria', 'es el arte culinario el cual se dedica a la preparacion de postres, dulces y pasteles'),
(2, 'cafe', 'variedades de cafe, como espresso, americano, cappuccino, latte, macchiato, entre otros'),
(3, 'desayunos', 'opciones de desayuno como huevos revueltos, tortillas, yogurt, avena y tostadas'),
(6, 'almuerzos', 'bandeja paisa, arroz paisa, frijolada, etc');

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `cedula` varchar(15) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `apellido` varchar(150) NOT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp(),
  `celular` varchar(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `inactivar` varchar(2) NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `cedula`, `nombre`, `apellido`, `fecha`, `celular`, `email`, `inactivar`) VALUES
(1, '1088827353', 'Juan José', 'Ospina Orozco', '2024-04-22', '3138324262', 'juan.ospinao@uam.edu.co', 'NO'),
(2, '1234567890', 'Camilo', 'Agudelo Jaramillo', '2024-04-22', '0987654321', 'camilo.agudeloj@uam.edu.co', 'SI'),
(3, '6789054321', 'John Stiven', 'Muñoz Sabogal', '2024-04-22', '6785493021', 'john.munoz@uam.edu.co', 'NO'),
(10, '8912734127631', 'Juan', 'Orozco', '2024-05-24', '1231312312', 'ospinaorozcojuan@gmail.com', 'NO');

-- --------------------------------------------------------

--
-- Table structure for table `marca`
--

CREATE TABLE `marca` (
  `id_marca` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `marca`
--

INSERT INTO `marca` (`id_marca`, `nombre`) VALUES
(1, 'sello rojo'),
(2, 'juan valdez'),
(3, 'cafe quindio');

-- --------------------------------------------------------

--
-- Table structure for table `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedidos` int(11) NOT NULL,
  `total` varchar(50) NOT NULL,
  `subtotal` varchar(50) NOT NULL,
  `iva` varchar(10) NOT NULL,
  `mesero` varchar(150) NOT NULL,
  `producto` varchar(250) NOT NULL,
  `inactivar` varchar(2) NOT NULL DEFAULT 'NO',
  `fo_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `precio` double NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `fo_categoria` int(11) NOT NULL,
  `fo_marca` int(11) NOT NULL,
  `ingredientes` text DEFAULT NULL,
  `envase` varchar(50) DEFAULT NULL,
  `tipo_cafe` varchar(50) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `tipo_producto` varchar(59) DEFAULT NULL,
  `codigo_barra` varchar(20) DEFAULT NULL,
  `fecha_vencimiento` date DEFAULT NULL,
  `lote` varchar(20) DEFAULT NULL,
  `tipo_consumible` varchar(50) DEFAULT NULL,
  `cant` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre`, `precio`, `codigo`, `fo_categoria`, `fo_marca`, `ingredientes`, `envase`, `tipo_cafe`, `cantidad`, `tipo_producto`, `codigo_barra`, `fecha_vencimiento`, `lote`, `tipo_consumible`, `cant`) VALUES
(14, 'Café Americano', 4000, 'CF001', 2, 1, 'Agua, Café molido', 'Vaso desechable', 'Americano', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'Capuccino', 6000, 'CF002', 2, 2, 'Leche, café espresso, canela', 'Taza de cerámica', 'Capuccino', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'Latte', 6500, 'CF003', 2, 3, 'Leche, café espresso', 'Vaso térmico', 'Latte', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'Brownie', 3500, 'CN001', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Postre', 50),
(18, 'Galleta Avena', 2000, 'CN002', 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Postre', 100),
(21, 'Galleta chocolate', 2000, '3423', 1, 2, NULL, NULL, NULL, 40, NULL, NULL, NULL, NULL, 'Snack', NULL),
(22, 'Cafe Tostado en grano', 30000, '33241232', 2, 3, NULL, NULL, NULL, 20, 'grano', '3214232134', '2025-07-18', 'A34', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reporte_de_venta`
--

CREATE TABLE `reporte_de_venta` (
  `id_reporteventa` int(11) NOT NULL,
  `fecha_inicial` date NOT NULL,
  `fecha_final` date NOT NULL,
  `fo_pedidos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `caja`
--
ALTER TABLE `caja`
  ADD PRIMARY KEY (`id_caja`),
  ADD KEY `fo_pedidos` (`fo_pedidos`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indexes for table `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indexes for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedidos`),
  ADD KEY `fo_cliente` (`fo_cliente`);

--
-- Indexes for table `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `fo_categoria` (`fo_categoria`),
  ADD KEY `fo_marca` (`fo_marca`);

--
-- Indexes for table `reporte_de_venta`
--
ALTER TABLE `reporte_de_venta`
  ADD PRIMARY KEY (`id_reporteventa`),
  ADD KEY `fo_pedidos` (`fo_pedidos`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `caja`
--
ALTER TABLE `caja`
  MODIFY `id_caja` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `marca`
--
ALTER TABLE `marca`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedidos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `reporte_de_venta`
--
ALTER TABLE `reporte_de_venta`
  MODIFY `id_reporteventa` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `caja`
--
ALTER TABLE `caja`
  ADD CONSTRAINT `caja_ibfk_1` FOREIGN KEY (`fo_pedidos`) REFERENCES `pedidos` (`id_pedidos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`fo_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`fo_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`fo_marca`) REFERENCES `marca` (`id_marca`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `reporte_de_venta`
--
ALTER TABLE `reporte_de_venta`
  ADD CONSTRAINT `reporte_de_venta_ibfk_1` FOREIGN KEY (`fo_pedidos`) REFERENCES `pedidos` (`id_pedidos`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
