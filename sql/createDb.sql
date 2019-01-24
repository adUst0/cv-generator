CREATE DATABASE cv_generator;

CREATE TABLE `cv_generator`.`Users` ( 
    user_id INT(10) NOT NULL AUTO_INCREMENT, 
    name VARCHAR(100) NOT NULL, 
    email VARCHAR(100) NOT NULL UNIQUE, 
    password VARCHAR(100) NOT NULL, 
    PRIMARY KEY (user_id)
);

CREATE TABLE `cv_generator`.`user_data` (
    id INT(10) NOT NULL AUTO_INCREMENT,
    user_id INT(10) NOT NULL UNIQUE,
    location VARCHAR(100) NOT NULL,
    email VARCHAR(100),
    sex VARCHAR(10) NOT NULL,
    date_of_birth CHAR(10),
    nationality VARCHAR(20),
    driving_license VARCHAR(20),
    mother_tongue VARCHAR(20) NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(user_id) REFERENCES Users(user_id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);

CREATE TABLE `cv_generator`.`work_experience` (
    id INT(10) NOT NULL AUTO_INCREMENT,
    user_id INT(10) NOT NULL,
    job_title VARCHAR(50) NOT NULL,
    company VARCHAR(50) NOT NULL,
    from_date CHAR(10) NOT NULL,
    to_date CHAR(10) NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(user_id) REFERENCES Users(user_id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);

CREATE TABLE `cv_generator`.`education` (
    id INT(10) NOT NULL AUTO_INCREMENT,
    user_id INT(10) NOT NULL,
    title VARCHAR(50) NOT NULL,
    institution VARCHAR(100) NOT NULL,
    from_date CHAR(10) NOT NULL,
    to_date CHAR(10) NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(user_id) REFERENCES Users(user_id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);

CREATE TABLE `cv_generator`.`languages` (
    id INT(10) NOT NULL AUTO_INCREMENT,
    user_id INT(10) NOT NULL UNIQUE,
    lang1 VARCHAR(50) NOT NULL,
    level1 CHAR(2) NOT NULL,
    lang2 VARCHAR(50) NOT NULL,
    level2 CHAR(2) NOT NULL,
    lang3 VARCHAR(50) NOT NULL,
    level3 CHAR(2) NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(user_id) REFERENCES Users(user_id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);

CREATE TABLE `cv_generator`.`skills` (
    id INT(10) NOT NULL AUTO_INCREMENT,
    user_id INT(10) NOT NULL,
    title VARCHAR(200) NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(user_id) REFERENCES Users(user_id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);

-- INSERT INTO `user_data` (`user_id`, `location`, `email`, `sex`, `date_of_birth`, `nationality`, `driving_license`, `mother_tongue`) VALUES ('1', 'Plovdiv, Bulgaria', 'drug_email@gmail.com', 'male', '1996-01-02', 'Bulgarian', 'AM, B', 'Bulgarian');