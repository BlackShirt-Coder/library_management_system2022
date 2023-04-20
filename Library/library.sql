-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2023 at 08:32 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminId` int(11) NOT NULL,
  `FullName` varchar(30) COLLATE utf8_myanmar_ci DEFAULT NULL,
  `AdminEmail` varchar(40) COLLATE utf8_myanmar_ci DEFAULT NULL,
  `UserName` varchar(20) COLLATE utf8_myanmar_ci NOT NULL,
  `Password` varchar(40) COLLATE utf8_myanmar_ci NOT NULL,
  `code` varchar(10) COLLATE utf8_myanmar_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_myanmar_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `FullName`, `AdminEmail`, `UserName`, `Password`, `code`) VALUES
(1, 'admin', 'haruta685@gmail.com', 'admin', '202cb962ac59075b964b07152d234b70', '671725');

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `AuthorId` int(11) NOT NULL,
  `AuthorName` varchar(30) COLLATE utf8_myanmar_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_myanmar_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`AuthorId`, `AuthorName`) VALUES
(1, 'Juu'),
(3, 'Stuart Russell'),
(4, 'Abraham'),
(5, 'Ei Maung'),
(6, 'ဒေါက်တာအရှင်ဝိသာရဒ (ရမ္မာ၀တီ)'),
(7, 'ဒေါက်တာဦးသန်းထွန်း(ရွှေဘို)'),
(8, 'ဆရာတော်ဦးဇောတိက'),
(9, 'ဒေါက်တာဘဒ္ဒန္တနန္ဒမာလာဘိဝံသ'),
(10, 'ဒေါက်တာအောင်(ဆေး-၂)'),
(11, 'နန္ဒာစာရ'),
(12, 'ချစ်ဦးညို'),
(13, 'တက္ကသိုလ်ဘုန်းနိုင်'),
(14, 'ဒေါက်တာဖြိုးသီဟ'),
(15, 'ဒေါက်တာစိုးသန်း'),
(16, 'ဂျက်ဖရီဝင်း'),
(17, 'နိုင်းနိုင်းစနေ'),
(18, 'ဆရာစည်သူထက်'),
(19, 'Unknown Author'),
(20, 'မြသန်းတင့်'),
(21, 'ညီညီနိုင်'),
(22, 'test author'),
(23, 'H.H.TAN T.B.D\'ORAZIO'),
(24, 'SIMON HAYKIN'),
(25, 'Sinha'),
(26, 'William H.Hayt'),
(27, 'Floyd'),
(28, 'Hopkins & Cullen'),
(29, 'John P.Hayes'),
(30, 'Erwin Kreyszig'),
(31, 'Andrew S.Tanenbaum.Tadd Austia'),
(32, 'Jiawei Han'),
(33, 'Chuck Easttom'),
(34, 'Dare Chaffey'),
(35, 'Ramesh Gaonkar'),
(36, 'Robert Lafore'),
(37, 'Lee Copeland'),
(38, 'Christian Nagel'),
(39, 'Bill Evjen'),
(40, 'Rafel C.Gonzalez'),
(41, 'Elliotte Rusty Harold'),
(42, 'William Stallings'),
(43, 'MarkJ Burger'),
(44, 'Wilson'),
(45, 'Chuck Allison'),
(46, 'ရဲမင်းအောင်'),
(47, 'အိမောင်'),
(48, 'Aung Naing Moe'),
(49, 'Wai Phyoe Aung'),
(50, 'Shotts.JR'),
(51, 'Earle Castledine & Craig Shark'),
(52, 'Kelvin Yank'),
(53, 'Tapio Elomaa'),
(54, 'Japan Agency'),
(55, 'Bowerman O´Connell Murphrie Or'),
(56, 'Creators'),
(57, 'Pankaj Sharma'),
(58, 'Glenn Johnson'),
(59, 'Faithe Wempen'),
(60, 'ကျော်ဇေယျာလေး(ကသာ)'),
(61, 'Syed Ali Dilewa'),
(62, 'မောင်ထူးချွန်'),
(63, 'ဂျာနယ်ကျော်မမလေး'),
(64, 'ပုညခင်'),
(65, 'နတ်နွယ်'),
(66, 'ဆန်းလွင်'),
(67, 'ဒေါက်တာမင်းတင့်မွန်'),
(68, 'unknown'),
(69, 'မင်းခိုက်စိုးစန်'),
(70, 'ခင်စုစုစံ'),
(71, 'သိပ္ပံမောင်ဝ'),
(72, 'ချစ်ဦးညို'),
(73, 'ချစ်စံဝင်း'),
(74, 'ကိုစိုးထိုက်(ဖဒို)'),
(75, ' ဦးလှဝင်း'),
(76, 'မောင်ပေါ်ထွန်း'),
(77, 'ဇာနည်ဇေယျ'),
(78, 'အကြည်တော်'),
(79, ' နုနုရည်အင်းဝ'),
(80, ' ဗန်းမော်သိန်းဖေ'),
(81, 'ဝင်းနိုင်'),
(82, 'ဒေါက်တာကျော်စိန်'),
(83, 'မျိုးလွင်(MBA)'),
(84, 'ခင်မောင်သန်း(စိတ်ပညာ)'),
(85, '2'),
(86, 'ပိုးဇာ'),
(87, 'တွတ်ပီ'),
(88, 'မြင့်မိုရ်မေမေ'),
(89, 'သီဟတေဇ'),
(90, 'ယုဒါ'),
(91, 'Anonymous'),
(92, 'နှင်းဝေငြိမ်း'),
(93, 'မင်းလူ');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `BookId` int(11) NOT NULL,
  `BookName` varchar(30) COLLATE utf8_myanmar_ci NOT NULL,
  `CatId` int(11) NOT NULL,
  `AuthorId` int(11) NOT NULL,
  `ISBNNumber` varchar(20) COLLATE utf8_myanmar_ci DEFAULT NULL,
  `TotalBook` int(11) NOT NULL DEFAULT 1,
  `AvailableBook` int(11) UNSIGNED NOT NULL,
  `bookShelf` int(11) NOT NULL,
  `cover_img` varchar(30) COLLATE utf8_myanmar_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_myanmar_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`BookId`, `BookName`, `CatId`, `AuthorId`, `ISBNNumber`, `TotalBook`, `AvailableBook`, `bookShelf`, `cover_img`) VALUES
(1, 'Programming For Engineering ', 4, 23, '9584', 3, 2, 1, 'photo_2023-03-18_15-10-13.jpg'),
(2, 'Neural Networks', 4, 24, '5534', 3, 0, 4, 'photo_2023-03-18_15-10-27.jpg'),
(3, 'Computer Fundamentals', 4, 25, '7981', 3, 3, 1, 'photo_2023-03-18_15-10-21.jpg'),
(5, 'Digital Fundamentals', 4, 27, '8245', 3, 6, 4, 'photo_2023-03-18_15-09-57.jpg'),
(6, 'Grammer For IELTS with answers', 8, 28, '1125', 3, 3, 4, 'photo_2023-03-18_15-10-00.jpg'),
(7, 'Computer Architecture  And Org', 20, 29, '2164', 3, 3, 4, 'photo_2023-03-18_15-10-10.jpg'),
(10, 'Data Mining(Concepts and Techn', 4, 32, '2687', 3, 3, 4, 'photo_2023-03-18_15-10-19.jpg'),
(11, 'Computer Security  Fundamental', 20, 33, '7908', 3, 3, 4, 'photo_2023-03-18_15-10-26.jpg'),
(12, 'Digital Business ', 10, 34, '6848', 3, 3, 4, 'photo_2023-03-18_15-10-05.jpg'),
(13, 'Microprocessor Architecture', 4, 35, '3539', 3, 3, 4, 'photo_2023-03-18_15-10-23.jpg'),
(14, 'Turbo(Programming for the IBM)', 4, 36, '4257', 3, 3, 4, 'photo_2023-03-18_15-09-53.jpg'),
(15, 'A Practitioner\'s Guide to Soft', 4, 37, '5749', 3, 3, 4, 'photo_2023-03-18_15-10-03.jpg'),
(16, 'Professional C#2005', 4, 38, '8646', 3, 3, 1, 'photo_2023-03-18_15-09-54.jpg'),
(17, 'Professional  Web Developer', 20, 39, '6290', 3, 3, 4, 'photo_2023-03-18_15-10-48.jpg'),
(18, 'Digital Image Processing ', 20, 40, '1167', 3, 3, 4, 'photo_2023-03-18_15-10-32.jpg'),
(19, 'Processing XML with java', 4, 41, '3071', 3, 3, 2, 'photo_2023-03-18_15-10-30.jpg'),
(20, 'Data And Computer Communicatio', 4, 42, '9618', 3, 3, 4, 'photo_2023-03-18_15-10-43.jpg'),
(21, 'Digital Image Processing ', 4, 43, '3508', 3, 3, 3, 'photo_2023-03-18_15-10-32.jpg'),
(22, 'IT password examination prepar', 20, 44, '8801', 3, 3, 3, 'photo_2023-03-18_15-10-45.jpg'),
(23, 'Thinking in C++.', 4, 45, '8255', 3, 3, 3, 'photo_2023-03-18_15-10-37.jpg'),
(24, 'Hacker တို့၏ထိုးဖောက်နည်းများ', 20, 46, '1143', 2, 2, 2, 'hacker.jpg'),
(25, 'Professional Web Developer', 20, 47, '3761', 5, 5, 5, 'photo_2023-03-18_15-10-48.jpg'),
(26, 'Cisco Essential Networking Not', 20, 48, '9121', 4, 4, 4, 'photo_2023-03-18_15-10-34.jpg'),
(27, 'Excel For Accounting', 20, 49, '8584', 3, 3, 3, 'photo_2023-03-18_15-10-41.jpg'),
(28, 'The Linux Command Line', 20, 50, '3449', 3, 3, 3, 'photo_2023-03-18_15-10-35.jpg'),
(29, 'JQuery Novice to ninja new kid', 20, 51, '1245', 3, 3, 3, 'photo_2023-03-18_15-09-46.jpg'),
(30, 'PHP and Mysql novice to ninja ', 20, 52, '5173', 3, 3, 3, 'photo_2023-03-18_15-09-48.jpg'),
(31, 'Principles of data mining and ', 20, 53, '4591', 2, 2, 2, 'photo_2023-03-18_15-09-49.jpg'),
(32, 'New FE Exam Preparation Book', 21, 54, '6821', 3, 3, 3, 'photo_2023-03-18_15-09-52.jpg'),
(34, 'Adobe Photoshop CS5', 20, 56, '8720', 3, 3, 3, 'ps.jpg'),
(35, 'Information Security And Cyber', 20, 57, '9894', 4, 4, 4, 'info.jpg'),
(36, 'Programming in Html 5 with Jav', 4, 58, '5598', 3, 3, 3, 'html.jpg'),
(37, 'Step By Step Html 5', 4, 59, '3334', 3, 3, 3, 'photo_2023-03-18_15-10-40.jpg'),
(38, 'Developer Vibe Java  Vol-2', 20, 60, '2176', 3, 3, 3, 'jav.jpg'),
(39, 'Dictionary Of Project Manageme', 10, 61, '5401', 3, 3, 3, 'pj.jpg'),
(40, '21ရာစုကွန်ပျူတာအဘိဓာန်', 20, 62, '3817', 3, 3, 3, '1679199083.png'),
(41, 'ဂျာနယ်ကျော်မမလေး၏ဘဝပုံရိပ်များ', 9, 63, '8751', 4, 4, 4, '1679249354.png'),
(42, 'အဝေးချစ်', 1, 64, '7587', 3, 3, 3, '1679238654.png'),
(43, 'ဂျာနယ်ကျော်မမလေး ရင်မှာတစ်ရှိက', 1, 63, '8855', 3, 3, 3, '1679199472.png'),
(44, 'တစ်ဖန်ပြန်၍မနိုးသောဝေဒနာ', 11, 65, '8894', 4, 4, 4, '1679199361.png'),
(45, 'ဗုဒ္ဓဘာသာဝင်တွေ ယုံကြည်ကြတာက ', 23, 66, '7055', 5, 5, 5, '1679199327.png'),
(46, 'ဗုဒ္ဓအဘိဓမ္မာအနှစ်ချုပ် ', 23, 67, '7951', 4, 4, 4, '1679199083.png'),
(47, 'ပြည်ထောင်စုစိတ်ဓာတ်', 24, 68, '7811', 4, 4, 4, '1679199283.png'),
(48, 'ငှက်ကလေးရဲ့သက်တော်စောင့်  ', 14, 69, '8822', 4, 4, 4, '1679199123.png'),
(49, 'လင်ကွန်းသမ္မတ', 24, 70, '3685', 4, 4, 4, '1679199176.png'),
(50, 'နတ်ကျွန်း၊မြင်စိုင်း စစ်ကိုင်း', 9, 71, '2790', 4, 4, 4, '1679199060.png'),
(51, 'နှင်းကေသရာချစ်တဲ့သူရဲကောင်း ', 22, 72, '4156', 4, 4, 4, '1679198925.png'),
(52, 'စာကြည့်တိုက် ', 9, 73, '3905', 4, 4, 4, '1679198986.png'),
(53, 'မြေစာပင် ', 9, 74, '4227', 3, 3, 3, '1679198946.png'),
(54, 'ရွှေဘုံသာလမ်းပေါ်မှာ', 9, 75, '9478', 2, 2, 2, '1679199007.png'),
(55, 'စိတ်ပြောင်းစိတ်လွှဲ', 16, 76, '9589', 4, 4, 4, '1679198898.png'),
(56, 'အိမ်မက်မြိုကလူ ', 9, 77, '1123', 5, 5, 5, '1679198850.png'),
(57, 'ဘီလူး ', 9, 78, '1547', 3, 3, 3, '1679249626.png'),
(58, 'ချစ်တဲ့သူသခင်မြင်လာအုန်း', 1, 79, '9118', 2, 2, 2, '1679198837.png'),
(59, 'သူတိုဘာကြောင့်ကမ္ဘာကျော်တာလဲ', 14, 80, '9492', 4, 4, 4, '1679198805.png'),
(60, 'လူရွှင်တော်ရေးတဲ့စာ ', 9, 81, '7920', 5, 5, 5, '1679199208.png'),
(61, 'ကိုယ်ရည်ကိုယ်သွေး စိတ်ပညာ', 16, 82, '6650', 1, 1, 1, 'Sait-Pyin-Ngyar-300x300.png'),
(62, 'စိတ်ပညာနှင့်အရင်းရှင်ဝါဒ', 16, 83, '4026', 1, 1, 1, 'seit-pyi-nyar-300x300.png'),
(63, 'စီးပွားရေးစိတ်ပညာ', 16, 84, '7889', 1, 1, 1, 'see.png'),
(64, 'ထူးတဲ့ကိုယ်လုံးရှင်', 26, 86, '8012', 2, 2, 2, ''),
(65, 'ကျွန်ုပ်နှင့်မေ့မရသောဇာတ်လမ်းမ', 26, 87, '7635', 2, 2, 2, ''),
(66, 'သံယောဇင်စေတမန်', 26, 87, '2452', 2, 2, 2, ''),
(67, 'ကာတွန်းအဘိဓာန်', 8, 88, '4712', 2, 2, 2, ''),
(68, 'အိမ', 1, 89, '9056', 2, 2, 2, ''),
(69, 'သူ၏ချစ်သူ', 1, 90, '3962', 2, 2, 2, ''),
(70, 'ခေတ်သစ်အဘိဓာန်', 8, 91, '8175', 2, 2, 2, ''),
(71, 'အဘိဓာန်', 8, 91, '5278', 2, 2, 2, ''),
(72, 'မဂ်လာဆောင်ရအောင်အချစ်ရယ်', 1, 92, '3484', 2, 2, 2, ''),
(73, 'ရုပ်ပြအဘိဓာန်', 8, 91, '2822', 2, 2, 2, ''),
(74, 'အချစ်သက်သက်', 1, 93, '7118', 2, 2, 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `BorrowId` int(11) NOT NULL,
  `BookId` int(11) DEFAULT NULL,
  `rollNumber` varchar(30) COLLATE utf8_myanmar_ci DEFAULT NULL,
  `IssuesDate` timestamp NULL DEFAULT current_timestamp(),
  `ReturnDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `RetrunStatus` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_myanmar_ci;

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`BorrowId`, `BookId`, `rollNumber`, `IssuesDate`, `ReturnDate`, `RetrunStatus`) VALUES
(1, 1, 'UCSTGO-2204', '2023-03-20 16:10:07', '2023-03-20 16:10:59', 1),
(3, 2, 'UCSTGO-2962', '2023-03-20 16:17:21', NULL, 0),
(5, 1, 'UCSTGO-2204', '2023-03-21 06:32:42', '2023-03-21 07:22:44', 1),
(6, 1, 'UCSTGO-2962', '2023-03-21 06:33:21', NULL, 0),
(7, 1, 'UCSTGO-2962', '2023-03-21 06:34:07', '2023-03-21 06:54:30', 1);

