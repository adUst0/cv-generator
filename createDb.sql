CREATE DATABASE cv_generator;

CREATE TABLE `cv_generator`.`Users` ( 
    `user_id` INT(10) NOT NULL AUTO_INCREMENT , 
    `name` VARCHAR(100) NOT NULL , 
    `email` VARCHAR(100) NOT NULL , 
    `password` VARCHAR(100) NOT NULL , 
    PRIMARY KEY (`user_id`)
) ENGINE = InnoDB;

ALTER TABLE `cv_generator`.`Users` ADD UNIQUE(`email`);