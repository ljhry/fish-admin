
create database myfishtank;

use myfishtank;

create table user(
    id int unsigned not null auto_increment primary key,
    username varchar(50) not null,
    password varchar(50) not null,
    isadmin tinyint not null,
    time int 
);
create table fish(
    id int unsigned not null auto_increment primary key,
    name varchar(100) not null,
    img varchar(100) not null
);
create table fishtank(
    id int unsigned not null auto_increment primary key,
    name varchar(100) not null,
    img varchar(100) not null
);
create table userdet(
    id int unsigned not null auto_increment primary key,
    user_id int not null,
    fish_id int not null,
    fishtank_id int not null,
    fish_num int not null,
    status tinyint not null,
    time int 
);
create table comment(
    id int unsigned not null auto_increment primary key,
    user_id int not null,
    content text,
    time int not null
);
