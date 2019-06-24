-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 30-Maio-2019 às 23:00
-- Versão do servidor: 5.7.26-0ubuntu0.19.04.1
-- PHP Version: 7.2.17-0ubuntu0.19.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book_app`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `add_book`
--

CREATE TABLE `add_book` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `catg_id` int(11) DEFAULT NULL,
  `month_id` int(11) DEFAULT NULL,
  `year_id` int(11) DEFAULT NULL,
  `task_date` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `add_book`
--

INSERT INTO `add_book` (`id`, `user_id`, `book_id`, `author_id`, `catg_id`, `month_id`, `year_id`, `task_date`) VALUES
(2, 1, 3, 3, 2, 1, 4, 'Mon, 14 May 2018 17:32:07'),
(3, 2, 4, 4, 1, 3, 5, 'Mon, 14 May 2018 17:42:22'),
(4, 1, 5, 5, 3, 1, 5, 'Mon, 14 May 2018 18:41:14'),
(5, 1, 6, 6, 2, 1, 5, 'Mon, 14 May 2018 18:42:09'),
(6, 1, 7, 7, 1, 3, 5, 'Mon, 14 May 2018 18:45:33'),
(7, 1, 8, 8, 2, 3, 5, 'Mon, 14 May 2018 23:31:44'),
(8, 1, 9, 9, 3, 3, 5, 'Mon, 14 May 2018 23:33:00'),
(9, 1, 10, 10, 3, 3, 5, 'Mon, 14 May 2018 23:33:27'),
(10, 1, 11, 11, 3, 2, 4, 'Tue, 15 May 2018 13:18:13'),
(12, 1, 12, 13, 1, 4, 5, 'Tue, 15 May 2018 13:38:49'),
(14, 1, 14, 10, 3, 4, 5, 'Tue, 15 May 2018 13:50:38'),
(15, 1, 16, 7, 1, 9, 4, 'Tue, 15 May 2018 13:52:00'),
(16, 1, 17, 4, 1, 9, 4, 'Tue, 15 May 2018 14:01:53'),
(17, 1, 18, 15, 8, 4, 5, 'Tue, 15 May 2018 14:03:31'),
(18, 1, 19, 16, 3, 5, 5, 'Tue, 15 May 2018 15:10:52'),
(19, 1, 20, 17, 1, 2, 4, 'Tue, 15 May 2018 15:15:50'),
(20, 1, 21, 18, 3, 2, 4, 'Tue, 15 May 2018 15:18:24'),
(21, 1, 22, 19, 9, 2, 4, 'Tue, 15 May 2018 15:19:16'),
(22, 1, 23, 20, 9, 3, 4, 'Tue, 15 May 2018 18:38:28'),
(23, 1, 24, 21, 10, 3, 4, 'Tue, 15 May 2018 18:39:27'),
(24, 1, 25, 22, 8, 3, 4, 'Tue, 15 May 2018 18:40:08'),
(25, 1, 26, 23, 9, 4, 4, 'Tue, 15 May 2018 18:42:12'),
(26, 1, 27, 24, 11, 5, 4, 'Tue, 15 May 2018 18:43:25'),
(27, 1, 28, 18, 9, 6, 4, 'Tue, 15 May 2018 18:43:59'),
(28, 1, 29, 22, 8, 6, 4, 'Tue, 15 May 2018 18:44:20'),
(29, 1, 30, 25, 3, 6, 4, 'Tue, 15 May 2018 18:44:40'),
(30, 1, 31, 26, 3, 6, 4, 'Tue, 15 May 2018 18:45:18'),
(31, 1, 32, 18, 3, 7, 4, 'Tue, 15 May 2018 18:45:53'),
(32, 1, 33, 17, 12, 8, 4, 'Tue, 15 May 2018 18:50:49'),
(33, 1, 34, 27, 13, 8, 4, 'Tue, 15 May 2018 18:52:20'),
(34, 1, 35, 7, 12, 8, 4, 'Tue, 15 May 2018 18:52:54'),
(35, 1, 36, 28, 14, 8, 4, 'Tue, 15 May 2018 18:53:24'),
(36, 1, 37, 29, 8, 8, 4, 'Tue, 15 May 2018 18:54:35'),
(37, 1, 38, 30, 3, 9, 4, 'Tue, 15 May 2018 18:55:28'),
(38, 1, 39, 31, 9, 9, 4, 'Tue, 15 May 2018 18:55:57'),
(39, 1, 40, 32, 8, 10, 4, 'Tue, 15 May 2018 18:56:25'),
(40, 1, 41, 17, 1, 10, 4, 'Tue, 15 May 2018 18:56:48'),
(41, 1, 42, 33, 13, 11, 4, 'Tue, 15 May 2018 18:57:12'),
(42, 1, 43, 34, 9, 11, 4, 'Tue, 15 May 2018 18:57:39'),
(43, 1, 44, 35, 1, 12, 4, 'Tue, 15 May 2018 18:57:59'),
(44, 1, 45, 18, 3, 12, 4, 'Tue, 15 May 2018 18:58:45'),
(45, 1, 46, 21, 10, 12, 4, 'Tue, 15 May 2018 18:58:59'),
(46, 1, 47, 36, 15, 12, 4, 'Tue, 15 May 2018 19:00:20'),
(47, 1, 48, 37, 1, 12, 4, 'Tue, 15 May 2018 19:01:34'),
(48, 2, 49, 38, 1, 4, 5, 'Wed, 16 May 2018 14:48:45'),
(54, 1, 64, 18, 3, 12, 3, 'Wed, 16 May 2018 17:24:10'),
(56, 1, 65, 40, 8, 12, 3, 'Wed, 16 May 2018 17:26:05'),
(57, 1, 66, 41, 13, 12, 3, 'Wed, 16 May 2018 17:28:30'),
(58, 1, 67, 42, 16, 12, 3, 'Wed, 16 May 2018 17:29:30'),
(59, 1, 68, 43, 10, 11, 3, 'Wed, 16 May 2018 19:10:27'),
(60, 1, 69, 44, 2, 11, 3, 'Wed, 16 May 2018 19:11:40'),
(61, 1, 70, 41, 17, 11, 3, 'Wed, 16 May 2018 19:13:11'),
(62, 1, 71, 45, 13, 11, 3, 'Wed, 16 May 2018 19:13:36'),
(63, 1, 72, 46, 3, 10, 3, 'Wed, 16 May 2018 19:14:29'),
(64, 1, 73, 47, 9, 10, 3, 'Wed, 16 May 2018 19:14:48'),
(65, 1, 74, 47, 9, 10, 3, 'Wed, 16 May 2018 19:15:06'),
(66, 1, 75, 48, 15, 10, 3, 'Wed, 16 May 2018 19:15:28'),
(67, 1, 76, 25, 3, 9, 3, 'Wed, 16 May 2018 19:16:48'),
(68, 1, 77, 49, 18, 9, 3, 'Wed, 16 May 2018 19:17:08'),
(69, 1, 78, 50, 19, 10, 3, 'Wed, 16 May 2018 19:17:24'),
(70, 1, 79, 51, 8, 8, 3, 'Wed, 16 May 2018 19:17:46'),
(71, 1, 80, 52, 1, 8, 3, 'Wed, 16 May 2018 19:18:04'),
(72, 1, 81, 53, 2, 7, 3, 'Wed, 16 May 2018 19:20:10'),
(73, 1, 82, 54, 20, 7, 3, 'Wed, 16 May 2018 19:21:11'),
(74, 1, 83, 55, 20, 7, 3, 'Wed, 16 May 2018 19:21:40'),
(75, 1, 84, 56, 13, 6, 3, 'Wed, 16 May 2018 19:22:00'),
(76, 1, 85, 57, 8, 6, 3, 'Wed, 16 May 2018 19:22:16'),
(77, 1, 86, 58, 17, 6, 3, 'Wed, 16 May 2018 19:22:36'),
(78, 1, 87, 59, 17, 6, 3, 'Wed, 16 May 2018 19:23:22'),
(79, 1, 88, 5, 3, 6, 3, 'Wed, 16 May 2018 19:23:42'),
(80, 1, 89, 43, 10, 11, 1, 'Thu, 17 May 2018 11:48:59'),
(81, 1, 90, 43, 10, 12, 1, 'Thu, 17 May 2018 12:33:14'),
(82, 1, 91, 60, 9, 2, 2, 'Thu, 17 May 2018 14:16:39'),
(83, 2, 92, 61, 15, 1, 6, 'Thu, 17 May 2018 14:20:07'),
(89, 2, 96, 46, 3, 1, 7, 'Fri, 18 May 2018 18:00:46'),
(90, 2, 97, 4, 1, 4, 1, 'Fri, 18 May 2018 18:03:20'),
(92, 1, 98, 1, 10, 1, 3, 'Fri, 18 May 2018 18:12:52'),
(95, 4, 13, 13, 1, 2, 2, 'Wed, 13 Jun 2018 11:36:51'),
(96, 1, 101, 52, 1, 7, 5, 'Fri, 10 Aug 2018 14:38:20'),
(97, 1, 102, 64, 15, 9, 5, 'Mon, 19 Nov 2018 00:07:01'),
(98, 1, 103, 65, 14, 10, 5, 'Mon, 19 Nov 2018 00:07:47'),
(99, 1, 104, 66, 1, 11, 5, 'Mon, 19 Nov 2018 00:09:47'),
(100, 1, 105, 67, 1, 11, 5, 'Mon, 19 Nov 2018 00:10:21'),
(101, 1, 13, 13, 1, 4, 5, 'Mon, 19 Nov 2018 00:11:57'),
(102, 1, 106, 68, 15, 12, 5, 'Sun, 09 Dec 2018 20:15:35'),
(104, 1, 108, 70, 15, 1, 8, 'Tue, 15 Jan 2019 11:07:26'),
(105, 1, 109, 35, 1, 12, 5, 'Tue, 15 Jan 2019 11:08:46'),
(115, 1, 43, 71, 1, 5, 2, 'Tue, 29 Jan 2019 22:49:33'),
(116, 1, 112, 72, 23, 2, 8, 'Fri, 08 Feb 2019 21:39:19'),
(123, 1, 120, 40, 8, 4, 8, 'Thu, 30 May 2019 15:24:09'),
(124, 1, 121, 73, 1, 4, 8, 'Thu, 30 May 2019 22:37:15');

-- --------------------------------------------------------

--
-- Estrutura da tabela `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `author_name` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `authors`
--

