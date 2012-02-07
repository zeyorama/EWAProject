CREATE TABLE _user (
id int NOT NULL AUTO_INCREMENT,
email varchar(80) NOT NULL,
pass varchar(32) NOT NULL,
role int NOT NULL,
locked int NOT NULL,
PRIMARY KEY (id),
UNIQUE (email)
);
CREATE TABLE _event (
id int NOT NULL AUTO_INCREMENT,
startDate TimeStamp,
location varchar(255),
description text,
owner_user_id int,
PRIMARY KEY (id)
);
CREATE TABLE _video (
id int NOT NULL AUTO_INCREMENT,
name varchar(50),
duration int,
genre_id int,
PRIMARY KEY (id)
);
CREATE TABLE _genre (
id int NOT NULL AUTO_INCREMENT,
name varchar(25),
PRIMARY KEY (id)
);
CREATE TABLE _user_video (
id int NOT NULL AUTO_INCREMENT,
user_id int NOT NULL,
video_id int NOT NULL,
PRIMARY KEY (id)
);
CREATE TABLE _user_event (
id int NOT NULL AUTO_INCREMENT,
user_id int NOT NULL,
event_id int NOT NULL,
PRIMARY KEY (id)
);
CREATE TABLE _event_video (
_ue_id int NOT NULL,
video_id int NOT NULL,
PRIMARY KEY (_ue_id, video_id)
);
