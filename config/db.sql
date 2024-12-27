drop database players ;
create database players;
use players;
create table PLAYERS(
player_id INT  not null primary key AUTO_INCREMENT,
name varchar(20) ,
club_id INT ,
nationality varchar(20),
position_name enum('GK','ST','RW','LW','CM','LB','CB','RB'),
rating int not null,
is_deleted tinyint(1)
);

-- insert values into players table
INSERT INTO PLAYERS (name, club_id, nationality, position_name, rating, is_deleted)
VALUES ('David De Gea', 1, 1, 'GK', 85, 0),
       ('Sergio Ramos', 2, 2, 'CB', 87, 0),
       ('Lionel Messi', 3, 3, 'RW', 95, 0);