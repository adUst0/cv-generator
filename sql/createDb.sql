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
    user_id INT(10) NOT NULL,
    lang VARCHAR(50) NOT NULL,
    level CHAR(2) NOT NULL,
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

INSERT INTO `users` (`user_id`, `name`, `email`, `password`) VALUES (NULL, 'Georgi Georgiev', 'gosheto@abv.bg', '123456789');

INSERT INTO `user_data` (`id`, `user_id`, `location`, `email`, `sex`, `date_of_birth`, `nationality`, `driving_license`, `mother_tongue`) VALUES (NULL, '1', 'Plovdiv, Bulgaria', 'drug_email@gmail.com', 'male', '1996-06-02', 'Bulgarian', 'AM, B', 'Bulgarian');

INSERT INTO `work_experience` (`id`, `user_id`, `job_title`, `company`, `from_date`, `to_date`) VALUES (NULL, '1', 'Embedded Software Eng', 'Visteon', '2017-09-04', 'now'), (NULL, '1', 'Teleagent', 'Telus International', '2016-09-01', '2017-09-01');

INSERT INTO `education` (`id`, `user_id`, `title`, `institution`, `from_date`, `to_date`) VALUES (NULL, '1', 'High school', 'Spanish high school', '2010-09-15', '2015-05-30'), (NULL, '1', 'Computer Science', 'FMI, Sofia University', '2015-09-15', '2019-09-01');

INSERT INTO `languages` (`id`, `user_id`, `lang`, `level`) VALUES (NULL, '1', 'English', 'C2'), (NULL, '1', 'Spanish', 'C1'), (NULL, '1', 'German', 'A1');

INSERT INTO `skills` (`id`, `user_id`, `title`) VALUES (NULL, '1', 'C++'), (NULL, '1', 'Java'), (NULL, '1', 'OOP'), (NULL, '1', 'Algorithms'), (NULL, '1', 'Scrum'), (NULL, '1', 'Git'), (NULL, '1', 'Scala');