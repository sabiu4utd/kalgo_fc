-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 11, 2023 at 07:51 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kalgo_soccer`
--

-- --------------------------------------------------------

--
-- Table structure for table `fixtures`
--

DROP TABLE IF EXISTS `fixtures`;
CREATE TABLE IF NOT EXISTS `fixtures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `leagueid` int(11) NOT NULL,
  `seasonid` int(11) NOT NULL,
  `awayTeamId` int(11) NOT NULL,
  `awayTeam` varchar(55) NOT NULL,
  `homeTeamId` int(11) NOT NULL,
  `homeTeam` varchar(55) NOT NULL,
  `date` varchar(15) NOT NULL,
  `venue` varchar(155) NOT NULL,
  `time` varchar(10) NOT NULL,
  `awayGoal` varchar(11) NOT NULL DEFAULT '-',
  `homeGoal` varchar(11) NOT NULL DEFAULT '-',
  `status` enum('fixture','result') NOT NULL,
  `round` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fixtures`
--

INSERT INTO `fixtures` (`id`, `leagueid`, `seasonid`, `awayTeamId`, `awayTeam`, `homeTeamId`, `homeTeam`, `date`, `venue`, `time`, `awayGoal`, `homeGoal`, `status`, `round`) VALUES
(1, 1, 1, 2, 'Arsenal', 1, 'Man', '2022-12-08', 'Fillin sukuwa', '16:38', '1', '3', 'result', '0'),
(2, 1, 1, 3, 'Chelsea', 1, 'Man', '2022-12-09', 'Fillin sukuwa', '11:09', '5', '7', 'result', '0'),
(3, 1, 1, 4, 'Manchester', 1, 'Man', '2022-12-09', 'Fillin sukuwa', '11:07', '1', '4', 'result', '0'),
(4, 1, 1, 1, 'Man', 5, 'Liverpool', '2022-12-09', 'Fillin sukuwa', '10:08', '5', '1', 'result', '0'),
(5, 1, 1, 3, 'Chelsea', 2, 'Arsenal', '2022-12-09', 'Filin Sarki', '10:09', '1', '2', 'result', '0'),
(6, 1, 1, 2, 'Arsenal', 4, 'Manchester', '2022-12-09', 'Fillin sukuwa', '10:06', '3', '3', 'result', '0'),
(7, 1, 1, 5, 'Liverpool', 2, 'Arsenal', '2022-12-07', 'Filin Sarki', '21:14', '4', '3', 'result', '0'),
(8, 1, 1, 4, 'Manchester', 3, 'Chelsea', '2022-12-08', 'Fillin sukuwa', '16:47', '3', '6', 'result', '0'),
(9, 1, 1, 5, 'Liverpool', 3, 'Chelsea', '2022-12-09', 'Fillin sukuwa', '09:07', '5', '2', 'result', '0'),
(10, 1, 1, 5, 'Liverpool', 4, 'Manchester', '2022-12-08', 'Filin Sarki', '16:44', '2', '3', 'result', '0'),
(12, 2, 1, 2, 'Arsenal', 1, 'Man', '2022-12-21', 'Filin Sarki', '13:30', '1', '2', 'result', 'First Round'),
(13, 2, 1, 5, 'Liverpool', 3, 'Chelsea', '2022-12-20', 'Anfield', '16:36', '3', '1', 'result', 'First Round'),
(15, 3, 1, 2, 'Arsenal', 1, 'Man', '2022-12-20', 'GSS Kalgo', '19:07', '0', '3', 'result', 'Champion'),
(16, 3, 1, 1, 'Man', 2, 'Arsenal', '2022-12-20', 'GSS Kalgo', '19:08', '1', '1', 'result', 'Champion'),
(17, 3, 1, 4, 'Manchester', 1, 'Man', '2022-12-20', 'GSS Kalgo', '23:12', '1', '2', 'result', 'Champion'),
(18, 3, 1, 1, 'Man', 4, 'Manchester', '2022-12-20', 'GSS Kalgo', '20:10', '3', '2', 'result', 'Champion'),
(19, 3, 1, 4, 'Manchester', 2, 'Arsenal', '2022-12-20', 'GSS Kalgo', '23:14', '3', '3', 'result', 'Champion'),
(20, 3, 1, 2, 'Arsenal', 4, 'Manchester', '2022-12-20', 'GSS Kalgo', '21:12', '2', '1', 'result', 'Champion'),
(21, 3, 1, 5, 'Liverpool', 3, 'Chelsea', '2022-12-20', 'GSS Kalgo', '23:15', '2', '2', 'result', 'Champion'),
(22, 3, 1, 3, 'Chelsea', 5, 'Liverpool', '2022-12-20', 'GSS Kalgo', '12:16', '3', '3', 'result', 'Champion'),
(23, 3, 1, 6, 'Tottenham', 3, 'Chelsea', '2022-12-20', 'GSS Kalgo', '23:16', '3', '2', 'result', 'Champion'),
(24, 3, 1, 3, 'Chelsea', 6, 'Tottenham', '2022-12-20', 'GSS Kalgo', '21:14', '-', '-', 'fixture', 'Champion'),
(25, 3, 1, 6, 'Tottenham', 5, 'Liverpool', '2022-12-20', 'GSS Kalgo', '22:16', '-', '-', 'fixture', 'Champion'),
(26, 3, 1, 5, 'Liverpool', 6, 'Tottenham', '2022-12-20', 'GSS Kalgo', '23:18', '-', '-', 'fixture', 'Champion');

-- --------------------------------------------------------

--
-- Table structure for table `leagues`
--

DROP TABLE IF EXISTS `leagues`;
CREATE TABLE IF NOT EXISTS `leagues` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` enum('Premier League','FA Cup','Champions League') NOT NULL,
  `seasonid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leagues`
