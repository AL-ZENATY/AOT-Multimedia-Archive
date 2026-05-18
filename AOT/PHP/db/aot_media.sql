-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2026 at 07:26 AM
-- Server version: 5.7.17
-- PHP Version: 8.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aot_media`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `id` int(11) NOT NULL,
  `season_id` int(11) NOT NULL,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `season_id`, `title`) VALUES
(1, 1, 'Attack on Titan Season 1 OST'),
(2, 2, 'Attack on Titan Season 2 OST'),
(3, 3, 'Attack on Titan Season 3 OST'),
(4, 4, 'Attack on Titan Season 4 OST');

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE `artists` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `song1` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `song2` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `song3` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`id`, `name`, `role`, `bio`, `image`, `song1`, `song2`, `song3`) VALUES
(1, 'Hiroyuki Sawano', 'Composer', 'Hiroyuki Sawano is a Japanese composer known for his powerful orchestral and electronic music. He composed the majority of the Attack on Titan soundtrack, creating emotionally intense themes that define the series.', 'hiroyuki_sawano.jpg', 'Eye-Water', 'ətˈæk 0N tάɪtn', 'Vogel im Käfig'),
(2, 'Revo', 'Composer / Band Leader', 'Revo is the founder, composer, and leader of the symphonic rock project Linked Horizon. He created the iconic opening themes for Attack on Titan, blending orchestral music, rock, and storytelling.', 'revo.png', 'Guren no Yumiya', 'Jiyuu no Tsubasa', 'Shinzou wo Sasageyo!'),
(3, 'Kohta Yamamoto', 'Composer', 'Kohta Yamamoto is a Japanese composer who collaborated with Hiroyuki Sawano on the later seasons of Attack on Titan, contributing darker and more atmospheric tracks.', 'kohta_yamamoto.jpg', 'Ashes on The Fire', 'The Global Allied Fleet', 'ətˈæk till we are Ashes');

-- --------------------------------------------------------

--
-- Table structure for table `navigation`
--

CREATE TABLE `navigation` (
  `id` int(11) NOT NULL,
  `label` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int(11) NOT NULL,
  `display_mode` enum('normal','logo','badge') COLLATE utf8mb4_unicode_ci DEFAULT 'normal',
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `navigation`
--

INSERT INTO `navigation` (`id`, `label`, `url`, `sort_order`, `display_mode`, `icon`) VALUES
(1, 'Home', 'Index.php', 1, 'normal', 'aot_logo.png'),
(2, 'Albums', 'Playlist_Albums.php', 2, 'normal', 'scout_legion.png'),
(3, 'VideoClips', 'VideoClips.php', 3, 'normal', 'military_police.png'),
(4, 'Artists', 'Artists.php', 4, 'normal', 'stationary_guard.png'),
(5, 'Popular Artists', 'Popular_artists.php', 5, 'normal', 'trainees_squad.png'),
(6, 'Contact', 'Contact.php', 6, 'normal', 'zy_logo_2.png');

-- --------------------------------------------------------

--
-- Table structure for table `popular_artists`
--

CREATE TABLE `popular_artists` (
  `artist_id` int(11) NOT NULL,
  `artist_name` varchar(255) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `debut_year` year(4) NOT NULL,
  `country` varchar(100) NOT NULL,
  `notable_work` varchar(255) DEFAULT NULL,
  `youtube_link` varchar(255) DEFAULT NULL,
  `wikipedia_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `popular_artists`
--

