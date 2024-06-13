CREATE DATABASE IF NOT EXISTS `demo_sql_injection`;
use `demo_sql_injection`;

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `products` (`id`, `name`, `price`) VALUES
(1, 'Đào', 1500000),
(2, 'Phở', 30000),
(3, 'Piano', 20000000),
(4, 'Jack', 5000000);

INSERT INTO `users` (`id`, `name`, `username`, `password`) VALUES
(1, 'Nguyễn Tuấn Anh', 'nguyentuananh', 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'Lê Phú An', 'lephuan', 'e10adc3949ba59abbe56e057f20f883e'),
(3, 'Nguyễn Văn Doanh', 'nguyenvandoanh', 'e10adc3949ba59abbe56e057f20f883e'),
(4, 'IAMPHUC', 'hoangkhacphuc', 'e10adc3949ba59abbe56e057f20f883e'),
(5, 'Nguyễn Phương Nga', 'nguyenphuongnga', 'e10adc3949ba59abbe56e057f20f883e');