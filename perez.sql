-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2018 at 11:15 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perez`
--

-- --------------------------------------------------------

--
-- Table structure for table `availabledish`
--

CREATE TABLE `availabledish` (
  `id` int(11) NOT NULL,
  `dishname` varchar(128) DEFAULT NULL,
  `category` varchar(128) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dishes`
--

CREATE TABLE `dishes` (
  `id` int(11) NOT NULL,
  `package` varchar(128) NOT NULL,
  `dishname` varchar(128) NOT NULL,
  `category` varchar(128) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dishes`
--

INSERT INTO `dishes` (`id`, `package`, `dishname`, `category`) VALUES
(212, '58', 'gg', 'Dessert'),
(213, '58', 'hh', 'Drinks'),
(211, '58', 'ff', 'Seafood'),
(210, '58', 'ee', 'Vegetables'),
(209, '58', 'dd', 'Chicken'),
(208, '58', 'cc', 'Beef'),
(207, '58', 'bb', 'Pork'),
(206, '58', 'aa', 'Pasta');

-- --------------------------------------------------------

--
-- Table structure for table `foodtasting`
--

CREATE TABLE `foodtasting` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `Pasta` varchar(128) DEFAULT NULL,
  `Beef` varchar(128) DEFAULT NULL,
  `Pork` varchar(128) DEFAULT NULL,
  `Chicken` varchar(128) DEFAULT NULL,
  `Seafood` varchar(128) DEFAULT NULL,
  `Vegetables` varchar(128) DEFAULT NULL,
  `Dessert` varchar(128) DEFAULT NULL,
  `Drinks` varchar(128) DEFAULT NULL,
  `number_persons` int(11) NOT NULL,
  `date_applied` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_requested` date NOT NULL,
  `time_requested` time NOT NULL,
  `status` varchar(128) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `packagename` varchar(128) NOT NULL,
  `Pasta` varchar(128) DEFAULT NULL,
  `Beef` varchar(128) DEFAULT NULL,
  `Pork` varchar(128) DEFAULT NULL,
  `Chicken` varchar(128) DEFAULT NULL,
  `Seafood` varchar(128) DEFAULT NULL,
  `Vegetables` varchar(128) DEFAULT NULL,
  `Dessert` varchar(128) DEFAULT NULL,
  `Drinks` varchar(128) DEFAULT NULL,
  `eventtype` varchar(128) NOT NULL,
  `motif` varchar(124) NOT NULL,
  `venue` varchar(128) NOT NULL,
  `date_applied` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_requested` date NOT NULL,
  `event_time` time NOT NULL,
  `qty` varchar(128) NOT NULL,
  `price` varchar(128) NOT NULL,
  `status` varchar(128) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userid`, `packagename`, `Pasta`, `Beef`, `Pork`, `Chicken`, `Seafood`, `Vegetables`, `Dessert`, `Drinks`, `eventtype`, `motif`, `venue`, `date_applied`, `date_requested`, `event_time`, `qty`, `price`, `status`) VALUES
(79, 9, 'Package a', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Wedding Event', 'asd', 'asd', '2018-01-25 14:30:08', '2018-02-28', '08:00:00', '12134', '3640200', 'No Invoice');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `packagename` varchar(128) NOT NULL,
  `price` varchar(128) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `packagename`, `price`) VALUES
(58, 'Package a', '300');

-- --------------------------------------------------------

--
-- Table structure for table `pm`
--

