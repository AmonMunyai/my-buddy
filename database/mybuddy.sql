-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2023 at 11:35 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mybuddy`
--

CREATE DATABASE IF NOT EXISTS mybuddy;
USE mybuddy;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

CREATE TABLE `password_reset` (
  `id` bigint(20) NOT NULL,
  `password_reset_email` varchar(255) NOT NULL,
  `password_reset_selector` varchar(255) NOT NULL,
  `password_reset_token` longtext NOT NULL,
  `password_reset_expires` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` bigint(20) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_content` longtext NOT NULL,
  `post_created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `post_created_by` varchar(255) NOT NULL,
  `post_created_by_id` bigint(20) NOT NULL,
  `post_created_by_avatar` varchar(255) NOT NULL,
  `post_number_of_answers` bigint(20) DEFAULT 0,
  `post_notification_email_status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `post_title`, `post_content`, `post_created_date`, `post_created_by`, `post_created_by_id`, `post_created_by_avatar`, `post_number_of_answers`, `post_notification_email_status`) VALUES
(2, 'Opinion: Was a tutor grading unfair?', 'Hi so first of all sorry english isn’t my first language so excuse any mistakes. I just finished a course of mine and was the student in the lowest semester. All other students were two or more semesters above me and they clearly got more experience. Part of this course were some oral tests. The first time I totally messed up, but the second time I knew all the information which was required to know for this particular course. On to the issue the other students knew some additional information because they learned it already (NOT REQUIRED FOR THIS COURSE) now the tutor gave the others good grades and they gave me a bad one because I only knew the required course information and didn’t understand any of the other things (because I still have to learn them). I think I am being treated unfairly but I might just be petty. Did she grade me unfairly? and if so what should I do about that?', '2023-06-04 18:48:22', 'logan.ernser', 1, 'https://robohash.org/perspiciatisquibusdamet.png?size=300x300&set=set1', 1, 0),
(3, 'School refuses to write letters of recommendation', 'Some universities require letters of recommendation to apply, and my school is outright refusing to have any letters written up for me until I pay the counselor fee which is ~R200. I think that\'s absurd and don\'t know what to do because of it.\r\n\r\nI\'m not paying that fee cuz that\'s too expensive. Do I just individually contact each university and tell them about this?', '2023-06-04 18:56:30', 'launa.nader', 3, 'https://robohash.org/aliasquiaaspernatur.png?size=300x300&set=set1', 4, 0),
(4, 'University of Johannesburg', 'People who went to University of Johannesburg; what was your opinion on it?', '2023-06-04 18:59:08', 'krystal.feil', 4, 'https://robohash.org/omnisatquesint.png?size=300x300&set=set1', 1, 0),
(5, 'Online degrees', 'I\'m here just requesting for online undergraduate degrees, available worldwide.', '2023-06-04 19:03:43', 'rhonda.weimann', 6, 'https://robohash.org/consecteturquibusdammodi.png?size=300x300&set=set1', 0, 0),
(6, 'Looking for scholarships computer science and business majors', 'Hi 👋🏻 I’m looking for fully-funded scholarships for both CS and business. I also need your advice on application and preparation?\r\n\r\nWhat are somethings I can do to increase my chances of getting accepted?', '2023-06-04 19:06:44', 'terrance.lubowitz', 8, 'https://robohash.org/dignissimosmagnameum.png?size=300x300&set=set1', 0, 0),
(7, 'Postgraduate Inquiry', 'Hope everyone is having a good day/night.\r\n\r\nI’m currently finishing up a BArts in Environment,Society and Law and I’m thinking of going into a postgraduate program. The thing is that I want to go into a program that is more in the scientific side of environmental studies.\r\n\r\nCan I get into a science based Masters program as an BA undergraduate or is it too late?\r\n\r\nThanks for reading! :)', '2023-06-04 19:08:21', 'leanora.kilback', 9, 'https://robohash.org/molestiaealiasdeleniti.png?size=300x300&set=set1', 1, 0),
(8, 'Good jobs/majors for someone in an engineering field?', 'Someone explain to me some of the benefits and cons for majors/jobs related to an engineering field? (I\'m specifically studying Electric Engineering currently)\r\n\r\nThanks in advance.', '2023-06-04 19:14:22', 'steven.emard', 12, 'https://robohash.org/nonducimuslabore.png?size=300x300&set=set1', 1, 0),
(9, 'Has anyone used scribbr before', 'Please let me know\r\n\r\nIt is a tool to check plagarism', '2023-06-04 19:16:47', 'johnie.wyman', 13, 'https://robohash.org/expeditaautmaxime.png?size=300x300&set=set1', 2, 0),
(10, 'My new essay.', 'I’m a second year in University and I thought this was pretty funny. I’m writing an essay for Literature in the Enlightenment and one of the chosen we had to do it in was comedy, so I decided to channel my inner 15 year old and make my essay entirely on dick jokes: more specifically on impotence.', '2023-06-04 19:31:41', 'krystyna.wyman', 15, 'https://robohash.org/dolorumomnisad.png?size=300x300&set=set1', 0, 0),
(11, 'Free Courses and Academic licenses', 'I want my university to give as many free benefits as possible, So after asking student office they want a list of potential free/cheap course providing companies.\r\n\r\nI\'ve recommended Github Student & university pack, Uni days, Jetbrains for students etc...\r\n\r\nPlease recommend me more so I can get as much benefits as possible.\r\n\r\n(Recommend from any field or faculty)', '2023-06-04 19:33:18', 'sharolyn.hintz', 16, 'https://robohash.org/quibusdamnihilhic.png?size=300x300&set=set1', 0, 0),
(12, 'How can you find primary soucres on the internet', 'I\'m studying in history and need to find the text of the register of Honorius (411). Does anybody know how to find primary sources especially from the Roman Empire?', '2023-06-04 19:34:35', 'cassi.hermann', 17, 'https://robohash.org/perspiciatisreprehenderitest.png?size=300x300&set=set1', 3, 0),
(13, 'What to study?', 'Hello! I am currently studying Medicine, but I want to change that. I am thinking of Software Engineering or Chemistry. Any opinions or ideas?', '2023-06-04 19:37:54', 'samira.green', 19, 'https://robohash.org/quisquamperferendisprovident.png?size=300x300&set=set1', 2, 0),
(14, 'I\'m writing an essay on myBuddy for college, can you help me?', 'I have to write an extensive essay on myBuddy for a class. I need to talk about the website in general; from it\'s history, it\'s design, functions, way of working, users and relationships, general characteristics, evolution, culture, tendencies and interesting phenomenons that can or have happened revolving the platform.\r\n\r\nIf you have any articles, Youtube Videos, essays, websites, anything that you think can help me, i\'ll be very thankful. If you want to write anything yourself in the comments, how something works or whatever, please do.\r\n\r\nThank you!', '2023-06-04 19:46:17', 'jeremy.lehner', 21, 'https://robohash.org/consequaturnonaperiam.png?size=300x300&set=set1', 2, 0),
(15, 'How do you find out how to contact a professor for a school you do not go to in order to educate yourself on a possible career path?', 'Hello, everyone! I\'m really confused when naviagting university websites and trying to find the professors so I can ask them about what they do and how they got to the point they\'re at.\r\nI\'m trying to find out how to get into a career involving something similar to biology, preferably ornithology, but have no idea where to start looking to figure out what jobs are out there and what path and schools I should be looking into.\r\nI hope I worded my question properly, I\'m bad at phrasing questions about topics I\'m not well versed in.\r\n\r\nPlease help me out, I\'d be eternally grateful.', '2023-06-04 19:50:29', 'august.daniel', 24, 'https://robohash.org/doloresrepudiandaeea.png?size=300x300&set=set1', 2, 0),
(16, 'Thesis topic', 'Hello, I hope everyone is doing well\r\n\r\nCould you please provide a decent marketing thesis topics with lots of references? I looked everywhere, but I couldn\'t find anything worthwhile.', '2023-06-04 19:52:10', 'forrest.ankunding', 25, 'https://robohash.org/eumnesciuntsit.png?size=300x300&set=set1', 0, 0),
(17, 'What is the best online plagiarism checker?', 'I found some, but most have a word limit or a scan limit so they aren\'t going to be useful constantly.\r\n\r\nI\'m pretty sure that I don\'t have a problem with it (since I wrote everything myself), but I want to be able to check (I blame my overthinking and ADHD). Problem is that I don\'t have lots of money so if I pay for one, I want to be sure it\'s good enough :)\r\n\r\nWhat plagiarism checker do you use?', '2023-06-04 19:54:22', 'anibal.wiegand', 27, 'https://robohash.org/idmollitiaiure.png?size=300x300&set=set1', 0, 0),
(18, 'Is it easy to find work in the digital marketing field', 'Guys I\'m planning to do a digital marketing master, anybody have any experience? Is it easy to find a job in this field?', '2023-06-04 19:56:46', 'rosella.gislason', 28, 'https://robohash.org/ullamexplicaboquod.png?size=300x300&set=set1', 1, 0),
(19, 'Is University of Johannesburg\'s (UJ\'s) Business Commerce department any good today?', 'Hey all, I\'m doing the usual uni applications (I\'ve applied to Tuks Wits and UCT, Tuks Bcom being my first preference), and after like a week I got provisionally accepted for a BCom Finance at UJ\'s.\r\n\r\nLiving in Johannesburg I\'ve only heard the bad side of UJs, but all I really care about is will my degree be as equally recognised and will I pull my hair out in two years time because the lecturers are full of crap lol.\r\n\r\nBut yeah I\'m curious to hear anyone\'s thoughts about it, is it worth considering?', '2023-06-04 19:59:51', 'neida.hintz', 30, 'https://robohash.org/quiaveritatisnam.png?size=300x300&set=set1', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `post_answer`
--

CREATE TABLE `post_answer` (
  `id` bigint(20) NOT NULL,
  `post_id` bigint(20) NOT NULL,
  `post_answer_content` longtext NOT NULL,
  `post_answer_created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `post_answer_created_by` varchar(255) NOT NULL,
  `post_answer_created_by_id` varchar(255) NOT NULL,
  `post_answer_created_by_avatar` varchar(255) NOT NULL,
  `post_answer_number_of_votes` bigint(20) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_answer`
--

INSERT INTO `post_answer` (`id`, `post_id`, `post_answer_content`, `post_answer_created_date`, `post_answer_created_by`, `post_answer_created_by_id`, `post_answer_created_by_avatar`, `post_answer_number_of_votes`) VALUES
(1, 2, 'I would highly recommend talking to the student advisor or department head. If you passed the requirements of the course, you passed, regardless of whatever extra your teacher expected of you. Consult the syllabus requirements as well during these meetings.', '2023-06-04 18:49:40', 'leopoldo.mohr', '2', 'https://robohash.org/atquevoluptatesmollitia.png?size=300x300&set=set1', 1),
(2, 3, 'It takes about an hour or more to write these. Now imagine 5-10 kids asking you to do this. Teachers don\'t get paid for this so a lot are starting to say no unless the district pays them. My union is hashing this out actually currently.', '2023-06-04 18:57:45', 'krystal.feil', '4', 'https://robohash.org/omnisatquesint.png?size=300x300&set=set1', 12),
(3, 4, 'Both of my parents taught at UJ for years. it\'s a solid campus. ', '2023-06-04 19:00:43', 'theda.conn', '5', 'https://robohash.org/officiisquaeratharum.png?size=300x300&set=set1', 0),
(4, 3, 'If anything, you can talk to your teachers and tell them you don\'t have the money.\r\n\r\nAs someone mentioned, it’s pretty time consuming so it’s understandable there’s a fee. but if you really need that rec letter and the teacher knows you/likes you well enough, there’s a change they can waive it or decrease the amount you have to pay.\r\n\r\nrec letters are incredibly important for colleges to see what kind of student you are outside of the classroom. it’s not a change you want to pass up', '2023-06-04 19:02:34', 'rhonda.weimann', '6', 'https://robohash.org/consecteturquibusdammodi.png?size=300x300&set=set1', 3),
(5, 3, 'We gave R100 each to the teacher’s that wrote recs for our child. They didn’t ask for it and were thrilled.', '2023-06-04 19:04:39', 'liliana.oberbrunner', '7', 'https://robohash.org/voluptatemquiofficia.png?size=300x300&set=set1', 3),
(6, 3, 'Expecting a letter like this to be given without anything in return seems like an old school way of thinking. These letters can be formulaic and cheap or they can be focused and turn the tide in your favor if written by a person who cares.\r\n\r\nI don\'t think the school is wrong for wanting you to pay your fees before asking its employees to write you LoR.', '2023-06-04 19:06:01', 'terrance.lubowitz', '8', 'https://robohash.org/dignissimosmagnameum.png?size=300x300&set=set1', 0),
(7, 7, 'Check the requirements of the program you want entry to. If it’s still not clear, contact admissions.', '2023-06-04 19:08:58', 'horacio.goodwin', '10', 'https://robohash.org/quaeprovidentut.png?size=300x300&set=set1', 2),
(8, 8, 'Electrical Engineering is a good major with pretty wide range of sub majors. There is Power / High Voltage work, Low Voltage work for Residentials, Extra Low Voltage work for Electronics and some colleges consider Computer Engineering as part of EE now too.\r\n\r\nYour post do not give much info to provide advice though.', '2023-06-04 19:15:56', 'johnie.wyman', '13', 'https://robohash.org/expeditaautmaxime.png?size=300x300&set=set1', 1),
(9, 9, 'I use it exclusively for citations and it hasn’t failed me on that. I haven’t used it for a plagiarism checker although I’m sure it’s capable.', '2023-06-04 19:18:07', 'larae.reichert', '14', 'https://robohash.org/sapientesolutaut.png?size=300x300&set=set1', 1),
(10, 9, 'ChatGPT + NetusAI for staying under the radar', '2023-06-04 19:28:49', 'krystyna.wyman', '15', 'https://robohash.org/dolorumomnisad.png?size=300x300&set=set1', 1),
(11, 12, 'Have you checked the wiki source and followed the rabbit trail to the og source?', '2023-06-04 19:35:33', 'ignacio.turner', '18', 'https://robohash.org/quidolorumnon.png?size=300x300&set=set1', 3),
(12, 12, 'Try contacting professors at universities who specialize in that era or museums. If the trail is cold online, you’re gonna have to start going offline unfortunately.', '2023-06-04 19:37:05', 'samira.green', '19', 'https://robohash.org/quisquamperferendisprovident.png?size=300x300&set=set1', 2),
(13, 12, 'Hi! So I\'m an early modern historian and thus of little use here, but have you tried looking in the bibliographies of secondary sources? Sometimes you can track down a transcript or a picture of a primary source that way.', '2023-06-04 19:39:17', 'chong.larson', '20', 'https://robohash.org/dictaeoseos.png?size=300x300&set=set1', 3),
(14, 13, 'If you want to get into tech, do Computer Science instead of Software Engineering. I only say this because your job prospects increase with a CS degree compared to a SE degree. SE is mostly geared towards becoming an SWE whereas a CS degree can open doors to other jobs other than SWE such as web/game development, cyber sec etc.', '2023-06-04 19:41:09', 'chong.larson', '20', 'https://robohash.org/dictaeoseos.png?size=300x300&set=set1', 2),
(15, 13, 'Data science (major in bioinformatics!) You have to study computer science and also biochemistry', '2023-06-04 19:42:31', 'jeremy.lehner', '21', 'https://robohash.org/consequaturnonaperiam.png?size=300x300&set=set1', 1),
(17, 14, 'A combo of chatGPT and the Wikipedia page for the site will probably not be counted as plagiarism if you do it right.', '2023-06-04 19:48:58', 'august.daniel', '24', 'https://robohash.org/doloresrepudiandaeea.png?size=300x300&set=set1', 1),
(18, 15, 'I think you can kind of start with googling \"department of biology\" + school name of interest. That usually would net you the direct department page. Most schools would have a menu tab for the people housed under the department, with their bio, research, contact info, etc.', '2023-06-04 19:51:07', 'forrest.ankunding', '25', 'https://robohash.org/eumnesciuntsit.png?size=300x300&set=set1', 3),
(19, 14, 'Yeah I was gonna say just ask chatgpt', '2023-06-04 19:51:30', 'forrest.ankunding', '25', 'https://robohash.org/eumnesciuntsit.png?size=300x300&set=set1', 1),
(20, 15, 'Alternatively, find published authors in your field of interest. They\'ll almost always have a website where you can direct inquiries.', '2023-06-04 19:53:06', 'raven.hodkiewicz', '26', 'https://robohash.org/etvoluptatesconsectetur.png?size=300x300&set=set1', 3),
(21, 18, 'Absolutely! As all businesses, especially small businesses transact online, digital marketing is crucial to their success. It\'s how they will attract and engage customers. A sizeable market in need are solo entrepreneurs and smaller Mom/pop places. I work in IT transformation. The single biggest failure for an organization that is moving to cloud services or online service is no understanding of how to market and attract customers. They can spend a lot of money on the upgrade and no strategy to attract and retain their base.', '2023-06-04 19:57:25', 'amos.crona', '29', 'https://robohash.org/inventoreinest.png?size=300x300&set=set1', 1),
(22, 19, 'I am currently a student at uj who has friends at wits and uct, uj seems to be a lot more organized and willing to help than the other varieties, fees are also cheaper than wits. There is always word going around how businesses will take a uj student over a wits student and if you are interested in obtaining a CFA qualification you can do cfa level 1 in your honors year', '2023-06-04 20:00:55', 'chantell.terry', '31', 'https://robohash.org/cupiditatenihilcorrupti.png?size=300x300&set=set1', 2),
(23, 19, 'UJ is good, their rep in the streets just sucks. Employers know how good UJ grads are. The other commenter that mentioned ranking is on the money.', '2023-06-04 20:01:41', 'nigel.o\'hara', '32', 'https://robohash.org/doloremquequolaborum.png?size=300x300&set=set1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `post_answer_comment`
--

CREATE TABLE `post_answer_comment` (
  `id` bigint(20) NOT NULL,
  `post_answer_id` bigint(20) NOT NULL,
  `post_answer_comment_content` varchar(255) NOT NULL,
  `post_answer_comment_created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `post_answer_comment_created_by` varchar(255) NOT NULL,
  `post_answer_comment_number_of_votes` bigint(20) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_answer_comment_vote`
--

CREATE TABLE `post_answer_comment_vote` (
  `id` bigint(20) NOT NULL,
  `post_answer__id` bigint(20) NOT NULL,
  `user_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_answer_vote`
--

CREATE TABLE `post_answer_vote` (
  `id` bigint(20) NOT NULL,
  `post_id` bigint(20) NOT NULL,
  `user_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_answer_vote`
--

INSERT INTO `post_answer_vote` (`id`, `post_id`, `user_id`) VALUES
(1, 1, '1'),
(2, 2, '5'),
(3, 2, '6'),
(4, 2, '7'),
(5, 4, '7'),
(6, 2, '8'),
(7, 4, '8'),
(8, 5, '8'),
(9, 2, '9'),
(10, 4, '9'),
(11, 5, '9'),
(12, 2, '10'),
(13, 5, '10'),
(14, 7, '11'),
(15, 2, '11'),
(16, 7, '12'),
(17, 2, '12'),
(18, 2, '13'),
(19, 8, '14'),
(20, 9, '14'),
(21, 10, '15'),
(22, 2, '15'),
(23, 2, '16'),
(24, 2, '17'),
(25, 11, '18'),
(26, 11, '19'),
(27, 12, '19'),
(28, 11, '20'),
(29, 12, '20'),
(30, 13, '20'),
(31, 14, '20'),
(32, 14, '21'),
(33, 13, '21'),
(34, 15, '23'),
(35, 13, '23'),
(36, 17, '24'),
(37, 19, '25'),
(38, 18, '26'),
(39, 20, '26'),
(40, 20, '27'),
(41, 18, '27'),
(42, 20, '28'),
(43, 18, '28'),
(44, 21, '29'),
(45, 22, '31'),
(46, 23, '32'),
(47, 22, '32');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_username` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_avatar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_username`, `user_lastname`, `user_email`, `user_password`, `user_avatar`) VALUES
(1, 'logan.ernser', '', 'logan.ernser@email.com', '$2y$10$T28PM7yPKDCoz13hT6xuB.EC/vGY6KrHTDwdy68E8fGvpjf4v1LeC', 'https://robohash.org/perspiciatisquibusdamet.png?size=300x300&set=set1'),
(2, 'leopoldo.mohr', '', 'leopoldo.mohr@email.com', '$2y$10$hMizbHXMD7kigPjxvMPdzuYs0pWKIjTPmIfFBPaUVgeSqEnY9AJwm', 'https://robohash.org/atquevoluptatesmollitia.png?size=300x300&set=set1'),
(3, 'launa.nader', '', 'launa.nader@email.com', '$2y$10$AK..gkWPkqc8bbKmp1rXVuQ7Fq/NWQ53t33Nd2mpUlye26ngPBeky', 'https://robohash.org/aliasquiaaspernatur.png?size=300x300&set=set1'),
(4, 'krystal.feil', '', 'krystal.feil@email.com', '$2y$10$oS66dc0a7Pwh.1T2v60duu/PKCkgsCJr8RVa3Dk7Y4NpaQf4YA4sC', 'https://robohash.org/omnisatquesint.png?size=300x300&set=set1'),
(5, 'theda.conn', '', 'theda.conn@email.com', '$2y$10$aWNM4HWOG8GVE.2eCj65hea/gExVdsZlOYs.O720E1xAFDvv/4bBS', 'https://robohash.org/officiisquaeratharum.png?size=300x300&set=set1'),
(6, 'rhonda.weimann', '', 'rhonda.weimann@email.com', '$2y$10$aS.99KG6AmAIYz0D3J7dA.upyhu41SwEKVAaHkr3.yZG6XXEeE0WW', 'https://robohash.org/consecteturquibusdammodi.png?size=300x300&set=set1'),
(7, 'liliana.oberbrunner', '', 'liliana.oberbrunner@email.com', '$2y$10$Gs7fULbOMfcBesSIr1ES7.k6HUeNwxJ/XCPXUVIEHqtdwh/DN1Mp.', 'https://robohash.org/voluptatemquiofficia.png?size=300x300&set=set1'),
(8, 'terrance.lubowitz', '', 'terrance.lubowitz@email.com', '$2y$10$BnG.K4hUYzKcz07Zc.k7sO11V2j/ePEaa6H/2s6B2tQ9pzhoWgJTu', 'https://robohash.org/dignissimosmagnameum.png?size=300x300&set=set1'),
(9, 'leanora.kilback', '', 'leanora.kilback@email.com', '$2y$10$7uDq5vvvxmfPoPy767W.fOEeIX1TTpFC60ZVh8lLfQ/88N1NAErLG', 'https://robohash.org/molestiaealiasdeleniti.png?size=300x300&set=set1'),
(10, 'horacio.goodwin', '', 'horacio.goodwin@email.com', '$2y$10$OQZf.CfLHRGBSiWKDZBg1O.sU8HnpsMWHpXpYtTP6hGSy/bjxS5Xu', 'https://robohash.org/quaeprovidentut.png?size=300x300&set=set1'),
(11, 'jenna.klein', '', 'jenna.klein@email.com', '$2y$10$9oCAmbIfNfAeCK3uv9srU.Ixb5igzx33DYHKGZKZBAMid1hWddXtC', 'https://robohash.org/explicaboeaquein.png?size=300x300&set=set1'),
(12, 'steven.emard', '', 'steven.emard@email.com', '$2y$10$6EI6BEecdxgaRQdwZL5yeOnOfj/HindfGspH1OZqJLl.bZdd9mrKS', 'https://robohash.org/nonducimuslabore.png?size=300x300&set=set1'),
(13, 'johnie.wyman', '', 'johnie.wyman@email.com', '$2y$10$fj6ZqE1kIet.AWS4FCrFr.Nen3W3d61HHSl6PDj053.wPqhFwusBy', 'https://robohash.org/expeditaautmaxime.png?size=300x300&set=set1'),
(14, 'larae.reichert', '', 'larae.reichert@email.com', '$2y$10$lBjqRJ46p2hSrw6ARYehBu81CZQ5L4IvMJOcHKEftdhgk34LEtNLi', 'https://robohash.org/sapientesolutaut.png?size=300x300&set=set1'),
(15, 'krystyna.wyman', '', 'krystyna.wyman@email.com', '$2y$10$0jJvOPRDIg/I1SG3DaXGn.lnnho3ZiUyR7I62z5tupv8PbVizlre6', 'https://robohash.org/dolorumomnisad.png?size=300x300&set=set1'),
(16, 'sharolyn.hintz', '', 'sharolyn.hintz@email.com', '$2y$10$0b/M2NUI2Zz89h398Qu6j.uFsgYWx8IZ...xooL1.Kq/CzaYHtHwO', 'https://robohash.org/quibusdamnihilhic.png?size=300x300&set=set1'),
(17, 'cassi.hermann', '', 'cassi.hermann@email.com', '$2y$10$lczggIVSE4NnOJmWtKoVY..xHPMUvxgnOj7j8N.iaERZZvG2enx0K', 'https://robohash.org/perspiciatisreprehenderitest.png?size=300x300&set=set1'),
(18, 'ignacio.turner', '', 'ignacio.turner@email.com', '$2y$10$2YG4.mgtCYMZCjG1d0p1LuadUOeaUMVXhcebRaYPXha12JaJIgzZm', 'https://robohash.org/quidolorumnon.png?size=300x300&set=set1'),
(19, 'samira.green', '', 'samira.green@email.com', '$2y$10$BphmvMwq/NTopV/GDarHF.FfczNw3nzwQ5QfEvDVzBFPtHck5b1f.', 'https://robohash.org/quisquamperferendisprovident.png?size=300x300&set=set1'),
(20, 'chong.larson', '', 'chong.larson@email.com', '$2y$10$g2bBu25ZQD.C46CReK1/SeK0kgKrP7klELr43fJHUp0C88rIdi3Pm', 'https://robohash.org/dictaeoseos.png?size=300x300&set=set1'),
(21, 'jeremy.lehner', '', 'jeremy.lehner@email.com', '$2y$10$zkbRCRhd/DwE5LN6Q7D/Ou0TSNzfEI4t6AdoHmlj3VVtccx1kRRyi', 'https://robohash.org/consequaturnonaperiam.png?size=300x300&set=set1'),
(22, 'bunny.pouros', '', 'bunny.pouros@email.com', '$2y$10$X6V.lKnHukYn50ot5y89COMpYZjHtSagm4rFG7GLT9TVtzcL5p5dK', 'https://robohash.org/eumnobismodi.png?size=300x300&set=set1'),
(23, 'florentina.daugherty', '', 'florentina.daugherty@email.com', '$2y$10$d1tbzDgNWOkdw.GP0J7G0ebYCSYHOpLA7B8jvb53RWFq6PaaOuLC.', 'https://robohash.org/quiaaperiamest.png?size=300x300&set=set1'),
(24, 'august.daniel', '', 'august.daniel@email.com', '$2y$10$IPdLg4jPIoScg2HO2JtlIOpFKBGnN/WSZjNpGyDomanxUvNXXooK.', 'https://robohash.org/doloresrepudiandaeea.png?size=300x300&set=set1'),
(25, 'forrest.ankunding', '', 'forrest.ankunding@email.com', '$2y$10$kX5Qvd3QQpm/5so6qTP5DOVDyDCLLCQh7j9Yv6797NBHSoD9IqqVi', 'https://robohash.org/eumnesciuntsit.png?size=300x300&set=set1'),
(26, 'raven.hodkiewicz', '', 'raven.hodkiewicz@email.com', '$2y$10$AIcHx0xZA3hSPPX6/DgfROUyza7rpHATh41y43gstQBwtLe3JFEVC', 'https://robohash.org/etvoluptatesconsectetur.png?size=300x300&set=set1'),
(27, 'anibal.wiegand', '', 'anibal.wiegand@email.com', '$2y$10$LUmFgGC7E3cj4bDyq/tuaeMky5WX/Xflkxxnqszf6TwzydraCLtzC', 'https://robohash.org/idmollitiaiure.png?size=300x300&set=set1'),
(28, 'rosella.gislason', '', 'rosella.gislason@email.com', '$2y$10$k3CKHATVH1QDoXh6bUXIzuTlsfybwuEwEjjEUQo7myfkG6S0aw9s2', 'https://robohash.org/ullamexplicaboquod.png?size=300x300&set=set1'),
(29, 'amos.crona', '', 'amos.crona@email.com', '$2y$10$iYjk1Sl8J3YrLZQxeFDuKeEr/rDU6ht8FasYfcON9LsgL2EdDPrwW', 'https://robohash.org/inventoreinest.png?size=300x300&set=set1'),
(30, 'neida.hintz', '', 'neida.hintz@email.com', '$2y$10$Eo0RSsRl5MF.9RP696C3ve8CJGsnyoUtEbGeQ1YwOGHW2Cjo6ev0a', 'https://robohash.org/quiaveritatisnam.png?size=300x300&set=set1'),
(31, 'chantell.terry', '', 'chantell.terry@email.com', '$2y$10$xwpraF0XnppnwLZCzBar5uT7ZsALZM4DFTAJOqV7xFRhj73kU1s/q', 'https://robohash.org/cupiditatenihilcorrupti.png?size=300x300&set=set1'),
(32, 'nigel.o\'hara', '', 'nigel.o\'hara@email.com', '$2y$10$qQkfx5slK0v6v4vlgZYWd.W7Mg/22UsvicaiYpRrYzyymr6kYDSFe', 'https://robohash.org/doloremquequolaborum.png?size=300x300&set=set1'),
(33, 'alejandro.schinner', '', 'alejandro.schinner@email.com', '$2y$10$GTOLNJL1pI2zsyvSTE1XM.fW62TNVoiJZc9No6W5yVG4o4hqAqFkK', 'https://robohash.org/atquenamillum.png?size=300x300&set=set1'),
(34, 'gregorio.reynolds', '', 'gregorio.reynolds@email.com', '$2y$10$GNWAvXOJ8KTWD2GD0dWnuuSZhzO1y0jiRnHKorBF.YhU10XMz.UsS', 'https://robohash.org/etdeseruntest.png?size=300x300&set=set1'),
(35, 'annelle.langworth', '', 'annelle.langworth@email.com', '$2y$10$LSp127lKPlKKF0pztIIxw.8NWq7Y1PwqOuBn7T/saVuX5jZw6Oo.y', 'https://robohash.org/possimuseaqueest.png?size=300x300&set=set1'),
(36, 'marcos.dach', '', 'marcos.dach@email.com', '$2y$10$IVoFwPTOqfLzR3Zp01SWOOqLEy1.5q417QLDU1OPHNAAUhH3U9h3C', 'https://robohash.org/inventoreperferendiseum.png?size=300x300&set=set1'),
(37, 'ivory.hills', '', 'ivory.hills@email.com', '$2y$10$t8mO2VlNiXh99VwV4YQjUOoCbCses1AI8zHG2ig7/6Zbkh3Kou6x6', 'https://robohash.org/praesentiumametsuscipit.png?size=300x300&set=set1'),
(38, 'marvin.kassulke', '', 'marvin.kassulke@email.com', '$2y$10$KVJWh7Hdsp.0NaAhG6FVmO9CQ068j95fSiRifKQMHRMVYzn/qIR5O', 'https://robohash.org/placeatenimnulla.png?size=300x300&set=set1'),
(39, 'trevor.franecki', '', 'trevor.franecki@email.com', '$2y$10$BNm/U0FZXbNzEjs8rReGRe80gzi2DCAQqU5L/rfD/DLSpBfoNtiie', 'https://robohash.org/nostrumreiciendisnam.png?size=300x300&set=set1'),
(40, 'quinton.kerluke', '', 'quinton.kerluke@email.com', '$2y$10$epX7CN.22Lxku.sETadgn.Fzgzd2BkXQujwfS8.VPF5M7rAtVVMS.', 'https://robohash.org/consequaturetrerum.png?size=300x300&set=set1'),
(41, 'sharen.hahn', '', 'sharen.hahn@email.com', '$2y$10$XcSYUnDijD7VObdXjeRprODTSD3EN51yvroU7ZSFaTMj6s./hEiDe', 'https://robohash.org/repudiandaeeaet.png?size=300x300&set=set1'),
(42, 'anabel.durgan', '', 'anabel.durgan@email.com', '$2y$10$FKent0maetbO5BZg8TnzeuSytV6Lso6I1x1R.Y.u8JBfeAFSlR9Ua', 'https://robohash.org/utevenietsint.png?size=300x300&set=set1'),
(43, 'buena.lang', '', 'buena.lang@email.com', '$2y$10$KvTv4WmKu9cMfng4iw7cxeztrmRofgcWmj6esBiibz3qCm1SLLmdK', 'https://robohash.org/rationenecessitatibusquia.png?size=300x300&set=set1'),
(44, 'hang.howell', '', 'hang.howell@email.com', '$2y$10$CGeyZqgB1fMusliIBRLUAeQ5zw.S34qPKoL5yd.r.lKh1kivZJFie', 'https://robohash.org/doloreassumendaqui.png?size=300x300&set=set1'),
(45, 'carman.sipes', '', 'carman.sipes@email.com', '$2y$10$2URJGa7rLECJbfZd4Y2aveJD8gefIVmuHnzuXKP3Nl0H7KABUQQJG', 'https://robohash.org/quiaaliquamrepellat.png?size=300x300&set=set1'),
(46, 'lanita.purdy', '', 'lanita.purdy@email.com', '$2y$10$T3QcPynT7zTHpoS/DqPOcO9T9gmbTvy2UTqEx.4ecEFHdzFap9xgq', 'https://robohash.org/eiusdoloremqueaut.png?size=300x300&set=set1'),
(47, 'tomeka.rolfson', '', 'tomeka.rolfson@email.com', '$2y$10$l7IxjDLEgjVnaEtywWEjMOaZ/kVQDbEy6NxcsoPlM/CIzvclx8oNO', 'https://robohash.org/quiaidaut.png?size=300x300&set=set1'),
(48, 'janie.larson', '', 'janie.larson@email.com', '$2y$10$YJHkFQHqEcQ70BKL7BP6AOKorAdnfW0OGTBPncz64XxXCiVQY/Ohu', 'https://robohash.org/omnissuntnulla.png?size=300x300&set=set1'),
(49, 'vida.satterfield', '', 'vida.satterfield@email.com', '$2y$10$ullxWCmjWMHxUvcZSlOT6uvldjILHMxkKS1RwlLsaL35VLRAtWQ5G', 'https://robohash.org/nonincommodi.png?size=300x300&set=set1'),
(50, 'taylor.hermann', '', 'taylor.hermann@email.com', '$2y$10$IJE.tznLlFzQ1.IiEVBh3uxlmjIiQnu92gzs2eRcRC/oPmmwkf49.', 'https://robohash.org/perferendiseaet.png?size=300x300&set=set1');

-- --------------------------------------------------------

--
-- Table structure for table `user_notification`
--

CREATE TABLE `user_notification` (
  `id` bigint(20) NOT NULL,
  `user_notification_image` varchar(255) NOT NULL,
  `user_notification_message` varchar(255) NOT NULL,
  `user_notification_created_by_id` bigint(20) NOT NULL,
  `user_notification_link` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_notification`
