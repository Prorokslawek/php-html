-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 16 Mar 2022, 20:41
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
-- Baza danych: `dziennik`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `modyfikacje`
--

CREATE TABLE `modyfikacje` (
  `id_mod` int(11) NOT NULL,
  `data_oceny` datetime DEFAULT current_timestamp(),
  `ocena_przed` int(11) DEFAULT NULL,
  `id_oceny` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `modyfikacje`
--

INSERT INTO `modyfikacje` (`id_mod`, `data_oceny`, `ocena_przed`, `id_oceny`) VALUES
(15, '2022-03-11 11:32:28', 5, 3),
(16, '2022-03-11 11:47:48', 2, 3),
(17, '2022-03-10 15:14:04', 5, 10),
(18, '2022-03-10 15:15:23', 1, 11),
(19, '2022-03-11 13:06:54', 6, 24),
(20, '2022-03-11 17:28:42', 5, 24),
(21, '2022-03-11 17:28:57', 3, 25),
(22, '2022-03-11 11:46:46', 5, 19),
(23, '2022-03-10 15:30:17', 1, 16),
(24, '2022-03-10 15:30:24', 3, 17);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `oceny`
--

CREATE TABLE `oceny` (
  `id_oceny` int(11) NOT NULL,
  `id_ucznia` int(11) DEFAULT NULL,
  `ocena` text DEFAULT NULL,
  `data_dod` datetime DEFAULT current_timestamp(),
  `id_nauczyciela` int(11) DEFAULT NULL,
  `id_przedmiotu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `oceny`
--

INSERT INTO `oceny` (`id_oceny`, `id_ucznia`, `ocena`, `data_dod`, `id_nauczyciela`, `id_przedmiotu`) VALUES
(3, 4, '4', '2022-03-11 11:56:33', 5, 1),
(9, 6, '2', '2022-03-10 15:10:50', 2, 2),
(10, 6, '3+', '2022-03-11 12:12:53', 5, 1),
(11, 6, '2-', '2022-03-11 12:13:52', 5, 1),
(12, 4, '3', '2022-03-10 15:23:49', 7, 5),
(13, 4, '2', '2022-03-10 15:24:55', 2, 2),
(14, 6, '6', '2022-03-10 15:27:52', 7, 5),
(15, 4, '3', '2022-03-10 15:29:12', 5, 1),
(16, 4, '4-', '2022-03-14 09:09:12', 5, 1),
(17, 6, '2-', '2022-03-14 09:09:22', 2, 2),
(18, 4, '1', '2022-03-10 15:41:39', 2, 2),
(19, 8, '6', '2022-03-14 09:09:02', 9, 4),
(20, 8, '3+', '2022-03-10 15:57:06', 5, 1),
(21, 6, '5', '2022-03-11 12:14:22', 7, 5),
(24, 8, '2', '2022-03-11 21:22:43', 5, 1),
(25, 8, '3', '2022-03-14 09:08:54', 2, 2),
(26, 8, '5', '2022-03-14 09:09:35', 9, 4);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `przedmioty`
--

CREATE TABLE `przedmioty` (
  `id_przedmiotu` int(11) NOT NULL,
  `nazwa` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `przedmioty`
--

INSERT INTO `przedmioty` (`id_przedmiotu`, `nazwa`) VALUES
(1, 'Angielski'),
(2, 'Matematyka'),
(3, 'Polski'),
(4, 'Informatyka'),
(5, 'Wychowanie Fizyczne');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uprawnienia`
--

CREATE TABLE `uprawnienia` (
  `id_typu` int(11) NOT NULL,
  `nazwa_uprawnienia` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `uprawnienia`
--

INSERT INTO `uprawnienia` (`id_typu`, `nazwa_uprawnienia`) VALUES
(1, 'Administrator'),
(2, 'Nauczyciel'),
(3, 'Uczeń');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(11) NOT NULL,
  `imie` varchar(30) DEFAULT NULL,
  `nazwisko` varchar(30) DEFAULT NULL,
  `klasa` varchar(15) DEFAULT NULL,
  `login` varchar(30) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `typ` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `imie`, `nazwisko`, `klasa`, `login`, `password`, `typ`) VALUES
(2, 'Alicja', 'Gizelska', 'Nauczyciel', 'alicja', '$2y$10$NTlgnw/cekN7Cw3rm19TSOY4PqURSSehw9jFO3Ft1UnZX4QAcjyc6', 2),
(3, 'Jerzy', 'Janicki', 'Admin', 'jerzy', '$2y$10$76oqypq6bTR18EzENukyvOCcUbJClk6ClMWJYaReZ/iYIcNZmg2cG', 1),
(4, 'Marek', 'Seget', '4B', 'marek', '$2y$10$7DPszaGwmuWOk2B7a.6/eu1LcSPBQv1wsIIlm.t.0g8zaW0x0r7j2', 3),
(5, 'Ewa', 'Iwaniec', 'Nauczyciel', 'ewaa', '$2y$10$YDKbTaeASNczSU.AGC0PGujylAvUJCBBhmKmljqARBEApWcJzyxB2', 2),
(6, 'Sławek', 'Stefański', '4B', 'slawek', '$2y$10$y2Fa/teCjDTGjtsI70nW8OwvwjOwZGi.yvnlMxhZwXmuvqWYGI2wS', 3),
(7, 'Katarzyna', 'Makowska', 'Nauczyciel', 'kasia', '$2y$10$z5zWcGpnwLQBs4N0k07xoOu5CT9PvJ4N44X7ZGlYtqPbx2n7CSSTe', 2),
(8, 'Kacper', 'Szal', '4B', 'kacper', '$2y$10$Ia/qES1hYv6Ozp/bEtcZKONhSsN2XsVo1gJHLJo74C6OqxS0mZzh6', 3),
(9, 'Agata', 'Lerczak', 'Nauczyciel', 'agata', '$2y$10$/Cqxyp.NGakKz7gGipt4GetgDsWtit3SW5YBWtMPCkSAevDhz/9te', 2);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `modyfikacje`
--
ALTER TABLE `modyfikacje`
  ADD PRIMARY KEY (`id_mod`),
  ADD KEY `id_oceny` (`id_oceny`);

--
-- Indeksy dla tabeli `oceny`
--
ALTER TABLE `oceny`
  ADD PRIMARY KEY (`id_oceny`),
  ADD KEY `id_ucznia` (`id_ucznia`),
  ADD KEY `id_nauczyciela` (`id_nauczyciela`),
  ADD KEY `id_przedmiotu` (`id_przedmiotu`);

--
-- Indeksy dla tabeli `przedmioty`
--
ALTER TABLE `przedmioty`
  ADD PRIMARY KEY (`id_przedmiotu`);

--
-- Indeksy dla tabeli `uprawnienia`
--
ALTER TABLE `uprawnienia`
  ADD PRIMARY KEY (`id_typu`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `typ` (`typ`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `modyfikacje`
--
ALTER TABLE `modyfikacje`
  MODIFY `id_mod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT dla tabeli `oceny`
--
ALTER TABLE `oceny`
  MODIFY `id_oceny` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT dla tabeli `przedmioty`
--
ALTER TABLE `przedmioty`
  MODIFY `id_przedmiotu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `uprawnienia`
--
ALTER TABLE `uprawnienia`
  MODIFY `id_typu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `modyfikacje`
--
ALTER TABLE `modyfikacje`
  ADD CONSTRAINT `modyfikacje_ibfk_1` FOREIGN KEY (`id_oceny`) REFERENCES `oceny` (`id_oceny`);

--
-- Ograniczenia dla tabeli `oceny`
--
ALTER TABLE `oceny`
  ADD CONSTRAINT `oceny_ibfk_1` FOREIGN KEY (`id_ucznia`) REFERENCES `uzytkownicy` (`id`),
  ADD CONSTRAINT `oceny_ibfk_2` FOREIGN KEY (`id_nauczyciela`) REFERENCES `uzytkownicy` (`id`),
  ADD CONSTRAINT `oceny_ibfk_3` FOREIGN KEY (`id_przedmiotu`) REFERENCES `przedmioty` (`id_przedmiotu`);

--
-- Ograniczenia dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD CONSTRAINT `uzytkownicy_ibfk_1` FOREIGN KEY (`typ`) REFERENCES `uprawnienia` (`id_typu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
