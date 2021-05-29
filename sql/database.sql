## phpMyAdmin SQL Dump
## version 4.8.2
## https://www.phpmyadmin.net/
##
## Host: localhost:3306
## Generation Time: May 29, 2021 at 04:03 AM
## Server version: 5.7.21
## PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

##
## Database: `activity64`
##

## ########################################################


##
## Table structure for table `ci_sessions`
##

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

##
## Table structure for table `college`
##

CREATE TABLE `college` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `province_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

##
## Dumping data for table `college`
##

INSERT INTO `college` (`id`, `name`, `province_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'วิทยาลัยเทคนิคชัยภูมิ', 1, 1, '0000-00-00 00:00:00', '2015-05-28 08:27:57'),
(2, 'วิทยาลัยเทคนิคขอนแก่น', 2, 1, '2015-05-19 02:45:30', '2015-05-23 18:38:09'),
(3, 'วิทยาลัยสารพัดช่าง', 1, 1, '2015-05-19 02:45:51', '2015-05-23 18:37:33'),
(4, 'วิทยาลัยเกษตร', 1, -1, '2015-05-23 18:40:31', '2015-05-23 18:40:31'),
(5, 'วิทยาลัยแก้งคร้อ', 1, -1, '2015-05-23 18:40:41', '2015-05-23 18:40:41'),
(6, 'วิทยาลัยเชตุพน', 4, -1, '2015-05-23 18:40:56', '2015-05-23 18:41:34'),
(7, 'วิทยาลัยเทคนิคชลบุรี', 0, -1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

##
## Table structure for table `groups`
##

CREATE TABLE `groups` (
  `id` int(11) NOT NULL COMMENT 'รหัสอ้างอิง',
  `group_code` int(11) NOT NULL COMMENT 'รหัสกลุ่ม',
  `group_name` varchar(100) NOT NULL,
  `college_id` int(11) NOT NULL COMMENT 'รหัสสถานศึกษา',
  `advisor_id` int(11) NOT NULL COMMENT 'ครูที่ปรึกษาหลัก',
  `coadvisor_id` int(11) NOT NULL COMMENT 'ครูที่ปรึกษาร่วม',
  `major_id` int(11) NOT NULL COMMENT 'สาขาวิชา',
  `minor_id` int(11) NOT NULL COMMENT 'สาขางาน',
  `created_at` datetime NOT NULL COMMENT 'บันทึกข้อมูลเมื่อไหร่',
  `updated_at` datetime NOT NULL COMMENT 'แก้ไขข้อมูลล่าสุดเมื่อไหร่',
  `status` int(1) NOT NULL DEFAULT '1' COMMENT 'สถานะ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

##
## Table structure for table `homerooms`
##

CREATE TABLE `homerooms` (
  `id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `week` int(2) NOT NULL,
  `join_start` datetime NOT NULL,
  `join_end` datetime NOT NULL,
  `cover_img` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `created_by_user_id` int(11) NOT NULL,
  `remark` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

##
## Table structure for table `homeroom_activities`
##

CREATE TABLE `homeroom_activities` (
  `id` int(11) NOT NULL COMMENT 'รหัสอ้างอิง',
  `homeroom_id` int(11) NOT NULL COMMENT 'รหัสกิจกรรมโฮมรูม',
  `advisor_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'บันทึกข้อมูลโดยใคร',
  `created_at` int(11) NOT NULL COMMENT 'บันทึกข้อมูลเมื่อไหร่',
  `updated_at` int(11) NOT NULL COMMENT 'แก้ไขข้อมูลล่าสุดเมื่อไหร่',
  `status` int(1) NOT NULL DEFAULT '1' COMMENT 'สถานะ',
  `major_id` int(11) NOT NULL COMMENT 'รหัสสาขาวิชา'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

##
## Table structure for table `homeroom_activity_items`
##

CREATE TABLE `homeroom_activity_items` (
  `id` int(11) NOT NULL COMMENT 'รหัสอ้างอิง',
  `homeroom_id` int(11) NOT NULL COMMENT 'รหัสกิจกรรมโฮมรูม',
  `homeroom_activity_id` int(11) NOT NULL COMMENT 'รหัสกิจกรรมโฮมรูม',
  `student_id` int(11) NOT NULL COMMENT 'รหัสนักเรียน',
  `created_at` datetime NOT NULL COMMENT 'บันทึกข้อมูลเมื่อไหร่',
  `updated_at` datetime NOT NULL COMMENT 'แก้ไขข้อมูลล่าสุดเมื่อไหร่',
  `status` int(1) NOT NULL DEFAULT '1' COMMENT 'สถานะ',
  `check_status` varchar(10) NOT NULL COMMENT 'สถานะการเข้าร่วมกิจกรรมโฮมรูม'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

##
## Table structure for table `homeroom_obediences`
##

CREATE TABLE `homeroom_obediences` (
  `id` int(11) NOT NULL COMMENT 'รหัสอ้างอิง',
  `homeroom_id` int(11) NOT NULL COMMENT 'รหัสกิจกรรมโฮมรูม',
  `user_id` int(11) NOT NULL COMMENT 'บันทึกข้อมูลโดยใคร',
  `created_at` datetime NOT NULL COMMENT 'บันทึกข้อมูลเมื่อไหร่',
  `updated_at` datetime NOT NULL COMMENT 'แก้ไขข้อมูลล่าสุดเมื่อไหร่',
  `status` int(1) NOT NULL DEFAULT '1' COMMENT 'สถานะ',
  `major_id` int(11) NOT NULL COMMENT 'รหัสสาขาวิชา',
  `minor_id` int(11) NOT NULL COMMENT 'รหัสสาขางาน',
  `group_id` int(11) NOT NULL COMMENT 'รหัสกลุ่มเรียน',
  `obe_detail` text NOT NULL COMMENT 'รายละเอียดการให้โอวาท',
  `question_amount` int(2) NOT NULL COMMENT 'จำนวนคนที่ตอบแบบสอบถาม'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

##
## Table structure for table `homeroom_obedience_attachments`
##

CREATE TABLE `homeroom_obedience_attachments` (
  `id` int(11) NOT NULL COMMENT 'รหัสอ้างอิง',
  `img` varchar(100) NOT NULL COMMENT 'ที่อยู่รูปภาพกิจกรรม',
  `homeroom_obedience_id` int(11) NOT NULL COMMENT 'รหัสกิจกรรมให้โอวาท',
  `created_at` datetime NOT NULL COMMENT 'บันทึกข้อมูลเมื่อไหร่',
  `updated_at` datetime NOT NULL COMMENT 'แก้ไขข้อมูลล่าสุดเมื่อไหร่',
  `status` int(1) NOT NULL DEFAULT '1' COMMENT 'สถานะ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

##
## Table structure for table `homeroom_risks`
##

CREATE TABLE `homeroom_risks` (
  `id` int(11) NOT NULL,
  `homeroom_id` int(11) NOT NULL COMMENT 'รหัสกิจกรรมโฮมรูม',
  `user_id` int(11) NOT NULL COMMENT 'บันทึกข้อมูลโดยใคร',
  `created_at` datetime NOT NULL COMMENT 'บันทึกข้อมูลเมื่อไหร่',
  `updated_at` datetime NOT NULL COMMENT 'แก้ไขข้อมูลล่าสุดเมื่อไหร่',
  `status` int(1) NOT NULL DEFAULT '1' COMMENT 'สถานะ',
  `major_id` int(11) NOT NULL COMMENT 'รหัสสาขาวิชา',
  `minor_id` int(11) NOT NULL COMMENT 'รหัสสาขางาน',
  `group_id` int(11) NOT NULL COMMENT 'รหัสกลุ่มเรียน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

##
## Table structure for table `homeroom_risk_items`
##

CREATE TABLE `homeroom_risk_items` (
  `id` int(11) NOT NULL COMMENT 'รหัสอ้างอิง',
  `homeroom_id` int(11) NOT NULL COMMENT 'รหัสกิจกรรมโฮมรูม',
  `homeroom_risk_id` int(11) NOT NULL COMMENT 'รหัสกิจกรรมโฮมรูม',
  `student_id` int(11) NOT NULL COMMENT 'รหัสนักเรียน',
  `created_at` datetime NOT NULL COMMENT 'บันทึกข้อมูลเมื่อไหร่',
  `updated_at` datetime NOT NULL COMMENT 'แก้ไขข้อมูลล่าสุดเมื่อไหร่',
  `status` int(1) NOT NULL DEFAULT '1' COMMENT 'สถานะ',
  `risk_detail` varchar(200) NOT NULL COMMENT 'รายงานปัญหานักเรียน',
  `risk_comment` varchar(200) NOT NULL COMMENT 'หมายเหตุ',
  `risk_status` int(1) NOT NULL DEFAULT '0' COMMENT 'สถานะความเสี่ยง'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

##
## Table structure for table `login_attempts`
##

CREATE TABLE `login_attempts` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(40) COLLATE utf8_bin NOT NULL,
  `login` varchar(50) COLLATE utf8_bin NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

##
## Table structure for table `majors`
##

CREATE TABLE `majors` (
  `id` int(11) NOT NULL COMMENT 'รหัสอ้างอิง',
  `college_id` int(11) NOT NULL COMMENT 'รหัสสถานศึกษา',
  `major_code` varchar(10) NOT NULL COMMENT 'รหัสสาขาวิชา',
  `major_name` varchar(100) NOT NULL COMMENT 'ชื่อสาขาวิชา',
  `major_eng` varchar(100) NOT NULL COMMENT 'ชื่อสาขาวิชาภาษาอังกฤษ',
  `created_at` datetime NOT NULL COMMENT 'บันทึกข้อมูลเมื่อไหร่',
  `updated_at` datetime NOT NULL COMMENT 'แก้ไขข้อมูลล่าสุดเมื่อไหร่',
  `status` int(1) NOT NULL DEFAULT '1' COMMENT 'สถานะ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

##
## Table structure for table `minors`
##

CREATE TABLE `minors` (
  `id` int(11) NOT NULL COMMENT 'รหัสอ้างอิง',
  `minor_code` varchar(10) NOT NULL COMMENT 'รหัสสาขางาน',
  `minor_name` varchar(100) NOT NULL COMMENT 'ชื่อสาขางาน',
  `minor_eng` varchar(100) NOT NULL COMMENT 'ชื่อสาขางานภาษาอังกฤษ',
  `college_id` int(11) NOT NULL COMMENT 'รหัสสถานศึกษา',
  `major_id` int(11) NOT NULL COMMENT 'รหัสสาขาวิชา',
  `created_at` datetime NOT NULL COMMENT 'บันทึกข้อมูลเมื่อไหร่',
  `updated_at` datetime NOT NULL COMMENT 'แก้ไขข้อมูลล่าสุดเมื่อไหร่',
  `status` int(1) NOT NULL DEFAULT '1' COMMENT 'สถานะ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

##
## Table structure for table `province`
##

CREATE TABLE `province` (
  `id` int(11) NOT NULL COMMENT 'รหัสอ้างอิง',
  `name` varchar(255) NOT NULL COMMENT 'ชื่อจังหวัด',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'สถานะ',
  `created_at` datetime NOT NULL COMMENT 'บันทึกข้อมูลเมื่อไหร่',
  `updated_at` datetime NOT NULL COMMENT 'แก้ไขข้อมูลล่าสุดเมื่อไหร่'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

##
## Table structure for table `semester`
##

CREATE TABLE `semester` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

##
## Dumping data for table `semester`
##

INSERT INTO `semester` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ภาคเรียนที่ 1/2564', 1, '2015-05-24 16:27:34', '2015-05-24 18:16:18');

##
## Table structure for table `users`
##

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `firstname` varchar(50) COLLATE utf8_bin NOT NULL,
  `lastname` varchar(50) COLLATE utf8_bin NOT NULL,
  `user_type` varchar(10) COLLATE utf8_bin NOT NULL DEFAULT 'student',
  `organization_id` int(11) NOT NULL DEFAULT '0',
  `thumbnail` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '/storage/profiles/no-thumbnail.jpg',
  `activated` tinyint(1) NOT NULL DEFAULT '1',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `ban_reason` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `new_password_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `new_password_requested` datetime DEFAULT NULL,
  `new_email` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `new_email_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` datetime NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `major_id` int(11) NOT NULL,
  `minor_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `users` (`id`, `username`, `password`, `email`, `firstname`, `lastname`, `user_type`, `organization_id`, `thumbnail`, `activated`, `banned`, `ban_reason`, `new_password_key`, `new_password_requested`, `new_email`, `new_email_key`, `last_ip`, `last_login`, `created`, `modified`, `major_id`, `minor_id`, `group_id`) VALUES
(1, '', '$2a$08$.sZsPLNvz.m3Jz3CWmW2CewWOa5YAlIiN0mEPFd5LSMij4apsL7fS', 'admin@demo.com', 'admin', 'demo', 'admin', 3, '/storage/profiles/no-thumbnail.jpg', 1, 0, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '2021-05-29 04:02:24', '2016-03-14 10:13:19', '2021-05-29 04:02:24', 0, 0, 0),
(2, '', '$2a$08$.sZsPLNvz.m3Jz3CWmW2CewWOa5YAlIiN0mEPFd5LSMij4apsL7fS', 'student@demo.com', 'student', 'demo', 'student', 3, '/storage/profiles/no-thumbnail.jpg', 1, 0, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '2021-05-27 20:23:37', '2016-03-08 10:39:02', '2021-05-27 17:55:38', 0, 0, 0),
(3, '', '$2a$08$.sZsPLNvz.m3Jz3CWmW2CewWOa5YAlIiN0mEPFd5LSMij4apsL7fS', 'staff@demo.com', 'staff', 'demo', 'staff', 3, '/storage/profiles/no-thumbnail.jpg', 1, 0, NULL, NULL, NULL, NULL, NULL, '49.237.203.62', '2017-03-27 09:41:59', '2016-03-08 23:15:40', '2017-03-26 19:41:59', 0, 0, 0),
(4, '', '$2a$08$.sZsPLNvz.m3Jz3CWmW2CewWOa5YAlIiN0mEPFd5LSMij4apsL7fS', 'advisor@demo.com', 'advisor', 'demo', 'advisor', 0, '/storage/profiles/no-thumbnail.jpg', 1, 0, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '2021-05-28 09:40:17', '2016-03-16 17:40:22', '2021-05-28 09:40:17', 0, 0, 0),
(5, '', '$2a$08$.sZsPLNvz.m3Jz3CWmW2CewWOa5YAlIiN0mEPFd5LSMij4apsL7fS', 'headadvisor@demo.com', 'advisor', 'demo', 'headadvisor', 0, '/storage/profiles/no-thumbnail.jpg', 1, 0, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '2021-05-28 09:40:17', '2016-03-16 17:40:22', '2021-05-28 09:40:17', 0, 0, 0),
(6, '', '$2a$08$.sZsPLNvz.m3Jz3CWmW2CewWOa5YAlIiN0mEPFd5LSMij4apsL7fS', 'headdepartment@demo.com', 'advisor', 'demo', 'headdepartment', 0, '/storage/profiles/no-thumbnail.jpg', 1, 0, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '2021-05-28 09:40:17', '2016-03-16 17:40:22', '2021-05-28 09:40:17', 0, 0, 0),
(7, '', '$2a$08$.sZsPLNvz.m3Jz3CWmW2CewWOa5YAlIiN0mEPFd5LSMij4apsL7fS', 'executive@demo.com', 'advisor', 'demo', 'executive', 0, '/storage/profiles/no-thumbnail.jpg', 1, 0, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '2021-05-28 09:40:17', '2016-03-16 17:40:22', '2021-05-28 09:40:17', 0, 0, 0);

##
## Table structure for table `users_student`
##

CREATE TABLE `users_student` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `firstname_en` varchar(50) NOT NULL,
  `lastname_en` varchar(50) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `college_id` int(11) NOT NULL DEFAULT '1',
  `department_id` int(11) NOT NULL DEFAULT '1',
  `major_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `edulevel` int(11) NOT NULL,
  `religion_title` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `age` int(11) NOT NULL,
  `congenital_disease` varchar(255) NOT NULL,
  `drug_allergy` varchar(255) NOT NULL,
  `blood_type` varchar(255) NOT NULL,
  `experience_work` text NOT NULL,
  `experience_skill` text NOT NULL,
  `experience_intesting` text NOT NULL,
  `experience_status` tinyint(1) NOT NULL DEFAULT '0',
  `experience_marry_name` varchar(255) NOT NULL,
  `experience_marry_cocupation` varchar(255) NOT NULL,
  `emergency_name` varchar(255) NOT NULL,
  `emergency_address` text NOT NULL,
  `emergency_mobile` varchar(50) NOT NULL,
  `hometown_no` varchar(50) NOT NULL,
  `hometown_moo` varchar(50) NOT NULL,
  `hometown_subdistrict` varchar(50) NOT NULL,
  `hometown_district` varchar(50) NOT NULL,
  `hometown_province` varchar(50) NOT NULL,
  `hometown_postcode` varchar(50) NOT NULL,
  `hometown_mobile` varchar(255) NOT NULL,
  `current_address_no` varchar(255) NOT NULL,
  `current_address_moo` varchar(255) NOT NULL,
  `current_address_subdistrict` varchar(255) NOT NULL,
  `current_address_district` varchar(255) NOT NULL,
  `current_address_province` varchar(255) NOT NULL,
  `current_address_postcode` varchar(255) NOT NULL,
  `current_address_mobile` varchar(255) NOT NULL,
  `advisor_id` int(11) NOT NULL,
  `trainer_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `internship_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `email` varchar(255) NOT NULL,
  `organization_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

##
## Table structure for table `user_autologin`
##

CREATE TABLE `user_autologin` (
  `key_id` char(32) COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

##
## Table structure for table `user_signatures`
##

CREATE TABLE `user_signatures` (
  `id` int(11) NOT NULL COMMENT 'รหัสอ้างอิง',
  `img` varchar(100) NOT NULL COMMENT 'รูปภาพ',
  `user_id` int(11) NOT NULL COMMENT 'รหัสผู้ใช้งานระบบ',
  `created_at` datetime NOT NULL COMMENT 'บันทึกข้อมูลเมื่อไหร่',
  `updated_at` datetime NOT NULL COMMENT 'แก้ไขข้อมูลล่าสุดเมื่อไหร่',
  `status` int(1) NOT NULL DEFAULT '1' COMMENT 'สถานะ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

##
## Table structure for table `users_advisor`
##

CREATE TABLE `users_advisor` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `email` varchar(255) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `college_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




##
###################### Indexes for dumped tables ######################################
##

##
## Indexes for table `users_advisor`
##
ALTER TABLE `users_advisor`
  ADD PRIMARY KEY (`id`);
  
##
## Indexes for table `user_advisors`
##
ALTER TABLE `user_advisors`
  ADD PRIMARY KEY (`id`);
  
##
## Indexes for table `ci_sessions`
##
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

##
## Indexes for table `college`
##
ALTER TABLE `college`
  ADD PRIMARY KEY (`id`);

##
## Indexes for table `groups`
##
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `college_id` (`college_id`,`major_id`,`minor_id`);

##
## Indexes for table `homerooms`
##
ALTER TABLE `homerooms`
  ADD PRIMARY KEY (`id`);

##
## Indexes for table `homeroom_activities`
##
ALTER TABLE `homeroom_activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `homeroom_id` (`homeroom_id`,`user_id`),
  ADD KEY `homeroom_id_2` (`homeroom_id`,`user_id`,`major_id`);

##
## Indexes for table `homeroom_activity_items`
##
ALTER TABLE `homeroom_activity_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `homeroom_id` (`homeroom_id`,`homeroom_activity_id`,`student_id`);

##
## Indexes for table `homeroom_obediences`
##
ALTER TABLE `homeroom_obediences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `homeroom_id` (`homeroom_id`,`user_id`),
  ADD KEY `homeroom_id_2` (`homeroom_id`,`user_id`,`major_id`,`minor_id`,`group_id`);

##
## Indexes for table `homeroom_obedience_attachments`
##
ALTER TABLE `homeroom_obedience_attachments`
  ADD PRIMARY KEY (`id`);

##
## Indexes for table `homeroom_risks`
##
ALTER TABLE `homeroom_risks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `homeroom_id` (`homeroom_id`,`user_id`),
  ADD KEY `homeroom_id_2` (`homeroom_id`,`user_id`,`major_id`,`minor_id`,`group_id`);

##
## Indexes for table `homeroom_risk_items`
##
ALTER TABLE `homeroom_risk_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `homeroom_id` (`homeroom_id`,`homeroom_risk_id`,`student_id`);

##
## Indexes for table `login_attempts`
##
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

##
## Indexes for table `majors`
##
ALTER TABLE `majors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `college_id` (`college_id`);

##
## Indexes for table `minors`
##
ALTER TABLE `minors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `college_id` (`college_id`,`major_id`);

##
## Indexes for table `province`
##
ALTER TABLE `province`
  ADD PRIMARY KEY (`id`);

##
## Indexes for table `semester`
##
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id`);


##
## Indexes for table `users`
##
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `major_id` (`major_id`),
  ADD KEY `group_id` (`group_id`);

##
## Indexes for table `users_student`
##
ALTER TABLE `users_student`
  ADD PRIMARY KEY (`id`);

##
## Indexes for table `user_autologin`
##
ALTER TABLE `user_autologin`
  ADD PRIMARY KEY (`key_id`,`user_id`);

##
## Indexes for table `user_signatures`
##
ALTER TABLE `user_signatures`
  ADD PRIMARY KEY (`id`);






##
############################## AUTO_INCREMENT for dumped tables ##############################
##

##
## AUTO_INCREMENT for table `users_advisor`
##
ALTER TABLE `users_advisor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
  
##
## AUTO_INCREMENT for table `college`
##
ALTER TABLE `college`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

##
## AUTO_INCREMENT for table `groups`
##
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสอ้างอิง', AUTO_INCREMENT=2;

##
## AUTO_INCREMENT for table `homerooms`
##
ALTER TABLE `homerooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

##
## AUTO_INCREMENT for table `homeroom_activities`
##
ALTER TABLE `homeroom_activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสอ้างอิง';

##
## AUTO_INCREMENT for table `homeroom_activity_items`
##
ALTER TABLE `homeroom_activity_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสอ้างอิง';

##
## AUTO_INCREMENT for table `homeroom_obediences`
##
ALTER TABLE `homeroom_obediences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสอ้างอิง';

##
## AUTO_INCREMENT for table `homeroom_obedience_attachments`
##
ALTER TABLE `homeroom_obedience_attachments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสอ้างอิง';

##
## AUTO_INCREMENT for table `homeroom_risks`
##
ALTER TABLE `homeroom_risks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

##
## AUTO_INCREMENT for table `homeroom_risk_items`
##
ALTER TABLE `homeroom_risk_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสอ้างอิง';

##
## AUTO_INCREMENT for table `login_attempts`
##
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

##
## AUTO_INCREMENT for table `majors`
##
ALTER TABLE `majors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสอ้างอิง', AUTO_INCREMENT=2;

##
## AUTO_INCREMENT for table `minors`
##
ALTER TABLE `minors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสอ้างอิง', AUTO_INCREMENT=2;

##
## AUTO_INCREMENT for table `province`
##
ALTER TABLE `province`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสอ้างอิง', AUTO_INCREMENT=2;

##
## AUTO_INCREMENT for table `semester`
##
ALTER TABLE `semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

##
## AUTO_INCREMENT for table `users`
##
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

##
## AUTO_INCREMENT for table `users_student`
##
ALTER TABLE `users_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

##
## AUTO_INCREMENT for table `user_signatures`
##
ALTER TABLE `user_signatures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสอ้างอิง', AUTO_INCREMENT=2;















