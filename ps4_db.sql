-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: ps4_db
-- ------------------------------------------------------
-- Server version	5.7.17-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `category_id` int(2) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(20) NOT NULL,
  `image_uri` varchar(45) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Bắn súng','bansung','Trải nghiệm góc nhìn'),(2,'Thể thao','thethao','Sport is life'),(3,'Đối kháng','doikhang','Chiến đấu để sống sót'),(4,'Nhập vai','nhapvai','Hòa mình vào các siêu anh hùng'),(5,'Kinh dị','kinhdi','Nỗi sợ hãi bao trùm');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `distributor`
--

DROP TABLE IF EXISTS `distributor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `distributor` (
  `distributor_id` int(5) NOT NULL AUTO_INCREMENT,
  `distributor_name` varchar(30) NOT NULL,
  PRIMARY KEY (`distributor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `distributor`
--

LOCK TABLES `distributor` WRITE;
/*!40000 ALTER TABLE `distributor` DISABLE KEYS */;
INSERT INTO `distributor` VALUES (1,'Nintendo'),(2,'Sony Entertainment'),(3,'WB Games'),(4,'Capcom'),(5,'Konami'),(6,'Rare');
/*!40000 ALTER TABLE `distributor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_customer`
--

DROP TABLE IF EXISTS `order_customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_customer` (
  `order_id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(30) NOT NULL,
  `customer_add` varchar(50) NOT NULL,
  `customer_phone` int(10) NOT NULL,
  `total_money` int(10) NOT NULL,
  `order_date` datetime NOT NULL,
  `payment` varchar(20) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `note` varchar(50) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=874694 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_customer`
--

LOCK TABLES `order_customer` WRITE;
/*!40000 ALTER TABLE `order_customer` DISABLE KEYS */;
INSERT INTO `order_customer` VALUES (55718,'Nguyễn VĂn A','Hàng Trống',14546463,3800000,'2018-05-02 17:13:34','ATM','Nữ','piipas ád','Đang chờ'),(218292,'Nguyễn Văn Thanh','123 Giải Phóng Hà Nội',1546549876,5600000,'2018-05-01 19:34:27','COD','Nam','aqwuoieupoq kf','Đã giao'),(451718,'Lưu Văn Vũ','465 Thái Hà',2147483647,3150000,'2018-05-01 20:45:00','COD','Nam','asdsa gdsfgsdaf','Đã giao'),(558525,'SAD','saD',2147483647,3300000,'2018-05-03 09:51:50','COD','Nam','ÁDASD','Đang chờ'),(601155,'Nguyễn Văn Thiện','134 Hai Bà Trưng',1468796663,1500000,'2018-05-01 19:31:32','COD','Nam','','Đã giao'),(673970,'Dương Văn Huy','465 Tôn Thất Tùng Hà nôi',2147483647,5500000,'2018-05-02 17:07:40','ATM','Nam','E a;skd; ac sfgaa','Đã giao'),(841070,'Nguyễn Huy Hàng ','13 Trần Phú',1646498,11100000,'2018-05-01 19:16:53','COD','Nam','Giao hàng trong 3 ngày','Đã giao'),(874693,'Nguyễn Đông Tư','21 Thái Hà Hà nôik',1656598654,7200000,'2018-05-03 10:33:37','ATM','Nam','Giao hàng sau giờ hành chính','Đã giao');
/*!40000 ALTER TABLE `order_customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_old_product`
--

DROP TABLE IF EXISTS `order_old_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
  `status` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_old_product`
--

LOCK TABLES `order_old_product` WRITE;
/*!40000 ALTER TABLE `order_old_product` DISABLE KEYS */;
INSERT INTO `order_old_product` VALUES (265996,'Dongtu','Couter Stricke',800000,'Nguyễn Đông Tư','Nam','29 Khương Hạ',1649361661,'2018-05-06 22:13:19','COD','','Đang chờ');
/*!40000 ALTER TABLE `order_old_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_product`
--

DROP TABLE IF EXISTS `order_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_product` (
  `order_id` int(10) NOT NULL,
  `product_name` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `quantity` int(10) DEFAULT NULL,
  KEY `order_id` (`order_id`),
  KEY `name` (`product_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_product`
--

LOCK TABLES `order_product` WRITE;
/*!40000 ALTER TABLE `order_product` DISABLE KEYS */;
INSERT INTO `order_product` VALUES (841070,'Layers of fear','Nguyễn Huy Hàng ',3),(841070,'Amazing Spiderman','Nguyễn Huy Hàng ',1),(841070,'Resident Evil 7','Nguyễn Huy Hàng ',6),(601155,'Layers of fear','Nguyễn Văn Thiện',1),(601155,'Mortal Kombat X','Nguyễn Văn Thiện',1),(218292,'Resident Evil 7','Nguyễn Văn Thanh',1),(218292,'Fifa 17','Nguyễn Văn Thanh',4),(218292,'Watch Dogs 2','Nguyễn Văn Thanh',1),(451718,'Hear they lie','Lưu Văn Vũ',1),(451718,'Need for speed','Lưu Văn Vũ',3),(673970,'The Division','Dương Văn Huy',1),(673970,'Mortal Kombat X','Dương Văn Huy',5),(673970,'Let It Die','Dương Văn Huy',1),(55718,'Amazing Spiderman','Nguyễn VĂn A',1),(55718,'Resident Evil 7','Nguyễn VĂn A',2),(558525,'Layers of fear','SAD',1),(558525,'Resident Evil 7','SAD',1),(558525,'Detroit','SAD',2),(874693,'Amazing Spiderman','Nguyễn Đông Tư',3),(874693,'The Division','Nguyễn Đông Tư',4),(874693,'Let It Die','Nguyễn Đông Tư',1);
/*!40000 ALTER TABLE `order_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `product_id` int(10) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(30) NOT NULL,
  `price_buy` int(10) NOT NULL,
  `description` varchar(500) NOT NULL,
  `product_image` varchar(20) NOT NULL,
  `detail_image` varchar(20) NOT NULL,
  `category_id` int(10) NOT NULL,
  `distributor_name` varchar(30) NOT NULL,
  `quantity` int(5) DEFAULT '1',
  `product_status` varchar(10) NOT NULL,
  `updatetime` date NOT NULL,
  `purchase_number` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`product_id`),
  KEY `id` (`product_id`),
  KEY `product_category_id_idx` (`category_id`),
  CONSTRAINT `product_category_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'Couter Stricke',1100000,'Counter-Strike đã làm ngành công nghiệp game bất ngờ khi MOD không thành công trở thành trò chơi hành động trực tuyến được chơi nhiều nhất trên thế giới gần như ngay lập tức sau khi phát hành vào tháng 8 năm 1999','../image/img1.jpg','../image/img1',1,'Sony',321,'Hot','0000-00-00',0),(2,'Layers of fear',700000,'Đắm chìm trong tâm trí của một nghệ sĩ điên và khám phá những bí ẩn của sự điên rồ của mình, đi qua hành lang là thực hiện chuyển đổi biệt thự Victorian sâu rộng và liên tục. Trải nghiệm những tầm nhìn, nỗi sợ hãi và lo lắng của một họa sĩ thiên tài và hoàn thành kiệt tác, mà nghệ sĩ đã phải vật lộn. ','../image/img2.jpg','../image/img2',5,'Capcom',124,'Mới','0000-00-00',0),(3,'Amazing Spiderman',1200000,'The Amazing Spider-Man 2 là cơ hội của Peter Parker để tỏa sáng. Danh tính của Spider-Man, tất cả quá xấu hổ được dành nhiều thời gian hơn trong sự chú ý của PlayStation 4, điều này có nghĩa là cũng như việc đánh đu, slinging và ngăn chặn tội phạm, bạn sẽ được đào sâu vào nền tảng của một số siêu sao xuất sắc nhất của Marvel, kẻ thù và làm sáng tỏ một âm mưu đe dọa chìm đắm Manhattan.','../image/img3.jpg','../image/img3',4,'Konami',65,'Mới','0000-00-00',0),(4,'Hear they lie',600000,'Hear they Lie vận chuyển bạn đến một thế giới đáng sợ mà từ đó bạn không thể trốn thoát. Khám phá một thành phố ác mộng, nơi sinh sống của những sinh vật lạ lẫm, độc ác trong trò chơi kinh dị đầu tiên phá vỡ tính tương thích với PlayStation VR.   Cuộc đấu tranh để tồn tại khi bạn vật lộn với cuộc sống hoặc cái chết lựa chọn đạo đức và cố gắng khám phá những bí ẩn của người phụ nữ màu vàng.','../image/img4.jpg','../image/img4',5,'Sony',32,'Quá cũ','0000-00-00',0),(5,'Resident Evil 7',1300000,'Tiếp theo Resident Evil 5 và Resident Evil 6 , Resident Evil 7 sẽ trở lại với rễ kinh dị sống còn của franchise, với sự nhấn mạnh về thăm dò','../image/img5.jpg','../image/img5',5,'WB Games',144,'Mới','0000-00-00',0),(6,'The Division',700000,'Bộ phận The DivisionTM của Tom Clancy là một trải nghiệm RPG thực tế khiến cho thể loại này trở thành một thiết lập quân sự hiện đại lần đầu tiên.','../image/img6.jpg','../image/img6',4,'Rare',175,'Mới','0000-00-00',0),(7,'Need for speed',850000,'Need For Speed phiên bản 2015 hứa hẹn sẽ là một game thỏa mãn cơn khát tốc độ của cộng đồng game thủ, vì game sẽ mang trở lại những yếu tố làm nên tên tuổi của dòng game Need for Speed từ xưa tới nay.','../image/img7.jpg','../image/img7',2,'Rare',221,'Hot','0000-00-00',0),(8,'Mortal Kombat X',800000,'Mortal Kombat X là phần mới nhất của dòng game song đấu đầy bạo lực của NetherRealm Studios. Đây là phiên bản thứ 10 của cả dòng game dự kiến sẽ ra mắt trên mọi hệ máy vào tháng 4 năm 2015 với dàn nhân vật được bổ sung thêm nhằm thay máu cho game.','../image/img8.jpg','../image/img8',3,'Sony',179,'Hot','0000-00-00',0),(9,'Fifa 17',900000,'FIFA 17 thu hút   bạn trong những trải nghiệm bóng đá đích thực bằng cách tận dụng sự tinh tế của một engine game mới, trong khi giới thiệu bạn với những người chơi bóng đá đầy chiều sâu và cảm xúc và đưa bạn đến những thế giới hoàn toàn mới chỉ có thể truy cập được trong trò chơi. Đổi mới hoàn toàn theo cách mà người chơi nghĩ và di chuyển, tương tác vật lý với đối thủ và thực hiện tấn công cho phép bạn sở hữu mọi khoảnh khắc trên sân.','../image/img9.jpg','../image/img9',2,'Capcom',336,'Cũ','0000-00-00',0),(10,'Street Fighter V',900000,'Street Fighter V là phần thứ năm trong seri game chiến đấu Street Fighter của Nhật Bản ra mắt lần đầu vào năm 1987. Tương tự như các phiên bản Street Fighter trước, nó được phát triển bởi Capcom. Mặc dù thực tế cho thấy rằng có rất ít sự khác biệt trong hình ảnh giữa Street Fighter V và các game trước của seri, Street Fighter V có yêu cầu hệ thống hơi lớn hơn. Tuy nhiên, sự khác biệt là không quá lớn để yêu cầu các bạn phải có một máy tính cao cấp. Game sẽ có 16 nhân vật lúc khởi động, trong đó ','../image/img10.jpg','../image/img10',3,'WB Games',98,'Cũ','0000-00-00',0),(11,'Watch Dogs 2',700000,'Nhân vật chính của chúng ta không hề ngạc nhiên vẫn tiếp tục là một hacker sừng sỏ có thể kiểm soát gần như mọi hoạt động trong thành phố chỉ bằng thao tác trên chiếc điện thoại thông minh. Dù vậy Aiden Pearce đã rời khỏi cuộc chơi để nhường chỗ cho Marcus Holloway - một người Mỹ da màu sinh sống ở vùng vịnh Oakland, San Francisco.','../image/img11.jpg','../image/img11',1,'Sony',95,'Cũ','0000-00-00',0),(12,'Let It Die',800000,'Chiến đấu để đạt được vị trí cao nhất trong hành động sống còn hỗn loạn và bong bóng này đang diễn ra tự do để chơi đến một cấp độ hoàn toàn mới. Bắt đầu cuộc hành trình của bạn trong bộ đồ lót của bạn và sống sót bằng bất kỳ phương tiện cần thiết trong khi tham khảo ý kiến ​​từ Chú chim, một máy gặt ván trượt','../image/img12.jpg','../image/img12',5,'Konami',178,'Hot','0000-00-00',0),(14,'Detroit',650000,'Du lịch đến đô thị tương lai gần của Detroit - một thành phố trẻ hóa bởi một phát triển công nghệ thú vị: androids. Hãy chứng kiến ​​thế giới mới dũng cảm của bạn biến thành sự hỗn loạn khi bạn đảm nhận vai trò của Kara, một cô gái người Nga đang cố gắng tìm chỗ của chính mình trong một bối cảnh xã hội hỗn loạn.','../image/detroit.jpg','../image/img13',1,'Sony',177,'Cũ','0000-00-00',0);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `product_info`
--

DROP TABLE IF EXISTS `product_info`;
/*!50001 DROP VIEW IF EXISTS `product_info`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `product_info` AS SELECT 
 1 AS `category_id`,
 1 AS `product_id`,
 1 AS `product_name`,
 1 AS `price_buy`,
 1 AS `description`,
 1 AS `product_image`,
 1 AS `detail_image`,
 1 AS `distributor_name`,
 1 AS `quantity`,
 1 AS `product_status`,
 1 AS `updatetime`,
 1 AS `category_name`,
 1 AS `image_uri`,
 1 AS `title`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `product_user`
--

DROP TABLE IF EXISTS `product_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_user` (
  `product_id` int(10) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(30) NOT NULL,
  `price_buy` int(10) NOT NULL,
  `price_rent` int(10) NOT NULL,
  `description` varchar(500) NOT NULL,
  `product_img` varchar(50) NOT NULL,
  `category` varchar(30) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `notification` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_user`
--

LOCK TABLES `product_user` WRITE;
/*!40000 ALTER TABLE `product_user` DISABLE KEYS */;
INSERT INTO `product_user` VALUES (1,'Couter Stricke',800000,300000,'Tựa game bắn súng cực hót cho ae , mình mới mua đầu tết vẫn còn mới nguyên hộp còn bảo hành đến tháng 2/2019 ','../image/img1.jpg','Bắn súng','dongtu.hust@gmail.com','96%','Đã bán'),(2,'Layers of fear',700000,300000,'Đĩa game Layers of fear thể loại kịnh dị rất đáng để sở hữu mua mới 1tr bán lại 700k hoặc thuê vs giá 300k 1 tuần , tình trạng hơi xước nhẹ hộp còn nguyên','../image/img2.jpg','Kinh dị','hai@gmail.com','86%',NULL),(3,'Amazing Spiderman',900000,400000,'Dành cho ae nào mê các siêu anh hùng , đĩa Amazing spiderman cực hot giá thị trường 1tr3 bán lại 900k còn nguyên hộp đĩa vẫn mới còn bảo hành đến tháng 4/2019','../image/img3.jpg','Phiêu lưu','chudiep@gmail.com','95%',NULL),(6,'The Division',800000,200000,'Đĩa game ps4 cực hot nửa đầu năm 2017, giá thị trường 1tr3 bán lại 800k còn nguyên hộp đĩa vẫn mới còn bảo hành đến tháng 5/2019','../image/img6.jpg','Nhập vai','dongtugg@gmail.com','91%',NULL),(7,'Need for speed',899000,250000,'Dành cho ae yêu tốc độ , đĩa Need for speed cực hot giá thị trường 1tr2 bán lại 899k còn nguyên hộp đĩa vẫn mới còn bảo hành đến tháng 4/2019','../image/img7.jpg','Thể thao','ducmung@gmail.com','87%',NULL),(8,'Mortal Kombat X',799000,999999999,'Mortal combat X cực hot cho ae giá siêu rẻ, mình mua mới 1tr5 bán lại 799k còn nguyên hộp đĩa hơi xước nhưng chơi vẫn ngon mình k cho thuê nhé','../image/img8.jpg','Đối kháng','duongson@gmail.com','76%',NULL),(9,'Fifa 17',800000,300000,'Fifa 17 đồ họa cự đẹp, giá thị trường 1tr1 bán lại 800k còn nguyên hộp đĩa vẫn mới còn bảo hành đến tháng 4/2019','../image/img9.jpg','Thể thao','luuvu@gmail.com','99%',NULL),(10,'Street Fighter V',900000,500000,'Street Fighter V là phần thứ năm trong seri game chiến đấu Street Fighter của Nhật Bản ra mắt lần đầu vào năm 1987. Tương tự như các phiên bản Street Fighter trước, nó được phát triển bởi Capcom. Mặc dù thực tế cho thấy rằng có rất ít sự khác biệt trong hình ảnh giữa Street Fighter V và các game trước của seri, Street Fighter V có yêu cầu hệ thống hơi lớn hơn. Tuy nhiên, sự khác biệt là không quá lớn để yêu cầu các bạn phải có một máy tính cao cấp. Game sẽ có 16 nhân vật lúc khởi động, trong đó ','../image/img10.jpg','Đối kháng','duchuy@gmail.com','87%',NULL),(11,'Watch Dogs 2',700000,350000,'Nhân vật chính của chúng ta không hề ngạc nhiên vẫn tiếp tục là một hacker sừng sỏ có thể kiểm soát gần như mọi hoạt động trong thành phố chỉ bằng thao tác trên chiếc điện thoại thông minh. Dù vậy Aiden Pearce đã rời khỏi cuộc chơi để nhường chỗ cho Marcus Holloway - một người Mỹ da màu sinh sống ở vùng vịnh Oakland, San Francisco.','../image/img11.jpg','Bắn súng','20156827@student.hust.edu.vn','95%',NULL),(12,'Let It Die',800000,500000,'Chiến đấu để đạt được vị trí cao nhất trong hành động sống còn hỗn loạn và bong bóng này đang diễn ra tự do để chơi đến một cấp độ hoàn toàn mới. Bắt đầu cuộc hành trình của bạn trong bộ đồ lót của bạn và sống sót bằng bất kỳ phương tiện cần thiết trong khi tham khảo ý kiến ​​từ Chú chim, một máy gặt ván trượt','../image/img12.jpg','Kinh dị','haihoang@gmail.com','79%',NULL),(15,'Far Cry 5',900000,300000,'Far Cry 5 ra đời được 6 năm nhưng độ hot của nó vẫn k hề xuyên giảm giá cực tốt cho ae lấy ngay , giá thị trường 1tr3 bán lại cho ae 900k hình thức hơi xước nhẹ nhưng chơi k hề bị vấp ','../image/product_user/farcry.jpg','Phiêu lưu','dongtu.hust@gmail.com','86%',NULL),(16,'Bio Shock ',700000,300000,'Bio Sock giá mua cũ 700k giá thuê 300k/tuần hình thức vẫn còn mới','../image/product_user/bioshock.jpg','Nhập vai','dongtu.hust@gmail.com','95%',NULL);
/*!40000 ALTER TABLE `product_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `createdate` datetime NOT NULL,
  `is_block` tinyint(4) NOT NULL DEFAULT '0',
  `permision` tinyint(4) NOT NULL DEFAULT '0',
  `address` varchar(50) NOT NULL,
  `phone` int(10) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (8,'Dongtu','anhlaso1','dongtu.hust@gmail.com','2018-03-18 10:00:38',0,0,'Hanoi',1649361661),(9,'Hoang','anhlaso1','huyhoang@gmail.com','2018-03-18 10:06:11',0,0,'Hanoi',1),(11,'Mung','anhlaso1','ducmung@gmail.com','2018-03-18 10:13:27',1,0,'Huyn',22233),(12,'ChuDiep','anhlaso1','chudiep@gmail.com','2018-03-19 21:43:09',0,0,'Hanoi',2147483647),(13,'Dongtu123','anhlaso1','dongtubk@gmail.com','2018-03-19 21:47:13',0,0,'Hanoi',0),(14,'Thiện','dongthien','dongthien@gmail.com','2018-03-19 21:49:31',0,0,'Hung Yen',1),(15,'Admin','admin','admin@gmail.com','2018-03-19 22:14:53',0,1,'Hanoi',321313),(16,'vanthanh','anhlaso1','vanthanh@gmail.com','2018-03-20 10:09:31',0,0,'Hanoi',1649361661),(17,'hai','dongtu','hai@gmail.com','2018-03-25 22:47:17',0,0,'hanoi',2),(18,'DuongSon','anhlaso1','duongson@gmail.com','2018-05-03 17:10:48',0,0,'Văn Giang Hưng Yên',15656656),(19,'dongtugg','anhlaso1','dongtugg@gmail.com','2018-05-03 17:12:17',0,0,'Yên Mỹ Hưng Yên',2147483647),(20,'LuuVu','anhlaso1','luuvu@gmail.com','2018-05-03 17:13:02',0,0,'Sóc Sơn',564542313),(21,'StudentBK','anhlaso1','20156827@student.hust.edu.vn','2018-05-03 17:14:15',0,0,'Hà Tĩnh',15646332),(22,'DucHuy97','anhlaso1','duchuy@gmail.com','2018-05-03 17:15:14',0,0,'Nghệ An',2147483647);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `product_info`
--

/*!50001 DROP VIEW IF EXISTS `product_info`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `product_info` AS select `product`.`category_id` AS `category_id`,`product`.`product_id` AS `product_id`,`product`.`product_name` AS `product_name`,`product`.`price_buy` AS `price_buy`,`product`.`description` AS `description`,`product`.`product_image` AS `product_image`,`product`.`detail_image` AS `detail_image`,`product`.`distributor_name` AS `distributor_name`,`product`.`quantity` AS `quantity`,`product`.`product_status` AS `product_status`,`product`.`updatetime` AS `updatetime`,`category`.`category_name` AS `category_name`,`category`.`image_uri` AS `image_uri`,`category`.`title` AS `title` from (`product` join `category` on((`product`.`category_id` = `category`.`category_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-07 18:39:24
