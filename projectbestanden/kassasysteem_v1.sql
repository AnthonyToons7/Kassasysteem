
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE DATABASE IF NOT EXISTS `kassasysteem` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `kassasysteem`;


DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `idproduct` int NOT NULL,
  `naam` varchar(255) NOT NULL,
  `prijs` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `product` (`idproduct`, `naam`, `prijs`) VALUES
(2, 'Cola', 0),
(3, 'Spa Rood', 0),
(4, 'Spa blauw', 0),
(5, '7-Up', 0),
(6, 'Chocomel', 0),
(7, 'Tomatensoep', 0),
(8, 'Groentensoep', 0),
(9, 'Carpaccio', 0),
(10, 'Stokbrood met kruidenboter', 0),
(11, 'Biefstuk', 0),
(12, 'Vega-burger', 0),
(13, 'Hamburger de luxe', 0),
(14, 'Noorse zalm', 0),
(15, 'Drie bolletjes ijs', 0),
(16, 'Drie bolletjes ijs', 0),
(17, 'Koffie', 0),
(18, 'Kaasplankje', 0),
(19, 'Kaasplankje', 0),
(20, 'Olijven', 0),
(21, 'Tortillachips', 0);


DROP TABLE IF EXISTS `product_tafel`;
CREATE TABLE `product_tafel` (
  `idproduct_tafel` int NOT NULL,
  `idtafel` int NOT NULL,
  `idproduct` int NOT NULL,
  `datumtijd` int NOT NULL,
  `betaald` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


DROP TABLE IF EXISTS `tafel`;
CREATE TABLE `tafel` (
  `idtafel` int NOT NULL,
  `omschrijving` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `tafel` (`idtafel`, `omschrijving`) VALUES
(2, '10'),
(3, '20'),
(4, '30'),
(5, '40'),
(6, '50');

ALTER TABLE `product`
  ADD PRIMARY KEY (`idproduct`);

ALTER TABLE `product_tafel`
  ADD PRIMARY KEY (`idproduct_tafel`);

ALTER TABLE `tafel`
  ADD PRIMARY KEY (`idtafel`);

ALTER TABLE `product`
  MODIFY `idproduct` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

ALTER TABLE `product_tafel`
  MODIFY `idproduct_tafel` int NOT NULL AUTO_INCREMENT;

ALTER TABLE `tafel`
  MODIFY `idtafel` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;