INSERT INTO `popular_artists` (`artist_id`, `artist_name`, `genre`, `debut_year`, `country`, `notable_work`, `youtube_link`, `wikipedia_link`) VALUES
(1, 'The Beatles', 'Rock', '1960', 'United Kingdom', 'Hey Jude', 'https://www.youtube.com/watch?v=A_MjCqQoLLA', 'https://en.wikipedia.org/wiki/The_Beatles'),
(2, 'Elvis Presley', 'Rock and Roll', '1954', 'United States', 'Jailhouse Rock', 'https://www.youtube.com/watch?v=gj0Rz-uP4Mk', 'https://en.wikipedia.org/wiki/Elvis_Presley'),
(3, 'Michael Jackson', 'Pop', '1964', 'United States', 'Thriller', 'https://www.youtube.com/watch?v=sOnqjkJTMaA', 'https://en.wikipedia.org/wiki/Michael_Jackson'),
(4, 'Madonna', 'Pop', '1982', 'United States', 'Like a Prayer', 'https://www.youtube.com/watch?v=79fzeNUqQbQ', 'https://en.wikipedia.org/wiki/Madonna_(entertainer)'),
(5, 'Elton John', 'Rock', '1962', 'United Kingdom', 'Your Song', 'https://www.youtube.com/watch?v=GlPlfCy1urI', 'https://en.wikipedia.org/wiki/Elton_John'),
(6, 'Queen', 'Rock', '1970', 'United Kingdom', 'Bohemian Rhapsody', 'https://www.youtube.com/watch?v=fJ9rUzIMcZQ', 'https://en.wikipedia.org/wiki/Queen_(band)'),
(7, 'Pink Floyd', 'Progressive Rock', '1965', 'United Kingdom', 'Comfortably Numb', 'https://www.youtube.com/watch?v=_FrOQC-zEog', 'https://en.wikipedia.org/wiki/Pink_Floyd'),
(8, 'Led Zeppelin', 'Hard Rock', '1968', 'United Kingdom', 'Stairway to Heaven', 'https://www.youtube.com/watch?v=QkF3oxziUI4', 'https://en.wikipedia.org/wiki/Led_Zeppelin'),
(9, 'Nirvana', 'Grunge', '1987', 'United States', 'Smells Like Teen Spirit', 'https://www.youtube.com/watch?v=hTWKbfoikeg', 'https://en.wikipedia.org/wiki/Nirvana_(band)'),
(10, 'The Rolling Stones', 'Rock', '1962', 'United Kingdom', '(I Can’t Get No) Satisfaction', 'https://www.youtube.com/watch?v=nrIPxlFzDi0', 'https://en.wikipedia.org/wiki/The_Rolling_Stones'),
(11, 'Bob Dylan', 'Folk', '1961', 'United States', 'Like a Rolling Stone', 'https://www.youtube.com/watch?v=IwOfCgkyEj0', 'https://en.wikipedia.org/wiki/Bob_Dylan'),
(12, 'U2', 'Rock', '1976', 'Ireland', 'One', 'https://www.youtube.com/watch?v=ftjEcrrf7r0', 'https://en.wikipedia.org/wiki/U2'),
(13, 'Beyoncé', 'Pop', '1997', 'United States', 'Halo', 'https://www.youtube.com/watch?v=bnVUHWCynig', 'https://en.wikipedia.org/wiki/Beyonc%C3%A9'),
(14, 'Adele', 'Pop', '2006', 'United Kingdom', 'Someone Like You', 'https://www.youtube.com/watch?v=hLQl3WQQoQ0', 'https://en.wikipedia.org/wiki/Adele'),
(15, 'Coldplay', 'Alternative Rock', '1996', 'United Kingdom', 'Fix You', 'https://www.youtube.com/watch?v=k4V3Mo61fJM', 'https://en.wikipedia.org/wiki/Coldplay'),
(16, 'The Beach Boys', 'Rock', '1961', 'United States', 'Good Vibrations', 'https://www.youtube.com/watch?v=mdt0SOqPJcg', 'https://en.wikipedia.org/wiki/The_Beach_Boys'),
(17, 'Prince', 'Pop', '1978', 'United States', 'Purple Rain', 'https://www.youtube.com/watch?v=TvnYmWpD_T8', 'https://en.wikipedia.org/wiki/Prince_(musician)'),
(18, 'David Bowie', 'Rock', '1962', 'United Kingdom', 'Heroes', 'https://www.youtube.com/watch?v=Tgcc5V9Hu3g', 'https://en.wikipedia.org/wiki/David_Bowie'),
(19, 'Rihanna', 'Pop', '2005', 'Barbados', 'Umbrella', 'https://www.youtube.com/watch?v=CvBfHwUxHIk', 'https://en.wikipedia.org/wiki/Rihanna'),
(20, 'Taylor Swift', 'Pop', '2006', 'United States', 'Shake It Off', 'https://www.youtube.com/watch?v=nfWlot6h_JM', 'https://en.wikipedia.org/wiki/Taylor_Swift'),
(21, 'Drake', 'Hip Hop', '2001', 'Canada', 'Hotline Bling', 'https://www.youtube.com/watch?v=uxpDa-c-4Mc', 'https://en.wikipedia.org/wiki/Drake_(musician)'),
(22, 'Kanye West', 'Hip Hop', '2003', 'United States', 'Stronger', 'https://www.youtube.com/watch?v=PsO6ZnUZI0g', 'https://en.wikipedia.org/wiki/Kanye_West'),
(23, 'Jay-Z', 'Hip Hop', '1996', 'United States', 'Empire State of Mind', 'https://www.youtube.com/watch?v=0UjsXo9l6I8', 'https://en.wikipedia.org/wiki/Jay-Z'),
(24, 'Eminem', 'Hip Hop', '1996', 'United States', 'Lose Yourself', 'https://www.youtube.com/watch?v=_Yhyp-_hX2s', 'https://en.wikipedia.org/wiki/Eminem'),
(25, 'Whitney Houston', 'Pop', '1985', 'United States', 'I Will Always Love You', 'https://www.youtube.com/watch?v=3JWTaaS7LdU', 'https://en.wikipedia.org/wiki/Whitney_Houston'),
(26, 'Celine Dion', 'Pop', '1981', 'Canada', 'My Heart Will Go On', 'https://www.youtube.com/watch?v=WNIPqafd4As', 'https://en.wikipedia.org/wiki/Celine_Dion'),
(27, 'Maroon 5', 'Pop Rock', '2001', 'United States', 'Sugar', 'https://www.youtube.com/watch?v=09R8_2nJtjg', 'https://en.wikipedia.org/wiki/Maroon_5'),
(28, 'The Weeknd', 'R&B', '2010', 'Canada', 'Blinding Lights', 'https://www.youtube.com/watch?v=4NRXx6U8ABQ', 'https://en.wikipedia.org/wiki/The_Weeknd'),
(29, 'Ed Sheeran', 'Pop', '2011', 'United Kingdom', 'Shape of You', 'https://www.youtube.com/watch?v=JGwWNGJdvx8', 'https://en.wikipedia.org/wiki/Ed_Sheeran'),
(30, 'Bruno Mars', 'Pop', '2004', 'United States', 'Just the Way You Are', 'https://www.youtube.com/watch?v=LjhCEhWiKXk', 'https://en.wikipedia.org/wiki/Bruno_Mars'),
(31, 'Justin Bieber', 'Pop', '2009', 'Canada', 'Sorry', 'https://www.youtube.com/watch?v=fRh_vgS2dFE', 'https://en.wikipedia.org/wiki/Justin_Bieber'),
(32, 'Katy Perry', 'Pop', '2001', 'United States', 'Firework', 'https://www.youtube.com/watch?v=QGJuMBdaqIw', 'https://en.wikipedia.org/wiki/Katy_Perry'),
(33, 'Shakira', 'Pop', '1990', 'Colombia', 'Hips Don’t Lie', 'https://www.youtube.com/watch?v=DUT5rEU6pqM', 'https://en.wikipedia.org/wiki/Shakira'),
(34, 'Lady Gaga', 'Pop', '2008', 'United States', 'Bad Romance', 'https://www.youtube.com/watch?v=qrO4YZeyl0I', 'https://en.wikipedia.org/wiki/Lady_Gaga'),
(35, 'Harry Styles', 'Pop', '2010', 'United Kingdom', 'Sign of the Times', 'https://www.youtube.com/watch?v=qN4ooNx77u0', 'https://en.wikipedia.org/wiki/Harry_Styles'),
(36, 'Sam Smith', 'Pop', '2012', 'United Kingdom', 'Stay With Me', 'https://www.youtube.com/watch?v=pB-5XG-DbAA', 'https://en.wikipedia.org/wiki/Sam_Smith'),
(37, 'Ariana Grande', 'Pop', '2008', 'United States', 'Thank U, Next', 'https://www.youtube.com/watch?v=gl1aHhXnN1k', 'https://en.wikipedia.org/wiki/Ariana_Grande'),
(38, 'Post Malone', 'Hip Hop', '2015', 'United States', 'Circles', 'https://www.youtube.com/watch?v=wXhTHyIgQ_U', 'https://en.wikipedia.org/wiki/Post_Malone'),
(39, 'Billie Eilish', 'Pop', '2015', 'United States', 'Bad Guy', 'https://www.youtube.com/watch?v=DyDfgMOUjCI', 'https://en.wikipedia.org/wiki/Billie_Eilish'),
(40, 'Dua Lipa', 'Pop', '2015', 'United Kingdom', 'Don’t Start Now', 'https://www.youtube.com/watch?v=oygrmJFKYZY', 'https://en.wikipedia.org/wiki/Dua_Lipa'),
(41, 'Imagine Dragons', 'Alternative Rock', '2008', 'United States', 'Radioactive', 'https://www.youtube.com/watch?v=ktvTqknDobU', 'https://en.wikipedia.org/wiki/Imagine_Dragons'),
(42, 'The Killers', 'Alternative Rock', '2001', 'United States', 'Mr. Brightside', 'https://www.youtube.com/watch?v=gGdGFtwCNBE', 'https://en.wikipedia.org/wiki/The_Killers'),
(43, 'Green Day', 'Punk Rock', '1987', 'United States', 'Boulevard of Broken Dreams', 'https://www.youtube.com/watch?v=Soa3gO7tL-c', 'https://en.wikipedia.org/wiki/Green_Day'),
(44, 'Foo Fighters', 'Rock', '1994', 'United States', 'Everlong', 'https://www.youtube.com/watch?v=eBG7P-K-r1Y', 'https://en.wikipedia.org/wiki/Foo_Fighters'),
(45, 'Linkin Park', 'Nu Metal', '1996', 'United States', 'In the End', 'https://www.youtube.com/watch?v=eVTXPUF4Oz4', 'https://en.wikipedia.org/wiki/Linkin_Park'),
(46, 'Red Hot Chili Peppers', 'Funk Rock', '1983', 'United States', 'Californication', 'https://www.youtube.com/watch?v=YlUKcNNmywk', 'https://en.wikipedia.org/wiki/Red_Hot_Chili_Peppers'),
(47, 'Metallica', 'Heavy Metal', '1981', 'United States', 'Enter Sandman', 'https://www.youtube.com/watch?v=CD-E-LDc384', 'https://en.wikipedia.org/wiki/Metallica'),
(48, 'AC/DC', 'Hard Rock', '1973', 'Australia', 'Back in Black', 'https://www.youtube.com/watch?v=pAgnJDJN4VA', 'https://en.wikipedia.org/wiki/AC/DC'),
(49, 'Bon Jovi', 'Rock', '1983', 'United States', 'Livin’ on a Prayer', 'https://www.youtube.com/watch?v=lDK9QqIzhwk', 'https://en.wikipedia.org/wiki/Bon_Jovi'),
(50, 'ABBA', 'Pop', '1972', 'Sweden', 'Dancing Queen', 'https://www.youtube.com/watch?v=xFrGuyw1V8s', 'https://en.wikipedia.org/wiki/ABBA');

