-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Dec 06, 2016 at 10:44 AM
-- Server version: 5.5.49-log
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_members`
--

CREATE TABLE IF NOT EXISTS `blog_members` (
  `memberID` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_members`
--

INSERT INTO `blog_members` (`memberID`, `username`, `password`, `email`) VALUES
(1, 'Demo', '$2y$10$wJxa1Wm0rtS2BzqKnoCPd.7QQzgu7D/aLlMR5Aw3O.m9jx3oRJ5R2', 'demo@demo.com'),
(2, 'guest', '$2y$10$wuFbwLA9sRYyKpoNjX0XBOXEh1Q.OMo3lIjbs0yZXpbIItHj257F6', 'guest@gmail.com'),
(4, 'user1', '$2y$10$vM3bPlCf9faDOosxCZBiA.fKxw2ufYaU6L1Cf52BZl1fxKz5pbqx2', 'new@gmail.com'),
(5, 'john', '$2y$10$Ie8VrO8OOA5C/dPFldCdkO7HOegRxRWDuMH5hzzs8ZwfN62vaNkEm', 'johnny@yahoo.com'),
(6, 'van', '$2y$10$Y7VfQFfcypK2IteR8mg4HOfRwQtu68Tl8OBOvpf9bE847yjFFMqTK', 'helsing@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE IF NOT EXISTS `blog_posts` (
  `memberID` int(11) NOT NULL DEFAULT '0',
  `postID` int(11) NOT NULL,
  `postTitle` varchar(255) DEFAULT NULL,
  `postDesc` text,
  `postCont` text,
  `postDate` datetime DEFAULT NULL,
  `field_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`memberID`, `postID`, `postTitle`, `postDesc`, `postCont`, `postDate`, `field_image`) VALUES
(6, 7, 'Updated Title', 'this is a new test', 'postCont', '2016-12-04 19:44:26', 'dcuments/first-aid.png'),
(1, 8, 'a post by demo', '<p>this is the first post by demo</p>', 'this is the post with post id=8', '2016-12-06 10:30:58', 'dcuments/legal-hammer-symbol_318-64606.png'),
(1, 10, '3rd post by demo', '<p>this is the third post</p>', 'postCont', '2016-12-04 20:07:05', 'dcuments/insurance-claim.png'),
(6, 13, '2nd post ', '<p>sample text</p>', '<p>Compiled and minified CSS, JavaScript, and fonts. No docs or original source files are included.</p>', '2016-12-05 21:02:27', 'dcuments/legal-expert.png'),
(6, 14, 'new post', 'new desc', 'new content', '2016-12-05 21:06:28', 'dcuments/insurance -company.png'),
(6, 15, '12th of DEcember', '<p>remember remember 12th of Dec</p>', '<p>you can kill a man but you you cannot kill the idea</p>', '2016-12-05 18:52:58', 'dcuments/slider-2.png'),
(6, 16, 'a new beginning', '<p>this si a naerw test</p>', 'postCont', '2016-12-05 20:38:47', 'dcuments/3650111-Blackboard-with-chemical-formula-DNA-Vector-illustration-Stock-Vector.jpg'),
(1, 17, 'Dec 6th, 2016', '<p>This is a test post</p>', '<p>A post to test if the add post feature of the website performs the basic functionality that is intended from the mentioned feature</p>', '2016-12-06 10:24:21', 'dcuments/hospital sillhouette.jpg'),
(1, 18, 'time check post', '<p>testing time stamp</p>', '<p>this post is intended to test timestamp that is stored with each post</p>', '2016-12-06 10:32:06', 'dcuments/goal.png'),
(1, 19, 'time check 2', '<p>ticmek</p>', '<p>adasjkdkka</p>', '2016-12-06 15:40:25', 'dcuments/depositphotos_73110621-Doctors-and-medical-staff..jpg');

-- --------------------------------------------------------

--
-- Table structure for table `my_table`
--

CREATE TABLE IF NOT EXISTS `my_table` (
  `field_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `my_table`
--

INSERT INTO `my_table` (`field_image`) VALUES
('dcuments/about-lowest-rate.png'),
('dcuments/hospital-icons-vector.jpg'),
('dcuments/hospital-icons-vector.jpg'),
('dcuments/Colored-capsule-vector-set-02.jpg'),
('dcuments/Colored-capsule-vector-set-02.jpg'),
('dcuments/Colored-capsule-vector-set-02.jpg'),
('dcuments/Colored-capsule-vector-set-02.jpg'),
('dcuments/Colored-capsule-vector-set-02.jpg'),
('dcuments/Colored-capsule-vector-set-02.jpg'),
('dcuments/'),
('dcuments/'),
('dcuments/'),
('dcuments/'),
('dcuments/'),
('dcuments/'),
('dcuments/'),
('dcuments/'),
('dcuments/'),
('dcuments/'),
('dcuments/cutcaster-vector-801051980-Connect-business-people-network-connection-copy-space.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `ttext` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`ttext`) VALUES
('How to train a Dragon'),
('A new start');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_members`
--
ALTER TABLE `blog_members`
  ADD PRIMARY KEY (`memberID`);

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`postID`,`memberID`),
  ADD KEY `memberID` (`memberID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_members`
--
ALTER TABLE `blog_members`
  MODIFY `memberID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `postID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD CONSTRAINT `blog_posts_ibfk_1` FOREIGN KEY (`memberID`) REFERENCES `blog_members` (`memberID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
