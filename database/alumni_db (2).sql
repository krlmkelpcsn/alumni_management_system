-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2025 at 05:22 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alumni_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumnus_bio`
--

CREATE TABLE `alumnus_bio` (
  `id` int(30) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `middlename` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `batch` year(4) NOT NULL,
  `course_id` int(30) NOT NULL,
  `email` varchar(250) NOT NULL,
  `connected_to` text NOT NULL,
  `avatar` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0= Unverified, 1= Verified',
  `date_created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alumnus_bio`
--

INSERT INTO `alumnus_bio` (`id`, `firstname`, `middlename`, `lastname`, `gender`, `batch`, `course_id`, `email`, `connected_to`, `avatar`, `status`, `date_created`) VALUES
(24, 'Karl Mikel', 'Belleza', 'Pecson', 'Male', '0000', 19, 'ken@gmail.com', 'Developer', '1732764420_default_admin.webp', 1, '2024-11-28'),
(25, 'Karl Mikel', 'Belleza', 'Pecson', 'Male', '0000', 20, 'karl@gmail.com', 'Developer', '1732764480_462567925_1090215889160858_2361778660079692173_n.jpg', 1, '2024-11-28'),
(26, '', '', '', '', '0000', 0, '', '', '', 0, '2024-11-29'),
(27, 'qweqwewqeq', 'qweqew', 'qweqe', 'Male', '0000', 17, 'kaneki@gmail.com', 'qweqweq', '1732842240_462567925_1090215889160858_2361778660079692173_n.jpg', 1, '2024-11-29'),
(28, 'Karl Mikel', 'Belleza', 'Pecson', 'Female', '0000', 22, 'mikel@gmail.com', 'Developer', '1732854780_haisee-hub.jpg', 0, '2024-11-29'),
(29, '', '', '', '', '0000', 0, '', '', '', 0, '2024-12-04'),
(30, '', '', '', '', '0000', 0, '', '', '', 0, '2024-12-04');

-- --------------------------------------------------------

--
-- Table structure for table `careers`
--

CREATE TABLE `careers` (
  `id` int(30) NOT NULL,
  `company` varchar(250) NOT NULL,
  `location` text NOT NULL,
  `job_title` text NOT NULL,
  `description` text NOT NULL,
  `user_id` int(30) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `careers`
--

INSERT INTO `careers` (`id`, `company`, `location`, `job_title`, `description`, `user_id`, `date_created`) VALUES
(1, 'IT Company', 'Home-Based', 'Web Developer', '&lt;p style=&quot;-webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin-top: 1.5em; margin-bottom: 1.5em; line-height: 1.5; animation: 1000ms linear 0s 1 normal none running fadeInLorem;&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sagittis eu volutpat odio facilisis mauris sit amet massa vitae. In tellus integer feugiat scelerisque varius morbi enim. Orci eu lobortis elementum nibh tellus molestie nunc. Vulputate ut pharetra sit amet aliquam id diam maecenas ultricies. Lacus sed viverra tellus in hac habitasse platea dictumst vestibulum. Eleifend donec pretium vulputate sapien nec. Enim praesent elementum facilisis leo vel fringilla est ullamcorper. Quam adipiscing vitae proin sagittis nisl rhoncus. Sed viverra ipsum nunc aliquet bibendum. Enim ut sem viverra aliquet eget sit amet tellus. Integer feugiat scelerisque varius morbi enim nunc faucibus.&lt;/p&gt;&lt;p style=&quot;-webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin-top: 1.5em; margin-bottom: 1.5em; line-height: 1.5; animation: 1000ms linear 0s 1 normal none running fadeInLorem;&quot;&gt;Viverra justo nec ultrices dui. Leo vel orci porta non pulvinar neque laoreet. Id semper risus in hendrerit gravida rutrum quisque non tellus. Sit amet consectetur adipiscing elit ut. Id neque aliquam vestibulum morbi blandit cursus risus. Tristique senectus et netus et malesuada. Amet aliquam id diam maecenas ultricies mi eget mauris. Morbi tristique senectus et netus et malesuada. Diam phasellus vestibulum lorem sed risus. Tempor orci dapibus ultrices in. Mi sit amet mauris commodo quis imperdiet. Quisque sagittis purus sit amet volutpat. Vehicula ipsum a arcu cursus. Ornare quam viverra orci sagittis eu volutpat odio facilisis. Id volutpat lacus laoreet non curabitur. Cursus euismod quis viverra nibh cras pulvinar mattis nunc. Id aliquet lectus proin nibh nisl condimentum id venenatis. Eget nulla facilisi etiam dignissim diam quis enim lobortis. Lacus suspendisse faucibus interdum posuere lorem ipsum dolor sit amet.&lt;/p&gt;', 3, '2020-10-15 14:14:27'),
(3, 'IT Company', 'Quezon City', 'IT Developer', '&lt;p style=&quot;margin-right: 14.4px; margin-bottom: 0px; margin-left: 28.8px; padding: 0px; width: 436.8px; float: left; color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif;&quot;&gt;&lt;p style=&quot;margin-bottom: 15px; padding: 0px; text-align: justify;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Lorem Ipsum&lt;/b&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#x2019;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;/p&gt;', 1, '2024-11-18 20:52:53'),
(6, 'Easy PC', 'Quezon City', 'DEveloper', '&lt;p style=&quot;margin-right: 14.4px; margin-bottom: 0px; margin-left: 28.8px; padding: 0px; width: 436.8px; float: left; color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif;&quot;&gt;&lt;p style=&quot;margin-bottom: 15px; padding: 0px; text-align: justify;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Lorem Ipsum&lt;/b&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#x2019;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;&lt;p&gt;&lt;p style=&quot;margin-right: 14.4px; margin-bottom: 0px; margin-left: 28.8px; padding: 0px; width: 436.8px; float: left; color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif;&quot;&gt;&lt;p style=&quot;margin-bottom: 15px; padding: 0px; text-align: justify;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Lorem Ipsum&lt;/b&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#x2019;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;&lt;p&gt;&lt;p style=&quot;margin-right: 14.4px; margin-bottom: 0px; margin-left: 28.8px; padding: 0px; width: 436.8px; float: left; color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif;&quot;&gt;&lt;p style=&quot;margin-bottom: 15px; padding: 0px; text-align: justify;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Lorem Ipsum&lt;/b&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#x2019;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;&lt;div&gt;&lt;br&gt;&lt;/p&gt;&lt;/p&gt;&lt;/p&gt;&lt;/p&gt;&lt;/p&gt;&lt;/div&gt;', 1, '2024-11-20 20:35:52'),
(7, 'asdas', 'Quezon City', 'asdasda', 'asdadas', 4, '2024-11-21 19:11:04'),
(8, 'DIREC', 'Bato', 'IT Support', '&lt;p style=&quot;font-family: Roboto, sans-serif; margin-top: unset; margin-right: unset; margin-bottom: 15px; margin-left: unset; padding: 0px; color: rgb(33, 37, 41); font-size: 16px; text-align: justify;&quot;&gt;&lt;span style=&quot;font-family: Roboto, sans-serif; margin-top: unset; margin-right: unset; margin-bottom: 15px; margin-left: unset; padding: 0px; color: rgb(33, 37, 41); font-size: 16px; text-align: justify;&quot;&gt;Lorem Ipsum&lt;/span&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&rsquo;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;&lt;p style=&quot;font-family: Roboto, sans-serif; margin: unset; padding: 0px; color: rgb(33, 37, 41); font-size: 16px;&quot;&gt;&lt;/p&gt;&lt;p style=&quot;font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; margin-top: unset; margin-right: 14.4px; margin-bottom: 0px; margin-left: 28.8px; padding: 0px; font-size: 16px; width: 436.8px; float: left; color: rgb(0, 0, 0);&quot;&gt;&lt;/p&gt;&lt;p style=&quot;font-family: Roboto, sans-serif; margin-top: unset; margin-right: unset; margin-bottom: 15px; margin-left: unset; padding: 0px; color: rgb(33, 37, 41); font-size: 16px; text-align: justify;&quot;&gt;&lt;span style=&quot;font-family: Roboto, sans-serif; margin: 0px; padding: 0px;&quot;&gt;Lorem Ipsum&lt;/span&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&rsquo;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;&lt;p style=&quot;font-family: Roboto, sans-serif; margin: unset; padding: 0px; color: rgb(33, 37, 41); font-size: 16px;&quot;&gt;&lt;/p&gt;&lt;p style=&quot;font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; margin-top: unset; margin-right: 14.4px; margin-bottom: 0px; margin-left: 28.8px; padding: 0px; font-size: 16px; width: 436.8px; float: left; color: rgb(0, 0, 0);&quot;&gt;&lt;/p&gt;&lt;p style=&quot;font-family: Roboto, sans-serif; margin-top: unset; margin-right: unset; margin-bottom: 15px; margin-left: unset; padding: 0px; color: rgb(33, 37, 41); font-size: 16px; text-align: justify;&quot;&gt;&lt;span style=&quot;font-family: Roboto, sans-serif; margin: 0px; padding: 0px;&quot;&gt;Lorem Ipsum&lt;/span&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&rsquo;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/p&gt;', 1, '2024-11-24 20:01:38');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(30) NOT NULL,
  `course` text NOT NULL,
  `about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course`, `about`) VALUES
(3, '2009', 'Sample'),
(4, '2010', 'Sample'),
(5, '2011', 'Sample'),
(6, '2012', 'Sample'),
(7, '2013', 'Sample'),
(8, '2014', 'Sample'),
(9, '2015', 'Sample'),
(10, '2016', 'Sample'),
(11, '2017', 'Sample'),
(12, '2018', 'Sample'),
(13, '2019', 'Sample'),
(14, '2020', 'Sample'),
(15, '2021', 'Sample'),
(16, '2022', 'Sample'),
(17, '2023', 'Sample'),
(18, '2024', 'Sample'),
(19, '2025', 'Sample'),
(20, '2026', 'Sample'),
(21, '2027', 'Sample'),
(22, '2028', 'Sample'),
(23, '2029', 'Sample'),
(24, '2030', 'Sample');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(30) NOT NULL,
  `title` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `schedule` datetime NOT NULL,
  `banner` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `content`, `schedule`, `banner`, `date_created`) VALUES
(1, 'EVENT!!!', '&lt;p style=&quot;margin-bottom: 15px; color: rgb(0, 0, 0); font-family: &quot; open=&quot;&quot; sans&quot;,=&quot;&quot; arial,=&quot;&quot; sans-serif;=&quot;&quot; padding:=&quot;&quot; 0px;=&quot;&quot; text-align:=&quot;&quot; justify;&quot;=&quot;&quot;&gt;Cras a est hendrerit, egestas urna quis, ullamcorper elit. Nullam a felis eget dolor vulputate vehicula. In hac habitasse platea dictumst. Nunc est urna, gravida sit amet ligula ut, aliquam fermentum lorem. Vestibulum non suscipit velit, in rhoncus orci. Vivamus pulvinar quam nec leo semper facilisis quis eu magna. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum lectus lorem, iaculis sed nunc nec, lacinia auctor risus.&lt;/p&gt;&lt;p style=&quot;margin-bottom: 15px; color: rgb(0, 0, 0); font-family: &quot; open=&quot;&quot; sans&quot;,=&quot;&quot; arial,=&quot;&quot; sans-serif;=&quot;&quot; padding:=&quot;&quot; 0px;=&quot;&quot; text-align:=&quot;&quot; justify;&quot;=&quot;&quot;&gt;&lt;br&gt;&lt;/p&gt;', '2024-11-16 14:00:00', '1732447620_haisee-hub.jpg', '2020-10-16 09:51:55'),
(3, 'PARTY!!!', '&lt;span style=&quot;color: rgb(0, 0, 0); font-family: system-ui; font-size: 16px;&quot;&gt;Cras a est hendrerit, egestas urna quis, ullamcorper elit. Nullam a felis eget dolor vulputate vehicula. In hac habitasse platea dictumst. Nunc est urna, gravida sit amet ligula ut, aliquam fermentum lorem. Vestibulum non suscipit velit, in rhoncus orci. Vivamus pulvinar quam nec leo semper facilisis quis eu magna. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum lectus lorem, iaculis sed nunc nec, lacinia auctor risus.&lt;/span&gt;', '2024-11-26 13:51:00', '1732447620_haisee-hub.jpg', '2024-11-24 13:52:06'),
(5, 'WAAWAWAWA', '&lt;span style=&quot;color: rgb(0, 0, 0); font-family: system-ui; font-size: 16px;&quot;&gt;Cras a est hendrerit, egestas urna quis, ullamcorper elit. Nullam a felis eget dolor vulputate vehicula. In hac habitasse platea dictumst. Nunc est urna, gravida sit amet ligula ut, aliquam fermentum lorem. Vestibulum non suscipit velit, in rhoncus orci. Vivamus pulvinar quam nec leo semper facilisis quis eu magna. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum lectus lorem, iaculis sed nunc nec, lacinia auctor risus.&lt;/span&gt;', '2024-11-30 18:00:00', '1732428660_haisee-hub.jpg', '2024-11-24 14:11:06'),
(6, 'KAKAKAKKA', '&lt;span style=&quot;color: rgb(0, 0, 0); font-family: system-ui; font-size: 16px;&quot;&gt;Cras a est hendrerit, egestas urna quis, ullamcorper elit. Nullam a felis eget dolor vulputate vehicula. In hac habitasse platea dictumst. Nunc est urna, gravida sit amet ligula ut, aliquam fermentum lorem. Vestibulum non suscipit velit, in rhoncus orci. Vivamus pulvinar quam nec leo semper facilisis quis eu magna. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum lectus lorem, iaculis sed nunc nec, lacinia auctor risus.&lt;/span&gt;', '2024-11-29 22:00:00', '1732447680_default_admin.webp', '2024-11-24 19:28:52'),
(7, 'SHOT!', '&lt;span style=&quot;font-family: inherit; font-size: inherit; font-style: inherit; font-variant-ligatures: inherit; font-variant-caps: inherit; font-weight: inherit; text-align: justify;&quot;&gt;Lorem ipsum dolor sit amet consectetur, adipiscing elit placerat urna.&lt;br&gt;&lt;/span&gt;&lt;span style=&quot;font-family: inherit; font-size: inherit; font-style: inherit; font-variant-ligatures: inherit; font-variant-caps: inherit; font-weight: inherit; text-align: justify;&quot;&gt;Odio vehicula lacus primis enim, pellentesque viverra maecenas.&lt;/span&gt;', '2025-01-04 12:00:00', '1735877340_76dcd6cc-629b-4f5f-9fdd-865753f73e92.jpeg', '2025-01-03 12:09:40');

-- --------------------------------------------------------

--
-- Table structure for table `event_commits`
--

CREATE TABLE `event_commits` (
  `id` int(30) NOT NULL,
  `event_id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event_commits`
--

INSERT INTO `event_commits` (`id`, `event_id`, `user_id`) VALUES
(1, 1, 3),
(2, 2, 1),
(3, 1, 1),
(4, 1, 4),
(5, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `forum_comments`
--

CREATE TABLE `forum_comments` (
  `id` int(30) NOT NULL,
  `topic_id` int(30) NOT NULL,
  `comment` text NOT NULL,
  `user_id` int(30) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `forum_comments`
--

INSERT INTO `forum_comments` (`id`, `topic_id`, `comment`, `user_id`, `date_created`) VALUES
(9, 2, 'sadad', 1, '2024-11-21 11:15:56'),
(12, 1, 'sdasd', 4, '2024-11-21 19:14:18'),
(13, 1, 'asdas', 4, '2024-11-21 19:16:28'),
(14, 1, 'asdasda', 4, '2024-11-21 19:16:53'),
(15, 1, 'asdasd', 4, '2024-11-21 19:25:20'),
(16, 1, 'asdasdad', 4, '2024-11-21 19:27:49'),
(17, 1, 'asdasdsa', 4, '2024-11-21 19:29:01'),
(18, 1, 'asdadsa', 4, '2024-11-21 19:29:59');

-- --------------------------------------------------------

--
-- Table structure for table `forum_topics`
--

CREATE TABLE `forum_topics` (
  `id` int(30) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `user_id` int(30) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `forum_topics`
--

INSERT INTO `forum_topics` (`id`, `title`, `description`, `user_id`, `date_created`) VALUES
(2, 'Sample Topic 2', '&lt;span style=&quot;color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; text-align: justify;&quot;&gt;&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;&lt;/span&gt;', 3, '2020-10-15 15:20:51'),
(3, 'Sample Topic 3', '&lt;span style=&quot;color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; text-align: justify;&quot;&gt;Vivamus gravida nunc orci. Proin ut tristique odio. Nulla suscipit ipsum arcu, a luctus lorem vulputate et. Maecenas magna lorem, tempor id ultrices id, vehicula eu diam. Aliquam erat volutpat. Praesent in sem tincidunt, mattis odio nec, ultrices justo. Vivamus sit amet sapien ornare tortor porttitor congue vel et lorem. In interdum eget metus ut sagittis. In accumsan nec purus vel ornare. Quisque non scelerisque libero, et aliquam risus. Mauris tincidunt ullamcorper efficitur. Nullam venenatis in massa et elementum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; In mollis, tortor sed pellentesque ultrices, sem sem interdum lectus, a laoreet nulla lacus at risus. Ut placerat orci at enim fermentum, eget pretium ante pharetra. Nam id nunc congue augue feugiat egestas.&lt;/span&gt;', 3, '2020-10-15 15:22:30'),
(4, 'asdasdasdas', '&lt;span style=&quot;color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; font-weight: bolder; margin: 0px; padding: 0px; text-align: justify;&quot;&gt;Lorem Ipsum&lt;/span&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; text-align: justify;&quot;&gt;&amp;nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&rsquo;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.&lt;/span&gt;', 1, '2020-10-16 08:31:45'),
(9, 'SHOT SHTO!', 'qweqeqeqeqweeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeqweqeqeqeqweeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeqweqeqeqeqweeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeqweqeqeqeqweeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeqweqeqeqeqweeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeqweqeqeqeqweeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee', 1, '2024-11-25 19:43:34');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(30) NOT NULL,
  `about` text NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `about`, `created`) VALUES
(52, ' qweqweqweq', '2024-11-23 20:00:53'),
(53, ' adasdasda', '2024-11-23 20:02:25'),
(54, ' weqweqe', '2024-11-23 20:11:11');

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `cover_img` text NOT NULL,
  `about_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `name`, `email`, `contact`, `cover_img`, `about_content`) VALUES
