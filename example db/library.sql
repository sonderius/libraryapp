-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Čtv 26. říj 2023, 20:59
-- Verze serveru: 10.4.24-MariaDB
-- Verze PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `library`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `book`
--

CREATE TABLE `book` (
  `state` text NOT NULL,
  `id` int(11) NOT NULL,
  `availability` text NOT NULL,
  `limitation` text NOT NULL,
  `ISBN` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Tato tabulka by měla obsahovat informace o všech knihách v k';

--
-- Vypisuji data pro tabulku `book`
--

INSERT INTO `book` (`state`, `id`, `availability`, `limitation`, `ISBN`) VALUES
('ok', 10, 'požičaná', 'no', 2147483647);

-- --------------------------------------------------------

--
-- Struktura tabulky `bookloan`
--

CREATE TABLE `bookloan` (
  `book` int(11) NOT NULL,
  `number_of_extensions` int(1) DEFAULT NULL,
  `return_date` int(20) NOT NULL,
  `register_number` int(11) NOT NULL,
  `creation_date` int(11) NOT NULL,
  `borrower` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabulky `books`
--

CREATE TABLE `books` (
  `name` text NOT NULL,
  `author` text NOT NULL,
  `publishing` text NOT NULL,
  `year_of_publication` int(11) NOT NULL,
  `ISBN` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vypisuji data pro tabulku `books`
--

INSERT INTO `books` (`name`, `author`, `publishing`, `year_of_publication`, `ISBN`) VALUES
('Afrika kolem dokola', 'Aston Martini', 'abraka', 1999, 1234567891),
('Harry Potter', 'J.K.Rowling', 'Bloomsbury', 2003, 2147483647);

-- --------------------------------------------------------

--
-- Struktura tabulky `debt`
--

CREATE TABLE `debt` (
  `evidencial_number` int(11) NOT NULL,
  `bookloan` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `state` text NOT NULL,
  `borrower` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabulky `member`
--

CREATE TABLE `member` (
  `name` text NOT NULL,
  `user_number` int(11) NOT NULL,
  `adress` text NOT NULL,
  `mobile` int(11) NOT NULL,
  `email` text NOT NULL,
  `active_reservation` int(11) NOT NULL,
  `active_loan` int(11) NOT NULL,
  `validity_of_registration` date NOT NULL,
  `registration_status` text NOT NULL,
  `registrated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Tato tabulka uchovává informace o členech knihovny, včetně č';

--
-- Vypisuji data pro tabulku `member`
--

INSERT INTO `member` (`name`, `user_number`, `adress`, `mobile`, `email`, `active_reservation`, `active_loan`, `validity_of_registration`, `registration_status`, `registrated_by`) VALUES
('Joe Joel', 12, 'ada', 910190346, '', 0, 0, '0000-00-00', 'active', 11111);

-- --------------------------------------------------------

--
-- Struktura tabulky `reservation`
--

CREATE TABLE `reservation` (
  `date` int(11) NOT NULL,
  `book` int(11) NOT NULL,
  `evidencial_number` int(11) NOT NULL,
  `date_expiration` date NOT NULL,
  `reservator` int(11) NOT NULL,
  `staff` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabulky `staff`
--

CREATE TABLE `staff` (
  `name` text NOT NULL,
  `position` text NOT NULL,
  `contact` int(11) NOT NULL,
  `salary` int(11) NOT NULL,
  `staff_number` int(11) NOT NULL,
  `email` text NOT NULL,
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `authKey` text NOT NULL,
  `accessToken` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vypisuji data pro tabulku `staff`
--

INSERT INTO `staff` (`name`, `position`, `contact`, `salary`, `staff_number`, `email`, `id`, `username`, `password`, `authKey`, `accessToken`) VALUES
('tom', 'a', 1, 0, 11, '1', 99, 'tom', '2', '1', '1'),
('admin', '', 0, 0, 1234, '', 100, 'admin', 'admin', 'test100key', '100-token'),
('adam', 'knihovnik', 42099999, 9999, 11111, 'ee', 2, 'adam', '1', '1', '1');

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ISBN` (`ISBN`),
  ADD KEY `id` (`id`),
  ADD KEY `ISBN_2` (`ISBN`);

--
-- Indexy pro tabulku `bookloan`
--
ALTER TABLE `bookloan`
  ADD PRIMARY KEY (`register_number`),
  ADD KEY `book` (`book`),
  ADD KEY `borrower` (`borrower`),
  ADD KEY `register number` (`register_number`);

--
-- Indexy pro tabulku `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`ISBN`),
  ADD UNIQUE KEY `ISBN` (`ISBN`);

--
-- Indexy pro tabulku `debt`
--
ALTER TABLE `debt`
  ADD PRIMARY KEY (`evidencial_number`),
  ADD KEY `Loan` (`bookloan`),
  ADD KEY `borrower` (`borrower`);

--
-- Indexy pro tabulku `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`user_number`),
  ADD KEY `registrated by` (`registrated_by`),
  ADD KEY `user number` (`user_number`);

--
-- Indexy pro tabulku `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`evidencial_number`),
  ADD KEY `book` (`book`),
  ADD KEY `borrower` (`reservator`,`staff`),
  ADD KEY `reservator` (`reservator`);

--
-- Indexy pro tabulku `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_number`),
  ADD KEY `staff number` (`staff_number`);

--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`ISBN`) REFERENCES `books` (`ISBN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Omezení pro tabulku `bookloan`
--
ALTER TABLE `bookloan`
  ADD CONSTRAINT `bookloan_ibfk_1` FOREIGN KEY (`borrower`) REFERENCES `member` (`user_number`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bookloan_ibfk_2` FOREIGN KEY (`book`) REFERENCES `book` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Omezení pro tabulku `debt`
--
ALTER TABLE `debt`
  ADD CONSTRAINT `debt_ibfk_2` FOREIGN KEY (`borrower`) REFERENCES `member` (`user_number`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `debt_ibfk_3` FOREIGN KEY (`bookloan`) REFERENCES `bookloan` (`register_number`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Omezení pro tabulku `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `member_ibfk_1` FOREIGN KEY (`registrated_by`) REFERENCES `staff` (`staff_number`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Omezení pro tabulku `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`book`) REFERENCES `book` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`reservator`) REFERENCES `member` (`user_number`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
