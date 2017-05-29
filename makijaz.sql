-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 05 Lut 2017, 00:29
-- Wersja serwera: 10.1.16-MariaDB
-- Wersja PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `makijaz`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(11) NOT NULL,
  `user` text COLLATE utf8_polish_ci NOT NULL,
  `pass` text COLLATE utf8_polish_ci NOT NULL,
  `email` text COLLATE utf8_polish_ci NOT NULL,
  `imie` varchar(35) COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` varchar(35) COLLATE utf8_polish_ci NOT NULL,
  `punkty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `user`, `pass`, `email`, `imie`, `nazwisko`, `punkty`) VALUES
(1, 'mycha09', '$2y$10$KHbnMVeROtsUxM0sUZtwzugntIOt', 'ewelinam10@gmail.com', '', '', NULL),
(2, 'ania09', '$2y$10$oTJVWXeikNVE9XqqHjsa4.N.X5A0', 'ania@wp.pl', 'ania', 'kasperska', 3),
(3, 'mysia', '$2y$10$XLviyYi72cWWqS5zCEcrXeuBQh50', 'ewelinam@gmail.com', 'Ewelina', 'Mysiak', NULL),
(4, 'kasia', '$2y$10$eYKWVJsW6N/3v/cq6MuFVeYe3tmv', 'kasia@wp.pl', 'kasia', 'skrzypek', NULL),
(5, 'wika', '$2y$10$h13dJcmclfnihG5nCR6fEuz6eRPp', 'wika@wp.pl', 'wiktoria', 'hasiak', NULL),
(6, 'mysz', '$2y$10$jVF2GUHoSxtXbqei8fBybunNEHLI', 'ewelina@gmail.com', 'Ewelina', 'Mysiak', NULL),
(7, 'witek', '$2y$10$e7yC7YvH5GQWF0HQveqG5Ojut4JX5O.4d.nYcZovViUFPWBfBpz7q', 'witek@wp.pl', 'kasia', 'witkowska', NULL),
(8, 'mynia', '$2y$10$DhM9dRUh5u51cIcNQnio7uvTLYyfF6Yoy7GQM1uaT6mTUqZiEJgVm', 'mynia@wp.pl', 'mynia', 'mysiak', NULL),
(9, 'karo', '$2y$10$jewaxU0ULb8TkzHU1ER/.ecQkFDhAYj4YBVKZ/fee61lENzHlxiHu', 'karo@wp.pl', 'karolina', 'witkowska', NULL),
(10, 'kubablink', '$2y$10$.ODGdESsPAY2YrW5ymIs.uO1nx2NcMtD6vJuITCC.N8Aiw6uZJlrW', 'kubablink@gmail.com', 'Kuba', 'Tokarski', NULL),
(11, 'wiesiek', '$2y$10$bLzuEs9YfUTmG0HVu/rmke/urv1rWwXzCTr/t1aJM2DA8UwCZDclC', 'wiesiek@wp.pl', 'WiesÅ‚aw', 'Mysiak', 1),
(12, 'halina', '$2y$10$..o8z.jpPodLyo54MtlqD.LFaN3m.ohL8kG50VIUtDSEpmLAJ5OsW', 'halina@wp.pl', 'halina', 'mysiak', 3);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