INSERT INTO `authors` (`id`, `author_name`) VALUES
(1, 'Harlen Coben'),
(3, 'Brad Stone'),
(4, 'Fyodor Dostoesky'),
(5, 'Yuval Noah Harari'),
(6, 'Fred Vogelstein'),
(7, 'Stephen King'),
(8, 'Peter Thiel'),
(9, 'Elizabeth Kolbert'),
(10, 'Stephen Hawking'),
(11, 'Leonard Mlodnow'),
(13, 'F. Scott Fitzgerald'),
(15, 'Richard Feynman'),
(16, 'Steven Johnson'),
(17, 'Ray Bradbury'),
(18, 'Carl Sagan'),
(19, 'Black Crouch'),
(20, 'Arthur C. Clarke'),
(21, 'Agatha Christie'),
(22, 'Cristiane Correa'),
(23, 'Pierre Boulle'),
(24, 'Richard Wrangham'),
(25, 'Marcelo Gleiser'),
(26, 'Richard Dawkins'),
(27, 'Hal Erold'),
(28, 'Luiz Felipe PondÃ©'),
(29, 'IgnÃ¡cio BrandÃ£o'),
(30, 'Angela Duckworth'),
(31, 'Aldous Huxley'),
(32, 'Philip Knight'),
(33, 'Eduardo Ferraz'),
(34, 'Mary Shelley'),
(35, 'Josh Malerman'),
(36, 'Stephen Witt'),
(37, 'A. S. A. Harrison'),
(38, 'Jane Austen'),
(39, 'Charles Darwin'),
(40, 'Walter Isaacson'),
(41, 'Jurandir Jr.'),
(42, 'Bernard Cornwell'),
(43, 'Arthur Conan Doyle'),
(44, 'Filipe Vilicic'),
(45, 'I. C. Robledo'),
(46, 'Neil Degrasse Tyson'),
(47, 'Isaac Azimov'),
(48, 'Bruno Garshagen'),
(49, 'John Brockman'),
(50, 'Unopar'),
(51, 'Ashlee Vance'),
(52, 'George Orwell'),
(53, 'Edwin Catmull'),
(54, 'Charles Duhigg'),
(55, 'James C. Hunter'),
(56, 'Dale Carnegie'),
(57, 'Jordan Belfort'),
(58, 'T. Harv Eker'),
(59, 'Robert Kiyosaki'),
(60, 'Andy Weir'),
(61, 'Glenn Greenwald '),
(62, 'Gregg Hurwitz'),
(63, 'Daniel Kahneman'),
(64, 'Michael Lewis'),
(65, 'Jostein Gaarder'),
(66, 'Charles Dickens'),
(67, 'Dan Brown'),
(68, 'Mark Manson'),
(69, 'J. K. Rowlling'),
(70, 'John Carreyrou'),
(71, 'Marry Shelley'),
(72, 'Robert Galbraith'),
(73, 'JoÃ«l Dicker '),
(74, 'test');

