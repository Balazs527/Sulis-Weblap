CREATE DATABASE db;
USE db;

CREATE TABLE 'users' (
  'id' int(11) NOT NULL AUTO_INCREMENT,
  'fullname' varchar(100) NOT NULL,
  'username' varchar(100) NOT NULL,
  'email' varchar(100) NOT NULL,
  'password' varchar(255) NOT NULL,
  'website' varchar(255),
  role ENUM('user', 'admin') DEFAULT 'user' NOT NULL
  PRIMARY KEY ('id')
);

INSERT INTO users (username, password, email, role)
VALUES ('user1', 'user1@example.com', 'password1', 'user'),
       ('admin1', 'admin1@example.com', 'adminpassword1', 'admin');