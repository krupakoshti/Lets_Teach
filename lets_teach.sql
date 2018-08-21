-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2018 at 09:38 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lets_teach`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `AdminId` int(11) NOT NULL,
  `AdminName` varchar(50) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `EmailId` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `AdminImage` varchar(100) NOT NULL DEFAULT 'default.jpg',
  `ContactNo` varchar(10) NOT NULL,
  `AdminStatus` tinyint(4) NOT NULL DEFAULT '1',
  `AdminLevel` tinyint(4) NOT NULL DEFAULT '1',
  `AddedByAdminId` int(11) DEFAULT NULL,
  `AdminAddedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`AdminId`, `AdminName`, `UserName`, `EmailId`, `Password`, `AdminImage`, `ContactNo`, `AdminStatus`, `AdminLevel`, `AddedByAdminId`, `AdminAddedDate`) VALUES
(1, 'Administrator', 'admin', 'admin@gmail.com', 'admin', 'default.jpg', '9876543210', 1, 0, 1, '2018-04-16 21:07:35'),
(2, 'Khushboo Tolat', 'khushboo', 'khushboo@gmail.com', 'tolat', '00000.jpg', '9876543210', 1, 0, 2, '2018-04-16 21:07:35'),
(3, 'Kalyani Samanthula', 'kallu', 'kalyani@gmail.com', 'kallu', 'images.jpg', '9753108642', 1, 0, 1, '2018-04-16 21:08:53'),
(4, 'Khyati Desai', 'khyati', 'khyati@yahoo.com', 'desai', 'download (2).jpg', '9873214560', 1, 1, 2, '2018-04-16 21:12:06'),
(5, 'Nancy Patel', 'nancy', 'nancy@hotmail.com', 'patel', 'default.jpg', '1234567890', 1, 1, 2, '2018-04-19 10:24:38'),
(6, 'Juveria Shelod', 'juveria', 'jshelod@gmail.com', 'shelod', 'images.jpg', '9876543210', 1, 1, 1, '2018-04-19 10:30:54'),
(7, 'Abcdef', 'abcdef', 'abcdef@yahoo.com', 'abcdef', 'graphics_ball_red_shape_103042_300x188.jpg', '9876543210', 1, 1, 2, '2018-04-24 08:31:49');

-- --------------------------------------------------------

--
-- Table structure for table `tblarticle`
--