--
-- Triggers `borrow`
--
DELIMITER $$
CREATE TRIGGER `minusBookTrigger` AFTER INSERT ON `borrow` FOR EACH ROW UPDATE books SET AvailableBook=AvailableBook-1 WHERE books.BookId=new.BookId
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `plusbookTrigger` AFTER UPDATE ON `borrow` FOR EACH ROW UPDATE books SET AvailableBook=AvailableBook+1
WHERE books.BookId=new.BookId
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CatId` int(11) NOT NULL,
  `CategoryName` varchar(20) NOT NULL,
  `Status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CatId`, `CategoryName`, `Status`) VALUES
(1, 'အချစ်ဝထ္ထု', 1),
(4, 'Reference Books', 1),
(8, 'English ', 1),
(9, 'ရသစာပေ', 1),
(10, 'Bussiness', 1),
(11, 'ဘာသာပြန်ဝတ္ထုများ', 1),
(12, 'အင်္ဂလိပ်ဘာသာ ', 1),
(14, 'အတွေးအမြင်', 1),
(16, 'စိတ်ပညာစာအုပ်များ', 1),
(20, 'ကွန်ပျူတာနည်းပညာ', 1),
(21, 'Japan Language', 1),
(23, 'တရားဓမ္မ', 1),
(24, 'Politics', 1),
(26, 'ကာတွန်းရုပ် ပြ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `request_book`
--

CREATE TABLE `request_book` (
  `request_id` int(11) NOT NULL,
  `rollNumber` varchar(255) COLLATE utf8_myanmar_ci NOT NULL,
  `phoneNumber` varchar(255) COLLATE utf8_myanmar_ci NOT NULL,
  `BookName` varchar(255) COLLATE utf8_myanmar_ci NOT NULL,
  `request_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_myanmar_ci;

