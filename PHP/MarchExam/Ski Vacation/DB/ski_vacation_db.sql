-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.13-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for ski_vacation
DROP DATABASE IF EXISTS `ski_vacation`;
CREATE DATABASE IF NOT EXISTS `ski_vacation` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `ski_vacation`;

-- Dumping structure for table ski_vacation.bookings
DROP TABLE IF EXISTS `bookings`;
CREATE TABLE IF NOT EXISTS `bookings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `accommodation_type` varchar(30) NOT NULL,
  `children` int(11) NOT NULL DEFAULT '0',
  `adults` int(11) NOT NULL DEFAULT '0',
  `rooms` int(11) DEFAULT '0',
  `check_in_date` datetime NOT NULL,
  `check_out_date` datetime NOT NULL,
  `lift_pass` tinyint(4) NOT NULL DEFAULT '0',
  `ski_instructor` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table ski_vacation.bookings: ~0 rows (approximately)
/*!40000 ALTER TABLE `bookings` DISABLE KEYS */;
REPLACE INTO `bookings` (`id`, `first_name`, `last_name`, `email`, `phone_number`, `accommodation_type`, `children`, `adults`, `rooms`, `check_in_date`, `check_out_date`, `lift_pass`, `ski_instructor`) VALUES
	(2, 'test', 'test', 'test@test.test', '0894894', 'Hotel', 2, 2, 0, '2017-01-01 00:00:00', '2017-11-06 00:00:00', 0, 0),
	(3, 'Nov', 'nov', 'nov@nov.vno', '08523436', 'Bungalow', 1, 1, 1, '2017-01-02 00:00:00', '2017-01-01 00:00:00', 0, 0);
/*!40000 ALTER TABLE `bookings` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
