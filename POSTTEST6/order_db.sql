-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for order_db
CREATE DATABASE IF NOT EXISTS `order_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `order_db`;

-- Dumping structure for table order_db.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `jumlah` int NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `pembayaran` varchar(50) NOT NULL
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

ALTER TABLE orders
ADD COLUMN gambar VARCHAR(255) NOT NULL AFTER price;
-- Dumping data for table order_db.orders: ~5 rows (approximately)
INSERT INTO `orders` (`id`, `nama`, `jumlah`, `alamat`, `price`, `pembayaran`, `total`) VALUES
	(3, 'Kalingga Dwindra Putraka', 5, 'Jalan AWS', 75000.00, 'DANA', 375000.00),
	(4, 'Arif Septian', 5, 'Jalan AWS', 30000.00, 'GoPay', 150000.00),
	(6, 'Adi Muhammad Syifai', 2, 'Tenggarong', 50000.00, 'GoPay', 100000.00),
	(9, 'Muhammad Andi', 5, 'Tenggarong', 30000.00, 'GoPay', 150000.00),
	(10, 'Hotman Paris', 3, 'Jalan Perjuangan 7', 30000.00, 'GoPay', 90000.00);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
