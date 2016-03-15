-- phpMyAdmin SQL Dump
-- version 4.4.15.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 15, 2016 at 03:05 PM
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
(1, 'হুমায়ূন আহমেদ', 'বিংশ শতাব্দীর বাঙালি জনপ্রিয় কথাসাহিত্যিকদের মধ্যে অন্যতম। তাঁকে বাংলাদেশের স্বাধীনতা পরবর্তী শ্রেষ্ঠ লেখক গণ্য করা হয়। তিনি একাধারে ঔপন্যাসিক, ছোটগল্পকার, নাট্যকার এবং গীতিকার। বলা হয় আধুনিক বাংলা কল্পবিজ্ঞান সাহিত্যের তিনি পথিকৃৎ। নাটক ও চলচ্চিত্র পর'),
(2, 'মুহম্মদ জাফর ইকবাল', 'মুহম্মদ জাফর ইকবাল (জন্মঃ ২৩ ডিসেম্বর ১৯৫২) হলেন একজন বাংলাদেশী লেখক, পদার্থবিদ ও শিক্ষাবিদ। তাকে বাংলাদেশে বৈজ্ঞানিক কল্পকাহিনী লেখা ও জনপ্রিয়করণের পথিকৃত হিসাবে গণ্য করা হয়। এছাড়াও তিনি একজন জনপ্রিয় শিশুসাহিত্যিক এবং কলাম-লেখক। তার লেখা বেশ কয়েকটি '),
(3, 'রবীন্দ্রনাথ ঠাকুর', 'রবীন্দ্রনাথ ঠাকুর (৭ই মে, ১৮৬১ - ৭ই আগস্ট, ১৯৪১)[১] (২৫ বৈশাখ, ১২৬৮ - ২২ শ্রাবণ, ১৩৪৮ বঙ্গাব্দ)[১] ছিলেন অগ্রণী বাঙালি কবি, ঔপন্যাসিক, সংগীতস্রষ্টা, নাট্যকার, চিত্রকর, ছোটগল্পকার, প্রাবন্ধিক, অভিনেতা, কণ্ঠশিল্পী ও দার্শনিক।[২] তাঁকে বাংলা ভাষার সর্বশ্রেষ্'),
(4, 'কাজী নজরুল ইসলাম', 'কাজী নজরুল ইসলাম (উচ্চারণ: [Kaʒi Naʒrul Islam], মে ২৫, ১৮৯৯–আগস্ট ২৯, ১৯৭৬) (জ্যৈষ্ঠ ১১, ১৩০৬–ভাদ্র ১২, ১৩৮৩ বঙ্গাব্দ) ছিলেন বিংশ শতাব্দীর অন্যতম জনপ্রিয় অগ্রণী বাঙালি কবি, উপন্যাসিক, নাট্যকার, সঙ্গীতজ্ঞ ও দার্শনিক যিনি বাংলা কাব্যে অগ্রগামী ভূমিকা রাখার'),
(5, 'আনিসুল হক', 'আনিসুল হক (জন্ম: মার্চ ৪, ১৯৬৫) একজন বাংলাদেশী কবি, লেখক, নাট্যকার ও সাংবাদিক। বর্তমানে তিনি বাংলাদেশের দৈনিক প্রথম আলোর সহযোগী সম্পাদক এবং কিশোর আলোর সম্পাদক পদে কর্মরত আছেন। মুক্তিযুদ্ধকালীন সময়ের সত্য ঘটনা নিয়ে তাঁর লেখা মা বইটি বেশ জনপ্রিয়।[১] বাংল');

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
(1, 'Novel', 'গদ্যে লেখা দীর্ঘাবয়ব বর্ণনাত্মক কথাসাহিত্য। কবিতা, নাটক ও ছোটগল্পের ন্যায় উপন্যাস সাহিত্যের একটি বিশেষ শাখা। আধুনিক সাহিত্যে এটি তুলনামূলকভাবে নতুন আঙ্গিক। যিনি উপন্যাস রচনা করেন তিনি ঔপন্যাসিক।'),
(2, 'Science fiction', 'বিজ্ঞান কল্পকাহিনী আধুনিক কল্পকাহিনীমূলক সাহিত্যের একটি বিশেষ ধারা, যাতে ভবিষ্যৎ বৈজ্ঞানিক বা প্রযুক্তিগত আবিষ্কার ও উদ্ভাবন এবং মানব সভ্যতাকে কেন্দ্র করে পটভূমি রচনা করা হয়। মানব সভ্যতা মধ্যযুগে থেকে আধুনিক যুগে প্রবেশের সময় যে বৈজ্ঞানিক বিপ্লবের সৃষ্টি হয় তার অনিবার্য ফসল ছিল বৈজ্ঞানিক কল্পকাহিনী। ইংরেজিতে একে “সাইন্স ফিকশন” বলা হয়। বাংলা ভাষায় প্রথম বৈজ্ঞানিক কল্পকাহিনী লেখা শুরু হয় উনবিংশ শতাব্দীতে।'),
(3, 'short story', 'কথাসাহিত্যের একটি বিশেষ রূপবন্ধ যা কাহিনীভিত্তিক এবং দৈর্ঘ্যে হ্রস্ব, তবে ছোটগল্পের আকার কী হবে সে সম্পর্কে কোন সর্বসম্মত সিদ্ধান্ত নেই। সব ছোটগল্পই গল্প বটে কিন্তু সব গল্পই ছোটগল্প নয়। একটি কাহিনী বা গল্পকে ছোটগল্পে উত্তীর্ণ হওয়ার জন্য কিছু নান্দনিক ও শিল্পশর্ত পূরণ করতে হয়। ছোটগল্পের সংজ্ঞার্থ কী সে নিয়ে সাহিত্যিক বিতর্ক ব্যাপক। এককথায় বলা যায়- যা আকারে ছোট, প্রকারে গল্প তাকে ছোটগল্প বলে। '),
(4, 'Poetry', 'শিল্পের একটি শাখা যেখানে ভাষার নান্দনিক গুণাবলীর ব্যবহারের পাশাপাশি ধারণাগত এবং শব্দার্থিক বিষয়বস্তু ব্যবহার করা হয়।'),
(5, 'War novel', 'বাংলা ভাষা ও বাংলা সাহিত্যের প্রকাশনায় একটি বড় প্রভাব বিস্তার করেছে।বাংলাদেশের স্বাধীনতা যুদ্ধ ও স্বাধীনতা-পূর্ব আন্দোলনসমূহ। বিভিন্ন গল্প-উপন্যাস, প্রতিবেদনে স্বাধীনতা-পূর্ব ও যুদ্ধকালীন বাংলাদেশ, যুদ্ধাবস্থায় শরণার্থী, যুদ্ধে বিদেশী ও প্রবাসী বাংলাদেশীদের সহায়তা, কর্মকাণ্ড প্রভৃতি বিধৃত হয়েছে। সে সংক্রান্ত প্রকাশিত বইগুলোর একটি তালিকা এখানে বিধৃত হলো।');

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
