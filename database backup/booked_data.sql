-- MySQL dump 10.13  Distrib 8.0.18, for Linux (x86_64)
--
-- Host: localhost    Database: book_app
-- ------------------------------------------------------
-- Server version	8.0.18-0ubuntu0.19.10.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `add_book`
--

DROP TABLE IF EXISTS `add_book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `add_book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `book_title` varchar(256) NOT NULL,
  `author_name` varchar(256) NOT NULL,
  `catg_id` int(11) NOT NULL,
  `month_id` int(11) NOT NULL,
  `year_id` int(11) NOT NULL,
  `classification` int(11) DEFAULT NULL,
  `task_date` varchar(256) NOT NULL,
  `hash_id` varchar(256) DEFAULT NULL,
  `book_cover_url` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=150 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `add_book`
--

LOCK TABLES `add_book` WRITE;
/*!40000 ALTER TABLE `add_book` DISABLE KEYS */;
INSERT INTO `add_book` VALUES (129,1,'Bad Blood','John Carreyrou',60,1,34,100,'22/08/2019','c4091923b97f92ab124b52009c47c854a3b0aee1fcb9ab0d13dcb0990c344c7a','https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1556268702l/37976541.jpg\n'),(130,1,'Coockoo\'s Calling','Robert Galbraith',42,1,34,90,'22/08/2019','7a475c4a38366454dbd84465d3209f53d427b6bd056434805f1fc659c04d8c8c','https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1540217136l/16160797.jpg\n'),(131,1,'A verdade sobre o caso Harry Quebert','Joel Dicker',42,4,34,85,'22/08/2019','1e5e0463db64db0da4d6eadcda649708ac0f78811cfd329af08a6c9a58843983','https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1347987605l/16033842.jpg\n'),(132,1,'Leonardo Da Vinci','Walter Isaacson',44,4,34,100,'22/08/2019','ff2d975ae900f5ff30e1bdc346764c23604ee43121df6b5c0afa366300547810','https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1523543570l/34684622._SY475_.jpg\n'),(133,1,'Harry Potter and the Sorcerer\'s Stone','J. K. Rowling',61,6,34,90,'22/08/2019','20f0deac78f46bc62f9a63e3041852545ae1ab297e392561acef1d13106de012','https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1474154022l/3._SY475_.jpg\n'),(134,1,'Albert Einstein: his life and universe','Walter Isaacson',44,6,34,100,'22/08/2019','9a37eee98de25df63dc70a464bac5c40ce8c7b4d7c65dbbb7852035bef27f4fa','https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1328011405l/10884.jpg\n'),(135,1,'Just one look','Harlan Coben',42,6,34,80,'22/08/2019','a3b624cf5d7d330c2790aa467e046a5a232962fb5d110bd0f8b556875eafc7ca','https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1309286625l/85418.jpg\n'),(136,1,'The electric life of Michael Faraday','Alan Hirshfeld',44,7,34,100,'22/08/2019','d7be77531d260ffef3d538fa83a3340c462a2f4b17e76b96aacb61cd3dbeeca9','https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1312031510l/749062.jpg\n'),(137,1,'Está tudo fudido','Mark Manson',59,8,34,75,'22/08/2019','17c9e7c62d519db4fda0276406aba716dc1bf7834df6a895ce77bc9a24f33aa2','https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1550685003l/43808723.jpg\n'),(145,1,'The thirteen problems','Agatha Christie',45,9,34,95,'10/09/2019','702984b243d9d4a37226adace24b8a09a019a15ea38b477961e1cdbea76f8276','https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1309305370l/31309.jpg\n'),(146,16,'Odisseia','Homero',62,1,26,69,'25/10/2019','72ac67c5ef98193209616db6507f685a84900088ce8b5eda10b757d0584c4b61','https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1386167558l/19177078.jpg\n'),(147,16,'It','Stephen King',42,1,35,99,'25/10/2019','6a5eb5d8a79efad77ba73543f1f74888ff6933d0a1dbe3a475d4e0b8d7a256e0','https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1334416842l/830502.jpg\n'),(148,17,'percy jackson','rick rordan',63,6,26,80,'25/10/2019','1893d5ae9231f4ac04683d0506ef1bf76a60079b074ff178eac78e0a5a7860d9','https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1519022209l/4556058.jpg\n');
/*!40000 ALTER TABLE `add_book` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catg_name` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (42,'Fiction'),(43,'Science'),(44,'Biography'),(45,'Mistery'),(46,'Science Fiction'),(47,'Economy'),(48,'Self-development'),(49,'Finance'),(50,'Habits'),(51,'History'),(52,'PolÃ­tica'),(53,'Historical Fiction'),(54,'Writing'),(55,'Philosophy'),(56,'Technology'),(57,'awd'),(58,'Horror'),(59,'Non-fiction'),(60,'Tech'),(61,'Fantasy'),(62,'Classico'),(63,'Fantasia');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `month_finished`
--

DROP TABLE IF EXISTS `month_finished`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `month_finished` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `month_name` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `month_finished`
--

LOCK TABLES `month_finished` WRITE;
/*!40000 ALTER TABLE `month_finished` DISABLE KEYS */;
INSERT INTO `month_finished` VALUES (1,'January'),(2,'February'),(3,'March'),(4,'April'),(5,'May'),(6,'June'),(7,'July'),(8,'August'),(9,'September'),(10,'October'),(11,'November'),(12,'December');
/*!40000 ALTER TABLE `month_finished` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(256) DEFAULT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'wvictor07','wvictor07@gmail.com','$2y$10$wuMyK7/jKcMefpSuVeeXKOJbKS5tIxvcxf3ZnCof/UWHXj8UXTt7S','Weslley Victor'),(15,'admin','admin@admin.com','$2y$10$V9OMrmgS0FW5hYevP8uNOOmN6d1TnIldFzOOLy51CYzdpC2T9qy.m','The Admin'),(16,'marcol15','jktils@hotmail.com','$2y$10$W0IaI2bhCeD9eTicWufeT.cO2q0mOr/hEoOJJtr.KiAct16pdSfrm','Marco LeitÃ£o'),(17,'Ranqui','atila199970@hotmail.com','$2y$10$UhExwJVeSDjMmU3IfOkqMejyQsXlAWZqpzkVgKaWj2slpUlS.PimK','Ãtila');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `year_finished`
--

DROP TABLE IF EXISTS `year_finished`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `year_finished` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year_number` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `year_finished`
--

LOCK TABLES `year_finished` WRITE;
/*!40000 ALTER TABLE `year_finished` DISABLE KEYS */;
INSERT INTO `year_finished` VALUES (24,2014),(25,2015),(26,2016),(27,2017),(34,2019),(35,2020);
/*!40000 ALTER TABLE `year_finished` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-01-17  3:07:04
