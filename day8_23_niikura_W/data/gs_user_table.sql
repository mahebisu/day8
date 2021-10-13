-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:3306
-- 生成日時: 2021-10-13 09:58:07
-- サーバのバージョン： 5.7.24
-- PHP のバージョン: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gs_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_user_table`
--

CREATE TABLE `gs_user_table` (
  `unique_code` int(12) NOT NULL,
  `fname` varchar(64) NOT NULL,
  `lname` varchar(64) NOT NULL,
  `mail1` varchar(128) NOT NULL,
  `mail2` varchar(128) NOT NULL,
  `address1` text NOT NULL,
  `address2` text NOT NULL,
  `address3` text NOT NULL,
  `address4` text NOT NULL,
  `phone` varchar(11) NOT NULL,
  `phone_hyoji` varchar(13) NOT NULL,
  `lid` varchar(128) NOT NULL,
  `lpw` varchar(64) NOT NULL,
  `kanri_fig` int(1) NOT NULL DEFAULT '0',
  `life_fig` int(1) NOT NULL DEFAULT '0',
  `reg_date` datetime NOT NULL,
  `up_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `gs_user_table`
--

INSERT INTO `gs_user_table` (`unique_code`, `fname`, `lname`, `mail1`, `mail2`, `address1`, `address2`, `address3`, `address4`, `phone`, `phone_hyoji`, `lid`, `lpw`, `kanri_fig`, `life_fig`, `reg_date`, `up_date`) VALUES
(1, '田中', 'あああ', 'tanaka', 'gmail.com', '北海道', 'あああ', 'いいい', 'ううう', '08044445555', '080-4444-5555', 'id1', 'pass', 1, 1, '2021-10-04 22:22:06', '2021-10-04 22:22:06'),
(2, '山田', 'ううう', 'aaa', 'uuu', '北海道', 'あああ', 'いいい', 'ううう', '09011112222', '090-1111-2222', 'id2', 'pass', 0, 0, '2021-10-05 21:49:39', '2021-10-06 00:15:56'),
(3, '山田', 'ううう', 'aaa', 'uuu', '北海道', 'あああ', 'いいい', 'ううう', '09011112222', '090-1111-2222', 'id3', 'pass', 0, 1, '2021-10-05 23:29:50', '2021-10-05 23:29:50');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_user_table`
--
ALTER TABLE `gs_user_table`
  ADD PRIMARY KEY (`unique_code`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `gs_user_table`
--
ALTER TABLE `gs_user_table`
  MODIFY `unique_code` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
