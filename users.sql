CREATE DATABASE db;
USE db;

CREATE TABLE 'users' (
  'id' int(11) NOT NULL AUTO_INCREMENT,
  'fullname' varchar(100) NOT NULL,
  'username' varchar(100) NOT NULL,
  'email' varchar(100) NOT NULL,
  'password' varchar(255) NOT NULL,
  'website' varchar(255),
  PRIMARY KEY ('id')
);