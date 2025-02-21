-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sty 11, 2025 at 11:58 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ksiegarnia_bazy_danych`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klient`
--

CREATE TABLE `klient` (
  `Id_klient` int(11) NOT NULL,
  `Imię` varchar(45) DEFAULT NULL,
  `Nazwisko` varchar(45) DEFAULT NULL,
  `Adres` varchar(45) DEFAULT NULL,
  `Adres_numer_domu` varchar(5) NOT NULL,
  `Adres_miasto` varchar(45) NOT NULL,
  `Numer_telefonu` varchar(12) DEFAULT NULL,
  `Płeć` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `klient`
--

INSERT INTO `klient` (`Id_klient`, `Imię`, `Nazwisko`, `Adres`, `Adres_numer_domu`, `Adres_miasto`, `Numer_telefonu`, `Płeć`) VALUES
(1, 'Gabriela', 'Grabarska', 'ul.Grabarska', '1', 'Wrocław', '508508510', 'Kobieta'),
(2, 'Anna', 'Nowak', 'ul.Legnicka', '12/8', 'Lubin ', '502503504', 'Kobieta'),
(3, 'Tomasz', 'Nowak', 'ul.Legnicka', '12/1', 'Lubin', '502508509', 'Mężczyzna'),
(4, 'Przemysław', 'Kluska', 'ul. Miodowa', '24', 'Żagań', '696601445', 'Mężczyzna'),
(5, 'Kalina', 'Ostapiuk', 'ul. Leszczynowa', '769', 'Żyrardów', '539143587', 'Kobieta'),
(6, 'Olgierd', 'Zander', 'ul. Kwiatowa', '85/6', 'Świętochłowice', '788493562', 'Mężczyzna'),
(7, 'Apolonia', 'Lipa', 'ul. Ptasia', '4', 'Świdnik', '736442998', 'Kobieta'),
(8, 'Kazimierz', 'Ułanowicz', 'al. Majowa ', '60', 'Ełk', '327940222', 'Mężczyzna'),
(9, 'Zofia', 'Wojcik', 'ul. Wschodnia ', '16/13', 'Opole', '665400245', 'Kobieta'),
(10, 'Paweł', 'Borowski', 'ul. Tatrzańska ', '102', 'Łódź', '505789234', 'Mężczyzna'),
(11, 'Magdalena', 'Kwiatkowska', 'ul. Liliowa ', '29', 'Szczecin', '733441200', 'Kobieta'),
(12, 'Tomasz', 'Zielinski', 'ul. Zielona ', '7/7', 'Legnica', '513305674', 'Mężczyzna'),
(13, 'Aneta', 'Wójcik', 'ul. Brzozowa ', '113', 'Opole', '663334525', 'Kobieta'),
(14, 'Sebastian', 'Lis', 'ul. Pięciomorgowa ', '2/15', 'Gdańsk', '786543238', 'Mężczyzna'),
(15, 'Jolanta', 'Sienkiewicz', 'ul. Spokojna ', '90/9', 'Warszawa', '509776234', 'Kobieta'),
(16, 'Marek', 'Malinowski', 'ul. Miła ', '45', 'Katowice', '520909331', 'Mężczyzna'),
(18, 'Bożena', 'Kowalska', 'ul. Wrocławska', '52/5', 'Warszawa', '125478951', 'Kobieta'),
(19, 'Daria', 'Borkowska', 'ul. Opolska ', '17/5', 'Rzeszów', '789766443', 'Kobieta'),
(20, 'Adam', 'Pawlak', 'ul. Wiosenna', '9/3', 'Poznań', '563439800', 'Mężczyzna'),
(21, 'Natalia', 'Marciniak', 'ul. Słowiańska', '34/2', 'Białystok', '785600501', 'Kobieta'),
(22, 'Jakub', 'Nowakowski', 'ul. Mazurska', '11', 'Olsztyn', '522433444', 'Mężczyzna'),
(23, 'Katarzyna', 'Dąbrowska', 'ul. Bławatna ', '65/7', 'Toruń', '588465023', 'Kobieta'),
(24, 'Michał', 'Górski', 'ul. Kolejowa ', '222/2', 'Zabrze', '667388599', 'Mężczyzna'),
(25, 'Sylwia', 'Sikora', 'ul. Królewska ', '4/4', 'Szczecin', '783201231', 'Kobieta'),
(26, 'Robert', 'Jankowski', 'ul. Morska ', '90/8', 'Kraków', '567452998', 'Mężczyzna'),
(27, 'Agnieszka', 'Baran', 'ul. Podgórska', '3/13', 'Wrocław', '556322780', 'Kobieta'),
(28, 'Kamil', 'Pietrzak', 'ul. Stawna ', '59/9', 'Częstochowa', '724567788', 'Mężczyzna'),
(29, 'Bożena', 'Bukowska', 'ul. Kościuszki', '5', 'Bytom', '369852147', 'Kobieta');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkt`
--

CREATE TABLE `produkt` (
  `Id_produkt` int(11) NOT NULL,
  `Wydawnictwo` varchar(45) NOT NULL,
  `Autor` varchar(100) NOT NULL,
  `Tytuł` varchar(100) NOT NULL,
  `Rok_wydania` varchar(4) NOT NULL,
  `Kod_produktu` varchar(6) NOT NULL,
  `Cena_w_zł` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produkt`
--

INSERT INTO `produkt` (`Id_produkt`, `Wydawnictwo`, `Autor`, `Tytuł`, `Rok_wydania`, `Kod_produktu`, `Cena_w_zł`) VALUES
(1, 'Helion', 'Andrzej Andrzejewski', 'Kurs C++', '2019', '00001', 99.98),
(3, 'SuperNowa', 'Andrzej Sapkowski', 'Ostatnie życzenie', '1993', '00003', 34.99),
(4, 'SuperNowa', 'Andrzej Sapkowski', 'Miecz przeznaczenia', '1992', '00004', 36.99),
(5, 'SuperNowa', 'Andrzej Sapkowski', 'Krew elfów', '1994', '00005', 39.98),
(6, 'SuperNowa', 'Andrzej Sapkowski', 'Czas pogardy', '1995', '00006', 39.98),
(7, 'SuperNowa', 'Andrzej Sapkowski', 'Chrzest ognia', '1996', '00007', 39.98),
(9, 'SuperNowa', 'Andrzej Sapkowski', 'Pani Jeziora', '1999', '00009', 42.98),
(10, 'SuperNowa', 'Andrzej Sapkowski', 'Sezon burz', '2013', '00010', 44.98),
(11, 'SuperNowa', 'Andrzej Sapkowski', 'Rozdroże kruków', '2024', '00011', 44.98),
(12, 'Media Rodzina', 'Rowling J. K.', 'Harry Potter i Kamień Filozoficzny', '2016', '00012', 37.98),
(13, 'Znak', 'Adam Mickiewicz', 'Pan Tadeusz', '1834', '00013', 29.99),
(14, 'Wydawnictwo Literackie', 'Henryk Sienkiewicz', 'Quo Vadis', '1896', '00014', 39.99),
(15, 'Państwowy Instytut Wydawniczy', 'Juliusz Słowacki', 'Kordian', '1834', '00015', 34.99),
(16, 'Wydawnictwo Ossolineum', 'Władysław Reymont', 'Chłopi', '1904', '00016', 44.99),
(17, 'Wydawnictwo Literackie', 'Stanisław Wyspiański', 'Wesele', '1901', '00017', 24.99),
(18, 'Nasza Księgarnia', 'Bolesław Prus', 'Lalka', '1890', '00018', 39.99),
(19, 'Wydawnictwo Iskry', 'Maria Dąbrowska', 'Noce i dnie', '1932', '00019', 54.99),
(20, 'GJ Książki', 'Katarzyna Jurkowska i Małgorzata Liszyk-Kozłowska', 'Życie we dwoje', '2012', '00020', 72.99);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zakupy`
--

CREATE TABLE `zakupy` (
  `Id_zakupy` int(11) NOT NULL,
  `Id_klienta` int(11) DEFAULT NULL,
  `Id_produktu` int(11) DEFAULT NULL,
  `Data_zakupu` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `zakupy`
--

INSERT INTO `zakupy` (`Id_zakupy`, `Id_klienta`, `Id_produktu`, `Data_zakupu`) VALUES
(1, 1, 1, '2024-11-24'),
(3, 1, 11, '2025-01-06'),
(6, 4, 4, '2024-12-04'),
(7, 16, 7, '2024-12-11'),
(8, 8, 4, '2024-11-27'),
(9, 11, 20, '2025-01-11');

-- --------------------------------------------------------

--
-- Zastąpiona struktura widoku `zakupy_klient_i_produkty`
-- (See below for the actual view)
--
CREATE TABLE `zakupy_klient_i_produkty` (
`Id_klient` int(11)
,`Imię` varchar(45)
,`Nazwisko` varchar(45)
,`Adres` varchar(45)
,`Adres_numer_domu` varchar(5)
,`Adres_miasto` varchar(45)
,`Numer_telefonu` varchar(12)
,`Płeć` varchar(10)
,`Id_produkt` int(11)
,`Wydawnictwo` varchar(45)
,`Autor` varchar(100)
,`Tytuł` varchar(100)
,`Rok_wydania` varchar(4)
,`Kod_produktu` varchar(6)
,`Cena_w_zł` float
,`Data_zakupu` date
);

-- --------------------------------------------------------

--
-- Struktura widoku `zakupy_klient_i_produkty`
--
DROP TABLE IF EXISTS `zakupy_klient_i_produkty`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `zakupy_klient_i_produkty`  AS SELECT `klient`.`Id_klient` AS `Id_klient`, `klient`.`Imię` AS `Imię`, `klient`.`Nazwisko` AS `Nazwisko`, `klient`.`Adres` AS `Adres`, `klient`.`Adres_numer_domu` AS `Adres_numer_domu`, `klient`.`Adres_miasto` AS `Adres_miasto`, `klient`.`Numer_telefonu` AS `Numer_telefonu`, `klient`.`Płeć` AS `Płeć`, `produkt`.`Id_produkt` AS `Id_produkt`, `produkt`.`Wydawnictwo` AS `Wydawnictwo`, `produkt`.`Autor` AS `Autor`, `produkt`.`Tytuł` AS `Tytuł`, `produkt`.`Rok_wydania` AS `Rok_wydania`, `produkt`.`Kod_produktu` AS `Kod_produktu`, `produkt`.`Cena_w_zł` AS `Cena_w_zł`, `zakupy`.`Data_zakupu` AS `Data_zakupu` FROM ((`zakupy` join `klient` on(`zakupy`.`Id_klienta` = `klient`.`Id_klient`)) join `produkt` on(`zakupy`.`Id_produktu` = `produkt`.`Id_produkt`)) ;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `klient`
--
ALTER TABLE `klient`
  ADD PRIMARY KEY (`Id_klient`);

--
-- Indeksy dla tabeli `produkt`
--
ALTER TABLE `produkt`
  ADD PRIMARY KEY (`Id_produkt`);

--
-- Indeksy dla tabeli `zakupy`
--
ALTER TABLE `zakupy`
  ADD PRIMARY KEY (`Id_zakupy`),
  ADD KEY `fk_idproduktu` (`Id_produktu`),
  ADD KEY `fk_idklienta` (`Id_klienta`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `klient`
--
ALTER TABLE `klient`
  MODIFY `Id_klient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `produkt`
--
ALTER TABLE `produkt`
  MODIFY `Id_produkt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `zakupy`
--
ALTER TABLE `zakupy`
  MODIFY `Id_zakupy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `zakupy`
--
ALTER TABLE `zakupy`
  ADD CONSTRAINT `fk_idklienta` FOREIGN KEY (`id_klienta`) REFERENCES `klient` (`Id_klient`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_idproduktu` FOREIGN KEY (`id_produktu`) REFERENCES `produkt` (`Id_produkt`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `zakupy_ibfk_1` FOREIGN KEY (`Id_klienta`) REFERENCES `klient` (`Id_klient`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `zakupy_ibfk_2` FOREIGN KEY (`Id_produktu`) REFERENCES `produkt` (`Id_produkt`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