-- --------------------------------------------------------

--
-- Estrutura da tabela `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `book_title` text,
  `classification` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `books`
--

INSERT INTO `books` (`id`, `book_title`, `classification`) VALUES
(1, 'Confie em mim', NULL),
(3, 'A loja de tudo', NULL),
(4, 'Os irmÃ£os Karamazov', NULL),
(5, 'Homo deus: uma histÃ³ria do amanhÃ£', NULL),
(6, 'Briga de cachorro grande', NULL),
(7, 'Thinner', NULL),
(8, 'De zero a um', NULL),
(9, 'Sexta extinÃ§Ã£o: uma histÃ³ria nÃ£o natural', NULL),
(10, 'Uma breve histÃ³ria do tempo', NULL),
(11, 'De primatas a astronautas', NULL),
(13, 'The Great Gatsby', NULL),
(14, 'Grand design', NULL),
(16, 'Misery: louca obsessÃ£o', NULL),
(17, 'Crime and punishment', NULL),
(18, 'Surely you are joking, Mr. Feynman', NULL),
(19, 'Como chegamos atÃ© aqui', NULL),
(20, 'Fahrenheit 451', NULL),
(21, 'O mundo assombrado por demÃ´nios', NULL),
(22, 'MatÃ©ria escura', NULL),
(23, '2001: uma odissÃ©ia no espaÃ§o', NULL),
(24, 'Assassinato no expresso do oriente', NULL),
(25, 'Sonho grande', NULL),
(26, 'O planeta dos macacos', NULL),
(27, 'Pegando fogo', NULL),
(28, 'Contact', NULL),
(29, 'AbÃ­lio', NULL),
(30, 'O livro do cientista', NULL),
(31, 'A magia da realidade', NULL),
(32, 'Cosmos', NULL),
(33, 'Zen e a arte da escrita', NULL),
(34, 'Milagre da manhÃ£', NULL),
(35, 'Sobre a escrita', NULL),
(36, 'Filosofia para corajosos', NULL),
(37, 'Carlos Wizard: biografia', NULL),
(38, 'Grit', NULL),
(39, 'AdmirÃ¡vel mundo novo', NULL),
(40, 'Shoe dog: a marca da vitÃ³ria', NULL),
(41, 'CrÃ´nicas marcianas', NULL),
(42, 'Negocie qualquer coisa com qualquer pessoa', NULL),
(43, 'Frankenstein', NULL),
(44, 'A caixa de pÃ¡ssaros', NULL),
(45, 'The pale blue dot', NULL),
(46, 'A casa torta', NULL),
(47, 'Como a mÃºsica ficou grÃ¡tis ', NULL),
(48, 'A mulher silenciosa', NULL),
(49, 'Pride and prejudice', NULL),
(63, 'The origin of species', NULL),
(64, 'BilhÃµes e bilhÃµes ', NULL),
(65, 'Steve Jobs', NULL),
(66, 'Quatro dimensÃµes de uma vida em equilÃ­brio', NULL),
(67, 'O rei do inverno', NULL),
(68, 'O cÃ£o dos baskerville', NULL),
(69, 'O clique de 1 bilhÃ£o de dÃ³lares', NULL),
(70, 'A Ã¡rvore do dinheiro', NULL),
(71, 'Guia de hÃ¡bitos inteligentes', NULL),
(72, 'Origens: 14 anos de evoluÃ§Ã£o cÃ³smica', NULL),
(73, 'Eu, robÃ´', NULL),
(74, 'A fundaÃ§Ã£o', NULL),
(75, 'Pare de acreditar no governo', NULL),
(76, 'A danÃ§a do universo', NULL),
(77, 'As coisas sÃ£o assim', NULL),
(78, 'HistÃ³ria antiga', NULL),
(79, 'Elon Musk', NULL),
(80, 'Animal farm', NULL),
(81, 'Criatividade S.A', NULL),
(82, 'O poder do hÃ¡bito', NULL),
(83, 'O monge e o executivo', NULL),
(84, 'Como fazer amigos e influenciar pessoas', NULL),
(85, 'O lobo de Wall Street', NULL),
(86, 'Os segredos da mente milionÃ¡ria', NULL),
(87, 'Pai rico, pai pobre', NULL),
(88, 'Sapiens: uma breve histÃ³ria da humanidade', NULL),
(89, 'Um estudo em Vermelho', NULL),
(90, 'O signo dos quatro', NULL),
(91, 'Perdido em Marte', 9),
(92, 'No place to hide: Edward Snowden', NULL),
(94, 'The selfish gene', NULL),
(95, 'The Survivor', NULL),
(96, 'Death by Black Hole', NULL),
(97, 'O idiota', NULL),
(98, 'Confie em mim', NULL),
(99, 'RÃ¡pido e devagar', NULL),
(100, 'Frankeinstein', NULL),
(101, '1984', NULL),
(102, 'The big short', NULL),
(103, 'Sofia\'s world', NULL),
(104, 'The Christmas Carrol', NULL),
(105, 'Origin', NULL),
(106, 'The subtle art of not giving a fuck', NULL),
(108, 'Bad Blood', NULL),
(109, 'A house at the bottom of a lake', NULL),
(110, 'Harry Potter And The Sorcerer\'s Stone', NULL),
(111, 'Frankstein', NULL),
(112, 'Cuckoo\'s Calling', NULL),
(120, 'Leonardo Da Vinci', NULL),
(121, 'A verdade sobre o caso Harry Quebert', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `catg_name` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categories`
--

