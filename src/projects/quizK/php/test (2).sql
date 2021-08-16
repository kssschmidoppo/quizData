-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Jul 13, 2021 at 11:56 AM
-- Server version: 8.0.25
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `answerID` int NOT NULL,
  `questionID` int NOT NULL,
  `text` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `isCorrect` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`answerID`, `questionID`, `text`, `isCorrect`) VALUES
(1, 1, '/quizK/images/Flag_of_Greece.svg.png', 1),
(2, 1, '/quizK/images/Flag_of_Brazil.svg.png', 0),
(3, 1, '/quizK/images/Flag_of_Italy.png', 0),
(4, 1, '/quizK/images/swedenFlag.jpg', 0),
(5, 2, '/quizK/images/francia-100x150.png', 1),
(6, 2, '/quizK/images/Flag_of_Spain.png', 0),
(7, 2, '/quizK/images/Flag_of_Mexico.png', 0),
(8, 2, '/quizK/images/United_Kingdom.png', 0),
(9, 3, '/quizK/images/unitedStates.jpg', 1),
(10, 3, '/quizK/images/Soviet_Union.webp', 0),
(11, 3, '/quizK/images/Flag_Republic_of_China.png', 0),
(12, 3, '/quizK/images/canadaFlag.png', 0),
(13, 4, '/quizK/images/swedenFlag.jpg', 1),
(14, 4, '/quizK/images/japanesFlag.jpg', 0),
(15, 4, '/quizK/images/Flag_of_Greece.svg.png', 0),
(16, 4, '/quizK/images/unitedStates.jpg', 0),
(21, 5, '/quizK/images/germany-flag-2-500x333.jpg', 1),
(22, 5, '/quizK/images/swedenFlag.jpg', 0),
(23, 5, '/quizK/images/Flag_of_Spain.png', 0),
(24, 5, '/quizK/images/Flag_of_Finland.png', 0),
(25, 6, '1904', 1),
(26, 6, '1920', 0),
(27, 6, '1932', 1),
(28, 6, '1936', 0);

-- --------------------------------------------------------

--
-- Table structure for table `introduction`
--

CREATE TABLE `introduction` (
  `quizID` int NOT NULL,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `imageURL` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nextAction` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nextQuestionID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `introduction`
--

INSERT INTO `introduction` (`quizID`, `title`, `description`, `imageURL`, `nextAction`, `nextQuestionID`) VALUES
(1, 'My First Quiz', 'Just do it ...', '/quizK/images/olympicWith.jpeg', 'quiz.php', 1);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `questionID` int NOT NULL,
  `quizID` int NOT NULL,
  `text` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nextAction` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nextQuestionID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`questionID`, `quizID`, `text`, `type`, `nextAction`, `nextQuestionID`) VALUES
(1, 1, 'In 1896?', 'olympic', 'quiz.php', 2),
(2, 1, 'In 1900?', 'olympic', 'quiz.php', 3),
(3, 1, 'In 1904?', 'olympic', 'quiz.php', 4),
(4, 1, 'In 1912?', 'olympic', 'quiz.php', 5),
(5, 1, 'In 1916?', 'olympic', 'quiz.php', 6),
(6, 1, '/quizK/images/unitedStates.jpg', 'olympic', 'result.php', 0);

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `quizID` int NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`quizID`, `description`, `author`, `modified`) VALUES
(1, 'Olympic', 'Ksenija', '2021-07-12');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `resultID` int NOT NULL,
  `quizID` int NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `feedback_40` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `feedback_50` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `feedback_60` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `imageURL` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`resultID`, `quizID`, `title`, `text`, `feedback_40`, `feedback_50`, `feedback_60`, `imageURL`) VALUES
(1, 1, 'Congratulations', 'That was a {$feedback} performance!', ' lousy', ' mediocre', ' super!!!', '/quizK/images/bild.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`answerID`),
  ADD KEY `answer_question` (`questionID`);

--
-- Indexes for table `introduction`
--
ALTER TABLE `introduction`
  ADD PRIMARY KEY (`quizID`),
  ADD KEY `nextQuestionID` (`nextQuestionID`),
  ADD KEY `quizID` (`quizID`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`questionID`),
  ADD KEY `nextQuestionID` (`nextQuestionID`),
  ADD KEY `quizID` (`quizID`),
  ADD KEY `nextQuestionID_2` (`nextQuestionID`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`quizID`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`resultID`),
  ADD KEY `quizID` (`quizID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `answerID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `introduction`
--
ALTER TABLE `introduction`
  MODIFY `quizID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `questionID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `quizID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `resultID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answer_question` FOREIGN KEY (`questionID`) REFERENCES `questions` (`questionID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `introduction`
--
ALTER TABLE `introduction`
  ADD CONSTRAINT `introduction_ibfk_1` FOREIGN KEY (`nextQuestionID`) REFERENCES `questions` (`questionID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`quizID`) REFERENCES `introduction` (`quizID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `result_ibfk_1` FOREIGN KEY (`resultID`) REFERENCES `questions` (`questionID`),
  ADD CONSTRAINT `result_ibfk_2` FOREIGN KEY (`quizID`) REFERENCES `questions` (`questionID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
