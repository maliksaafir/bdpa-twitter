DROP DATABASE IF EXISTS `bdpa-twitter`;
CREATE DATABASE `bdpa-twitter`;
USE `bdpa-twitter`;

CREATE TABLE IF NOT EXISTS users(
  id int(11) NOT NULL AUTO_INCREMENT,
  username varchar(255) NOT NULL UNIQUE,
  password varchar(255) NOT NULL,
  email varchar(255) NOT NULL UNIQUE,
  fname varchar(255) NOT NULL,
  lname varchar(255) NOT NULL,
  verified enum('Y', 'N'),
  picture varchar(255),
  header varchar(255),
  bio varchar(255),
  location varchar(255),
  PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS tweets(
  id int(11) NOT NULL AUTO_INCREMENT,
  words varchar(255),
  media varchar(255),
  quote int(11),
  likes int(11),
  ad enum('Y', 'N'),
  time datetime DEFAULT CURRENT_TIMESTAMP,
  rt_of int(11),
  reply_to int(11),
  user int(11) NOT NULL,
  clicks int(11),
  PRIMARY KEY (id),
  FOREIGN KEY (quote) REFERENCES tweets(id),
  FOREIGN KEY (rt_of) REFERENCES tweets(id),
  FOREIGN KEY (reply_to)  REFERENCES tweets(id),
  FOREIGN KEY (user) REFERENCES users(id)
);

CREATE TABLE IF NOT EXISTS connections(
  follower int(11) NOT NULL,
  followed int(11) NOT NULL,
  PRIMARY KEY (follower, followed)
);

CREATE TABLE IF NOT EXISTS blocks(
  blocker int(11) NOT NULL,
  blocked int(11) NOT NULL,
  PRIMARY KEY (blocker, blocked)
);

CREATE TABLE IF NOT EXISTS rooms(
  id int(11) NOT NULL UNIQUE AUTO_INCREMENT,
  user1 int(11) NOT NULL,
  user2 int(11) NOT NULL,
  PRIMARY KEY (user1, user2),
  FOREIGN KEY (user1) REFERENCES users(id),
  FOREIGN KEY (user2) REFERENCES users(id)
);

CREATE TABLE IF NOT EXISTS messages(
  id int(11) NOT NULL AUTO_INCREMENT,
  user int(11) NOT NULL,
  content varchar(255) NOT NULL,
  time datetime,
  room int(11) NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (user) REFERENCES users(id),
  FOREIGN KEY (room) REFERENCES rooms(id)
);

CREATE TABLE IF NOT EXISTS ads(
  id int NOT NULL AUTO_INCREMENT,
  ppc decimal(8, 2) NOT NULL,
  PRIMARY KEY (id)
);

INSERT INTO users (username, password, email, fname, lname, verified) VALUES ('@first-user', '1234567', 'johndoe@gmail.com', 'John', 'Doe', 'Y'), ('@imsecond', '$econdacc', 'noname@gmail.com', 'Stacy', 'Noname', 'N'), ('@metoo', 'bad@passwords', 'whostillusesyahoo@yahoo.com', 'Me', 'Too', 'Y'), ('@trollguy', 'itrollforfun', 'trollman@gmail.com', 'TROLL', 'DUDE', 'N');

INSERT INTO tweets (words, quote, likes, rt_of, reply_to, user) VALUES ('if you\'re not first you\'re last', NULL, 2, NULL, NULL, 1), ('THAT\'S NOT TRUE', NULL, 1, NULL, 1, 3), ('hush you\'re not even second', 2, 1000, NULL, NULL, 1);

INSERT INTO connections (follower, followed) VALUES (1, 2), (2, 1), (3, 1), (2, 3);

INSERT INTO blocks (blocker, blocked) VALUES (1, 4), (2, 4), (3, 4);
