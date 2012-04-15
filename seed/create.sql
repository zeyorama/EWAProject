CREATE DATABASE ewaproject;

USE ewaproject;

CREATE TABLE _user  (
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
UNIQUE (email),
UNIQUE (nick)
);

CREATE TABLE _knowing  (
knowing_id int NOT NULL AUTO_INCREMENT,
user_id1 int NOT NULL,
user_id2 int NOT NULL,
PRIMARY KEY (knowing_id)
);

CREATE TABLE _event  (
event_id int NOT NULL AUTO_INCREMENT,
startDate TimeStamp,
location text,
description text,
owner_user_id int,
locked boolean,
FSK int,
name varchar(255),
PRIMARY KEY (event_id)
);

CREATE TABLE _video  (
video_id int NOT NULL AUTO_INCREMENT,
title varchar(255),
duration smallint,
genre_id int,
FSK tinyint,
release_year year,
locked boolean,
PRIMARY KEY (video_id)
);

CREATE TABLE _genre  (
genre_id int NOT NULL AUTO_INCREMENT,
name varchar(128),
PRIMARY KEY (genre_id)
);

CREATE TABLE _user_video  (
uv_id int NOT NULL AUTO_INCREMENT,
user_id int NOT NULL,
video_id int NOT NULL,
shared_to int,
meta varchar(255),
PRIMARY KEY (uv_id)
);

CREATE TABLE _user_event  (
ue_id int NOT NULL AUTO_INCREMENT,
user_id int NOT NULL,
event_id int NOT NULL,
PRIMARY KEY (ue_id)
);

CREATE TABLE _event_video  (
ev_id int NOT NULL AUTO_INCREMENT,
ue_id int NOT NULL,
video_id int NOT NULL,
PRIMARY KEY (ev_id)
);

CREATE TABLE _pn  (
pn_id int NOT NULL AUTO_INCREMENT,
subject varchar(128),
content text,
sendDate datetime NOT NULL,
from_user int NOT NULL,
to_user int NOT NULL,
PRIMARY KEY (pn_id)
);
