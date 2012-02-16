USE ewaproject;

DELETE FROM _genre;
DELETE FROM _video;

INSERT INTO _genre (genre_id, name)
VALUES (1,'Thriller');
INSERT INTO _genre (genre_id, name)
VALUES (2,'Comedy');
INSERT INTO _genre (genre_id, name)
VALUES (3,'Action');
INSERT INTO _genre (genre_id, name)
VALUES (4,'Fantasy');
INSERT INTO _genre (genre_id, name)
VALUES (5,'Science Fiction');
INSERT INTO _genre (genre_id, name)
VALUES (6,'Crime');
INSERT INTO _genre (genre_id, name)
VALUES (7,'Drama');
INSERT INTO _genre (genre_id, name)
VALUES (8,'Horror');
INSERT INTO _genre (genre_id, name)
VALUES (9,'Western');
INSERT INTO _genre (genre_id, name)
VALUES (10,'undef');

INSERT INTO _video (title,duration,genre_id,FSK,release_year)
VALUES ('Clerks',92,2,12,1994);
INSERT INTO _video (title,duration,genre_id,FSK,release_year)
VALUES ('Stargate',116,5,12,1994);
INSERT INTO _video (title,duration,genre_id,FSK,release_year)
VALUES ('Forest Gumb',136,10,12,1994);
INSERT INTO _video (title,duration,genre_id,FSK,release_year)
VALUES ('The Passion of the Christ',127,10,16,2004);
INSERT INTO _video (title,duration,genre_id,FSK,release_year)
VALUES ('The Simpsons Movie',83,2,6,2007);
INSERT INTO _video (title,duration,genre_id,FSK,release_year)
VALUES ('Titanic',194,7,12,1997);
