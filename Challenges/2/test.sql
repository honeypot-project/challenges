CREATE DATABASE `tut`;

use tut;

CREATE USER 'challenge2'@'localhost' IDENTIFIED BY 'dummypass123';
GRANT SELECT ON sqlidemo.* TO 'challenge2'@'localhost';

create table users
(
    username varchar(40) not null,
    password varchar(40) not null
);