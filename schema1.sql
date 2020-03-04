/**
--  To load database from the command line, manoeuvre to the folder and type:
--  mysql -u USERNAME -p 
--  source schema1.sql;
*/

DROP DATABASE IF EXISTS schema1;
CREATE DATABASE schema1;
USE schema1;

DROP TABLE IF EXISTS `Users`;
CREATE TABLE `Users` (
    `id` INT(5) NOT NULL auto_increment,
    `firstname` VARCHAR(16) NOT NULL DEFAULT '',
    `lastname` VARCHAR(16) NOT NULL DEFAULT '',
    `password` VARCHAR(500) NOT NULL DEFAULT '',
    `email` VARCHAR(32) NOT NULL DEFAULT '',
    `date_joined` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `Issues`;
CREATE TABLE `Issues` (
    `id` INT(11) NOT NULL auto_increment,
    `title` VARCHAR(32) NOT NULL DEFAULT '',
    `description` VARCHAR(500) NOT NULL DEFAULT '',
    `type` VARCHAR(32) NOT NULL DEFAULT '',
    `priority` VARCHAR(10) NOT NULL DEFAULT 'High',
    `status` VARCHAR(10) NOT NULL DEFAULT 'Open',
    `assigned_to` INT NOT NULL DEFAULT -1,
    `created_by` INT NOT NULL DEFAULT -1,
    `created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
);

/**
--  added an admin user to database
--  admin login details:
--  email:  admin@bugme.com
--  password:   password123   
*/
INSERT INTO `users` (`firstname`, `lastname`, `password`, `email`) 
VALUES ('admin', 'admin', 'password123', 'admin@bugme.com');