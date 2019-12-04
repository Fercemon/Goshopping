-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 06-11-2019 a las 06:15:57
-- Versión del servidor: 5.7.24
-- Versión de PHP: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fcere046_assignment2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `order_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `order_quantity` int(11) NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `id` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `desc` text NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `img` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `name`, `desc`, `price`, `quantity`, `img`) VALUES
(1, 'Rolex Watch', 'Waterproof watch with modern and elegant design ', '149.99', 5, 'Rolex-Watch.png'),
(2, 'beatsPro', 'Last beatsPro Dr Dree edition silver color', '109.99', 8, 'beatsPro-Dr-dree.png'),
(3, 'Canon', 'Canon Eos 5D mark IV', '129.99', 10, 'DSLR-Camera.png'),
(4, 'GoPro Hero 7', 'GoPro HERO7 Black — Waterproof Action Camera with Touch Screen 4K Ultra HD Video 12MP Photos 1080p Live Streaming Stabilization', '229.99', 7, 'GOPRO_HERO_7_BLACK2.png'),
(5, 'Iphone 11 Pro', 'Iphone 11Pro(64Gb storage) black edition', '689.99', 20, 'iphone-11-pro-2019.png'),
(6, 'JBL Boombox', 'JBL Boombox black-Hero edition', '139.99', 8, 'JBL_Boombox_Black_Hero.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
