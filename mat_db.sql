-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2021 at 02:42 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mat_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_details`
--

CREATE TABLE `admin_details` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `pass_view` varchar(255) DEFAULT NULL,
  `admin_email` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `admin_image` varchar(255) DEFAULT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_details`
--

INSERT INTO `admin_details` (`id`, `username`, `password`, `pass_view`, `admin_email`, `name`, `company`, `admin_image`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'agrahriamit86@gmail.com', 'Webtechnomind IT Solutions', 'wtm1', '1591180602logo-HelpTu.png', '1');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `booking_date` date NOT NULL,
  `booking_time` time NOT NULL,
  `total_hour` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `booking_no` varchar(255) NOT NULL,
  `total_rate` varchar(255) NOT NULL,
  `tax` varchar(255) NOT NULL,
  `total_amount` varchar(255) NOT NULL,
  `booking_datetime` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `service_id`, `user_id`, `booking_date`, `booking_time`, `total_hour`, `name`, `email`, `phone`, `booking_no`, `total_rate`, `tax`, `total_amount`, `booking_datetime`) VALUES
(1, 12, 12, '2006-05-20', '00:00:00', '4', '', '', '', 'HELPTU4140768', '0', '0', '0', '2020-06-03 09:48:11');

-- --------------------------------------------------------

--
-- Table structure for table `event_category`
--

CREATE TABLE `event_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `entry_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_category`
--

INSERT INTO `event_category` (`id`, `name`, `entry_date`) VALUES
(1, 'demo1 ol', '2019-11-15'),
(5, 'amit sir', '2019-11-15'),
(3, 'test gg', '0000-00-00'),
(4, 'Entrees', '2019-11-15'),
(10, 'asas', '2019-11-15');

-- --------------------------------------------------------

--
-- Table structure for table `event_master`
--

CREATE TABLE `event_master` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `event_start_date` date NOT NULL,
  `event_end_date` date NOT NULL,
  `start_time` varchar(12) NOT NULL,
  `end_time` varchar(12) NOT NULL,
  `location` text NOT NULL,
  `description` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `entry_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_master`
--

INSERT INTO `event_master` (`id`, `name`, `event_start_date`, `event_end_date`, `start_time`, `end_time`, `location`, `description`, `img`, `entry_date`) VALUES
(1, 'SHISH KEBAB', '2019-11-14', '2019-11-22', '13:00', '11:00', 'fghgfh', 'hfghfgh', '1573483490Chrysanthemum.jpg', '2019-11-13'),
(2, 'test', '2019-11-11', '2019-11-23', '00:00:00', '00:00:00', 'kolkata', 'jtyjtyjtyjk', '1573483749Penguins.jpg', '2019-11-11'),
(3, 'SHISH KEBAB', '2019-11-11', '2019-11-12', '00:00:00', '00:00:00', 'kolkata', '', '1573482440Penguins.jpg', '2019-11-11'),
(4, 'golam ambia', '2019-11-11', '2019-11-20', '00:00:00', '00:00:00', 'dhfhfhftgh', 'dfhfdhfh', '1573482587Hydrangeas.jpg', '2019-11-11'),
(5, 'SHISH KEBAB', '2019-11-12', '2019-11-13', '00:00:00', '00:00:00', 'kol', 'test', '1573556295Lighthouse.jpg', '2019-11-12'),
(6, 'demo', '2019-11-12', '2019-11-14', '00:00:00', '00:00:00', 'kolkata', 'gbhbg hrthrt', '1573566969Lighthouse.jpg', '2019-11-12');

-- --------------------------------------------------------

--
-- Table structure for table `event_master_images`
--

CREATE TABLE `event_master_images` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `event_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_master_images`
--

INSERT INTO `event_master_images` (`id`, `image`, `event_id`) VALUES
(1, '1573556295_Koala.jpg', 5),
(2, '1573556295_Penguins.jpg', 5),
(3, '1573556295_Tulips.jpg', 5),
(6, '1573561669_Penguins.jpg', 5),
(7, '1573561669_Tulips.jpg', 5),
(28, '1573566899_Desert.jpg', 1),
(41, '1573654596_Tulips.jpg', 1),
(39, '1573654596_Lighthouse.jpg', 1),
(40, '1573654596_Penguins.jpg', 1),
(31, '1573566899_Koala.jpg', 1),
(38, '1573654595_Koala.jpg', 1),
(34, '1573566969_Koala.jpg', 6),
(35, '1573566969_Lighthouse.jpg', 6),
(36, '1573566969_Penguins.jpg', 6),
(37, '1573566969_Tulips.jpg', 6);

-- --------------------------------------------------------

--
-- Table structure for table `event_subcategory`
--

CREATE TABLE `event_subcategory` (
  `sid` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `subname` varchar(255) NOT NULL,
  `entry_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_subcategory`
--

INSERT INTO `event_subcategory` (`sid`, `categoryid`, `subname`, `entry_date`) VALUES
(1, 3, 'test hh', '2019-11-15'),
(2, 4, 'chk', '2019-11-15'),
(3, 1, 'test', '2019-11-16');

-- --------------------------------------------------------

--
-- Table structure for table `general_setting`
--

CREATE TABLE `general_setting` (
  `id` int(11) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `contact` varchar(12) NOT NULL,
  `email` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `entry_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `general_setting`
