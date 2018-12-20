-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 14, 2018 lúc 09:28 AM
-- Phiên bản máy phục vụ: 10.1.29-MariaDB
-- Phiên bản PHP: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `laravel_demo`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(10) UNSIGNED NOT NULL,
  `idUser` int(10) UNSIGNED NOT NULL,
  `idTinTuc` int(10) UNSIGNED NOT NULL,
  `NoiDung` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id`, `idUser`, `idTinTuc`, `NoiDung`, `created_at`, `updated_at`) VALUES
(115, 12, 1088, 'hahahaha', '2018-12-10 13:41:57', '2018-12-10 13:41:57'),
(116, 12, 1088, 'cm đầu', '2018-12-10 13:42:45', '2018-12-10 13:42:45'),
(117, 20, 1088, 'hê lô bà con', '2018-12-10 13:43:35', '2018-12-10 13:43:35'),
(118, 19, 1088, 'hê lô ae', '2018-12-10 13:48:41', '2018-12-10 13:48:41'),
(119, 12, 1089, 'xin chào mn', '2018-12-10 13:52:22', '2018-12-10 13:52:22'),
(120, 19, 1089, 'hê lô', '2018-12-10 13:52:42', '2018-12-10 13:52:42'),
(121, 15, 1090, 'hahahaah', '2018-12-10 14:27:20', '2018-12-10 14:27:20'),
(122, 15, 1090, 'hahhaahah', '2018-12-10 14:27:38', '2018-12-10 14:27:38'),
(123, 12, 1090, 'đúng thật, chơi gặp mấy thằng Trung Quốc chỉ muốn out game', '2018-12-10 14:28:47', '2018-12-10 14:28:47'),
(124, 14, 1090, 'nhỉ sư cẩu', '2018-12-10 14:30:47', '2018-12-10 14:30:47'),
(125, 14, 1090, ':))', '2018-12-10 14:32:16', '2018-12-10 14:32:16'),
(126, 15, 1088, 'ai chơi chưa', '2018-12-10 17:52:25', '2018-12-10 17:52:25'),
(127, 15, 1088, 'aaaaaaaaa', '2018-12-11 15:14:59', '2018-12-11 15:14:59'),
(128, 19, 1091, 'first commet', '2018-12-12 09:52:00', '2018-12-12 09:52:00'),
(129, 18, 1091, 'cmt 2', '2018-12-12 10:12:51', '2018-12-12 10:12:51'),
(130, 12, 1091, 'hế lô', '2018-12-12 11:48:29', '2018-12-12 11:48:29'),
(131, 14, 1092, 'first comment hehehehehe', '2018-12-12 12:53:05', '2018-12-12 12:53:05'),
(132, 12, 1089, 'he lô', '2018-12-13 18:58:18', '2018-12-13 18:58:18'),
(133, 12, 1093, 'cmt đầu', '2018-12-13 19:11:33', '2018-12-13 19:11:33'),
(134, 19, 1095, 'hahhaahah', '2018-12-13 19:35:54', '2018-12-13 19:35:54'),
(135, 19, 1093, 'hello', '2018-12-13 20:06:46', '2018-12-13 20:06:46'),
(136, 12, 1092, 'hê lố', '2018-12-14 06:24:44', '2018-12-14 06:24:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `friend`
--

CREATE TABLE `friend` (
  `user_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `friend`
--

INSERT INTO `friend` (`user_id`, `friend_id`) VALUES
(12, 14),
(12, 15),
(12, 19),
(12, 20),
(14, 12),
(14, 19),
(15, 12),
(15, 14),
(15, 20),
(16, 12),
(16, 19),
(16, 20),
(18, 12),
(18, 19),
(19, 12),
(19, 14),
(19, 15),
(19, 20),
(20, 12),
(20, 14),
(20, 15);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `likes`
--