(1, 'SPNH', 'spnh@alumni.com', '+6948-8542-623', '1602738120_pngtree-purple-hd-business-banner-image_5493.jpg', '&lt;h3&gt;&lt;b&gt;About Us&lt;/b&gt;&lt;/h3&gt;&lt;p&gt;&lt;b&gt;Welcome to San Pedro National High School of Iriga City!&lt;/b&gt;&lt;/p&gt;&lt;p&gt;San Pedro National High School (SPNHS) is a leading educational institution located in the vibrant city of Iriga, Camarines Sur. Since its establishment, SPNHS has been dedicated to fostering a community of learners who are empowered to achieve academic excellence, develop life skills, and contribute positively to society.&lt;/p&gt;&lt;h3&gt;&lt;b&gt;Our Vision&lt;/b&gt;&lt;/h3&gt;&lt;p&gt;To be a center of excellence in secondary education, shaping students into well-rounded individuals who are prepared for the challenges of the future, with a strong sense of responsibility, community spirit, and a love for lifelong learning.&lt;/p&gt;&lt;h3&gt;&lt;b&gt;Our Mission&lt;/b&gt;&lt;/h3&gt;&lt;p&gt;To provide quality education that nurtures every student&amp;#x2019;s potential, fosters critical thinking, and promotes the holistic development of learners in a safe, inclusive, and dynamic learning environment.&lt;/p&gt;&lt;h3&gt;&lt;b&gt;Our Core Values&lt;/b&gt;&lt;/h3&gt;&lt;p&gt;At San Pedro National High School, we uphold the following core values:&lt;/p&gt;&lt;ul&gt;&lt;li&gt;&lt;b&gt;Integrity&lt;/b&gt;: We believe in honesty and ethical behavior in all aspects of school life.&lt;/li&gt;&lt;li&gt;&lt;b&gt;Excellence&lt;/b&gt;: We strive for the highest standards in academic and extracurricular activities.&lt;/li&gt;&lt;li&gt;&lt;b&gt;Respect&lt;/b&gt;: We promote respect for oneself, others, and the environment.&lt;/li&gt;&lt;li&gt;&lt;b&gt;Innovation&lt;/b&gt;: We encourage creativity and forward-thinking in solving problems.&lt;/li&gt;&lt;li&gt;&lt;b&gt;Community&lt;/b&gt;: We foster a strong sense of belonging and cooperation among students, staff, and stakeholders.&lt;/li&gt;&lt;/ul&gt;&lt;p style=&quot;text-align: center; background: transparent; position: relative;&quot;&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;&lt;/p&gt;');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 3 COMMENT '1=Admin,2=Alumni officer, 3= alumnus',
  `auto_generated_pass` text NOT NULL,
  `alumnus_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `type`, `auto_generated_pass`, `alumnus_id`) VALUES
(1, 'Admin', 'admin', 'd8578edf8458ce06fbc5bb76a58c5ca4', 1, '', 0),
(25, 'Karl Mikel Pecson', 'ken@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 3, '', 24),
(26, 'Karl Mikel Pecson', 'karl@gmail.com', 'qwerty', 3, '', 25),
(28, 'karl', 'MIKEL', 'admin', 1, '', 0),
(30, 'qweqwewqeq qweqe', 'kaneki@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 3, '', 27),
(31, 'Karl Mikel Pecson', 'mikel@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 3, '', 28);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumnus_bio`
--
ALTER TABLE `alumnus_bio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `careers`
--
ALTER TABLE `careers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_commits`
--
ALTER TABLE `event_commits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum_comments`
--
ALTER TABLE `forum_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum_topics`
--
ALTER TABLE `forum_topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
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
-- AUTO_INCREMENT for table `alumnus_bio`
--
ALTER TABLE `alumnus_bio`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `careers`
--
ALTER TABLE `careers`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `event_commits`
--
ALTER TABLE `event_commits`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `forum_comments`
--
ALTER TABLE `forum_comments`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `forum_topics`
--
ALTER TABLE `forum_topics`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
