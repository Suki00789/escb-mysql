-- phpMyAdmin SQL Dump
-- version 4.4.15.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 19, 2016 at 03:30 PM
-- Server version: 5.6.28
-- PHP Version: 5.5.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE IF NOT EXISTS `author` (
  `id` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `biography` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`id`, `name`, `biography`) VALUES
(1, 'Humayun Ahmed', 'Humayun Ahmed (13 November 1948 – 19 July 2012) was a Bangladeshi writer, dramatist, screenwriter and filmmaker. Ahmed got his break-through by his debut novel Nondito Noroke in 1972. He wrote over 200 fiction and non-fiction books, all of which were bestsellers in Bangladesh. Ahmed''s writing style is characterized as magic realism. Ahmed''s books were the top sellers at the Ekushey Book Fair during the 1990s and 2000s. He won Bangla Academy Award and Ekushey Padak for his contribution to Bengali literature.'),
(2, 'Mohammed Zafar Iqbal\r\n', 'Muhammed Zafar Iqbal (born 23 December 1952) is a Bangladeshi author of science fiction and children''s literature. He is a professor of computer science and engineering and also head of the department of electrical and electronics engineering at Shahjalal University of Science and Technology.'),
(3, 'Rabindronath Tagore', '(7 May 1861 – 7 August 1941), was a Bengali polymath who reshaped Bengali literature and music, as well as Indian art with Contextual Modernism in the late 19th and early 20th centuries. Author of Gitanjali and its "profoundly sensitive, fresh and beautiful verse", he became the first non-European to win the Nobel Prize in Literature in 1913'),
(4, 'Kazi Nazrul Islam', 'Popularly known as Nazrul, he produced a large body of poetry and music that used themes of Islamic renaissance and marked the beginning of spiritual rebellion against fascism and oppression. Nazrul''s activism for political and social justice earned him the title of the "Rebel Poet".'),
(5, 'Anisul Haque', 'Anisul Hoque (born March 4, 1965) is a Bangladeshi screenwriter, novelist, dramatist and journalist.');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `id` mediumint(10) NOT NULL,
  `author_id` smallint(10) NOT NULL,
  `cat_id` smallint(10) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `introduction` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`) VALUES
(1, 'Novel', 'A novel is a long narrative, normally in prose, which describes fictional characters and events, usually in the form of a sequential story.'),
(2, 'Science fiction', 'Science fiction is a genre of speculative fiction dealing with imaginative concepts such as futuristic settings, futuristic science and technology, space travel, time travel, faster than light travel, parallel universes and extraterrestrial life. '),
(3, 'short story', 'A short story is a piece of prose fiction, which can be read in a single sitting. Emerging from earlier oral storytelling traditions in the 17th century, the short story has grown to encompass a body of work so diverse as to defy easy characterization.'),
(4, 'Poetry', 'Poetry is a form of literature that uses aesthetic and rhythmic[1][2][3] qualities of language—such as phonaesthetics, sound symbolism, and metre—to evoke meanings in addition to, or in place of, the prosaic ostensible meaning.'),
(5, 'War novel', 'A war novel (military fiction) is a novel in which the primary action takes place on a battlefield, or in a civilian setting (or home front), where the characters are either preoccupied with the preparations for, suffering the effects of, or recovering from war. Many war novels are historical novels.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` mediumint(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