INSERT INTO `categories` (`id`, `catg_name`) VALUES
(1, 'Fiction'),
(2, 'Technology'),
(3, 'Science'),
(8, 'Biography'),
(9, 'Science Fiction'),
(10, 'Mistery'),
(11, 'Anthropology'),
(12, 'Writing'),
(13, 'Self-development'),
(14, 'Philosophy'),
(15, 'Non-Fiction'),
(16, 'Historical fiction'),
(17, 'Financial development'),
(19, 'History'),
(20, 'Productivity'),
(21, 'Thriller'),
(22, 'Psychology'),
(23, 'Criminal Fiction'),
(24, 'test');

-- --------------------------------------------------------

--
-- Estrutura da tabela `month_finished`
--

CREATE TABLE `month_finished` (
  `id` int(11) NOT NULL,
  `month_name` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `month_finished`
--

INSERT INTO `month_finished` (`id`, `month_name`) VALUES
(1, 'January'),
(2, 'February'),
(3, 'March'),
(4, 'April'),
(5, 'May'),
(6, 'June'),
(7, 'July'),
(8, 'August'),
(9, 'September'),
(10, 'October'),
(11, 'November'),
(12, 'December');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `user_name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `birth_date` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `user_name`, `email`, `password`, `birth_date`) VALUES
(1, 'Weslley', 'Victor', 'wvictor07', 'wvictor07@gmail.com', '$2y$10$wuMyK7/jKcMefpSuVeeXKOJbKS5tIxvcxf3ZnCof/UWHXj8UXTt7S', ''),
(2, 'User', 'Test', 'usertest', 'usertest@gmail.com', '$2y$10$VU4lJm7RA6hys/dAxn/D3OTu0g4yAOc.zzgOdrfeTcJ.OOs.XXtWi', ''),
(3, 'Miriam', 'GonÃ§alves', 'mirygcv', 'mirygcv@gmail.com', '$2y$10$tG1GB7l872d0w6RdwJ4iuuBzpE7BiWWnlKlfu2JBr14H9qShQ1xSW', ''),
(4, 'User', 'Test', 'test', 'user@gmail.com', '$2y$10$F.X45UYOMUK2B8MmvJ9REO3sVvdtVn7A9Nv2UfTJ0xuU.y4CLHV.i', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `year_finished`
--

CREATE TABLE `year_finished` (
  `id` int(11) NOT NULL,
  `year_number` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `year_finished`
--

INSERT INTO `year_finished` (`id`, `year_number`) VALUES
(1, 2014),
(2, 2015),
(3, 2016),
(4, 2017),
(5, 2018),
(6, 2013),
(7, 2012),
(8, 2019);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_book`
--
ALTER TABLE `add_book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `month_finished`
--
ALTER TABLE `month_finished`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `year_finished`
--
ALTER TABLE `year_finished`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_book`
--
ALTER TABLE `add_book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;
--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `month_finished`
--
ALTER TABLE `month_finished`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `year_finished`
--
ALTER TABLE `year_finished`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
