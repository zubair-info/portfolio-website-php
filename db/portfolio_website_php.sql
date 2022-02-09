-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2022 at 01:27 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio_website_php`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `detail` text NOT NULL,
  `from` varchar(100) NOT NULL,
  `live_in` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `button` varchar(255) NOT NULL,
  `button_link` varchar(255) NOT NULL,
  `image_location` varchar(100) NOT NULL,
  `active_sts` int(2) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `name`, `designation`, `detail`, `from`, `live_in`, `age`, `gender`, `button`, `button_link`, `image_location`, `active_sts`) VALUES
(1, 'zubair ahmed ', 'Web Designer & Devloper', 'As a web developer, my objective is to make a positive impact on clients, co-workers, and the Internet using my skills and experience to develop compelling and attractive websites.', 'Sirajgonj,Rajshai', 'Dhaka,Bangladesh', 26, 'Male', 'Download CV', 'https://docs.google.com/document/d/1Ba4Js0H491g8uWM9Ej6T0qXMChzkw2os/edit?usp=sharing&ouid=103651987033196460156&rtpof=true&sd=true', 'uploads/about/1.JPG', 1),
(2, 'JOHN SMITH ok', 'Devaloper ok', '..n', 'dsds', 'dsd', 0, 'Female', 'aa', 'http://localhost/portfolio-php/admin/about.php', 'uploads/about/2.JPG', 2);

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `banner_title_one` varchar(100) NOT NULL,
  `banner_title_two` varchar(150) NOT NULL,
  `banner_sub_title` varchar(255) NOT NULL,
  `banner_detail` text NOT NULL,
  `image_location` varchar(100) NOT NULL,
  `active_sts` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `banner_title_one`, `banner_title_two`, `banner_sub_title`, `banner_detail`, `image_location`, `active_sts`) VALUES
(6, 'I&#39;M ZUBAIR', 'AHMED', 'WELCOME', 'Web Designer & Devloper', 'uploads/banner/6.jpg', 1),
(8, 'I&#39;m Zubair', 'Ahmed', 'Welcome', 'Web Designer & Devloper', 'uploads/banner/8.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `coding_skills`
--

CREATE TABLE `coding_skills` (
  `id` int(11) NOT NULL,
  `coding_skill` varchar(100) NOT NULL,
  `skill_caption` varchar(100) NOT NULL,
  `progress_percent` varchar(100) NOT NULL,
  `active_sts` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coding_skills`
--

INSERT INTO `coding_skills` (`id`, `coding_skill`, `skill_caption`, `progress_percent`, `active_sts`) VALUES
(2, 'Coding skills', 'JavaScript', '80', 1),
(4, '', 'PHP', '95', 1),
(5, '', 'HTML+CSS', '90', 1),
(6, '', 'LARAVEL', '95', 1);

-- --------------------------------------------------------

--
-- Table structure for table `design_skills`
--

