-- MySQL dump 10.13  Distrib 8.0.46, for Linux (x86_64)
--
-- Host: localhost    Database: laravel
-- ------------------------------------------------------
-- Server version	8.0.46

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
-- Table structure for table `admin_users`
--

DROP TABLE IF EXISTS `admin_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin_users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_users`
--

LOCK TABLES `admin_users` WRITE;
/*!40000 ALTER TABLE `admin_users` DISABLE KEYS */;
INSERT INTO `admin_users` VALUES (1,'Site Administrator','admin@astrol.local','$2y$12$WmoHhFr1jiVxv/WoBBDqMu283firg5WkvfQ8wXs6TcbteXIv.AKAG',NULL,'2026-08-11 03:08:09','2026-08-11 03:08:09');
/*!40000 ALTER TABLE `admin_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `blogs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Agasthiya Mahashiva Nadi Peedam',
  `published_at` date DEFAULT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `blogs_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blogs`
--

LOCK TABLES `blogs` WRITE;
/*!40000 ALTER TABLE `blogs` DISABLE KEYS */;
INSERT INTO `blogs` VALUES (1,'What Is Nadi Astrology?','what-is-nadi-astrology','A simple introduction to the ancient palm-leaf tradition and the careful process behind a reading.','Nadi Astrology is a traditional practice connected with palm-leaf manuscripts attributed to ancient sages. A reading begins with identifying and confirming the leaf connected with the seeker.\n\nThe process is approached with patience and respect. It is not a replacement for personal judgement, but a way to reflect on questions, patterns, and possible directions in life.','nadi-deities.jpeg','Agasthiya Mahashiva Nadi Peedam','2026-08-01',1,'2026-08-11 03:08:09','2026-08-11 03:08:09'),(2,'Why Finding the Right Leaf Takes Time','why-finding-the-right-leaf-takes-time','Understanding the questions, confirmations, and discipline involved in a traditional leaf search.','A Nadi leaf search is not a quick lookup. The reader works through a sequence of questions and confirmations to establish whether a particular manuscript belongs to the seeker.\n\nThis patient approach protects the integrity of the reading and gives the seeker space to understand each stage of the process.','nadi-deities.jpeg','Agasthiya Mahashiva Nadi Peedam','2026-07-24',1,'2026-08-11 03:08:09','2026-08-11 03:08:09'),(3,'Preparing for Your First Nadi Consultation','preparing-for-your-first-nadi-consultation','A practical guide to approaching your consultation with clear questions and an open mind.','Before a consultation, take time to consider the questions that matter most to you. You do not need to prepare elaborate documents; sincerity and attention are more important.\n\nDuring the reading, listen carefully and note the guidance that feels relevant to your situation. A consultation is most useful when it becomes a thoughtful starting point for your own decisions.','nadi-deities.jpeg','Agasthiya Mahashiva Nadi Peedam','2026-07-15',1,'2026-08-11 03:08:09','2026-08-11 03:08:09'),(4,'The Role of the Nadi Reader','the-role-of-the-nadi-reader','Why discipline, listening, and responsibility matter in the work of a traditional Nadi reader.','A Nadi reader carries more than a collection of manuscripts. The reader is responsible for protecting a process that asks for patience, careful questioning, and honest communication.\n\nThe purpose is not to create fear. It is to offer a considered reading that helps the seeker reflect with greater clarity.','nadi-deities.jpeg','Agasthiya Mahashiva Nadi Peedam','2026-07-08',1,'2026-08-11 03:08:09','2026-08-11 03:08:09'),(5,'Understanding the Kandams','understanding-the-kandams','An introduction to the different chapters traditionally explored during a Nadi reading.','The Kandams are chapters associated with different areas of life. Depending on the questions and the reading, they may cover areas such as family, work, health, relationships, and spiritual direction.\n\nEach chapter is approached as part of a wider story rather than as an isolated prediction.','nadi-deities.jpeg','Agasthiya Mahashiva Nadi Peedam','2026-06-28',1,'2026-08-11 03:08:09','2026-08-11 03:08:09'),(6,'Nadi Astrology and Personal Reflection','nadi-astrology-and-personal-reflection','How a traditional reading can become a meaningful space for reflection and better questions.','A reading can be valuable even when the most important outcome is a better question. The words from a leaf invite the seeker to pause, consider choices, and recognise what deserves attention.\n\nPersonal responsibility remains at the centre of the journey. Guidance becomes meaningful when it is met with awareness and thoughtful action.','nadi-deities.jpeg','Agasthiya Mahashiva Nadi Peedam','2026-06-18',1,'2026-08-11 03:08:09','2026-08-11 03:08:09'),(7,'A Quiet Approach to Spiritual Guidance','a-quiet-approach-to-spiritual-guidance','The value of approaching ancient guidance with calmness, respect, and an open mind.','Spiritual guidance does not need to be hurried. A quiet approach gives the seeker room to listen, ask questions, and decide what feels meaningful.\n\nAt Agasthiya Mahashiva Nadi Peedam, the reading is held as a respectful conversation between an old tradition and a modern seeker.','nadi-deities.jpeg','Agasthiya Mahashiva Nadi Peedam','2026-06-10',1,'2026-08-11 03:08:09','2026-08-11 03:08:09');
/*!40000 ALTER TABLE `blogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact_messages`
--

DROP TABLE IF EXISTS `contact_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contact_messages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact_messages`
--

LOCK TABLES `contact_messages` WRITE;
/*!40000 ALTER TABLE `contact_messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `contact_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gallery_items`
--

DROP TABLE IF EXISTS `gallery_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gallery_items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `media_type` enum('photo','video') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'photo',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `is_published` tinyint(1) NOT NULL DEFAULT '0',
  `sort_order` int unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `gallery_items_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gallery_items`
--

LOCK TABLES `gallery_items` WRITE;
/*!40000 ALTER TABLE `gallery_items` DISABLE KEYS */;
INSERT INTO `gallery_items` VALUES (1,'Agasthiya Mahashiva Nadi Peedam','peedam-photo-1','photo','astrol/1.jpg',NULL,'A glimpse of the Peedam and the living Nadi tradition.',1,1,'2026-08-11 03:08:09','2026-08-11 03:08:09'),(2,'Agasthiya Mahashiva Nadi Peedam','peedam-photo-2','photo','astrol/2.jpg',NULL,'A glimpse of the Peedam and the living Nadi tradition.',1,2,'2026-08-11 03:08:09','2026-08-11 03:08:09'),(3,'Agasthiya Mahashiva Nadi Peedam','peedam-photo-4','photo','astrol/4.jpg',NULL,'A glimpse of the Peedam and the living Nadi tradition.',1,3,'2026-08-11 03:08:09','2026-08-11 03:08:09'),(4,'Agasthiya Mahashiva Nadi Peedam','peedam-photo-5','photo','astrol/5.jpg',NULL,'A glimpse of the Peedam and the living Nadi tradition.',1,4,'2026-08-11 03:08:09','2026-08-11 03:08:09'),(5,'Agasthiya Mahashiva Nadi Peedam','peedam-photo-6','photo','astrol/6.jpg',NULL,'A glimpse of the Peedam and the living Nadi tradition.',1,5,'2026-08-11 03:08:09','2026-08-11 03:08:09'),(6,'Agasthiya Mahashiva Nadi Peedam','peedam-photo-7','photo','astrol/7.jpg',NULL,'A glimpse of the Peedam and the living Nadi tradition.',1,6,'2026-08-11 03:08:09','2026-08-11 03:08:09'),(7,'Agasthiya Mahashiva Nadi Peedam','peedam-photo-8','photo','astrol/8.jpg',NULL,'A glimpse of the Peedam and the living Nadi tradition.',1,7,'2026-08-11 03:08:09','2026-08-11 03:08:09'),(8,'Agasthiya Mahashiva Nadi Peedam','peedam-photo-9','photo','astrol/9.jpg',NULL,'A glimpse of the Peedam and the living Nadi tradition.',1,8,'2026-08-11 03:08:09','2026-08-11 03:08:09'),(9,'Agasthiya Mahashiva Nadi Peedam','peedam-photo-10','photo','astrol/10.jpg',NULL,'A glimpse of the Peedam and the living Nadi tradition.',1,9,'2026-08-11 03:08:09','2026-08-11 03:08:09'),(10,'Agasthiya Mahashiva Nadi Peedam','peedam-photo-11','photo','astrol/11.jpg',NULL,'A glimpse of the Peedam and the living Nadi tradition.',1,10,'2026-08-11 03:08:09','2026-08-11 03:08:09'),(11,'Agasthiya Mahashiva Nadi Peedam','peedam-photo-12','photo','astrol/12.jpg',NULL,'A glimpse of the Peedam and the living Nadi tradition.',1,11,'2026-08-11 03:08:09','2026-08-11 03:08:09'),(12,'Agasthiya Mahashiva Nadi Peedam','peedam-photo-13','photo','astrol/13.jpg',NULL,'A glimpse of the Peedam and the living Nadi tradition.',1,12,'2026-08-11 03:08:09','2026-08-11 03:08:09'),(13,'Agasthiya Mahashiva Nadi Peedam','peedam-photo-14','photo','astrol/14.jpg',NULL,'A glimpse of the Peedam and the living Nadi tradition.',1,13,'2026-08-11 03:08:09','2026-08-11 03:08:09'),(14,'Agasthiya Mahashiva Nadi Peedam','peedam-photo-15','photo','astrol/15.jpg',NULL,'A glimpse of the Peedam and the living Nadi tradition.',1,14,'2026-08-11 03:08:09','2026-08-11 03:08:09'),(15,'Agasthiya Mahashiva Nadi Peedam','peedam-photo-16','photo','astrol/16.jpg',NULL,'A glimpse of the Peedam and the living Nadi tradition.',1,15,'2026-08-11 03:08:09','2026-08-11 03:08:09'),(16,'Agasthiya Mahashiva Nadi Peedam','peedam-photo-17','photo','astrol/17.jpg',NULL,'A glimpse of the Peedam and the living Nadi tradition.',1,16,'2026-08-11 03:08:09','2026-08-11 03:08:09'),(17,'Agasthiya Mahashiva Nadi Peedam','peedam-photo-18','photo','astrol/18.jpg',NULL,'A glimpse of the Peedam and the living Nadi tradition.',1,17,'2026-08-11 03:08:09','2026-08-11 03:08:09'),(18,'Agasthiya Mahashiva Nadi Peedam','peedam-photo-19','photo','astrol/19.jpg',NULL,'A glimpse of the Peedam and the living Nadi tradition.',1,18,'2026-08-11 03:08:09','2026-08-11 03:08:09'),(19,'The Nadi tradition explained','the-nadi-tradition-explained','video',NULL,NULL,'Video presentation will be added soon.',1,30,'2026-08-11 03:08:09','2026-08-11 03:08:09'),(20,'A visit to Agastya Peedam','a-visit-to-agastya-peedam','video',NULL,NULL,'Video presentation will be added soon.',1,31,'2026-08-11 03:08:09','2026-08-11 03:08:09'),(21,'Understanding a Nadi consultation','understanding-a-nadi-consultation','video',NULL,NULL,'Video presentation will be added soon.',1,32,'2026-08-11 03:08:09','2026-08-11 03:08:09');
/*!40000 ALTER TABLE `gallery_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` smallint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2026_08_09_000000_create_blogs_table',1),(5,'2026_08_09_000001_create_news_events_table',1),(6,'2026_08_09_000002_create_gallery_items_table',1),(7,'2026_08_09_000003_create_contact_messages_table',1),(8,'2026_08_09_000004_create_admin_users_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news_events`
--

DROP TABLE IF EXISTS `news_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `news_events` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `published_at` date DEFAULT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `news_events_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news_events`
--

LOCK TABLES `news_events` WRITE;
/*!40000 ALTER TABLE `news_events` DISABLE KEYS */;
INSERT INTO `news_events` VALUES (1,'Annual Agastya Peedam Puja','annual-agastya-peedam-puja','A look at the devotional observance and daily practices held at the Peedam.','The Peedam continues its daily puja and devotional practices throughout the year. These observances keep the spiritual discipline of the tradition at the heart of the ashram.\n\nVisitors and seekers are welcome to approach the Peedam with respect and a quiet mind.','nadi-deities.jpeg','2026-08-15','2026-08-05',1,'2026-08-11 03:08:09','2026-08-11 03:08:09'),(2,'New Online Consultation Schedule','new-online-consultation-schedule','Our updated online consultation schedule makes it easier for seekers outside India to connect.','Online consultations are now being arranged across more time zones for seekers living outside India. Please contact the team before booking so we can guide you through the preparation and available timings.','home-banner.jpeg','2026-08-20','2026-08-02',1,'2026-08-11 03:08:09','2026-08-11 03:08:09'),(3,'Vaitheeswaran Koil: A Sacred Place of Practice','vaitheeswaran-koil-a-sacred-place-of-practice','Discover the temple town and the living spiritual atmosphere connected with Nadi tradition.','Vaitheeswaran Koil has long been associated with healing, devotion, and Nadi Astrology. The town\'s temples, streets, and daily rituals form part of the atmosphere in which this tradition continues to be practised.','nadi-deities.jpeg','2026-07-28','2026-07-28',1,'2026-08-11 03:08:09','2026-08-11 03:08:09'),(4,'Peedam Observance During Festival Days','peedam-observance-during-festival-days','Important information about consultation availability during major Hindu festival days.','The Peedam may be closed to visitors or operate with limited consultation hours during major festival observances. Please contact our team in advance to confirm availability before planning your visit.','nadi-deities.jpeg','2026-07-20','2026-07-20',1,'2026-08-11 03:08:09','2026-08-11 03:08:09'),(5,'Serving Seekers Across the World','serving-seekers-across-the-world','How traditional Nadi guidance is being shared with seekers from different countries.','With translation support and online consultations, the Peedam continues to receive seekers from many parts of the world. The central process remains rooted in the same patience and care.','home-banner.jpeg','2026-07-10','2026-07-10',1,'2026-08-11 03:08:09','2026-08-11 03:08:09'),(6,'A Note on Responsible Spiritual Guidance','a-note-on-responsible-spiritual-guidance','Our commitment to respectful, honest, and responsible communication during every consultation.','Spiritual guidance should never be used to create fear or remove a person\'s responsibility for their own choices. Our consultations are intended to support reflection, clarity, and thoughtful action.','nadi-deities.jpeg','2026-06-30','2026-06-30',1,'2026-08-11 03:08:09','2026-08-11 03:08:09');
/*!40000 ALTER TABLE `news_events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('0qvF8ItqfwcEazAr6IHRUIbCRNGjPPyScoXrvzGu',NULL,'127.0.0.1','curl/8.21.0','eyJfdG9rZW4iOiIzR1k2ZVBaQ1hFVWxLYjFtanI5N0lDbjdBMGhQMkw1UWZodDQ0NU44IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMVwvbmFkaS1hc3Ryb2xvZ3lcL3RoZS1rYW5kYW1zIiwicm91dGUiOiJuYWRpLWFzdHJvbG9neS5zaG93In0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1786417277),('ektwMPjSmNKDv8BUpRSsicthby0zjcdbcMyTtzrx',NULL,'127.0.0.1','curl/8.21.0','eyJfdG9rZW4iOiJ4czl3UHJkS3BwRTl0Z3JxQVk2Y3o5MDFRVUJ0VXZUd2h3VlFvY2V2IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMVwvbmFkaS1hc3Ryb2xvZ3lcL2hpc3RvcnkiLCJyb3V0ZSI6Im5hZGktYXN0cm9sb2d5LnNob3cifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==',1786417277),('gbLTFs9OVh1mtzMk6gTQq8PwQaCyEDqrdqeQImN3',NULL,'127.0.0.1','curl/8.21.0','eyJfdG9rZW4iOiJ4amV5aFNOQ2ZwQW92UVAwYUZ0ZllRaXMwQVlvUE1YbEk2MENmNjJVIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMVwvbmFkaS1hc3Ryb2xvZ3lcL29ubGluZS1wcmVkaWN0aW9uLXByb2Nlc3MiLCJyb3V0ZSI6Im5hZGktYXN0cm9sb2d5LnNob3cifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==',1786417277),('pn26U5z3CSD65kbDw02fdSOs37AkEiAgLbPrCz40',NULL,'127.0.0.1','curl/8.21.0','eyJfdG9rZW4iOiJvcktVY29XME9NZGkycEhZNDJSNnA2YXlqRXdQNzgzcGhjU0tjYUs4IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMVwvbmFkaS1hc3Ryb2xvZ3lcL2hvdy1sZWFmLXNlYXJjaGluZy13b3JrcyIsInJvdXRlIjoibmFkaS1hc3Ryb2xvZ3kuc2hvdyJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19',1786417277),('WRLZOE6v6H0LXdkRgMQyHPawzXXlLE91b5BCYaMv',NULL,'172.25.0.1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/151.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJtSnl1TUFZeWNhOVBMVWZMRzZ0UVJDR0VzaVVJcUJJMmRtNWdGNmtWIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xvY2FsaG9zdDo4MDgwXC9uZXdzLWV2ZW50cyIsInJvdXRlIjoibmV3cy1ldmVudHMuaW5kZXgifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==',1786419395),('yEDpX0hUTl2aiTdtwYvHSmSfyti152NHeYhqqtCe',NULL,'127.0.0.1','Wget','eyJfdG9rZW4iOiJvM3I1eDlhMlNRN1JsU09QR0U5ejFwdmxSaklXM2g3Y1FsMldZbDRjIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMVwvYmxvZ3MiLCJyb3V0ZSI6ImJsb2dzLmluZGV4In0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1786418671);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-08-11  5:06:23
