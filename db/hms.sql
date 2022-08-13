-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 05 سبتمبر 2021 الساعة 11:58
-- إصدار الخادم: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--
CREATE DATABASE IF NOT EXISTS `hms` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `hms`;

-- --------------------------------------------------------

--
-- بنية الجدول `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `updationDate`) VALUES
(1, 'admin', '123456', '04-09-2021 05:28:27 PM');

-- --------------------------------------------------------

--
-- بنية الجدول `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `doctorSpecialization` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `doctorId` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `consultancyFees` int(11) DEFAULT NULL,
  `appointmentDate` varchar(255) DEFAULT NULL,
  `appointmentTime` varchar(255) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `userStatus` int(11) DEFAULT NULL,
  `doctorStatus` int(11) DEFAULT NULL,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `appointment`
--

INSERT INTO `appointment` (`id`, `doctorSpecialization`, `doctorId`, `userId`, `consultancyFees`, `appointmentDate`, `appointmentTime`, `postingDate`, `userStatus`, `doctorStatus`, `updationDate`) VALUES
(14, '????? ????', 11, 11, 455, '2021-09-23', '3:30 PM', '2021-09-05 09:55:56', 1, 0, '2021-09-05 09:56:42'),
(15, 'جراحة عامة', 11, 11, 455, '2021-09-28', '1:00 PM', '2021-09-05 09:56:59', 0, 1, '2021-09-05 09:57:28');

-- --------------------------------------------------------

