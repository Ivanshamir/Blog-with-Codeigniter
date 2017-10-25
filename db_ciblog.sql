-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2017 at 07:47 PM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ciblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `name`, `create_date`) VALUES
(1, 'Business', '2017-08-30 19:23:44'),
(2, 'Education', '2017-08-30 19:23:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_comment`
--

INSERT INTO `tbl_comment` (`id`, `post_id`, `name`, `email`, `body`, `created_at`) VALUES
(4, 13, 'john doe', 'john@gmail.com', 'This is awesome post', '2017-09-03 07:59:22'),
(3, 13, 'shamir', 'shamir@gmail.com', 'this is fake post', '2017-09-03 07:22:49');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE `tbl_post` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `post_image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`id`, `category_id`, `title`, `slug`, `body`, `post_image`, `created_at`) VALUES
(15, 2, 'Posts Four', 'Posts-Four', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a vehicula libero, nec finibus urna. Aliquam maximus mauris eget dignissim molestie. Morbi id dolor id purus varius laoreet at id eros. Sed velit nisl, posuere eu venenatis sit amet, vestibulum quis libero. Morbi rhoncus id ligula quis malesuada. Maecenas scelerisque viverra tortor et sagittis. Quisque vitae turpis sed nibh lobortis volutpat eu non metus. Nullam tristique nibh eu erat blandit, non hendrerit elit sollicitudin. Nunc sed mollis ante, id convallis lectus. Nullam eu metus nec urna porttitor malesuada. Aliquam dictum aliquam magna, vitae commodo tellus sagittis vel. Suspendisse vitae elit ut sem tincidunt interdum. Phasellus aliquam massa sit amet magna tempor accumsan eu ut odio.</p>\r\n', 'noimage.jpg', '2017-09-04 07:57:36'),
(14, 1, 'Third Post', 'Third-Post', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a vehicula libero, nec finibus urna. Aliquam maximus mauris eget dignissim molestie. Morbi id dolor id purus varius laoreet at id eros. Sed velit nisl, posuere eu venenatis sit amet, vestibulum quis libero. Morbi rhoncus id ligula quis malesuada. Maecenas scelerisque viverra tortor et sagittis. Quisque vitae turpis sed nibh lobortis volutpat eu non metus. Nullam tristique nibh eu erat blandit, non hendrerit elit sollicitudin. Nunc sed mollis ante, id convallis lectus. Nullam eu metus nec urna porttitor malesuada. Aliquam dictum aliquam magna, vitae commodo tellus sagittis vel. Suspendisse vitae elit ut sem tincidunt interdum. Phasellus aliquam massa sit amet magna tempor accumsan eu ut odio.</p>\r\n', 'css.jpg', '2017-09-04 07:57:12'),
(13, 2, 'Second Post', 'Second-Post', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a vehicula libero, nec finibus urna. Aliquam maximus mauris eget dignissim molestie. Morbi id dolor id purus varius laoreet at id eros. Sed velit nisl, posuere eu venenatis sit amet, vestibulum quis libero. Morbi rhoncus id ligula quis malesuada. Maecenas scelerisque viverra tortor et sagittis. Quisque vitae turpis sed nibh lobortis volutpat eu non metus. Nullam tristique nibh eu erat blandit, non hendrerit elit sollicitudin. Nunc sed mollis ante, id convallis lectus. Nullam eu metus nec urna porttitor malesuada. Aliquam dictum aliquam magna, vitae commodo tellus sagittis vel. Suspendisse vitae elit ut sem tincidunt interdum. Phasellus aliquam massa sit amet magna tempor accumsan eu ut odio.</p>\r\n', 'html.jpg', '2017-09-03 06:50:20'),
(11, 1, 'First post', 'First-post', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a vehicula libero, nec finibus urna. Aliquam maximus mauris eget dignissim molestie. Morbi id dolor id purus varius laoreet at id eros. Sed velit nisl, posuere eu venenatis sit amet, vestibulum quis libero. Morbi rhoncus id ligula quis malesuada. Maecenas scelerisque viverra tortor et sagittis. Quisque vitae turpis sed nibh lobortis volutpat eu non metus. Nullam tristique nibh eu erat blandit, non hendrerit elit sollicitudin. Nunc sed mollis ante, id convallis lectus. Nullam eu metus nec urna porttitor malesuada. Aliquam dictum aliquam magna, vitae commodo tellus sagittis vel. Suspendisse vitae elit ut sem tincidunt interdum. Phasellus aliquam massa sit amet magna tempor accumsan eu ut odio.</p>\r\n', 'drupal.jpg', '2017-09-01 05:05:38');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `zipcode` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `username`, `zipcode`, `email`, `password`) VALUES
(2, 'Shamir Imtiaz', 'shamir', '1234', 'shamir@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