--
-- Dumping data for table `request_book`
--

INSERT INTO `request_book` (`request_id`, `rollNumber`, `phoneNumber`, `BookName`, `request_date`) VALUES
(1, 'UCSTGO-2962', '09842022', 'Hello Kitty', '2023-03-21 05:15:38'),
(2, 'UCSTGO-3020', '098402242', 'Test', '2023-03-21 07:18:18');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `rollNumber` varchar(30) COLLATE utf8_myanmar_ci NOT NULL,
  `userName` varchar(255) COLLATE utf8_myanmar_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_myanmar_ci NOT NULL,
  `phoneNumber` varchar(120) COLLATE utf8_myanmar_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_myanmar_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_myanmar_ci DEFAULT NULL,
  `status` int(1) NOT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_myanmar_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`rollNumber`, `userName`, `email`, `phoneNumber`, `password`, `code`, `status`, `RegDate`) VALUES
('UCSTGO-2204', 'Pwint Phoo Wai', 'phuephue239@gmail.com', '292084120', '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-20 15:50:16'),
('UCSTGO-2924', 'Ko Aung Thu Ya Khant', 'aungthura@gmail.com', '092092901', '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-21 06:39:29'),
('UCSTGO-2934', 'Swe Swe Naing', 'sweswenaing2002@gmail.com', '09392032', '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-21 06:40:34'),
('UCSTGO-2962', 'Myo Sandar Aye', 'myosandaraye777@gmail.com', '09650131508', '202cb962ac59075b964b07152d234b70', '317887', 1, '2023-03-20 15:36:26'),
('UCSTGO-3020', 'Pyone Thazin', 'pyonepyonethazin@gmail.com', '099472232', '289dff07669d7a23de0ef88d2f7129e7', '653324', 1, '2023-03-21 06:42:15'),
('UCSTGO-3044', 'Yoon', 'yoon@gmail.com', '0525202042', '202cb962ac59075b964b07152d234b70', NULL, 1, '2023-03-21 07:16:14'),
('UCSTGO-3849', 'Naing Zin Win', 'naingzin001@gmail.com', '028409284', '289dff07669d7a23de0ef88d2f7129e7', NULL, 1, '2023-03-20 15:48:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`AuthorId`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`BookId`);

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`BorrowId`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CatId`);

--
-- Indexes for table `request_book`
--
ALTER TABLE `request_book`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`rollNumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `AuthorId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `BookId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `borrow`
--
ALTER TABLE `borrow`
  MODIFY `BorrowId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CatId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `request_book`
--
ALTER TABLE `request_book`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
