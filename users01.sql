CREATE DATABASE db;
USE db;

CREATE TABLE users (
  id int(11) NOT NULL AUTO_INCREMENT,
  username varchar(100) NOT NULL,
  email varchar(100) NOT NULL,
  password varchar(255) NOT NULL,
  role ENUM('user', 'admin') DEFAULT 'user' NOT NULL,
  PRIMARY KEY (id)
);

INSERT INTO users (username, email, password, role)
VALUES ('user1', 'user1@example.com', 'password1', 'user'),
       ('admin1', 'admin1@example.com', 'adminpassword1', 'admin');

