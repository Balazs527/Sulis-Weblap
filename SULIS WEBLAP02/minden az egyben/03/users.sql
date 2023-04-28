CREATE DATABASE db;
USE db;

CREATE TABLE users (
  id int(11) NOT NULL AUTO_INCREMENT,
  firstname varchar(100) NOT NULL,
  lastname varchar(100) NOT NULL,
  username varchar(100) NOT NULL,
  email varchar(100) NOT NULL,
  password varchar(255) NOT NULL,
  role ENUM('user', 'admin') DEFAULT 'user' NOT NULL,
  PRIMARY KEY (id)
);

INSERT INTO users (firstname, lastname, username, email, password, role)
VALUES ('user', '1', 'user1', 'user1@example.com', 'password1', 'user'),
       ('admin', '1', 'admin1', 'admin1@example.com', 'adminpassword1', 'admin');