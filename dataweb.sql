-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 27, 2023 lúc 01:03 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dataweb`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `Id` int(11) NOT NULL,
  `ProductName` varchar(255) NOT NULL,
  `RegularPrice` varchar(255) NOT NULL,
  `SalePrice` float NOT NULL,
  `CategoryName` varchar(255) NOT NULL,
  `ImageLink` varchar(255) NOT NULL,
  `ProductLink` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`Id`, `ProductName`, `RegularPrice`, `SalePrice`, `CategoryName`, `ImageLink`, `ProductLink`) VALUES
(2, 'Điện Thoại Xiaomi Redmi 8A (2GB/32GB) - Hàng Chính Hãng', '500000', 500000, 'Điện Thoại - Máy Tính Bảng/Điện thoại Smartphone', 'https://salt.tikicdn.com/cache/280x280/ts/product/db/3f/bd/f3118db1403426192e088304f89156eb.jpg', 'https://cellphones.com.vn/xiaomi-redmi-8a.html'),
(3, 'Điện Thoại Vivo Y15 (4GB / 64GB) - Hàng Chính Hãng', '4990000', 4990000, 'Điện Thoại - Máy Tính Bảng/Điện thoại Smartphone', 'https://salt.tikicdn.com/cache/280x280/ts/product/b0/94/87/6e4ceaf54b4adc8021d25dec84ec2027.jpg', 'https://fptshop.com.vn/dien-thoai/vivo-y15'),
(4, 'Điện thoại Wiko View Max (3GB/32GB) - Hàng chính hãng ', '2999000', 2999000, 'Điện Thoại - Máy Tính Bảng/Điện thoại Smartphone', 'https://salt.tikicdn.com/cache/280x280/ts/product/83/d9/5f/e3845212046e2ebb641cfd17e3adba18.png', 'https://fptshop.com.vn/dien-thoai/wiko-view-max'),
(5, 'Điện Thoại Samsung Galaxy A01 (16GB/2GB) - Hàng Chính Hãng', '2790000', 2790000, 'Điện Thoại - Máy Tính Bảng/Điện thoại Smartphone', 'https://salt.tikicdn.com/cache/280x280/ts/product/4d/94/81/431e8b4d197f263a609445dea6e86932.jpg', 'https://cellphones.com.vn/samsung-galaxy-a01.html'),
(6, 'Điện Thoại  Realme C3i (2GB/32G) - Hàng Chính Hãng', '2590000', 2590000, 'Điện Thoại - Máy Tính Bảng/Điện thoại Smartphone', 'https://salt.tikicdn.com/cache/280x280/ts/product/8e/b8/96/fb70ed1a9fc362fb362d14afa79947c2.jpg', 'https://pub.accesstrade.vn/deep_link/4482328498044633048?url=https%3A%2F%2Ftiki.vn%2Fdien-thoai-realme-c3i-2gb-32g-hang-chinh-hang-p52342723.html&utm_source=uit'),
(7, 'Điện Thoại Vsmart Joy 3 - Hàng chính hãng', '3290000', 3290000, 'Điện Thoại - Máy Tính Bảng/Điện thoại Smartphone', 'https://salt.tikicdn.com/cache/280x280/ts/product/f8/be/3d/1bf91f7f46d1fff3f1b8f2e92c7e559d.jpg', 'https://www.thegioididong.com/dtdd/vsmart-joy-3'),
(8, 'Điện Thoại OPPO A5s - Hàng Chính Hãng', '3990000', 3990000, 'Điện Thoại - Máy Tính Bảng/Điện thoại Smartphone', 'https://salt.tikicdn.com/cache/280x280/ts/product/fc/9e/99/0b70ce137107abf42cc44cd66bfa0e83.jpg', 'https://www.nguyenkim.com/oppo-a5s.html'),
(9, 'Điện Thoại Realme C3 - Hàng Chính Hãng', '2990000', 2990000, 'Điện Thoại - Máy Tính Bảng/Điện thoại Smartphone', 'https://salt.tikicdn.com/cache/280x280/ts/product/32/79/a9/d7d3e3f4e009f1ee63400a52cac553ff.jpg', 'https://www.thegioididong.com/dtdd/realme-c3'),
(11, 'Điện Thoại Xiaomi Redmi 7 (2GB/16GB) - Hàng Chính Hãng', '2990000', 2990000, 'Điện Thoại - Máy Tính Bảng/Điện thoại Smartphone', 'https://salt.tikicdn.com/cache/280x280/ts/product/39/c7/7f/f158a3c28221be8cbeee8739edc433ee.jpg', 'https://fptshop.com.vn/dien-thoai/xiaomi-redmi-7-2gb-16gb'),
(12, 'Điện Thoại Realme 3 - Hàng Chính Hãng', '4290000', 4290000, 'Điện Thoại - Máy Tính Bảng/Điện thoại Smartphone', 'https://salt.tikicdn.com/cache/280x280/ts/product/8a/af/e1/5d48c270d1de1f5d86c315ff3fee57c6.jpg', 'https://www.thegioididong.com/dtdd/realme-3'),
(13, 'Điện thoại Xiaomi Redmi 8 - Hàng Chính Hãng', '3790000', 3790000, 'Điện Thoại - Máy Tính Bảng/Điện thoại Smartphone', 'https://salt.tikicdn.com/cache/280x280/ts/product/2d/ba/46/572ae46634210cc1c0569b5e42aca450.png', 'https://www.thegioididong.com/dtdd/xiaomi-redmi-8-64gb'),
(14, 'Điện Thoại OPPO A3s (16GB/2GB) - Hàng Chính Hãng', '3690000', 3690000, 'Điện Thoại - Máy Tính Bảng/Điện thoại Smartphone', 'https://salt.tikicdn.com/cache/280x280/ts/product/cb/e2/06/c818dd07d700a442119008ffa60e026a.jpg', 'https://www.thegioididong.com/dtdd/oppo-a3s'),
(29, 'iPhone 15 Pro Max 256GB | Chính hãng VN/A', '32990000', 32990000, 'Điện Thoại - Máy Tính Bảng/Điện thoại Smartphone', 'https://cdn2.cellphones.com.vn/x/media/catalog/product/i/p/iphone-15-pro-max_3.png', 'https://cellphones.com.vn/iphone-15-pro-max.html'),
(15, 'Điện Thoại Samsung Galaxy Note 4 - Hàng Nhập Khẩu', '8635000', 8635000, 'Điện Thoại - Máy Tính Bảng/Điện thoại Smartphone', 'https://salt.tikicdn.com/cache/280x280/media/catalog/product/2/5/2579948_tinhte_samsung_galaxy_note_4-14_1.jpg', 'https://cellphones.com.vn/galaxy-note-4-cty.html'),
(16, 'Điện Thoại Vivo Y12 (32GB/3GB) - Hàng Chính Hãng', '3390000', 3390000, 'Điện Thoại - Máy Tính Bảng/Điện thoại Smartphone', 'https://salt.tikicdn.com/cache/280x280/ts/product/ab/71/b7/04bc89d204eb1c576e9f1df345c7ae28.png', 'https://www.thegioididong.com/dtdd/vivo-y12s'),
(17, 'Điện Thoại Realme 5 (3GB/32GB) - Hàng Chính Hãng', '3990000', 3990000, 'Điện Thoại - Máy Tính Bảng/Điện thoại Smartphone', 'https://salt.tikicdn.com/cache/280x280/ts/product/40/ea/20/d2f98ff5150c4f8968cc638b1cfae69b.jpg', 'https://www.thegioididong.com/dtdd/realme-5'),
(19, 'Điện Thoại Wiko Y60 (1GB/16GB) - Hàng chính hãng', '990000', 990000, 'Điện Thoại - Máy Tính Bảng/Điện thoại Smartphone', 'https://salt.tikicdn.com/cache/280x280/ts/product/a1/82/d1/ab7fcd12286579804a3191fe40f03388.jpg', 'https://tiki.vn/dien-thoai-wiko-y60-hang-chinh-hang-p37601844.html'),
(20, 'Samsung Galaxy Note 4 32GB Trắng - Hàng nhập khẩu', '8635000', 8635000, 'Điện Thoại - Máy Tính Bảng/Điện thoại Smartphone', 'https://salt.tikicdn.com/cache/280x280/ts/product/b7/8f/49/b13d445962564169c18427a72b06338d.jpg', 'https://cellphones.com.vn/galaxy-note-4-cty.html'),
(21, 'Điện thoại Wiko Jerry 4 - Hàng Chính Hãng', '1790000', 1790000, 'Điện Thoại - Máy Tính Bảng/Điện thoại Smartphone', 'https://salt.tikicdn.com/cache/280x280/ts/product/cb/5b/4a/3f00ddb06b2a0f1747730fbc69c31f44.png', 'https://fptshop.com.vn/dien-thoai/wiko-jerry-4'),
(22, 'Máy Tính Bảng Kindle Fire HD8 (8th) 16GB (2019) - Hàng Chính Hãng', '2990000', 2990000, 'Điện Thoại - Máy Tính Bảng/Máy tính bảng', 'https://salt.tikicdn.com/cache/280x280/ts/product/42/8b/3c/7e5b8c460fe4446ab529b8d7516a7821.jpg', 'https://tiki.vn/may-tinh-bang-kindle-fire-hd8-8th-16gb-2019-hang-chinh-hang-p7184855.html'),
(23, 'Máy Tính Bảng Kindle Fire HD7 Kids Edition - Proof Case (16GB) - Hàng Chính Hãng', '2990000', 2990000, 'Điện Thoại - Máy Tính Bảng/Máy tính bảng', 'https://salt.tikicdn.com/cache/280x280/ts/product/5c/52/cc/cd4fa11102863262b2500c0079207f29.jpg', 'https://tiki.vn/may-tinh-bang-kindle-fire-hd8-kids-edition-proof-case-32gb-hang-chinh-hang-p10069075.html'),
(24, 'Máy Tính Bảng Masstel Tab 10 Plus - Hàng Chính Hãng', '2790000', 2790000, 'Điện Thoại - Máy Tính Bảng/Máy tính bảng', 'https://salt.tikicdn.com/cache/280x280/ts/product/83/ef/3d/cf84079999158443520d4d8962a37839.jpg', 'https://tiki.vn/may-tinh-bang-masstel-tab-10-4g-hang-chinh-hang-p76358835.html'),
(26, 'Máy Đọc Sách Kindle 2018 (8th) - Trắng - Hàng chính hãng', '2790000', 2790000, 'Điện Thoại - Máy Tính Bảng/Máy tính bảng', 'https://salt.tikicdn.com/cache/280x280/media/catalog/product/1/_/1.u5618.d20170823.t183147.991597.jpg', 'https://www.lazada.vn/products/may-doc-sach-kindle-2018-8th-trang-i284484454-s447790318.html?trafficFrom=17449020_303586&laz_trackid=2:mm_150031303_51203008_2010253004:clkgl3t6i1hikm7jkgi6gu&mkttid=clkgl3t6i1hikm7jkgi6gu'),
(27, 'Máy tính bảng Masstel Tab 7 Plus Kidzone - Hàng chính hãng', '1700000', 1700000, 'Điện Thoại - Máy Tính Bảng/Máy tính bảng', 'https://salt.tikicdn.com/cache/280x280/ts/product/2d/d6/24/eb24091b5ec173c1bb99e5540243f238.png', 'https://tiki.vn/may-tinh-bang-masstel-tab-7-plus-hang-chinh-hang-p8033501.html'),
(28, 'Máy Tính Bảng Mobell Tab 7S (8GB) - Hàng Chính Hãng', '1990000', 1990000, 'Điện Thoại - Máy Tính Bảng/Máy tính bảng', 'https://salt.tikicdn.com/cache/280x280/media/catalog/product/1/_/1.u4064.d20170426.t115242.448874.jpg', 'https://www.dienmayxanh.com/may-tinh-bang/mobell-tab-7s');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
