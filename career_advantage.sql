-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2017 at 02:45 PM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `career_advantage`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `hashed_password` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `first_name`, `last_name`, `email`, `username`, `hashed_password`) VALUES
(4, 'Anthony', 'Agnone', 'agnone.anthony@gmail.com', 'anthonyagnone', '$2y$10$PJI4uK8pKfeP631L17xH1uU5HwM1h2mE9gbfvd5KrNJ3CQsnvO5zK'),
(5, 'Root', 'Admin', 'admin@careeradvantage.com', 'root_admin', '$2y$10$9/xhv2bpvacC.h2INf8Ow.IO/lNI2HHKA0.h3ghyhWT7HasjZIU0a');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(25) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `job` varchar(255) DEFAULT NULL,
  `resume` varchar(255) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `comment` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `name`, `job`, `resume`, `phone`, `email`, `comment`) VALUES
(15, 'Manky', 'Worker Fly/NewCastle', 'manky_resume.docx', '4564564567', 'dsdf@sdf.com', 'lksjdfjf'),
(21, 'Anthony Agnone', 'General Laborers/New Castle', 'agnone_resume.docx', '4555446789', 'butts@butts.com', 'lllll'),
(18, 'Anthony Agnone', 'Worker Fly/NewCastle', '', '8143411796', 'agnone.anthony@gmail.com', 'ffffff'),
(12, 'Amanda Barclay', 'Database Knowledge Manager/Pearl Harbor', 'barclay_resume.docx', '8142345432', 'supahotjinjer@hotmail.com', 'I\'m a hot ginger but I like to spell it with a j teehee.'),
(11, 'Yarda Yoomineister', 'Worker Bee/Boardman', 'yoomineister_resume.docx', '2344321092', 'butts@butts.com', 'Yup. I always knew it.'),
(10, 'Thomas Blahdidah', 'Worker Fly/NewCastle', 'blahdidah_resume.docx', '4555446789', 'email@address.com', 'many nights to you for many too yes'),
(9, 'Anthony Agnone', 'General Laborers/New Castle', 'agnone_resume.docx', '8143411796', 'agnone.anthony@gmail.com', 'Final Resume that\'s real?');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `class` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `description` text,
  `date` int(12) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `name`, `class`, `type`, `location`, `description`, `date`) VALUES
(1, 'Worker Bee', 'full', 'clerical', 'Boardman', 'This is totally a job', 20170720),
(2, 'Worker Fly', 'part', 'industrial', 'NewCastle', 'Another Job', 20170719),
(3, 'Office Job ', 'full', 'office', 'Hermitage', 'Another Job to be posted', 20170718),
(5, 'Other Job', 'full', 'other', 'Sharon', 'You\'re going to do some stuff.', 20170720),
(6, 'poop ', 'part', 'industrial', 'poop central', 'scooping poop', 20170720),
(7, 'General Laborers', 'full', 'other', 'New Castle', 'Wiring Experience a plus. $11.50 an hour.', 20170721),
(8, 'Database Knowledge Manager', 'part', 'other', 'Pearl Harbor', 'Be really cool and do Navy stuff. And then everything is awesome. And we\'re scubadiving tomorrow.', 20170721);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text,
  `visible` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `subject`, `message`, `visible`) VALUES
(1, 'Anthony', 'agnone.anthony@gmail.com', 'This is the First Message', 'I really wish this would just work. ', NULL),
(2, 'Anthony', 'agnone.anthony@gmail.com', 'This is the Second Message', 'This is actually working', NULL),
(4, 'Anthony', 'agnone.anthony@gmail.com', 'This is the Fourth Message', 'Redirect me to thank you please', NULL),
(7, 'Anthony Agnone', 'agnone.anthony@gmail.com', 'Atten: I need a job!', 'To whom it may concern, \r\n\r\nThat mortal man should feed upon the creature that feeds his lamp, and, like Stubb, eat him by his own light, as you may say; this seems so outlandish a thing that one must needs go a little into the history and philosophy of it. It is upon record, that three centuries ago the tongue of the Right Whale was esteemed a great delicacy in France, and commanded large prices there. Also, that in Henry VIIIth\'s time, a certain cook of the court obtained a handsome reward for inventing an admirable sauce to be eaten with barbacued porpoises, which, you\r\n\r\nThat mortal man should feed upon the creature that feeds his lamp, and, like Stubb, eat him by his own light, as you may say; this seems so outlandish a thing that one must needs go a little into the history and philosophy of it. It is upon record, that three centuries ago the tongue of the Right Whale was esteemed a great delicacy in France, and commanded large prices there. Also, that in Henry VIIIth\'s time, a certain cook of the court obtained a handsome reward for inventing an admirable sauce to be eaten with barbacued porpoises, which, you\r\n\r\nThat mortal man should feed upon the creature that feeds his lamp, and, like Stubb, eat him by his own light, as you may say; this seems so outlandish a thing that one must needs go a little into the history and philosophy of it. It is upon record, that three centuries ago the tongue of the Right Whale was esteemed a great delicacy in France, and commanded large prices there. Also, that in Henry VIIIth\'s time, a certain cook of the court obtained a handsome reward for inventing an admirable sauce to be eaten with barbacued porpoises, which, you', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_username` (`username`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
