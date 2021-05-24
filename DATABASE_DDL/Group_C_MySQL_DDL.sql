SHOW DATABASES;
UNLOCK TABLES;
DROP DATABASE csc350;
CREATE DATABASE csc350;
use csc350;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `name` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `apt` varchar(4) NOT NULL,
  PRIMARY KEY (`name`)
);

DROP TABLE IF EXISTS `data`;
CREATE TABLE `data` (
  `date` DATE NOT NULL,
  `time` int NOT NULL,
  `apt` varchar(3) NOT NULL,
  `name` varchar(30) NOT NULL,
  FOREIGN KEY (`name`) REFERENCES `users` (`name`)
);

INSERT INTO `users` values ('jeff', 'abcd', '1A'), ('hyunsoo', 'abcd', '32D');
