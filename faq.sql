-- Adminer 4.2.4 MySQL dump


SET NAMES utf8;

SET time_zone = '+00:00';

SET foreign_key_checks = 0;

SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `admins`;

CREATE TABLE `admins` (

  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

  `created_at` timestamp NULL,

  `updated_at` timestamp NULL,

  `login` varchar(255) NOT NULL,

  `password` varchar(255) NOT NULL,

  PRIMARY KEY (`id`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `admins` (`id`, `login`, `password`) VALUES

(1,	'admin', 'admin');


DROP TABLE IF EXISTS `answers`;

CREATE TABLE `answers` (

  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

  `created_at` timestamp NULL,

  `updated_at` timestamp NULL,

  `answer` varchar(255) NOT NULL,

  `question_id` int(10) UNSIGNED NOT NULL,

  PRIMARY KEY (`id`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (

  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

  `created_at` timestamp NULL,

  `updated_at` timestamp NULL,

  `name` varchar(255) NOT NULL, 

  PRIMARY KEY (`id`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `questions`;

CREATE TABLE `questions` (

  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

  `created_at` timestamp NULL,

  `updated_at` timestamp NULL,

  `name` varchar(255) NOT NULL,

  `status` varchar(255) NOT NULL DEFAULT '0',

  `author` varchar(255) NOT NULL,

  `email` varchar(255) NOT NULL,
 
  `category_id` int(10) UNSIGNED NOT NULL,

  PRIMARY KEY (`id`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- 2018-09-01 16:00:00