CREATE TABLE `design_skills` (
  `id` int(11) NOT NULL,
  `skill_caption` varchar(100) NOT NULL,
  `progress_percent` varchar(100) NOT NULL,
  `active_sts` int(2) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `design_skills`
--

INSERT INTO `design_skills` (`id`, `skill_caption`, `progress_percent`, `active_sts`) VALUES
(1, 'UI / UX Design', '100', 1),
(2, 'Web Design', '98', 1),
(3, 'Logo Design', '85', 1),
(4, 'woordpress', '95', 1);

-- --------------------------------------------------------

--
-- Table structure for table `educations`
--

CREATE TABLE `educations` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `heading` varchar(100) NOT NULL,
  `sub_heading` varchar(100) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `active_sts` int(2) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `educations`
--

INSERT INTO `educations` (`id`, `title`, `heading`, `sub_heading`, `detail`, `active_sts`) VALUES
(2, '2020  ', 'Computer Science and Engineering', 'University of Asia Pacific', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered', 1),
(3, '2020', 'Specialize of course', 'University of Study', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered', 1),
(4, '2022', 'Specialize of course', 'University of Study', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered', 1);

-- --------------------------------------------------------

--
-- Table structure for table `experiences`
--

CREATE TABLE `experiences` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `heading` varchar(100) NOT NULL,
  `sub_heading` varchar(150) NOT NULL,
  `detail` text NOT NULL,
  `active_sts` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `experiences`
--

INSERT INTO `experiences` (`id`, `title`, `heading`, `sub_heading`, `detail`, `active_sts`) VALUES
(1, '2017 - Current  ', 'Specialize of course ', 'University of Study', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered', 1),
(2, '2012', 'Specialize of course', 'University of Study', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered', 1),
(3, '2020', 'Specialize of course', 'University of Study', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered', 1);

-- --------------------------------------------------------

--
-- Table structure for table `funfact_items`
--

CREATE TABLE `funfact_items` (
  `id` int(11) NOT NULL,
  `funfact_counter` int(11) NOT NULL,
  `white_head` varchar(100) NOT NULL,
  `active_sts` int(1) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `funfact_items`
--

INSERT INTO `funfact_items` (`id`, `funfact_counter`, `white_head`, `active_sts`) VALUES
(1, 768, 'Clients', 1),
(2, 212, 'Project Compleate', 1),
(3, 145, 'Project Ongoing', 1),
(4, 699, 'Client Satisfaction', 1),
(5, 10, 'Project Going', 2);

-- --------------------------------------------------------

--
-- Table structure for table `guest_messages`
--

CREATE TABLE `guest_messages` (
  `id` int(11) NOT NULL,
  `guest_name` varchar(100) NOT NULL,
  `guest_email` varchar(100) NOT NULL,
  `guest_subject` varchar(100) NOT NULL,
  `guest_message` text NOT NULL,
  `read_sts` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guest_messages`
--

INSERT INTO `guest_messages` (`id`, `guest_name`, `guest_email`, `guest_subject`, `guest_message`, `read_sts`) VALUES
(58, 'milon', 'mi@gmail.com', 'message ok', 'milon message koecha', 1),
(59, 'akbor', 'akbor@gmail.com', 'sent message', 'message done', 2),
(60, 'babor', 'babor@gmail.com', 'boor message', 'message korci', 1),
(61, 'zubair', 'zubair@gmail.com', 'message', 'zubair message', 1),
(62, 'milon', 'mi@gmail.com', 'message ok', 'milon message koecha', 2),
(63, 'akbor', 'akbor@gmail.com', 'sent message', 'message done', 1),
(64, 'babor', 'babor@gmail.com', 'boor message', 'message korci', 1),
(65, 'zubair', 'zubair@gmail.com', 'message', 'zubair message', 2),
(66, 'milon', 'mi@gmail.com', 'message ok', 'milon message koecha', 1),
(67, 'akbor', 'akbor@gmail.com', 'sent message', 'message done', 1),
(68, 'babor', 'babor@gmail.com', 'boor message', 'message korci', 1),
(69, 'zubair', 'zubair@gmail.com', 'message', 'zubair message', 1),
(70, 'milon', 'mi@gmail.com', 'message ok', 'milon message koecha', 1),
(71, 'akbor', 'akbor@gmail.com', 'sent message', 'message done', 1),
(72, 'babor', 'babor@gmail.com', 'boor message', 'message korci', 1),
(73, 'zubair', 'zubair@gmail.com', 'message', 'zubair message', 1),
(74, 'milon', 'mi@gmail.com', 'message ok', 'milon message koecha', 1),
(75, 'akbor', 'akbor@gmail.com', 'sent message', 'message done', 1),
(76, 'babor', 'babor@gmail.com', 'boor message', 'message korci', 1),
(77, 'zubair', 'zubair@gmail.com', 'message', 'zubair message', 1),
(78, 'milon', 'mi@gmail.com', 'message ok', 'milon message koecha', 1),
(79, 'akbor', 'akbor@gmail.com', 'sent message', 'message done', 1),
(80, 'babor', 'babor@gmail.com', 'boor message', 'message korci', 1),
(81, 'zubair', 'zubair@gmail.com', 'message', 'zubair message', 1),
(82, 'milon', 'mi@gmail.com', 'message ok', 'milon message koecha', 1),
(83, 'akbor', 'akbor@gmail.com', 'sent message', 'message done', 1),
(84, 'babor', 'babor@gmail.com', 'boor message', 'message korci', 1),
(85, 'zubair', 'zubair@gmail.com', 'message', 'zubair message', 1),
(86, 'milon', 'mi@gmail.com', 'message ok', 'milon message koecha', 1),
(87, 'akbor', 'akbor@gmail.com', 'sent message', 'message done', 1),
(88, 'babor', 'babor@gmail.com', 'boor message', 'message korci', 1),
(89, 'zubair', 'zubair@gmail.com', 'message', 'zubair message', 1),
(90, 'milon', 'mi@gmail.com', 'message ok', 'milon message koecha', 1),
(91, 'akbor', 'akbor@gmail.com', 'sent message', 'message done', 1),
(92, 'babor', 'babor@gmail.com', 'boor message', 'message korci', 1),
(93, 'zubair', 'zubair@gmail.com', 'message', 'zubair message', 1),
(94, 'milon', 'mi@gmail.com', 'message ok', 'milon message koecha', 1),
(95, 'akbor', 'akbor@gmail.com', 'sent message', 'message done', 1),
(96, 'babor', 'babor@gmail.com', 'boor message', 'message korci', 1),
(97, 'zubair', 'zubair@gmail.com', 'message', 'zubair message', 1),
(98, 'zubair', 'zubair@gmail.com', 'message', 'zubair message', 1),
(99, 'milon', 'mi@gmail.com', 'message ok', 'milon message koecha', 1),
(100, 'akbor', 'akbor@gmail.com', 'sent message', 'message done', 1),
(101, 'babor', 'babor@gmail.com', 'boor message', 'message korci', 1),
(102, 'zubair', 'zubair@gmail.com', 'message', 'zubair message', 1),
(103, 'milon', 'mi@gmail.com', 'message ok', 'milon message koecha', 1),
(104, 'akbor', 'akbor@gmail.com', 'sent message', 'message done', 1),
(105, 'babor', 'babor@gmail.com', 'boor message', 'message korci', 1),
(106, 'zubair', 'zubair@gmail.com', 'message', 'zubair message', 1),
(107, 'milon', 'mi@gmail.com', 'message ok', 'milon message koecha', 1),
(108, 'akbor', 'akbor@gmail.com', 'sent message', 'message done', 1),
(109, 'babor', 'babor@gmail.com', 'boor message', 'message korci', 1),
(110, 'zubair', 'zubair@gmail.com', 'message', 'zubair message', 1),
(111, 'milon', 'mi@gmail.com', 'message ok', 'milon message koecha', 1),
(112, 'akbor', 'akbor@gmail.com', 'sent message', 'message done', 1),
(113, 'babor', 'babor@gmail.com', 'boor message', 'message korci', 1),
(114, 'zubair', 'zubair@gmail.com', 'message', 'zubair message', 1),
(115, 'milon', 'mi@gmail.com', 'message ok', 'milon message koecha', 1),
(116, 'akbor', 'akbor@gmail.com', 'sent message', 'message done', 1),
(117, 'babor', 'babor@gmail.com', 'boor message', 'message korci', 1),
(118, 'zubair', 'zubair@gmail.com', 'message', 'zubair message', 1),
(119, 'milon', 'mi@gmail.com', 'message ok', 'milon message koecha', 1),
(120, 'akbor', 'akbor@gmail.com', 'sent message', 'message done', 1),
(121, 'babor', 'babor@gmail.com', 'boor message', 'message korci', 1);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_head_one`
--

CREATE TABLE `portfolio_head_one` (
  `id` int(11) NOT NULL,
  `portfolio_head` varchar(100) NOT NULL,
  `active_sts` int(2) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `portfolio_head_one`
--

INSERT INTO `portfolio_head_one` (`id`, `portfolio_head`, `active_sts`) VALUES
(1, 'web design', 2);

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_one`
--

CREATE TABLE `portfolio_one` (
  `id` int(11) NOT NULL,
  `portfolio_name` varchar(100) NOT NULL,
  `heading` varchar(100) NOT NULL,
  `sub_head` varchar(100) NOT NULL,
  `image_location` varchar(100) NOT NULL,
  `active_sts` int(2) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `portfolio_one`
--

INSERT INTO `portfolio_one` (`id`, `portfolio_name`, `heading`, `sub_head`, `image_location`, `active_sts`) VALUES
(3, '', 'Mobile Travel App', 'Travel, Discovery', 'uploads/portfolio/3.jpg', 1),
(4, '', 'Gaming Dashboard', 'Games, Streaming', 'uploads/portfolio/4.jpg', 1),
(5, '', 'Mobile Travel App', 'Travel, Discovery', 'uploads/portfolio/5.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `social_icon_search` varchar(100) NOT NULL,
  `heading` varchar(150) NOT NULL,
  `sub_heading` varchar(150) NOT NULL,
  `active_sts` int(2) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `social_icon_search`, `heading`, `sub_heading`, `active_sts`) VALUES
(1, 'fab fa-bitbucket ', 'Web Design', 'There are many variations of passages of Lorem Ipsum available', 1),
(2, 'fas fa-search', 'SEO', 'There are many variations of passages of Lorem Ipsum available', 1),
(3, 'far fa-edit', 'UI/UX Design  ', 'There are many variations of passages of Lorem Ipsum available', 1),
(4, 'fas fa-code', 'Web Development', 'There are many variations of passages of Lorem Ipsum available', 1),
(10, 'fab fa-facebook-messenger', 'Web Design ', 'There are many variations of passages of Lorem Ipsum available', 2);

-- --------------------------------------------------------

--
-- Table structure for table `social_medias`
--

CREATE TABLE `social_medias` (
  `id` int(11) NOT NULL,
  `social_url` varchar(255) NOT NULL,
  `social_icon_search` varchar(255) DEFAULT NULL,
  `social_icon` varchar(255) NOT NULL,
  `active_sts` int(1) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `social_medias`
--

INSERT INTO `social_medias` (`id`, `social_url`, `social_icon_search`, `social_icon`, `active_sts`) VALUES
(1, 'https://www.facebook.com/', 'fa-facebook', 'fab fa-facebook', 1),
(2, 'https://twitter.com/', 'fa-twitter', 'fa-twitter', 1),
(6, 'https://www.linkedin.com/', 'fa-linkedin', 'fa-linkedin', 1),
(9, 'https://wordpress.org/download/', 'fa-wordpress', 'fa-wordpress', 1),
(10, 'https://www.facebook.com/', 'fab fa-facebook-f', 'fa-address-book', 2),
(11, 'https://www.facebook.com/', 'fas fa-bullseye', 'fa-address-book-o', 2),
(12, 'https://www.facebook.com/', 'fas fa-arrow-circle-up', 'fa-500px', 2),
(13, 'https://twitter.com/', 'fas fa-desktop', 'fa-align-right', 2);

-- --------------------------------------------------------

--
-- Table structure for table `testimonial_items`
--

CREATE TABLE `testimonial_items` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `degination` varchar(100) NOT NULL,
  `detail` text NOT NULL,
  `image_location` varchar(100) NOT NULL,
  `active_sts` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimonial_items`
--

INSERT INTO `testimonial_items` (`id`, `name`, `degination`, `detail`, `image_location`, `active_sts`) VALUES
(8, 'GEORGE WALKER', 'CHIEF FINANCIAL ANALYS', '&#34;Nulla ullamcorper, ipsum vel condimentum congue, mi odio vehicula tellus, sit amet malesuada justo sem sit amet quam. Pellentesque in sagittis lacus.&#34;', 'uploads/testimonial/8.jpg', 2),
(9, 'GEORGE WALKER', 'CHIEF FINANCIAL ANALYS', '&#34;Nulla ullamcorper, ipsum vel condimentum congue, mi odio vehicula tellus, sit amet malesuada justo sem sit amet quam. Pellentesque in sagittis lacus.&#34;', 'uploads/testimonial/9.jpg', 1),
(11, 'AKBOR KHAN', 'CHIEF FINANCIAL ANALYS', '&#34;Nulla ullamcorper, ipsum vel condimentum congue, mi odio vehicula tellus, sit amet malesuada justo sem sit amet quam. Pellentesque in sagittis lacus.&#34;', 'uploads/testimonial/11.jpg', 1),
(12, 'JERIN KHAN', 'CHIEF FINANCIAL ANALYS', '&#34;Nulla ullamcorper, ipsum vel condimentum congue, mi odio vehicula tellus, sit amet malesuada justo sem sit amet quam. Pellentesque in sagittis lacus.&#34;', 'uploads/testimonial/12.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `date_of_birth` varchar(55) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `post_code` varchar(255) DEFAULT NULL,
  `region` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `image_location` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirm_password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `user_name`, `number`, `date_of_birth`, `country`, `city`, `state`, `post_code`, `region`, `address`, `image_location`, `email`, `password`, `confirm_password`) VALUES
(7, 'zubair', 'ahmed', '', '01714350207', '1995-07-30', 'Bangladesh', 'dhaka', 'dhaka', '1209', 'islam', 'Dhaka,Bangladesh', 'uploads/profile/.jpg', 'zubair@gmail.com', '70b4269b412a8af42b1f7b0d26eceff2', '70b4269b412a8af42b1f7b0d26eceff2'),
(12, 'zubair', 'ahmed', '', '01714350207', '2022-01-14', 'Bangladesh', 'dhaka', 'dhaka', '1209', 'islam', 'sf', NULL, 'zu@gmail.com', '10b8e822d03fb4fd946188e852a4c3e2', '10b8e822d03fb4fd946188e852a4c3e2'),
(13, 'zubair', 'ahmed', '', '01714350207', '2022-01-14', 'Bangladesh', 'dhaka', 'dhaka', '1209', 'islam', 'zcd', NULL, 'zuw@gmail.com', '70b4269b412a8af42b1f7b0d26eceff2', '70b4269b412a8af42b1f7b0d26eceff2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coding_skills`
--
ALTER TABLE `coding_skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `design_skills`
--
ALTER TABLE `design_skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `educations`
--
ALTER TABLE `educations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `funfact_items`
--
ALTER TABLE `funfact_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guest_messages`
--
ALTER TABLE `guest_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio_head_one`
--
ALTER TABLE `portfolio_head_one`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio_one`
--
ALTER TABLE `portfolio_one`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_medias`
--
ALTER TABLE `social_medias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial_items`
--
ALTER TABLE `testimonial_items`
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
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `coding_skills`
--
ALTER TABLE `coding_skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `design_skills`
--
ALTER TABLE `design_skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `educations`
--
ALTER TABLE `educations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `funfact_items`
--
ALTER TABLE `funfact_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `guest_messages`
--
ALTER TABLE `guest_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `portfolio_head_one`
--
ALTER TABLE `portfolio_head_one`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `portfolio_one`
--
ALTER TABLE `portfolio_one`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `social_medias`
--
ALTER TABLE `social_medias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `testimonial_items`
--
ALTER TABLE `testimonial_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
