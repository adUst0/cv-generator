CREATE DATABASE cv_generator;

CREATE TABLE `cv_generator`.`Users` ( 
    `user_id` INT(10) NOT NULL AUTO_INCREMENT , 
    `name` VARCHAR(100) NOT NULL , 
    `email` VARCHAR(100) NOT NULL , 
    `password` VARCHAR(100) NOT NULL , 
    PRIMARY KEY (`user_id`),
) ENGINE = InnoDB;

ALTER TABLE `cv_generator`.`Users` ADD UNIQUE(`email`);

CREATE TABLE `cv_generator`.`requests` ( `user_id` INT(10) NOT NULL AUTO_INCREMENT , `username` VARCHAR(50) NOT NULL , `quality` VARCHAR(100) NOT NULL , `quantity` VARCHAR(100) NOT NULL , `date` VARCHAR(50) NOT NULL , PRIMARY KEY (`user_id`)) ENGINE = InnoDB;

-- ALTER TABLE MyTable1
-- ADD FOREIGN KEY(user_id)
-- REFERENCES Users(user_id)
-- ON DELETE CASCADE
-- ON UPDATE CASCADE;