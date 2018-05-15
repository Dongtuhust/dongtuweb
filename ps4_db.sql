-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 15, 2018 lúc 04:26 AM
-- Phiên bản máy phục vụ: 10.1.31-MariaDB
-- Phiên bản PHP: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ps4_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `category_id` int(2) NOT NULL,
  `category_name` varchar(20) DEFAULT NULL,
  `image_uri` varchar(45) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `image_uri`, `title`) VALUES
(1, 'Bắn súng', '../image/img1.jpg', 'Một trải nghiệm góc nhìn'),
(2, 'Thể thao', '../image/img7.jpg', 'Sport is life'),
(3, 'Đối kháng', '../image/img8.jpg', 'Chiến đấu để sống sót'),
(4, 'Nhập vai', '../image/img6.jpg', 'Hòa mình vào các siêu anh hùng'),
(5, 'Kinh dị', '../image/img5.jpg', 'Nỗi sợ hãi bao chùm');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `distributor`
--

CREATE TABLE `distributor` (
  `distributor_id` int(5) NOT NULL,
  `distributor_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `distributor`
--

INSERT INTO `distributor` (`distributor_id`, `distributor_name`) VALUES
(1, 'Nintendo'),
(2, 'Sony Entertainment'),
(3, 'WB Games'),
(4, 'Capcom'),
(5, 'Konami'),
(6, 'Rare');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_customer`
--

CREATE TABLE `order_customer` (
  `order_id` int(10) NOT NULL,
  `customer_name` varchar(30) NOT NULL,
  `customer_add` varchar(50) NOT NULL,
  `customer_phone` int(10) NOT NULL,
  `total_money` int(10) NOT NULL,
  `order_date` datetime NOT NULL,
  `payment` varchar(20) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `note` varchar(50) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `order_customer`
--

INSERT INTO `order_customer` (`order_id`, `customer_name`, `customer_add`, `customer_phone`, `total_money`, `order_date`, `payment`, `gender`, `note`, `status`) VALUES
(55718, 'Nguyễn VĂn A', 'Hàng Trống', 14546463, 3800000, '2018-05-02 17:13:34', 'ATM', 'Nữ', 'piipas ád', 'Bị hủy'),
(185807, 'Việt Tiệp', 'Timecity ', 15656654, 3750000, '2018-05-10 23:29:35', 'COD', 'Nam', 'Giao hàng sau giờ hành chính', 'Đang chờ'),
(218292, 'Nguyễn Văn Thanh', '123 Giải Phóng Hà Nội', 1546549876, 5600000, '2018-05-01 19:34:27', 'COD', 'Nam', 'aqwuoieupoq kf', 'Bị hủy'),
(342849, 'Nguyễn Đông Tư', '29 Khương Hạ', 169696969, 2100000, '2018-05-10 21:30:24', 'COD', 'Nam', 'Giao hàng từ 17h đến 20h hằng ngày', 'Đang chờ'),
(390582, 'Nguyễn Hà Đông', '25 Trần Phú Hà Nội', 1684527896, 6550000, '2018-05-15 09:22:32', 'ATM', 'Nam', 'giao hàng sau 17h', 'Đang chờ'),
(444284, 'Lưu Văn Vũ', 'kim ngu, hai ba trung', 1649361661, 2500000, '2018-05-11 08:50:43', 'COD', 'Nam', 'Giao T2 -> T6', 'Đang chờ'),
(451718, 'Lưu Văn Vũ', '465 Thái Hà', 2147483647, 3150000, '2018-05-01 20:45:00', 'COD', 'Nam', 'asdsa gdsfgsdaf', 'Bị hủy'),
(558525, 'SAD', 'saD', 2147483647, 3300000, '2018-05-03 09:51:50', 'COD', 'Nam', 'ÁDASD', 'Đã giao'),
(601155, 'Nguyễn Văn Thiện', '134 Hai Bà Trưng', 1468796663, 1500000, '2018-05-01 19:31:32', 'COD', 'Nam', '', 'Đã giao'),
(673970, 'Dương Văn Huy', '465 Tôn Thất Tùng Hà nôi', 2147483647, 5500000, '2018-05-02 17:07:40', 'ATM', 'Nam', 'E a;skd; ac sfgaa', 'Đã giao'),
(682660, 'Nguyễn Thị Thiết', '23 Minh Khai Hà nôi', 2147483647, 2100000, '2018-05-10 17:23:38', 'ATM', 'Nữ', 'Giao hàng vào lúc 17h->20h hằng ngày', 'Đang chờ'),
(841070, 'Nguyễn Huy Hàng ', '13 Trần Phú', 1646498, 11100000, '2018-05-01 19:16:53', 'COD', 'Nam', 'Giao hàng trong 3 ngày', 'Đã giao'),
(874693, 'Nguyễn Đông Tư', '21 Thái Hà Hà nôik', 1656598654, 7200000, '2018-05-03 10:33:37', 'ATM', 'Nam', 'Giao hàng sau giờ hành chính', 'Đã giao'),
(993369, 'Trần Thị Thảo', '25 Trương Định', 656512, 1300000, '2018-05-07 09:49:07', 'ATM', 'Nữ', '', 'Đã giao');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_old_product`
--

CREATE TABLE `order_old_product` (
  `order_id` int(10) NOT NULL,
  `seller` varchar(30) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `total_money` int(10) NOT NULL,
  `customer_name` varchar(30) NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `customer_add` varchar(50) NOT NULL,
  `customer_phone` int(10) NOT NULL,
  `order_date` datetime NOT NULL,
  `payment` varchar(20) DEFAULT NULL,
  `note` varchar(50) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `order_old_product`
--

INSERT INTO `order_old_product` (`order_id`, `seller`, `product_name`, `total_money`, `customer_name`, `gender`, `customer_add`, `customer_phone`, `order_date`, `payment`, `note`, `status`) VALUES
(113095, 'VietTiep', 'Đột kích ', 800000, 'Văn Quyền', 'Nam', 'Hải phòng', 15646546, '2018-05-10 23:33:49', 'ATM', 'ads', 'Đang chờ'),
(265996, 'Dongtu', 'Couter Stricke', 800000, 'Nguyễn Đông Tư', 'Nam', '29 Khương Hạ', 1649361661, '2018-05-06 22:13:19', 'COD', '', 'Đã giao'),
(517761, 'Dongtu', 'Đột kích ', 900000, 'Lưu Văn Vũ', 'Nam', 'kim nguu, hai ba trung', 1649361661, '2018-05-11 08:52:53', 'COD', 'Giao T2 ->T6', 'Đang chờ'),
(522940, 'VietTiep', 'Đột kích ', 800000, 'Văn Quyền', 'Nam', 'Hải phòng', 15646546, '2018-05-10 23:33:37', 'ATM', 'ads', 'Đã giao'),
(688137, 'Dongtu', 'Far Cry 5', 900000, 'Lưu Văn Vũ', 'Nam', 'hai bà trưng', 1654651321, '2018-05-07 09:46:10', 'ATM', '', 'Bị hủy');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_product`
--

CREATE TABLE `order_product` (
  `order_id` int(10) NOT NULL,
  `product_name` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `quantity` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `order_product`
--

INSERT INTO `order_product` (`order_id`, `product_name`, `username`, `quantity`) VALUES
(841070, 'Layers of fear', 'Nguyễn Huy Hàng ', 3),
(841070, 'Amazing Spiderman', 'Nguyễn Huy Hàng ', 1),
(841070, 'Resident Evil 7', 'Nguyễn Huy Hàng ', 6),
(601155, 'Layers of fear', 'Nguyễn Văn Thiện', 1),
(601155, 'Mortal Kombat X', 'Nguyễn Văn Thiện', 1),
(218292, 'Resident Evil 7', 'Nguyễn Văn Thanh', 1),
(218292, 'Fifa 17', 'Nguyễn Văn Thanh', 4),
(218292, 'Watch Dogs 2', 'Nguyễn Văn Thanh', 1),
(451718, 'Hear they lie', 'Lưu Văn Vũ', 1),
(451718, 'Need for speed', 'Lưu Văn Vũ', 3),
(673970, 'The Division', 'Dương Văn Huy', 1),
(673970, 'Mortal Kombat X', 'Dương Văn Huy', 5),
(673970, 'Let It Die', 'Dương Văn Huy', 1),
(55718, 'Amazing Spiderman', 'Nguyễn VĂn A', 1),
(55718, 'Resident Evil 7', 'Nguyễn VĂn A', 2),
(558525, 'Layers of fear', 'SAD', 1),
(558525, 'Resident Evil 7', 'SAD', 1),
(558525, 'Detroit', 'SAD', 2),
(874693, 'Amazing Spiderman', 'Nguyễn Đông Tư', 3),
(874693, 'The Division', 'Nguyễn Đông Tư', 4),
(874693, 'Let It Die', 'Nguyễn Đông Tư', 1),
(993369, 'Resident Evil 7', 'Trần Thị Thảo', 1),
(682660, 'Layers of fear', 'Nguyễn Thị Thiết', 2),
(682660, 'The Division', 'Nguyễn Thị Thiết', 1),
(342849, 'Layers of fear', 'Nguyễn Đông Tư', 2),
(342849, 'The Division', 'Nguyễn Đông Tư', 1),
(185807, 'Need for speed', 'Việt Tiệp', 3),
(185807, 'Yakuza', 'Việt Tiệp', 1),
(444284, 'Hear they lie', 'Lưu Văn Vũ', 2),
(444284, 'Resident Evil 7', 'Lưu Văn Vũ', 1),
(390582, 'Layers of fear', 'Nguyễn Hà Đông', 1),
(390582, 'The Division', 'Nguyễn Hà Đông', 2),
(390582, 'Need for speed', 'Nguyễn Hà Đông', 1),
(390582, 'Yakuza', 'Nguyễn Hà Đông', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `product_id` int(10) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `price_buy` int(10) NOT NULL,
  `description` varchar(500) NOT NULL,
  `product_image` varchar(40) NOT NULL,
  `detail_image` varchar(20) NOT NULL,
  `category_id` int(10) NOT NULL,
  `distributor_name` varchar(30) NOT NULL,
  `quantity` int(5) DEFAULT '1',
  `product_status` varchar(10) NOT NULL,
  `updatetime` date NOT NULL,
  `purcharse_number` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `price_buy`, `description`, `product_image`, `detail_image`, `category_id`, `distributor_name`, `quantity`, `product_status`, `updatetime`, `purcharse_number`) VALUES
(1, 'Couter Stricke', 1200000, 'Counter-Strike đã làm ngành công nghiệp game bất ngờ khi MOD không thành công trở thành trò chơi hành động trực tuyến được chơi nhiều nhất trên thế giới gần như ngay lập tức sau khi phát hành vào tháng 8 năm 1999', '../image/img1.jpg', '../image/img1', 1, 'Sony', 135, 'Hot', '0000-00-00', 0),
(2, 'Layers of fear', 700000, 'Đắm chìm trong tâm trí của một nghệ sĩ điên và khám phá những bí ẩn của sự điên rồ của mình, đi qua hành lang là thực hiện chuyển đổi biệt thự Victorian sâu rộng và liên tục. Trải nghiệm những tầm nhìn, nỗi sợ hãi và lo lắng của một họa sĩ thiên tài và hoàn thành kiệt tác, mà nghệ sĩ đã phải vật lộn. ', '../image/img2.jpg', '../image/img2', 5, 'Capcom', 124, 'Mới', '0000-00-00', 1),
(3, 'Amazing Spiderman', 1200000, 'The Amazing Spider-Man 2 là cơ hội của Peter Parker để tỏa sáng. Danh tính của Spider-Man, tất cả quá xấu hổ được dành nhiều thời gian hơn trong sự chú ý của PlayStation 4, điều này có nghĩa là cũng như việc đánh đu, slinging và ngăn chặn tội phạm, bạn sẽ được đào sâu vào nền tảng của một số siêu sao xuất sắc nhất của Marvel, kẻ thù và làm sáng tỏ một âm mưu đe dọa chìm đắm Manhattan.', '../image/img3.jpg', '../image/img3', 4, 'Konami', 65, 'Cũ', '0000-00-00', 0),
(4, 'Hear they lie', 600000, 'Hear they Lie vận chuyển bạn đến một thế giới đáng sợ mà từ đó bạn không thể trốn thoát. Khám phá một thành phố ác mộng, nơi sinh sống của những sinh vật lạ lẫm, độc ác trong trò chơi kinh dị đầu tiên phá vỡ tính tương thích với PlayStation VR.   Cuộc đấu tranh để tồn tại khi bạn vật lộn với cuộc sống hoặc cái chết lựa chọn đạo đức và cố gắng khám phá những bí ẩn của người phụ nữ màu vàng.', '../image/img4.jpg', '../image/img4', 5, 'Sony', 30, 'Hot', '0000-00-00', 0),
(5, 'Resident Evil 7', 1300000, 'Tiếp theo Resident Evil 5 và Resident Evil 6 , Resident Evil 7 sẽ trở lại với rễ kinh dị sống còn của franchise, với sự nhấn mạnh về thăm dò', '../image/img5.jpg', '../image/img5', 5, 'WB Games', 142, 'Hot', '0000-00-00', 0),
(6, 'The Division', 700000, 'Bộ phận The DivisionTM của Tom Clancy là một trải nghiệm RPG thực tế khiến cho thể loại này trở thành một thiết lập quân sự hiện đại lần đầu tiên.', '../image/img6.jpg', '../image/img6', 4, 'Rare', 171, 'Mới', '0000-00-00', 2),
(7, 'Need for speed', 850000, 'Need For Speed phiên bản 2015 hứa hẹn sẽ là một game thỏa mãn cơn khát tốc độ của cộng đồng game thủ, vì game sẽ mang trở lại những yếu tố làm nên tên tuổi của dòng game Need for Speed từ xưa tới nay.', '../image/img7.jpg', '../image/img7', 2, 'Rare', 217, 'Mới', '0000-00-00', 1),
(8, 'Mortal Kombat X', 800000, 'Mortal Kombat X là phần mới nhất của dòng game song đấu đầy bạo lực của NetherRealm Studios. Đây là phiên bản thứ 10 của cả dòng game dự kiến sẽ ra mắt trên mọi hệ máy vào tháng 4 năm 2015 với dàn nhân vật được bổ sung thêm nhằm thay máu cho game.', '../image/img8.jpg', '../image/img8', 3, 'Sony', 179, 'Cũ', '0000-00-00', 0),
(9, 'Fifa 17', 900000, 'FIFA 17 thu hút   bạn trong những trải nghiệm bóng đá đích thực bằng cách tận dụng sự tinh tế của một engine game mới, trong khi giới thiệu bạn với những người chơi bóng đá đầy chiều sâu và cảm xúc và đưa bạn đến những thế giới hoàn toàn mới chỉ có thể truy cập được trong trò chơi. Đổi mới hoàn toàn theo cách mà người chơi nghĩ và di chuyển, tương tác vật lý với đối thủ và thực hiện tấn công cho phép bạn sở hữu mọi khoảnh khắc trên sân.', '../image/img9.jpg', '../image/img9', 2, 'Capcom', 336, 'Hot', '0000-00-00', 0),
(10, 'Street Fighter V', 900000, 'Street Fighter V là phần thứ năm trong seri game chiến đấu Street Fighter của Nhật Bản ra mắt lần đầu vào năm 1987. Tương tự như các phiên bản Street Fighter trước, nó được phát triển bởi Capcom. Mặc dù thực tế cho thấy rằng có rất ít sự khác biệt trong hình ảnh giữa Street Fighter V và các game trước của seri, Street Fighter V có yêu cầu hệ thống hơi lớn hơn. Tuy nhiên, sự khác biệt là không quá lớn để yêu cầu các bạn phải có một máy tính cao cấp. Game sẽ có 16 nhân vật lúc khởi động, trong đó ', '../image/img10.jpg', '../image/img10', 3, 'WB Games', 98, 'Cũ', '0000-00-00', 0),
(11, 'Watch Dogs 2', 700000, 'Nhân vật chính của chúng ta không hề ngạc nhiên vẫn tiếp tục là một hacker sừng sỏ có thể kiểm soát gần như mọi hoạt động trong thành phố chỉ bằng thao tác trên chiếc điện thoại thông minh. Dù vậy Aiden Pearce đã rời khỏi cuộc chơi để nhường chỗ cho Marcus Holloway - một người Mỹ da màu sinh sống ở vùng vịnh Oakland, San Francisco.', '../image/img11.jpg', '../image/img11', 1, 'Sony', 95, 'Cũ', '0000-00-00', 0),
(12, 'Let It Die', 800000, 'Chiến đấu để đạt được vị trí cao nhất trong hành động sống còn hỗn loạn và bong bóng này đang diễn ra tự do để chơi đến một cấp độ hoàn toàn mới. Bắt đầu cuộc hành trình của bạn trong bộ đồ lót của bạn và sống sót bằng bất kỳ phương tiện cần thiết trong khi tham khảo ý kiến ​​từ Chú chim, một máy gặt ván trượt', '../image/img12.jpg', '../image/img12', 5, 'Konami', 178, 'Cũ', '0000-00-00', 0),
(13, 'Yakuza', 1200000, 'Chiến đấu như địa ngục qua Tokyo và Osaka với nhân vật chính Kazuma Kiryu và hàng loạt Goro Majima bình thường. Chơi với tư cách là Kazuma Kiryu và khám phá cách anh ta thấy mình đang ở trong một thế giới rắc rối khi một bộ sưu tập nợ đơn giản trở nên sai lầm và dấu ấn của anh ấy đã bị sát hại. Sau đó, bước vào đôi giày bạc của Goro Majima và khám phá cuộc sống ', '../image/yakuza.jpg', '../image/yakuza', 4, 'Sony', 119, 'Mới', '0000-00-00', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_user`
--

CREATE TABLE `product_user` (
  `product_id` int(10) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `price_buy` int(10) NOT NULL,
  `price_rent` int(10) NOT NULL,
  `description` varchar(500) NOT NULL,
  `product_img` varchar(50) NOT NULL,
  `category` varchar(30) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `notification` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product_user`
--

INSERT INTO `product_user` (`product_id`, `product_name`, `price_buy`, `price_rent`, `description`, `product_img`, `category`, `user_email`, `status`, `notification`) VALUES
(1, 'Couter Stricke', 800000, 300000, 'Tựa game bắn súng cực hót cho ae , mình mới mua đầu tết vẫn còn mới nguyên hộp còn bảo hành đến tháng 2/2019 ', '../image/img1.jpg', 'Bắn súng', 'dongtu.hust@gmail.com', '97%', 'Đã bán'),
(2, 'Layers of fear', 700000, 300000, 'Đĩa game Layers of fear thể loại kịnh dị rất đáng để sở hữu mua mới 1tr bán lại 700k hoặc thuê vs giá 300k 1 tuần , tình trạng hơi xước nhẹ hộp còn nguyên', '../image/img2.jpg', 'Kinh dị', 'hai@gmail.com', '86%', NULL),
(3, 'Amazing Spiderman', 900000, 400000, 'Dành cho ae nào mê các siêu anh hùng , đĩa Amazing spiderman cực hot giá thị trường 1tr3 bán lại 900k còn nguyên hộp đĩa vẫn mới còn bảo hành đến tháng 4/2019', '../image/img3.jpg', 'Phiêu lưu', 'chudiep@gmail.com', '95%', NULL),
(6, 'The Division', 800000, 200000, 'Đĩa game ps4 cực hot nửa đầu năm 2017, giá thị trường 1tr3 bán lại 800k còn nguyên hộp đĩa vẫn mới còn bảo hành đến tháng 5/2019', '../image/img6.jpg', 'Nhập vai', 'dongtugg@gmail.com', '91%', NULL),
(7, 'Need for speed', 899000, 250000, 'Dành cho ae yêu tốc độ , đĩa Need for speed cực hot giá thị trường 1tr2 bán lại 899k còn nguyên hộp đĩa vẫn mới còn bảo hành đến tháng 4/2019', '../image/img7.jpg', 'Thể thao', 'ducmung@gmail.com', '87%', NULL),
(8, 'Mortal Kombat X', 799000, 999999999, 'Mortal combat X cực hot cho ae giá siêu rẻ, mình mua mới 1tr5 bán lại 799k còn nguyên hộp đĩa hơi xước nhưng chơi vẫn ngon mình k cho thuê nhé', '../image/img8.jpg', 'Đối kháng', 'duongson@gmail.com', '76%', NULL),
(9, 'Fifa 17', 800000, 300000, 'Fifa 17 đồ họa cự đẹp, giá thị trường 1tr1 bán lại 800k còn nguyên hộp đĩa vẫn mới còn bảo hành đến tháng 4/2019', '../image/img9.jpg', 'Thể thao', 'luuvu@gmail.com', '99%', NULL),
(11, 'Watch Dogs 2', 700000, 350000, 'Nhân vật chính của chúng ta không hề ngạc nhiên vẫn tiếp tục là một hacker sừng sỏ có thể kiểm soát gần như mọi hoạt động trong thành phố chỉ bằng thao tác trên chiếc điện thoại thông minh. Dù vậy Aiden Pearce đã rời khỏi cuộc chơi để nhường chỗ cho Marcus Holloway - một người Mỹ da màu sinh sống ở vùng vịnh Oakland, San Francisco.', '../image/img11.jpg', 'Bắn súng', '20156827@student.hust.edu.vn', '95%', NULL),
(12, 'Far Cry 5', 900000, 300000, 'Far Cry 5 cực hot cho ae giá mua 1tr2 bán lại 900k đầy đủ hộp giấy bảo hành đến tháng 9/2019', '../image/product_user/farcry.jpg', 'Phiêu lưu', 'dongtu.hust@gmail.com', '96%', NULL),
(13, 'Bio Shock ', 1000000, 300000, 'Tựa game bắn súng cực hot cho ae , ra đời được 5 năm nhưng sức hút k hề giảm mua mới 1tr5 bán lại 1tr hình thức hơi xước nhẹ nhưng vẫn chơi ngon lành ', '../image/product_user/bioshock.jpg', 'Bắn súng', 'dongtu.hust@gmail.com', '86%', NULL),
(14, 'Đột kích ', 900000, 300000, 'adjsad', '../image/product_user/dotkich.jpg', 'Bắn súng', 'dongtu.hust@gmail.com', '96%', 'Đã bán');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `createdate` datetime NOT NULL,
  `is_block` tinyint(4) NOT NULL DEFAULT '0',
  `permision` tinyint(4) NOT NULL DEFAULT '0',
  `address` varchar(50) NOT NULL,
  `phone` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `createdate`, `is_block`, `permision`, `address`, `phone`) VALUES
(8, 'Dongtu', 'anhlaso1', 'dongtu.hust@gmail.com', '2018-03-18 10:00:38', 0, 0, 'Hanoi', 1649361661),
(9, 'Hoang', 'anhlaso1', 'huyhoang@gmail.com', '2018-03-18 10:06:11', 0, 0, 'Hanoi', 1),
(11, 'Mung', 'anhlaso1', 'ducmung@gmail.com', '2018-03-18 10:13:27', 1, 0, 'Huyn', 22233),
(12, 'ChuDiep', 'anhlaso1', 'chudiep@gmail.com', '2018-03-19 21:43:09', 0, 0, 'Hanoi', 2147483647),
(13, 'Dongtu123', 'anhlaso1', 'dongtubk@gmail.com', '2018-03-19 21:47:13', 0, 0, 'Hanoi', 0),
(14, 'Thiện', 'dongthien', 'dongthien@gmail.com', '2018-03-19 21:49:31', 0, 0, 'Hung Yen', 1),
(15, 'Admin', 'admin', 'admin@gmail.com', '2018-03-19 22:14:53', 0, 1, 'Hanoi', 321313),
(16, 'vanthanh', 'anhlaso1', 'vanthanh@gmail.com', '2018-03-20 10:09:31', 0, 0, 'Hanoi', 1649361661),
(17, 'hai', 'dongtu', 'hai@gmail.com', '2018-03-25 22:47:17', 0, 0, 'hanoi', 2),
(18, 'DuongSon', 'anhlaso1', 'duongson@gmail.com', '2018-05-03 17:10:48', 0, 0, 'Văn Giang Hưng Yên', 15656656),
(19, 'dongtugg', 'anhlaso1', 'dongtugg@gmail.com', '2018-05-03 17:12:17', 0, 0, 'Yên Mỹ Hưng Yên', 2147483647),
(20, 'LuuVu', 'anhlaso1', 'luuvu@gmail.com', '2018-05-03 17:13:02', 0, 0, 'Sóc Sơn', 564542313),
(21, 'StudentBK', 'anhlaso1', '20156827@student.hust.edu.vn', '2018-05-03 17:14:15', 0, 0, 'Hà Tĩnh', 15646332),
(22, 'DucHuy97', 'anhlaso1', 'duchuy@gmail.com', '2018-05-03 17:15:14', 1, 0, 'Nghệ An', 2147483647),
(23, 'VietTiep', 'anhlaso2', 'viettiep@gmail.com', '2018-05-10 23:19:59', 0, 0, 'Hà nội', 1613465);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `distributor`
--
ALTER TABLE `distributor`
  ADD PRIMARY KEY (`distributor_id`);

--
-- Chỉ mục cho bảng `order_customer`
--
ALTER TABLE `order_customer`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `order_old_product`
--
ALTER TABLE `order_old_product`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `order_product`
--
ALTER TABLE `order_product`
  ADD KEY `order_id` (`order_id`),
  ADD KEY `name` (`product_name`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `id` (`product_id`);

--
-- Chỉ mục cho bảng `product_user`
--
ALTER TABLE `product_user`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `distributor`
--
ALTER TABLE `distributor`
  MODIFY `distributor_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `order_customer`
--
ALTER TABLE `order_customer`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=993370;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `product_user`
--
ALTER TABLE `product_user`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
