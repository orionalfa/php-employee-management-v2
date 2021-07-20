--
-- Database creation
--
-- source C:\xampp\htdocs\php-employee-management-v2\db\db.sql

DROP DATABASE IF EXISTS employeedb;
CREATE DATABASE employeedb;
USE employeedb;
--
-- Tables creation
--


CREATE TABLE `employees` (
  `id` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` ENUM("M", "F") NOT NULL,
  `city` varchar(30) NOT NULL,
  `streetAddress` varchar(50) NOT NULL,
  `state` varchar(20) NOT NULL,
  `age` INT(2) NOT NULL,
  `postalCode` varchar(5) NOT NULL,
  `phoneNumber` varchar(9) NOT NULL
);


--
-- Insert data for "content" table
--

INSERT INTO `employees` (
  `name`,
  `lastName`,
  `email`,
  `gender`,
  `city`,
  `streetAddress`,
  `state`,
  `age`,
  `postalCode`,
  `phoneNumber`
) 
VALUES
(
  "Jean",
  "Hoover",
  "jhover@network.com",
  "M",
  "Syosset",
  "4388 Southern Street",
  "NY",
  24,
  "11791",
  "914537837"),
(
  "Dwight",
  "Martinez",
  "dwightm@network.com",
  "M",
  "Simsbury",
  "3703 Copperhead Road",
  "CT",
  35,
  "06070",
  "203412764"
),
(
  "Lisa",
  "Murphy",
  "lisamurphy01@mail.com",
  "F",
  "Hazen",
  "601 Coal Street",
  "PA",
  29,
  "15825",
  "215818225"
),
(
  "Tara",
  "Jones",
  "taradjones@mail.com",
  "F",
  "Muskegon",
  "1499 Wetzel Lane",
  "MI",
  40,
  "49470",
  "248877375"
),
(
  "James",
  "Gunter",
  "jamescunter@email.net",
  "M",
  "Hopkins",
  "2997 Sycamore Fork Road",
  "MN",
  33,
  "55343",
  "952907487"
);


