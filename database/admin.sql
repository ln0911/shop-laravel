-- MySQL dump 10.13  Distrib 5.7.21, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: laravel-shop-two
-- ------------------------------------------------------
-- Server version	5.7.21-0ubuntu0.16.04.1

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
-- Dumping data for table `admin_menu`
--

LOCK TABLES `admin_menu` WRITE;
/*!40000 ALTER TABLE `admin_menu` DISABLE KEYS */;
INSERT INTO `admin_menu` VALUES (1,0,1,'首页','fa-bar-chart','/',NULL,'2018-11-20 01:29:41'),(2,0,8,'系统管理','fa-tasks',NULL,NULL,'2018-11-26 21:30:43'),(3,2,9,'管理员','fa-users','auth/users',NULL,'2018-11-26 21:30:43'),(4,2,10,'角色','fa-user','auth/roles',NULL,'2018-11-26 21:30:43'),(5,2,11,'权限','fa-ban','auth/permissions',NULL,'2018-11-26 21:30:43'),(6,2,12,'菜单','fa-bars','auth/menu',NULL,'2018-11-26 21:30:43'),(7,2,13,'操作日志','fa-history','auth/logs',NULL,'2018-11-26 21:30:43'),(8,0,7,'用户管理','fa-users','/users','2018-11-20 01:39:08','2018-11-26 21:30:43'),(9,0,3,'商品管理','fa-cubes','/products','2018-11-20 01:56:52','2018-11-26 20:31:58'),(10,0,6,'订单管理','fa-rmb','/orders','2018-11-20 06:54:37','2018-11-26 21:30:43'),(12,0,14,'数据库','fa-database','logs','2018-11-21 02:17:22','2018-11-26 21:30:43'),(14,12,15,'Redis','fa-database','/redis','2018-11-21 02:20:19','2018-11-26 21:30:43'),(15,12,16,'logs','fa-file-o','/logs','2018-11-21 02:20:37','2018-11-26 21:30:43'),(16,0,17,'优惠券','fa-tags','/coupon_codes','2018-11-22 02:19:19','2018-11-26 21:30:43'),(17,0,2,'商品类目','fa-bars','/categories','2018-11-26 20:31:48','2018-11-26 20:31:58'),(18,9,5,'众筹商品管理','fa-flag-checkered','/crowdfunding_products','2018-11-26 21:29:10','2018-11-26 21:32:32'),(19,9,4,'普通商品','fa-cube','/products','2018-11-26 21:30:34','2018-11-26 21:31:11');
/*!40000 ALTER TABLE `admin_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_permissions`
--

LOCK TABLES `admin_permissions` WRITE;
/*!40000 ALTER TABLE `admin_permissions` DISABLE KEYS */;
INSERT INTO `admin_permissions` VALUES (1,'All permission','*','','*',NULL,NULL),(2,'Dashboard','dashboard','GET','/',NULL,NULL),(3,'Login','auth.login','','/auth/login\r\n/auth/logout',NULL,NULL),(4,'User setting','auth.setting','GET,PUT','/auth/setting',NULL,NULL),(5,'Auth management','auth.management','','/auth/roles\r\n/auth/permissions\r\n/auth/menu\r\n/auth/logs',NULL,NULL),(6,'用户管理','users','',NULL,'2018-11-20 01:41:37','2018-11-20 01:41:37'),(7,'Logs','ext.log-viewer',NULL,'/logs*','2018-11-21 02:17:22','2018-11-21 02:17:22'),(8,'商品管理','products','','/products*','2018-11-23 10:59:48','2018-11-23 10:59:48'),(9,'订单管理','orders','','/orders*','2018-11-23 11:47:52','2018-11-23 11:47:52'),(10,'优惠券管理','coupon_codes','','/coupon_codes*','2018-11-23 11:48:34','2018-11-23 11:48:34');
/*!40000 ALTER TABLE `admin_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_role_menu`
--

LOCK TABLES `admin_role_menu` WRITE;
/*!40000 ALTER TABLE `admin_role_menu` DISABLE KEYS */;
INSERT INTO `admin_role_menu` VALUES (1,2,NULL,NULL);
/*!40000 ALTER TABLE `admin_role_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_role_permissions`
--

LOCK TABLES `admin_role_permissions` WRITE;
/*!40000 ALTER TABLE `admin_role_permissions` DISABLE KEYS */;
INSERT INTO `admin_role_permissions` VALUES (1,1,NULL,NULL),(2,2,NULL,NULL),(2,4,NULL,NULL),(2,6,NULL,NULL),(2,3,NULL,NULL),(2,8,NULL,NULL),(2,9,NULL,NULL),(2,10,NULL,NULL);
/*!40000 ALTER TABLE `admin_role_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_role_users`
--

LOCK TABLES `admin_role_users` WRITE;
/*!40000 ALTER TABLE `admin_role_users` DISABLE KEYS */;
INSERT INTO `admin_role_users` VALUES (1,1,NULL,NULL),(2,2,NULL,NULL);
/*!40000 ALTER TABLE `admin_role_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_roles`
--

LOCK TABLES `admin_roles` WRITE;
/*!40000 ALTER TABLE `admin_roles` DISABLE KEYS */;
INSERT INTO `admin_roles` VALUES (1,'Administrator','administrator','2018-11-20 01:25:56','2018-11-20 01:25:56'),(2,'运营','operator','2018-11-20 01:43:10','2018-11-20 01:43:10');
/*!40000 ALTER TABLE `admin_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_user_permissions`
--

LOCK TABLES `admin_user_permissions` WRITE;
/*!40000 ALTER TABLE `admin_user_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin_user_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_users`
--

LOCK TABLES `admin_users` WRITE;
/*!40000 ALTER TABLE `admin_users` DISABLE KEYS */;
INSERT INTO `admin_users` VALUES (1,'admin','$2y$10$O0dtslm9piIGexJ4arvG2.Uu3K/Z90rEDyWxCLTLr1z6T6HbQQj7q','Administrator',NULL,'ATf5yEu6uh4rs2EzBjdNNf7njH9zpbHESwpE97JRmrjF7tcIBaCiuP9m7vdf','2018-11-20 01:25:56','2018-11-20 01:25:56'),(2,'operator','$2y$10$Wsc5pTSM5MP.IZNOdoZxluuUxokHmbNY04cnt.Cv2vfFQqnEEcu.i','运营',NULL,'gyCjhx0uuLY2LFczBWZO5FzB0y4WW7t3dG7ea6i8x7RmwrS8BfdHusdEFXq6','2018-11-20 01:44:42','2018-11-20 01:44:42');
/*!40000 ALTER TABLE `admin_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-11-26 13:36:21
