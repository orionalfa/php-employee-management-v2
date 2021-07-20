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
("Rack",
"Lei",
"jackon@network.com",
"M",
"San Jone",
"126",
"Canada",
"24",
"394221",
"738362762");
