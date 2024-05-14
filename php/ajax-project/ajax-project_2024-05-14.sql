# ************************************************************
# Sequel Ace SQL dump
# Version 20051
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: localhost (MySQL 8.2.0)
# Database: ajax-project
# Generation Time: 2024-05-14 17:06:50 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;

INSERT INTO `categories` (`id`, `name`)
VALUES
	(1,'Electronics'),
	(2,'Clothing'),
	(3,'Books'),
	(4,'Home & Kitchen');

/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table posts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `content` text,
  `date` datetime DEFAULT NULL,
  `visible` tinyint(1) DEFAULT '1',
  `category_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;

INSERT INTO `posts` (`id`, `title`, `content`, `date`, `visible`, `category_id`)
VALUES
	(1,'Top 10 Gadgets of 2024','As technology continues to evolve, so do the gadgets that shape our lives. Here are the top 10 gadgets of 2024 that are revolutionizing the way we live and work...','2024-05-14 12:00:00',1,1),
	(2,'Fashion Trends for the Season','Discover the latest fashion trends for the season, from bold colors to statement accessories. Stay ahead of the curve with these must-have styles...','2024-05-14 13:00:00',1,2),
	(3,'Book Recommendations for Spring Reading','Looking for your next great read? Check out our list of book recommendations for spring, featuring captivating novels, thought-provoking nonfiction, and much more...','2024-05-14 14:00:00',1,3),
	(4,'Home Improvement Tips and Ideas','Transform your living space with these home improvement tips and ideas. From DIY projects to expert advice, discover how to make your home a more comfortable and stylish place to live...','2024-05-14 15:00:00',1,4),
	(5,'How to Choose the Right Smartphone','With so many options on the market, choosing the right smartphone can be overwhelming. Learn how to navigate the features and specifications to find the perfect device for your needs...','2024-05-14 16:00:00',1,1),
	(6,'The Art of Mixing and Matching Outfits','Unlock the secrets of mixing and matching outfits to create effortlessly chic looks for any occasion. From color coordination to layering techniques, discover how to elevate your style...','2024-05-14 17:00:00',1,2),
	(7,'Exploring the Works of Classic Literature','Delve into the timeless works of classic literature and uncover the enduring themes and messages that continue to resonate with readers today...','2024-05-14 18:00:00',1,3),
	(8,'Simple Tips for a Clutter-Free Home','Say goodbye to clutter and hello to a tidy, organized home with these simple tips and tricks. From decluttering strategies to storage solutions, reclaim your space and reduce stress...','2024-05-14 19:00:00',1,4),
	(9,'Top 10 Gadgets of 2024','As technology continues to evolve, so do the gadgets that shape our lives. Here are the top 10 gadgets of 2024 that are revolutionizing the way we live and work...','2024-05-14 12:00:00',1,1),
	(10,'Fashion Trends for the Season','Discover the latest fashion trends for the season, from bold colors to statement accessories. Stay ahead of the curve with these must-have styles...','2024-05-14 13:00:00',1,2),
	(11,'Book Recommendations for Spring Reading','Looking for your next great read? Check out our list of book recommendations for spring, featuring captivating novels, thought-provoking nonfiction, and much more...','2024-05-14 14:00:00',1,3),
	(12,'Home Improvement Tips and Ideas','Transform your living space with these home improvement tips and ideas. From DIY projects to expert advice, discover how to make your home a more comfortable and stylish place to live...','2024-05-14 15:00:00',1,4),
	(13,'How to Choose the Right Smartphone','With so many options on the market, choosing the right smartphone can be overwhelming. Learn how to navigate the features and specifications to find the perfect device for your needs...','2024-05-14 16:00:00',1,1),
	(14,'The Art of Mixing and Matching Outfits','Unlock the secrets of mixing and matching outfits to create effortlessly chic looks for any occasion. From color coordination to layering techniques, discover how to elevate your style...','2024-05-14 17:00:00',1,2),
	(15,'Exploring the Works of Classic Literature','Delve into the timeless works of classic literature and uncover the enduring themes and messages that continue to resonate with readers today...','2024-05-14 18:00:00',1,3),
	(16,'Simple Tips for a Clutter-Free Home','Say goodbye to clutter and hello to a tidy, organized home with these simple tips and tricks. From decluttering strategies to storage solutions, reclaim your space and reduce stress...','2024-05-14 19:00:00',1,4),
	(23,'Test title','Test content','2024-05-14 17:10:52',1,1),
	(24,'Title from js','Content from js','2024-05-14 17:57:43',1,3),
	(25,'Title from js 2','Content from js 2','2024-05-14 18:02:56',1,4);

/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