--
-- بنية الجدول `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `specilization` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `doctorName` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `address` longtext CHARACTER SET utf8 DEFAULT NULL,
  `docFees` varchar(255) DEFAULT NULL,
  `contactno` bigint(11) DEFAULT NULL,
  `docEmail` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `doctors`
--

INSERT INTO `doctors` (`id`, `specilization`, `doctorName`, `address`, `docFees`, `contactno`, `docEmail`, `password`, `creationDate`, `updationDate`) VALUES
(11, 'جراحة عامة', 'الدكتور محمد علي', 'العراق /بغداد', '455', 8754987541, 'ali1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2021-08-30 13:12:34', '2021-09-05 09:55:16'),
(13, 'جراحة العظام', 'الدكتور محمد عمر الشهواني', 'العراق /بغداد', '25', 8754987541, 'ali2@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2021-09-04 22:17:30', '2021-09-04 22:20:07'),
(14, 'جراحة عامة', 'البروفسور أزهر داود', 'العراق/ بغداد', '10', 8754987541, 'ali3@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2021-09-04 22:19:00', '2021-09-04 22:20:20'),
(15, 'اخصائي قلب', 'الدكتور أحمد الشياب', 'العراق /الموصل', '15', 8754987541, 'ali4@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2021-09-04 22:21:09', NULL),
(16, 'جراحة تجميلية', 'الدكتور اسامة ابو خالد', 'العراق/البصرة', '25', 8754987541, 'ali5@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2021-09-04 22:22:23', NULL),
(17, 'اخصائي اورام', 'الدكتور اسامة حمدلله حامد', 'العراق/الموصل', '25', 8754987541, 'ali6@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2021-09-04 22:25:18', NULL),
(18, 'اخصائي امراض جلدية', 'الدكتور انور عبد السلام', 'العراق/بغداد', '10', 8754987541, 'ali7@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2021-09-04 22:26:16', NULL),
(19, 'اخصائي علم امراض الدم', 'الدكتور بسام غنمه', 'العراق/ اربيل', '20', 8754987541, 'ali8@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2021-09-04 22:27:20', NULL),
(20, 'جراحة الدماغ والأعصاب', 'الدكتور صادق محمد الكيلاني', 'العراق /البصرة', '50', 8754987541, 'ali9@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2021-09-04 22:28:26', NULL),
(21, 'اخصائي جراحة كسور', 'الدكتور فايز عبيد', 'العراق/ بغداد', '30', 8754987541, 'ali10@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2021-09-04 22:29:35', NULL);

-- --------------------------------------------------------

--
-- بنية الجدول `doctorslog`
--

CREATE TABLE `doctorslog` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT current_timestamp(),
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `doctorslog`
--

INSERT INTO `doctorslog` (`id`, `uid`, `username`, `userip`, `loginTime`, `logout`, `status`) VALUES
(20, NULL, 'ali@gmail.com', 0x3a3a3100000000000000000000000000, '2021-08-30 13:29:05', NULL, 0),
(21, NULL, 'ali@gmail.com', 0x3a3a3100000000000000000000000000, '2021-08-30 13:29:11', NULL, 0),
(22, 11, 'ali1@gmail.com', 0x3a3a3100000000000000000000000000, '2021-08-30 13:29:57', '30-08-2021 07:03:56 PM', 1),
(23, 11, 'ali1@gmail.com', 0x3a3a3100000000000000000000000000, '2021-08-30 13:37:07', NULL, 1),
(24, 11, 'ali1@gmail.com', 0x3a3a3100000000000000000000000000, '2021-08-31 12:09:55', '31-08-2021 05:41:15 PM', 1),
(25, 11, 'ali1@gmail.com', 0x3a3a3100000000000000000000000000, '2021-08-31 12:16:33', '31-08-2021 05:49:02 PM', 1),
(26, 11, 'ali1@gmail.com', 0x3a3a3100000000000000000000000000, '2021-08-31 18:00:05', NULL, 1),
(27, 11, 'ali1@gmail.com', 0x3a3a3100000000000000000000000000, '2021-09-01 10:40:28', NULL, 1),
(28, 11, 'ali1@gmail.com', 0x3a3a3100000000000000000000000000, '2021-09-01 13:45:00', '01-09-2021 07:25:54 PM', 1),
(29, 11, 'ali1@gmail.com', 0x3a3a3100000000000000000000000000, '2021-09-01 13:57:24', NULL, 1),
(30, 11, 'ali1@gmail.com', 0x3a3a3100000000000000000000000000, '2021-09-01 14:03:47', '01-09-2021 07:38:39 PM', 1),
(31, 11, 'ali1@gmail.com', 0x3a3a3100000000000000000000000000, '2021-09-01 14:11:52', '01-09-2021 07:47:13 PM', 1),
(32, 11, 'ali1@gmail.com', 0x3a3a3100000000000000000000000000, '2021-09-02 11:43:10', NULL, 1),
(33, 11, 'ali1@gmail.com', 0x3a3a3100000000000000000000000000, '2021-09-02 18:21:56', NULL, 1),
(34, 11, 'ali1@gmail.com', 0x3a3a3100000000000000000000000000, '2021-09-04 12:15:51', '04-09-2021 05:50:13 PM', 1),
(35, 11, 'ali1@gmail.com', 0x3a3a3100000000000000000000000000, '2021-09-05 09:53:18', NULL, 1);

-- --------------------------------------------------------

--
-- بنية الجدول `doctorspecilization`
--

CREATE TABLE `doctorspecilization` (
  `id` int(11) NOT NULL,
  `specilization` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `doctorspecilization`
--

INSERT INTO `doctorspecilization` (`id`, `specilization`, `creationDate`, `updationDate`) VALUES
(17, 'جراحة العظام', '2021-09-04 12:21:30', NULL),
(18, 'جراحة عامة', '2021-09-04 12:21:47', NULL),
(19, 'اخصائي قلب', '2021-09-04 12:22:00', NULL),
(20, 'جراحة تجميلية', '2021-09-04 12:22:15', NULL),
(21, 'اخصائي الاشعة', '2021-09-04 12:22:31', NULL),
(23, 'اخصائي اورام', '2021-09-04 12:22:50', NULL),
(24, 'اخصائي امراض جلدية', '2021-09-04 12:23:19', NULL),
(25, 'اخصائي علم امراض الدم', '2021-09-04 12:23:28', NULL),
(26, 'اخصائي مسالك بولية', '2021-09-04 12:23:41', NULL),
(27, 'اخصائي امراض الجهاز الهضمي', '2021-09-04 12:23:57', NULL),
(28, 'اخصائي طب الاطفال', '2021-09-04 22:10:53', '2021-09-04 22:11:02'),
(29, 'اخصائي نفسية', '2021-09-04 22:11:28', NULL),
(30, 'اخصائي جراحة كسور', '2021-09-04 22:11:47', NULL),
(31, 'اخصائي نساء وتوليد', '2021-09-04 22:12:04', NULL),
(32, 'جراحة الدماغ والأعصاب', '2021-09-04 22:12:30', NULL),
(33, 'امراض الغدد الصم والسكري', '2021-09-04 22:12:52', NULL);

-- --------------------------------------------------------

--
-- بنية الجدول `tblcontactus`
--

CREATE TABLE `tblcontactus` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contactno` bigint(12) DEFAULT NULL,
  `message` mediumtext CHARACTER SET utf8 DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `AdminRemark` mediumtext CHARACTER SET utf8 DEFAULT NULL,
  `LastupdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `IsRead` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `tblcontactus`
--

INSERT INTO `tblcontactus` (`id`, `fullname`, `email`, `contactno`, `message`, `PostingDate`, `AdminRemark`, `LastupdationDate`, `IsRead`) VALUES
(6, 'kdwdwadwa', 'teds@gmail.com', 4521754874, ' 425425', '2021-09-04 11:07:45', 'تم', '2021-09-04 11:16:38', 1),
(7, 'ahmed', 'teds@gmail.com', 4521754874, ' صيششششششششششششش', '2021-09-04 11:08:39', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- بنية الجدول `tblmedicalhistory`
--

CREATE TABLE `tblmedicalhistory` (
  `ID` int(10) NOT NULL,
  `PatientID` int(10) DEFAULT NULL,
  `BloodPressure` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `BloodSugar` varchar(200) CHARACTER SET utf8 NOT NULL,
  `Weight` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `Temperature` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `MedicalPres` mediumtext CHARACTER SET utf8 DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `tblmedicalhistory`
--

INSERT INTO `tblmedicalhistory` (`ID`, `PatientID`, `BloodPressure`, `BloodSugar`, `Weight`, `Temperature`, `MedicalPres`, `CreationDate`) VALUES
(12, 8, 'طبيعي', 'طبيعي', '85', 'طبيعي', 'طبيعي', '2021-09-04 12:19:08');

-- --------------------------------------------------------

--
-- بنية الجدول `tblpatient`
--

CREATE TABLE `tblpatient` (
  `ID` int(10) NOT NULL,
  `Docid` int(10) DEFAULT NULL,
  `PatientName` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `PatientContno` bigint(10) DEFAULT NULL,
  `PatientEmail` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `PatientGender` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `PatientAdd` mediumtext CHARACTER SET utf8 DEFAULT NULL,
  `PatientAge` int(10) DEFAULT NULL,
  `PatientMedhis` mediumtext CHARACTER SET utf8 DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `tblpatient`
--

INSERT INTO `tblpatient` (`ID`, `Docid`, `PatientName`, `PatientContno`, `PatientEmail`, `PatientGender`, `PatientAdd`, `PatientAge`, `PatientMedhis`, `CreationDate`, `UpdationDate`) VALUES
(8, 11, 'عمر', 4514754154, 'admin12@gmail.com', 'ذكر', 'العراق ', 40, 'كل شي طبيعي', '2021-09-04 12:18:45', NULL);

-- --------------------------------------------------------

--
-- بنية الجدول `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT current_timestamp(),
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `userlog`
--

