create database mydb;

use mydb;

CREATE TABLE `users` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `age` int(3) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phone` int(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  PRIMARY KEY  (`id`)
);