--

INSERT INTO `general_setting` (`id`, `logo`, `contact`, `email`, `facebook`, `address`, `twitter`, `linkedin`, `entry_date`) VALUES
(1, '1591180602logo-HelpTu.png', '1234567890', 'agrahriamit86@gmail.com', 'https://www.facebook.com/', 'abc, ab lane,kol-50', 'twn', 'lnn', '2019-11-01');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `service_description` text NOT NULL,
  `service_image` varchar(255) NOT NULL,
  `service_fee` varchar(255) NOT NULL,
  `service_entry_date` date NOT NULL,
  `service_isdelete` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`service_id`, `service_name`, `service_description`, `service_image`, `service_fee`, `service_entry_date`, `service_isdelete`) VALUES
(4, 'Cleaner', 'Cleaner service', '1605280873gg.jpg', '10', '2020-04-30', 0),
(6, 'Plumber', 'this is plumber services', '1605281261ambia-da.jpg', '20', '2020-05-17', 0),
(7, 'Gardener', 'Gardener', '1591180231images.png', '15', '2020-05-17', 0),
(8, 'Taxi', 'On Demand taxi driver', '1591180503taxi1.jpg', '30', '2020-05-17', 0),
(12, ' bnb', 'nbnb', '1591012387gg.jpg', '40', '2020-06-01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `active` int(1) NOT NULL,
  `trash` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `name`, `username`, `password`, `active`, `trash`) VALUES