CREATE TABLE `likes` (
  `user_id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `likes`
--

INSERT INTO `likes` (`user_id`, `news_id`) VALUES
(12, 1088),
(12, 1089),
(12, 1090),
(12, 1091),
(12, 1092),
(12, 1094),
(12, 1095),
(12, 1096),
(14, 1088),
(14, 1090),
(14, 1092),
(14, 1093),
(14, 1095),
(14, 1096),
(15, 1088),
(15, 1089),
(15, 1090),
(15, 1091),
(18, 1088),
(19, 1090),
(19, 1092),
(19, 1093),
(19, 1095),
(19, 1096),
(20, 1088);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_06_09_021546_Tao_TheLoai', 2),
('2016_06_09_021610_Tao_LoaiTin', 3),
('2016_06_09_021813_Tao_TinTuc', 4),
('2016_06_09_022526_Tao_Slide', 5),
('2016_06_09_022904_Tao_Comment', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

CREATE TABLE `slide` (
  `id` int(10) UNSIGNED NOT NULL,
  `Ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Hinh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `NoiDung` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `slide`
--

INSERT INTO `slide` (`id`, `Ten`, `Hinh`, `NoiDung`, `link`, `created_at`, `updated_at`) VALUES
(6, 'red dead redemption', 'kFuj_rdr2-officialart-3840x2160.jpg', NULL, 'https://cnet4.cbsistatic.com/img/S8SQuWpVFs4tbspqE-gSUsy8308=/1600x900/2018/05/02/92c85a25-1197-4555-bf25-096c8c85c7ea/rdr2-officialart-3840x2160.jpg', '2018-12-10 13:02:21', '2018-12-10 13:02:21'),
(7, 'spider man ps4', 'Gace_spidey-609x359.jpg', NULL, 'https://cdn2-www.superherohype.com/assets/uploads/2018/09/spidey-609x359.jpg', '2018-12-10 13:03:30', '2018-12-10 13:03:30'),
(8, 'god of war ps4', '7LSa_3080752-9k=.jpg', NULL, 'https://static.gamespot.com/uploads/original/536/5360430/3080752-9k%3D.jpg', '2018-12-10 13:05:03', '2018-12-10 13:05:03'),
(9, 'detroit become human', 'k3PU_detroit-become-human-1.jpg', NULL, 'https://media.motgame.vn/2018/05/vuhoang/detroit-become-human-1.jpg', '2018-12-10 13:09:30', '2018-12-10 13:09:30'),
(10, 'pubg', 'd724_pubg-hero_1527570270606.jpg', NULL, 'https://i.gadgets360cdn.com/large/pubg-hero_1527570270606.jpg', '2018-12-10 13:10:41', '2018-12-10 13:10:41'),
(12, 'garry\'s mod', 'pDRx_garrys-mod.jpg', NULL, 'https://www.topbestalternatives.com/wp-content/uploads/2017/11/garrys-mod.jpg', '2018-12-13 17:19:22', '2018-12-13 17:19:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc`
--

CREATE TABLE `tintuc` (
  `id` int(10) UNSIGNED NOT NULL,
  `TieuDe` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TieuDeKhongDau` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TomTat` text COLLATE utf8_unicode_ci NOT NULL,
  `NoiDung` longtext COLLATE utf8_unicode_ci NOT NULL,
  `Hinh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `NoiBat` int(11) NOT NULL DEFAULT '0',
  `SoLuotXem` int(11) NOT NULL DEFAULT '0',
  `idUser` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tintuc`
--

INSERT INTO `tintuc` (`id`, `TieuDe`, `TieuDeKhongDau`, `TomTat`, `NoiDung`, `Hinh`, `NoiBat`, `SoLuotXem`, `idUser`, `created_at`, `updated_at`) VALUES
(1088, 'Game Pubg', 'game-pubg', 'Một game sinh tồn rất thú vị', '<p>Một game sinh tồn rất thú vị với nhiều loại súng</p>', '', 1, 248, 12, '2018-12-10 13:41:35', '2018-12-14 06:35:45'),
(1089, 'Read Dead Redemption hay quá', 'read-dead-redemption-hay-qua', 'game rất hay rất chân thật', '<p>game làm rất thú vị với nhiều nhiệm vụ, độ chân thực bá đạo</p>', '', 1, 93, 12, '2018-12-10 13:51:48', '2018-12-14 08:21:34'),
(1090, 'pubg mobile rất nhiều hack', 'pubg-mobile-rat-nhieu-hack', 'Rất nhiều nhân vật Trung Quốc hack game và làm xấu đến hình ảnh của game', '<p>rất nhiều game thử Trung Quốc bất chấp hack game và tạo ra hình tượng rất xấu</p>', '', 1, 89, 15, '2018-12-10 14:27:10', '2018-12-14 07:59:10'),
(1091, 'garry\'s mod', 'garrys-mod', 'game kinh dị hài hước', '<p>con game khiến cho mọi người có thể co-op đc với nhau rất funny</p>', 'SJbc_ftiAmJROqyDxayb-800x450-noPad.jpg', 1, 56, 15, '2018-12-12 06:41:02', '2018-12-14 06:36:36'),
(1092, 'Game Call Of Duty 4 có chế độ battle royle', 'game-call-of-duty-4-co-che-do-battle-royle', 'Game đá có chế độ battle royle', '<p>Game<span style=\"background-color:rgb(255, 255, 255); color:rgb(51, 51, 51); font-family:sans-serif,arial,verdana,trebuchet ms; font-size:13px\"> đã có chế độ battle royle với nhiều loại súng phụ kiện</span></p>', 'oO1p_Call_of_Duty_4_Modern_Warfare.jpg', 1, 43, 14, '2018-12-12 08:33:18', '2018-12-14 06:23:11'),
(1093, 'Rea Dead Redemption kết quá buồn', 'rea-dead-redemption-ket-qua-buon', 'Nhân vật chính Arthur cuối cùng đã phải chết một cái chết thương tâm', '<p>Nhân vật chính Arthur cuối cùng đã phải chết một cái chết thương tâm khá là đáng buồn</p>', 'p9Nm_maxresdefault.jpg', 1, 11, 12, '2018-12-13 19:01:36', '2018-12-14 06:40:23'),
(1094, 'người chơi pubg đang ngày càng giảm mạnh', 'nguoi-choi-pubg-dang-ngay-cang-giam-manh', 'số người chơi pubg đã giảm hơn 2/3 so với nhũng năm trước', '<p>game không duy trì được số người chơi cũng là điều đã được dự đoán trước đó do game tồn tại rất nhiều lỗi</p>', 'JOed_top-nhung-hinh-anh-hinh-nen-pub-battleground-dep-nhat-1.png', 1, 2, 12, '2018-12-13 19:26:28', '2018-12-13 19:28:41'),
(1095, 'GAMEK › MOBILE & SOCIAL Liên Quân Mobile: Garena sẽ \"hút máu\" kiểu gì sau vụ trao xe Yamaha R15?', 'gamek-mobile-social-lien-quan-mobile-garena-se-hut-mau-kieu-gi-sau-vu-trao-xe-yamaha-r15-', 'Những thống kê vui xoay quanh chiếc xe Yamaha R15 được Garena trao cho game thủ Liên Quân Mobile may mắn ở tỉnh Long An.', 'Game thủ Liên Quân Mobile may mắn trúng xe Yamaha R15 thông qua tính năng Ô Trỏ Kỳ Diệu đã được Garena công bố chính thức. Đó là bạn Trung Trực, anh này là chủ nick \"linh,ss\". Nick \"linh,ss\" được hệ thống ghi nhận là đã quay trúng xe máy, tương tự như trường hợp của \"đệ pro\" trước đây. Không biết vì lý do gì mà chủ nick này đã đổi tên thành \"cklinh24\" cách đây ít ngày.', 'mAsX_lien-quan-mobile-garena-se-hut-mau-kieu-gi-sau-vu-trao-xe-yamaha-r15-3-15446204803461230402500.png', 0, 16, 19, '2018-12-13 19:35:22', '2018-12-14 06:23:21'),
(1096, 'Black Ops 4 lộ diện 2 map mời và chế độ chơi zombie tuyệt đỉnh', 'black-ops-4-lo-dien-2-map-moi-va-che-do-choi-zombie-tuyet-dinh', 'Đêm qua, người chơi Black Ops 4 ở Úc nhận thấy họ có thể tải xuống và tiến hành chơi thử hai bản đồ multiplayer mới của phiên bản DLC cao cấp sắp ra mắt của Call of Duty: Black Ops 4', '<p>Đêm qua, người chơi Black Ops 4 ở Úc nhận thấy họ có thể tải xuống và tiến hành chơi thử hai bản đồ multiplayer mới của phiên bản DLC cao cấp sắp ra mắt của Call of Duty: Black Ops 4 là Madagascar và Elevation. Một số người chơi đã có cơ hội để đăng đoạn phim footage về cả Madagascar và Elevation lên YouTube.</p>', 'CFkt_1-1544678045083323052945.jpg', 1, 14, 19, '2018-12-13 19:40:31', '2018-12-14 06:36:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quyen` int(11) NOT NULL DEFAULT '0',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `quyen`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(12, 'Vũ Tuấn Anh', 'tuananh77717@gmail.com', 1, '$2y$10$Jl8kGUPDD8G/wY9Bhh7QQe08rXKokOl2KiEwQTpzava6Q8Lrzu3jy', 1, 'G1kCGrr6J1dcvh7tkmtVrThm2w0wRpnsdytPedag3qSULMn1IjZsHL8bzruV', '2018-01-13 13:46:53', '2018-12-13 17:14:48'),
(14, 'Kagura', 'kagura@gmail.com', 1, '$2y$10$Vv/SlPW9F2n9aHcUB512LO7G45bSReeMP5z3qycYRtwjRBHhxa4Vu', 1, '9bd8KF7dkKOUJJkTFkZTCEd81d2TkGHasXMifuZpJSJam782lK6aqmROweiy', '2018-01-18 12:40:42', '2018-12-12 08:28:45'),
(15, '殺生丸', 'inuyasha@gmail.com', 1, '$2y$10$ud9Dkq1dhcSs0yh9YeGque92aXt46FzAmD1Ckven.2zKAROsXvSMa', 1, 'VvN5O5PC6NLOU3cRXP5sNUSznbOWhNe3vnOw7B8kqNpJApBxdsKmLBmnDPEF', '2018-01-18 14:00:46', '2018-12-10 14:08:00'),
(16, 'Kanna', 'kanna@gmai.com', 0, '$2y$10$Zslr3oc5wfvZUajreQ6MeuXi7bhL8JBAFQl7oPaTVLv9elzvIJXNG', 1, 'y7VvK7ZaFEV8Gq8yLGOwSyeNh7OJ7SoppDLzAJxPY6QRUTuDal5gdNuBTfBo', '2018-01-18 15:46:20', '2018-12-14 07:30:13'),
(17, '夢幻の白夜', 'byakuya@gmail.com', 0, '$2y$10$Fj5GEPmnj3ztpsMLTrIumuWWBlIK2G1izQlzJHyqqWOcKt.EAYiB6', 1, '2pugoQ0Ywb3pmfzgzK1ewADIvpZpbmOFXNfGAFgYTV8IqUskun9BOwZ4WN75', '2018-01-18 15:48:47', '2018-12-14 08:26:57'),
(18, '魍魎丸', 'akago@gmail.com', 1, '$2y$10$jG02mxXDYhh1mW8yCSw6b.Hs1RCC6Fg0f6AykWECQPU0FvEdG0pTG', 1, 'fznIielke8RAoRswN2Y3zaV5gZTvkevYJNpkE4JvVy67oEfmQOw5SaNGI8Py', '2018-02-04 12:53:22', '2018-12-12 10:11:25'),
(19, 'dungct', 'dungct@gmail.com', 2, '$2y$10$xp2x8krVyBxyK3g.OM9jauBciZSriz8mK7Atc6yVMMdOCRwRi599W', 0, '90avOQOoWfvVlYNWCyslJAkQCVE19JArsYUIwogXbSPgbtnAAoigDYS1DxU3', '2018-12-09 08:59:33', '2018-12-14 08:27:01'),
(20, 'Đạt Óc', 'datoc123@gmail.com', 0, '$2y$10$Abvx/vuswZ.89Los5UOUgOi932m3N.lkFyROImURjULXVqSq0YWTW', 1, 'IzADbcgbzQrDio9gMJYLyhGzIfi6tfNtzuiZnkVXsvnE69fVQsXgNW5PG6QG', '2018-12-09 10:58:32', '2018-12-14 07:30:23');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_iduser_foreign` (`idUser`),
  ADD KEY `comment_idtintuc_foreign` (`idTinTuc`);

--
-- Chỉ mục cho bảng `friend`
--
ALTER TABLE `friend`
  ADD PRIMARY KEY (`user_id`,`friend_id`);

--
-- Chỉ mục cho bảng `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`user_id`,`news_id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Chỉ mục cho bảng `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1097;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_idtintuc_foreign` FOREIGN KEY (`idTinTuc`) REFERENCES `tintuc` (`id`),
  ADD CONSTRAINT `comment_iduser_foreign` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
