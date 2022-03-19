-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2022 at 04:34 PM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_com`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cr_id` int(11) NOT NULL,
  `cr_pr_fk` int(11) NOT NULL,
  `cr_us_fk` int(11) NOT NULL,
  `crt_sel_fk` int(11) NOT NULL,
  `add_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `p_size` varchar(121) NOT NULL,
  `p_color` varchar(50) NOT NULL,
  `p_price` float NOT NULL,
  `qty` int(11) NOT NULL,
  `total_amt` float NOT NULL,
  `discount` int(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cr_id`, `cr_pr_fk`, `cr_us_fk`, `crt_sel_fk`, `add_on`, `p_size`, `p_color`, `p_price`, `qty`, `total_amt`, `discount`) VALUES
(12, 10, 1, 1, '2021-10-01 16:21:40', '221', 'maroon', 100, 1, 90, 10),
(14, 3, 1, 1, '2021-10-01 16:21:44', '', '', 12500, 1, 12500, 0),
(15, 1, 1, 1, '2021-10-01 16:21:48', 'sjkadh', 'red', 25000, 1, 23800, 1200),
(16, 12, 1, 1, '2021-10-01 17:01:56', '', '', 1256, 1, 1200, 56),
(17, 9, 1, 1, '2021-10-02 18:05:04', '', '', 123, 1, -2020, 2143),
(18, 22, 1, 1, '2021-12-05 07:33:30', '', '', 2999, 1, 2800, 199);

-- --------------------------------------------------------

--
-- Table structure for table `customer_user`
--