(1, 'Test update', 'test@mail.com', 'c4ca4238a0b923820dcc509a6f75849b', 1, 0),
(2, 'test', 'test@mail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, 1),
(3, 'test', 'test@mail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, 0),
(4, 'test', 'test@mail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, 0),
(5, 'test', 'test@mail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, 0),
(6, 'test', 'test@mail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, 0),
(7, 'test', 'test@mail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, 0),
(8, 'test', 'test1@mail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, 0),
(9, 'test', 'test122@mail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, 0),
(10, 'Test', 'a', 'e10adc3949ba59abbe56e057f20f883e', 1, 1),
(11, 'Test', 'a', 'c4ca4238a0b923820dcc509a6f75849b', 1, 1),
(12, 'Test', 'a', 'e10adc3949ba59abbe56e057f20f883e', 1, 1),
(13, 'test', 'test122@mail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, 0),
(14, 'test', 'test122333333@mail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, 0),
(15, 'test', 'test122333333233323232322@mail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, 0),
(16, 'test', 'test1223333332333@mail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, 0),
(17, 'Amit', '', 'd41d8cd98f00b204e9800998ecf8427e', 1, 1),
(18, 'Amit', '', 'd41d8cd98f00b204e9800998ecf8427e', 1, 1),
(19, 'Amit', 'agrahriamit86@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 0),
(20, 'Amit', 'agrahriamit86@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 0),
(21, 'Amit kumar', 'test@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 0),
(22, 'Froze', 'Fmroze@googlemail.com ', '630383f1f5cfe5ff0b3dd6fe313d6fe6', 1, 0),
(23, 'Christopher Bradbury', 'angol@email.com', 'dac58a64680fc47a9ae2d7d1d59743ac', 1, 0),
(24, 'Biltu', 'sales@mpsinfoservices.com ', '9ed083b1436e5f40ef984b28255eef18', 1, 0),
(25, 'Richard Butler', 'retlub@gmail.com', '09c74ada9e6c9fbdef249b258a66e948', 1, 0),
(26, 'Waldron tester', 'Wmccritty@gmail.com', '2cb1b9f115de8fb5f10ca45e78c9b0a6', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `theme_customizer`
--

CREATE TABLE `theme_customizer` (
  `tc_id` int(11) NOT NULL,
  `tc_menu_color` varchar(150) NOT NULL,
  `tc_menu_select` varchar(150) NOT NULL,
  `tc_menu_dark` int(11) NOT NULL,
  `tc_nav_color` varchar(150) NOT NULL,
  `tc_nav_dark` int(11) NOT NULL,
  `tc_foot_dark` int(11) NOT NULL,
  `tc_foot_fixed` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `theme_customizer`
--

INSERT INTO `theme_customizer` (`tc_id`, `tc_menu_color`, `tc_menu_select`, `tc_menu_dark`, `tc_nav_color`, `tc_nav_dark`, `tc_foot_dark`, `tc_foot_fixed`) VALUES
(1, 'gradient-45deg-purple-amber', 'sidenav-active-rounded', 1, 'gradient-45deg-light-blue-cyan', 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_service`
--

CREATE TABLE `user_service` (
  `id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_service`
--

INSERT INTO `user_service` (`id`, `user_id`, `service_id`) VALUES
(1, 23, 12);

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `status` varchar(10) NOT NULL,
  `entry_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`id`, `name`, `email`, `phone`, `status`, `entry_date`) VALUES
(1, 'amb1', 'wtm.golam@gmail.com', '7003832809', 'Active', '2019-11-07'),
(5, 'golam ambia', 'wtm.golam1@gmail.com', '07003832809', 'Inactive', '2019-11-11'),
(3, 'golam ambia', 'wtm.golam@gmail.com', '07003832809', 'Active', '2019-11-08'),
(7, 'golam ambia', 'wtm.golamhth@gmail.com', '07003832809', 'Inactive', '2019-11-13'),
(8, 'Demo test', 'wtm.golam444@gmail.com', '07003832809', 'Inactive', '2019-11-13'),
(9, 'golam ambia', 'wtm.golamfd@gmail.com', '07003832809', 'Active', '2019-11-13'),
(10, 'What is Lorem Ipsum?', 'wtm.golamdsdsd@gmail.com', '07003832809', 'Active', '2019-11-13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_details`
--
ALTER TABLE `admin_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `event_category`
--
ALTER TABLE `event_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_master`
--
ALTER TABLE `event_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_master_images`
--
ALTER TABLE `event_master_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `event_subcategory`
--
ALTER TABLE `event_subcategory`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `general_setting`
--
ALTER TABLE `general_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `theme_customizer`
--
ALTER TABLE `theme_customizer`
  ADD PRIMARY KEY (`tc_id`);

--
-- Indexes for table `user_service`
--
ALTER TABLE `user_service`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_details`
--
ALTER TABLE `admin_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `event_category`
--
ALTER TABLE `event_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `event_master`
--
ALTER TABLE `event_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `event_master_images`
--
ALTER TABLE `event_master_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `event_subcategory`
--
ALTER TABLE `event_subcategory`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `general_setting`
--
ALTER TABLE `general_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `theme_customizer`
--
ALTER TABLE `theme_customizer`
  MODIFY `tc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_service`
--
ALTER TABLE `user_service`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