-- --------------------------------------------------------

--
-- Table structure for table `seasons`
--

CREATE TABLE `seasons` (
  `id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seasons`
--

INSERT INTO `seasons` (`id`, `title`) VALUES
(1, 'Season 1'),
(2, 'Season 2\r\n'),
(3, 'Season 3'),
(4, 'Season 4'),
(5, 'Season 5');

-- --------------------------------------------------------

--
-- Table structure for table `tracks`
--

CREATE TABLE `tracks` (
  `id` int(11) NOT NULL,
  `album_id` int(11) NOT NULL,
  `track_number` int(11) NOT NULL,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` int(11) DEFAULT NULL,
  `audio_src` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tracks`
--

INSERT INTO `tracks` (`id`, `album_id`, `track_number`, `title`, `duration`, `audio_src`) VALUES
(1, 1, 1, 'Attack on Titan_S1_P1_Opening', NULL, 'Audio/OST_S1/Attack on Titan_S1_P1_Opening.opus'),
(2, 1, 2, 'Attack on Titan_S1_P1_Opening_Extended', NULL, 'Audio/OST_S1/Attack on Titan_S1_P1_Opening_Extended.m4a'),
(3, 1, 3, 'Attack on Titan_OST_S1_Fall of Sheganshina_V1', NULL, 'Audio/OST_S1/Attack on Titan_OST_S1_Fall of Sheganshina_V1.opus'),
(4, 1, 4, 'Attack on Titan_OST_S1_Destroyer or Creator_V1', NULL, 'Audio/OST_S1/Attack on Titan_OST_S1_Destroyer or Creator_V1.opus'),
(5, 1, 5, 'Attack on Titan_OST_S1_3D Body Motion', NULL, 'Audio/OST_S1/Attack on Titan_OST_S1_3D Body Motion.opus'),
(6, 1, 6, 'Attack on Titan_S1_P1_Ending', NULL, 'Audio/OST_S1/Attack on Titan_S1_P1_Ending.opus'),
(7, 1, 7, 'Attack on Titan_S1_P1_Ending_Extended', NULL, 'Audio/OST_S1/Attack on Titan_S1_P1_Ending_Extended.opus'),
(8, 1, 8, 'Attack on Titan_S1_P2_Opening', NULL, 'Audio/OST_S1/Attack on Titan_S1_P2_Opening.opus'),
(9, 1, 9, 'Attack on Titan_S1_P2_Opening_Extended', NULL, 'Audio/OST_S1/Attack on Titan_S1_P2_Opening_Extended.opus'),
(10, 1, 10, 'Attack on Titan_OST_S1_Bird in a Cage_V1', NULL, 'Audio/OST_S1/Attack on Titan_OST_S1_Bird in a Cage_V1.opus'),
(11, 1, 11, 'Attack on Titan_OST_S1_CounterAttack Mankind', NULL, 'Audio/OST_S1/Attack on Titan_OST_S1_CounterAttack Mankind.opus'),
(12, 1, 12, 'Attack on Titan_OST_S1_Eye Water_V1', NULL, 'Audio/OST_S1/Attack on Titan_OST_S1_Eye Water_V1.opus'),
(13, 1, 13, 'Attack on Titan_S1_P2_Ending', NULL, 'Audio/OST_S1/Attack on Titan_S1_P2_Ending.opus'),
(14, 1, 14, 'Attack on Titan_S1_P2_Ending_Extended', NULL, 'Audio/OST_S1/Attack on Titan_S1_P2_Ending_Extended.opus'),
(15, 2, 1, 'Attack on Titan_S2_Opening', 0, 'Audio/OST_S2/Attack on Titan_S2_Opening.opus'),
(16, 2, 2, 'Attack on Titan_S2_Opening_Extended', 0, 'Audio/OST_S2/Attack on Titan_S2_Opening_Extended.opus'),
(17, 2, 3, 'Attack on Titan_OST_S2_A World Already Lost', 0, 'Audio/OST_S2/Attack on Titan_OST_S2_A World Already Lost.opus'),
(18, 2, 4, 'Attack on Titan_OST_S2_The Titans Advance', 0, 'Audio/OST_S2/Attack on Titan_OST_S2_The Titans Advance.opus'),
(19, 2, 5, 'Attack on Titan_OST_S2_War Without Mercy', 0, 'Audio/OST_S2/Attack on Titan_OST_S2_War Without Mercy.opus'),
(20, 2, 6, 'Attack on Titan_OST_S2_Ape Titan Theme', 0, 'Audio/OST_S2/Attack on Titan_OST_S2_Ape Titan Theme.opus'),
(21, 2, 7, 'Attack on Titan_OST_S2_Bird in a Cage_V2', 0, 'Audio/OST_S2/Attack on Titan_OST_S2_Bird in a Cage_V2.opus'),
(22, 2, 8, 'Attack on Titan_OST_S2_Bird in a Cage_V2_Extended', 0, 'Audio/OST_S2/Attack on Titan_OST_S2_Bird in a Cage_V2_Extended.opus'),
(23, 2, 9, 'Attack on Titan_OST_S2_Bird in a Cage_V2_Extended_Orchestra', 0, 'Audio/OST_S2/Attack on Titan_OST_S2_Bird in a Cage_V2_Extended_Orchestra.opus'),
(24, 2, 10, 'Attack on Titan_OST_S2_Eye Water_V2', 0, 'Audio/OST_S2/Attack on Titan_OST_S2_Eye Water_V2.opus'),
(25, 2, 11, 'Attack on Titan_S2_Call of Silence', 0, 'Audio/OST_S2/Attack on Titan_S2_Call of Silence.opus'),
(26, 2, 12, 'Attack on Titan_S2_Barricades', 0, 'Audio/OST_S2/Attack on Titan_S2_Barricades.opus'),
(27, 2, 13, 'Attack on Titan_S2_Ending', 0, 'Audio/OST_S2/Attack on Titan_S2_Ending.opus'),
(28, 2, 14, 'Attack on Titan_S2_Ending_Extended', 0, 'Audio/OST_S2/Attack on Titan_S2_Ending_Extended.opus'),
(29, 3, 1, 'Attack on Titan_S3_P1_Opening', 0, 'Audio/OST_S3/Attack on Titan_S3_P1_Opening.opus'),
(30, 3, 2, 'Attack on Titan_S3_P1_Opening_Extended', 0, 'Audio/OST_S3/Attack on Titan_S3_P1_Opening_Extended.opus'),
(31, 3, 3, 'Attack on Titan_OST_S3_Kenny Theme', 0, 'Audio/OST_S3/Attack on Titan_OST_S3_Kenny Theme.opus'),
(32, 3, 4, 'Attack on Titan_OST_S3_Kenny Theme_Extended', 0, 'Audio/OST_S3/Attack on Titan_OST_S3_Kenny Theme_Extended.opus'),
(33, 3, 5, 'Attack on Titan_OST_S3_Walls Turned Against Us', 0, 'Audio/OST_S3/Attack on Titan_OST_S3_Walls Turned Against Us.opus'),
(34, 3, 6, 'Attack on Titan_OST_S3_An Era in Decline', 0, 'Audio/OST_S3/Attack on Titan_OST_S3_An Era in Decline.opus'),
(35, 3, 7, 'Attack on Titan_OST_S3_Historia\'s Burden', 0, 'Audio/OST_S3/Attack on Titan_OST_S3_Historia\'s Burden.opus'),
(36, 3, 8, 'Attack on Titan_OST_S3_Bird in a Cage_Apple Seed', 0, 'Audio/OST_S3/Attack on Titan_OST_S3_Bird in a Cage_Apple Seed.opus'),
(37, 3, 9, 'Attack on Titan_S3_P1_Ending', 0, 'Audio/OST_S3/Attack on Titan_S3_P1_Ending.opus'),
(38, 3, 10, 'Attack on Titan_S3_P1_Ending_Extended', 0, 'Audio/OST_S3/Attack on Titan_S3_P1_Ending_Extended.opus'),
(39, 3, 11, 'Attack on Titan_S3_P2_Opening', 0, 'Audio/OST_S3/Attack on Titan_S3_P2_Opening.opus'),
(40, 3, 12, 'Attack on Titan_S3_P2_Opening_Extended', 0, 'Audio/OST_S3/Attack on Titan_S3_P2_Opening_Extended.opus'),
(41, 3, 13, 'Attack on Titan_OST_S3_Lights Out', 0, 'Audio/OST_S3/Attack on Titan_OST_S3_Lights Out.opus'),
(42, 3, 14, 'Attack on Titan_OST_S3_Ape Titan x Lights Out', 0, 'Audio/OST_S3/Attack on Titan_OST_S3_Ape Titan x Lights Out.opus'),
(43, 3, 15, 'Attack on Titan_OST_S3_Destroyer or Creator_V2', 0, 'Audio/OST_S3/Attack on Titan_OST_S3_Destroyer or Creator_V2.opus'),
(44, 3, 16, 'Attack on Titan_OST_S3_Truth, Attack and Sacrfice_V1_The Cost of Truth', 0, 'Audio/OST_S3/Attack on Titan_OST_S3_Truth, Attack and Sacrfice_V1_The Cost of Truth.opus'),
(45, 3, 17, 'Attack on Titan_OST_S3_Truth, Attack and Sacrfice_V2_The Meaning of Attack', 0, 'Audio/OST_S3/Attack on Titan_OST_S3_Truth, Attack and Sacrfice_V2_The Meaning of Attack.opus'),
(46, 3, 18, 'Attack on Titan_OST_S3_Truth, Attack and Sacrfice_V3_Those Who Gave Everything', 0, 'Audio/OST_S3/Attack on Titan_OST_S3_Truth, Attack and Sacrfice_V3_Those Who Gave Everything.opus'),
(47, 3, 19, 'Attack on Titan_S3_P2_Ending', 0, 'Audio/OST_S3/Attack on Titan_S3_P2_Ending.opus'),
(48, 3, 20, 'Attack on Titan_S3_P2_Ending_Extended', 0, 'Audio/OST_S3/Attack on Titan_S3_P2_Ending_Extended.opus'),
(49, 4, 1, 'Attack on Titan_S4_P1_Opening', 0, 'Audio/OST_S4/Attack on Titan_S4_P1_Opening.opus'),
(50, 4, 2, 'Attack on Titan_S4_P1_Opening_Extended', 0, 'Audio/OST_S4/Attack on Titan_S4_P1_Opening_Extended.opus'),
(51, 4, 3, 'Attack on Titan_OST_S4_Ashes On The Fire_V1', 0, 'Audio/OST_S4/Attack on Titan_OST_S4_Ashes On The Fire_V1.opus'),
(52, 4, 4, 'Attack on Titan_OST_S4_The Other Side of the Sea', 0, 'Audio/OST_S4/Attack on Titan_OST_S4_The Other Side of the Sea.opus'),
(53, 4, 5, 'Attack on Titan_OST_S4_The Warriors', 0, 'Audio/OST_S4/Attack on Titan_OST_S4_The Warriors.opus'),
(54, 4, 6, 'Attack on Titan_OST_S4_Paradis strikes Liberio', 0, 'Audio/OST_S4/Attack on Titan_OST_S4_Paradis strikes Liberio.opus'),
(55, 4, 7, 'Attack on Titan_OST_S4_The Fall of Marley', 0, 'Audio/OST_S4/Attack on Titan_OST_S4_The Fall of Marley.opus'),
(56, 4, 8, 'Attack on Titan_OST_S4_Zeek\'s Plan', 0, 'Audio/OST_S4/Attack on Titan_OST_S4_Zeek\'s Plan.opus'),
(57, 4, 9, 'Attack on Titan_OST_S4_Friendships', 0, 'Audio/OST_S4/Attack on Titan_OST_S4_Friendships.opus'),
(58, 4, 10, 'Attack on Titan_S4_P1_Ending', 0, 'Audio/OST_S4/Attack on Titan_S4_P1_Ending.opus'),
(59, 4, 11, 'Attack on Titan_S4_P1_Ending_Extended', 0, 'Audio/OST_S4/Attack on Titan_S4_P1_Ending_Extended.opus'),
(60, 4, 12, 'Attack on Titan_S4_P2_Opening', 0, 'Audio/OST_S4/Attack on Titan_S4_P2_Opening.opus'),
(61, 4, 13, 'Attack on Titan_S4_P2_Opening_Extended', 0, 'Audio/OST_S4/Attack on Titan_S4_P2_Opening_Extended.opus'),
(62, 4, 14, 'Attack on Titan_OST_S4_Footsteps of Doom', 0, 'Audio/OST_S4/Attack on Titan_OST_S4_Footsteps of Doom.opus'),
(63, 4, 15, 'Attack on Titan_OST_S4_Ashes On The Fire_V2', 0, 'Audio/OST_S4/Attack on Titan_OST_S4_Ashes On The Fire_V2.opus'),
(64, 4, 16, 'Attack on Titan_OST_S4_TRAITOR', 0, 'Audio/OST_S4/Attack on Titan_OST_S4_TRAITOR.opus'),
(65, 4, 17, 'Attack on Titan_OST_S4_Fall of Sheganshina_V2', 0, 'Audio/OST_S4/Attack on Titan_OST_S4_Fall of Sheganshina_V2.opus'),
(66, 4, 18, 'Attack on Titan_OST_S4_The Global Allied Fleet', 0, 'Audio/OST_S4/Attack on Titan_OST_S4_The Global Allied Fleet.opus'),
(67, 4, 19, 'Attack on Titan_OST_S4_Destroyer or Creator_V4', 0, 'Audio/OST_S4/Attack on Titan_OST_S4_Destroyer or Creator_V4.opus'),
(68, 4, 20, 'Attack on Titan_OST_S4_When The Heart Unfreezes', 0, 'Audio/OST_S4/Attack on Titan_OST_S4_When The Heart Unfreezes.opus'),
(69, 4, 21, 'Attack on Titan_S4_P2_Ending', 0, 'Audio/OST_S4/Attack on Titan_S4_P2_Ending.opus'),
(70, 4, 22, 'Attack on Titan_S4_P2_Ending_Extended', 0, 'Audio/OST_S4/Attack on Titan_S4_P2_Ending_Extended.opus'),
(71, 4, 23, 'Attack on Titan_S4_P3_Opening', 0, 'Audio/OST_S4/Attack on Titan_S4_P3_Opening.opus'),
(72, 4, 24, 'Attack on Titan_S4_P3_Opening_Extended', 0, 'Audio/OST_S4/Attack on Titan_S4_P3_Opening_Extended.opus'),
(73, 4, 25, 'Attack on Titan_OST_S4_Aim of the Fate', 0, 'Audio/OST_S4/Attack on Titan_OST_S4_Aim of the Fate.opus'),
(74, 4, 26, 'Attack on Titan_OST_S4_Children Built for War', 0, 'Audio/OST_S4/Attack on Titan_OST_S4_Children Built for War.opus'),
(75, 4, 27, 'Attack on Titan_OST_S4_Splinter Wolf', 0, 'Audio/OST_S4/Attack on Titan_OST_S4_Splinter Wolf.opus'),
(76, 4, 28, 'Attack on Titan_S4_P3_Ending', NULL, 'Audio/OST_S4/Attack on Titan_S4_P3_Ending.opus'),
(77, 4, 29, 'Attack on Titan_S4_P3_Ending_Extended', NULL, 'Audio/OST_S4/Attack on Titan_S4_P3_Ending_Extended.opus'),
(78, 4, 30, 'Attack on Titan_S4_P4_Opening', 0, 'Audio/OST_S4/Attack on Titan_S4_P4_Opening.opus'),
(79, 4, 31, 'Attack on Titan_S4_P4_Opening_Extended', 0, 'Audio/OST_S4/Attack on Titan_S4_P4_Opening_Extended.opus'),
(80, 4, 32, 'Attack on Titan_OST_S4_Attack Till We Are Ashes', 0, 'Audio/OST_S4/Attack on Titan_OST_S4_Attack Till We Are Ashes.opus'),
(81, 4, 33, 'Attack on Titan_OST_S4_Vanishment', 0, 'Audio/OST_S4/Attack on Titan_OST_S4_Vanishment.opus'),
(82, 4, 34, 'Attack on Titan_S4_P4_Ending', 0, 'Audio/OST_S4/Attack on Titan_S4_P4_Ending.opus');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `season_id` int(11) NOT NULL,
  `track_id` int(11) DEFAULT NULL,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('intro','outro','trailer','scene') COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` int(11) DEFAULT NULL,
  `video_src` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `season_id`, `track_id`, `title`, `type`, `duration`, `video_src`) VALUES
(1, 1, NULL, 'Attack on Titan Season 1 Trailer 1', 'trailer', 0, 'Videos/VideoClips/Season_1/Trailer/Attack on Titan Season 1 Trailer 1.mp4'),
(2, 1, NULL, 'Attack on Titan Season 1 Trailer 2', 'trailer', 0, 'Videos/VideoClips/Season_1/Trailer/Attack on Titan Season 1 Trailer 2.mp4'),
(3, 2, NULL, 'Attack on Titan Season 2 Trailer 1', 'trailer', 0, 'Videos/VideoClips/Season_2/Trailer/Attack on Titan Season 2 Trailer 1.mp4'),
(4, 2, NULL, 'Attack on Titan Season 2 Trailer 2', 'trailer', 0, 'Videos/VideoClips/Season_2/Trailer/Attack on Titan Season 2 Trailer 2.mp4'),
(5, 3, NULL, 'Attack on Titan Season 3 Trailer 1', 'trailer', 0, 'Videos/VideoClips/Season_3/Trailer/Attack on Titan Season 3 Trailer 1.mp4'),
(6, 3, NULL, 'Attack on Titan Season 3 Trailer 2', 'trailer', 0, 'Videos/VideoClips/Season_3/Trailer/Attack on Titan Season 3 Trailer 2.mp4'),
(7, 4, NULL, 'Attack on Titan Season 4 Trailer 1', 'trailer', 0, 'Videos/VideoClips/Season_4/Trailer/Attack on Titan Season 4 Trailer 1.mp4'),
(8, 4, NULL, 'Attack on Titan Season 4 Trailer 2', 'trailer', 0, 'Videos/VideoClips/Season_4/Trailer/Attack on Titan Season 4 Trailer 2.mp4'),
(9, 4, NULL, 'Attack on Titan Season 4 Trailer 3', 'trailer', 0, 'Videos/VideoClips/Season_4/Trailer/Attack on Titan Season 4 Trailer 3.mp4'),
(10, 5, NULL, 'Attack on Titan Season 5 Trailer 1', 'trailer', 0, 'Videos/VideoClips/Season_4/Trailer/Attack on Titan Season 5 Trailer 1.mp4'),
(11, 5, NULL, 'Attack on Titan Season 5 Trailer 2', 'trailer', 0, 'Videos/VideoClips/Season_4/Trailer/Attack on Titan Season 5 Trailer 2.mp4'),
(12, 5, NULL, 'Attack on Titan Season 5 Trailer 3', 'trailer', 0, 'Videos/VideoClips/Season_4/Trailer/Attack on Titan Season 5 Trailer 3.mp4'),
(13, 5, NULL, 'Attack on Titan Season 5 Trailer 4', 'trailer', 0, 'Videos/VideoClips/Season_4/Trailer/Attack on Titan Season 5 Trailer 4.mp4'),
(14, 5, NULL, 'Attack on Titan Season 5 Trailer 5', 'trailer', 0, 'Videos/VideoClips/Season_4/Trailer/Attack on Titan Season 5 Trailer 5.mp4'),
(15, 1, 1, 'Attack on Titan Season 1 Part 1 Opening', 'intro', 0, 'Videos/VideoClips/Season_1/Intro_Outro/Attack on Titan Season 1 Part 1 Opening.mp4'),
(16, 1, 6, 'Attack on Titan Season 1 Part 1 Ending', 'outro', 0, 'Videos/VideoClips/Season_1/Intro_Outro/Attack on Titan Season 1 Part 1 Ending.mp4'),
(17, 1, 8, 'Attack on Titan Season 1 Part 2 Opening', 'intro', 0, 'Videos/VideoClips/Season_1/Intro_Outro/Attack on Titan Season 1 Part 2 Opening.mp4'),
(18, 1, 13, 'Attack on Titan Season 1 Part 2 Ending', 'outro', 0, 'Videos/VideoClips/Season_1/Intro_Outro/Attack on Titan Season 1 Part 2 Ending.mp4'),
(19, 2, 15, 'Attack on Titan Season 2 Opening', 'intro', 0, 'Videos/VideoClips/Season_2/Intro_Outro/Attack on Titan Season 2 Opening.mp4'),
(20, 2, 27, 'Attack on Titan Season 2 Ending', 'outro', 0, 'Videos/VideoClips/Season_2/Intro_Outro/Attack on Titan Season 2 Ending.mp4'),
(21, 3, 29, 'Attack on Titan Season 3 Part 1 Opening', 'intro', 0, 'Videos/VideoClips/Season_3/Intro_Outro/Attack on Titan Season 3 Part 1 Opening.mp4'),
(22, 3, 37, 'Attack on Titan Season 3 Part 1 Ending', 'outro', 0, 'Videos/VideoClips/Season_3/Intro_Outro/Attack on Titan Season 3 Part 1 Ending.mp4'),
(23, 3, 39, 'Attack on Titan Season 3 Part 2 Opening', 'intro', 0, 'Videos/VideoClips/Season_3/Intro_Outro/Attack on Titan Season 3 Part 2 Opening.mp4'),
(24, 3, 47, 'Attack on Titan Season 3 Part 2 Ending', 'outro', 0, 'Videos/VideoClips/Season_3/Intro_Outro/Attack on Titan Season 3 Part 2 Ending.mp4'),
(25, 4, 49, 'Attack on Titan Season 4 Part 1 Opening', 'intro', 0, 'Videos/VideoClips/Season_4/Intro_Outro/Attack on Titan Season 4 Part 1 Opening.mp4'),
(26, 4, 58, 'Attack on Titan Season 4 Part 1 Ending', 'outro', 0, 'Videos/VideoClips/Season_4/Intro_Outro/Attack on Titan Season 4 Part 1 Ending.mp4'),
(27, 4, 60, 'Attack on Titan Season 4 Part 2 Opening', 'intro', 0, 'Videos/VideoClips/Season_4/Intro_Outro/Attack on Titan Season 4 Part 2 Opening.mp4'),
(28, 4, 69, 'Attack on Titan Season 4 Part 2 Ending', 'outro', 0, 'Videos/VideoClips/Season_4/Intro_Outro/Attack on Titan Season 4 Part 2 Ending.mp4'),
(29, 5, 71, 'Attack on Titan Season 4 Part 3 Opening', 'intro', 0, 'Videos/VideoClips/Season_4/Intro_Outro/Attack on Titan Season 4 Part 3 Opening.mp4'),
(30, 5, 76, 'Attack on Titan Season 4 Part 3 Ending', 'outro', 0, 'Videos/VideoClips/Season_4/Intro_Outro/Attack on Titan Season 4 Part 3 Ending.mp4'),
(31, 5, 78, 'Attack on Titan Season 4 Part 4 Opening', 'intro', 0, 'Videos/VideoClips/Season_4/Intro_Outro/Attack on Titan Season 4 Part 4 Opening.mp4'),
(32, 5, 82, 'Attack on Titan Season 4 Part 4 Ending', 'outro', 0, 'Videos/VideoClips/Season_4/Intro_Outro/Attack on Titan Season 4 Part 4 Ending.mp4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_albums_season` (`season_id`);

--
-- Indexes for table `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `navigation`
--
ALTER TABLE `navigation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `popular_artists`
--
ALTER TABLE `popular_artists`
  ADD PRIMARY KEY (`artist_id`);

--
-- Indexes for table `seasons`
--
ALTER TABLE `seasons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tracks`
--
ALTER TABLE `tracks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `album_id` (`album_id`,`track_number`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `season_id` (`season_id`,`title`),
  ADD KEY `fk_videos_track` (`track_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `artists`
--
ALTER TABLE `artists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `navigation`
--
ALTER TABLE `navigation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `popular_artists`
--
ALTER TABLE `popular_artists`
  MODIFY `artist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `seasons`
--
ALTER TABLE `seasons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tracks`
--
ALTER TABLE `tracks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `albums`
--
ALTER TABLE `albums`
  ADD CONSTRAINT `fk_albums_season` FOREIGN KEY (`season_id`) REFERENCES `seasons` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tracks`
--
ALTER TABLE `tracks`
  ADD CONSTRAINT `fk_tracks_album` FOREIGN KEY (`album_id`) REFERENCES `albums` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `fk_videos_season` FOREIGN KEY (`season_id`) REFERENCES `seasons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_videos_track` FOREIGN KEY (`track_id`) REFERENCES `tracks` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