INSERT INTO `userlog` (`id`, `uid`, `username`, `userip`, `loginTime`, `logout`, `status`) VALUES
(24, NULL, ' admin', 0x3a3a3100000000000000000000000000, '2021-08-30 12:22:38', NULL, 0),
(25, NULL, 'admin', 0x3a3a3100000000000000000000000000, '2021-08-30 12:22:57', NULL, 0),
(26, NULL, ' test@demo.com', 0x3a3a3100000000000000000000000000, '2021-08-30 12:24:33', NULL, 0),
(27, 2, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2021-08-30 12:25:39', '30-08-2021 05:56:55 PM', 1),
(28, 8, 'admin22@gmail.com', 0x3a3a3100000000000000000000000000, '2021-08-30 13:15:32', '30-08-2021 06:57:19 PM', 1),
(29, 9, 'admin12@gmail.com', 0x3a3a3100000000000000000000000000, '2021-08-30 13:28:16', '30-08-2021 06:58:54 PM', 1),
(30, NULL, 'test@gmail.com', 0x3a3a3100000000000000000000000000, '2021-08-31 11:48:12', NULL, 0),
(31, NULL, 'ali@gmail.com', 0x3a3a3100000000000000000000000000, '2021-08-31 11:49:50', NULL, 0),
(32, NULL, 'admin12@gmail.com', 0x3a3a3100000000000000000000000000, '2021-08-31 11:51:21', NULL, 0),
(33, 10, 'admin5@gmail.com', 0x3a3a3100000000000000000000000000, '2021-08-31 11:52:10', '31-08-2021 05:39:28 PM', 1),
(34, NULL, 'admin12@gmail.com', 0x3a3a3100000000000000000000000000, '2021-08-31 12:11:24', NULL, 0),
(35, NULL, 'admin12@gmail.com', 0x3a3a3100000000000000000000000000, '2021-08-31 12:11:46', NULL, 0),
(36, NULL, 'admin20@gmail.com', 0x3a3a3100000000000000000000000000, '2021-08-31 12:13:24', NULL, 0),
(37, NULL, 'admin12@gmail.com', 0x3a3a3100000000000000000000000000, '2021-08-31 12:14:49', NULL, 0),
(38, 9, 'admin12@gmail.com', 0x3a3a3100000000000000000000000000, '2021-08-31 12:15:31', '31-08-2021 05:46:21 PM', 1),
(39, NULL, 'admin12@admin.com', 0x3a3a3100000000000000000000000000, '2021-08-31 12:19:18', NULL, 0),
(40, 9, 'admin12@gmail.com', 0x3a3a3100000000000000000000000000, '2021-08-31 12:20:00', '31-08-2021 06:12:10 PM', 1),
(41, NULL, 'admin12@admin.com', 0x3a3a3100000000000000000000000000, '2021-08-31 15:28:56', NULL, 0),
(42, 9, 'admin12@gmail.com', 0x3a3a3100000000000000000000000000, '2021-08-31 15:29:29', '31-08-2021 09:07:30 PM', 1),
(43, 9, 'admin12@gmail.com', 0x3a3a3100000000000000000000000000, '2021-08-31 15:51:51', NULL, 1),
(44, 9, 'admin12@gmail.com', 0x3a3a3100000000000000000000000000, '2021-08-31 18:01:04', NULL, 1),
(45, 9, 'admin12@gmail.com', 0x3a3a3100000000000000000000000000, '2021-09-01 10:48:08', NULL, 1),
(46, 9, 'admin12@gmail.com', 0x3a3a3100000000000000000000000000, '2021-09-01 13:56:49', NULL, 1),
(47, 9, 'admin12@gmail.com', 0x3a3a3100000000000000000000000000, '2021-09-04 11:52:41', NULL, 1),
(48, 11, 'admin12@gmail.com', 0x3a3a3100000000000000000000000000, '2021-09-05 09:54:41', NULL, 1);

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `address` longtext CHARACTER SET utf8 DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `gender` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `regDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`id`, `fullName`, `address`, `city`, `gender`, `email`, `password`, `regDate`, `updationDate`) VALUES
(11, 'محمد', 'العراق /بغداد', 'بغداد', 'ذكر', 'admin12@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2021-09-05 09:54:18', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctorslog`
--
ALTER TABLE `doctorslog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctorspecilization`
--
ALTER TABLE `doctorspecilization`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcontactus`
--
ALTER TABLE `tblcontactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblmedicalhistory`
--
ALTER TABLE `tblmedicalhistory`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpatient`
--
ALTER TABLE `tblpatient`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `doctorslog`
--
ALTER TABLE `doctorslog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `doctorspecilization`
--
ALTER TABLE `doctorspecilization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tblcontactus`
--
ALTER TABLE `tblcontactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblmedicalhistory`
--
ALTER TABLE `tblmedicalhistory`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblpatient`
--
ALTER TABLE `tblpatient`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- بنية الجدول `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- بنية الجدول `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin DEFAULT NULL,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

--
-- إرجاع أو استيراد بيانات الجدول `pma__central_columns`
--

INSERT INTO `pma__central_columns` (`db_name`, `col_name`, `col_type`, `col_length`, `col_collation`, `col_isNull`, `col_extra`, `col_default`) VALUES
('hms', 'address', 'longtext', '', 'utf8_general_ci', 1, ',', '');

-- --------------------------------------------------------

--
-- بنية الجدول `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- بنية الجدول `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

--
-- إرجاع أو استيراد بيانات الجدول `pma__designer_settings`
--

INSERT INTO `pma__designer_settings` (`username`, `settings_data`) VALUES
('root', '{\"snap_to_grid\":\"off\",\"relation_lines\":\"true\",\"angular_direct\":\"direct\"}');

-- --------------------------------------------------------

--
-- بنية الجدول `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- بنية الجدول `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- بنية الجدول `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- بنية الجدول `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- بنية الجدول `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- بنية الجدول `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- إرجاع أو استيراد بيانات الجدول `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"hms\",\"table\":\"tblcontactus\"},{\"db\":\"hms\",\"table\":\"doctorspecilization\"},{\"db\":\"hms\",\"table\":\"doctorslog\"},{\"db\":\"hms\",\"table\":\"tblpatient\"},{\"db\":\"hms\",\"table\":\"users\"},{\"db\":\"hms\",\"table\":\"appointment\"},{\"db\":\"hms\",\"table\":\"doctors\"},{\"db\":\"hms\",\"table\":\"userlog\"},{\"db\":\"hms\",\"table\":\"tblmedicalhistory\"},{\"db\":\"hms\",\"table\":\"admin\"}]');

-- --------------------------------------------------------

--
-- بنية الجدول `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- بنية الجدول `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- بنية الجدول `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- بنية الجدول `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- بنية الجدول `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- بنية الجدول `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin DEFAULT NULL,
  `data_sql` longtext COLLATE utf8_bin DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- بنية الجدول `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- إرجاع أو استيراد بيانات الجدول `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2021-09-02 11:42:02', '{\"Console\\/Mode\":\"collapse\",\"lang\":\"ar\"}');

-- --------------------------------------------------------

--
-- بنية الجدول `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- بنية الجدول `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
