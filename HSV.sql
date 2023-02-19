-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 05, 2023 lúc 05:57 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `btl_php`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(20) NOT NULL,
  `name` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL,
  `parent_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `parent_id`) VALUES
(4, 'Máy khuyếch tán tinh dầu', '', 0),
(5, 'Đèn xông tinh dầu', '', 0),
(9, 'Tinh dầu thơm que gỗ', '', 0),
(12, 'Đèn xông tinh dầu nến', '', 5),
(13, 'Đèn xông tinh dầu điện', '', 5),
(15, 'Tinh dầu nguyên chất', '', 0),
(16, 'Tinh dầu từ thân, lá', '', 15),
(17, 'Tinh dầu từ hoa', '', 15),
(18, 'Tinh dầu từ vỏ, quả , hạt', '', 15),
(19, 'Tinh dầu từ gỗ', '', 15),
(21, 'Nến thơm cao cấp', '', 0),
(23, 'Tinh dầu hỗn hợp', '', 15),
(24, 'Tinh dầu hương nước hoa', '', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `districts`
--

CREATE TABLE `districts` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `parent_id` int(11) NOT NULL,
  `makv` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `districts`
--

INSERT INTO `districts` (`id`, `name`, `parent_id`, `makv`) VALUES
(1, 'Đà Nẵng', 0, '2'),
(2, 'Hà Nội', 0, '1'),
(3, 'Bắc Từ Liêm', 2, '3');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nbl`
--

