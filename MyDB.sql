-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 12, 2018 at 07:36 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `MyDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `msg_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`msg_id`, `user_id`, `message`, `time`) VALUES
(1, 0, 'hi', 1520574883),
(2, 1, 'hi', 1520574963),
(3, 1, 'Hello', 1520575203),
(4, 2, 'Hi admin', 1520575311),
(5, 2, 'How are you doing ??', 1520575357),
(6, 1, 'Im doing Great :)', 1520575370),
(7, 6, 'hello Admin', 1520717952),
(8, 2, 'Oh hi ... I''m not admin', 1520717967),
(9, 2, 'hello', 1520807725);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `ID` int(11) NOT NULL,
  `uname` text NOT NULL,
  `text` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`ID`, `uname`, `text`, `time`) VALUES
(1, 'admin', 'the first comment ever in this app', '2017-12-11 05:04:39'),
(3, 'admin', 'this the second ever in this app', '2017-12-11 05:29:42'),
(4, 'admin', 'this is my first comment through the php-mysql code -- hope it works', '2017-12-11 06:39:56'),
(5, 'admin', 'comment number 5 . before redirect back to the home with frame = home.php', '2017-12-11 07:00:38'),
(6, 'admin', 'This is the first post ever i am sending through index.php', '2017-12-12 05:53:16'),
(7, 'admin', 'first comment sent that came back into the Web UI', '2017-12-12 06:28:04'),
(8, 'admin', 'showing to ajmal and saravana', '2017-12-12 07:28:43'),
(9, 'admin', 'a simple health check', '2017-12-12 07:35:03'),
(10, 'admin', 'a simple health check 2', '2017-12-12 07:36:13'),
(11, 'admin', 'I just changed the header to home.php', '2017-12-13 04:51:29'),
(12, 'admin', 'A small glitch has happened ... comments are not working now', '2017-12-13 05:39:48'),
(13, 'admin', 'comments are working now ... working on the profile page and its backend tech.', '2017-12-14 04:23:27'),
(14, 'admin', 'Hi Wisam....good work mate', '2017-12-17 12:32:15'),
(15, 'wisahmed', 'Finally a user, other than admin.', '2017-12-18 13:40:29'),
(16, 'sfq', 'Good Job man', '2017-12-19 06:52:13'),
(17, 'wisahmed', 'hello', '2018-01-18 06:00:46'),
(18, 'test_user1', 'The Friend functionality Concept is also covered .... moving on to Messages now :)', '2018-01-30 11:47:54'),
(19, 'wisahmed', 'Working on the chat use case. Backend tech is almost figured out. I Have a little trial and error to be done to get to one to one chat. Group chat works great... BTW!!!', '2018-03-11 07:17:24'),
(20, 'wisahmed', 'successfully completed Chat and Almost done with photos as well :)', '2018-04-03 06:06:27');

-- --------------------------------------------------------

--
-- Table structure for table `comment_cmnt`
--