CREATE TABLE `pm` (
  `id` int(11) NOT NULL,
  `receiverid` int(11) NOT NULL,
  `senderid` int(11) NOT NULL,
  `sent_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `body` varchar(2048) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pm`
--

INSERT INTO `pm` (`id`, `receiverid`, `senderid`, `sent_date`, `body`, `status`) VALUES
(58, 1, 2, '2017-07-30 11:55:34', 'hello sir', 1),
(57, 1, 3, '2017-07-30 11:55:16', 'hello sir', 1),
(56, 3, 1, '2017-07-30 11:54:39', 'hello again', 1),
(55, 3, 1, '2017-07-30 11:49:08', 'why', 1),
(54, 3, 1, '2017-07-30 11:48:59', 'hello', 1),
(53, 3, 1, '2017-07-30 11:32:44', 'hello skzhjdks sjdhkjasdhgdxjskdhdkgdf', 1),
(52, 3, 1, '2017-07-30 11:28:41', '', 1),
(51, 3, 1, '2017-07-30 11:24:56', 'hello', 1),
(50, 3, 1, '2017-07-30 05:53:09', 'hi', 1),
(47, 1, 2, '2017-07-30 05:36:42', 'hi', 1),
(46, 2, 1, '2017-07-30 05:36:14', 'hello', 1),
(45, 3, 1, '2017-07-30 05:35:37', 'hello', 1),
(49, 1, 2, '2017-07-30 05:49:00', 'hi', 1),
(48, 2, 1, '2017-07-30 05:39:05', 'hello', 1),
(41, 1, 3, '2017-07-30 04:41:31', 'yo', 1),
(40, 1, 3, '2017-07-30 04:40:51', 'yo', 1),
(39, 1, 3, '2017-07-30 04:39:09', 'yo', 1),
(38, 1, 3, '2017-07-30 04:37:14', 'yo', 1),
(37, 1, 3, '2017-07-30 04:34:59', 'yo', 1),
(26, 1, 3, '2017-07-28 10:28:28', 'hello', 1),
(27, 1, 2, '2017-07-29 05:46:12', 'hello', 1),
(28, 1, 2, '2017-07-29 05:46:55', 'hi', 1),
(29, 1, 3, '2017-07-30 04:28:15', 'yo', 1),
(30, 1, 3, '2017-07-30 04:30:05', 'yo', 1),
(31, 1, 3, '2017-07-30 04:31:43', 'yo', 1),
(32, 1, 3, '2017-07-30 04:31:56', 'yo', 1),
(33, 1, 3, '2017-07-30 04:32:51', 'yo', 1),
(34, 1, 3, '2017-07-30 04:33:14', 'yo', 1),
(35, 1, 3, '2017-07-30 04:33:38', 'yo', 1),
(36, 1, 3, '2017-07-30 04:34:34', 'yo', 1),
(59, 3, 1, '2017-07-30 11:58:41', 'nice', 1),
(60, 3, 1, '2017-07-30 11:58:46', 'nice naman', 1),
(61, 1, 2, '2017-07-31 03:12:38', 'hi', 1),
(62, 1, 3, '2017-07-31 06:33:22', 'hello', 1),
(63, 1, 2, '2017-07-31 07:29:19', 'skadhkjhsjdksjkdfkksjdfhfjkldd jdsksljdjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjsdksdlhsdkjljhsdjgsdkjkdjjdk', 1),
(64, 1, 2, '2017-07-31 07:50:45', 'hello', 1),
(68, 2, 1, '2017-07-31 08:28:13', 'yo', 1),
(69, 2, 1, '2017-07-31 08:52:54', 'hey ', 1),
(70, 1, 2, '2017-07-31 08:53:10', 'sup bro', 1),
(73, 1, 2, '2017-07-31 09:00:22', 'jg', 1),
(74, 1, 2, '2017-08-01 10:51:21', 'yo sup', 1),
(75, 1, 2, '2017-08-01 10:57:03', 'hello', 1),
(76, 1, 2, '2017-08-01 11:06:35', 'hi sir', 1),
(77, 1, 2, '2017-08-01 11:07:26', 'test', 1),
(78, 1, 2, '2017-08-01 11:09:04', 'again', 1),
(79, 1, 2, '2017-08-01 11:48:06', 'hello admin', 1),
(80, 1, 3, '2017-08-01 11:48:21', 'hello admin', 1),
(81, 1, 2, '2017-08-01 12:04:59', 'test', 1),
(82, 1, 2, '2017-08-01 12:06:36', 'hal', 1),
(83, 1, 3, '2017-08-01 12:08:26', 'skhdl', 1),
(84, 1, 2, '2017-08-01 12:12:09', 'askdh', 1),
(85, 1, 2, '2017-08-01 12:15:47', 'yo', 1),
(86, 1, 3, '2017-08-01 12:15:56', 'aer', 1),
(94, 1, 2, '2017-08-01 12:22:43', 'ok', 1),
(92, 1, 2, '2017-08-01 12:19:57', 'asdh', 1),
(90, 1, 1, '2017-08-01 12:18:14', 'jsd', 1),
(91, 1, 2, '2017-08-01 12:18:54', 'shd', 1),
(95, 2, 1, '2017-08-01 12:22:55', 'ok', 1),
(96, 1, 2, '2017-08-01 12:24:53', 'asdklfh', 1),
(97, 2, 1, '2017-08-01 12:25:03', 'ok ', 1),
(98, 1, 2, '2017-08-01 12:26:00', 'sdk', 1),
(99, 2, 1, '2017-08-01 12:26:09', 'sadj', 1),
(100, 1, 2, '2017-08-01 12:28:57', 'ok na HAHAHA', 1),
(101, 1, 3, '2017-08-01 12:29:09', 'ok na rin sa wakas', 1),
(102, 3, 1, '2017-08-01 12:29:28', 'nice', 1),
(103, 2, 1, '2017-08-01 12:29:33', 'nice', 1),
(104, 1, 2, '2017-08-01 12:32:00', 'test', 1),
(105, 2, 1, '2017-08-01 12:58:00', 'hello', 1),
(106, 1, 2, '2017-08-01 13:15:02', 'hey', 1),
(107, 2, 1, '2017-08-01 13:15:20', '?', 1),
(108, 1, 2, '2017-08-01 13:20:31', 'hello', 1),
(109, 2, 1, '2017-08-01 13:26:11', 'yo', 1),
(110, 1, 2, '2017-08-01 13:26:50', 'sadjh', 1),
(111, 1, 3, '2017-08-01 13:27:00', 'sadj', 1),
(112, 3, 1, '2017-08-01 13:27:19', 'sup', 1),
(113, 2, 1, '2017-08-01 13:27:27', 'wat', 1),
(114, 1, 2, '2017-08-01 13:28:49', 'hello', 1),
(115, 1, 2, '2017-08-02 06:44:24', 'hi', 1),
(116, 1, 3, '2017-08-02 06:45:10', 'hello', 1),
(122, 9, 1, '2017-08-02 07:06:19', 'ok na nga ba?', 1),
(121, 1, 9, '2017-08-02 07:06:03', 'hello', 1),
(120, 9, 8, '2017-08-02 07:03:27', 'hi', 1),
(123, 1, 9, '2017-08-02 07:06:44', 'yes naman ok na', 1),
(124, 9, 1, '2017-08-02 07:07:01', 'yes', 1),
(125, 1, 9, '2017-08-02 09:01:55', 'test', 1),
(126, 9, 1, '2017-08-02 09:02:29', 'hi', 0),
(127, 1, 11, '2017-08-04 15:45:33', '', 1),
(128, 1, 11, '2017-08-04 15:45:36', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `receipts`
--

CREATE TABLE `receipts` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receipts`
--

INSERT INTO `receipts` (`id`, `order_id`, `image`) VALUES
(1, 48, '20265106_1833933233288785_5720787998639845602_n.jpg'),
(2, 67, '1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `contact`, `password`, `type`) VALUES
(9, 'user', 'user', 'user', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 0),
(1, 'admin', 'admin', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(10, 'user2', 'user2', 'user2', 'user2', '7e58d63b60197ceb55a1c487989a3720', 0),
(11, 'user3', 'Jewel', 'Reventar', '09351520954', '92877af70a45fd6a2ed7fe81e1236b78', 0),
(12, 'user4', 'user4', 'user4', 'user4', '3f02ebe3d7929b091e3d8ccfde2f3bc6', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `availabledish`
--
ALTER TABLE `availabledish`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foodtasting`
--
ALTER TABLE `foodtasting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pm`
--
ALTER TABLE `pm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receipts`
--
ALTER TABLE `receipts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `availabledish`
--
ALTER TABLE `availabledish`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;
--
-- AUTO_INCREMENT for table `dishes`
--
ALTER TABLE `dishes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=230;
--
-- AUTO_INCREMENT for table `foodtasting`
--
ALTER TABLE `foodtasting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `pm`
--
ALTER TABLE `pm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;
--
-- AUTO_INCREMENT for table `receipts`
--
ALTER TABLE `receipts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
