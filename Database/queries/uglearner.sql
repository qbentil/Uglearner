-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2022 at 07:30 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uglearner`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

CREATE TABLE `administrators` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL DEFAULT 'user.png',
  `phone` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `rid` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` text DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `facebook` text DEFAULT NULL,
  `instagram` text DEFAULT NULL,
  `twitter` text DEFAULT NULL,
  `linkedin` text DEFAULT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`id`, `name`, `photo`, `phone`, `email`, `rid`, `password`, `token`, `status`, `facebook`, `instagram`, `twitter`, `linkedin`, `date_added`) VALUES
(1, 'Bentil Shadrack', 'myself.jpg', '0556844331', 'sbentil005@st.ug.edu.gh', 1, '664819d8c5343676c9225b5ed00a5cdc6f3a1ff3', 'c223b66d7f6788724ebdc79b5af3f86f', '1', 'https://facebook.com/qbentil', 'https://instagram.com/qbentil', 'https://twitter.com/themanbentil', 'https://linkedin.com/qbentil', '2021-05-01 12:32:29');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo` text DEFAULT NULL,
  `photo` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `facebook` text DEFAULT NULL,
  `telegram` text DEFAULT NULL,
  `twitter` text DEFAULT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `logo`, `photo`, `description`, `address`, `email`, `facebook`, `telegram`, `twitter`, `status`, `date_added`) VALUES
(1, 'Department of Mathematics', 'newlogo.jpg', 'maths.jpg', 'A suburb of Basic and Applied Sciences', 'Adjacent the school of engineering', 'dom@st.ug.edu.gh', 'https://facebook.com/new', 'https://telegram.com/new', 'https://twitter.com/new', '1', '2021-04-28 10:50:16'),
(2, 'Computer Science', 'logo.png', 'it.jpg', 'A suburb of Basic and Applied Sciences', 'Opposite the maths dept.', 'cs@st.ug.edu.gh', NULL, NULL, NULL, '1', '2021-04-28 11:43:53'),
(7, 'Faculty of Law', NULL, NULL, 'We train to enact Law', 'This is Or Address\r\nAdjacent Department of mathemeatics', 'foflaw@ug.edu.ghq', '', '', '', '1', '2021-09-22 01:21:24'),
(9, 'Faculty of Arts', NULL, NULL, 'Some description here', 'Our Address will come after', 'foa@st.ug.edu.gh', '', '', '', '1', '2021-09-26 04:45:12'),
(11, 'sdfghjk', NULL, NULL, 'asdfghj', 'ASDFGHJasdfghj\r\nsdf', 'asdfg@xf.cvb', '', '', '', '1', '2021-09-27 03:31:52');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `choices`
--

CREATE TABLE `choices` (
  `id` int(11) NOT NULL,
  `choices` text NOT NULL,
  `answer` int(1) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `communities`
--

CREATE TABLE `communities` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `logo` text NOT NULL,
  `photo` text DEFAULT NULL,
  `about` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `facebook` text DEFAULT NULL,
  `instagram` text DEFAULT NULL,
  `twitter` text DEFAULT NULL,
  `date_added` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `communities`
--

INSERT INTO `communities` (`id`, `cid`, `name`, `slug`, `logo`, `photo`, `about`, `email`, `status`, `facebook`, `instagram`, `twitter`, `date_added`) VALUES
(1, 2, 'Computer Science Students Association', 'COMPSSA', 'compssa-logo.jpg', 'compssa-feature.jpg', 'Developer community for IT and computer science students', 'compssa@st.ug.edu.gh', '1', 'https://www.facebook.com/compssa', 'https://www.instagram.com/compssa', 'https://www.twitter.com/compssa', '2021-05-01');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `subject`, `message`, `status`, `date`) VALUES
(1, 'Bentil Shadrack', 'sbentil005@st.ug.edu.gh', '0556844331', 'Can\'t access MCQ', 'MCQ for DCIT 103 has been down since last Friday. Kindly check it for us. Thank you.', '0', '2021-04-26 11:38:22'),
(2, 'Kelvin Sowah', 'ksowah@st.ug.edu.gh', '0556845331', 'Can\'t see Answers', 'MCQ for Stat 111 question 3 doesn\'t have answer. Thank you.', '1', '2021-04-28 01:00:59'),
(10, 'Emmanuel Bio', 'embentil@gmail.com', '0234567898', 'savbfghgjhk', 'sbnfghmdf', '1', '2021-05-22 04:53:02'),
(11, 'Amankwah Kinglsey', 'klassic05@gmail.com', '0234567898', 'savbfghgjhk', 'sbnfghmdf', '1', '2021-05-22 04:54:06'),
(12, 'Peter Doe', 'doe@gmail.com', '0501028072', 'Live testing on update', 'Hello Ben!\r\nCheck update', '1', '2021-05-22 05:04:33'),
(13, 'Joan Stevens', 'joan01@st.ug.edu.gh', '0550115628', 'Email Validation', 'Validate email using regex', '1', '2021-05-22 05:10:14');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `tid` varchar(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `logo` text DEFAULT NULL,
  `photo` text DEFAULT 'default.jpg',
  `description` text NOT NULL,
  `level` int(11) NOT NULL,
  `language` varchar(100) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `cid` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `tid`, `title`, `logo`, `photo`, `description`, `level`, `language`, `status`, `cid`, `date_added`) VALUES
(1, 'STAT111', 'Introduction to statistics and probability I', 'users.png', 'pic8.jpg', 'About Ststisitics', 100, 'English', '1', 1, '2021-04-28 11:10:52'),
(4, 'DCIT101', 'Introduction to Computer Science', 'dcitlogo.jpg', 'default.jpg', 'Here you will find a list of common important questions on computer operation in MCQ quiz style with answer for competitive exams and interviews. These frequently asked sample questions on Computer are given with correct choice of answer that you can check instantly. Presently we have added total 4 sets of questions on computer operation for you to practice. We will keep adding more questions and provide this question bank in PDF format, so that you can download them instantly in E-book style.', 100, 'English', '1', 2, '2021-04-28 11:39:41');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `flier` text DEFAULT NULL,
  `rate` int(11) NOT NULL,
  `venue` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `cid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `flier`, `rate`, `venue`, `description`, `status`, `start`, `end`, `cid`) VALUES
