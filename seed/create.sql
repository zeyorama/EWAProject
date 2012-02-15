CREATE USER 'ewaproject'@'localhost' IDENTIFIED BY 'ewa_pass';

GRANT USAGE ON * . * TO 'ewaproject'@'localhost' IDENTIFIED BY 'ewa_pass' WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0 ;

CREATE DATABASE IF NOT EXISTS `ewaproject` ;

GRANT ALL PRIVILEGES ON `ewaproject` . * TO 'ewaproject'@'localhost';

USE ewaproject;

CREATE TABLE _user IF NOT EXISTS (
user_id int NOT NULL AUTO_INCREMENT,
nick varchar(25) NOT NULL,
email varchar(255) NOT NULL,
pass varchar(64) NOT NULL,
admin boolean NOT NULL,
created_at datetime,
last_signin datetime,
session_id varchar(64),
locked int NOT NULL,
PRIMARY KEY (user_id),
UNIQUE (email, nick)
);

CREATE TABLE _knowing IF NOT EXISTS (
knowing_id int NOT NULL AUTO_INCREMENT,
user_id1 int NOT NULL,
user_id2 int NOT NULL,
PRIMARY KEY (knowing_id)
);

CREATE TABLE _event IF NOT EXISTS (
event_id int NOT NULL AUTO_INCREMENT,
startDate TimeStamp,
location text,
description text,
owner_user_id int,
locked boolean,
PRIMARY KEY (event_id)
);

CREATE TABLE _video IF NOT EXISTS (
video_id int NOT NULL AUTO_INCREMENT,
title varchar(255),
duration smallint,
genre_id int,
FSK tinyint,
release_year year,
PRIMARY KEY (video_id)
);

CREATE TABLE _genre IF NOT EXISTS (
genre_id int NOT NULL AUTO_INCREMENT,
name varchar(128),
PRIMARY KEY (genre_id)
);

CREATE TABLE _user_video IF NOT EXISTS (
uv_id int NOT NULL AUTO_INCREMENT,
user_id int NOT NULL,
video_id int NOT NULL,
shared_to int,
PRIMARY KEY (uv_id)
);

CREATE TABLE _user_event IF NOT EXISTS (
ue_id int NOT NULL AUTO_INCREMENT,
user_id int NOT NULL,
event_id int NOT NULL,
PRIMARY KEY (ue_id)
);

CREATE TABLE _event_video IF NOT EXISTS (
ev_id int NOT NULL AUTO_INCREMENT,
ue_id int NOT NULL,
video_id int NOT NULL,
PRIMARY KEY (ev_id)
);

CREATE TABLE _pn IF NOT EXISTS (
pn_id int NOT NULL AUTO_INCREMENT,
subject varchar(128),
content text,
sendDate datetime NOT NULL,
from_user int NOT NULL,
to_user int NOT NULL,
PRIMARY KEY (pn_id)
);
