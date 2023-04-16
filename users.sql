CREATE TABLE users (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(30) NOT NULL,
  password VARCHAR(30) NOT NULL,
  email VARCHAR(50) NOT NULL,
  role ENUM('user', 'admin') DEFAULT 'user' NOT NULL
);

INSERT INTO users (username, password, email, role)
VALUES ('user1', 'user1@example.com', 'password1', 'user'),
       ('admin1', 'admin1@example.com', 'adminpassword1', 'admin');
