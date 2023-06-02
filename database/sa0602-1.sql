-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 
-- 伺服器版本： 8.0.17
-- PHP 版本： 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `sa`
--

-- --------------------------------------------------------

--
-- 資料表結構 `account`
--

CREATE TABLE `account` (
  `user_id` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_dept` varchar(50) NOT NULL,
  `user_credit` varchar(50) NOT NULL,
  `user_phone` varchar(50) NOT NULL,
  `user_turnover` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_intro` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `account`
--

INSERT INTO `account` (`user_id`, `user_password`, `user_email`, `user_dept`, `user_credit`, `user_phone`, `user_turnover`, `user_name`, `user_intro`) VALUES
('410401648', '147', '410401648@m365.fju.edu.tw', 'im', '5', '0977777777', '0', 'Alvis', '0'),
('410401650', '123', '410401650@m365.fju.edu.tw', 'im', '4', '0900153901', '0', 'Samuel', 'Hi i am Samuel'),
('410402692', '123', '410402692@m365.fju.edu.tw', 'im', '0', '123', '0', 'live', 'You can also call me 老謝');

-- --------------------------------------------------------

--
-- 資料表結構 `bid_info`
--

CREATE TABLE `bid_info` (
  `bid_id` varchar(50) NOT NULL,
  `bid_price` varchar(50) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `item_id` varchar(50) NOT NULL,
  `statement` varchar(50) NOT NULL,
  `rating` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `bid_info`
--

INSERT INTO `bid_info` (`bid_id`, `bid_price`, `user_id`, `item_id`, `statement`, `rating`) VALUES
('BID29154', '300', '410401650', 'ITEM25095', 'completed', 5),
('BID42778', '290', '410402692', 'ITEM48114', 'completed', 5),
('BID58961', '140', '410402692', 'ITEM44982', 'failed', 4),
('BID80554', '500', '410402692', 'ITEM17688', 'accepted', NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `btime`
--

CREATE TABLE `btime` (
  `btime_id` bigint(20) UNSIGNED NOT NULL,
  `btime_name` varchar(50) NOT NULL,
  `bid_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `btime`
--

INSERT INTO `btime` (`btime_id`, `btime_name`, `bid_id`) VALUES
(50, '星期五 17:30', 'BID58961'),
(51, '星期五 18:00', 'BID42778'),
(52, '星期一 16:00~16:30', 'BID29154'),
(53, '星期四 16:30~17:00', 'BID80554');

-- --------------------------------------------------------

--
-- 資料表結構 `fav`
--

CREATE TABLE `fav` (
  `user_id` varchar(50) NOT NULL,
  `item_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `fav`
--

INSERT INTO `fav` (`user_id`, `item_id`) VALUES
('410402692', 'ITEM69952');

-- --------------------------------------------------------

--
-- 資料表結構 `iloc`
--

CREATE TABLE `iloc` (
  `iloc_id` bigint(20) UNSIGNED NOT NULL,
  `iloc_name` varchar(50) NOT NULL,
  `item_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `iloc`
--

INSERT INTO `iloc` (`iloc_id`, `iloc_name`, `item_id`) VALUES
(55, '博達樓廁所旁', 'ITEM94853'),
(56, '利瑪竇雕像旁', 'ITEM44982'),
(57, '國璽樓門口', 'ITEM48114'),
(58, '法學院五星級廁所旁', 'ITEM40809'),
(59, '利瑪竇', 'ITEM87284'),
(60, '利瑪竇1樓', 'ITEM82383'),
(61, '利瑪竇1樓', 'ITEM58620'),
(62, '利瑪竇1樓', 'ITEM25095'),
(64, '濟時樓1樓', 'ITEM80313'),
(66, '濟時樓1樓', 'ITEM17688'),
(67, '進修部1樓', 'ITEM69952'),
(70, '文開樓1樓', 'ITEM79678');

-- --------------------------------------------------------

--
-- 資料表結構 `iphoto`
--

CREATE TABLE `iphoto` (
  `iphoto_id` bigint(20) UNSIGNED NOT NULL,
  `iphoto_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `item_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `iphoto`
--

INSERT INTO `iphoto` (`iphoto_id`, `iphoto_name`, `item_id`) VALUES
(70, 'ITEM94853_0.jpg', 'ITEM94853'),
(71, 'ITEM94853_1.jpg', 'ITEM94853'),
(72, 'ITEM94853_2.jpg', 'ITEM94853'),
(73, 'ITEM44982_0.jpg', 'ITEM44982'),
(74, 'ITEM44982_1.jpg', 'ITEM44982'),
(75, 'ITEM44982_2.jpg', 'ITEM44982'),
(76, 'ITEM48114_0.jpg', 'ITEM48114'),
(77, 'ITEM48114_1.jpg', 'ITEM48114'),
(78, 'ITEM48114_2.jpg', 'ITEM48114'),
(79, 'ITEM40809_0.jpg', 'ITEM40809'),
(80, 'ITEM40809_1.jpg', 'ITEM40809'),
(81, 'ITEM40809_2.jpg', 'ITEM40809'),
(82, 'ITEM87284_0.jpg', 'ITEM87284'),
(83, 'ITEM87284_1.jpg', 'ITEM87284'),
(84, 'ITEM87284_2.jpg', 'ITEM87284'),
(85, 'ITEM82383_0.jpg', 'ITEM82383'),
(86, 'ITEM58620_0.jpg', 'ITEM58620'),
(87, 'ITEM25095_0.jpg', 'ITEM25095'),
(91, 'ITEM80313_0.jpg', 'ITEM80313'),
(94, 'ITEM17688_0.jpg', 'ITEM17688'),
(95, 'ITEM69952_0.jpg', 'ITEM69952'),
(100, 'ITEM79678_0.jpg', 'ITEM79678');

-- --------------------------------------------------------

--
-- 資料表結構 `item_info`
--

CREATE TABLE `item_info` (
  `item_id` varchar(50) NOT NULL,
  `item_price` varchar(50) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `item_info` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `item_isbn` varchar(50) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `statement` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `item_info`
--

INSERT INTO `item_info` (`item_id`, `item_price`, `item_name`, `item_info`, `item_isbn`, `user_id`, `statement`) VALUES
('ITEM40809', '200', '現代統計學', '八五成新，有寫題目', '9384958473', '410401650', ''),
('ITEM44982', '150', '企業概論', '八成新，筆記稍顯凌亂', '9302839483', '410401650', 'sold'),
('ITEM48114', '300', '管理學 實務應用', '九五成新，沒有任何筆記或重點標記。', '8372934722', '410401650', ''),
('ITEM69952', '100', 'APCS大學程式設計先修檢測最強考衝特訓班：C/C++解題攻略', '5成新', '9789864769896', '410401648', ''),
('ITEM79678', '300', 'Hello！C++程式設計 第二版（融合「大學程式設計先修檢測APCS」）', '稍有皺褶，有一點點筆記', '9789864768127', '410401648', ''),
('ITEM80313', '300', '基礎經濟學：思維與運用（5版）', '有寫一點點筆記', '9786263660687', '410401648', ''),
('ITEM87284', '300', '物流', '九成新', '5854599855', '410401650', ''),
('ITEM94853', '250', '管理學 12 edition', '九成新，有重點和筆記', '3748391037', '410401650', '');

-- --------------------------------------------------------

--
-- 資料表結構 `itime`
--

CREATE TABLE `itime` (
  `itime_id` bigint(20) UNSIGNED NOT NULL,
  `itime_name` varchar(50) NOT NULL,
  `item_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `itime`
--

INSERT INTO `itime` (`itime_id`, `itime_name`, `item_id`) VALUES
(166, '星期一 17:00', 'ITEM94853'),
(167, '星期二 17:00', 'ITEM94853'),
(168, '星期六 18:00', 'ITEM94853'),
(169, '星期一 12:30', 'ITEM44982'),
(170, '星期二 14:30', 'ITEM44982'),
(171, '星期五 17:30', 'ITEM44982'),
(172, '星期一 10:30', 'ITEM48114'),
(173, '星期三 13:30', 'ITEM48114'),
(174, '星期五 18:00', 'ITEM48114'),
(175, '星期一 22:00', 'ITEM40809'),
(176, '星期二 21:30', 'ITEM40809'),
(177, '星期六 19:30', 'ITEM40809'),
(178, '星期一 17:00', 'ITEM87284'),
(179, '星期二17:00', 'ITEM87284'),
(180, '星期六 18:00', 'ITEM87284'),
(181, '星期一 16:00~16:30', 'ITEM82383'),
(182, '星期三 13:00~13:30', 'ITEM82383'),
(183, '', 'ITEM82383'),
(184, '星期一 16:00~16:30', 'ITEM58620'),
(185, '星期三 13:00~13:30', 'ITEM58620'),
(186, '', 'ITEM58620'),
(187, '星期一 16:00~16:30', 'ITEM25095'),
(188, '星期三 13:00~13:30', 'ITEM25095'),
(189, '', 'ITEM25095'),
(193, '星期一 13:00~13:30', 'ITEM80313'),
(194, '星期二 11:15~11:30', 'ITEM80313'),
(195, '', 'ITEM80313'),
(199, '星期四 16:30~17:00', 'ITEM17688'),
(200, '星期五 13:00~13:30', 'ITEM17688'),
(201, '', 'ITEM17688'),
(202, '星期四 14:15~14:30', 'ITEM69952'),
(203, '星期五 14:15~14:30', 'ITEM69952'),
(204, '', 'ITEM69952'),
(211, '星期三 14:15~14:30', 'ITEM79678'),
(212, '星期五 8:40~9:00', 'ITEM79678'),
(213, '', 'ITEM79678');

-- --------------------------------------------------------

--
-- 資料表結構 `tag`
--

CREATE TABLE `tag` (
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `tag_name` varchar(50) NOT NULL,
  `item_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `tag`
--

INSERT INTO `tag` (`tag_id`, `tag_name`, `item_id`) VALUES
(53, 'im', 'ITEM94853'),
(54, 'ib', 'ITEM94853'),
(55, 'ba', 'ITEM94853'),
(56, 'im', 'ITEM44982'),
(57, 'ib', 'ITEM44982'),
(58, 'ba', 'ITEM44982'),
(59, 'im', 'ITEM48114'),
(60, 'ba', 'ITEM48114'),
(61, 'stat', 'ITEM48114'),
(62, 'im', 'ITEM40809'),
(63, 'stat', 'ITEM40809'),
(64, 'acc', 'ITEM40809'),
(65, 'im', 'ITEM87284'),
(66, 'ba', 'ITEM87284'),
(67, 'acc', 'ITEM87284'),
(77, 'im', 'ITEM57881'),
(78, 'stat', 'ITEM57881'),
(79, 'ib', 'ITEM57881'),
(80, 'im', 'ITEM80313'),
(81, 'ib', 'ITEM80313'),
(82, 'ba', 'ITEM80313'),
(83, 'im', 'ITEM70246'),
(84, 'ib', 'ITEM70246'),
(85, 'stat', 'ITEM70246'),
(86, 'im', 'ITEM17688'),
(87, 'ib', 'ITEM17688'),
(88, 'stat', 'ITEM17688'),
(89, 'im', 'ITEM69952'),
(90, 'ib', 'ITEM69952'),
(91, 'stat', 'ITEM69952'),
(92, 'im', 'ITEM44387'),
(93, 'ib', 'ITEM44387'),
(94, 'stat', 'ITEM44387'),
(95, 'im', 'ITEM87809'),
(96, 'ib', 'ITEM87809'),
(97, 'ba', 'ITEM87809'),
(98, 'im', 'ITEM79678'),
(99, 'ib', 'ITEM79678'),
(100, 'stat', 'ITEM79678');

-- --------------------------------------------------------

--
-- 資料表結構 `tagop`
--

CREATE TABLE `tagop` (
  `tagop_id` varchar(50) NOT NULL,
  `tagop_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `tagop`
--

INSERT INTO `tagop` (`tagop_id`, `tagop_name`) VALUES
('im', '資訊管理學系'),
('ib', '金融與國際企業學系'),
('ba', '企業管理學系'),
('stat', '統計資訊學系'),
('acc', '會計學系');

-- --------------------------------------------------------

--
-- 資料表結構 `trade_record`
--

CREATE TABLE `trade_record` (
  `trade_id` varchar(50) NOT NULL,
  `trade_time` varchar(50) NOT NULL,
  `trade_location` varchar(50) NOT NULL,
  `trade_price` varchar(50) NOT NULL,
  `item_id` varchar(50) NOT NULL,
  `bid_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 傾印資料表的資料 `trade_record`
--

INSERT INTO `trade_record` (`trade_id`, `trade_time`, `trade_location`, `trade_price`, `item_id`, `bid_id`) VALUES
('TRADE36482', '星期一 16:00~16:30', '利瑪竇1樓', '300', 'ITEM25095', 'BID29154'),
('TRADE38137', '星期五 17:30', '利瑪竇雕像旁', '140', 'ITEM44982', 'BID58961'),
('TRADE60877', '星期五 17:30', '利瑪竇雕像旁', '140', 'ITEM44982', 'BID58961'),
('TRADE67827', '星期五 18:00', '國璽樓門口', '290', 'ITEM48114', 'BID42778');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`user_id`);

--
-- 資料表索引 `bid_info`
--
ALTER TABLE `bid_info`
  ADD PRIMARY KEY (`bid_id`),
  ADD KEY `bid_id_2` (`bid_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `user_id` (`user_id`);

--
-- 資料表索引 `btime`
--
ALTER TABLE `btime`
  ADD PRIMARY KEY (`btime_id`),
  ADD UNIQUE KEY `btime_id` (`btime_id`),
  ADD KEY `bid_id` (`bid_id`);

--
-- 資料表索引 `fav`
--
ALTER TABLE `fav`
  ADD PRIMARY KEY (`user_id`,`item_id`),
  ADD KEY `item_id` (`item_id`);

--
-- 資料表索引 `iloc`
--
ALTER TABLE `iloc`
  ADD PRIMARY KEY (`iloc_id`),
  ADD UNIQUE KEY `iloc_id` (`iloc_id`),
  ADD KEY `item_id` (`item_id`);

--
-- 資料表索引 `iphoto`
--
ALTER TABLE `iphoto`
  ADD PRIMARY KEY (`iphoto_id`),
  ADD UNIQUE KEY `iphoto_id` (`iphoto_id`),
  ADD KEY `item_id` (`item_id`);

--
-- 資料表索引 `item_info`
--
ALTER TABLE `item_info`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `user_id` (`user_id`);

--
-- 資料表索引 `itime`
--
ALTER TABLE `itime`
  ADD PRIMARY KEY (`itime_id`),
  ADD UNIQUE KEY `itime_id` (`itime_id`),
  ADD KEY `item_id` (`item_id`);

--
-- 資料表索引 `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`tag_id`),
  ADD UNIQUE KEY `tag_id` (`tag_id`),
  ADD KEY `item_id` (`item_id`);

--
-- 資料表索引 `trade_record`
--
ALTER TABLE `trade_record`
  ADD PRIMARY KEY (`trade_id`),
  ADD KEY `bid_id` (`bid_id`),
  ADD KEY `item_id` (`item_id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `btime`
--
ALTER TABLE `btime`
  MODIFY `btime_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `iloc`
--
ALTER TABLE `iloc`
  MODIFY `iloc_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `iphoto`
--
ALTER TABLE `iphoto`
  MODIFY `iphoto_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `itime`
--
ALTER TABLE `itime`
  MODIFY `itime_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `tag`
--
ALTER TABLE `tag`
  MODIFY `tag_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `btime`
--
ALTER TABLE `btime`
  ADD CONSTRAINT `btime_ibfk_1` FOREIGN KEY (`bid_id`) REFERENCES `bid_info` (`bid_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- 資料表的限制式 `fav`
--
ALTER TABLE `fav`
  ADD CONSTRAINT `fav_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item_info` (`item_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fav_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `account` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- 資料表的限制式 `item_info`
--
ALTER TABLE `item_info`
  ADD CONSTRAINT `item_info_ibfk_6` FOREIGN KEY (`user_id`) REFERENCES `account` (`user_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- 資料表的限制式 `trade_record`
--
ALTER TABLE `trade_record`
  ADD CONSTRAINT `trade_record_ibfk_1` FOREIGN KEY (`bid_id`) REFERENCES `bid_info` (`bid_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