--

INSERT INTO `user_notification` (`id`, `user_notification_image`, `user_notification_message`, `user_notification_created_by_id`, `user_notification_link`, `user_id`) VALUES
(1, 'https://robohash.org/atquevoluptatesmollitia.png?size=300x300&set=set1', 'I would highly recommend talking t...', 2, 'http://localhost/mybuddy/post/question.php?id=2', '1'),
(2, 'https://robohash.org/omnisatquesint.png?size=300x300&set=set1', 'It takes about an hour or more to ...', 4, 'http://localhost/mybuddy/post/question.php?id=3', '3'),
(3, 'https://robohash.org/officiisquaeratharum.png?size=300x300&set=set1', 'Both of my parents taught at UJ fo...', 5, 'http://localhost/mybuddy/post/question.php?id=4', '4'),
(4, 'https://robohash.org/consecteturquibusdammodi.png?size=300x300&set=set1', 'If anything, you can talk to your ...', 6, 'http://localhost/mybuddy/post/question.php?id=3', '3'),
(5, 'https://robohash.org/voluptatemquiofficia.png?size=300x300&set=set1', 'We gave R100 each to the teacher??...', 7, 'http://localhost/mybuddy/post/question.php?id=3', '3'),
(6, 'https://robohash.org/dignissimosmagnameum.png?size=300x300&set=set1', 'Expecting a letter like this to be...', 8, 'http://localhost/mybuddy/post/question.php?id=3', '3'),
(7, 'https://robohash.org/quaeprovidentut.png?size=300x300&set=set1', 'Check the requirements of the prog...', 10, 'http://localhost/mybuddy/post/question.php?id=7', '9'),
(8, 'https://robohash.org/expeditaautmaxime.png?size=300x300&set=set1', 'Electrical Engineering is a good m...', 13, 'http://localhost/mybuddy/post/question.php?id=8', '12'),
(9, 'https://robohash.org/sapientesolutaut.png?size=300x300&set=set1', 'I use it exclusively for citations...', 14, 'http://localhost/mybuddy/post/question.php?id=9', '13'),
(10, 'https://robohash.org/dolorumomnisad.png?size=300x300&set=set1', 'ChatGPT + NetusAI for staying unde...', 15, 'http://localhost/mybuddy/post/question.php?id=9', '13'),
(11, 'https://robohash.org/quidolorumnon.png?size=300x300&set=set1', 'Have you checked the wiki source a...', 18, 'http://localhost/mybuddy/post/question.php?id=12', '17'),
(12, 'https://robohash.org/quisquamperferendisprovident.png?size=300x300&set=set1', 'Try contacting professors at unive...', 19, 'http://localhost/mybuddy/post/question.php?id=12', '17'),
(13, 'https://robohash.org/dictaeoseos.png?size=300x300&set=set1', 'Hi! So I\'m an early modern histori...', 20, 'http://localhost/mybuddy/post/question.php?id=12', '17'),
(14, 'https://robohash.org/dictaeoseos.png?size=300x300&set=set1', 'If you want to get into tech, do C...', 20, 'http://localhost/mybuddy/post/question.php?id=13', '19'),
(15, 'https://robohash.org/consequaturnonaperiam.png?size=300x300&set=set1', 'Data science (major in bioinformat...', 21, 'http://localhost/mybuddy/post/question.php?id=13', '19'),
(16, 'https://robohash.org/quiaaperiamest.png?size=300x300&set=set1', 'A combo of chatGPT and the Wikiped...', 23, 'http://localhost/mybuddy/post/question.php?id=14', '21'),
(17, 'https://robohash.org/doloresrepudiandaeea.png?size=300x300&set=set1', 'A combo of chatGPT and the Wikiped...', 24, 'http://localhost/mybuddy/post/question.php?id=14', '21'),
(18, 'https://robohash.org/eumnesciuntsit.png?size=300x300&set=set1', 'I think you can kind of start with...', 25, 'http://localhost/mybuddy/post/question.php?id=15', '24'),
(19, 'https://robohash.org/eumnesciuntsit.png?size=300x300&set=set1', 'Yeah I was gonna say just ask chat...', 25, 'http://localhost/mybuddy/post/question.php?id=14', '21'),
(20, 'https://robohash.org/etvoluptatesconsectetur.png?size=300x300&set=set1', 'Alternatively, find published auth...', 26, 'http://localhost/mybuddy/post/question.php?id=15', '24'),
(21, 'https://robohash.org/inventoreinest.png?size=300x300&set=set1', 'Absolutely! As all businesses, esp...', 29, 'http://localhost/mybuddy/post/question.php?id=18', '28'),
(22, 'https://robohash.org/cupiditatenihilcorrupti.png?size=300x300&set=set1', 'I am currently a student at uj who...', 31, 'http://localhost/mybuddy/post/question.php?id=19', '30'),
(23, 'https://robohash.org/doloremquequolaborum.png?size=300x300&set=set1', 'UJ is good, their rep in the stree...', 32, 'http://localhost/mybuddy/post/question.php?id=19', '30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `password_reset`
--
ALTER TABLE `password_reset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_answer`
--
ALTER TABLE `post_answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_answer_comment`
--
ALTER TABLE `post_answer_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_answer_comment_vote`
--
ALTER TABLE `post_answer_comment_vote`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_answer_vote`
--
ALTER TABLE `post_answer_vote`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_notification`
--
ALTER TABLE `user_notification`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `password_reset`
--
ALTER TABLE `password_reset`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `post_answer`
--
ALTER TABLE `post_answer`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `post_answer_comment`
--
ALTER TABLE `post_answer_comment`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_answer_comment_vote`
--
ALTER TABLE `post_answer_comment_vote`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_answer_vote`
--
ALTER TABLE `post_answer_vote`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `user_notification`
--
ALTER TABLE `user_notification`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