CREATE TABLE `nbl` (
  `id` int(20) NOT NULL,
  `manbl` varchar(500) NOT NULL,
  `name` varchar(500) NOT NULL,
  `address` varchar(500) NOT NULL,
  `phone` varchar(500) NOT NULL,
  `email` text NOT NULL,
  `description` varchar(4000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nbl`
--

INSERT INTO `nbl` (`id`, `manbl`, `name`, `address`, `phone`, `email`, `description`) VALUES
(1, 'NBL01', 'Siêu Thị TH Mart', 'Hà Nội', '00011111', 'thmart@gmal.com', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ncc`
--

CREATE TABLE `ncc` (
  `id` int(20) NOT NULL,
  `name` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL,
  `address` varchar(500) NOT NULL,
  `email` text NOT NULL,
  `phone` int(20) NOT NULL,
  `mancc` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `ncc`
--

INSERT INTO `ncc` (`id`, `name`, `description`, `address`, `email`, `phone`, `mancc`) VALUES
(1, 'Hương hoa sen', '', 'Hà Nội', 'hhs@gmail.com', 123456, 'NCC01'),
(4, 'Hương hoa nhài', '', 'Hà Nam', 'hhn@gmail.com', 1111, 'NCC02'),
(5, 'Hương hoa hồng', '', 'Duy Tiên', 'hhh@gmail.com', 678, 'NCC03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nsx`
--

CREATE TABLE `nsx` (
  `id` int(20) NOT NULL,
  `name` varchar(500) NOT NULL,
  `address` varchar(500) NOT NULL,
  `phone` varchar(500) NOT NULL,
  `mansx` varchar(500) NOT NULL,
  `description` varchar(4000) NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nsx`
--

INSERT INTO `nsx` (`id`, `name`, `address`, `phone`, `mansx`, `description`, `email`) VALUES
(1, 'Công ty Hương Sắc Việt', 'Hà Nội Việt Nam', '12345', 'NSX01', '“Mua tinh dầu ở đâu tốt và uy tín?” Đây là câu hỏi mà khá nhiều bạn thắc mắc và lên mạng tìm câu trả lời. Để an tâm, hãy đến với Shop Hương Sắc Việt - tinhdaulachampa.net, website chuyên phân phối tinh dầu La Champa, thương hiệu tinh dầu thiên nhiên số một Việt Nam.', 'hsv@gmail.com'),
(3, 'Phutawan Thái Lan', 'Thái Lan', '0011', 'NSX02', '', 'phutawan@gmail.com'),
(5, 'a', 'Hà Nam', '123', 'NSX03', '', 'duchung141202@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetails`
--

CREATE TABLE `orderdetails` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `supply_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orderdetails`
--

INSERT INTO `orderdetails` (`id`, `order_id`, `supply_id`, `quantity`, `price`) VALUES
(39, 19, 2, 2, 100000),
(40, 19, 1, 1, 130000),
(41, 20, 10, 1, 230000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `payment_method` int(11) NOT NULL,
  `transport_method` int(11) NOT NULL,
  `price` float NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `date`, `payment_method`, `transport_method`, `price`, `status`) VALUES
(19, 3, '2022-12-23', 0, 0, 330000, 2),
(20, 1, '2023-01-05', 0, 0, 230000, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `supplies`
--

CREATE TABLE `supplies` (
  `id` int(11) NOT NULL,
  `photo` varchar(500) NOT NULL,
  `name` varchar(500) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name_nsx` varchar(500) NOT NULL,
  `createdate` datetime NOT NULL,
  `in_price` float NOT NULL,
  `out_price` float NOT NULL,
  `weight` float NOT NULL,
  `amount` int(11) NOT NULL,
  `description` text NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `supplies`
--

INSERT INTO `supplies` (`id`, `photo`, `name`, `category_id`, `name_nsx`, `createdate`, `in_price`, `out_price`, `weight`, `amount`, `description`, `content`) VALUES
(1, '1671118166_sp1.jpg', 'TINH DẦU XẢ CHANH TINH CHẤT', 23, 'Phutawan Thái Lan', '0000-00-00 00:00:00', 100000, 130000, 10, 3, '', ''),
(2, '1671118384_sp2.jpg', 'TINH DẦU CẮM QUE DƯA LƯỚI MELON', 9, 'Công ty Hương Sắc Việt', '0000-00-00 00:00:00', 90000, 100000, 5, 1, '<p><em>Tinh dầu thơm ph&ograve;ng cắm que gỗ hương Dưa lưới - Phutawan Melon Reed Diffuser 50ml. Tinh dầu Dưa lưới với m&ugrave;i hương m&aacute;t, dịu nhẹ, ngọt ng&agrave;o gi&uacute;p bạn cảm thấy hạnh ph&uacute;c. Th&iacute;ch hợp đặt trong ph&ograve;ng kh&aacute;ch, ph&ograve;ng l&agrave;m việc, tạo kh&ocirc;ng gian vui vẻ, th&acirc;n thiện..</em></p>\r\n', '<p>Tinh dầu thơm ph&ograve;ng cắm que gỗ hương Dưa lưới - Phutawan Melon Reed Diffuser 50ml. Tinh dầu Dưa lưới với m&ugrave;i hương m&aacute;t, dịu nhẹ, ngọt ng&agrave;o gi&uacute;p bạn cảm thấy hạnh ph&uacute;c. Th&iacute;ch hợp đặt trong ph&ograve;ng kh&aacute;ch, ph&ograve;ng l&agrave;m việc, tạo kh&ocirc;ng gian vui vẻ, th&acirc;n thiện.</p>\r\n'),
(5, '1672932949_sp3.jpg', 'NẾN THƠM AGAYA MÙI TWILIGHT - CHẠNG VẠNG', 19, 'Công ty Hương Sắc Việt', '0000-00-00 00:00:00', 100000, 120000, 10, 2, '<p>Nến thơm m&ugrave;i Twilight - Chạng Vạng của Candle Cup khi đốt như mang đến một ngọn gi&oacute; từ biển đ&ecirc;m, quyến rũ v&agrave; b&iacute; ẩn. Size 100gr (kh&ocirc;ng nắp, bấc cotton) 120.000đ, size 200gr (nắp gỗ, bấc gỗ) 220.000đ.</p>\r\n', ''),
(6, '1672933127_sp4.jpg', 'MÁY KHUẾCH TÁN TULIP TRỨNG 500ML GIÁ RẺ CÓ REMOTE FX034-TW', 4, 'Công ty Hương Sắc Việt', '0000-00-00 00:00:00', 400000, 480000, 1, 1, '<p>M&aacute;y khuếch t&aacute;n tinh dầu Tulip trứng gi&aacute; rẻ FX034-LW của Hương Sắc Việt c&oacute; dung t&iacute;ch nước l&ecirc;n đến 500ml, m&aacute;y c&oacute; sẵn Remote điều khiển từ xa v&agrave; adaper d&ugrave;ng điện 220V.</p>\r\n', ''),
(7, '1672933253_sp5.jpg', 'TINH DẦU TRÀ TRẮNG NGUYÊN CHẤT', 16, 'Công ty Hương Sắc Việt', '0000-00-00 00:00:00', 90000, 100000, 0, 1, '<p>Tinh dầu hoa Tr&agrave; trắng - White Tea Essential oil c&oacute; hương thơm tươi m&aacute;t, dịu ngọt v&ocirc; c&ugrave;ng dễ chịu. Tr&agrave; trắng c&oacute; t&aacute;c dụng l&agrave;m thanh thản đầu &oacute;c, đem lại cảm gi&aacute;c thư gi&atilde;n, tỉnh t&aacute;o.</p>\r\n', ''),
(8, '1672933382_sp6.jpg', 'MÁY KHUẾCH TÁN TINH DẦU MKT20-H CẨM TÚ CẦU HỒNG', 4, 'Công ty Hương Sắc Việt', '0000-00-00 00:00:00', 600000, 650000, 2, 1, '<p>M&aacute;y khuếch t&aacute;n tinh dầu MKT20-H m&agrave;u hồng l&agrave; sản phẩm thuộc series m&aacute;y khuếch t&aacute;n c&oacute; h&igrave;nh hoa cẩm t&uacute; cầu. Đ&acirc;y l&agrave; mẫu m&aacute;y nhỏ gọn v&agrave; xinh xắn th&iacute;ch hợp cho ph&ograve;ng ngủ v&agrave; kh&ocirc;ng gian nhỏ.</p>\r\n', ''),
(9, '1672933511_sp7.jpg', 'TINH DẦU TĨNH TÂM', 23, 'Công ty Hương Sắc Việt', '0000-00-00 00:00:00', 80000, 90000, 1, 2, '<p>Tinh dầu Tĩnh T&acirc;m l&agrave; hỗn hợp tinh dầu đ&agrave;n hương, vỏ quế với cam ngọt v&agrave; hoắc hương. M&ugrave;i hương ngọt ng&agrave;o v&agrave; nồng ấm gi&uacute;p bạn trấn tĩnh tinh thần, giảm căng thẳng, stress v&agrave; bất an.</p>\r\n', ''),
(10, '1672933649_sp8.jpg', 'TINH DẦU GỖ ĐÀN HƯƠNG', 19, 'Công ty Hương Sắc Việt', '0000-00-00 00:00:00', 200000, 230000, 10, 0, '<p>Tinh dầu đ&agrave;n hương Sandalwood Essential Oil c&oacute; m&ugrave;i gỗ thơm nồng, ngọt ng&agrave;o gi&uacute;p con người trấn tĩnh, giảm stress v&agrave; bất an .Theo quan niệm phong thủy, tinh dầu n&agrave;y gi&uacute;p trừ t&agrave; ma, &aacute;m kh&iacute;.</p>\r\n', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `transport`
--

CREATE TABLE `transport` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `phone` int(11) NOT NULL,
  `address` text NOT NULL,
  `code` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `transport`
--

INSERT INTO `transport` (`id`, `name`, `email`, `phone`, `address`, `code`, `price`) VALUES
(1, 'Giao hàng nhanh', 'ghn@gmail.com', 1234, 'Hà Nội', 1, 60000),
(2, 'Giao hàng tiết kiệm', 'ghtk@gmail.com', 456, 'Hà Nam', 2, 30000),
(3, 'Giao hàng hoả tốc', 'ghht@gmail.com', 789, 'Hà Nội', 3, 100000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `fullname` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `phone` text NOT NULL,
  `address` text NOT NULL,
  `is_block` tinyint(4) NOT NULL,
  `permission` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `fullname`, `email`, `phone`, `address`, `is_block`, `permission`) VALUES
(1, 'nva@gmail.com', '202cb962ac59075b964b07152d234b70', 'Nguyễn Văn A', 'nva@gmail.com', '123', 'Hà Nội', 0, 1),
(2, 'nvb@gmail.com', '202cb962ac59075b964b07152d234b70', 'Nguyễn Văn B', 'nvb@gmail.com', '123', 'Hà Nội', 0, 2),
(3, 'nvc@gmail.com', '202cb962ac59075b964b07152d234b70', 'Nguyễn Văn C', 'nvc@gmail.com', '123', 'Hà Nam', 0, 3),
(8, 'hoangduchung1412', '202cb962ac59075b964b07152d234b70', 'Hoang Duc Hung', 'hdh@gmail.com', '123', 'Bắc Ninh', 0, 1),
(9, 'nvd@gmail.com', '202cb962ac59075b964b07152d234b70', 'Nguyễn Văn D', 'nvd@gmail.com', '', '', 0, 4);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nbl`
--
ALTER TABLE `nbl`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ncc`
--
ALTER TABLE `ncc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nsx`
--
ALTER TABLE `nsx`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `supplies`
--
ALTER TABLE `supplies`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `transport`
--
ALTER TABLE `transport`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `nbl`
--
ALTER TABLE `nbl`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `ncc`
--
ALTER TABLE `ncc`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `nsx`
--
ALTER TABLE `nsx`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `supplies`
--
ALTER TABLE `supplies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `transport`
--
ALTER TABLE `transport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