CREATE TABLE `customer_user` (
  `cust_id` int(11) NOT NULL,
  `fname` varchar(220) NOT NULL,
  `lname` varchar(220) NOT NULL,
  `email` varchar(210) NOT NULL,
  `ph_num` bigint(16) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `cust_addr` varchar(5600) NOT NULL,
  `cust_avtar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_user`
--

INSERT INTO `customer_user` (`cust_id`, `fname`, `lname`, `email`, `ph_num`, `pass`, `cust_addr`, `cust_avtar`) VALUES
(1, 'aditya', 'chhapekar', 'cust@gmail.com', 7083199407, '123', 'Gajana Nagar garkheda Parisar Aurngabad', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `delhivery_tab`
--

CREATE TABLE `delhivery_tab` (
  `del_id` int(11) NOT NULL,
  `sel_id` int(11) NOT NULL,
  `b_fname` varchar(120) NOT NULL,
  `b_lname` varchar(120) NOT NULL,
  `b_ph_num` bigint(12) NOT NULL,
  `b_pass` varchar(120) NOT NULL,
  `d_b_status` varchar(120) NOT NULL,
  `ad_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delhivery_tab`
--

INSERT INTO `delhivery_tab` (`del_id`, `sel_id`, `b_fname`, `b_lname`, `b_ph_num`, `b_pass`, `d_b_status`, `ad_on`) VALUES
(1, 1, 'boy sham', 'boy kumar', 1212121212, '125', 'Absent', '2021-10-06 04:42:56'),
(2, 1, 'test sec', 'test lsec', 87623583465, 'shadgfg', 'present', '2021-09-10 18:48:25'),
(3, 1, 'aditya', 'sharma', 1212121212, '123', 'present', '2021-10-06 04:32:35');

-- --------------------------------------------------------

--
-- Table structure for table `ord_details`
--

CREATE TABLE `ord_details` (
  `ord_id` int(11) NOT NULL,
  `u_fk` int(11) NOT NULL,
  `ord_sel_fk` int(11) NOT NULL,
  `ofname` varchar(120) NOT NULL,
  `olname` varchar(120) NOT NULL,
  `oemail` varchar(120) NOT NULL,
  `oaddr` varchar(560) NOT NULL,
  `total_amt` int(210) NOT NULL,
  `pay_mode` varchar(120) NOT NULL,
  `pay_status` varchar(120) NOT NULL,
  `ord_st` varchar(120) NOT NULL,
  `dboy_id` int(60) NOT NULL,
  `ad_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ord_details`
--

INSERT INTO `ord_details` (`ord_id`, `u_fk`, `ord_sel_fk`, `ofname`, `olname`, `oemail`, `oaddr`, `total_amt`, `pay_mode`, `pay_status`, `ord_st`, `dboy_id`, `ad_on`) VALUES
(51, 1, 1, 'aditya', 'chhapekar', 'cust@gmail.com', 'Gajana Nagar garkheda Parisar Aurngabad', 37600, 'stripe', 'pending', '', 0, '2021-10-01 16:10:17'),
(52, 1, 1, 'aditya', 'chhapekar', 'cust@gmail.com', 'Gajana Nagar garkheda Parisar Aurngabad', 37600, 'stripe', 'pending', '', 0, '2021-10-01 16:10:17'),
(53, 1, 1, 'aditya', 'chhapekar', 'cust@gmail.com', 'Gajana Nagar garkheda Parisar Aurngabad', 37600, 'cod', 'pending', '', 0, '2021-10-01 16:54:51'),
(54, 1, 1, 'aditya', 'chhapekar', 'cust@gmail.com', 'Gajana Nagar garkheda Parisar Aurngabad', 37600, 'cod', 'pending', '', 0, '2021-10-01 16:54:52'),
(55, 1, 1, 'aditya', 'chhapekar', 'cust@gmail.com', 'Gajana Nagar garkheda Parisar Aurngabad', 37600, 'cod', 'pending', '', 0, '2021-10-01 16:54:53'),
(56, 1, 1, 'aditya', 'chhapekar', 'cust@gmail.com', 'Gajana Nagar garkheda Parisar Aurngabad', 37600, 'cod', 'pending', '', 0, '2021-10-01 16:54:53'),
(57, 1, 1, 'aditya', 'chhapekar', 'cust@gmail.com', 'Gajana Nagar garkheda Parisar Aurngabad', 37600, 'cod', 'pending', '', 0, '2021-10-01 16:54:54'),
(58, 1, 1, 'aditya', 'chhapekar', 'cust@gmail.com', 'Gajana Nagar garkheda Parisar Aurngabad', 37600, 'cod', 'pending', '', 0, '2021-10-01 16:54:55'),
(59, 1, 1, 'aditya', 'chhapekar', 'cust@gmail.com', 'Gajana Nagar garkheda Parisar Aurngabad', 37600, 'cod', 'pending', '', 0, '2021-10-01 16:54:55'),
(60, 1, 1, 'aditya', 'chhapekar', 'cust@gmail.com', 'Gajana Nagar garkheda Parisar Aurngabad', 37600, 'cod', 'pending', '', 0, '2021-10-01 16:54:55'),
(61, 1, 1, 'aditya', 'chhapekar', 'cust@gmail.com', 'Gajana Nagar garkheda Parisar Aurngabad', 37600, 'cod', 'pending', '', 0, '2021-10-01 16:54:55'),
(62, 1, 1, 'aditya', 'chhapekar', 'cust@gmail.com', 'Gajana Nagar garkheda Parisar Aurngabad', 37600, 'cod', 'pending', '', 0, '2021-10-01 16:54:55'),
(63, 1, 1, 'aditya', 'chhapekar', 'cust@gmail.com', 'Gajana Nagar garkheda Parisar Aurngabad', 38856, 'cod', 'pending', '', 0, '2021-10-02 07:53:25'),
(64, 1, 1, 'aditya', 'chhapekar', 'cust@gmail.com', 'Gajana Nagar garkheda Parisar Aurngabad', 38856, 'cod', 'pending', '', 0, '2021-10-02 08:02:47'),
(65, 1, 1, 'aditya', 'chhapekar', 'cust@gmail.com', 'Gajana Nagar garkheda Parisar Aurngabad', 38856, 'cod', 'pending', '', 0, '2021-10-02 08:07:20'),
(66, 1, 1, 'aditya', 'chhapekar', 'cust@gmail.com', 'Gajana Nagar garkheda Parisar Aurngabad', 38856, 'cod', 'pending', '', 0, '2021-10-02 08:07:57'),
(67, 1, 1, 'aditya', 'chhapekar', 'cust@gmail.com', 'Gajana Nagar garkheda Parisar Aurngabad', 38856, 'cod', 'pending', '', 0, '2021-10-02 08:08:43'),
(68, 1, 1, 'aditya', 'chhapekar', 'cust@gmail.com', 'Gajana Nagar garkheda Parisar Aurngabad', 38856, 'cod', 'pending', '', 0, '2021-10-02 08:09:36'),
(69, 1, 1, 'aditya', 'chhapekar', 'cust@gmail.com', 'Gajana Nagar garkheda Parisar Aurngabad', 38856, 'cod', 'pending', '', 0, '2021-10-02 08:10:59'),
(70, 1, 1, 'aditya', 'chhapekar', 'cust@gmail.com', 'Gajana Nagar garkheda Parisar Aurngabad', 38856, 'cod', 'pending', '', 0, '2021-10-02 08:13:46'),
(71, 1, 1, 'aditya', 'chhapekar', 'cust@gmail.com', 'Gajana Nagar garkheda Parisar Aurngabad', 38856, 'cod', 'pending', '', 0, '2021-10-02 08:14:41'),
(72, 1, 1, 'aditya', 'chhapekar', 'cust@gmail.com', 'Gajana Nagar garkheda Parisar Aurngabad', 38856, 'cod', 'pending', '', 0, '2021-10-02 08:16:43'),
(73, 1, 1, 'aditya', 'chhapekar', 'cust@gmail.com', 'Gajana Nagar garkheda Parisar Aurngabad', 38856, 'cod', 'pending', '', 0, '2021-10-02 08:17:19'),
(74, 1, 1, 'aditya', 'chhapekar', 'cust@gmail.com', 'Gajana Nagar garkheda Parisar Aurngabad', 38856, 'cod', 'pending', '', 0, '2021-10-02 08:18:23'),
(75, 1, 1, 'aditya', 'chhapekar', 'cust@gmail.com', 'Gajana Nagar garkheda Parisar Aurngabad', 38856, 'cod', 'pending', '', 0, '2021-10-02 08:19:59'),
(76, 1, 1, 'aditya', 'chhapekar', 'cust@gmail.com', 'Gajana Nagar garkheda Parisar Aurngabad', 38856, 'cod', 'pending', '', 0, '2021-10-02 08:20:33'),
(77, 1, 1, 'aditya', 'chhapekar', 'cust@gmail.com', 'Gajana Nagar garkheda Parisar Aurngabad', 38856, 'cod', 'pending', '', 0, '2021-10-02 08:21:26'),
(78, 1, 1, 'aditya', 'chhapekar', 'cust@gmail.com', 'Gajana Nagar garkheda Parisar Aurngabad', 38856, 'cod', 'pending', '', 0, '2021-10-02 08:21:46'),
(79, 1, 1, 'aditya', 'chhapekar', 'cust@gmail.com', 'Gajana Nagar garkheda Parisar Aurngabad', 38856, 'cod', 'pending', '', 0, '2021-10-02 08:24:03'),
(80, 1, 1, 'aditya', 'chhapekar', 'cust@gmail.com', 'Gajana Nagar garkheda Parisar Aurngabad', 38856, 'cod', 'pending', '', 0, '2021-10-02 08:24:43'),
(81, 1, 1, 'aditya', 'chhapekar', 'cust@gmail.com', 'Gajana Nagar garkheda Parisar Aurngabad', 38856, 'cod', 'pending', '', 0, '2021-10-02 08:26:53'),
(82, 1, 1, 'aditya', 'chhapekar', 'cust@gmail.com', 'Gajana Nagar garkheda Parisar Aurngabad', 38856, 'cod', 'pending', '', 0, '2021-10-02 08:27:41'),
(83, 1, 1, 'aditya', 'chhapekar', 'cust@gmail.com', 'Gajana Nagar garkheda Parisar Aurngabad', 38856, 'cod', 'pending', '', 0, '2021-10-02 08:28:32'),
(84, 1, 1, 'aditya', 'chhapekar', 'cust@gmail.com', 'Gajana Nagar garkheda Parisar Aurngabad', 38856, 'cod', 'pending', '', 0, '2021-10-02 08:28:54'),
(85, 1, 1, 'aditya', 'chhapekar', 'cust@gmail.com', 'Gajana Nagar garkheda Parisar Aurngabad', 38856, 'cod', 'pending', '', 0, '2021-10-02 08:30:22'),
(86, 1, 1, 'aditya', 'chhapekar', 'cust@gmail.com', 'Gajana Nagar garkheda Parisar Aurngabad', 38856, 'cod', 'pending', '', 0, '2021-10-02 08:32:48'),
(87, 1, 1, 'aditya', 'chhapekar', 'cust@gmail.com', 'Gajana Nagar garkheda Parisar Aurngabad', 38856, 'cod', 'pending', '', 0, '2021-10-02 08:33:42'),
(88, 1, 1, 'aditya', 'chhapekar', 'cust@gmail.com', 'Gajana Nagar garkheda Parisar Aurngabad', 38856, 'cod', 'pending', '', 0, '2021-10-02 08:38:04'),
(89, 1, 1, 'aditya', 'chhapekar', 'cust@gmail.com', 'Gajana Nagar garkheda Parisar Aurngabad', 38856, 'cod', 'pending', '', 0, '2021-10-02 08:39:26'),
(90, 1, 1, 'aditya', 'chhapekar', 'cust@gmail.com', 'Gajana Nagar garkheda Parisar Aurngabad', 38856, 'stripe', 'received', '', 0, '2021-10-02 08:40:03'),
(91, 1, 1, 'aditya', 'chhapekar', 'cust@gmail.com', 'Gajana Nagar garkheda Parisar Aurngabad', 38856, 'stripe', 'received', '', 0, '2021-10-02 08:40:09'),
(92, 1, 1, 'aditya', 'chhapekar', 'cust@gmail.com', 'Gajana Nagar garkheda Parisar Aurngabad', 38856, 'stripe', 'received', '', 0, '2021-10-02 08:44:02'),
(93, 1, 1, 'aditya', 'chhapekar', 'cust@gmail.com', 'Gajana Nagar garkheda Parisar Aurngabad', 38856, 'stripe', 'received', '', 0, '2021-10-02 08:45:27'),
(94, 1, 1, 'aditya', 'chhapekar', 'cust@gmail.com', 'Gajana Nagar garkheda Parisar Aurngabad', 38856, 'stripe', 'received', '', 0, '2021-10-02 08:46:58'),
(95, 1, 1, 'aditya', 'chhapekar', 'cust@gmail.com', 'Gajana Nagar garkheda Parisar Aurngabad', 38856, 'stripe', 'received', '', 0, '2021-10-02 08:47:44'),
(96, 1, 1, 'aditya', 'chhapekar', 'cust@gmail.com', 'Gajana Nagar garkheda Parisar Aurngabad', 38856, 'stripe', 'received', '', 0, '2021-10-02 16:24:22'),
(97, 1, 1, 'aditya', 'chhapekar', 'cust@gmail.com', 'Gajana Nagar garkheda Parisar Aurngabad', 38856, 'stripe', 'received', '', 0, '2021-10-02 16:33:19'),
(98, 1, 1, 'aditya', 'chhapekar', 'cust@gmail.com', 'Gajana Nagar garkheda Parisar Aurngabad', 38856, 'cod', 'pending', '', 0, '2021-10-02 16:42:29'),
(99, 1, 1, 'aditya', 'chhapekar', 'cust@gmail.com', 'Gajana Nagar garkheda Parisar Aurngabad', 38856, 'cod', 'pending', '', 0, '2021-10-02 16:42:47'),
(100, 1, 1, 'aditya', 'chhapekar', 'cust@gmail.com', 'Gajana Nagar garkheda Parisar Aurngabad', 38979, 'cod', 'pending', '', 0, '2021-10-06 05:43:16'),
(101, 1, 1, 'aditya', 'chhapekar', 'cust@gmail.com', 'Gajana Nagar garkheda Parisar Aurngabad', 38979, 'cod', 'pending', '', 0, '2021-10-06 05:44:20'),
(102, 1, 1, 'aditya', 'chhapekar', 'cust@gmail.com', 'Gajana Nagar garkheda Parisar Aurngabad', 38979, 'cod', 'pending', '', 0, '2021-10-06 05:45:49'),
(103, 1, 1, 'aditya', 'chhapekar', 'cust@gmail.com', 'Gajana Nagar garkheda Parisar Aurngabad', 38979, 'cod', 'pending', '', 0, '2021-10-06 05:51:32'),
(104, 1, 1, 'aditya', 'chhapekar', 'cust@gmail.com', 'Gajana Nagar garkheda Parisar Aurngabad', 41978, 'cod', 'pending', '', 0, '2021-12-05 07:34:21');

-- --------------------------------------------------------

--
-- Table structure for table `ord_sub_details`
--

CREATE TABLE `ord_sub_details` (
  `os_id` int(11) NOT NULL,
  `os_fk` int(11) NOT NULL,
  `pr_os_fk` int(11) NOT NULL,
  `os_pirce` float NOT NULL,
  `os_discount` int(120) NOT NULL,
  `os_qty` int(21) NOT NULL,
  `os_size` varchar(129) NOT NULL,
  `os_color` varchar(69) NOT NULL,
  `os_tot_amt` int(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ord_sub_details`
--

INSERT INTO `ord_sub_details` (`os_id`, `os_fk`, `pr_os_fk`, `os_pirce`, `os_discount`, `os_qty`, `os_size`, `os_color`, `os_tot_amt`) VALUES
(91, 51, 10, 100, 10, 1, '221', 'maroon', 90),
(92, 51, 3, 12500, 0, 1, '', '', 12500),
(93, 51, 1, 25000, 1200, 1, 'sjkadh', 'red', 23800),
(94, 52, 10, 100, 10, 1, '221', 'maroon', 90),
(95, 52, 3, 12500, 0, 1, '', '', 12500),
(96, 52, 1, 25000, 1200, 1, 'sjkadh', 'red', 23800),
(97, 53, 10, 100, 10, 1, '221', 'maroon', 90),
(98, 53, 3, 12500, 0, 1, '', '', 12500),
(99, 53, 1, 25000, 1200, 1, 'sjkadh', 'red', 23800),
(100, 54, 10, 100, 10, 1, '221', 'maroon', 90),
(101, 54, 3, 12500, 0, 1, '', '', 12500),
(102, 54, 1, 25000, 1200, 1, 'sjkadh', 'red', 23800),
(103, 55, 10, 100, 10, 1, '221', 'maroon', 90),
(104, 55, 3, 12500, 0, 1, '', '', 12500),
(105, 55, 1, 25000, 1200, 1, 'sjkadh', 'red', 23800),
(106, 56, 10, 100, 10, 1, '221', 'maroon', 90),
(107, 56, 3, 12500, 0, 1, '', '', 12500),
(108, 56, 1, 25000, 1200, 1, 'sjkadh', 'red', 23800),
(109, 57, 10, 100, 10, 1, '221', 'maroon', 90),
(110, 57, 3, 12500, 0, 1, '', '', 12500),
(111, 57, 1, 25000, 1200, 1, 'sjkadh', 'red', 23800),
(112, 58, 10, 100, 10, 1, '221', 'maroon', 90),
(113, 58, 3, 12500, 0, 1, '', '', 12500),
(114, 58, 1, 25000, 1200, 1, 'sjkadh', 'red', 23800),
(115, 59, 10, 100, 10, 1, '221', 'maroon', 90),
(116, 59, 3, 12500, 0, 1, '', '', 12500),
(117, 59, 1, 25000, 1200, 1, 'sjkadh', 'red', 23800),
(118, 60, 10, 100, 10, 1, '221', 'maroon', 90),
(119, 60, 3, 12500, 0, 1, '', '', 12500),
(120, 60, 1, 25000, 1200, 1, 'sjkadh', 'red', 23800),
(121, 61, 10, 100, 10, 1, '221', 'maroon', 90),
(122, 61, 3, 12500, 0, 1, '', '', 12500),
(123, 61, 1, 25000, 1200, 1, 'sjkadh', 'red', 23800),
(124, 62, 10, 100, 10, 1, '221', 'maroon', 90),
(125, 62, 3, 12500, 0, 1, '', '', 12500),
(126, 62, 1, 25000, 1200, 1, 'sjkadh', 'red', 23800),
(127, 63, 10, 100, 10, 1, '221', 'maroon', 90),
(128, 63, 3, 12500, 0, 1, '', '', 12500),
(129, 63, 1, 25000, 1200, 1, 'sjkadh', 'red', 23800),
(130, 63, 12, 1256, 56, 1, '', '', 1200),
(131, 64, 10, 100, 10, 1, '221', 'maroon', 90),
(132, 64, 3, 12500, 0, 1, '', '', 12500),
(133, 64, 1, 25000, 1200, 1, 'sjkadh', 'red', 23800),
(134, 64, 12, 1256, 56, 1, '', '', 1200),
(135, 65, 10, 100, 10, 1, '221', 'maroon', 90),
(136, 65, 3, 12500, 0, 1, '', '', 12500),
(137, 65, 1, 25000, 1200, 1, 'sjkadh', 'red', 23800),
(138, 65, 12, 1256, 56, 1, '', '', 1200),
(139, 66, 10, 100, 10, 1, '221', 'maroon', 90),
(140, 66, 3, 12500, 0, 1, '', '', 12500),
(141, 66, 1, 25000, 1200, 1, 'sjkadh', 'red', 23800),
(142, 66, 12, 1256, 56, 1, '', '', 1200),
(143, 67, 10, 100, 10, 1, '221', 'maroon', 90),
(144, 67, 3, 12500, 0, 1, '', '', 12500),
(145, 67, 1, 25000, 1200, 1, 'sjkadh', 'red', 23800),
(146, 67, 12, 1256, 56, 1, '', '', 1200),
(147, 68, 10, 100, 10, 1, '221', 'maroon', 90),
(148, 68, 3, 12500, 0, 1, '', '', 12500),
(149, 68, 1, 25000, 1200, 1, 'sjkadh', 'red', 23800),
(150, 68, 12, 1256, 56, 1, '', '', 1200),
(151, 69, 10, 100, 10, 1, '221', 'maroon', 90),
(152, 69, 3, 12500, 0, 1, '', '', 12500),
(153, 69, 1, 25000, 1200, 1, 'sjkadh', 'red', 23800),
(154, 69, 12, 1256, 56, 1, '', '', 1200),
(155, 70, 10, 100, 10, 1, '221', 'maroon', 90),
(156, 70, 3, 12500, 0, 1, '', '', 12500),
(157, 70, 1, 25000, 1200, 1, 'sjkadh', 'red', 23800),
(158, 70, 12, 1256, 56, 1, '', '', 1200),
(159, 71, 10, 100, 10, 1, '221', 'maroon', 90),
(160, 71, 3, 12500, 0, 1, '', '', 12500),
(161, 71, 1, 25000, 1200, 1, 'sjkadh', 'red', 23800),
(162, 71, 12, 1256, 56, 1, '', '', 1200),
(163, 72, 10, 100, 10, 1, '221', 'maroon', 90),
(164, 72, 3, 12500, 0, 1, '', '', 12500),
(165, 72, 1, 25000, 1200, 1, 'sjkadh', 'red', 23800),
(166, 72, 12, 1256, 56, 1, '', '', 1200),
(167, 73, 10, 100, 10, 1, '221', 'maroon', 90),
(168, 73, 3, 12500, 0, 1, '', '', 12500),
(169, 73, 1, 25000, 1200, 1, 'sjkadh', 'red', 23800),
(170, 73, 12, 1256, 56, 1, '', '', 1200),
(171, 74, 10, 100, 10, 1, '221', 'maroon', 90),
(172, 74, 3, 12500, 0, 1, '', '', 12500),
(173, 74, 1, 25000, 1200, 1, 'sjkadh', 'red', 23800),
(174, 74, 12, 1256, 56, 1, '', '', 1200),
(175, 75, 10, 100, 10, 1, '221', 'maroon', 90),
(176, 75, 3, 12500, 0, 1, '', '', 12500),
(177, 75, 1, 25000, 1200, 1, 'sjkadh', 'red', 23800),
(178, 75, 12, 1256, 56, 1, '', '', 1200),
(179, 76, 10, 100, 10, 1, '221', 'maroon', 90),
(180, 76, 3, 12500, 0, 1, '', '', 12500),
(181, 76, 1, 25000, 1200, 1, 'sjkadh', 'red', 23800),
(182, 76, 12, 1256, 56, 1, '', '', 1200),
(183, 77, 10, 100, 10, 1, '221', 'maroon', 90),
(184, 77, 3, 12500, 0, 1, '', '', 12500),
(185, 77, 1, 25000, 1200, 1, 'sjkadh', 'red', 23800),
(186, 77, 12, 1256, 56, 1, '', '', 1200),
(187, 78, 10, 100, 10, 1, '221', 'maroon', 90),
(188, 78, 3, 12500, 0, 1, '', '', 12500),
(189, 78, 1, 25000, 1200, 1, 'sjkadh', 'red', 23800),
(190, 78, 12, 1256, 56, 1, '', '', 1200),
(191, 79, 10, 100, 10, 1, '221', 'maroon', 90),
(192, 79, 3, 12500, 0, 1, '', '', 12500),
(193, 79, 1, 25000, 1200, 1, 'sjkadh', 'red', 23800),
(194, 79, 12, 1256, 56, 1, '', '', 1200),
(195, 80, 10, 100, 10, 1, '221', 'maroon', 90),
(196, 80, 3, 12500, 0, 1, '', '', 12500),
(197, 80, 1, 25000, 1200, 1, 'sjkadh', 'red', 23800),
(198, 80, 12, 1256, 56, 1, '', '', 1200),
(199, 81, 10, 100, 10, 1, '221', 'maroon', 90),
(200, 81, 3, 12500, 0, 1, '', '', 12500),
(201, 81, 1, 25000, 1200, 1, 'sjkadh', 'red', 23800),
(202, 81, 12, 1256, 56, 1, '', '', 1200),
(203, 82, 10, 100, 10, 1, '221', 'maroon', 90),
(204, 82, 3, 12500, 0, 1, '', '', 12500),
(205, 82, 1, 25000, 1200, 1, 'sjkadh', 'red', 23800),
(206, 82, 12, 1256, 56, 1, '', '', 1200),
(207, 83, 10, 100, 10, 1, '221', 'maroon', 90),
(208, 83, 3, 12500, 0, 1, '', '', 12500),
(209, 83, 1, 25000, 1200, 1, 'sjkadh', 'red', 23800),
(210, 83, 12, 1256, 56, 1, '', '', 1200),
(211, 84, 10, 100, 10, 1, '221', 'maroon', 90),
(212, 84, 3, 12500, 0, 1, '', '', 12500),
(213, 84, 1, 25000, 1200, 1, 'sjkadh', 'red', 23800),
(214, 84, 12, 1256, 56, 1, '', '', 1200),
(215, 85, 10, 100, 10, 1, '221', 'maroon', 90),
(216, 85, 3, 12500, 0, 1, '', '', 12500),
(217, 85, 1, 25000, 1200, 1, 'sjkadh', 'red', 23800),
(218, 85, 12, 1256, 56, 1, '', '', 1200),
(219, 86, 10, 100, 10, 1, '221', 'maroon', 90),
(220, 86, 3, 12500, 0, 1, '', '', 12500),
(221, 86, 1, 25000, 1200, 1, 'sjkadh', 'red', 23800),
(222, 86, 12, 1256, 56, 1, '', '', 1200),
(223, 87, 10, 100, 10, 1, '221', 'maroon', 90),
(224, 87, 3, 12500, 0, 1, '', '', 12500),
(225, 87, 1, 25000, 1200, 1, 'sjkadh', 'red', 23800),
(226, 87, 12, 1256, 56, 1, '', '', 1200),
(227, 88, 10, 100, 10, 1, '221', 'maroon', 90),
(228, 88, 3, 12500, 0, 1, '', '', 12500),
(229, 88, 1, 25000, 1200, 1, 'sjkadh', 'red', 23800),
(230, 88, 12, 1256, 56, 1, '', '', 1200),
(231, 89, 10, 100, 10, 1, '221', 'maroon', 90),
(232, 89, 3, 12500, 0, 1, '', '', 12500),
(233, 89, 1, 25000, 1200, 1, 'sjkadh', 'red', 23800),
(234, 89, 12, 1256, 56, 1, '', '', 1200),
(235, 90, 10, 100, 10, 1, '221', 'maroon', 90),
(236, 90, 3, 12500, 0, 1, '', '', 12500),
(237, 90, 1, 25000, 1200, 1, 'sjkadh', 'red', 23800),
(238, 90, 12, 1256, 56, 1, '', '', 1200),
(239, 91, 10, 100, 10, 1, '221', 'maroon', 90),
(240, 91, 3, 12500, 0, 1, '', '', 12500),
(241, 91, 1, 25000, 1200, 1, 'sjkadh', 'red', 23800),
(242, 91, 12, 1256, 56, 1, '', '', 1200),
(243, 92, 10, 100, 10, 1, '221', 'maroon', 90),
(244, 92, 3, 12500, 0, 1, '', '', 12500),
(245, 92, 1, 25000, 1200, 1, 'sjkadh', 'red', 23800),
(246, 92, 12, 1256, 56, 1, '', '', 1200),
(247, 93, 10, 100, 10, 1, '221', 'maroon', 90),
(248, 93, 3, 12500, 0, 1, '', '', 12500),
(249, 93, 1, 25000, 1200, 1, 'sjkadh', 'red', 23800),
(250, 93, 12, 1256, 56, 1, '', '', 1200),
(251, 94, 10, 100, 10, 1, '221', 'maroon', 90),
(252, 94, 3, 12500, 0, 1, '', '', 12500),
(253, 94, 1, 25000, 1200, 1, 'sjkadh', 'red', 23800),
(254, 94, 12, 1256, 56, 1, '', '', 1200),
(255, 95, 10, 100, 10, 1, '221', 'maroon', 90),
(256, 95, 3, 12500, 0, 1, '', '', 12500),
(257, 95, 1, 25000, 1200, 1, 'sjkadh', 'red', 23800),
(258, 95, 12, 1256, 56, 1, '', '', 1200),
(259, 96, 10, 100, 10, 1, '221', 'maroon', 90),
(260, 96, 3, 12500, 0, 1, '', '', 12500),
(261, 96, 1, 25000, 1200, 1, 'sjkadh', 'red', 23800),
(262, 96, 12, 1256, 56, 1, '', '', 1200),
(263, 97, 10, 100, 10, 1, '221', 'maroon', 90),
(264, 97, 3, 12500, 0, 1, '', '', 12500),
(265, 97, 1, 25000, 1200, 1, 'sjkadh', 'red', 23800),
(266, 97, 12, 1256, 56, 1, '', '', 1200),
(267, 98, 10, 100, 10, 1, '221', 'maroon', 90),
(268, 98, 3, 12500, 0, 1, '', '', 12500),
(269, 98, 1, 25000, 1200, 1, 'sjkadh', 'red', 23800),
(270, 98, 12, 1256, 56, 1, '', '', 1200),
(271, 99, 10, 100, 10, 1, '221', 'maroon', 90),
(272, 99, 3, 12500, 0, 1, '', '', 12500),
(273, 99, 1, 25000, 1200, 1, 'sjkadh', 'red', 23800),
(274, 99, 12, 1256, 56, 1, '', '', 1200),
(275, 100, 10, 100, 10, 1, '221', 'maroon', 90),
(276, 100, 3, 12500, 0, 1, '', '', 12500),
(277, 100, 1, 25000, 1200, 1, 'sjkadh', 'red', 23800),
(278, 100, 12, 1256, 56, 1, '', '', 1200),
(279, 100, 9, 123, 2143, 1, '', '', -2020),
(280, 101, 10, 100, 10, 1, '221', 'maroon', 90),
(281, 101, 3, 12500, 0, 1, '', '', 12500),
(282, 101, 1, 25000, 1200, 1, 'sjkadh', 'red', 23800),
(283, 101, 12, 1256, 56, 1, '', '', 1200),
(284, 101, 9, 123, 2143, 1, '', '', -2020),
(285, 102, 10, 100, 10, 1, '221', 'maroon', 90),
(286, 102, 3, 12500, 0, 1, '', '', 12500),
(287, 102, 1, 25000, 1200, 1, 'sjkadh', 'red', 23800),
(288, 102, 12, 1256, 56, 1, '', '', 1200),
(289, 102, 9, 123, 2143, 1, '', '', -2020),
(290, 103, 10, 100, 10, 1, '221', 'maroon', 90),
(291, 103, 3, 12500, 0, 1, '', '', 12500),
(292, 103, 1, 25000, 1200, 1, 'sjkadh', 'red', 23800),
(293, 103, 12, 1256, 56, 1, '', '', 1200),
(294, 103, 9, 123, 2143, 1, '', '', -2020),
(295, 104, 10, 100, 10, 1, '221', 'maroon', 90),
(296, 104, 3, 12500, 0, 1, '', '', 12500),
(297, 104, 1, 25000, 1200, 1, 'sjkadh', 'red', 23800),
(298, 104, 12, 1256, 56, 1, '', '', 1200),
(299, 104, 9, 123, 2143, 1, '', '', -2020),
(300, 104, 22, 2999, 199, 1, '', '', 2800);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prod_id` int(11) NOT NULL,
  `prod_fk_id` int(11) NOT NULL,
  `prod_name` varchar(500) NOT NULL,
  `prod_discp` varchar(500) NOT NULL,
  `prod_price` int(120) NOT NULL,
  `prod_discount` int(120) NOT NULL,
  `prod_category` varchar(500) NOT NULL,
  `quantity` int(120) NOT NULL,
  `remain_item` int(120) NOT NULL,
  `prev_img` varchar(1200) NOT NULL,
  `s_tot` int(120) NOT NULL,
  `c_tot` int(120) NOT NULL,
  `img_tot` int(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `prod_fk_id`, `prod_name`, `prod_discp`, `prod_price`, `prod_discount`, `prod_category`, `quantity`, `remain_item`, `prev_img`, `s_tot`, `c_tot`, `img_tot`) VALUES
(1, 1, 'samsung', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', 25000, 1200, 'mobile', 321, 21, 'seller_img/160Tulips.jpg', 2, 4, 0),
(2, 1, 'nokia', 'nokia .........tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\n', 12500, 120, 'mobile', 26, 26, 'seller_img/528', 0, 0, 0),
(3, 1, 'nokia', 'nokia .........tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\n', 12500, 0, 'New mobile', 26, 26, 'seller_img/103Penguins.jpg', 0, 0, 0),
(9, 1, 'jhgsd', 'jhsd', 123, 2143, 'sdfgh', 123, 123, 'seller_img/771Lighthouse.jpg', 2, 2, 1),
(10, 1, 'new', 'new', 1256, 56, 'new product', 125, 120, 'seller_img/538Penguins.jpg', 13, 6, 5),
(11, 1, 'new', 'new', 1256, 56, 'new product', 125, 125, 'seller_img/584', 13, 6, 5),
(12, 1, 'new', 'new', 1256, 56, 'new product', 125, 125, 'seller_img/518', 13, 6, 5),
(13, 1, 'testing name', 'test product', 120, 20, 'mobile', 230, 230, 'seller_img/928', 4, 3, 0),
(14, 1, 'updated my glass', '		 ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', 120, 20, 'glass', 120, 120, 'seller_img/873', 1, 1, 0),
(15, 1, 'new test to update', 'new test to updatenew test to update', 120, 120, 'new test to update', 1203, 1203, 'seller_img/541', 2, 1, 0),
(16, 1, 'sec test', 'sec test', 120, 20, 'sec test', 250, 250, 'seller_img/124', 4, 5, 0),
(17, 1, 'women wear', '	 ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', 1200, 200, 'women wear', 250, 250, 'seller_img/988off-shoulder-red-cocktail-dress.jpg', 2, 2, 0),
(18, 1, 'women wear', ' ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', 600, 50, 'women wear', 250, 250, 'seller_img/686person-in-a-blank-black-shirt-stands-against-white-background.jpg', 2, 2, 0),
(19, 1, 'head phone', ' ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', 699, 99, 'head phone', 220, 220, 'seller_img/169wireless-headphones.jpg', 1, 2, 0),
(20, 1, 'mobile cover', ' ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', 100, 20, 'mobile cover', 500, 500, 'seller_img/571cool-painted-iphone-case-blue-green.jpg', 1, 2, 0),
(21, 1, 'women wear', ' ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', 2000, 100, 'women wear', 1200, 1200, 'seller_img/784torso-of-a-person-wearing-white-shirt-product-mockup.jpg', 2, 2, 0),
(22, 1, 'women wear', ' ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', 2999, 199, 'women wear', 100, 100, 'seller_img/709strappy-black-dress-back.jpg', 3, 2, 0),
(23, 1, 'women wear', ' ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', 600, 100, 'women wear', 120, 120, 'seller_img/184woman-dressed-in-white-leans-against-a-wall.jpg', 2, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_imgs`
--

CREATE TABLE `product_imgs` (
  `pr_img_id` int(11) NOT NULL,
  `pr_img_fk` int(11) NOT NULL,
  `i_size` varchar(120) DEFAULT NULL,
  `i_color` varchar(200) DEFAULT NULL,
  `pr_img` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_imgs`
--

INSERT INTO `product_imgs` (`pr_img_id`, `pr_img_fk`, `i_size`, `i_color`, `pr_img`) VALUES
(18, 1, 'sjkadh', 'red', NULL),
(19, 1, 'kjsdh', 'green', NULL),
(20, 1, NULL, '123', NULL),
(21, 1, NULL, '2341', NULL),
(22, 9, NULL, NULL, 'seller_img/768Tulips.jpg'),
(23, 10, '112', 'ra', NULL),
(24, 10, '221', 'ga', NULL),
(25, 10, '321', 'ba', NULL),
(26, 10, 'its', 'sa', NULL),
(27, 10, '1', 'cha', NULL),
(28, 10, '2', 'maroon', 'seller_img/302Chrysanthemum.jpg'),
(29, 10, '3', NULL, 'seller_img/874Desert.jpg'),
(30, 10, '4', NULL, 'seller_img/784Hydrangeas.jpg'),
(31, 10, '12', NULL, 'seller_img/970Jellyfish.jpg'),
(32, 10, 'kfv', NULL, 'seller_img/585Tulips.jpg'),
(73, 11, 'asd', NULL, NULL),
(74, 11, NULL, NULL, NULL),
(75, 11, NULL, NULL, NULL),
(76, 11, NULL, NULL, NULL),
(77, 11, NULL, NULL, NULL),
(78, 11, NULL, NULL, NULL),
(79, 11, NULL, NULL, NULL),
(80, 11, NULL, NULL, NULL),
(81, 11, NULL, NULL, NULL),
(82, 11, NULL, NULL, NULL),
(83, 11, NULL, NULL, NULL),
(84, 11, NULL, NULL, NULL),
(85, 11, NULL, NULL, NULL),
(86, 11, NULL, NULL, NULL),
(87, 11, NULL, NULL, NULL),
(88, 11, NULL, NULL, NULL),
(89, 11, NULL, NULL, NULL),
(90, 11, NULL, NULL, NULL),
(91, 11, NULL, NULL, NULL),
(92, 11, NULL, NULL, 'seller_img/284'),
(93, 11, NULL, NULL, 'seller_img/471'),
(94, 11, NULL, NULL, 'seller_img/596'),
(95, 11, NULL, NULL, 'seller_img/616'),
(96, 11, NULL, NULL, 'seller_img/450'),
(97, 12, NULL, NULL, NULL),
(98, 12, NULL, NULL, NULL),
(99, 12, NULL, NULL, NULL),
(100, 12, NULL, NULL, NULL),
(101, 12, NULL, NULL, NULL),
(102, 12, NULL, NULL, NULL),
(103, 12, NULL, NULL, 'seller_img/432'),
(104, 12, NULL, NULL, 'seller_img/772'),
(105, 12, NULL, NULL, 'seller_img/642'),
(106, 12, NULL, NULL, 'seller_img/249'),
(107, 12, NULL, NULL, 'seller_img/233'),
(108, 13, '10', 'silver', NULL),
(109, 13, '20', 'gold', NULL),
(110, 13, '30', NULL, NULL),
(111, 13, '40', NULL, NULL),
(112, 14, '12', NULL, NULL),
(113, 14, NULL, 'red', NULL),
(114, 15, '10', NULL, NULL),
(115, 15, '20', NULL, NULL),
(116, 15, NULL, 'red', NULL),
(117, 16, 's', 'red', NULL),
(118, 16, 'xl', 'black', NULL),
(119, 16, 'xxl', 'yellow', NULL),
(120, 16, NULL, 'blue', NULL),
(121, 16, NULL, 'pink', NULL),
(122, 16, NULL, NULL, NULL),
(123, 16, NULL, NULL, NULL),
(124, 16, NULL, NULL, NULL),
(125, 17, 's', NULL, NULL),
(126, 17, 'lg', NULL, NULL),
(127, 17, NULL, 'blue', NULL),
(128, 17, NULL, 'red', NULL),
(129, 18, 's', NULL, NULL),
(130, 18, 'lg', NULL, NULL),
(131, 18, NULL, 'red', NULL),
(132, 18, NULL, 'black', NULL),
(133, 19, 'medium', NULL, NULL),
(134, 19, NULL, 'white', NULL),
(135, 19, NULL, 'black', NULL),
(136, 20, 'normal', NULL, NULL),
(137, 20, NULL, 'cyan', NULL),
(138, 20, NULL, 'blue', NULL),
(139, 21, 'md', NULL, NULL),
(140, 21, 'lg', NULL, NULL),
(141, 21, NULL, 'white', NULL),
(142, 21, NULL, 'pink', NULL),
(143, 22, 's', NULL, NULL),
(144, 22, 'm', NULL, NULL),
(145, 22, 'xll', NULL, NULL),
(146, 22, NULL, 'blue', NULL),
(147, 22, NULL, 'black', NULL),
(148, 23, 'xl', NULL, NULL),
(149, 23, 'xll', NULL, NULL),
(150, 23, NULL, 'white', NULL),
(151, 23, NULL, 'pink', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `seller_user`
--

CREATE TABLE `seller_user` (
  `s_us_id` int(11) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mob` bigint(200) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `s_addr` varchar(500) NOT NULL,
  `avtar` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seller_user`
--

INSERT INTO `seller_user` (`s_us_id`, `fname`, `lname`, `email`, `mob`, `pass`, `s_addr`, `avtar`) VALUES
(1, 'aditya', 'chhapekar', 'a@gmail.com', 323232323, '1221', 'gajana nagar', 'seller_img/486Koala.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cr_id`),
  ADD KEY `cr_pr_fk` (`cr_pr_fk`),
  ADD KEY `cr_us_fk` (`cr_us_fk`),
  ADD KEY `crt_sel_fk` (`crt_sel_fk`);

--
-- Indexes for table `customer_user`
--
ALTER TABLE `customer_user`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `delhivery_tab`
--
ALTER TABLE `delhivery_tab`
  ADD PRIMARY KEY (`del_id`),
  ADD KEY `sel_id` (`sel_id`);

--
-- Indexes for table `ord_details`
--
ALTER TABLE `ord_details`
  ADD PRIMARY KEY (`ord_id`),
  ADD KEY `u_fk` (`u_fk`),
  ADD KEY `ord_sel_fk` (`ord_sel_fk`);

--
-- Indexes for table `ord_sub_details`
--
ALTER TABLE `ord_sub_details`
  ADD PRIMARY KEY (`os_id`),
  ADD KEY `os_fk` (`os_fk`),
  ADD KEY `pr_os_fk` (`pr_os_fk`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_id`),
  ADD KEY `pro_fk_id` (`prod_fk_id`);

--
-- Indexes for table `product_imgs`
--
ALTER TABLE `product_imgs`
  ADD PRIMARY KEY (`pr_img_id`),
  ADD KEY `pr_img_fk` (`pr_img_fk`),
  ADD KEY `pr_img_fk_2` (`pr_img_fk`);

--
-- Indexes for table `seller_user`
--
ALTER TABLE `seller_user`
  ADD PRIMARY KEY (`s_us_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `customer_user`
--
ALTER TABLE `customer_user`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `delhivery_tab`
--
ALTER TABLE `delhivery_tab`
  MODIFY `del_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ord_details`
--
ALTER TABLE `ord_details`
  MODIFY `ord_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
--
-- AUTO_INCREMENT for table `ord_sub_details`
--
ALTER TABLE `ord_sub_details`
  MODIFY `os_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=301;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `product_imgs`
--
ALTER TABLE `product_imgs`
  MODIFY `pr_img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;
--
-- AUTO_INCREMENT for table `seller_user`
--
ALTER TABLE `seller_user`
  MODIFY `s_us_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`cr_pr_fk`) REFERENCES `products` (`prod_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`cr_us_fk`) REFERENCES `customer_user` (`cust_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_3` FOREIGN KEY (`crt_sel_fk`) REFERENCES `seller_user` (`s_us_id`);

--
-- Constraints for table `delhivery_tab`
--
ALTER TABLE `delhivery_tab`
  ADD CONSTRAINT `delhivery_tab_ibfk_1` FOREIGN KEY (`sel_id`) REFERENCES `seller_user` (`s_us_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ord_details`
--
ALTER TABLE `ord_details`
  ADD CONSTRAINT `ord_details_ibfk_1` FOREIGN KEY (`u_fk`) REFERENCES `customer_user` (`cust_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ord_sub_details`
--
ALTER TABLE `ord_sub_details`
  ADD CONSTRAINT `ord_sub_details_ibfk_1` FOREIGN KEY (`pr_os_fk`) REFERENCES `products` (`prod_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ord_sub_details_ibfk_2` FOREIGN KEY (`os_fk`) REFERENCES `ord_details` (`ord_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`prod_fk_id`) REFERENCES `seller_user` (`s_us_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_imgs`
--
ALTER TABLE `product_imgs`
  ADD CONSTRAINT `product_imgs_ibfk_1` FOREIGN KEY (`pr_img_fk`) REFERENCES `products` (`prod_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