CREATE TABLE `tblarticle` (
  `ArticleId` int(11) NOT NULL,
  `ArticleTitle` varchar(100) NOT NULL,
  `Description` varchar(1000) NOT NULL,
  `ArticleImage` varchar(100) NOT NULL,
  `TutorId` int(11) NOT NULL,
  `SubjectId` int(11) NOT NULL,
  `ArticleViews` int(11) NOT NULL,
  `ArticleStatus` tinyint(4) NOT NULL DEFAULT '1',
  `ArticleCreatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblarticle`
--

INSERT INTO `tblarticle` (`ArticleId`, `ArticleTitle`, `Description`, `ArticleImage`, `TutorId`, `SubjectId`, `ArticleViews`, `ArticleStatus`, `ArticleCreatedDate`) VALUES
(1, 'Cell Theory', 'Cell Theory is one of the basic principles of biology. Credit for the formulation of this theory is given to German scientists Theodor Schwann, Matthias Schleiden, and Rudolph Virchow. All living organisms are composed of cells. They may be unicellular or multicellular. The cell is the basic unit of life.', 'cell.jpg', 1, 8, 2, 1, '2018-04-24 13:32:10'),
(2, 'C Language', 'C is a general-purpose, imperative computer programming language, supporting structured programming, lexical variable scope and recursion, while a static type system prevents many unintended operations. By design, C provides constructs that map efficiently to typical machine instructions, and therefore it has found lasting use in applications that had formerly been coded in assembly language, including operating systems, as well as various application software for computers ranging from supercomputers to embedded systems.', 'download1.jpg', 1, 12, 1, 1, '2018-04-25 06:10:37'),
(5, 'Mutation', 'In biology, a mutation is the permanent alteration of the nucleotide sequence of the genome of an organism, virus, or extrachromosomal DNA or other genetic elements.\r\n\r\nMutations result from errors during DNA replication (especially during meiosis) or other types of damage to DNA (such as may be caused by exposure to radiation or carcinogens), which then may undergo error-prone repair (especially [microhomology-mediated end joining][1]), or cause an error during other forms of repair,[2][3] or else may cause an error during replication (translesion synthesis). Mutations may also result from insertion or deletion of segments of DNA due to mobile genetic elements. Mutations may or may not produce discernible changes in the observable characteristics (phenotype) of an organism. Mutations play a part in both normal and abnormal biological processes including: evolution, cancer, and the development of the immune system, including junctional diversity.', 'mutation.png', 2, 8, 4, 1, '2018-06-19 18:40:18'),
(6, 'Geography of India', 'India is the seventh largest country in the world in terms of area. It lies on the Indian Plate, which is the northern portion of the Indo-Australian Plate. The Indian subcontinent is surrounded by three different water bodies and is easily recognisable on the world map.', 'index11.jpg', 5, 13, 1, 1, '2018-06-22 19:02:58'),
(7, 'Accounting', 'Accounting is the systematic and comprehensive recording of financial transactions pertaining to a business, and it also refers to the process of summarizing, analyzing and reporting these transactions to oversight agencies and tax collection entities. Accounting is one of the key functions for almost any business; it may be handled by a bookkeeper and accountant at small firms or by sizable finance departments with dozens of employees at large companies.\r\n', 'index2.jpg', 5, 17, 4, 1, '2018-06-22 19:05:41'),
(8, 'Ancient India', 'Civilization in South Asia began along the Indus River. The land of South Asia is dominated by three main types of physical features. Mountains, rivers, and the massive triangular-shaped peninsula of India.', 'images1.jpg', 5, 13, 0, 1, '2018-06-22 19:15:51');

-- --------------------------------------------------------

--
-- Table structure for table `tblarticlecomment`
--

CREATE TABLE `tblarticlecomment` (
  `ArticleCommentId` int(11) NOT NULL,
  `ArticleComment` varchar(1000) NOT NULL,
  `ArticleId` int(11) NOT NULL,
  `StudentId` int(11) NOT NULL,
  `CommentStatus` tinyint(4) NOT NULL DEFAULT '1',
  `CommCreatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblarticlecomment`
--

INSERT INTO `tblarticlecomment` (`ArticleCommentId`, `ArticleComment`, `ArticleId`, `StudentId`, `CommentStatus`, `CommCreatedDate`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, 1, 1, '2018-04-25 11:24:04'),
(2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, 2, 1, '2018-04-30 11:24:12'),
(3, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 7, 2, 1, '2018-06-22 19:07:21');

-- --------------------------------------------------------

--
-- Table structure for table `tblarticlelike`
--

CREATE TABLE `tblarticlelike` (
  `ArticleLikeId` int(11) NOT NULL,
  `ArticleId` int(11) NOT NULL,
  `StudentId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblarticlelike`
--

INSERT INTO `tblarticlelike` (`ArticleLikeId`, `ArticleId`, `StudentId`) VALUES
(132, 5, 1),
(133, 2, 1),
(134, 1, 1),
(135, 5, 2),
(136, 1, 2),
(137, 5, 3),
(138, 7, 2),
(139, 6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `CategoryId` int(11) NOT NULL,
  `CategoryName` varchar(50) NOT NULL,
  `CategoryStatus` tinyint(4) NOT NULL DEFAULT '1',
  `CatAddByAdminId` int(11) DEFAULT NULL,
  `CatCreatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`CategoryId`, `CategoryName`, `CategoryStatus`, `CatAddByAdminId`, `CatCreatedDate`) VALUES
(1, 'Science', 1, 1, '2018-04-19 11:17:17'),
(2, 'Commerce', 1, 1, '2018-04-19 11:17:17'),
(3, 'Maths', 1, 2, '2018-04-19 12:50:36'),
(4, 'Extra', 1, 2, '2018-04-19 12:50:36'),
(5, 'Computer Science', 1, 2, '2018-04-19 12:53:55'),
(6, 'Arts', 1, 2, '2018-04-19 12:53:55'),
(7, 'IT', 1, 1, '2018-05-02 18:59:03'),
(12, 'Hobbies', 1, 2, '2018-05-11 19:38:37'),
(13, 'Social Studies', 1, 1, '2018-06-22 17:48:41');

-- --------------------------------------------------------

--
-- Table structure for table `tblcity`
--

CREATE TABLE `tblcity` (
  `CityId` int(11) NOT NULL,
  `CityName` varchar(50) NOT NULL,
  `StateId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcity`
--

INSERT INTO `tblcity` (`CityId`, `CityName`, `StateId`) VALUES
(1, 'Surat', 1),
(2, 'Valsad', 1),
(3, 'Navsari', 1),
(4, 'Vadodra', 1),
(5, 'Mumbai', 2),
(6, 'Pune', 2),
(7, 'Thane', 2),
(8, 'Jaipur', 3),
(9, 'Ajmer', 3),
(10, 'Bhopal', 4),
(11, 'Panji', 12);

-- --------------------------------------------------------

--
-- Table structure for table `tblcourse`
--

CREATE TABLE `tblcourse` (
  `CourseId` int(11) NOT NULL,
  `CourseTitle` varchar(50) NOT NULL,
  `Description` varchar(5000) NOT NULL,
  `Thumbnail` varchar(100) NOT NULL DEFAULT 'default.jpg',
  `CreatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `TutorId` int(11) NOT NULL,
  `SubjectId` int(11) NOT NULL,
  `CourseStatus` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcourse`
--

INSERT INTO `tblcourse` (`CourseId`, `CourseTitle`, `Description`, `Thumbnail`, `CreatedDate`, `TutorId`, `SubjectId`, `CourseStatus`) VALUES
(1, 'C Programming', 'C is a procedural programming language. It was initially developed by Dennis Ritchie between 1969 and 1973. It was mainly developed as a system programming language to write operating system. The main features of C language include low-level access to memory, simple set of keywords, and clean style, these features make C language suitable for system programming like operating system or compiler development.\r\nMany later languages have borrowed syntax/features directly or indirectly from C language. Like syntax of Java, PHP, JavaScript and many other languages is mainly based on C language. C++ is nearly a superset of C language (There are few programs that may compile in C, but not in C++).', 'download1.jpg', '2018-04-25 08:35:41', 1, 12, 1),
(2, 'Zoology', 'Zoology or animal biology is the branch of biology that studies the animal kingdom, including the structure, embryology, evolution, classification, habits, and distribution of all animals, both living and extinct, and how they interact with their ecosystems.', 'zoology.jpg', '2018-04-25 08:35:41', 1, 4, 1),
(15, 'Trigonometry', 'Trigonometry  is a branch of mathematics that studies relationships involving lengths and angles of triangles. The field emerged in the Hellenistic world during the 3rd century BC from applications of geometry to astronomical studies.\r\nTrigonometry is most simply associated with planar right-angle triangles (each of which is a two-dimensional triangle with one angle equal to 90 degrees). The applicability to non-right-angle triangles exists, but, since any non-right-angle triangle (on a flat pla', 'trigo.jpg', '2018-06-19 18:34:52', 2, 6, 1),
(23, 'Mutation', 'In biology, a mutation is the permanent alteration of the nucleotide sequence of the genome of an organism, virus, or extrachromosomal DNA or other genetic elements.\r\n\r\nMutations result from errors during DNA replication (especially during meiosis) or other types of damage to DNA (such as may be caused by exposure to radiation or carcinogens), which then may undergo error-prone repair , or cause an error during other forms of repair, or else may cause an error during replication (translesion syn', 'mutation.png', '2018-06-20 18:34:29', 1, 8, 1),
(24, 'History Of India', 'The Bronze Age in the Indian subcontinent began around 3300 BCE with the early Indus Valley Civilisation. ... Historically part of Ancient India, it is one of the world\'s earliest urban civilisations, along with Mesopotamia and Ancient Egypt.', 'index.jpg', '2018-06-22 18:41:42', 1, 16, 1),
(25, 'Geography of India', 'India is the seventh largest country in the world in terms of area. It lies on the Indian Plate, which is the northern portion of the Indo-Australian Plate. The Indian subcontinent is surrounded by three different water bodies and is easily recognisable on the world map.', 'index1.jpg', '2018-06-22 18:51:49', 5, 13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblcourseenrollment`
--

CREATE TABLE `tblcourseenrollment` (
  `CourseEnrollmentId` int(11) NOT NULL,
  `CourseId` int(11) NOT NULL,
  `StudentId` int(11) NOT NULL,
  `EnrollCreatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcourseenrollment`
--

INSERT INTO `tblcourseenrollment` (`CourseEnrollmentId`, `CourseId`, `StudentId`, `EnrollCreatedDate`) VALUES
(2, 1, 2, '2018-04-30 09:07:37'),
(3, 2, 1, '2018-04-30 09:07:51'),
(5, 1, 1, '2018-06-20 10:49:49'),
(6, 23, 1, '2018-06-20 19:21:04'),
(7, 23, 5, '2018-06-22 18:15:43'),
(8, 1, 5, '2018-06-22 18:26:24');

-- --------------------------------------------------------

--
-- Table structure for table `tblcoursequestion`
--

CREATE TABLE `tblcoursequestion` (
  `CourseQuesId` int(11) NOT NULL,
  `CourseId` int(11) NOT NULL,
  `StudentId` int(11) NOT NULL,
  `Question` varchar(1000) NOT NULL,
  `Answer` varchar(5000) DEFAULT NULL,
  `QuesStatus` tinyint(4) NOT NULL DEFAULT '1',
  `QuesCreatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcoursequestion`
--

INSERT INTO `tblcoursequestion` (`CourseQuesId`, `CourseId`, `StudentId`, `Question`, `Answer`, `QuesStatus`, `QuesCreatedDate`) VALUES
(1, 1, 1, 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, '2018-05-01 07:17:01'),
(4, 1, 5, 'What is the difference between declaration and definition of a variable/function', 'Declaration of a variable/function simply declares that the variable/function exists somewhere in the program but the memory is not allocated for them. But the declaration of a variable/function serves an important role. And that is the type of the variable/function. Therefore, when a variable is declared, the program knows the data type of that variable. In case of function declaration, the program knows what are the arguments to that functions, their data types, the order of arguments and the return type of the function. So that’s all about declaration. Coming to the definition, when we define a variable/function, apart from the role of declaration, it also allocates memory for that variable/function. Therefore, we can think of definition as a super set of declaration.', 1, '2018-06-22 18:28:15'),
(5, 1, 2, 'What is NULL pointer', NULL, 1, '2018-06-22 18:35:45');

-- --------------------------------------------------------

--
-- Table structure for table `tblcoursereview`
--

CREATE TABLE `tblcoursereview` (
  `CourseReviewId` int(11) NOT NULL,
  `Review` varchar(1000) DEFAULT NULL,
  `Rating` int(11) NOT NULL,
  `CourseId` int(11) NOT NULL,
  `StudentId` int(11) NOT NULL,
  `ReviewStatus` tinyint(4) NOT NULL DEFAULT '1',
  `ReviewCreatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcoursereview`
--

INSERT INTO `tblcoursereview` (`CourseReviewId`, `Review`, `Rating`, `CourseId`, `StudentId`, `ReviewStatus`, `ReviewCreatedDate`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 4, 1, 1, 1, '2018-06-20 20:10:11'),
(2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 3, 1, 2, 1, '2018-04-30 06:35:43'),
(3, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 4, 2, 1, 1, '2018-06-20 06:51:19'),
(4, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 3, 2, 2, 1, '2018-05-01 18:18:00'),
(5, '', 4, 15, 1, 1, '2018-06-20 22:03:09'),
(6, 'abcdefg hijklmnop qrstu vwxyz', 3, 1, 5, 1, '2018-06-22 18:27:07'),
(7, 'Very Good', 5, 23, 2, 1, '2018-06-22 18:38:04');

-- --------------------------------------------------------

--
-- Table structure for table `tblcoursevideos`
--

CREATE TABLE `tblcoursevideos` (
  `CourseVideoId` int(11) NOT NULL,
  `VideoName` varchar(50) NOT NULL,
  `VideoURL` varchar(100) NOT NULL,
  `CourseId` int(11) NOT NULL,
  `VideoStatus` tinyint(4) NOT NULL DEFAULT '1',
  `VideoDescription` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcoursevideos`
--

INSERT INTO `tblcoursevideos` (`CourseVideoId`, `VideoName`, `VideoURL`, `CourseId`, `VideoStatus`, `VideoDescription`) VALUES
(1, 'Zoology Introduction', 'ZOOLOGY.mp4', 2, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n                  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n                  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n                  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n                  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(2, 'C Programming Tutorial', 'C Language Tutorial for Beginners.mp4', 1, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(7, 'C Programming Introduction', 'C Programming Tutorial Introduction.mp4', 1, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo onsequat. Duis aute irure dolor in reprehenderit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(8, 'History of India (Hindi)', 'History_of_India_(Hindi).mp4', 24, 1, 'The Indian subcontinent was home to the urban Indus Valley Civilisation of the 3rd millennium BCE. In the following millennium, the oldest scriptures associated with Hinduism began to be composed. Social stratification, based on caste, emerged in the first millennium BCE, and Buddhism and Jainism arose. Early political consolidations took place under the Maurya and Gupta empires; the later peninsular Middle Kingdoms influenced cultures as far as southeast Asia. In the medieval era, Judaism, Zoroastrianism, Christianity, and Islam arrived, and Sikhism emerged, all adding to the region\'s diverse culture. Much of the north fell to the Delhi sultanate; the south was united under the Vijayanagara Empire. The economy expanded in the 17th century in the Mughal Empire. In the mid-18th century, the subcontinent came under British East India Company rule, and in the mid-19th under British crown rule. A nationalist movement emerged in the late 19th century, which later, under Mahatma Gandhi, was '),
(9, 'The Geography of India', 'The_Geography_of_India.mp4', 25, 1, 'India is the seventh largest country in the world in terms of area. It lies on the Indian Plate, which is the northern portion of the Indo-Australian Plate. The Indian subcontinent is surrounded by three different water bodies and is easily recognisable on the world map.');

-- --------------------------------------------------------

--
-- Table structure for table `tblformans`
--

CREATE TABLE `tblformans` (
  `AnsId` int(11) NOT NULL,
  `QuesId` int(11) NOT NULL,
  `Answer` varchar(5000) NOT NULL,
  `TutorId` int(11) NOT NULL,
  `AnsStatus` tinyint(4) NOT NULL DEFAULT '1',
  `AnsCreatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblformans`
--

INSERT INTO `tblformans` (`AnsId`, `QuesId`, `Answer`, `TutorId`, `AnsStatus`, `AnsCreatedDate`) VALUES
(1, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, 1, '2018-05-01 09:38:04'),
(2, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 2, 1, '2018-05-01 09:38:04'),
(3, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, 1, '2018-05-21 10:39:24'),
(4, 3, 'The physical features of India can be grouped under the following physiographic divisions:\r\n\r\nThe Northern Mountains.\r\nThe Northern (Indo Gangetic) Plains.\r\nThe Peninsular Plateau.\r\nThe Indian (Thar) Desert.\r\nThe Coastal Plains.\r\nThe Islands.', 5, 1, '2018-06-22 19:19:51'),
(5, 2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 5, 1, '2018-06-22 19:20:53'),
(7, 5, 'Declaration of a variable/function simply declares that the variable/function exists somewhere in the program but the memory is not allocated for them. But the declaration of a variable/function serves an important role. And that is the type of the variable/function. Therefore, when a variable is declared, the program knows the data type of that variable. In case of function declaration, the program knows what are the arguments to that functions, their data types, the order of arguments and the return type of the function. So that’s all about declaration. Coming to the definition, when we define a variable/function, apart from the role of declaration, it also allocates memory for that variable/function. Therefore, we can think of definition as a super set of declaration. (or declaration as a subset of definition). From this explanation, it should be obvious that a variable/function can be declared any number of times but it can be defined only once. (Remember the basic principle that you can’t have two locations of the same variable/function).', 1, 1, '2018-06-22 19:29:22');

-- --------------------------------------------------------

--
-- Table structure for table `tblformques`
--

CREATE TABLE `tblformques` (
  `QuesId` int(11) NOT NULL,
  `Question` varchar(1000) NOT NULL,
  `StudentId` int(11) NOT NULL,
  `SubjectId` int(11) NOT NULL,
  `QuesStatus` tinyint(4) NOT NULL DEFAULT '1',
  `QuesCreatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblformques`
--

INSERT INTO `tblformques` (`QuesId`, `Question`, `StudentId`, `SubjectId`, `QuesStatus`, `QuesCreatedDate`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, 1, 1, '2018-05-01 08:10:42'),
(2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 2, 8, 1, '2018-05-01 08:10:42'),
(3, 'What are the physical features of India', 2, 13, 1, '2018-06-22 19:18:31'),
(4, 'Can any genetic information be gained from mutations', 2, 8, 1, '2018-06-22 19:24:12'),
(5, 'What is the difference between declaration and definition of a variable/function', 3, 12, 1, '2018-06-22 19:25:56');

-- --------------------------------------------------------

--
-- Table structure for table `tblmessage`
--

CREATE TABLE `tblmessage` (
  `MessageId` int(11) NOT NULL,
  `Message` varchar(500) NOT NULL,
  `SenderId` int(11) NOT NULL,
  `ReceiverId` int(11) NOT NULL,
  `SenderType` tinyint(4) NOT NULL,
  `ReceiverType` tinyint(4) NOT NULL,
  `MsgStatus` tinyint(4) NOT NULL DEFAULT '0',
  `MsgCreatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblnotification`
--

CREATE TABLE `tblnotification` (
  `NotificationId` int(11) NOT NULL,
  `Notification` varchar(500) NOT NULL,
  `TutorId` int(11) NOT NULL,
  `StudentId` int(11) NOT NULL,
  `UserType` tinyint(4) NOT NULL,
  `NotifStatus` tinyint(4) NOT NULL DEFAULT '0',
  `NotifCreatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblnotification`
--

INSERT INTO `tblnotification` (`NotificationId`, `Notification`, `TutorId`, `StudentId`, `UserType`, `NotifStatus`, `NotifCreatedDate`) VALUES
(17, 'give review on your course <a href=http://localhost/lets_teach/index.php/Course/get_course/2>Zoology</a>', 1, 1, 0, 1, '2018-06-19 18:51:19'),
(19, 'subscribed to your course <a href=http://localhost/lets_teach/index.php/Course/get_course/1>C Programming</a>', 1, 1, 0, 1, '2018-06-20 10:49:49'),
(20, 'has liked on your article <a href=http://localhost/lets_teach/index.php/Article/get_article/2>C Language</a>', 1, 1, 0, 1, '2018-06-20 18:58:42'),
(21, 'has liked on your article <a href=http://localhost/lets_teach/index.php/Article/get_article/2>C Language</a>', 1, 1, 0, 1, '2018-06-20 18:58:45'),
(22, 'has liked on your article <a href=http://localhost/lets_teach/index.php/Article/get_article/2>C Language</a>', 1, 1, 0, 1, '2018-06-20 19:01:07'),
(23, 'has liked on your article <a href=http://localhost/lets_teach/index.php/Article/get_article/2>C Language</a>', 1, 1, 0, 1, '2018-06-20 19:01:10'),
(24, 'has liked on your article <a href=http://localhost/lets_teach/index.php/Article/get_article/5>Mutation</a>', 2, 1, 0, 0, '2018-06-20 19:01:44'),
(25, 'has liked on your article <a href=http://localhost/lets_teach/index.php/Article/get_article/1>Cell Theory</a>', 1, 1, 0, 1, '2018-06-20 19:01:59'),
(26, 'subscribed to your course <a href=http://localhost/lets_teach/index.php/Course/get_course/23>Mutation</a>', 1, 1, 0, 1, '2018-06-20 19:21:05'),
(27, 'has liked on your article <a href=http://localhost/lets_teach/index.php/Article/get_article/5>Mutation</a>', 2, 1, 0, 0, '2018-06-20 19:26:51'),
(28, 'has liked on your article <a href=http://localhost/lets_teach/index.php/Article/get_article/2>C Language</a>', 1, 1, 0, 1, '2018-06-20 19:27:05'),
(29, 'has liked on your article <a href=http://localhost/lets_teach/index.php/Article/get_article/1>Cell Theory</a>', 1, 1, 0, 1, '2018-06-20 19:27:19'),
(30, 'has liked on your article <a href=http://localhost/lets_teach/index.php/Article/get_article/5>Mutation</a>', 2, 2, 0, 0, '2018-06-20 19:34:44'),
(31, 'has liked on your article <a href=http://localhost/lets_teach/index.php/Article/get_article/1>Cell Theory</a>', 1, 2, 0, 1, '2018-06-20 19:34:59'),
(32, 'has liked on your article <a href=http://localhost/lets_teach/index.php/Article/get_article/5>Mutation</a>', 2, 3, 0, 0, '2018-06-20 19:35:21'),
(33, 'give review on your course <a href=http://localhost/lets_teach/index.php/Course/get_course/1>C Programming</a>', 1, 1, 0, 1, '2018-06-21 07:54:47'),
(34, 'give review on your course <a href=http://localhost/lets_teach/index.php/Course/get_course/1>C Programming</a>', 1, 1, 0, 1, '2018-06-21 08:09:14'),
(35, 'give review on your course <a href=http://localhost/lets_teach/index.php/Course/get_course/1>C Programming</a>', 1, 1, 0, 1, '2018-06-21 08:10:11'),
(36, 'give review on your course <a href=http://localhost/lets_teach/index.php/Course/get_course/15>Trigonometry</a>', 2, 1, 0, 0, '2018-06-21 10:02:47'),
(37, 'give review on your course <a href=http://localhost/lets_teach/index.php/Course/get_course/15>Trigonometry</a>', 2, 1, 0, 0, '2018-06-21 10:03:09'),
(38, 'subscribed to your course <a href=http://localhost/lets_teach/index.php/Course/get_course/23>Mutation</a>', 1, 5, 0, 1, '2018-06-22 18:15:43'),
(39, 'started following you.', 1, 5, 0, 1, '2018-06-22 18:25:03'),
(40, 'subscribed to your course <a href=http://localhost/lets_teach/index.php/Course/get_course/1>C Programming</a>', 1, 5, 0, 1, '2018-06-22 18:26:24'),
(41, 'give review on your course <a href=http://localhost/lets_teach/index.php/Course/get_course/1>C Programming</a>', 1, 5, 0, 1, '2018-06-22 18:27:07'),
(42, 'asked question on your course <a href=http://localhost/lets_teach/index.php/Course/get_course/1>C Programming</a>', 1, 5, 0, 1, '2018-06-22 18:28:15'),
(43, 'asked question on your course <a href=http://localhost/lets_teach/index.php/Course/get_course/1>C Programming</a>', 1, 2, 0, 1, '2018-06-22 18:35:45'),
(44, 'give review on your course <a href=http://localhost/lets_teach/index.php/Course/get_course/23>Mutation</a>', 1, 2, 0, 1, '2018-06-22 18:38:04'),
(45, 'has liked on your article <a href=http://localhost/lets_teach/index.php/Article/get_article/7>Accounting</a>', 5, 2, 0, 0, '2018-06-22 19:06:36'),
(46, 'has commented on your article <a href=http://localhost/lets_teach/index.php/Article/get_article/7>Accounting</a>', 5, 2, 0, 0, '2018-06-22 19:07:21'),
(47, 'has liked on your article <a href=http://localhost/lets_teach/index.php/Article/get_article/6>Geography of India</a>', 5, 2, 0, 0, '2018-06-22 19:08:25');

-- --------------------------------------------------------

--
-- Table structure for table `tblreportarticle`
--

CREATE TABLE `tblreportarticle` (
  `ReportArticleId` int(11) NOT NULL,
  `StudentId` int(11) NOT NULL,
  `TutorId` int(11) NOT NULL,
  `Reason` varchar(500) NOT NULL,
  `ReportArticleStatus` tinyint(4) NOT NULL DEFAULT '0',
  `AdminId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblreporttutor`
--

CREATE TABLE `tblreporttutor` (
  `ReportTutorId` int(11) NOT NULL,
  `StudentId` int(11) NOT NULL,
  `TutorId` int(11) NOT NULL,
  `Reason` varchar(500) NOT NULL,
  `ReportTutorStatus` tinyint(4) NOT NULL DEFAULT '0',
  `AdminId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblreportvideo`
--

CREATE TABLE `tblreportvideo` (
  `ReportVideoId` int(11) NOT NULL,
  `StudentId` int(11) NOT NULL,
  `TutorId` int(11) NOT NULL,
  `Reason` varchar(500) NOT NULL,
  `ReportVideoStatus` tinyint(4) NOT NULL DEFAULT '0',
  `AdminId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblstate`
--

CREATE TABLE `tblstate` (
  `StateId` int(11) NOT NULL,
  `StateName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstate`
--

INSERT INTO `tblstate` (`StateId`, `StateName`) VALUES
(7, 'Andhra Pradesh'),
(8, 'Arunachal Pradesh'),
(9, 'Assam'),
(10, 'Bihar'),
(11, 'Chhattisgarh'),
(12, 'Goa'),
(1, 'Gujarat'),
(13, 'Haryana'),
(14, 'Himachal Pradesh'),
(15, 'Jammu & Kashmir'),
(16, 'Jharkhand'),
(6, 'Karnataka'),
(17, 'Kerala'),
(4, 'Madhya Pradesh'),
(2, 'Maharastra'),
(18, 'Manipur'),
(19, 'Meghalaya'),
(20, 'Mizoram'),
(21, 'Nagaland'),
(22, 'Odisha'),
(5, 'Punjab'),
(3, 'Rajasthan'),
(23, 'Sikkim'),
(24, 'Tamil Nadu'),
(25, 'Telengana'),
(26, 'Tripura'),
(28, 'Uttar Pradesh'),
(27, 'Uttarakhand'),
(29, 'West Bengal');

-- --------------------------------------------------------

--
-- Table structure for table `tblstudent`
--

CREATE TABLE `tblstudent` (
  `StudentId` int(11) NOT NULL,
  `StudentName` varchar(50) NOT NULL,
  `EmailId` varchar(50) NOT NULL,
  `StudentImage` varchar(100) NOT NULL DEFAULT 'default.jpg',
  `ContactNo` varchar(10) NOT NULL,
  `UserId` int(11) NOT NULL,
  `CityId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstudent`
--

INSERT INTO `tblstudent` (`StudentId`, `StudentName`, `EmailId`, `StudentImage`, `ContactNo`, `UserId`, `CityId`) VALUES
(1, 'Kalyani Samanthula', 'kallu@gmail.com', 'IMG_20180422_190354.jpg', '1234567890', 2, 1),
(2, 'Hitanshi Metha', 'hitu@yahoo.in', 'Minions-Wallpaper-for-Laptop-1920x1200.jpg', '9876543210', 3, 3),
(3, 'Kartik Aaryan', 'kartik@yahoo.in', 'qwerty.jpg', '0987654321', 6, 5),
(4, 'Krupa Koshti', 'krups@gmail.com', 'default.jpg', '0987654321', 9, 6),
(5, 'Juveria Shelod', 'juju@yahoo.com', 'download_(1).jpg', '0987654312', 10, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tblsubcategory`
--

CREATE TABLE `tblsubcategory` (
  `SubCategoryId` int(11) NOT NULL,
  `SubCategoryName` varchar(50) NOT NULL,
  `CategoryId` int(11) NOT NULL,
  `SubCategoryStatus` tinyint(4) NOT NULL DEFAULT '1',
  `SubCatAddByAdminId` int(11) DEFAULT NULL,
  `SubCatCreatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubcategory`
--

INSERT INTO `tblsubcategory` (`SubCategoryId`, `SubCategoryName`, `CategoryId`, `SubCategoryStatus`, `SubCatAddByAdminId`, `SubCatCreatedDate`) VALUES
(1, 'Physics', 1, 1, 1, '2018-04-19 12:58:16'),
(2, 'Chemistry', 1, 1, 1, '2018-04-19 12:58:16'),
(3, 'Biology', 1, 1, 1, '2018-04-19 12:58:49'),
(4, 'Maths', 1, 1, 1, '2018-04-19 12:58:49'),
(5, 'Economics', 2, 1, 1, '2018-04-19 13:00:08'),
(6, 'Accountancy', 2, 1, 1, '2018-04-19 13:00:08'),
(7, 'Web Designing', 5, 1, 2, '2018-04-19 13:01:19'),
(8, 'Graphics', 5, 1, 2, '2018-04-19 13:01:19'),
(9, 'Programming', 5, 1, 2, '2018-04-19 19:26:50'),
(10, 'Origin Of Commerce', 2, 1, 2, '2018-04-19 19:29:36'),
(11, 'Statistics', 2, 1, 2, '2018-04-19 19:35:56'),
(12, 'History', 13, 1, 1, '2018-06-22 17:50:14'),
(13, 'Civics', 13, 1, 1, '2018-06-22 17:50:24'),
(14, 'Geography', 13, 1, 1, '2018-06-22 17:50:33');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubject`
--

CREATE TABLE `tblsubject` (
  `SubjectId` int(11) NOT NULL,
  `SubjectName` varchar(50) NOT NULL,
  `SubCategoryId` int(11) NOT NULL,
  `SubjectStatus` tinyint(4) NOT NULL DEFAULT '1',
  `SubAddByAdminId` int(11) DEFAULT NULL,
  `SubCreatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubject`
--

INSERT INTO `tblsubject` (`SubjectId`, `SubjectName`, `SubCategoryId`, `SubjectStatus`, `SubAddByAdminId`, `SubCreatedDate`) VALUES
(1, 'Mechanics', 1, 1, 1, '2018-04-30 14:40:55'),
(2, 'Quantum Physics ', 1, 1, 1, '2018-04-30 14:40:55'),
(3, 'Botany', 3, 1, 2, '2018-04-30 14:42:57'),
(4, 'Zoology', 3, 1, 2, '2018-04-30 14:42:57'),
(5, 'Evolution', 3, 1, 2, '2018-04-30 14:44:00'),
(6, 'Algebra', 4, 1, 1, '2018-04-30 14:57:37'),
(7, 'Geometry', 4, 1, 1, '2018-04-30 14:58:52'),
(8, 'Cell', 3, 1, 1, '2018-04-30 15:00:18'),
(12, 'C Programming', 9, 1, 1, '2018-05-02 10:53:18'),
(13, 'India', 14, 1, 1, '2018-06-22 17:55:56'),
(14, 'Continents', 14, 1, 1, '2018-06-22 17:56:41'),
(15, 'Asia', 14, 1, 1, '2018-06-22 17:56:50'),
(16, 'History Of India', 12, 1, 1, '2018-06-22 18:52:48'),
(17, 'Accounting', 6, 1, 1, '2018-06-22 19:05:19');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubscribe`
--

CREATE TABLE `tblsubscribe` (
  `SubscribeId` int(11) NOT NULL,
  `TutorId` int(11) NOT NULL,
  `StudentId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubscribe`
--

INSERT INTO `tblsubscribe` (`SubscribeId`, `TutorId`, `StudentId`) VALUES
(1, 1, 1),
(2, 1, 2),
(4, 2, 1),
(6, 5, 5),
(8, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbltutor`
--

CREATE TABLE `tbltutor` (
  `TutorId` int(11) NOT NULL,
  `TutorName` varchar(50) NOT NULL,
  `EmailId` varchar(50) NOT NULL,
  `TutorImage` varchar(100) NOT NULL DEFAULT 'default.jpg',
  `ContactNo` varchar(10) NOT NULL,
  `WebsiteLink` varchar(500) DEFAULT NULL,
  `FacebookLink` varchar(500) DEFAULT NULL,
  `TwitterLink` varchar(500) DEFAULT NULL,
  `GoogleplusLink` varchar(500) DEFAULT NULL,
  `LinkedinLink` varchar(500) DEFAULT NULL,
  `UserId` int(11) NOT NULL,
  `CityId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbltutor`
--

INSERT INTO `tbltutor` (`TutorId`, `TutorName`, `EmailId`, `TutorImage`, `ContactNo`, `WebsiteLink`, `FacebookLink`, `TwitterLink`, `GoogleplusLink`, `LinkedinLink`, `UserId`, `CityId`) VALUES
(1, 'Khushboo Tolat', 'khushbootolat6@gmail.com', 'images.png', '9876543210', 'www.google.com', 'www.facebook.com/khushboo.tolat.1', 'www.twitter.com/tolat_khushboo', 'plus.google.com/u/0/110564865211648781614', 'www.linkedin.com/in/khushboo-tolat-a89353132/', 1, 1),
(2, 'Khyati Desai', 'khyats@gmail.com', 'download (2).jpg', '1234567890', 'www.google.com', '', '', '', '', 4, 4),
(4, 'Chandler Bing', 'chandler@gmail.com', 'default.jpg', '0987654321', NULL, '', '', '', '', 7, 1),
(5, 'Nancy Patel', 'nano@gmail.com', 'default.jpg', '7418529630', '', NULL, NULL, NULL, NULL, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `UserId` int(11) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `UserType` tinyint(4) NOT NULL,
  `UserStatus` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`UserId`, `UserName`, `Password`, `UserType`, `UserStatus`) VALUES
(1, 'khushboo', 'toli', 0, 1),
(2, 'kalyani', 'kallu', 1, 1),
(3, 'hitanshi', 'metha', 1, 1),
(4, 'khyati', 'desai', 0, 1),
(6, 'kartik', 'aaryan', 1, 1),
(7, 'chanchan', 'monica', 0, 1),
(8, 'nancy', 'patel', 0, 1),
(9, 'krupa', 'zahur', 1, 1),
(10, 'Juveria', 'jujugandi', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`AdminId`),
  ADD UNIQUE KEY `UserName` (`UserName`),
  ADD UNIQUE KEY `EmailId` (`EmailId`);

--
-- Indexes for table `tblarticle`
--
ALTER TABLE `tblarticle`
  ADD PRIMARY KEY (`ArticleId`);

--
-- Indexes for table `tblarticlecomment`
--
ALTER TABLE `tblarticlecomment`
  ADD PRIMARY KEY (`ArticleCommentId`);

--
-- Indexes for table `tblarticlelike`
--
ALTER TABLE `tblarticlelike`
  ADD PRIMARY KEY (`ArticleLikeId`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`CategoryId`);

--
-- Indexes for table `tblcity`
--
ALTER TABLE `tblcity`
  ADD PRIMARY KEY (`CityId`),
  ADD UNIQUE KEY `CityName` (`CityName`);

--
-- Indexes for table `tblcourse`
--
ALTER TABLE `tblcourse`
  ADD PRIMARY KEY (`CourseId`);

--
-- Indexes for table `tblcourseenrollment`
--
ALTER TABLE `tblcourseenrollment`
  ADD PRIMARY KEY (`CourseEnrollmentId`);

--
-- Indexes for table `tblcoursequestion`
--
ALTER TABLE `tblcoursequestion`
  ADD PRIMARY KEY (`CourseQuesId`);

--
-- Indexes for table `tblcoursereview`
--
ALTER TABLE `tblcoursereview`
  ADD PRIMARY KEY (`CourseReviewId`);

--
-- Indexes for table `tblcoursevideos`
--
ALTER TABLE `tblcoursevideos`
  ADD PRIMARY KEY (`CourseVideoId`),
  ADD UNIQUE KEY `VideoURL` (`VideoURL`);

--
-- Indexes for table `tblformans`
--
ALTER TABLE `tblformans`
  ADD PRIMARY KEY (`AnsId`);

--
-- Indexes for table `tblformques`
--
ALTER TABLE `tblformques`
  ADD PRIMARY KEY (`QuesId`);

--
-- Indexes for table `tblmessage`
--
ALTER TABLE `tblmessage`
  ADD PRIMARY KEY (`MessageId`);

--
-- Indexes for table `tblnotification`
--
ALTER TABLE `tblnotification`
  ADD PRIMARY KEY (`NotificationId`);

--
-- Indexes for table `tblreportarticle`
--
ALTER TABLE `tblreportarticle`
  ADD PRIMARY KEY (`ReportArticleId`);

--
-- Indexes for table `tblreporttutor`
--
ALTER TABLE `tblreporttutor`
  ADD PRIMARY KEY (`ReportTutorId`);

--
-- Indexes for table `tblreportvideo`
--
ALTER TABLE `tblreportvideo`
  ADD PRIMARY KEY (`ReportVideoId`);

--
-- Indexes for table `tblstate`
--
ALTER TABLE `tblstate`
  ADD PRIMARY KEY (`StateId`),
  ADD UNIQUE KEY `StateName` (`StateName`);

--
-- Indexes for table `tblstudent`
--
ALTER TABLE `tblstudent`
  ADD PRIMARY KEY (`StudentId`),
  ADD UNIQUE KEY `EmailId` (`EmailId`);

--
-- Indexes for table `tblsubcategory`
--
ALTER TABLE `tblsubcategory`
  ADD PRIMARY KEY (`SubCategoryId`);

--
-- Indexes for table `tblsubject`
--
ALTER TABLE `tblsubject`
  ADD PRIMARY KEY (`SubjectId`);

--
-- Indexes for table `tblsubscribe`
--
ALTER TABLE `tblsubscribe`
  ADD PRIMARY KEY (`SubscribeId`);

--
-- Indexes for table `tbltutor`
--
ALTER TABLE `tbltutor`
  ADD PRIMARY KEY (`TutorId`),
  ADD UNIQUE KEY `EmailId` (`EmailId`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`UserId`),
  ADD UNIQUE KEY `UserName` (`UserName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `AdminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblarticle`
--
ALTER TABLE `tblarticle`
  MODIFY `ArticleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblarticlecomment`
--
ALTER TABLE `tblarticlecomment`
  MODIFY `ArticleCommentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblarticlelike`
--
ALTER TABLE `tblarticlelike`
  MODIFY `ArticleLikeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `CategoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tblcity`
--
ALTER TABLE `tblcity`
  MODIFY `CityId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblcourse`
--
ALTER TABLE `tblcourse`
  MODIFY `CourseId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tblcourseenrollment`
--
ALTER TABLE `tblcourseenrollment`
  MODIFY `CourseEnrollmentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblcoursequestion`
--
ALTER TABLE `tblcoursequestion`
  MODIFY `CourseQuesId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblcoursereview`
--
ALTER TABLE `tblcoursereview`
  MODIFY `CourseReviewId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblcoursevideos`
--
ALTER TABLE `tblcoursevideos`
  MODIFY `CourseVideoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblformans`
--
ALTER TABLE `tblformans`
  MODIFY `AnsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblformques`
--
ALTER TABLE `tblformques`
  MODIFY `QuesId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblmessage`
--
ALTER TABLE `tblmessage`
  MODIFY `MessageId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblnotification`
--
ALTER TABLE `tblnotification`
  MODIFY `NotificationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tblstate`
--
ALTER TABLE `tblstate`
  MODIFY `StateId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tblstudent`
--
ALTER TABLE `tblstudent`
  MODIFY `StudentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblsubcategory`
--
ALTER TABLE `tblsubcategory`
  MODIFY `SubCategoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tblsubject`
--
ALTER TABLE `tblsubject`
  MODIFY `SubjectId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tblsubscribe`
--
ALTER TABLE `tblsubscribe`
  MODIFY `SubscribeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbltutor`
--
ALTER TABLE `tbltutor`
  MODIFY `TutorId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