--

INSERT INTO `leagues` (`id`, `type`, `seasonid`) VALUES
(1, 'Premier League', 0),
(2, 'FA Cup', 0),
(3, 'Champions League', 0);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(55) NOT NULL,
  `contents` longtext NOT NULL,
  `date_posted` varchar(55) NOT NULL,
  `posted_by` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `officials`
--

DROP TABLE IF EXISTS `officials`;
CREATE TABLE IF NOT EXISTS `officials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(55) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `passport` varchar(255) NOT NULL,
  `position` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

DROP TABLE IF EXISTS `players`;
CREATE TABLE IF NOT EXISTS `players` (
  `player_id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(55) NOT NULL,
  `jersey_number` int(11) NOT NULL,
  `position` varchar(25) NOT NULL,
  `dob` int(10) NOT NULL,
  `teamid` int(11) NOT NULL,
  `passport` varchar(255) NOT NULL,
  PRIMARY KEY (`player_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`player_id`, `fullname`, `jersey_number`, `position`, `dob`, `teamid`, `passport`) VALUES
(1, 'Sabiu Lawal', 4, 'Left Back', 2022, 6, '96c447ee3f6cf9652be6024d39d88a62.png'),
(2, 'Dea Gea', 1, 'Goal Keeper', 2022, 1, '7b7855497fbc4810c80626671f2d0007.jpg'),
(3, 'Ramsdale', 1, 'Goal Keeper', 2022, 2, 'f8a66f3fa9a72f1ae86cb50276f3157d.jpg'),
(4, 'Ziyech', 11, 'Right Winger', 2022, 3, 'efeb11e22221b782f833281a799ae27f.jpg'),
(5, 'Maharez', 10, 'Left Winger', 2022, 4, 'df15b6d2d1d8acf4f9ff56fa7c57adee.jpg'),
(6, 'Salah', 11, 'Striker', 2022, 5, '4051deb4ca152ce28e9832788380b3b8.jpg'),
(7, 'Bruno Fanadez', 8, 'Mid Fielder', 2022, 1, 'd232ff2958489c3faa709c25c0895645.jpg'),
(8, 'Lisandro Martinex', 6, 'Central Depender', 2022, 1, '150f043e6d6eb88b1348a43edc3cce54.png'),
(9, 'Moussa Dembele', 8, 'Mid Fielder', 2022, 6, 'fb1406dbd1cbe0856c31a2c949661b35.png');

-- --------------------------------------------------------

--
-- Table structure for table `scorers`
--

DROP TABLE IF EXISTS `scorers`;
CREATE TABLE IF NOT EXISTS `scorers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `leagueid` int(11) NOT NULL,
  `seasonid` int(11) NOT NULL,
  `playerid` int(11) NOT NULL,
  `team_scored_against` int(11) NOT NULL,
  `goals` int(11) NOT NULL COMMENT 'Premeir Goals',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scorers`
--

INSERT INTO `scorers` (`id`, `leagueid`, `seasonid`, `playerid`, `team_scored_against`, `goals`) VALUES
(1, 1, 1, 7, 2, 1),
(2, 1, 1, 7, 2, 1),
(3, 1, 1, 7, 2, 1),
(4, 1, 1, 7, 2, 1),
(5, 1, 1, 7, 2, 1),
(6, 1, 1, 6, 2, 1),
(7, 1, 1, 6, 2, 1),
(8, 1, 1, 6, 2, 1),
(9, 1, 1, 6, 2, 1),
(10, 1, 1, 5, 2, 1),
(11, 1, 1, 5, 2, 1),
(12, 1, 1, 5, 2, 1),
(13, 1, 1, 3, 7, 1),
(14, 1, 1, 9, 11, 1),
(15, 1, 1, 9, 11, 1),
(16, 1, 1, 9, 11, 1),
(17, 1, 1, 9, 11, 1),
(18, 1, 1, 9, 11, 1),
(19, 1, 1, 9, 11, 1),
(20, 1, 1, 9, 11, 1),
(21, 2, 1, 8, 10, 1),
(22, 2, 1, 8, 10, 1),
(23, 2, 1, 5, 5, 1),
(24, 2, 1, 5, 5, 1),
(25, 2, 1, 5, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `seasons`
--

DROP TABLE IF EXISTS `seasons`;
CREATE TABLE IF NOT EXISTS `seasons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `season` varchar(55) NOT NULL,
  `status` enum('inactive','active') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seasons`
--

INSERT INTO `seasons` (`id`, `season`, `status`) VALUES
(1, '2021/2022', 'active'),
(2, '2022/2023', 'inactive'),
(3, '2023/2024', 'inactive'),
(4, '2024/2025', 'inactive'),
(5, '2025/2026', 'inactive'),
(6, '2026/2027', 'inactive'),
(7, '2027/2028', 'inactive'),
(8, '2028/2029', 'inactive'),
(9, '2029/2030', 'inactive'),
(10, '2030/2031', 'inactive'),
(20, '2030/2031', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `standing`
--

DROP TABLE IF EXISTS `standing`;
CREATE TABLE IF NOT EXISTS `standing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `leagueid` int(11) NOT NULL,
  `teamid` int(11) NOT NULL,
  `seasonid` int(11) NOT NULL,
  `mp` int(11) NOT NULL,
  `win` int(11) NOT NULL,
  `draw` int(11) NOT NULL,
  `lose` int(11) NOT NULL,
  `gf` int(11) NOT NULL,
  `ga` int(11) NOT NULL,
  `gd` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  `groop` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `standing`
--

INSERT INTO `standing` (`id`, `leagueid`, `teamid`, `seasonid`, `mp`, `win`, `draw`, `lose`, `gf`, `ga`, `gd`, `points`, `groop`) VALUES
(1, 1, 1, 1, 9, 9, 0, 0, 34, 10, 24, 27, ''),
(3, 1, 2, 1, 8, 1, 1, 6, 11, 22, -11, 4, ''),
(4, 1, 3, 1, 5, 1, 0, 4, 15, 20, -5, 3, ''),
(5, 1, 4, 1, 4, 1, 1, 2, 10, 15, -5, 4, ''),
(6, 1, 5, 1, 5, 3, 0, 2, 15, 14, 1, 9, ''),
(21, 3, 1, 1, 4, 3, 1, 0, 9, 4, 5, 10, 'A'),
(22, 3, 2, 1, 4, 1, 2, 1, 6, 8, -2, 5, 'A'),
(23, 3, 3, 1, 3, 0, 2, 1, 7, 8, -1, 2, 'A'),
(24, 3, 4, 1, 4, 0, 1, 3, 7, 10, -3, 1, 'B'),
(25, 3, 5, 1, 2, 0, 2, 0, 5, 5, 0, 2, 'B'),
(26, 3, 6, 1, 1, 1, 0, 0, 3, 2, 1, 3, 'B');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
CREATE TABLE IF NOT EXISTS `teams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `team_name` varchar(55) NOT NULL,
  `coach_name` varchar(55) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `coach_passport` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `team_name`, `coach_name`, `phone_number`, `coach_passport`) VALUES
(1, 'Man Utd', 'Sabiu', '808088080', '361864defb528590a40418cf8d904fe0.jpg'),
(2, 'Arsenal', 'Arteta', '23565666865', 'ccc5ece019bd94db647afba3b57ea756.jpg'),
(3, 'Chelsea', 'Tuchel', '165362656565', '952faa39553258dfb9edc8d84dc9c9aa.jpg'),
(4, 'Manchester City', 'Pep', '544546545', 'eab8f425803de4ca4532664f4974e366.jpg'),
(5, 'Liverpool', 'Klopp', '546958523525', '3090b3453a9fb536a9b6a920db7e1e14.jpg'),
(6, 'Tottenham', 'Conte', '45643524153', '14775b3e489c74e6c1df84bb3c09853e.jpg'),
(7, 'Leicester City', 'Rodgers', '4564654534', '9343f0287df97d02c83e62f1ba521d8b.jpg'),
(8, 'Newcastle United', 'Padew', '45641542354', '75c4962a65a49bb4114fe98b29799aff.jpg'),
(9, 'Brentford', 'Unknown', '74512415212.', 'ed97569889d62782bb94e98e4d98b9ce.jpg'),
(10, 'Brighton', 'Pocchetino', '655656352', '440f8e847c857c95a87c04582a90ebe9.jpg'),
(11, 'Aston Villa', 'Emery', '4742544251', '9ed727232cde997f1ea5bb961507f2b0.jpg'),
(12, 'Wolves', 'Unk', '543412452', '0d3fe613d94a5f36796840d880ab6b62.jpg'),
(13, 'Southernhapton', 'Ten Hag', '54421321', '3235f0a49fa5b69563191543e48adfa6.jpg'),
(14, 'Burnley', 'gdtgfbf', 'fghfyhgf', '6dd0816e05ae48f444c95b857331d106.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pin` varchar(25) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `role` enum('official','coach','player') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `pin`, `fullname`, `phone`, `role`) VALUES
(1, '1234', 'Sabiu Lawali Tsafe', '07067555836', 'official');

-- --------------------------------------------------------

--
-- Table structure for table `winners`
--

DROP TABLE IF EXISTS `winners`;
CREATE TABLE IF NOT EXISTS `winners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teamid` int(11) NOT NULL,
  `leagueid` int(11) NOT NULL,
  `seasonid` int(11) NOT NULL,
  `goal_scored` int(11) NOT NULL,
  `goal_concede` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `winners`
--

INSERT INTO `winners` (`id`, `teamid`, `leagueid`, `seasonid`, `goal_scored`, `goal_concede`, `points`) VALUES
(1, 1, 1, 1, 123, 50, 101),
(2, 7, 1, 1, 33, 5, 32),
(3, 1, 2, 1, 123, 41, 32),
(4, 9, 3, 1, 123, 50, 32),
(5, 10, 3, 5, 123, 50, 32),
(6, 7, 2, 4, 123, 41, 101),
(7, 10, 3, 5, 123, 50, 98),
(8, 7, 2, 4, 33, 50, 101);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
