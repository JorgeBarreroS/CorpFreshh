-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-08-2024 a las 00:14:37
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `corpfreshh`
--
CREATE DATABASE IF NOT EXISTS `corpfreshh` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `corpfreshh`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos_ordenes`
--

DROP TABLE IF EXISTS `articulos_ordenes`;
CREATE TABLE `articulos_ordenes` (
  `id_detalle_venta` int(11) NOT NULL,
  `id_venta` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `Cantidad_Producto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELACIONES PARA LA TABLA `articulos_ordenes`:
--   `id_venta`
--       `ordenes` -> `id_venta`
--   `id_producto`
--       `producto` -> `id_producto`
--

--
-- Volcado de datos para la tabla `articulos_ordenes`
--

INSERT INTO `articulos_ordenes` (`id_detalle_venta`, `id_venta`, `id_producto`, `Cantidad_Producto`) VALUES
(1, 1, 1, 2),
(2, 1, 2, 1),
(3, 2, 3, 1),
(4, 4, 4, 3),
(5, 5, 5, 1),
(6, 6, 6, 2),
(7, 7, 7, 1),
(8, 8, 8, 1),
(9, 9, 9, 2),
(10, 10, 10, 1),
(11, 11, 11, 1),
(12, 12, 12, 1),
(13, 13, 13, 1),
(14, 14, 14, 1),
(15, 15, 15, 1),
(16, 16, 16, 1),
(17, 17, 17, 1),
(18, 18, 18, 1),
(19, 19, 19, 1),
(20, 20, 20, 1),
(21, 21, 21, 1),
(22, 22, 22, 1),
(23, 23, 23, 1),
(24, 24, 24, 1),
(25, 25, 25, 1),
(26, 26, 26, 1),
(27, 27, 27, 1),
(28, 28, 28, 1),
(29, 29, 29, 1),
(30, 30, 30, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELACIONES PARA LA TABLA `categoria`:
--

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre_categoria`) VALUES
(1, 'Ropa'),
(2, 'Calzado'),
(3, 'Conjuntos'),
(4, 'Accesorios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenes`
--

DROP TABLE IF EXISTS `ordenes`;
CREATE TABLE `ordenes` (
  `id_venta` int(11) NOT NULL,
  `fecha_venta` date DEFAULT NULL,
  `impuesto_venta` varchar(10) DEFAULT NULL,
  `total_venta` decimal(10,2) DEFAULT NULL,
  `estado_venta` varchar(50) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELACIONES PARA LA TABLA `ordenes`:
--   `id_usuario`
--       `usuario` -> `id_usuario`
--

--
-- Volcado de datos para la tabla `ordenes`
--

INSERT INTO `ordenes` (`id_venta`, `fecha_venta`, `impuesto_venta`, `total_venta`, `estado_venta`, `id_usuario`) VALUES
(1, '2023-01-01', '19%', 59500.00, 'Completado', 1),
(2, '2023-01-15', '19%', 120000.00, 'Completado', 1),
(3, '2023-03-01', '19%', 178500.00, 'Completado', 2),
(4, '2023-04-01', '19%', 142800.00, 'Completado', 2),
(5, '2023-05-01', '19%', 47600.00, 'Completado', 3),
(6, '2023-05-15', '19%', 93000.00, 'Completado', 3),
(7, '2023-07-01', '19%', 95200.00, 'Completado', 7),
(8, '2023-08-01', '19%', 71400.00, 'Completado', 8),
(9, '2023-09-01', '19%', 53550.00, 'Completado', 9),
(10, '2023-10-01', '19%', 68000.00, 'Completado', 10),
(11, '2023-10-15', '19%', 55000.00, 'Completado', 11),
(12, '2023-11-01', '19%', 77000.00, 'Completado', 12),
(13, '2023-11-15', '19%', 102000.00, 'Completado', 13),
(14, '2023-12-01', '19%', 86000.00, 'Completado', 14),
(15, '2023-12-15', '19%', 91000.00, 'Completado', 15),
(16, '2024-01-01', '19%', 83000.00, 'Completado', 16),
(17, '2024-01-15', '19%', 57000.00, 'Completado', 17),
(18, '2024-02-01', '19%', 103000.00, 'Completado', 18),
(19, '2024-02-15', '19%', 75000.00, 'Completado', 19),
(20, '2024-03-01', '19%', 92000.00, 'Completado', 20),
(21, '2024-03-15', '19%', 65000.00, 'Completado', 21),
(22, '2024-04-01', '19%', 48000.00, 'Completado', 22),
(23, '2024-04-15', '19%', 76000.00, 'Completado', 23),
(24, '2024-05-01', '19%', 55000.00, 'Completado', 24),
(25, '2024-05-15', '19%', 89000.00, 'Completado', 25),
(26, '2024-06-01', '19%', 110000.00, 'Completado', 26),
(27, '2024-06-15', '19%', 68000.00, 'Completado', 27),
(28, '2024-07-01', '19%', 73000.00, 'Completado', 28),
(29, '2024-07-15', '19%', 120000.00, 'Completado', 29),
(30, '2024-08-01', '19%', 80000.00, 'Completado', 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

DROP TABLE IF EXISTS `pedido`;
CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL,
  `id_venta` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `fecha_pedido` date DEFAULT NULL,
  `estado_pedido` varchar(50) DEFAULT NULL,
  `metodo_envio_pedido` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELACIONES PARA LA TABLA `pedido`:
--   `id_venta`
--       `ordenes` -> `id_venta`
--   `id_usuario`
--       `usuario` -> `id_usuario`
--

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id_pedido`, `id_venta`, `id_usuario`, `fecha_pedido`, `estado_pedido`, `metodo_envio_pedido`) VALUES
(1, 1, 1, '2023-01-01', 'Enviado', 'Estándar'),
(2, 2, 1, '2023-01-15', 'Enviado', 'Express'),
(3, 3, 2, '2023-03-03', 'Enviado', 'Estándar'),
(4, 4, 2, '2023-04-04', 'Enviado', 'Express'),
(5, 5, 3, '2023-05-02', 'Enviado', 'Express'),
(6, 6, 3, '2023-05-15', 'Enviado', 'Estándar'),
(7, 7, 7, '2023-07-02', 'Enviado', 'Estándar'),
(8, 8, 8, '2023-08-03', 'Enviado', 'Express'),
(9, 9, 9, '2023-09-02', 'Enviado', 'Estándar'),
(10, 10, 10, '2023-10-01', 'Enviado', 'Express'),
(11, 11, 11, '2023-10-15', 'Enviado', 'Estándar'),
(12, 12, 12, '2023-11-01', 'Enviado', 'Express'),
(13, 13, 13, '2023-11-15', 'Enviado', 'Estándar'),
(14, 14, 14, '2023-12-01', 'Enviado', 'Express'),
(15, 15, 15, '2023-12-15', 'Enviado', 'Estándar'),
(16, 16, 16, '2024-01-01', 'Enviado', 'Express'),
(17, 17, 17, '2024-01-15', 'Enviado', 'Estándar'),
(18, 18, 18, '2024-02-01', 'Enviado', 'Express'),
(19, 19, 19, '2024-02-15', 'Enviado', 'Estándar'),
(20, 20, 20, '2024-03-01', 'Enviado', 'Express'),
(21, 21, 21, '2024-03-15', 'Enviado', 'Estándar'),
(22, 22, 22, '2024-04-01', 'Enviado', 'Express'),
(23, 23, 23, '2024-04-15', 'Enviado', 'Estándar'),
(24, 24, 24, '2024-05-01', 'Enviado', 'Express'),
(25, 25, 25, '2024-05-15', 'Enviado', 'Estándar'),
(26, 26, 26, '2024-06-01', 'Enviado', 'Express'),
(27, 27, 27, '2024-06-15', 'Enviado', 'Estándar'),
(28, 28, 28, '2024-07-01', 'Enviado', 'Express'),
(29, 29, 29, '2024-07-15', 'Enviado', 'Estándar'),
(30, 30, 30, '2024-08-01', 'Enviado', 'Express');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

DROP TABLE IF EXISTS `producto`;
CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `nombre_producto` varchar(255) DEFAULT NULL,
  `descripcion_producto` text DEFAULT NULL,
  `color_producto` varchar(50) DEFAULT NULL,
  `precio_producto` decimal(10,2) DEFAULT NULL,
  `imagen_producto` varchar(255) DEFAULT NULL,
  `nombre_marca` varchar(100) DEFAULT NULL,
  `talla` varchar(10) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELACIONES PARA LA TABLA `producto`:
--   `id_categoria`
--       `categoria` -> `id_categoria`
--

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre_producto`, `descripcion_producto`, `color_producto`, `precio_producto`, `imagen_producto`, `nombre_marca`, `talla`, `id_categoria`) VALUES
(1, 'Camiseta', 'Algodón', 'Rojo', 50000.00, 'img1.jpg', 'Nike', 'M', 1),
(2, 'Zapatos', 'Cuero', 'Negro', 150000.00, 'img2.jpg', 'Adidas', '42', 2),
(3, 'Conjunto', 'Poliéster', 'Azul', 120000.00, 'img3.jpg', 'Puma', 'L', 3),
(4, 'Camisa', 'Algodón', 'Blanco', 40000.00, 'img4.jpg', 'Reebok', 'S', 1),
(5, 'Pantalones', 'Mezclilla', 'Azul', 80000.00, 'img5.jpg', 'Levi\'s', '32', 1),
(6, 'Zapatillas', 'Tela', 'Verde', 60000.00, 'img6.jpg', 'Converse', '40', 2),
(7, 'Falda', 'Seda', 'Negro', 45000.00, 'img7.jpg', 'Zara', 'M', 1),
(8, 'Abrigo', 'Lana', 'Gris', 200000.00, 'img8.jpg', 'H&M', 'XL', 1),
(9, 'Botines', 'Cuero', 'Marrón', 130000.00, 'img9.jpg', 'Timberland', '41', 2),
(10, 'Vestido', 'Algodón', 'Rojo', 70000.00, 'img10.jpg', 'Forever 21', 'M', 1),
(11, 'Sombrero', 'Paja', 'Beige', 25000.00, 'img11.jpg', 'Gap', 'Único', 4),
(12, 'Bufanda', 'Acrílico', 'Rojo', 15000.00, 'img12.jpg', 'H&M', 'Único', 4),
(13, 'Guantes', 'Lana', 'Negro', 20000.00, 'img13.jpg', 'Uniqlo', 'M', 4),
(14, 'Cinturón', 'Cuero', 'Marrón', 30000.00, 'img14.jpg', 'Levi\'s', 'L', 4),
(15, 'Guantes', 'Lana', 'Negro', 20000.00, 'img13.jpg', 'Uniqlo', 'M', 4),
(16, 'Cinturón', 'Cuero', 'Marrón', 30000.00, 'img14.jpg', 'Levi\'s', 'L', 4),
(17, 'Pantalones Cortos', 'Lino', 'Beige', 40000.00, 'img17.jpg', 'Hollister', 'M', 1),
(18, 'Chaqueta', 'Cuero', 'Negro', 150000.00, 'img18.jpg', 'Diesel', 'L', 1),
(19, 'Blusa', 'Seda', 'Azul', 60000.00, 'img19.jpg', 'Zara', 'S', 1),
(20, 'Chaqueta de Jeans', 'Denim', 'Azul', 120000.00, 'img20.jpg', 'Levi\'s', 'M', 1),
(21, 'Sandalias', 'Cuero', 'Café', 70000.00, 'img21.jpg', 'Mango', '38', 2),
(22, 'Botines de Tacón', 'Cuero', 'Negro', 95000.00, 'img22.jpg', 'Bershka', '39', 2),
(23, 'Mono', 'Poliéster', 'Negro', 110000.00, 'img23.jpg', 'H&M', 'L', 3),
(24, 'Chaqueta de Invierno', 'Pana', 'Verde', 180000.00, 'img24.jpg', 'Columbia', 'XL', 1),
(25, 'Camisa de Manga Larga', 'Algodón', 'Azul', 45000.00, 'img25.jpg', 'Tommy Hilfiger', 'M', 1),
(26, 'Shorts', 'Algodón', 'Rojo', 30000.00, 'img26.jpg', 'American Eagle', 'S', 1),
(27, 'Pantalones de Yoga', 'Spandex', 'Gris', 50000.00, 'img27.jpg', 'Nike', 'M', 1),
(28, 'Abrigo de Lana', 'Lana', 'Negro', 220000.00, 'img28.jpg', 'Burberry', 'L', 1),
(29, 'Pantalones de Cuero', 'Cuero', 'Negro', 140000.00, 'img29.jpg', 'Zara', 'M', 1),
(30, 'Chaqueta de Cuero', 'Cuero', 'Marrón', 160000.00, 'img30.jpg', 'Guess', 'M', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

DROP TABLE IF EXISTS `rol`;
CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELACIONES PARA LA TABLA `rol`:
--

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `nombre_rol`) VALUES
(1, 'Administrador'),
(2, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(100) DEFAULT NULL,
  `apellido_usuario` varchar(100) DEFAULT NULL,
  `telefono_usuario` varchar(15) DEFAULT NULL,
  `correo_usuario` varchar(100) DEFAULT NULL,
  `direccion1_usuario` varchar(255) DEFAULT NULL,
  `direccion2_usuario` varchar(255) DEFAULT NULL,
  `ciudad_usuario` varchar(100) DEFAULT NULL,
  `pais_usuario` varchar(100) DEFAULT NULL,
  `id_rol` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELACIONES PARA LA TABLA `usuario`:
--   `id_rol`
--       `rol` -> `id_rol`
--

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `apellido_usuario`, `telefono_usuario`, `correo_usuario`, `direccion1_usuario`, `direccion2_usuario`, `ciudad_usuario`, `pais_usuario`, `id_rol`) VALUES
(1, 'Juan', 'Pérez', '123456789', 'juan@example.com', 'Calle 123', 'Apto 4A', 'Bogotá', 'Colombia', 1),
(2, 'María', 'Sánchez', '234567890', 'maria@example.com', 'Avenida 456', 'Casa 2', 'Medellín', 'Colombia', 2),
(3, 'Carlos', 'Gómez', '564738291', 'carlos@example.com', 'Carrera 789', 'Piso 3', 'Cali', 'Colombia', 2),
(4, 'Laura', 'Martínez', '102938475', 'laura@example.com', 'Calle 789', 'Apartamento 5', 'Cartagena', 'Colombia', 2),
(5, 'Ana', 'Rodríguez', '293847561', 'ana@example.com', 'Avenida 101', 'Local 2', 'Barranquilla', 'Colombia', 2),
(6, 'Pedro', 'Jiménez', '847562930', 'pedro@example.com', 'Calle 202', 'Apto 8B', 'Pereira', 'Colombia', 2),
(7, 'Carolina', 'Gutiérrez', '473829105', 'carolina@example.com', 'Calle 567', 'Casa 3', 'Cúcuta', 'Colombia', 2),
(8, 'Andrés', 'Díaz', '918273645', 'andres@example.com', 'Carrera 345', 'Apartamento 7', 'Manizales', 'Colombia', 2),
(9, 'Claudia', 'Herrera', '827364910', 'claudia@example.com', 'Avenida 678', 'Oficina 4', 'Pereira', 'Colombia', 2),
(10, 'Sofía', 'Paredes', '564738920', 'sofia@example.com', 'Calle 303', 'Casa 6', 'Bogotá', 'Colombia', 2),
(11, 'David', 'Lozano', '738291046', 'david@example.com', 'Avenida 909', 'Piso 5', 'Medellín', 'Colombia', 2),
(12, 'Lucía', 'Hernández', '849302170', 'lucia@example.com', 'Carrera 404', 'Oficina 3', 'Cali', 'Colombia', 2),
(13, 'Felipe', 'Vargas', '938470562', 'felipe@example.com', 'Calle 212', 'Local 4', 'Barranquilla', 'Colombia', 2),
(14, 'Natalia', 'Suárez', '473820647', 'natalia@example.com', 'Calle 788', 'Apartamento 8', 'Cartagena', 'Colombia', 2),
(15, 'Ricardo', 'Mendoza', '982374560', 'ricardo@example.com', 'Avenida 565', 'Casa 7', 'Pereira', 'Colombia', 2),
(16, 'Beatriz', 'Morales', '483920175', 'beatriz@example.com', 'Carrera 303', 'Local 1', 'Manizales', 'Colombia', 2),
(17, 'Luis', 'Castro', '293847650', 'luis@example.com', 'Calle 123', 'Casa 5', 'Cúcuta', 'Colombia', 2),
(18, 'Sara', 'Torres', '564738291', 'sara@example.com', 'Avenida 300', 'Piso 6', 'Bogotá', 'Colombia', 2),
(19, 'Antonio', 'García', '948273650', 'antonio@example.com', 'Calle 456', 'Apto 7', 'Medellín', 'Colombia', 2),
(20, 'Paola', 'Reyes', '192837465', 'paola@example.com', 'Carrera 123', 'Local 8', 'Cali', 'Colombia', 2),
(21, 'Jorge', 'Salazar', '564738293', 'jorge@example.com', 'Avenida 789', 'Casa 4', 'Barranquilla', 'Colombia', 2),
(22, 'Elena', 'Díaz', '837465920', 'elena@example.com', 'Calle 112', 'Apartamento 6', 'Cartagena', 'Colombia', 2),
(23, 'Oscar', 'Ramos', '284736591', 'oscar@example.com', 'Calle 900', 'Oficina 2', 'Pereira', 'Colombia', 2),
(24, 'Isabel', 'Soto', '384920174', 'isabel@example.com', 'Avenida 555', 'Piso 8', 'Manizales', 'Colombia', 2),
(25, 'Julián', 'Montoya', '738291024', 'julian@example.com', 'Carrera 777', 'Casa 3', 'Cúcuta', 'Colombia', 2),
(26, 'Valeria', 'García', '847562394', 'valeria@example.com', 'Calle 303', 'Local 5', 'Bogotá', 'Colombia', 2),
(27, 'Gabriel', 'Arias', '293847561', 'gabriel@example.com', 'Avenida 212', 'Casa 8', 'Medellín', 'Colombia', 2),
(28, 'Verónica', 'Cárdenas', '847562930', 'veronica@example.com', 'Calle 101', 'Apartamento 9', 'Cali', 'Colombia', 2),
(29, 'Martín', 'Ocampo', '564738291', 'martin@example.com', 'Avenida 787', 'Piso 4', 'Barranquilla', 'Colombia', 2),
(30, 'Camila', 'Cardenas', '738291056', 'camila@example.com', 'Calle 909', 'Casa 2', 'Cartagena', 'Colombia', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos_ordenes`
--
ALTER TABLE `articulos_ordenes`
  ADD PRIMARY KEY (`id_detalle_venta`),
  ADD KEY `id_venta` (`id_venta`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `ordenes`
--
ALTER TABLE `ordenes`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `id_venta` (`id_venta`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_rol` (`id_rol`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulos_ordenes`
--
ALTER TABLE `articulos_ordenes`
  ADD CONSTRAINT `articulos_ordenes_ibfk_1` FOREIGN KEY (`id_venta`) REFERENCES `ordenes` (`id_venta`),
  ADD CONSTRAINT `articulos_ordenes_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`);

--
-- Filtros para la tabla `ordenes`
--
ALTER TABLE `ordenes`
  ADD CONSTRAINT `ordenes_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`id_venta`) REFERENCES `ordenes` (`id_venta`),
  ADD CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