CREATE TABLE `comment_cmnt` (
  `cmnt_ID` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `uname` text NOT NULL,
  `text` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment_cmnt`
--

INSERT INTO `comment_cmnt` (`cmnt_ID`, `ID`, `uname`, `text`, `time`) VALUES
(1, 1, 'admin', 'first ever comment posted by the admin (going through MySQL)', '2017-12-12 07:07:58'),
(2, 7, 'admin', 'testing 1 2 3 ...', '2017-12-12 07:14:26'),
(3, 8, 'admin', 'first comment ... for this', '2017-12-12 07:29:09'),
(4, 11, 'admin', 'i feel like i want to comment on this one just a little bit...', '2017-12-13 04:51:51'),
(17, 10, 'admin', 'postid 11 was a little too crowded for testing ...', '2017-12-13 04:58:03'),
(18, 12, 'admin', 'testing 1 2 3 ...', '2017-12-13 05:46:09'),
(19, 12, 'admin', 'testing 1 2 3 4 ...', '2017-12-13 06:37:55'),
(20, 11, 'admin', 'testing 1 2 3 4 5 ...', '2017-12-13 06:38:10'),
(21, 14, 'admin', 'Thumps up', '2017-12-17 12:32:32'),
(22, 14, 'admin', 'Thumps up', '2017-12-17 12:32:34'),
(23, 15, 'wisahmed', 'Im gateful to be here.', '2017-12-18 13:42:23'),
(24, 15, 'wisahmed', 'just updated my profile and checking a few stuff', '2017-12-18 13:48:09'),
(25, 15, 'sfq', 'fucking app.', '2017-12-19 06:51:25'),
(26, 16, 'admin', 'poda pannu .. :)', '2017-12-19 06:52:25'),
(27, 16, 'admin', 'sorry my mistake ... panni ennanu kavi udheshichathu', '2017-12-19 06:53:10'),
(28, 19, 'wisahmed', 'I just noticed that noticed when you post a comment the entire Post use case is repeated ... I think there is something wrong with the div or i might have called the same thing twice in two different places.', '2018-03-11 07:20:05');

-- --------------------------------------------------------

--
-- Table structure for table `friend_req`
--

CREATE TABLE `friend_req` (
  `init` varchar(255) NOT NULL,
  `recv` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `frnd_tbl`
--

CREATE TABLE `frnd_tbl` (
  `f1` varchar(255) NOT NULL,
  `f2` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `frnd_tbl`
--

INSERT INTO `frnd_tbl` (`f1`, `f2`, `id`) VALUES
('wisahmed', 'admin', 7),
('test_user1', 'admin', 8),
('test_user2', 'admin', 9),
('test_user3', 'admin', 10),
('wisahmed', 'test_user1', 11),
('wisahmed', 'test_user2', 12),
('saratprakash', 'wisahmed', 13),
('peekaboo', 'wisahmed', 14),
('sfq', 'wisahmed', 15);

-- --------------------------------------------------------

--
-- Table structure for table `msg`
--

CREATE TABLE `msg` (
  `msg_id` int(11) NOT NULL,
  `f_init_id` int(255) NOT NULL,
  `f_recv_id` int(255) NOT NULL,
  `message` text NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msg`
--

INSERT INTO `msg` (`msg_id`, `f_init_id`, `f_recv_id`, `message`, `time`) VALUES
(1, 1, 2, 'Hi There!!!', 1520719965),
(2, 2, 1, 'Hello :)', 1520719965),
(3, 2, 6, 'Hi There!!!', 1520720098),
(4, 6, 2, 'Hello How are you?', 1520720098),
(5, 7, 2, 'Hi', 1521022953),
(6, 2, 7, 'hello', 1521023294),
(7, 7, 2, 'Congrats on the small win !!', 1521023341),
(8, 2, 7, 'Thanks mate :)', 1521023359),
(9, 2, 7, 'Hey you there !!!?', 1521096540),
(10, 9, 2, 'jsdf', 1522848566),
(11, 2, 9, 'Hey punda mon', 1522848570),
(12, 9, 2, 'myraaa', 1522848576),
(13, 2, 9, 'athu ninte thandha', 1522848591),
(14, 9, 2, 'baa puyipu parayam', 1522848593),
(15, 2, 9, 'Yes.', 1522848619),
(16, 9, 2, 'wow!!!', 1522848679),
(17, 2, 9, 'Yes Technical thallu :)', 1522848699),
(18, 9, 2, 'avamaru tour poyathaa', 1522848708),
(19, 9, 2, 'orappa', 1522848713),
(20, 2, 9, 'Friendinte kalyan ennanu ennodu paranje', 1522848795),
(21, 2, 9, 'Ajmal aniyan kodukkan oru microphone vangittundu', 1522850225),
(22, 9, 2, 'dg', 1522850226),
(23, 9, 2, 'df', 1522850227),
(24, 9, 2, 'df', 1522850227),
(25, 9, 2, 'dsf', 1522850229),
(26, 9, 2, 'dsfsd', 1522850229),
(27, 9, 2, 'myrae.. kunne..pundamon', 1522850292),
(28, 2, 9, 'same to you', 1522850332),
(29, 2, 5, 'Hi Ashwin', 1522850397),
(30, 5, 2, 'hi back!! :)', 1522850409),
(31, 2, 5, 'sorry about that bro. The onlyway put of this page is Back Button on the browser', 1522850470),
(32, 2, 5, '*way out of this page', 1522850487),
(33, 2, 9, 'Bro Nishante Update ninakkariyo ??', 1522850670),
(34, 2, 3, 'Hello KS', 1523265351);

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `ID` int(11) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `dp` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`ID`, `uname`, `pass`, `fname`, `lname`, `dp`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', 'admin/data/thumb/thumb_beautiful-wallpaper-download-1.jpg'),
(2, 'wisahmed', 'password', 'Wisam', 'Wisam', 'wisahmed/data/thumb/thumb_beautiful-wallpaper_279.jpg'),
(3, 'sfq', 'shafeeque', 'Shafeeque', 'Shafeeque', NULL),
(4, 'Jagadish.gowda', '9008004888', 'Jagadish', 'Jagadish', NULL),
(5, 'peekaboo', '123456', 'TheRagerWarrior', 'TheRagerWarrior', NULL),
(6, 'test_user1', 'test', 'Test1', 'Test1', NULL),
(7, 'test_user2', 'test', 'Test2', 'Test2', NULL),
(8, 'test_user3', 'test', 'Test3', 'Test3', NULL),
(9, 'saratprakash', 'wisammyra', 'sarat', 'prakash', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `comment_cmnt`
--
ALTER TABLE `comment_cmnt`
  ADD PRIMARY KEY (`cmnt_ID`);

--
-- Indexes for table `frnd_tbl`
--
ALTER TABLE `frnd_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `msg`
--
ALTER TABLE `msg`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `comment_cmnt`
--
ALTER TABLE `comment_cmnt`
  MODIFY `cmnt_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `frnd_tbl`
--
ALTER TABLE `frnd_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `msg`
--
ALTER TABLE `msg`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
