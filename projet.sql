-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 21, 2022 at 01:58 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projet`
--

-- --------------------------------------------------------

--
-- Table structure for table `aimer`
--

CREATE TABLE `aimer` (
  `pseudo` varchar(20) NOT NULL,
  `Nom_genre` varchar(20) NOT NULL,
  `indice_appreciation` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `commenter`
--

CREATE TABLE `commenter` (
  `pseudo` varchar(20) NOT NULL,
  `IdFilm` int(11) NOT NULL,
  `Commentaire` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `etre`
--

CREATE TABLE `etre` (
  `IdFilm` int(11) NOT NULL,
  `Nom_genre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `etre`
--

INSERT INTO `etre` (`IdFilm`, `Nom_genre`) VALUES
(38700, 'Action'),
(102899, 'Action'),
(309886, 'Action'),
(338762, 'Action'),
(443791, 'Action'),
(454626, 'Action'),
(508439, 'Animation'),
(102899, 'Aventure'),
(508439, 'Aventure'),
(454626, 'Comédie'),
(508439, 'Comédie'),
(556678, 'Comédie'),
(38700, 'Crime'),
(475557, 'Crime'),
(309886, 'Drame'),
(419704, 'Drame'),
(475557, 'Drame'),
(619264, 'Drame'),
(454626, 'Familial'),
(508439, 'Familial'),
(508439, 'Fantastique'),
(443791, 'Horreur'),
(570670, 'Horreur'),
(556678, 'Romance'),
(102899, 'Science-Fiction'),
(338762, 'Science-Fiction'),
(419704, 'Science-Fiction'),
(443791, 'Science-Fiction'),
(454626, 'Science-Fiction'),
(570670, 'Science-Fiction'),
(619264, 'Science-Fiction'),
(38700, 'Thriller'),
(309886, 'Thriller'),
(443791, 'Thriller'),
(475557, 'Thriller'),
(570670, 'Thriller'),
(619264, 'Thriller');

-- --------------------------------------------------------

--
-- Table structure for table `etre_disponible`
--

