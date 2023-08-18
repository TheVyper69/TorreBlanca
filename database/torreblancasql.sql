-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-05-2021 a las 01:40:39
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `torreblanca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_archivos`
--

CREATE TABLE `t_archivos` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `tipo` varchar(255) DEFAULT NULL,
  `ruta` text DEFAULT NULL,
  `fecha_insert` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `t_archivos`
--

INSERT INTO `t_archivos` (`id`, `id_usuario`, `id_categoria`, `nombre`, `tipo`, `ruta`, `fecha_insert`) VALUES
(1, 12, 1, 'Cardex.pdf', 'pdf', '../../archivos/12/Cardex.pdf', '2021-05-19 21:15:22'),
(2, 14, 1, 'carta responsiva.pdf', 'pdf', '../../archivos/14/carta responsiva.pdf', '2021-05-19 21:48:01'),
(3, 14, 1, 'comprobante de pago.pdf', 'pdf', '../../archivos/14/comprobante de pago.pdf', '2021-05-19 21:48:30'),
(4, 14, 1, 'img20210422_17324168.jpg', 'jpg', '../../archivos/14/img20210422_17324168.jpg', '2021-05-19 21:48:30'),
(6, 14, 1, 'EQUIPO INTEGRADORA.pdf', 'pdf', '../../archivos/14/EQUIPO INTEGRADORA.pdf', '2021-05-22 15:47:12'),
(7, 14, 1, '1° investigacion.pdf', 'pdf', '../../archivos/14/1° investigacion.pdf', '2021-05-22 17:14:34'),
(9, 14, 1, 'mylivewallpapers.com-Call-of-Duty-Black-Ops-3.mp4', 'mp4', '../../archivos/14/mylivewallpapers.com-Call-of-Duty-Black-Ops-3.mp4', '2021-05-22 17:26:09'),
(10, 14, 4, 'admistracion de resultados.docx', 'docx', '../../archivos/14/admistracion de resultados.docx', '2021-05-23 15:12:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_categorias`
--

CREATE TABLE `t_categorias` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `fecha_insert` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `t_categorias`
--

INSERT INTO `t_categorias` (`id`, `id_usuario`, `nombre`, `fecha_insert`) VALUES
(1, 12, 'Mantenimiento', '2021-05-17 18:50:35'),
(4, 12, 'Contabilidad', '2021-05-18 18:53:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_user`
--

CREATE TABLE `t_user` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `t_user`
--

INSERT INTO `t_user` (`id`, `nombre`) VALUES
(1, 'administrador'),
(2, 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_usuarios`
--

CREATE TABLE `t_usuarios` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `contraseña` text DEFAULT NULL,
  `registro` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `t_usuarios`
--

INSERT INTO `t_usuarios` (`id`, `id_user`, `nombre`, `correo`, `username`, `contraseña`, `registro`) VALUES
(11, 2, 'willian jair de la cruz ruiz ', 'delacruzruiz@gmail.comc', 'wili123', 'd9a2b62426aba761739e02a66368d90f7a977a0a', '2021-05-16 15:39:17'),
(12, 1, 'allan eduardo ruiz', 'allan@gmail.com', 'allan23', '8cb2237d0679ca88db6464eac60da96345513964', '2021-05-16 17:20:07'),
(14, 1, 'Willian Jair De la cruz Ruiz ', 'delacruzruizw@gmail.com', 'wili321', 'd9a2b62426aba761739e02a66368d90f7a977a0a', '2021-05-19 21:43:58');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `t_archivos`
--
ALTER TABLE `t_archivos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `t_categorias`
--
ALTER TABLE `t_categorias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `t_usuarios`
--
ALTER TABLE `t_usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `t_archivos`
--
ALTER TABLE `t_archivos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `t_categorias`
--
ALTER TABLE `t_categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `t_usuarios`
--
ALTER TABLE `t_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `t_archivos`
--
ALTER TABLE `t_archivos`
  ADD CONSTRAINT `t_archivos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `t_categorias` (`id`),
  ADD CONSTRAINT `t_archivos_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `t_usuarios` (`id`);

--
-- Filtros para la tabla `t_categorias`
--
ALTER TABLE `t_categorias`
  ADD CONSTRAINT `t_categorias_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `t_usuarios` (`id`);

--
-- Filtros para la tabla `t_usuarios`
--
ALTER TABLE `t_usuarios`
  ADD CONSTRAINT `t_usuarios_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `t_user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
