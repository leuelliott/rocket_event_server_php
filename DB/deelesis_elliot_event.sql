-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 09, 2021 at 09:57 AM
-- Server version: 5.7.31-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `deelesis_elliot_event`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `fname` longtext NOT NULL,
  `email` longtext NOT NULL,
  `phone` longtext NOT NULL,
  `eventId` longtext NOT NULL,
  `bookCode` longtext NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `fname`, `email`, `phone`, `eventId`, `bookCode`, `created`) VALUES
(1, 'james', 'admin@admin.com', '8555008888', '2', 'hLYJdWQ62', '2020-12-21 22:41:42'),
(2, 'ssm', 'iamvictorsam@gmail.com', '08885555556', '3', 'xwjUCbsd3', '2020-12-21 23:12:00'),
(3, 'sam', 'admin@admin.com', '08089956547', '3', 'HbBdcVzR3', '2020-12-21 23:16:23'),
(4, 'Sam ', 'admin@admin.com', '08089633542', '4', '0CSihDjR4', '2020-12-22 07:02:21'),
(5, 'sam', 'beevee@admin.com', '08089633542', '4', 'HNJYlKgb4', '2020-12-22 12:13:37'),
(6, 'iam', 'janedoe@go.com', '08089633542', '5', 'AwETG1Ns5', '2020-12-22 15:14:23'),
(7, 'jsnny', 'j$@jane.com', '080963542', '5', 'W0HdkRaz5', '2020-12-23 00:41:32'),
(8, 'sam', 'del@admin.com', '08089633542', '4', 'gKe4Mosj4', '2020-12-23 02:15:59'),
(9, 'Frank', 'iamwizydele@gmail.com', '0903138248', '5', 'fy1xBUO25', '2020-12-29 12:47:36'),
(10, 'sam', 'victo@admin.ru', '08089633542', '5', 'IhoSW36L5', '2021-01-06 13:53:25'),
(11, 'sam', 'dgh@gsm.ff', '08888888858', '4', 'zoXAVJEu4', '2021-01-07 05:10:07'),
(12, 'sammy owner', 'owner@admin.com', '08089633542', '7', 'gJWnkT8X7', '2021-01-08 13:05:30'),
(13, 'jane', 'janedoe@go.com', '08089633542', '7', 'k0QAMY3G7', '2021-01-08 13:05:59'),
(14, 'jane', 'janedoe@go.comg', '08089633542', '7', '5gyBd4Zo7', '2021-01-08 13:21:08'),
(15, 'janec', 'janedoe@go.comggj', '08089633542', '7', 'GU1ciFy27', '2021-01-08 13:21:36'),
(16, 'janec', 'janedoe@go.comggjm', '08089633542', '7', '0B6ZDR1s7', '2021-01-08 13:22:18'),
(17, 'janec', 'janedoe@go.comggjmk', '08089633542', '7', 'qtX7AjzW7', '2021-01-08 13:24:02'),
(18, 'Grant Masters ', 'leuelliott@gmail.com', '07082824622', '2', 'RTzFvgkf2', '2021-01-08 20:56:11');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `name` longtext NOT NULL,
  `dateTime` longtext NOT NULL,
  `description` longtext NOT NULL,
  `feat_icon` longtext NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `def` varchar(100) NOT NULL DEFAULT 'none'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `dateTime`, `description`, `feat_icon`, `created`, `def`) VALUES
(2, 'The Ben\'s Event', '2020-12-20T13:55', '<p>This is Ben\'s Event BirthDay Party</p>', 'https://projects.deelesisuanu.com/elliot-events/images/llo.jpeg', '2020-12-18 12:56:15', 'none'),
(3, 'UnderHook Rated', '2020-12-27T19:41', '<p><b>UnderHook Rated</b></p><p>Featuring Artists Like Wizkid,, Burna Boy, Omah Lay</p>', 'https://projects.deelesisuanu.com/elliot-events/images/download.png', '2020-12-19 02:43:00', 'none'),
(4, 'Rocket Star Event', '2020-12-31T22:18', '<p>The Rockstar Event Features AgentWakala</p><p>@ <a href=\"https://www.agentwakala.com/\" target=\"_blank\">AgentWakala</a></p>', 'https://projects.deelesisuanu.com/elliot-events/images/llo.jpeg', '2020-12-20 14:19:52', 'none'),
(5, 'Wakala Real Estate', '2021-01-10T11:20', '<p>This is the Real Event Main&nbsp;</p><p><br></p><table class=\"table table-bordered\"><tbody><tr><td>S/n</td><td>Title</td><td>Description</td></tr><tr><td>1.</td><td>The Worm</td><td>The Worm\'s Presidential Stay and weal</td></tr></tbody></table><p><br></p>', 'https://projects.deelesisuanu.com/elliot-events/images/1608588868.jpg', '2020-12-21 22:14:28', 'none'),
(6, 'ssm', '445', '<p>More</p>', 'https://projects.deelesisuanu.com/elliot-events/images/image_picker2385561139197046977.jpg', '2021-01-07 08:48:37', 'block'),
(7, 'Victor Sam\'s BIRTHDAY ðŸ’–ðŸ°ðŸŽ‚ðŸŽ‚', '08/01/2021 2:00pm', '<p>The Best Birthday in the universe...</p><p>It\'s his <b><u>Birthday<sup>victor sam\'s</sup></u></b></p>', 'https://projects.deelesisuanu.com/elliot-events/images/image_picker3329849251755397303.jpg', '2021-01-07 10:04:21', 'block'),
(8, 'my bday', '2-3-2021 ', '<p>Hire</p>', 'https://projects.deelesisuanu.com/elliot-events/images/image_picker7837731906417910225.jpg', '2021-01-08 13:06:58', 'block'),
(9, 'game', '3-5', '<p>Pray</p>', 'https://projects.deelesisuanu.com/elliot-events/images/image_picker1052551239173635866.jpg', '2021-01-08 13:28:20', 'block'),
(10, 'admin@admin.com', ',5678', '<p>Delay</p>', 'https://projects.deelesisuanu.com/elliot-events/images/image_picker1335633759791874872.jpg', '2021-01-08 13:33:09', 'block'),
(11, 'admin@admi', '8', '<p>Delay</p>', 'https://projects.deelesisuanu.com/elliot-events/images/image_picker1335633759791874872.jpg', '2021-01-08 13:33:25', 'block'),
(12, 'admin@admi', '8', '<p>Delay</p>', 'https://projects.deelesisuanu.com/elliot-events/images/image_picker9177384239927871129.jpg', '2021-01-08 13:34:24', 'block'),
(13, 'rfh', '456', '<p>Dfh</p>', 'https://projects.deelesisuanu.com/elliot-events/images/image_picker815867989298440094.jpg', '2021-01-08 13:36:16', 'block'),
(14, 'good', '4566', '<p>Test</p>', 'https://projects.deelesisuanu.com/elliot-events/images/image_picker7715605733094532595.jpg', '2021-01-08 14:07:53', 'block');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