CREATE TABLE `etre_disponible` (
  `IdFilm` int(11) NOT NULL,
  `Nom_plat` varchar(20) NOT NULL,
  `DateD` date DEFAULT NULL,
  `DateF` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `etre_disponible`
--

INSERT INTO `etre_disponible` (`IdFilm`, `Nom_plat`, `DateD`, `DateF`) VALUES
(102899, 'Disney Plus', NULL, NULL),
(338762, 'Amazon Prime Video', NULL, NULL),
(419704, 'Canal+', NULL, NULL),
(570670, 'Canal+', NULL, NULL),
(619264, 'Netflix', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `etre_inscrit`
--

CREATE TABLE `etre_inscrit` (
  `pseudo` varchar(20) NOT NULL,
  `Nom_plat` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `IdFilm` int(11) NOT NULL,
  `Titre` varchar(20) DEFAULT NULL,
  `Realisateur` varchar(20) DEFAULT NULL,
  `annee` date DEFAULT NULL,
  `Note_TMDB` float DEFAULT NULL,
  `Note_utilisateur` int(11) DEFAULT NULL,
  `Affiche` varchar(100) DEFAULT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`IdFilm`, `Titre`, `Realisateur`, `annee`, `Note_TMDB`, `Note_utilisateur`, `Affiche`, `description`) VALUES
(38700, 'Bad Boys for Life', NULL, '2020-01-15', 7.2, NULL, 'https://image.tmdb.org/t/p/w185//3N316jUSdhvPyYTW29G4v9ebbcS.jpg', 'Les Bad Boys Mike Lowrey et Marcus Burnett se retrouvent pour résoudre une ultime affaire.'),
(102899, 'Ant-Man', NULL, '2015-07-14', 7.1, NULL, 'https://image.tmdb.org/t/p/w185//a7sAqMKv5tkAdMzFfIhPqIBmQ9g.jpg', 'L\'histoire d\'Ant-Man est celle d\'un petit escroc du nom de Scott Lang. Doté d\'une capacité étonnante - celle de rétrécir à volonté tout en démultipliant sa force - ce dernier doit embrasser la part de héros qui est en lui afin d\'aider son mentor, le docteur Hank Pym, à protéger d\'une nouvelle génération de redoutables menaces le secret du spectaculaire costume d\'Ant-Man. Contre des obstacles en apparence insurmontables, Pym et Lang, doivent mettre au point - et réussir - un audacieux cambriolage qui pourrait sauver le monde d\'une issue fatale…'),
(309886, 'Blood Father', NULL, '2016-08-11', 6.2, NULL, 'https://image.tmdb.org/t/p/w185//hPZo3k9iDpAGajh7IDuyquThQd3.jpg', 'Victime d’un coup monté de son petit-copain trafiquant de drogue pour le vol d’une petite fortune à un cartel, Lydia, 17 ans, part en cavale, avec un seul allié en ce bas monde : son éternel paumé de père, John Link, ancien motard hors-la-loi et repris de justice, qui devra renouer avec un passé qu’il fuit afin de pouvoir la sauver...'),
(338762, 'Bloodshot', NULL, '2020-03-05', 6.8, NULL, 'https://image.tmdb.org/t/p/w185//lP5eKh8WOcPysfELrUpGhHJGZEH.jpg', 'Ray Garrison un soldat mort au combat ressuscité par l\'entrepreneur en armement Rising Spirit Technologies grâce à la nanotechnologie. Souffrant d\'une perte totale de mémoire mais désormais doté de toute une gamme de nouvelles capacités, Ray a du mal à renouer avec qui il était tout en apprenant quelle sorte d\'arme il est devenu... Aidé par une équipe de camarades combattants augmentés sous le nom de code Chainsaw.'),
(419704, 'Ad Astra', NULL, '2019-09-17', 6.1, NULL, 'https://image.tmdb.org/t/p/w185//elvVHhtKYFLoGGhfyKhhA0wQ4kc.jpg', 'L’astronaute Roy McBride s’aventure jusqu’aux confins du système solaire à la recherche de son père disparu et pour résoudre un mystère qui menace la survie de notre planète. Lors de son voyage, il sera confronté à des révélations mettant en cause la nature même de l’existence humaine, et notre place dans l’univers.'),
(443791, 'Underwater', NULL, '2020-01-08', 6.3, NULL, 'https://image.tmdb.org/t/p/w185//ww7eC3BqSbFsyE5H5qMde8WkxJ2.jpg', 'Une équipe scientifique sous-marine fait face à un tremblement de terre. Sous l\'eau, ils vont devoir essayer de survivre.'),
(454626, 'Sonic the Hedgehog', NULL, '2020-02-12', 7.4, NULL, 'https://image.tmdb.org/t/p/w185//stmYfCUGd8Iy6kAMBr6AmWqx8Bq.jpg', 'L\'histoire du hérisson bleu le plus rapide du monde qui arrive sur Terre, sa nouvelle maison. Sonic et son nouveau meilleur ami Tom font équipe pour sauver la planète du diabolique Dr. Robotnik, bien déterminé à régner sur le monde entier.'),
(475557, 'Joker', NULL, '2019-10-02', 8.2, NULL, 'https://image.tmdb.org/t/p/w185//n6bUvigpRFqSwmPp1m2YADdbRBc.jpg', 'Dans les années 1980, à Gotham City, Arthur Fleck, un humoriste de stand‐up raté, bascule dans la folie et devient le Joker.'),
(508439, 'Onward', NULL, '2020-02-29', 7.8, NULL, 'https://image.tmdb.org/t/p/w185//xFxk4vnirOtUxpOEWgA1MCRfy6J.jpg', 'Dans la banlieue d’un univers imaginaire, deux frères elfes se lancent dans une quête extraordinaire pour découvrir s’il reste encore un peu de magie dans le monde.'),
(556678, 'Emma.', NULL, '2020-02-13', 7.1, NULL, 'https://image.tmdb.org/t/p/w185//5GbkL9DDRzq3A21nR7Gkv6cFGjq.jpg', 'Adaptation du roman éponyme de Jane Austen sorti en 1815.  Emma Woodhouse tente de faire rencontrer leur âme sœur aux célibataires de son cercle d\'amis .'),
(570670, 'The Invisible Man', NULL, '2020-02-26', 7.2, NULL, 'https://image.tmdb.org/t/p/w185//tweDJNQzBGgsWVF5MC8JhSAk07p.jpg', 'Cecilia Kass est en couple avec un brillant et riche scientifique. Ne supportant plus son comportement violent et tyrannique, elle prend la fuite une nuit et se réfugie auprès de sa sœur, leur ami d\'enfance et sa fille adolescente. Mais quand l\'homme se suicide en laissant à Cecilia une part importante de son immense fortune, celle-ci commence à se demander s\'il est réellement mort. Tandis qu\'une série de coïncidences inquiétantes menace la vie des êtres qu\'elle aime, Cecilia cherche désespérément à prouver qu\'elle est traquée par un homme que nul ne peut voir. Peu à peu, elle a le sentiment que sa raison vacille…'),
(619264, 'El hoyo', NULL, '2019-11-08', 7, NULL, 'https://image.tmdb.org/t/p/w185//3tkDMNfM2YuIAJlvGO6rfIzAnfG.jpg', 'Dans une prison où les détenus du haut mangent mieux que ceux du bas qui se contentent des restes, un homme essaie de changer la règle pour que chacun mange à sa faim.');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `Nom_genre` varchar(20) NOT NULL,
  `id_genre` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`Nom_genre`, `id_genre`) VALUES
('Action', 28),
('Animation', 16),
('Aventure', 12),
('Comédie', 35),
('Crime', 80),
('Documentaire', 99),
('Drame', 18),
('Familial', 10751),
('Fantastique', 14),
('Guerre', 10752),
('Histoire', 36),
('Horreur', 27),
('Musique', 10402),
('Mystère', 9648),
('Romance', 10749),
('Science-Fiction', 878),
('Téléfilm', 10770),
('Thriller', 53),
('Western', 37);

-- --------------------------------------------------------

--
-- Table structure for table `noter`
--

CREATE TABLE `noter` (
  `IdFilm` int(11) NOT NULL,
  `pseudo` varchar(20) NOT NULL,
  `Note` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `plateforme`
--

CREATE TABLE `plateforme` (
  `Nom_plat` varchar(20) NOT NULL,
  `Prix` float DEFAULT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `id_plat` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `plateforme`
--

INSERT INTO `plateforme` (`Nom_plat`, `Prix`, `logo`, `id_plat`) VALUES
('7plus', NULL, 'https://image.tmdb.org/t/p/w185/dSAEkpy0IhZpTLixrMq9z24oEPC.jpg', 246),
('ABC', NULL, 'https://image.tmdb.org/t/p/w185/l9BRdAgQ3MkooOalsuu3yFQv2XP.jpg', 148),
('ABC iview', NULL, 'https://image.tmdb.org/t/p/w185/vFjk9B5bZ1ranNLnjE6Z4RY3VxM.jpg', 135),
('Acorn TV', NULL, 'https://image.tmdb.org/t/p/w185/5P99DkK1jVs95KcE8bYG9MBtGQ.jpg', 87),
('aha', NULL, 'https://image.tmdb.org/t/p/w185/m3NWxxR23l1w1e156fyTuw931gx.jpg', 532),
('Alamo on Demand', NULL, 'https://image.tmdb.org/t/p/w185/1UP7ysjKolfD0rmp2fLmvyRHkdn.jpg', 547),
('All 4', NULL, 'https://image.tmdb.org/t/p/w185/kJ9GcmYk5zJ9nJtVX8XjDo9geIM.jpg', 103),
('Alleskino', NULL, 'https://image.tmdb.org/t/p/w185/cDwMvtLqnReORuXJAOKUCTcyc5f.jpg', 33),
('Alt Balaji', NULL, 'https://image.tmdb.org/t/p/w185/xiqTOBxOnlMy1nvppZcFhCDsP0f.jpg', 319),
('Amazon Prime Video', NULL, 'https://image.tmdb.org/t/p/w185/emthp39XA2YScoYL1p0sdbAH2WA.jpg', 119),
('Amazon Video', NULL, 'https://image.tmdb.org/t/p/w185/5NyLm42TmCqCMOZFvH4fcoSNKEW.jpg', 10),
('AMC on Demand', NULL, 'https://image.tmdb.org/t/p/w185/kJlVJLgbNPvKDYC0YMp3yA2OKq2.jpg', 352),
('AMC Plus', NULL, 'https://image.tmdb.org/t/p/w185/9edKQczyuMmQM1yS520hgmJbcaC.jpg', 528),
('Amediateka', NULL, 'https://image.tmdb.org/t/p/w185/nlgoXBQCMSnGZrhAnyIZ7vSQ3vs.jpg', 116),
('Apple iTunes', NULL, 'https://image.tmdb.org/t/p/w185/peURlLlr8jggOwK53fJ5wdQl05y.jpg', 2),
('Apple TV Plus', NULL, 'https://image.tmdb.org/t/p/w185/6uhKBfmtzFqOcLousHwZuzcrScK.jpg', 350),
('Argo', NULL, 'https://image.tmdb.org/t/p/w185/tgKw3lckZULebs3cMLAbMRqir7G.jpg', 534),
('ARROW', NULL, 'https://image.tmdb.org/t/p/w185/4UfmxLzph9Aso9pr9bXohp0V3sr.jpg', 529),
('Arte', NULL, 'https://image.tmdb.org/t/p/w185/8T2jS3TdKCAsCrH0Kvl2NCwQ0ym.jpg', 234),
('ArthouseCNMA', NULL, 'https://image.tmdb.org/t/p/w185/xtfU2pO6YjnU0qrPaDi30IjaQGR.jpg', 481),
('AsianCrush', NULL, 'https://image.tmdb.org/t/p/w185/3VxDqUk25KU5860XxHKwV9cy3L8.jpg', 514),
('Atres Player', NULL, 'https://image.tmdb.org/t/p/w185/9dielJNGTSKO7Lp6NKAuNOLw2jP.jpg', 62),
('BBC America', NULL, 'https://image.tmdb.org/t/p/w185/ukSXbR5qFjO2qCHpc6ZhcGPSjTJ.jpg', 397),
('BBC iPlayer', NULL, 'https://image.tmdb.org/t/p/w185/zY5SmHyAy1CoA3AfQpf58QnShnw.jpg', 38),
('Bbox VOD', NULL, 'https://image.tmdb.org/t/p/w185/ulTa4e9ysKwMwNpg7EfhYnvAj8q.jpg', 59),
('Be TV Go', NULL, 'https://image.tmdb.org/t/p/w185/pq8p1umEnJjdFAP1nFvNArTR61X.jpg', 311),
('Beamafilm', NULL, 'https://image.tmdb.org/t/p/w185/66vV4PIX6aiDvmprUYli7vnBEEA.jpg', 448),
('Believe', NULL, 'https://image.tmdb.org/t/p/w185/dFnG5G2YxrYjv9YiVu9Bq7Wj5Ds.jpg', 465),
('Bet+ Amazon Channel', NULL, 'https://image.tmdb.org/t/p/w185/obBJU4ak4XvAOUM5iVmSUxDvqC3.jpg', 343),
('BFI Player', NULL, 'https://image.tmdb.org/t/p/w185/32Pe7XfsubjbmvnZveBH5HfBQOm.jpg', 224),
('BINGE', NULL, 'https://image.tmdb.org/t/p/w185/d3ixI1no0EpTj2i7u0Sd2DBXVlG.jpg', 385),
('Bioskop Online', NULL, 'https://image.tmdb.org/t/p/w185/9KiRtQNFyMaYau9bLHZgqlnUTCA.jpg', 466),
('Blim', NULL, 'https://image.tmdb.org/t/p/w185/egNBibGpNroklenRFE0EiRYZqaf.jpg', 67),
('Blockbuster', NULL, 'https://image.tmdb.org/t/p/w185/3QsJbibv5dFW2IYuXbTjxDmGGRZ.jpg', 423),
('blutv', NULL, 'https://image.tmdb.org/t/p/w185/z3XAGCCbDD3KTZFvc96Ytr3XR56.jpg', 341),
('Bookmyshow', NULL, 'https://image.tmdb.org/t/p/w185/uOooYc5OsAq68QcrCZnRhY1rrXo.jpg', 124),
('Boomerang', NULL, 'https://image.tmdb.org/t/p/w185/oRXiHzPl2HJMXXFR4eebsb8F5Oc.jpg', 248),
('BoxOffice', NULL, 'https://image.tmdb.org/t/p/w185/6MG0j8Z5d67Y06J7PZC8l7z58DX.jpg', 54),
('Bravo TV', NULL, 'https://image.tmdb.org/t/p/w185/cezAIHmsUVvgAahfCR7J0z30y1N.jpg', 365),
('BritBox', NULL, 'https://image.tmdb.org/t/p/w185/aGIS8maihUm60A3moKYD9gfYHYT.jpg', 151),
('BroadwayHD', NULL, 'https://image.tmdb.org/t/p/w185/xLu1rkZNOKuNnRNr70wySosfTBf.jpg', 554),
('C More', NULL, 'https://image.tmdb.org/t/p/w185/pCIkSBek0aZfPQzOn9gfazuYaLV.jpg', 77),
('Canal VOD', NULL, 'https://image.tmdb.org/t/p/w185/knpqBvBQjyHnFrYPJ9bbtUCv6uo.jpg', 58),
('Canal+', NULL, 'https://image.tmdb.org/t/p/w185/hGvUo8KZTRLDZWcfFJS3gA8aenB.jpg', 381),
('Catchplay', NULL, 'https://image.tmdb.org/t/p/w185/45eTLxznKGY9xq50NBWjN4adVng.jpg', 159),
('CBC Gem', NULL, 'https://image.tmdb.org/t/p/w185/nVly1ywNU2hMYLaieL6ixhEFTWh.jpg', 314),
('CBS', NULL, 'https://image.tmdb.org/t/p/w185/2BPU00vSfCZ4XI2CnQCBv8rZk2f.jpg', 78),
('Chai Flicks', NULL, 'https://image.tmdb.org/t/p/w185/3tCqvc5hPm5nl8Hm8o2koDRZlPo.jpg', 438),
('Chili', NULL, 'https://image.tmdb.org/t/p/w185/mT9kIe6JVz72ikWJ58x0q8ckUW3.jpg', 40),
('CINE', NULL, 'https://image.tmdb.org/t/p/w185/9nyK6XeCSe1fmK9B9H2xHgOYDlj.jpg', 491),
('Cineasterna', NULL, 'https://image.tmdb.org/t/p/w185/thucdaw2gnOE0g478AHVZw5UeYm.jpg', 496),
('Cinemas a la Demande', NULL, 'https://image.tmdb.org/t/p/w185/3BxFGDZ1q8CxbUv5tSvMT28AC0X.jpg', 324),
('CineMember', NULL, 'https://image.tmdb.org/t/p/w185/hRqG400ljOAbbQkoos4W4gq2uPN.jpg', 639),
('Cineplex', NULL, 'https://image.tmdb.org/t/p/w185/sN8B7EweqmOmWm5ALdOAxCquuv1.jpg', 140),
('Cinépolis KLIC', NULL, 'https://image.tmdb.org/t/p/w185/qJxuBkjkXWYmuTKk7hxvbmqvrNc.jpg', 558),
('Cinessance', NULL, 'https://image.tmdb.org/t/p/w185/7EKsM2afDq6P0yUmTHDKQj3wHkQ.jpg', 694),
('Claro video', NULL, 'https://image.tmdb.org/t/p/w185/lJT7r1nprk1Z8t1ywiIa8h9d3rc.jpg', 167),
('Classix', NULL, 'https://image.tmdb.org/t/p/w185/iaMw6nOyxUzXSacrLQ0Au6CfZkc.jpg', 445),
('Club Illico', NULL, 'https://image.tmdb.org/t/p/w185/6FWwq6rayak6g6rvzVVP1NnX9gf.jpg', 469),
('Comhem Play', NULL, 'https://image.tmdb.org/t/p/w185/vuAxCPW4tlZ7Dg9EshAdPoHZFBo.jpg', 497),
('CONTAR', NULL, 'https://image.tmdb.org/t/p/w185/xKUlNQjy7dpfI8Nj8BjgSTdYnqH.jpg', 543),
('CONtv', NULL, 'https://image.tmdb.org/t/p/w185/m6p38R4AlEo1ub7QnZtirXDIUF5.jpg', 428),
('Crackle', NULL, 'https://image.tmdb.org/t/p/w185/7P2JHkfv4AmU2MgSPGaJ0z6nNLG.jpg', 12),
('Crave', NULL, 'https://image.tmdb.org/t/p/w185/gJ3yVMWouaVj6iHd59TISJ1TlM5.jpg', 230),
('Crave Plus', NULL, 'https://image.tmdb.org/t/p/w185/nd6eVbg8i5h4w4ntxi1EjlpYQzV.jpg', 231),
('Crave Starz', NULL, 'https://image.tmdb.org/t/p/w185/sB5vHrmYmliwUvBwZe8HpXo9r8m.jpg', 305),
('Criterion Channel', NULL, 'https://image.tmdb.org/t/p/w185/4TJTNWd2TT1kYj6ocUEsQc8WRgr.jpg', 258),
('Crunchyroll', NULL, 'https://image.tmdb.org/t/p/w185/8Gt1iClBlzTeQs8WQm8UrCoIxnQ.jpg', 283),
('CTV', NULL, 'https://image.tmdb.org/t/p/w185/hNO6rEpZ9l2LQEkjacrpeoocKbX.jpg', 326),
('Cultpix', NULL, 'https://image.tmdb.org/t/p/w185/59azlQKUgFdYq6QI5QEAxIeecyL.jpg', 692),
('Curia', NULL, 'https://image.tmdb.org/t/p/w185/5FuVJSVSy60JQ58m6fmTyOsiJSC.jpg', 617),
('Curiosity Stream', NULL, 'https://image.tmdb.org/t/p/w185/67Ee4E6qOkQGHeUTArdJ1qRxzR2.jpg', 190),
('Curzon Home Cinema', NULL, 'https://image.tmdb.org/t/p/w185/ugFkAFzcZm6I1ftFumwAmhtFaVO.jpg', 189),
('Dansk Filmskat', NULL, 'https://image.tmdb.org/t/p/w185/cInE5cdEs1yOKVbNaqlGbeZeAnN.jpg', 621),
('Darkmatter TV', NULL, 'https://image.tmdb.org/t/p/w185/x4AFz5koB2R8BRn8WNh6EqXUGHc.jpg', 355),
('Das Erste Mediathek', NULL, 'https://image.tmdb.org/t/p/w185/lDaVaiNwOU8JHCcZ6fANzugVvtT.jpg', 219),
('Dekkoo', NULL, 'https://image.tmdb.org/t/p/w185/u2H29LCxRzjZVUoZUQAHKm5P8Zc.jpg', 444),
('DIRECTV', NULL, 'https://image.tmdb.org/t/p/w185/xL9SUR63qrEjFZAhtsipskeAMR7.jpg', 358),
('DIRECTV GO', NULL, 'https://image.tmdb.org/t/p/w185/kV8XFGI5OLJKl72dI8DtnKplfFr.jpg', 467),
('Discovery Plus', NULL, 'https://image.tmdb.org/t/p/w185/wYRiUqIgWcfUvO6OPcXuUNd4tc2.jpg', 510),
('Disney Plus', NULL, 'https://image.tmdb.org/t/p/w185/7rwgEs15tFwyR9NPQ5vpzxTj19Q.jpg', 337),
('DocAlliance Films', NULL, 'https://image.tmdb.org/t/p/w185/aQ1ritN00jXc7RAFfUoQKGAAfp7.jpg', 569),
('DocPlay', NULL, 'https://image.tmdb.org/t/p/w185/jNdDSUCyzk2wOwct9vXAaoX4Ypx.jpg', 357),
('DOCSVILLE', NULL, 'https://image.tmdb.org/t/p/w185/bvcdVO7SDHKEa6D40g1jntXKNj.jpg', 475),
('Dogwoof On Demand', NULL, 'https://image.tmdb.org/t/p/w185/9sk88OAxDZSdMOzg8VuqtGpgWQ3.jpg', 536),
('Dove Channel', NULL, 'https://image.tmdb.org/t/p/w185/cBCzPOX6ir5L8hCoJlfIWycxauh.jpg', 254),
('Draken Films', NULL, 'https://image.tmdb.org/t/p/w185/1EVaN5FaXnheqQSVB5kn4zDJKZa.jpg', 435),
('DRTV', NULL, 'https://image.tmdb.org/t/p/w185/dpqap8iY6bsSqQf4xrkAG2j43gS.jpg', 620),
('dTV', NULL, 'https://image.tmdb.org/t/p/w185/g8jqHtXJsMlc8B1Gb0Rt8AvUJMn.jpg', 85),
('Edisonline', NULL, 'https://image.tmdb.org/t/p/w185/3OYkWKdWFgmRNiAp2kPgRN9wWd3.jpg', 628),
('Elisa Viihde', NULL, 'https://image.tmdb.org/t/p/w185/ihE8Z4jZcGsmQsGRj6q06oxD2Wd.jpg', 540),
('EPIC ON', NULL, 'https://image.tmdb.org/t/p/w185/q03pok7xSxYJaENuYs547qa6upY.jpg', 476),
('Epix', NULL, 'https://image.tmdb.org/t/p/w185/c7nw5oRfx5iZfyX0QmtOK0pbVaJ.jpg', 34),
('EPIX Amazon Channel', NULL, 'https://image.tmdb.org/t/p/w185/tfI7CcurXCS2CZnLLHrBWS8CGHk.jpg', 583),
('Eros Now', NULL, 'https://image.tmdb.org/t/p/w185/4XYI2rzRm34skcvamytegQx7Dmu.jpg', 218),
('Eventive', NULL, 'https://image.tmdb.org/t/p/w185/fadQYOyKL0tqfyj012nYJxm3N2I.jpg', 677),
('Fandor', NULL, 'https://image.tmdb.org/t/p/w185/eAhAUvV2ouai3cGti5y70YOtrBN.jpg', 25),
('Fetch TV', NULL, 'https://image.tmdb.org/t/p/w185/bKy2YjC0QxViRnd8ayd2pv2ugJZ.jpg', 436),
('Film Movement Plus', NULL, 'https://image.tmdb.org/t/p/w185/tKJdVrC0fjEtQtYYjlVwX9rmqrj.jpg', 579),
('Film1', NULL, 'https://image.tmdb.org/t/p/w185/5kffg7iSNcJKyQdi9TEn463cK3T.jpg', 396),
('Filme Filme', NULL, 'https://image.tmdb.org/t/p/w185/qEFO4pJhL6IyHbKUqaefsOA0kWJ.jpg', 566),
('filmfriend', NULL, 'https://image.tmdb.org/t/p/w185/q6hCkmhpK5cDUURb4i6yWXNfpZz.jpg', 542),
('Filmin', NULL, 'https://image.tmdb.org/t/p/w185/gqdajHmtr6qtutL7kkmEgleGfV9.jpg', 63),
('Filmin Latino', NULL, 'https://image.tmdb.org/t/p/w185/xVsZYrrmmqFJh3MkH98aFjMHnSf.jpg', 66),
('Filmin Plus', NULL, 'https://image.tmdb.org/t/p/w185/4k49M5oMFewREZLfCw6jNAn0dOo.jpg', 64),
('Filmo TV', NULL, 'https://image.tmdb.org/t/p/w185/b6hJjWPa7h8VCpaCVJCSu8EPlqT.jpg', 138),
('Filmoteket', NULL, 'https://image.tmdb.org/t/p/w185/aTUaeAdFmNfjcm7FRWaM49Ds7Gj.jpg', 560),
('FILMRISE', NULL, 'https://image.tmdb.org/t/p/w185/mEiBVz62M9j3TCebmOspMfqkIn.jpg', 471),
('Filmstriben', NULL, 'https://image.tmdb.org/t/p/w185/vqybB1exnaQ3UOlKaw4t6OgzFIu.jpg', 443),
('Filmtastic', NULL, 'https://image.tmdb.org/t/p/w185/u04LR9vGEhc8B1ml4HSj1RCbqTG.jpg', 480),
('Filmzie', NULL, 'https://image.tmdb.org/t/p/w185/n36jEZ4u0At0lcf9PYa1TaRCGL.jpg', 559),
('Flimmit', NULL, 'https://image.tmdb.org/t/p/w185/ubIndtI8qN9sE7iXdpYO41ktW4v.jpg', 142),
('Flix Premiere', NULL, 'https://image.tmdb.org/t/p/w185/6fX0J6x7zXsUCvPFczgOW4oD34D.jpg', 432),
('FlixFling', NULL, 'https://image.tmdb.org/t/p/w185/4U02VrbgLfUKJAUCHKzxWFtnPx4.jpg', 331),
('FlixOlé', NULL, 'https://image.tmdb.org/t/p/w185/yPrp83KcLzh0Qh0mkdRWawyihjU.jpg', 393),
('Fox Play', NULL, 'https://image.tmdb.org/t/p/w185/1kutxWeOEhPDFfBxN6vp3VImBJq.jpg', 229),
('Fox Premium', NULL, 'https://image.tmdb.org/t/p/w185/btEgsm3x8HcapI6pmx2YSaPnl11.jpg', 228),
('Foxtel Now', NULL, 'https://image.tmdb.org/t/p/w185/tRbUL8V91FdvIUuTYpdHFscyHVM.jpg', 134),
('Freeform', NULL, 'https://image.tmdb.org/t/p/w185/rgpmwMkXqFYch9cway9qWMw0uXu.jpg', 211),
('fuboTV', NULL, 'https://image.tmdb.org/t/p/w185/jPXksae158ukMLFhhlNvzsvaEyt.jpg', 257),
('Funimation Now', NULL, 'https://image.tmdb.org/t/p/w185/o252SN51PdMx8UvyUkX00MAtooX.jpg', 269),
('FXNow', NULL, 'https://image.tmdb.org/t/p/w185/twV9iQPYeaoBzwsfRFGMGoMIUg8.jpg', 123),
('genflix', NULL, 'https://image.tmdb.org/t/p/w185/9xKAZFyhkZVewWxJJhR41AJO0D3.jpg', 468),
('Global TV', NULL, 'https://image.tmdb.org/t/p/w185/awgDmkHSfGEcoIVpeQKwaE2OgLM.jpg', 449),
('Globo Play', NULL, 'https://image.tmdb.org/t/p/w185/9heT8tYWAXAeF0spSrCmfZ3m8M.jpg', 307),
('Go3', NULL, 'https://image.tmdb.org/t/p/w185/jgD3gxzW39UhJ7wZsxst75bN8Ck.jpg', 373),
('Google Play Movies', NULL, 'https://image.tmdb.org/t/p/w185/tbEdFQDwx5LEVr8WpSeXQSIirVq.jpg', 3),
('GOSPEL PLAY', NULL, 'https://image.tmdb.org/t/p/w185/plbVK1EXpz7PpyddpI0U1cZIYYK.jpg', 477),
('GuideDoc', NULL, 'https://image.tmdb.org/t/p/w185/iX0pvJ2GFATbVIH5IHMwG0ffIdV.jpg', 100),
('GYAO', NULL, 'https://image.tmdb.org/t/p/w185/zES0qHTB5ZU1Cb3NYwZ56mgZ3Bc.jpg', 86),
('Hallmark Movies', NULL, 'https://image.tmdb.org/t/p/w185/llEJ6av9kAniTQUR9hF9mhVbzlB.jpg', 281),
('HBO', NULL, 'https://image.tmdb.org/t/p/w185/fWqVPYArdFwBc6vYqoyQB6XUl85.jpg', 118),
('HBO Go', NULL, 'https://image.tmdb.org/t/p/w185/zaKgoMUFQe1osHxZqyO4OWJnZiA.jpg', 280),
('HBO Max', NULL, 'https://image.tmdb.org/t/p/w185/rrta9psrx3e7F9wLUfpANdJzudx.jpg', 384),
('HBO Max Free', NULL, 'https://image.tmdb.org/t/p/w185/rIvQ4zuxvVirsNNVarYmOTunBD2.jpg', 616),
('HBO Now', NULL, 'https://image.tmdb.org/t/p/w185/3LQzaSBH1kjQB9oKc4n72dKj8oY.jpg', 27),
('HBO Poland', NULL, 'https://image.tmdb.org/t/p/w185/v8vA6WnPVTOE1o39waNFVmAqEJj.jpg', 244),
('HBO Portugal', NULL, 'https://image.tmdb.org/t/p/w185/zaKgoMUFQe1osHxZqyO4OWJnZiA.jpg', 271),
('Here TV', NULL, 'https://image.tmdb.org/t/p/w185/sa10pK4Jwr5aA7rvafFP2zyLFjh.jpg', 417),
('Hi-YAH', NULL, 'https://image.tmdb.org/t/p/w185/mB2eDIncwSAlyl8WAtfV24qEIkk.jpg', 503),
('HiDive', NULL, 'https://image.tmdb.org/t/p/w185/9baY98ZKyDaNArp1H9fAWqiR3Zi.jpg', 430),
('History Play', NULL, 'https://image.tmdb.org/t/p/w185/73ms51HSpkD0OOXwj2EeiZeSqSt.jpg', 478),
('History Vault', NULL, 'https://image.tmdb.org/t/p/w185/3bm7P1O8WRqK6CYqfffJv4fba2p.jpg', 268),
('Hoichoi', NULL, 'https://image.tmdb.org/t/p/w185/d4vHcXY9rwnr763wQns2XJThclt.jpg', 315),
('Hollystar', NULL, 'https://image.tmdb.org/t/p/w185/jmyYN1124dDIzqMysLekixy3AzF.jpg', 164),
('Hollywood Suite', NULL, 'https://image.tmdb.org/t/p/w185/8jzbtiXz0eZ6aPjxdmGW3ceqjon.jpg', 182),
('Home of Horror', NULL, 'https://image.tmdb.org/t/p/w185/3xIBSZdL2pZCJR2saHwDPhKW2aZ.jpg', 479),
('Hoopla', NULL, 'https://image.tmdb.org/t/p/w185/aJ0b9BLU1Cvv5hIz9fEhKKc1x1D.jpg', 212),
('Horizon', NULL, 'https://image.tmdb.org/t/p/w185/l5Wxbsgral716BOtZsGyPVNn8GC.jpg', 250),
('Horrify', NULL, 'https://image.tmdb.org/t/p/w185/h5R7lrSpyuejhjqd1L1a9uCSIB4.jpg', 460),
('Hotstar', NULL, 'https://image.tmdb.org/t/p/w185/7Fl8ylPDclt3ZYgNbW2t7rbZE9I.jpg', 122),
('Hotstar Disney+', NULL, 'https://image.tmdb.org/t/p/w185/dpm29atq9clfBL38NgGxsj2CCe3.jpg', 377),
('HRTi', NULL, 'https://image.tmdb.org/t/p/w185/h9vCGR4GF42HjXNvGQoBcuiZAvG.jpg', 631),
('Hulu', NULL, 'https://image.tmdb.org/t/p/w185/zxrVdFjIjLqkfnwyghnfywTn3Lh.jpg', 15),
('Hungama Play', NULL, 'https://image.tmdb.org/t/p/w185/4QEQsvCBnORNIg9EDnrRSiEw61D.jpg', 437),
('iciTouTV', NULL, 'https://image.tmdb.org/t/p/w185/366UvWIQMqvKI6SyinCmvQx2B2j.jpg', 146),
('IFC Amazon Channel', NULL, 'https://image.tmdb.org/t/p/w185/kvn50K9EIdwJhpLwnFFE1D2rOIZ.jpg', 587),
('IFFR Unleashed', NULL, 'https://image.tmdb.org/t/p/w185/60PpYTEeU4F1r5ndl1VbdYq5r7F.jpg', 548),
('iflix', NULL, 'https://image.tmdb.org/t/p/w185/fyZObCfyY6mNVZOaBqgm7UMlHt.jpg', 160),
('ILLICO', NULL, 'https://image.tmdb.org/t/p/w185/pGk6V35szQnJVq2OoJLnRpjifb3.jpg', 492),
('IndieFlix', NULL, 'https://image.tmdb.org/t/p/w185/2NRn6OApVKfDTKLuHDRN8UadLRw.jpg', 368),
('Infinity', NULL, 'https://image.tmdb.org/t/p/w185/7khYVzFljIj9FpXIP7AEvxC8Nk6.jpg', 110),
('IPLA', NULL, 'https://image.tmdb.org/t/p/w185/bZNXgd8fwVTD68aAGlElkpAtu7b.jpg', 549),
('iQIYI', NULL, 'https://image.tmdb.org/t/p/w185/8MXYXzZGoPAEQU13GWk1GVvKNUS.jpg', 581),
('ITV Hub', NULL, 'https://image.tmdb.org/t/p/w185/wrg4g92EvgzMOcnh1pWbUbnPdGA.jpg', 41),
('Ivi', NULL, 'https://image.tmdb.org/t/p/w185/o9ExgOSLF3OTwR6T3DJOuwOKJgq.jpg', 113),
('iWantTFC', NULL, 'https://image.tmdb.org/t/p/w185/zEuYa2328KQlbpOr4W0tVNpCGtZ.jpg', 511),
('Jio Cinema', NULL, 'https://image.tmdb.org/t/p/w185/jRpQbuHbGR0MzSIBxJjxZxpXhqC.jpg', 220),
('Joyn', NULL, 'https://image.tmdb.org/t/p/w185/kTpJjBn08IBluCPpFQekU9qdwRt.jpg', 304),
('Joyn Plus', NULL, 'https://image.tmdb.org/t/p/w185/2joD3S2goOB6lmepX35A8dmaqgM.jpg', 421),
('Kanopy', NULL, 'https://image.tmdb.org/t/p/w185/wbCleYwRFpUtWcNi7BLP3E1f6VI.jpg', 191),
('Kino Now', NULL, 'https://image.tmdb.org/t/p/w185/ttxbDVmHMuNTKcSLOyIHFs7TdRh.jpg', 640),
('Kino on Demand', NULL, 'https://image.tmdb.org/t/p/w185/sXixZNwjBjMoBR97alHOKVerKf4.jpg', 349),
('Kinopoisk', NULL, 'https://image.tmdb.org/t/p/w185/1KAux0lBEHpLnQcvaf1Qf1uKcIP.jpg', 117),
('KinoPop', NULL, 'https://image.tmdb.org/t/p/w185/gzHzhgt6cVSn4yy6UnJvLGbOSwL.jpg', 573),
('Kirjastokino', NULL, 'https://image.tmdb.org/t/p/w185/mMb0rksAc7Cmom5pEYaLNDkbitE.jpg', 463),
('Kividoo', NULL, 'https://image.tmdb.org/t/p/w185/gGTgmDv9fa8uSd2sEybDOzfYfHK.jpg', 89),
('KKTV', NULL, 'https://image.tmdb.org/t/p/w185/iGDZ6zPbVcngc0BQEsZX13Z7I07.jpg', 624),
('Klik Film', NULL, 'https://image.tmdb.org/t/p/w185/96JqcynVUOkkIfpyffjczff5NZb.jpg', 576),
('Knowledge Network', NULL, 'https://image.tmdb.org/t/p/w185/iPK2kpaKnGYvSdEcRerIbkqWVPh.jpg', 525),
('KoreaOnDemand', NULL, 'https://image.tmdb.org/t/p/w185/uHv6Y4YSsr4cj7q4cBbAg7WXKEI.jpg', 575),
('KPN', NULL, 'https://image.tmdb.org/t/p/w185/bVClgB5bpaTRM3sVPlboaxkFD0U.jpg', 563),
('La Cinetek', NULL, 'https://image.tmdb.org/t/p/w185/s90cXW0NE709rLYRQ8YzMYjMmU3.jpg', 310),
('La Toile', NULL, 'https://image.tmdb.org/t/p/w185/l0SGkSW80SFWshxT2tvafv9dzkp.jpg', 518),
('Laugh Out Loud', NULL, 'https://image.tmdb.org/t/p/w185/w4GTJ1EDrgJku49XKSnRag9kKCT.jpg', 275),
('Libreflix', NULL, 'https://image.tmdb.org/t/p/w185/n3BIqc0mojP85bJSKjsIwZUOVya.jpg', 544),
('Lifetime', NULL, 'https://image.tmdb.org/t/p/w185/3wJNOOCbvqi7fJAdgf1QpL7Wwe2.jpg', 157),
('Lifetime Movie Club', NULL, 'https://image.tmdb.org/t/p/w185/p1v0UKH13xQsMjumRgCGmCdlgKm.jpg', 284),
('LINE TV', NULL, 'https://image.tmdb.org/t/p/w185/wLZCjEAlCKjEkQQM75bITfqL7D0.jpg', 625),
('Lionsgate Play', NULL, 'https://image.tmdb.org/t/p/w185/vrFpju3t7kplDbFsN5GLJpG0obj.jpg', 561),
('Looke', NULL, 'https://image.tmdb.org/t/p/w185/mPDlxHokGsEc84OOhp9qjeynq2U.jpg', 47),
('Looke Amazon Channel', NULL, 'https://image.tmdb.org/t/p/w185/3gTVbIj15Amgz5Qqg5dPDpgMW9V.jpg', 683),
('Magellan TV', NULL, 'https://image.tmdb.org/t/p/w185/gekkP93StjYdiMAInViVmrnldNY.jpg', 551),
('MagentaTV', NULL, 'https://image.tmdb.org/t/p/w185/uULoezj2skPc6amfwru72UPjYXV.jpg', 178),
('Magnolia Selects', NULL, 'https://image.tmdb.org/t/p/w185/foT1TtL67MgEOWR6Cib8dKyCvJI.jpg', 259),
('ManoramaMax', NULL, 'https://image.tmdb.org/t/p/w185/iRv3wbUEPuwYYPSKwUxPaMPKGM4.jpg', 482),
('Max Go', NULL, 'https://image.tmdb.org/t/p/w185/AhaVozbDe3SPHXTKyd6Crdt720S.jpg', 139),
('MAX Stream', NULL, 'https://image.tmdb.org/t/p/w185/eDFIGvn1PImm9kmZ83ugaqdWapy.jpg', 483),
('Maxdome', NULL, 'https://image.tmdb.org/t/p/w185/o9Otw88CN6EnlS1eVhGqzzPV39s.jpg', 6),
('maxdome Store', NULL, 'https://image.tmdb.org/t/p/w185/rwHChSCeRMsbs5vJ3QySNpvm9Ym.jpg', 20),
('Mediaset Play', NULL, 'https://image.tmdb.org/t/p/w185/j9iLCZMMgXP3jaYPkxCicx5Zmx3.jpg', 359),
('Meo', NULL, 'https://image.tmdb.org/t/p/w185/dUeHhim2WUZz8S7EWjv0Ws6anRP.jpg', 242),
('Metrograph', NULL, 'https://image.tmdb.org/t/p/w185/8PmpsrVDLJ3m8I37W6UNFEymhm7.jpg', 585),
('MGM Amazon Channel', NULL, 'https://image.tmdb.org/t/p/w185/fUUgfrOfvvPKx9vhFBd6IMdkfLy.jpg', 588),
('Microsoft Store', NULL, 'https://image.tmdb.org/t/p/w185/shq88b09gTBYC4hA7K7MUL8Q4zP.jpg', 68),
('Mitele ', NULL, 'https://image.tmdb.org/t/p/w185/47iDHK3CykgXuZ20FN6QRAEcFBY.jpg', 456),
('More TV', NULL, 'https://image.tmdb.org/t/p/w185/Aduyz3yAGMXTmd2N6NiIOYCmWF3.jpg', 557),
('MovieSaints', NULL, 'https://image.tmdb.org/t/p/w185/fdWE8jpmQqkZrwg2ZMuCLz6ms5P.jpg', 562),
('Movistar Play', NULL, 'https://image.tmdb.org/t/p/w185/cDzkhgvozSr4GW2aRdV22uDuFpw.jpg', 339),
('Movistar Plus', NULL, 'https://image.tmdb.org/t/p/w185/gZTgebCNny3MHvUxFde7gueVgT1.jpg', 149),
('Mubi', NULL, 'https://image.tmdb.org/t/p/w185/bVR4Z1LCHY7gidXAJF5pMa4QrDS.jpg', 11),
('Mubi Amazon Channel', NULL, 'https://image.tmdb.org/t/p/w185/aJUiN18NZFbpSkHZQV1C1cTpz8H.jpg', 201),
('MX Player', NULL, 'https://image.tmdb.org/t/p/w185/dH4BZucVyb5lW97TEbZ7RTAugjg.jpg', 515),
('My5', NULL, 'https://image.tmdb.org/t/p/w185/xM2A6jTb4895MIuqPa6W6ooEcJS.jpg', 333),
('Naver Store', NULL, 'https://image.tmdb.org/t/p/w185/a4ciTQc27FsgdUp7PCrToHPygcw.jpg', 96),
('Neon TV', NULL, 'https://image.tmdb.org/t/p/w185/od4YNSSLgOP3p8EtQTnEYfrPa77.jpg', 273),
('Netflix', NULL, 'https://image.tmdb.org/t/p/w185/t2yyOv40HZeVlLjYsCsPHnWLk4W.jpg', 8),
('Netflix Kids', NULL, 'https://image.tmdb.org/t/p/w185/j2OLGxyy0gKbPVI0DYFI2hJxP6y.jpg', 175),
('NetMovies', NULL, 'https://image.tmdb.org/t/p/w185/rll0yTCjrSY6hcJqIyMatv9B2iR.jpg', 19),
('Netzkino', NULL, 'https://image.tmdb.org/t/p/w185/lMGjx9hi6Kb4nQvFLGhBfk6nHZV.jpg', 28),
('Nexo Plus', NULL, 'https://image.tmdb.org/t/p/w185/98gXEOnALxMcSTuAkzrx8OKKErx.jpg', 641),
('NFB', NULL, 'https://image.tmdb.org/t/p/w185/yXAjdxUTdehG4YUUEevvaeRhZl7.jpg', 441),
('Nick+ Amazon Channel', NULL, 'https://image.tmdb.org/t/p/w185/xDGeUEkg6Vkud7lhZOyhsi3EIYj.jpg', 589),
('Night Flight Plus', NULL, 'https://image.tmdb.org/t/p/w185/ba8l0e5CkpVnrdFgzBySP7ckZnZ.jpg', 455),
('NLZIET', NULL, 'https://image.tmdb.org/t/p/w185/m8wib2YFVWHaY0SvnExvXZFusz9.jpg', 472),
('Noovo', NULL, 'https://image.tmdb.org/t/p/w185/3ISpW4LBSKAaCyIZI3cxHiox8dI.jpg', 516),
('Nova Play', NULL, 'https://image.tmdb.org/t/p/w185/ApALy1g1c9piZkivc9yrb30BGfn.jpg', 580),
('NOW', NULL, 'https://image.tmdb.org/t/p/w185/cQQYtdaCg7vDo28JPru4v8Ypi8x.jpg', 484),
('Now TV', NULL, 'https://image.tmdb.org/t/p/w185/rsXaDmBzlHgYrtv1o2NsRFctM5t.jpg', 39),
('Now TV Cinema', NULL, 'https://image.tmdb.org/t/p/w185/nqGY5wuSv14vbY7NYOs8stJ6ZBF.jpg', 591),
('NPO Start', NULL, 'https://image.tmdb.org/t/p/w185/73igBrpTdAhEGwuYxhmnhTK5Srs.jpg', 360),
('NRK TV', NULL, 'https://image.tmdb.org/t/p/w185/y1PDXoEMqReA1uX1aF8rnVgSYBS.jpg', 442),
('O2 TV', NULL, 'https://image.tmdb.org/t/p/w185/wTF37o4jOkQfjnWe41gmeuASYZA.jpg', 308),
('OCS Amazon Channel ', NULL, 'https://image.tmdb.org/t/p/w185/42Cj5KNEteBRpfWnGWQbTJpJDGV.jpg', 685),
('OCS Go', NULL, 'https://image.tmdb.org/t/p/w185/riPZYc1ILIbubFaxYSdVfc7K6bm.jpg', 56),
('Oi Play', NULL, 'https://image.tmdb.org/t/p/w185/xbdgLcQ6kRrcVe1uJAG9lzlkSbY.jpg', 574),
('Okko', NULL, 'https://image.tmdb.org/t/p/w185/w1T8s7FqakcfucR8cgOvbe6UeXN.jpg', 115),
('Oldflix', NULL, 'https://image.tmdb.org/t/p/w185/1bbExrGyEuUFAEWMBSN76bwacQ0.jpg', 499),
('Orange VOD', NULL, 'https://image.tmdb.org/t/p/w185/ddWcbe8fYAfcQMjighzWGLjjyip.jpg', 61),
('OSN', NULL, 'https://image.tmdb.org/t/p/w185/vMxtOESmrNWkM9Y9jAebETexPAc.jpg', 629),
('Otta', NULL, 'https://image.tmdb.org/t/p/w185/9CHdbyMXYgFk9oM7H4t1FlrULHs.jpg', 626),
('OUTtv Amazon Channel', NULL, 'https://image.tmdb.org/t/p/w185/bCQVIO5iEjfstObco3fuhFB7sbs.jpg', 607),
('OVID', NULL, 'https://image.tmdb.org/t/p/w185/nXi2nRDPMNivJyFOifEa2t15Xuu.jpg', 433),
('OzFlix', NULL, 'https://image.tmdb.org/t/p/w185/z4vfN7KoOn6zruoCDRITnDZTdAx.jpg', 434),
('Pantaflix', NULL, 'https://image.tmdb.org/t/p/w185/2tAjxjo1n3H7fsXqMsxWFMeFUWp.jpg', 177),
('Pantaya', NULL, 'https://image.tmdb.org/t/p/w185/94IdHexespnJs96kmGiJlflfiwU.jpg', 247),
('Paramount Plus', NULL, 'https://image.tmdb.org/t/p/w185/xbhHHa1YgtpwhC8lb1NQ3ACVcLd.jpg', 531),
('Pathé Thuis', NULL, 'https://image.tmdb.org/t/p/w185/llmnYOyknekZsXtkCaazKjhTLvG.jpg', 71),
('Paus', NULL, 'https://image.tmdb.org/t/p/w185/chOSZtRhgwzrMyMa5Hx8QG0Vwx7.jpg', 618),
('Peacock', NULL, 'https://image.tmdb.org/t/p/w185/8VCV78prwd9QzZnEm0ReO6bERDa.jpg', 386),
('Peacock Premium', NULL, 'https://image.tmdb.org/t/p/w185/xTHltMrZPAJFLQ6qyCBjAnXSmZt.jpg', 387),
('Pickbox NOW', NULL, 'https://image.tmdb.org/t/p/w185/kHx8k4ixfSZdj45FAYP2P9r4FUO.jpg', 637),
('Picl', NULL, 'https://image.tmdb.org/t/p/w185/yHXKdLK7kfHo907L2W8fTalXltQ.jpg', 451),
('Play Suisse', NULL, 'https://image.tmdb.org/t/p/w185/wKAPdeGjoejE3pPZp3RdElIbfl7.jpg', 691),
('Player', NULL, 'https://image.tmdb.org/t/p/w185/uXc2fJqhtXfuNq6ha8tTLL9VnXj.jpg', 505),
('Plex', NULL, 'https://image.tmdb.org/t/p/w185/wDWvnupneMbY6RhBTHQC9zU0SCX.jpg', 538),
('Pluto TV', NULL, 'https://image.tmdb.org/t/p/w185/t6N57S17sdXRXmZDAkaGP0NHNG0.jpg', 300),
('Popcornflix', NULL, 'https://image.tmdb.org/t/p/w185/olvOut34aWUFf1YoOqiqtjidiTK.jpg', 241),
('Popcorntimes', NULL, 'https://image.tmdb.org/t/p/w185/sTwowAulL7eZpgJORBKPKepIbxw.jpg', 522),
('Premier', NULL, 'https://image.tmdb.org/t/p/w185/dUGPd8eg651seqculYtaM3AE9O9.jpg', 570),
('Public Domain Movies', NULL, 'https://image.tmdb.org/t/p/w185/liEIj6CkvojVDiMWeexGvflSPZT.jpg', 638),
('puhutv', NULL, 'https://image.tmdb.org/t/p/w185/3namPdisFuyTbB8BX2PxT3OdVCG.jpg', 342),
('Pure Flix', NULL, 'https://image.tmdb.org/t/p/w185/orsVBNvPWxJNOVSEHMOk2h8R1wA.jpg', 278),
('QFT Player', NULL, 'https://image.tmdb.org/t/p/w185/jiGIvlZafckhqy0Ya9zGp60eWS8.jpg', 552),
('QubitTV', NULL, 'https://image.tmdb.org/t/p/w185/iM0P8o5S1hDahB41kIY5voQWXtU.jpg', 274),
('Quickflix', NULL, 'https://image.tmdb.org/t/p/w185/lTgfdT2r558ytJN8cZp19zd6DKO.jpg', 22),
('Quickflix Store', NULL, 'https://image.tmdb.org/t/p/w185/6HtR4lwikdriuJi86cZa3nXjB3d.jpg', 24),
('Rai Play', NULL, 'https://image.tmdb.org/t/p/w185/s1QWuiBbZhLGSFzYOglPTVye7td.jpg', 222),
('Rakuten TV', NULL, 'https://image.tmdb.org/t/p/w185/5GEbAhFW2S5T8zVc1MNvz00pIzM.jpg', 35),
('Rakuten Viki', NULL, 'https://image.tmdb.org/t/p/w185/qjtOUIUnk4kRpcZmaddjqDHM0dR.jpg', 344),
('realeyz', NULL, 'https://image.tmdb.org/t/p/w185/10BQc1kYmgjXFrFKb3xsRcDDn14.jpg', 14),
('Redbox', NULL, 'https://image.tmdb.org/t/p/w185/gbyLHzl4eYP0oP9oJZ2oKbpkhND.jpg', 279),
('Retrocrush', NULL, 'https://image.tmdb.org/t/p/w185/9ONs8SMAXtkiyaEIKATTpbwckx8.jpg', 446),
('Revry', NULL, 'https://image.tmdb.org/t/p/w185/r1UgUKmt83FSDOIHBdRWKooZPNx.jpg', 473),
('RTBF', NULL, 'https://image.tmdb.org/t/p/w185/qw1BwnbWKs7AXLVR05eRpi3YdD9.jpg', 461),
('RTL Play', NULL, 'https://image.tmdb.org/t/p/w185/xrHrIraInfRXnrz1zHhY1tXJowg.jpg', 572),
('RTL+', NULL, 'https://image.tmdb.org/t/p/w185/3hI22hp7YDZXyrmXVqDGnVivNTI.jpg', 298),
('RTPplay', NULL, 'https://image.tmdb.org/t/p/w185/oSJqnUUeoHfUj86Wsu2oq6VXLXE.jpg', 452),
('rtve', NULL, 'https://image.tmdb.org/t/p/w185/f3RCRmZWiUzg2CjxUqWJ881WmcS.jpg', 541),
('Ruutu', NULL, 'https://image.tmdb.org/t/p/w185/cZkT6PrmJs5mfVscQf2PNF7xrF.jpg', 338),
('SALTO', NULL, 'https://image.tmdb.org/t/p/w185/5uUdbTzTj4N2Wso1FTt2rRoJ5Da.jpg', 564),
('SBS On Demand', NULL, 'https://image.tmdb.org/t/p/w185/5kcixh15fZo0yUwQB2ug2ZfvCVc.jpg', 132),
('Screambox', NULL, 'https://image.tmdb.org/t/p/w185/c2Ey5Q3uUjZgfWWQQIdVIjVfxE4.jpg', 185),
('SF Anytime', NULL, 'https://image.tmdb.org/t/p/w185/dNcz2AZHPEgt4BIKJe56r4visuK.jpg', 426),
('Shadowz', NULL, 'https://image.tmdb.org/t/p/w185/pICdAIrQp0JRR4polBXhlVg8bO.jpg', 513),
('ShemarooMe', NULL, 'https://image.tmdb.org/t/p/w185/vIhSFgmp0HXZbUHDscuhpU6S2Z6.jpg', 474),
('Shout! Factory TV', NULL, 'https://image.tmdb.org/t/p/w185/ju3T8MFGNIoPiYpwHFpNlrYNyG7.jpg', 439),
('ShowMax', NULL, 'https://image.tmdb.org/t/p/w185/okiQZMXnqwv0aD3QDYmu5DBNLce.jpg', 55),
('Showtime', NULL, 'https://image.tmdb.org/t/p/w185/4kL33LoKd99YFIaSOoOPMQOSw1A.jpg', 37),
('Shudder', NULL, 'https://image.tmdb.org/t/p/w185/pheENW1BxlexXX1CKJ4GyWudyMA.jpg', 99),
('Sixplay', NULL, 'https://image.tmdb.org/t/p/w185/ppycrWdkR3pefMYYK79e481PULm.jpg', 147),
('Sky', NULL, 'https://image.tmdb.org/t/p/w185/sHP8XLo4Ac4WMbziRyAdRQdb76q.jpg', 210),
('Sky Go', NULL, 'https://image.tmdb.org/t/p/w185/fBHHXKC34ffxAsQvDe0ZJbvmTEQ.jpg', 29),
('Sky Store', NULL, 'https://image.tmdb.org/t/p/w185/2pCbao1J9s0DMak2KKnEzmzHni8.jpg', 130),
('Sky Ticket', NULL, 'https://image.tmdb.org/t/p/w185/yy8gviRgrRdLYLOL9hKeMvpLKYo.jpg', 30),
('Sky X', NULL, 'https://image.tmdb.org/t/p/w185/y0kyIFElN5sJAsmW8Txj69wzrD2.jpg', 321),
('Sling TV', NULL, 'https://image.tmdb.org/t/p/w185/aLQ8rZhO7vgPFy1tae5vxvb81Wl.jpg', 299),
('Sony Liv', NULL, 'https://image.tmdb.org/t/p/w185/odTur9CmVtzsRUAZ9910tPM4XwL.jpg', 237),
('Sooner', NULL, 'https://image.tmdb.org/t/p/w185/zEG5OsS8ZJHJ6RTuAtLUyCSb6De.jpg', 389),
('Spamflix', NULL, 'https://image.tmdb.org/t/p/w185/xN97FFkFAdY1JvHhS4zyPD4URgD.jpg', 521),
('Spectrum On Demand', NULL, 'https://image.tmdb.org/t/p/w185/79mRAYq40lcYiXkQm6N7YErSSHd.jpg', 486),
('Spuul', NULL, 'https://image.tmdb.org/t/p/w185/iJGVfWTDddgipZ7mJCCEYzmRYrP.jpg', 545),
('Stan', NULL, 'https://image.tmdb.org/t/p/w185/rDd7IEBnJB0gPagFvagP1kK3pDu.jpg', 21),
('Star Plus', NULL, 'https://image.tmdb.org/t/p/w185/hR9vWd8hWEVQKD6eOnBneKRFEW3.jpg', 619),
('Starz', NULL, 'https://image.tmdb.org/t/p/w185/zVJhpmIEgdDVbDt5TB72sZu3qdO.jpg', 43),
('STARZPLAY', NULL, 'https://image.tmdb.org/t/p/w185/uOTEObCZtolNGDA7A4Wrb47cxNn.jpg', 630),
('Strim', NULL, 'https://image.tmdb.org/t/p/w185/gKno1uvHwHyhQTKMflDvEqj5oGJ.jpg', 578),
('STV Player', NULL, 'https://image.tmdb.org/t/p/w185/v3PhM1pr6omrcffUoBBZkiVeApH.jpg', 593),
('SumoTV', NULL, 'https://image.tmdb.org/t/p/w185/5nECaP8nhtrzZfx7oG0yoFMfqiA.jpg', 431),
('Sun Nxt', NULL, 'https://image.tmdb.org/t/p/w185/uW4dPCcbXaaFTyfL5HwhuDt5akK.jpg', 309),
('Sundance Now', NULL, 'https://image.tmdb.org/t/p/w185/pZ9TSk3wlRYwiwwRxTsQJ7t2but.jpg', 143),
('Supo Mungam Plus', NULL, 'https://image.tmdb.org/t/p/w185/rWYJ9mMvxs0p57Nd1BKEtKtpRvD.jpg', 530),
('SVT', NULL, 'https://image.tmdb.org/t/p/w185/jblaJCpe4cDnaFNZg90qGF1UkZF.jpg', 493),
('SwissCom', NULL, 'https://image.tmdb.org/t/p/w185/2LS6g6iE5DiAIDiZTAK8mbQQTuE.jpg', 150),
('Syfy', NULL, 'https://image.tmdb.org/t/p/w185/f7iqKjWYdVoYVIvKP3nboULcrM2.jpg', 215),
('Tata Sky', NULL, 'https://image.tmdb.org/t/p/w185/1AoKTaXsfueyv1oox6FsjzqVARc.jpg', 502),
('TBS', NULL, 'https://image.tmdb.org/t/p/w185/rcebVnRvZvPXauK4353Jgiu4DWI.jpg', 506),
('TCM', NULL, 'https://image.tmdb.org/t/p/w185/8TbsXATKVD4Humjzi6a8SVaSY7o.jpg', 361),
('Telecine Play', NULL, 'https://image.tmdb.org/t/p/w185/5jdN9E9Ftxxbg711crjOyCagTy8.jpg', 227),
('Telia Play', NULL, 'https://image.tmdb.org/t/p/w185/xTVM8uXT9QocigQ07LE7Irc65W2.jpg', 553),
('Telstra TV', NULL, 'https://image.tmdb.org/t/p/w185/zXDDsD9M5vO7lqoqlBQCOcZtKBS.jpg', 429),
('Tenk', NULL, 'https://image.tmdb.org/t/p/w185/9nYphuoVD2doYP1Fc0Xij1j3Qdm.jpg', 550),
('The Film Detective', NULL, 'https://image.tmdb.org/t/p/w185/rOwEnT8oDSTZ5rDKmyaa3O4gUnc.jpg', 470),
('The Roku Channel', NULL, 'https://image.tmdb.org/t/p/w185/z0h7mBHwm5KfMB2MKeoQDD2ngEZ.jpg', 207),
('Timvision', NULL, 'https://image.tmdb.org/t/p/w185/ftxHS1anAWTYgtDtIDv8VLXoepH.jpg', 109),
('TNT', NULL, 'https://image.tmdb.org/t/p/w185/gJnQ40Z6T7HyY6fbmmI6qKE0zmK.jpg', 363),
('TNTGo', NULL, 'https://image.tmdb.org/t/p/w185/dUokaRky9vs1u2PFRzFDV4iIx6A.jpg', 512),
('Topic', NULL, 'https://image.tmdb.org/t/p/w185/ubWucXFn34TrVlJBaJFgPaC4tOP.jpg', 454),
('TriArt Play', NULL, 'https://image.tmdb.org/t/p/w185/yqdmrKY4D0WuB9Q06EQvBoOOgKP.jpg', 517),
('tru TV', NULL, 'https://image.tmdb.org/t/p/w185/pg4bIFyUsSIhFChqOz5Up1BxuIU.jpg', 507),
('True Story', NULL, 'https://image.tmdb.org/t/p/w185/osREemsc9uUB2J8VTkQeAVk2fu9.jpg', 567),
('Tubi TV', NULL, 'https://image.tmdb.org/t/p/w185/w2TDH9TRI7pltf5LjN3vXzs7QbN.jpg', 73),
('Turk on Video', NULL, 'https://image.tmdb.org/t/p/w185/qUNvVPwyz4myF3SF1JJ4KJpHSU1.jpg', 391),
('TV 2', NULL, 'https://image.tmdb.org/t/p/w185/yBrCoCGMIiHPHuoyh1mg82Pwlhx.jpg', 383),
('TVF Play', NULL, 'https://image.tmdb.org/t/p/w185/8ugSQ1g7E8fXFnKFT5G8XOMcmS0.jpg', 500),
('TvIgle', NULL, 'https://image.tmdb.org/t/p/w185/3jJtMOIwtvcrCyeRMUvv4wsfhJk.jpg', 577),
('TVNZ', NULL, 'https://image.tmdb.org/t/p/w185/eCRNttY7Zd75L5syA52AF8rCEuq.jpg', 395),
('tvo', NULL, 'https://image.tmdb.org/t/p/w185/dCO5ge3nDm4LdnWSPe6jHPciE7U.jpg', 488),
('tvzavr', NULL, 'https://image.tmdb.org/t/p/w185/krABGbxTRmPtUA10fkwhwUdCd4I.jpg', 556),
('U-NEXT', NULL, 'https://image.tmdb.org/t/p/w185/9pS9Y3xkCLJnti9pi1AyrD5KbZe.jpg', 84),
('UMC Amazon Channel', NULL, 'https://image.tmdb.org/t/p/w185/e07gcWq5OWhJ8MxZncJrDuoJAp2.jpg', 612),
('Universcine', NULL, 'https://image.tmdb.org/t/p/w185/lwefE4yPpCQGhH2LotPuhGA8gCV.jpg', 239),
('UPC TV', NULL, 'https://image.tmdb.org/t/p/w185/5OtaT8STJ8ZMkKt994C5XxrEAaP.jpg', 622),
('Urban Movie Channel', NULL, 'https://image.tmdb.org/t/p/w185/5uTsmZnDQmIOjZPEv8TNTy7GRJB.jpg', 251),
('USA Network', NULL, 'https://image.tmdb.org/t/p/w185/ldU2RCgdvkcSEBWWbttCpVO450z.jpg', 322),
('VI movies and tv', NULL, 'https://image.tmdb.org/t/p/w185/h1PNHFp50cceDZ8jXUMnuVVMIw2.jpg', 614),
('Viafree', NULL, 'https://image.tmdb.org/t/p/w185/676SkNeXbHTfrtTdvEGpxGtMlKk.jpg', 494),
('Viaplay', NULL, 'https://image.tmdb.org/t/p/w185/cvl65OJnz14LUlC3yGK1KHj8UYs.jpg', 76),
('Vid Plus', NULL, 'https://image.tmdb.org/t/p/w185/7SWXxp41HyMHAQCnxMsTkiS5ZVg.jpg', 462),
('Viddla', NULL, 'https://image.tmdb.org/t/p/w185/ooeXdXICZNnDFHAq596xQwN4A15.jpg', 539),
('Videobuster', NULL, 'https://image.tmdb.org/t/p/w185/goKrzBxDNYxKgeeT2yoHtLXuIol.jpg', 133),
('Videoland', NULL, 'https://image.tmdb.org/t/p/w185/7Jn4Vx4tbSnMQwQXuJFPwV0P5n1.jpg', 72),
('Vidio', NULL, 'https://image.tmdb.org/t/p/w185/6IdiH2yMRYCtB7XoIQ36wZig9gZ.jpg', 489),
('Virgin TV Go', NULL, 'https://image.tmdb.org/t/p/w185/o6li3XZrBKXSqyNRS39UQEfPTCH.jpg', 594),
('Viu', NULL, 'https://image.tmdb.org/t/p/w185/kIbbhgfOWTHNp0xpcFC5uJUAwHj.jpg', 158),
('VIX ', NULL, 'https://image.tmdb.org/t/p/w185/58aUMVWJRolhWpi4aJCkGHwfKdg.jpg', 457),
('VOD Club', NULL, 'https://image.tmdb.org/t/p/w185/1OUHXH3R6waN0ojQWX9LcrO1mNY.jpg', 370),
('VOD Poland', NULL, 'https://image.tmdb.org/t/p/w185/kplaFNfZXsdyqsz4TAK8xaKU9Qa.jpg', 245),
('Vodacom Video Play', NULL, 'https://image.tmdb.org/t/p/w185/dBRq5BYYhK1ZXIgP68z5PYekPD3.jpg', 450),
('Volta', NULL, 'https://image.tmdb.org/t/p/w185/cEFDMwXFueD1II3lwcTawSnmOaj.jpg', 53),
('Voot', NULL, 'https://image.tmdb.org/t/p/w185/2u1uElmpm4lProS7C9RYcaYLYt1.jpg', 121),
('Voyo', NULL, 'https://image.tmdb.org/t/p/w185/ujkJsUqk59ZdN6fCslGV3dZDSHr.jpg', 627),
('VRT nu', NULL, 'https://image.tmdb.org/t/p/w185/A4RUf7OEPnQ3mhaFIZkJkJMrYW2.jpg', 312),
('VRV', NULL, 'https://image.tmdb.org/t/p/w185/rtTqPKRrVVXxvPV0T9OmSXhwXnY.jpg', 504),
('Vudu', NULL, 'https://image.tmdb.org/t/p/w185/21dEscfO8n1tL35k4DANixhffsR.jpg', 7),
('VUDU Free', NULL, 'https://image.tmdb.org/t/p/w185/xzfVRl1CgJPYa9dOoyVI3TDSQo2.jpg', 332),
('VVVVID', NULL, 'https://image.tmdb.org/t/p/w185/rpwa6Tjghh1DF4iNfP5g4Rn6MGQ.jpg', 414),
('W4free', NULL, 'https://image.tmdb.org/t/p/w185/hTXE4J8fB7KDYkhY6KbwJIfHMtM.jpg', 615),
('WAKANIM', NULL, 'https://image.tmdb.org/t/p/w185/52MBOsXXqm0wuLHxKR1FHymef66.jpg', 354),
('Watch4', NULL, 'https://image.tmdb.org/t/p/w185/mpdAy9QFQHA4OpRzykGUXsXqltN.jpg', 392),
('Watcha', NULL, 'https://image.tmdb.org/t/p/w185/vXXZx0aWQtDv2klvObNugm4dQMN.jpg', 97),
('Watchbox', NULL, 'https://image.tmdb.org/t/p/w185/dqlwg963xlz7jLN5Akdg6gbJ5To.jpg', 171),
('wavve', NULL, 'https://image.tmdb.org/t/p/w185/2ioan5BX5L9tz4fIGU93blTeFhv.jpg', 356),
('WeTV', NULL, 'https://image.tmdb.org/t/p/w185/fDZtWPwSiKjVbbuZOVtlZAiH0rE.jpg', 623),
('Wink', NULL, 'https://image.tmdb.org/t/p/w185/zLM7f1w2L8TU2Fspzns72m6h3yY.jpg', 501),
('WOW Presents Plus', NULL, 'https://image.tmdb.org/t/p/w185/mgD0T960hnYU4gBxbPPBrcDfgWg.jpg', 546),
('WWE Network', NULL, 'https://image.tmdb.org/t/p/w185/rDYZ9v3Y09fuFyan51tHKE1mFId.jpg', 260),
('Yelo Play', NULL, 'https://image.tmdb.org/t/p/w185/vjsvYNPgq6BpUoubXR1wNkokoBb.jpg', 313),
('Yle Areena', NULL, 'https://image.tmdb.org/t/p/w185/jH5dm7aqU9DxS4yPfprz6e3jmHU.jpg', 323),
('YouTube', NULL, 'https://image.tmdb.org/t/p/w185/oIkQkEkwfmcG7IGpRR1NB8frZZM.jpg', 192),
('YouTube Free', NULL, 'https://image.tmdb.org/t/p/w185/4SCmZgf7AeJLKKRPcbf5VFkGpBj.jpg', 235),
('YouTube Premium', NULL, 'https://image.tmdb.org/t/p/w185/6IPjvnYl6WWkIwN158qBFXCr2Ne.jpg', 188),
('Yupp TV', NULL, 'https://image.tmdb.org/t/p/w185/8qNJcPBHZ4qewHrDJ7C7s2DBQ3V.jpg', 255),
('ZDF', NULL, 'https://image.tmdb.org/t/p/w185/dKH9TB94EIbnaWnjO6vX0snaNVP.jpg', 537),
('Zee5', NULL, 'https://image.tmdb.org/t/p/w185/ajbCmwvZ8HiePHZaOVEgm9MzyuA.jpg', 232),
('Ziggo TV', NULL, 'https://image.tmdb.org/t/p/w185/8ARqfv7c3eD48NxHfjdNdoop1b0.jpg', 297);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `pseudo` varchar(20) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `age` varchar(10) NOT NULL,
  `Est_moderateur` tinyint(1) DEFAULT NULL,
  `Email` varchar(20) DEFAULT NULL,
  `Description` varchar(200) DEFAULT NULL,
  `Mdp` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`pseudo`, `nom`, `prenom`, `age`, `Est_moderateur`, `Email`, `Description`, `Mdp`) VALUES
('azerty', 'Monchal', 'Hugo', '+18ans', 0, 'azertyuiop', 'Decrivez vous', 'azerty'),
('azertyyyyy', 'monch', 'Hugo', '-10ans', 0, 'azert', 'Decrivez vous', 'qsdf'),
('jean', 'Monchal', 'Hugo', '-10ans', 0, 'azertyuiop', 'Decrivez vous', 'aaaa'),
('JJJJJ', 'Monchal', 'Hugo', '-10ans', 0, 'azertyuiop', 'Decrivez vous', 'aaaa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aimer`
--
ALTER TABLE `aimer`
  ADD PRIMARY KEY (`Nom_genre`,`pseudo`),
  ADD KEY `pseudo` (`pseudo`);

--
-- Indexes for table `commenter`
--
ALTER TABLE `commenter`
  ADD PRIMARY KEY (`pseudo`,`IdFilm`),
  ADD KEY `IdFilm` (`IdFilm`);

--
-- Indexes for table `etre`
--
ALTER TABLE `etre`
  ADD PRIMARY KEY (`IdFilm`,`Nom_genre`),
  ADD KEY `Nom_genre` (`Nom_genre`);

--
-- Indexes for table `etre_disponible`
--
ALTER TABLE `etre_disponible`
  ADD PRIMARY KEY (`IdFilm`,`Nom_plat`),
  ADD KEY `Nom_plat` (`Nom_plat`);

--
-- Indexes for table `etre_inscrit`
--
ALTER TABLE `etre_inscrit`
  ADD PRIMARY KEY (`pseudo`,`Nom_plat`),
  ADD KEY `Nom_plat` (`Nom_plat`);

--
-- Indexes for table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`IdFilm`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`Nom_genre`);

--
-- Indexes for table `noter`
--
ALTER TABLE `noter`
  ADD PRIMARY KEY (`IdFilm`,`pseudo`),
  ADD KEY `pseudo` (`pseudo`);

--
-- Indexes for table `plateforme`
--
ALTER TABLE `plateforme`
  ADD PRIMARY KEY (`Nom_plat`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`pseudo`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aimer`
--
ALTER TABLE `aimer`
  ADD CONSTRAINT `aimer_ibfk_1` FOREIGN KEY (`pseudo`) REFERENCES `utilisateur` (`pseudo`),
  ADD CONSTRAINT `aimer_ibfk_2` FOREIGN KEY (`Nom_genre`) REFERENCES `genre` (`Nom_genre`);

--
-- Constraints for table `commenter`
--
ALTER TABLE `commenter`
  ADD CONSTRAINT `commenter_ibfk_1` FOREIGN KEY (`pseudo`) REFERENCES `utilisateur` (`pseudo`),
  ADD CONSTRAINT `commenter_ibfk_2` FOREIGN KEY (`IdFilm`) REFERENCES `film` (`IdFilm`);

--
-- Constraints for table `etre`
--
ALTER TABLE `etre`
  ADD CONSTRAINT `etre_ibfk_1` FOREIGN KEY (`IdFilm`) REFERENCES `film` (`IdFilm`),
  ADD CONSTRAINT `etre_ibfk_2` FOREIGN KEY (`Nom_genre`) REFERENCES `genre` (`Nom_genre`);

--
-- Constraints for table `etre_disponible`
--
ALTER TABLE `etre_disponible`
  ADD CONSTRAINT `etre_disponible_ibfk_1` FOREIGN KEY (`IdFilm`) REFERENCES `film` (`IdFilm`),
  ADD CONSTRAINT `etre_disponible_ibfk_2` FOREIGN KEY (`Nom_plat`) REFERENCES `plateforme` (`Nom_plat`);

--
-- Constraints for table `etre_inscrit`
--
ALTER TABLE `etre_inscrit`
  ADD CONSTRAINT `etre_inscrit_ibfk_1` FOREIGN KEY (`pseudo`) REFERENCES `utilisateur` (`pseudo`),
  ADD CONSTRAINT `etre_inscrit_ibfk_2` FOREIGN KEY (`Nom_plat`) REFERENCES `plateforme` (`Nom_plat`);

--
-- Constraints for table `noter`
--
ALTER TABLE `noter`
  ADD CONSTRAINT `noter_ibfk_1` FOREIGN KEY (`IdFilm`) REFERENCES `film` (`IdFilm`),
  ADD CONSTRAINT `noter_ibfk_2` FOREIGN KEY (`pseudo`) REFERENCES `utilisateur` (`pseudo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
