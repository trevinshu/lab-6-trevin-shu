-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 02, 2020 at 12:49 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tshu2_dmit2025`
--

-- --------------------------------------------------------

--
-- Table structure for table `tsh_blog`
--

CREATE TABLE `tsh_blog` (
  `tsh_title` varchar(50) NOT NULL,
  `tsh_message` text NOT NULL,
  `tsh_timedate` timestamp NOT NULL DEFAULT current_timestamp(),
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tsh_blog`
--

INSERT INTO `tsh_blog` (`tsh_title`, `tsh_message`, `tsh_timedate`, `id`) VALUES
('My Second Blog Entry', 'Pagination works and it looks \"bootstrapped\" but the code is the same as the example and I didn\'t figure out how to make it work properly.', '2020-11-02 07:34:13', 33),
('My Third Blog Entry', 'My Edit page is not staying on the selected option. I know it needs a \"selected\" attribute. I just couldn\'t figure out how to put that into PHP code.', '2020-11-02 07:37:12', 34),
('My Fourth Blog Entry', 'I don\'t have any assignments due this week so I will be spending the week figuring out my mistakes on this lab and my JavaScript Lab.', '2020-11-02 07:38:47', 35),
('My Fifth Blog Entry', 'Wow five blog entries already. Awesome!  :D', '2020-11-02 07:39:15', 36),
('My Sixth Blog Entry', 'Ah new page. \r\n\r\nAwesome!  :D', '2020-11-02 07:39:47', 37),
('My Seventh Blog Entry', 'Excited to start learning Image Methods & Uploads tomorrow.  :D', '2020-11-02 07:40:47', 38),
('My Eight Blog Entry', 'Almost 1AM. Need to go to sleep.', '2020-11-02 07:41:39', 39),
('My Ninth Blog Entry', 'I really am getting bored of this theme. I need to change it for the next lab.', '2020-11-02 07:43:15', 40),
('My Tenth Blog Entry', 'Ah ten blog entries! \r\n\r\nNew page & five more blog entries to input!  :D', '2020-11-02 07:44:02', 41),
('My Eleventh Blog Entry', 'Drawing a blank on what to enter for my message.  :?', '2020-11-02 07:45:24', 42),
('My Twelfth Blog Entry', 'A few more to go and then I have to hand this lab in.', '2020-11-02 07:47:00', 43),
('My Thirteenth Blog Entry', 'Making some final checks before I wrap this lab up and submit it on Moodle.', '2020-11-02 07:47:52', 44),
('My Fourteenth Blog Entry', 'Wow fourteen blog entries & my second last entry,', '2020-11-02 07:48:42', 45),
('My First Blog Entry', 'Finished my lab. Not super happy with my work on this lab because I didn\'t figure out the challenge components.   :(', '2020-11-02 07:33:25', 32);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tsh_blog`
--
ALTER TABLE `tsh_blog`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tsh_blog`
--
ALTER TABLE `tsh_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
