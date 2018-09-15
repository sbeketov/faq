-- Adminer 4.2.4 MySQL dump


SET NAMES utf8;

SET time_zone = '+00:00';

SET foreign_key_checks = 0;

SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `admins`;

CREATE TABLE `users` (

  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

  `created_at` timestamp NULL,

  `updated_at` timestamp NULL,

  `name` varchar(255) NOT NULL,

  `email` varchar(255) NULL,

  `password` varchar(255) NOT NULL,

  `remember_token` varchar(100) NULL,

  PRIMARY KEY (`id`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `name`, `password`) VALUES

(1,	'admin', '$2y$10$9uI3w3SCPfmhUpbiF5nOsegtxr1tveF0cDWRaDFOlgOhJiUCRQtTa');


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