(1, '2021 COMPSSA Python bootcamp', 'pic4.jpg', 50, 'The Software lab.', 'A meetup for all computer science students to equip themselve in python nmachine learning', '1', '2021-05-28 07:41:59', '2021-06-02 11:43:53', 1);

-- --------------------------------------------------------

--
-- Table structure for table `executives`
--

CREATE TABLE `executives` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `photo` text DEFAULT NULL,
  `position` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `facebook` text DEFAULT NULL,
  `twitter` text DEFAULT NULL,
  `linkedin` text DEFAULT NULL,
  `github` text DEFAULT NULL,
  `pid` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `executives`
--

INSERT INTO `executives` (`id`, `name`, `photo`, `position`, `phone`, `email`, `facebook`, `twitter`, `linkedin`, `github`, `pid`, `date_added`) VALUES
(1, 'Bentil Shadrack', 'self.jpg', 'President', '0556844331', 'sbentil005@st.ug.edu.gh', 'https:www.facebook.com/qbentil', 'https:www.twitter.com/bentilzone', 'https:www.linkedin.com/qbentil', 'https:www.github.com/qbentil', 1, '2021-05-04 03:02:04');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`id`, `cid`, `name`, `status`, `date_added`) VALUES
(1, 1, 'COMPSSA 2021/2022', '1', '2021-05-04 02:29:25');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `question` text NOT NULL,
  `oid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `status`, `date_added`) VALUES
(1, 'Super Administrator', 'Access, Manage and Supervises all modules of this Application.', '1', '2021-04-28 11:01:02'),
(3, 'Examiner', 'Add Quizzes, Review and Approve questions, Respond to feedbacks on questions.', '1', '2021-04-25 07:29:04'),
(10, 'Systems Admin', 'Manages and Maintains The Server and System related issues', '1', '2021-09-11 16:37:45');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_added` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `date_added`) VALUES
(9, 'bentilshadrack72@gmail.com', '2021-08-02'),
(10, 'yawsarfo2019@gmail.com', '2021-08-02'),
(11, 'sbentil005@st.ug.edu.gh', '2021-08-02'),
(12, 'bentil.changepromotions@gmail.com', '2021-10-17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrators`
--
ALTER TABLE `administrators`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`,`email`),
  ADD KEY `admin_role_fk` (`rid`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender__fk` (`sid`),
  ADD KEY `reciepient__fk` (`rid`);

--
-- Indexes for table `choices`
--
ALTER TABLE `choices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `communities`
--
ALTER TABLE `communities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `com_cat_fk` (`cid`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tid` (`tid`),
  ADD KEY `course_cat_fk` (`cid`),
  ADD KEY `title` (`title`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_cat_fk` (`cid`);

--
-- Indexes for table `executives`
--
ALTER TABLE `executives`
  ADD PRIMARY KEY (`id`),
  ADD KEY `executive_port_fk` (`pid`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_feedback_fk` (`qid`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notif_cat_fk` (`cid`),
  ADD KEY `notif_sender_fk` (`sid`) USING BTREE,
  ADD KEY `notif_receiver_fk` (`rid`) USING BTREE;

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `portfolio_com_fk` (`cid`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_course_fk` (`cid`),
  ADD KEY `question_choice_fk` (`oid`),
  ADD KEY `question_user_fk` (`uid`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrators`
--
ALTER TABLE `administrators`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `choices`
--
ALTER TABLE `choices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `communities`
--
ALTER TABLE `communities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `executives`
--
ALTER TABLE `executives`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `administrators`
--
ALTER TABLE `administrators`
  ADD CONSTRAINT `admin_role_fk` FOREIGN KEY (`rid`) REFERENCES `roles` (`id`);

--
-- Constraints for table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `reciepient__fk` FOREIGN KEY (`rid`) REFERENCES `administrators` (`id`),
  ADD CONSTRAINT `sender__fk` FOREIGN KEY (`sid`) REFERENCES `administrators` (`id`);

--
-- Constraints for table `communities`
--
ALTER TABLE `communities`
  ADD CONSTRAINT `com_cat_fk` FOREIGN KEY (`cid`) REFERENCES `categories` (`id`);

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `course_cat_fk` FOREIGN KEY (`cid`) REFERENCES `categories` (`id`);

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `event_cat_fk` FOREIGN KEY (`cid`) REFERENCES `communities` (`id`);

--
-- Constraints for table `executives`
--
ALTER TABLE `executives`
  ADD CONSTRAINT `ex_cat_fk` FOREIGN KEY (`pid`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `executive_port_fk` FOREIGN KEY (`pid`) REFERENCES `portfolio` (`id`);

--
-- Constraints for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD CONSTRAINT `question_feedback_fk` FOREIGN KEY (`qid`) REFERENCES `questions` (`id`);

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `event_receiver_fk` FOREIGN KEY (`rid`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `event_sender_fk` FOREIGN KEY (`sid`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `notif_cat_fk` FOREIGN KEY (`cid`) REFERENCES `categories` (`id`);

--
-- Constraints for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD CONSTRAINT `portfolio_com_fk` FOREIGN KEY (`cid`) REFERENCES `communities` (`id`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `question_choice_fk` FOREIGN KEY (`oid`) REFERENCES `choices` (`id`),
  ADD CONSTRAINT `question_course_fk` FOREIGN KEY (`cid`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `question_user_fk` FOREIGN KEY (`uid`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
