-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-06-2025 a las 03:24:51
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `taberna_del_gnomo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cart_item`
--

CREATE TABLE `cart_item` (
  `cart_item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cart_item`
--

INSERT INTO `cart_item` (`cart_item_id`, `user_id`, `product_id`, `quantity`) VALUES
(5, 6, 3, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Manuales'),
(2, 'Dados'),
(4, 'Tableros'),
(5, 'Pantallas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contact`
--

INSERT INTO `contact` (`contact_id`, `name`, `mail`, `subject`, `message`, `created_at`, `deleted_at`) VALUES
(1, 'Martin Lopez', 'lopez23@gmail.com', 'Consulta de los Dados', 'Buenas queria preguntar cuantas unidades trae el set de dados metalicos', '2025-06-14 13:11:18', NULL),
(2, '                           ', 'tobiasorban@gmail.com', '              ', '                  ', '2025-06-18 19:30:04', '2025-06-19 00:22:57'),
(3, '                           ', 'tobiasorban00@gmail.com', '              ', '                  ', '2025-06-18 19:31:05', '2025-06-19 00:00:33'),
(4, 'tobias orban', 'tobiasorban00@gmail.com', 'reembolso', 'Me llego dañado el producto que compre', '2025-06-18 20:52:59', '2025-06-19 00:00:37'),
(5, 'tobias orban', 'tobiasorban00@gmail.com', 'reembolso', 'Me llego dañado el producto que compre', '2025-06-18 20:59:39', '2025-06-19 00:00:22'),
(6, 'tobias orban', 'tobiasorban00@gmail.com', 'reembolso', 'Me llego dañado el producto que compre', '2025-06-18 21:00:25', '2025-06-19 00:01:57'),
(7, 'tobias orban', 'tobiasorban00@gmail.com', 'reembolso', 'Me llego dañado el producto que compre', '2025-06-18 21:01:46', NULL),
(8, '   ', 'juan@gmail.com', ' ', 'Me llego dañado el producto que compre', '2025-06-18 21:03:42', '2025-06-19 00:07:41'),
(9, '   ', 'juan@gmail.com', ' ', 'Me llego dañado el producto que compre', '2025-06-18 21:07:10', '2025-06-19 00:07:43'),
(10, '   ', 'juan@gmail.com', ' ', 'Me llego dañado el producto que compre', '2025-06-18 21:07:24', '2025-06-19 00:22:55'),
(11, 'Juan    lopez', 'juan@gmail.com', 'nose', 'pedi pedi', '2025-06-18 21:10:41', NULL),
(12, 'jau          ffffffff', 'ffffff@gmail.com', '         ffffffff', '       fffff', '2025-06-18 21:12:23', NULL),
(13, 'ed pesuti', 'juanchooo@gmail.com', 'ssssssss', 'ssssssss', '2025-06-18 21:20:46', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inquiry`
--

CREATE TABLE `inquiry` (
  `inquiry_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inquiry`
--

INSERT INTO `inquiry` (`inquiry_id`, `user_id`, `subject`, `message`, `created_at`, `deleted_at`) VALUES
(1, 7, 'Reembolso', 'Mi sobrinito compro sin autorizacion con mi tarjeta de credito y quiero un reembolso', '2025-06-14 13:10:12', NULL),
(2, 7, '       ', '        ', '2025-06-18 21:13:43', '2025-06-19 00:23:01'),
(3, 7, 'Producto Malardo', '         pesuti', '2025-06-18 21:15:34', NULL),
(4, 7, 'Reembolso', ' no me gusto el producto\r\n', '2025-06-18 21:20:20', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total` float NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `user_id`, `total`, `created_at`) VALUES
(1, 1, 9500, '2025-05-28 12:31:38'),
(2, 1, 5100, '2025-05-22 00:00:00'),
(3, 1, 4200, '2025-05-27 00:00:00'),
(4, 1, 5000, '2025-05-25 00:00:00'),
(5, 2, 3100, '2025-05-26 00:00:00'),
(6, 2, 4500, '2025-05-24 00:00:00'),
(7, 3, 3900, '2025-05-27 00:00:00'),
(8, 3, 6200, '2025-05-26 00:00:00'),
(9, 3, 7100, '2025-05-28 00:00:00'),
(10, 2, 4300, '2025-05-23 00:00:00'),
(201, 1, 6500, '2025-06-01 00:00:00'),
(202, 3, 12000, '2025-06-02 00:00:00'),
(203, 3, 5000, '2025-06-03 00:00:00'),
(204, 1, 7500, '2025-06-04 00:00:00'),
(205, 2, 6000, '2025-06-05 00:00:00'),
(206, 7, 18600, '2025-06-16 12:49:12'),
(207, 7, 1000, '2025-06-16 12:51:28'),
(208, 7, 4300, '2025-06-16 13:06:00'),
(209, 7, 23000, '2025-06-16 21:57:55'),
(210, 7, 15300, '2025-06-16 22:15:55'),
(211, 7, 16800, '2025-06-17 12:57:41'),
(212, 7, 23950, '2025-06-17 13:05:56'),
(213, 7, 15300, '2025-06-17 11:22:41'),
(214, 7, 8150, '2025-06-18 18:04:40'),
(215, 8, 25750, '2025-06-18 18:56:20'),
(216, 7, 8150, '2025-06-18 19:41:20'),
(217, 8, 26080, '2025-06-18 21:25:02'),
(228, 8, 20580, '2025-06-18 22:06:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invoice_item`
--

CREATE TABLE `invoice_item` (
  `invoice_item_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price_at_purchase` float NOT NULL,
  `discount` int(11) NOT NULL,
  `subtotal` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `invoice_item`
--

INSERT INTO `invoice_item` (`invoice_item_id`, `invoice_id`, `product_id`, `quantity`, `price_at_purchase`, `discount`, `subtotal`) VALUES
(1, 1, 2, 1, 6500, 0, 6500),
(2, 1, 3, 1, 3000, 0, 3000),
(35, 3, 2, 1, 4200, 0, 4200),
(36, 4, 3, 2, 2500, 0, 5000),
(37, 5, 3, 1, 3100, 0, 3100),
(38, 6, 2, 1, 4500, 0, 4500),
(39, 7, 3, 1, 3900, 0, 3900),
(40, 8, 2, 1, 6200, 0, 6200),
(41, 9, 2, 1, 6500, 0, 6500),
(42, 9, 3, 1, 600, 0, 600),
(43, 9, 3, 2, 0, 0, 0),
(44, 10, 2, 1, 0, 0, 0),
(47, 201, 2, 1, 6500, 0, 0),
(48, 202, 3, 2, 6000, 0, 0),
(49, 203, 4, 1, 5000, 0, 0),
(50, 204, 5, 1, 7500, 0, 0),
(51, 205, 3, 2, 3000, 0, 0),
(52, 206, 2, 2, 6500, 0, 0),
(53, 206, 3, 1, 3000, 0, 0),
(54, 208, 3, 1, 3000, 0, 0),
(55, 209, 4, 4, 5000, 0, 0),
(56, 210, 2, 2, 6500, 0, 0),
(57, 211, 2, 2, 6500, 0, 0),
(58, 212, 2, 3, 6500, 0, 0),
(59, 213, 2, 2, 6500, 0, 0),
(60, 214, 2, 1, 6500, 0, 6500),
(61, 215, 2, 3, 6500, 0, 19500),
(62, 215, 3, 1, 3000, 0, 3000),
(63, 216, 2, 1, 6500, 0, 6500),
(64, 217, 8, 3, 7600, 0, 22800),
(84, 228, 56, 1, 7200, 0, 7200),
(85, 228, 58, 1, 7900, 0, 7900),
(86, 228, 63, 1, 2700, 0, 2700);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `price` float NOT NULL,
  `stock` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `product`
--

INSERT INTO `product` (`product_id`, `name`, `description`, `category_id`, `discount`, `price`, `stock`, `deleted_at`, `image`) VALUES
(2, 'Manual del Jugador', '{\"descripcion\":\"Libro oficial\",\"marca\":\"Wizards of the Coast\",\"edad\":\"+13\",\"jugadores\":\"2 a 6\",\"formato\":\"Hardcover \\/ Tapa dura\"}', 1, 0, 6500, 36, NULL, '1749076366_01a686f3d41ce76a99a5.jpg'),
(3, 'Set de Dados Metálicos', 'Dados premium', 2, 0, 3000, 48, NULL, '1749076394_fa42aadc62e204fb78ac.jpg'),
(4, 'Manual de Monstruos', 'Una colección de letales monstruos para el juego de rol más importante del mundo', 1, 0, 5000, 6, NULL, '1749076382_b9601dc266e34dfc64f2.jpg'),
(5, 'Espada Mágica +1', 'Arma encantada ideal para aventureros.', 1, 5, 7500, 8, '2025-06-11 01:32:31', 'espada.jpg'),
(6, 'Dungeons And Dragons 5ta', '{\"descripcion\":\"Tablero\",\"marca\":\"Wizards of the Coast\",\"edad\":\"+13\",\"jugadores\":\"2 a 6\",\"formato\":\"Hardcover \\/ Tapa dura\"}', 4, 0, 10000, 1, '2025-06-18 23:27:50', '1750289112_281271fe6a10278fca71.jpg'),
(7, 'Manual del Jugador 2', '{\"descripcion\":\"1\",\"marca\":\"\",\"edad\":\"\",\"jugadores\":\"\",\"formato\":\"\"}', 1, 0, 1, 1, NULL, 'default.png'),
(8, 'Blade runner - Pantalla', '{\"descripcion\":\"Pantalla para el juego de rol de Blade runner.\",\"marca\":\"\",\"edad\":\" +14\",\"jugadores\":\"\",\"formato\":\"\"}', 5, 0, 7600, 29, NULL, '1750289619_3bb609a5fce387fe4724.webp'),
(54, 'Guía del Aventurero', 'Manual completo para crear personajes y campañas', 1, 0, 6800, 20, NULL, 'default.png'),
(55, 'Set de Dados Arcanos', 'Dados temáticos con grabados mágicos', 2, 5, 3200, 40, NULL, 'default.png'),
(56, 'Bestiario Oscuro', 'Contiene criaturas raras y oscuras para aventuras avanzadas', 1, 0, 7200, 14, NULL, 'default.png'),
(57, 'Tablero Modular Fantasía', 'Tablero armable para escenarios de fantasía', 4, 0, 8500, 10, NULL, 'default.png'),
(58, 'Pantalla del Hechicero', 'Pantalla personalizada con hechizos y referencias rápidas', 5, 0, 7900, 24, NULL, 'default.png'),
(59, 'Dados Elementales', 'Set de dados de fuego, agua, tierra y aire', 2, 10, 2800, 50, NULL, 'default.png'),
(60, 'Manual del Dungeon Master Avanzado', 'Contenidos avanzados para dirigir campañas', 1, 0, 8800, 12, NULL, 'default.png'),
(61, 'Tablero de Mazmorra Subterránea', 'Diseño de mazmorra ideal para campañas oscuras', 4, 0, 9000, 8, NULL, 'default.png'),
(62, 'Pantalla del Nigromante', 'Pantalla con arte oscuro y reglas rápidas', 5, 0, 8100, 18, NULL, 'default.png'),
(63, 'Set de Dados Translúcidos', 'Dados brillantes y coloridos para ambientar el juego', 2, 0, 2700, 59, NULL, 'default.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`user_id`, `username`, `fname`, `lname`, `role`, `mail`, `password`, `deleted_at`) VALUES
(1, 'tcliente1', 'Juan', 'Pérez', 'user', 'juan@mail.com', '1234', NULL),
(2, 'tcliente2', 'Carla', 'García', 'user', 'carla@mail.com', '1234', NULL),
(3, 'tcliente3', 'Lucía', 'Martínez', 'user', 'lucia@mail.com', '1234', NULL),
(5, 'messi10', 'lionel', 'messi', 'user', 'messi@gmail.com', '$2y$10$KAx82hD0PcrGyJZtO/I44.AlCOwPzGikgYcu4Hmpk427xWFNUH2SS', '2025-06-11 01:47:10'),
(6, 'admin', NULL, NULL, 'admin', 'admin@gmail.com', '$2y$10$JkVixP2zbtGxdts7GIDJNegYQOJGPGEpKuGOb9OW1YX7z.MhXzioi', NULL),
(7, 'tobias.o', 'Tobias ', 'Orban', 'admin', 'tobiasorban00@gmail.com', '$2y$10$09rQrVr/ShIx/ohZcY85uuuYlfZhPNkLvfOa2x5WOgzTB.GKbamIi', NULL),
(8, 'Juanceto', 'Juan', 'Lopez', 'user', 'juanceto001@gmail.com', '$2y$10$t90i22BR9LNJSE/KLYV9ue2LxW3rNbtOFqosSOxsH8iAtBvVdYrkC', NULL),
(9, 'cliente1', NULL, NULL, 'user', 'cliente@cliente.com', '$2y$10$/0ZUek7yu1ZJi4V8Wgx.TeDXhLQusNgOBFVki4VT5pSfXboFB6tcG', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wish_item`
--

CREATE TABLE `wish_item` (
  `wish_item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cart_item`
--
ALTER TABLE `cart_item`
  ADD PRIMARY KEY (`cart_item_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indices de la tabla `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indices de la tabla `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indices de la tabla `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`inquiry_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `invoice_item`
--
ALTER TABLE `invoice_item`
  ADD PRIMARY KEY (`invoice_item_id`),
  ADD KEY `invoice_id` (`invoice_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indices de la tabla `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indices de la tabla `wish_item`
--
ALTER TABLE `wish_item`
  ADD PRIMARY KEY (`wish_item_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cart_item`
--
ALTER TABLE `cart_item`
  MODIFY `cart_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `inquiry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;

--
-- AUTO_INCREMENT de la tabla `invoice_item`
--
ALTER TABLE `invoice_item`
  MODIFY `invoice_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT de la tabla `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `wish_item`
--
ALTER TABLE `wish_item`
  MODIFY `wish_item_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cart_item`
--
ALTER TABLE `cart_item`
  ADD CONSTRAINT `cart_item_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `cart_item_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Filtros para la tabla `inquiry`
--
ALTER TABLE `inquiry`
  ADD CONSTRAINT `inquiry_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Filtros para la tabla `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Filtros para la tabla `invoice_item`
--
ALTER TABLE `invoice_item`
  ADD CONSTRAINT `invoice_item_ibfk_1` FOREIGN KEY (`invoice_id`) REFERENCES `invoice` (`invoice_id`),
  ADD CONSTRAINT `invoice_item_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Filtros para la tabla `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

--
-- Filtros para la tabla `wish_item`
--
ALTER TABLE `wish_item`
  ADD CONSTRAINT `wish_item_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `wish_item_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
