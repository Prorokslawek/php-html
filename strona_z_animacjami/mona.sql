-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 22 Lut 2022, 19:10
-- Wersja serwera: 10.4.22-MariaDB
-- Wersja PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `mona`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pizza`
--

CREATE TABLE `pizza` (
  `numer` int(11) NOT NULL,
  `nazwa` varchar(30) DEFAULT NULL,
  `cena` int(11) DEFAULT NULL,
  `rozmiar` varchar(20) DEFAULT NULL,
  `zdj` varchar(78) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `pizza`
--

INSERT INTO `pizza` (`numer`, `nazwa`, `cena`, `rozmiar`, `zdj`) VALUES
(1, 'Margherita', 35, 'średnia', 'margheritta.jpg'),
(2, 'Kebab', 35, 'mała', 'salami.jpg'),
(3, 'ostra', 62, 'ogromna', 'ostra.jpg'),
(4, 'brokuł', 25, 'mała', 'brokuł.jpg'),
(5, 'oliwki', 50, 'średnia', 'oliwki.jpg'),
(6, 'serowa', 78, 'duża', 'serowa.jpg'),
(7, 'pieczarkowa', 22, 'mini', 'pieczarkowa.jpg'),
(8, 'miesna', 65, 'duza', 'miesna.jpg');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `pizza`
--
ALTER TABLE `pizza`
  ADD PRIMARY KEY (`numer`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `pizza`
--
ALTER TABLE `pizza`
  MODIFY `numer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
