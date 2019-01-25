
# ТЕМА:  16-Редактор и генератор на CV

**WEB Технологии, 2018 (ФМИ)**  
**Ръководител: доц. д-р Милен Петров** 

## 1. Условие

Да се създаде трислойно уеб приложение, чрез което потребителите могат да създават бързо и лесно CV.

## 2. Въведение

Представеният проект имплементира поставеното условие. Уеб приложението е с **Responsive design**. То се състои от няколко уеб страници, обработка на сесии и потребители чрез PHP и MySql и добавяне / премахване на потребителски данни в базата данни.

## 3. Теория

Всеки потребител може да създаде профил и да добави информация към профила си, която ще се използва за създаването на CV.

Базата данни се състои от 5 таблици:

- `users` - пази информация за регистрираните потребители

- `user_data` - пази основна информация за потребителите (Име, народност, местоживеене, …)

- `work_experience` - съдържа трудовия стаж на потребителите

- `education` - в тази таблица се пази информация за различните образователни степени, които лицето е придонило

- `languages` - ниво на владеене на чужди езици

- `skills` - допълнителни умения, свързани с конкретната работа

**NB** - За целите на проекта, паролите умишлено не се хешират.

## 4. Използвани технологии

*Front-end* частта е реализирана чрез **HTML5** (**CSS3** и **JavaScript**). Използвана е библиотеката **Bootstrap** за създаването на *Responsive design*.

За *Back-end* логиката е използван **PHP** и **MySQL**.

## 5. Инсталация и настройки

При първото пускане на проекта, трябва да се изпълни скрипта **sql/createDb.sql**, който създава базата данни и необходимите данни и добавя един тестов потребител.

**php/config.php** - конфигурационен файл, съдържащ конфигурация за базата данни

```php
<?php
    $db_servername = "localhost";
    $db_name = "cv_generator";
    $db_username = "root";
    $db_password = "";
?>
```

## 6. Кратко ръководство на потребителя

1. Първата необходима стъпка за създаване на CV е регистрирането

2. При успешна регистрация ще бъдете пренасочени към Login страницата, където трябва да се логнете, за да ползвате услугите на сайта

3. След успешно влизане в системата, ще бъдете пренасочени към вашия профил, където трябва да попълните информацията за вас, от която ще бъде създадено CV-то. (При успешен логин менютата се сменят)

4. За да видите готовото CV, кликнете на връзката My CV

## 7. Примерни данни

За примерни данни можем да използваме данните от скрипта за създаване на базата от данни.

```sql
INSERT INTO `users` (`user_id`, `name`, `email`, `password`)

VALUES

(NULL, 'Georgi Georgiev', 'gosheto@abv.bg', '123456789');

INSERT INTO `user_data` (`id`, `user_id`, `location`, `email`, `sex`,

`date_of_birth`, `nationality`, `driving_license`, `mother_tongue`)

VALUES

(NULL, '1', 'Plovdiv, Bulgaria', 'drug_email@gmail.com', 'male',

'1996-06-02', 'Bulgarian', 'AM, B', 'Bulgarian');

INSERT INTO `work_experience` (`id`, `user_id`, `job_title`, `company`,

`from_date`, `to_date`)

VALUES

(NULL, '1', 'Embedded Software Eng', 'Visteon', '2017-09-04', 'now'),

(NULL, '1', 'Teleagent', 'Telus International', '2016-09-01', '2017-09-01');

INSERT INTO `education` (`id`, `user_id`, `title`, `institution`, `from_date`, `to_date`)

VALUES

(NULL, '1', 'High school', 'Spanish high school', '2010-09-15', '2015-05-30'),

(NULL, '1', 'Computer Science', 'FMI, Sofia University', '2015-09-15', '2019-09-01');

INSERT INTO `languages` (`id`, `user_id`, `lang`, `level`)

VALUES

(NULL, '1', 'English', 'C2'),

(NULL, '1', 'Spanish', 'C1'),

(NULL, '1', 'German', 'A1');

INSERT INTO `skills` (`id`, `user_id`, `title`)

VALUES

(NULL, '1', 'C++'),

(NULL, '1', 'Java'),

(NULL, '1', 'OOP'),

(NULL, '1', 'Algorithms'),

(NULL, '1', 'Scrum'),

(NULL, '1', 'Git'),

(NULL, '1', 'Scala');
```

## 8. Описание на програмния код

Структура на проекта:

    .
    ├── css
    │   ├── bootstrap.min.css
    │   └── style.css
    ├── img
    │   ├── bg.jpg
    │   ├── login.png
    │   ├── logo2.png
    │   ├── logo2.psd
    │   ├── logo.png
    │   └── register.png
    ├── index.php
    ├── js
    │   ├── bootstrap.min.js
    │   └── jquery.min.js
    ├── login.php
    ├── members.php
    ├── my_cv.php
    ├── php
    │   ├── add_education.php
    │   ├── add_language.php
    │   ├── add_skill.php
    │   ├── add_user.php
    │   ├── add_work.php
    │   ├── config.php
    │   ├── Db.php
    │   ├── logout.php
    │   ├── remove_education.php
    │   ├── remove_language.php
    │   ├── remove_skill.php
    │   ├── remove_work.php
    │   └── update_user_data.php
    ├── register.php
    └── sql
        └── createDb.sql

Страниците се намират в главната директория и съдържат PHP код освен HTML5.

**css/style.css** - основната стилова страница на проекта

**img/*** - лого и картинки, които се използват предимно за връзки

**php/*** - основната бизнес логика на уеб приложението

**sql/createDb.sql** - скрипт за първоначалното създаване на базата данни

**php/config.php** - конфигурационен файл

```php
<?php
    $db_servername = "localhost";
    $db_name = "cv_generator";
    $db_username = "root";
    $db_password = "";
?>
```

## 9. Възможности за бъдещо разширение

- на първо място, подобряване дизайна на генерираното CV

- добавяне на различни дизайни за CV

- CV export to PDF

## 10. Използвани източници

- [https://www.w3schools.com/](https://www.w3schools.com/)

- [https://www.clipartmax.com/](https://www.clipartmax.com/)

- [https://stackoverflow.com](https://stackoverflow.com)

- [https://www.youtube.com/](https://www.youtube.com/)