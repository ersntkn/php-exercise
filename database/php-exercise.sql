-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 07 Oca 2022, 02:47:25
-- Sunucu sürümü: 10.1.29-MariaDB
-- PHP Sürümü: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `php-exercise`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `whoIsAdd` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `isActive` int(11) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `articles`
--

INSERT INTO `articles` (`id`, `whoIsAdd`, `title`, `description`, `isActive`, `createdAt`, `updatedAt`) VALUES
(31, 'Ersin', '5', '5', 1, '2022-01-06 07:30:25', '2022-01-06 07:30:35'),
(32, 'Ersin', 'asd', 'asd', 1, '2022-01-07 01:56:04', '0000-00-00 00:00:00'),
(33, 'Ersin', 'asdas', 'dsadasd', 1, '2022-01-07 01:57:44', '0000-00-00 00:00:00'),
(34, 'Ersin', 'dsa', 'dasda', 1, '2022-01-07 02:01:17', '0000-00-00 00:00:00'),
(35, 'Ersin', 'asda', 'sdadasd', 1, '2022-01-07 02:01:46', '0000-00-00 00:00:00'),
(36, 'Ersin', 'sa', 'asd', 1, '2022-01-07 02:03:25', '0000-00-00 00:00:00'),
(37, 'Ersin', 'asdasd', 'asdasdsa', 1, '2022-01-07 02:10:59', '0000-00-00 00:00:00'),
(38, 'Ersin', 'asdas', 'asdas', 1, '2022-01-07 02:33:08', '0000-00-00 00:00:00'),
(39, 'Ersin', 'ersin', 'asdasd', 1, '2022-01-07 02:33:20', '0000-00-00 00:00:00'),
(40, 'Ersin', 'ersin', 'ersin', 1, '2022-01-07 02:33:35', '0000-00-00 00:00:00'),
(41, 'ahmet', 'asdasd', 'dasdasd', 1, '2022-01-07 02:38:26', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `createdAt` datetime NOT NULL,
  `ipAddress` varchar(255) NOT NULL,
  `lastLogin` datetime NOT NULL,
  `isLogin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `password`, `createdAt`, `ipAddress`, `lastLogin`, `isLogin`) VALUES
(24, 'Ersin', 'Tekin', 'ersintekinelb@gmail.com', 'd22ebf286bfa78fc7d74c3e56569e64d', '2022-01-05 07:40:06', '::1', '2022-01-07 02:32:08', 0),
(25, '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '2022-01-06 06:33:25', '::1', '0000-00-00 00:00:00', 0),
(26, 'ahmet', 'ahmet', 'ahmet@gmail.com', 'd22ebf286bfa78fc7d74c3e56569e64d', '2022-01-07 02:37:17', '::1', '0000-00-00 00:00:00', 0),
(27, 'ahmet', 'agsdas', 'asdasd@asdasd.com', 'd22ebf286bfa78fc7d74c3e56569e64d', '2022-01-07 02:38:01', '::1', '2022-01-07 02:38:13', 0);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
